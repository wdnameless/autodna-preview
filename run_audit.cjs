const http = require('http');
const fs = require('fs');
const path = require('path');
const { chromium } = require('playwright');

const mime = {
  '.html': 'text/html; charset=utf-8',
  '.css': 'text/css; charset=utf-8',
  '.js': 'text/javascript; charset=utf-8',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.svg': 'image/svg+xml',
  '.woff2': 'font/woff2',
  '.woff': 'font/woff',
  '.ttf': 'font/ttf',
  '.json': 'application/json'
};

const server = http.createServer((req, res) => {
  let f = req.url.split('?')[0];
  if (f === '/') f = '/index.html';
  const p = path.join(process.cwd(), decodeURIComponent(f));
  fs.readFile(p, (err, data) => {
    if (err) {
      res.writeHead(404, { 'Content-Type': 'text/plain' });
      res.end('404 Not Found: ' + f);
      return;
    }
    const ext = path.extname(p).toLowerCase();
    res.writeHead(200, { 'Content-Type': mime[ext] || 'application/octet-stream' });
    res.end(data);
  });
});

const PORT = 8499;

server.listen(PORT, '127.0.0.1', async () => {
  console.log(`Audit server running on http://127.0.0.1:${PORT}`);
  
  // 1. Static Link & Asset Validation on disk
  console.log('\n========================================');
  console.log('1. STATIC AUDIT (Files, Links, Assets)');
  console.log('========================================');

  const htmlFiles = [
    'index.html',
    'skipthedealer.html',
    'autodnaflip.html',
    'dnaservice.html',
    'skiptheshop.html',
    'drivecareplan.html',
    'paintbot.html',
    'autodnaservice/index.html',
    'autodnaservice/skiptheshop.html',
    'autodnaservice/drivecareplan.html'
  ];

  const diskIssues = [];

  for (const hf of htmlFiles) {
    const fullPath = path.join(process.cwd(), hf);
    if (!fs.existsSync(fullPath)) {
      diskIssues.push({ file: hf, type: 'MISSING_HTML_FILE', target: hf });
      continue;
    }

    const content = fs.readFileSync(fullPath, 'utf-8');
    const baseDir = path.dirname(fullPath);

    // Check src="..."
    const srcMatches = [...content.matchAll(/src=["']([^"']+)["']/g)];
    for (const m of srcMatches) {
      const src = m[1];
      if (src.startsWith('data:') || src.startsWith('http:') || src.startsWith('https:') || src.startsWith('//') || src.startsWith('<?php')) continue;
      const cleanSrc = src.split('?')[0].split('#')[0];
      const targetPath = cleanSrc.startsWith('/') ? path.join(process.cwd(), cleanSrc) : path.resolve(baseDir, cleanSrc);
      if (!fs.existsSync(targetPath)) {
        diskIssues.push({ file: hf, type: 'MISSING_SRC', target: src, resolved: targetPath });
      }
    }

    // Check href="..." for stylesheets and links
    const hrefMatches = [...content.matchAll(/href=["']([^"']+)["']/g)];
    for (const m of hrefMatches) {
      const href = m[1];
      if (href.startsWith('data:') || href.startsWith('http:') || href.startsWith('https:') || href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('javascript:') || href.startsWith('<?php')) continue;
      
      const [filePath, anchor] = href.split('#');
      if (filePath) {
        const targetPath = filePath.startsWith('/') ? path.join(process.cwd(), filePath) : path.resolve(baseDir, filePath);
        if (!fs.existsSync(targetPath)) {
          diskIssues.push({ file: hf, type: 'MISSING_HREF', target: href, resolved: targetPath });
        }
      }
    }
  }

  if (diskIssues.length === 0) {
    console.log('✓ All referenced local files, images, scripts, and stylesheets exist on disk!');
  } else {
    console.log(`Found ${diskIssues.length} disk asset/link issues:`);
    for (const iss of diskIssues) {
      console.log(`  [${iss.type}] in ${iss.file}: ${iss.target}`);
    }
  }

  // 2. Playwright Live Browser Testing (Desktop & Mobile)
  console.log('\n========================================');
  console.log('2. BROWSER RUNTIME AUDIT (Playwright)');
  console.log('========================================');

  const browser = await chromium.launch();
  const runtimeIssues = [];

  const viewports = [
    { name: 'Desktop 1440x900', width: 1440, height: 900, isMobile: false },
    { name: 'Mobile 393x852', width: 393, height: 852, isMobile: true },
    { name: 'Mobile Small 360x740', width: 360, height: 740, isMobile: true }
  ];

  for (const hf of htmlFiles) {
    if (!fs.existsSync(path.join(process.cwd(), hf))) continue;

    for (const vp of viewports) {
      const page = await browser.newPage({ viewport: { width: vp.width, height: vp.height } });

      const pageErrors = [];
      const consoleErrors = [];
      const failedRequests = [];

      page.on('pageerror', err => pageErrors.push(err.message));
      page.on('console', msg => {
        if (msg.type() === 'error') consoleErrors.push(msg.text());
      });
      page.on('requestfailed', req => {
        failedRequests.push({ url: req.url(), failure: req.failure() ? req.failure().errorText : 'failed' });
      });
      page.on('response', res => {
        if (res.status() >= 400) {
          failedRequests.push({ url: res.url(), status: res.status() });
        }
      });

      try {
        await page.goto(`http://127.0.0.1:${PORT}/${hf}`, { waitUntil: 'networkidle', timeout: 8000 });
        await page.waitForTimeout(500);

        // Check horizontal overflow
        const overflow = await page.evaluate(() => {
          const sw = document.documentElement.scrollWidth;
          const cw = document.documentElement.clientWidth;
          return { scrollWidth: sw, clientWidth: cw, hasOverflow: sw > cw, diff: sw - cw };
        });

        if (overflow.hasOverflow) {
          runtimeIssues.push({
            file: hf,
            viewport: vp.name,
            type: 'HORIZONTAL_OVERFLOW',
            detail: `scrollWidth (${overflow.scrollWidth}px) > clientWidth (${overflow.clientWidth}px) by ${overflow.diff}px`
          });
        }

        // Check for broken images (naturalWidth === 0)
        const brokenImgs = await page.evaluate(() => {
          const imgs = Array.from(document.querySelectorAll('img'));
          return imgs
            .filter(img => img.complete && img.naturalWidth === 0 && img.src && !img.src.endsWith('.svg'))
            .map(img => img.src);
        });

        for (const bImg of brokenImgs) {
          runtimeIssues.push({
            file: hf,
            viewport: vp.name,
            type: 'BROKEN_IMAGE',
            detail: bImg
          });
        }

        // Check interactive menu / burger
        if (vp.isMobile) {
          const burgerExists = await page.$('.hud__burger, #burger');
          if (burgerExists) {
            const isVisible = await page.evaluate(el => {
              const s = window.getComputedStyle(el);
              return s.display !== 'none' && s.visibility !== 'hidden' && s.opacity !== '0';
            }, burgerExists);

            if (isVisible) {
              // Try clicking burger
              await burgerExists.click();
              await page.waitForTimeout(300);

              const menuVisible = await page.evaluate(() => {
                const m = document.querySelector('#menu, .menu');
                if (!m) return false;
                const s = window.getComputedStyle(m);
                return !m.hidden && s.display !== 'none' && s.visibility !== 'hidden';
              });

              if (!menuVisible) {
                runtimeIssues.push({
                  file: hf,
                  viewport: vp.name,
                  type: 'BURGER_CLICK_FAILED',
                  detail: 'Burger was clicked but menu remained hidden or not visible'
                });
              } else {
                // Try closing menu
                const closeBtn = await page.$('#menu-close, .menu__close');
                if (closeBtn) {
                  await closeBtn.click();
                  await page.waitForTimeout(300);
                }
              }
            }
          }
        }

        if (pageErrors.length > 0) {
          runtimeIssues.push({ file: hf, viewport: vp.name, type: 'PAGE_ERROR', detail: pageErrors.join('; ') });
        }
        if (consoleErrors.length > 0) {
          runtimeIssues.push({ file: hf, viewport: vp.name, type: 'CONSOLE_ERROR', detail: consoleErrors.join('; ') });
        }
        if (failedRequests.length > 0) {
          runtimeIssues.push({ file: hf, viewport: vp.name, type: 'FAILED_REQUEST', detail: JSON.stringify(failedRequests) });
        }

      } catch (err) {
        runtimeIssues.push({ file: hf, viewport: vp.name, type: 'PAGE_LOAD_ERROR', detail: err.message });
      } finally {
        await page.close();
      }
    }
  }

  await browser.close();
  server.close();

  console.log('\n========================================');
  console.log('3. SUMMARY OF RUNTIME AUDIT');
  console.log('========================================');
  if (runtimeIssues.length === 0) {
    console.log('✓ ZERO runtime errors, 404s, broken images, or overflow issues detected!');
  } else {
    console.log(`Found ${runtimeIssues.length} runtime issues:`);
    for (const iss of runtimeIssues) {
      console.log(`  [${iss.type}] ${iss.file} (${iss.viewport}): ${iss.detail}`);
    }
  }

  // Write full audit report
  fs.writeFileSync('audit-report.json', JSON.stringify({ diskIssues, runtimeIssues }, null, 2));
  console.log('\nFull report saved to audit-report.json');
});

const http = require('http');
const fs = require('fs');
const path = require('path');
const { chromium } = require('playwright');

const mime = {
  '.html': 'text/html',
  '.css': 'text/css',
  '.js': 'text/javascript',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.svg': 'image/svg+xml'
};

const server = http.createServer((req, res) => {
  let f = req.url.split('?')[0];
  if (f === '/') f = '/index.html';
  const p = path.join(process.cwd(), f);
  fs.readFile(p, (err, data) => {
    if (err) { res.writeHead(404); res.end('404'); return; }
    const ext = path.extname(p).toLowerCase();
    res.writeHead(200, { 'Content-Type': mime[ext] || 'application/octet-stream' });
    res.end(data);
  });
});

server.listen(8464, '127.0.0.1', async () => {
  const b = await chromium.launch();
  const pages = [
    { url: '/index.html', name: 'index' },
    { url: '/skipthedealer.html', name: 'skipthedealer' },
    { url: '/autodnaflip.html', name: 'autodnaflip' },
    { url: '/dnaservice.html', name: 'dnaservice' },
    { url: '/skiptheshop.html', name: 'skiptheshop' },
    { url: '/drivecareplan.html', name: 'drivecareplan' }
  ];

  for (const p of pages) {
    const page = await b.newPage({ viewport: { width: 393, height: 852 } });
    await page.goto('http://127.0.0.1:8464' + p.url, { waitUntil: 'networkidle' });
    await page.waitForTimeout(300);

    const scrollWidth = await page.evaluate(() => document.documentElement.scrollWidth);
    const clientWidth = await page.evaluate(() => document.documentElement.clientWidth);
    const hasHorizScroll = scrollWidth > clientWidth;

    const burgerState = await page.evaluate(() => {
      const el = document.querySelector('.hud__burger, #burger');
      if (!el) return 'none';
      const s = window.getComputedStyle(el);
      return s.display + '/' + s.visibility + '/opacity:' + s.opacity;
    });

    console.log('PAGE ' + p.name + ': scrollWidth=' + scrollWidth + ', clientWidth=' + clientWidth + ', horiz=' + hasHorizScroll + ', burger=' + burgerState);

    await page.screenshot({ path: '.tmp/calque/mob_eval_' + p.name + '_top.png' });

    await page.evaluate(() => window.scrollTo(0, 1000));
    await page.waitForTimeout(200);
    await page.screenshot({ path: '.tmp/calque/mob_eval_' + p.name + '_mid.png' });

    await page.close();
  }

  await b.close();
  server.close();
  console.log('Finished evaluation!');
});

/**
 * Figma → static HTML, deterministically.
 *
 * Nothing here guesses. Every element is placed at the absolute coordinates Figma reports,
 * every font size / weight / tracking / line height comes from the node's own style, and every
 * non-text leaf is exported as SVG from the Figma image API.
 *
 * Usage: node tools/figma-render.cjs <frame-key>
 */
const fs = require('fs');
const path = require('path');

const TOKEN = fs.readFileSync('.env.local', 'utf8').match(/FIGMA_TOKEN=(.+)/)[1].trim();
const FILE = '0Juy3YhdvAU4IML7d2gyh2';
const TREE = '.tmp/full.json';
const OUT = 'build';

const FRAMES = {
  main: { id: '464:3249', file: 'index.html', title: 'AutoDNA — the genetic code' },
  dealer: { id: '464:4868', file: 'skipthedealer.html', title: 'AutoDNA — SkipTheDealer' },
  invest: { id: '464:5846', file: 'invest.html', title: 'AutoDNA — Invest in cars' },
  service: { id: '464:6132', file: 'service.html', title: 'AutoDNA — The future of service' },
};

/* ---------------------------------------------------------------- figma api */

const CACHE = '.tmp/image-cache.json';
function loadCache() {
  try { return JSON.parse(fs.readFileSync(CACHE, 'utf8')); } catch { return {}; }
}
function saveCache(c) {
  fs.mkdirSync(path.dirname(CACHE), { recursive: true });
  fs.writeFileSync(CACHE, JSON.stringify(c));
}

async function imageUrls(ids, format) {
  const cache = loadCache();
  const key = (id) => `${format}:${id}`;
  const missing = ids.filter((id) => !cache[key(id)]);
  if (!missing.length) return Object.fromEntries(ids.map((id) => [id, cache[key(id)]]));

  const url = `https://api.figma.com/v1/images/${FILE}?ids=${missing.map(encodeURIComponent).join(',')}&format=${format}&scale=1`;
  for (let attempt = 0; attempt < 12; attempt++) {
    const res = await fetch(url, { headers: { 'X-Figma-Token': TOKEN } });
    if (res.ok) {
      const json = await res.json();
      const got = json.images || {};
      for (const [id, u] of Object.entries(got)) if (u) cache[key(id)] = u;
      saveCache(cache);
      return Object.fromEntries(ids.map((id) => [id, cache[key(id)]]).filter(([, u]) => u));
    }
    if (res.status === 429) {
      const wait = 20000 * (attempt + 1);
      process.stdout.write(`  throttle, wait ${Math.round(wait / 1000)}s\n`);
      await new Promise((r) => setTimeout(r, wait));
      continue;
    }
    throw new Error(`figma images ${res.status}`);
  }
  throw new Error('figma images: rate limited');
}

async function download(url, dest) {
  const res = await fetch(url);
  if (!res.ok) throw new Error(`download ${res.status}`);
  const buf = Buffer.from(await res.arrayBuffer());
  fs.mkdirSync(path.dirname(dest), { recursive: true });
  fs.writeFileSync(dest, buf);
  return buf;
}

/* ------------------------------------------------------------------- helpers */

const esc = (s) => s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');

function rgba(c) {
  if (!c) return null;
  const r = Math.round(c.r * 255);
  const g = Math.round(c.g * 255);
  const b = Math.round(c.b * 255);
  const a = c.a === undefined ? 1 : c.a;
  return a >= 0.999 ? `#${[r, g, b].map((v) => v.toString(16).padStart(2, '0')).join('')}` : `rgba(${r},${g},${b},${a.toFixed(3)})`;
}

function solidFill(node) {
  const fill = (node.fills || []).find((f) => f.type === 'SOLID' && f.visible !== false);
  return fill ? rgba({ ...fill.color, a: (fill.color.a ?? 1) * (fill.opacity ?? 1) }) : null;
}

function box(node, originX, originY) {
  const b = node.absoluteBoundingBox;
  if (!b) return null;
  return {
    left: +(b.x - originX).toFixed(2),
    top: +(b.y - originY).toFixed(2),
    width: +b.width.toFixed(2),
    height: +b.height.toFixed(2),
  };
}

function hasText(n) {
  if (n.type === 'TEXT') return true;
  return (n.children || []).some(hasText);
}

/** Text nodes, absolutely placed with their own type metrics. */
function renderText(node, originX, originY) {
  const b = box(node, originX, originY);
  if (!b) return '';
  const s = node.style || {};
  const color = solidFill(node) || '#ffffff';
  const raw = node.characters || '';

  // Figma exposes line height as FONT_SIZE_% — resolve it against the font size.
  const lh = s.lineHeightUnit === 'FONT_SIZE_%'
    ? (s.fontSize * s.lineHeightPercentFontSize) / 100
    : s.lineHeightPx || s.fontSize * 1.2;

  const tracking = s.letterSpacing || 0;
  const align = (s.textAlignHorizontal || 'LEFT').toLowerCase();
  const transform = s.textCase === 'UPPER' ? 'uppercase' : s.textCase === 'LOWER' ? 'lowercase' : 'none';

  const style = [
    'position:absolute',
    `left:${b.left}px`,
    `top:${b.top}px`,
    `font-family:'${s.fontFamily || 'Helvetica Neue'}',sans-serif`,
    `font-size:${+(s.fontSize || 16).toFixed(2)}px`,
    `font-weight:${s.fontWeight || 400}`,
    `line-height:${+lh.toFixed(2)}px`,
    tracking ? `letter-spacing:${+tracking.toFixed(2)}px` : '',
    `color:${color}`,
    `text-transform:${transform}`,
    align === 'center' ? 'text-align:center;width:' + b.width + 'px' : '',
    align === 'right' ? 'text-align:right;width:' + b.width + 'px' : '',
    s.textAlignVertical === 'CENTER' ? 'display:flex;align-items:center;height:' + b.height + 'px' : '',
    'white-space:pre-wrap',
    'margin:0',
  ].filter(Boolean).join(';');

  return `<p style="${style}">${esc(raw)}</p>`;
}

/* ------------------------------------------------------------------- collect */

async function main() {
  const frameKey = process.argv[2];
  const frame = FRAMES[frameKey];
  if (!frame) throw new Error(`unknown frame: ${frameKey}`);

  const doc = JSON.parse(fs.readFileSync(TREE, 'utf8'));
  const page = doc.document.children[0];
  let root = null;
  (function walk(n) {
    if (n.id === frame.id) root = n;
    for (const c of n.children || []) walk(c);
  })(page);
  if (!root) throw new Error(`frame ${frame.id} not in tree`);

  const origin = root.absoluteBoundingBox;
  const ox = origin.x;
  const oy = origin.y;

  // Background layers are full-frame vectors/rects; they are exported as one image so the
  // gradients and glows are byte-identical to the design instead of approximated in CSS.
  const assets = [];
  const texts = [];

  (function collect(n) {
    if (n.type === 'TEXT') { texts.push(n); return; }
    if (n.id === frame.id) { for (const c of n.children || []) collect(c); return; }
    if (!hasText(n)) { assets.push(n); return; }
    for (const c of n.children || []) collect(c);
  })(root);

  console.log(`${frameKey}: ${texts.length} text nodes, ${assets.length} asset nodes`);

  // 1. export every asset node as SVG, then rasterise the huge background ones to PNG
  const ids = assets.map((n) => n.id);
  const svgs = {};
  for (let i = 0; i < ids.length; i += 40) {
    const chunk = ids.slice(i, i + 40);
    const urls = await imageUrls(chunk, 'png');
    for (const [id, url] of Object.entries(urls)) if (url) svgs[id] = url;
    process.stdout.write(`  svg batch ${Math.floor(i / 40) + 1}: ${Object.keys(urls).length}\n`);
  }

  const assetDir = path.join(OUT, frameKey, 'assets');
  fs.mkdirSync(assetDir, { recursive: true });

  const placed = [];
  let index = 0;
  for (const node of assets) {
    const url = svgs[node.id];
    if (!url) continue;
    const slug = `${String(++index).padStart(3, '0')}-${(node.name || 'layer').toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '').slice(0, 32) || 'layer'}`;
    const dest = path.join(assetDir, `${slug}.png`);
    try {
      await download(url, dest);
    } catch (e) {
      console.log(`  skip ${node.id}: ${e.message}`);
      continue;
    }
    const b = box(node, ox, oy);
    if (!b) continue;
    placed.push({ file: `assets/${slug}.png`, ...b, opacity: node.opacity ?? 1 });
  }

  // 2. build the page
  const body = [];
  for (const a of placed) {
    body.push(
      `<img src="${a.file}" alt="" style="position:absolute;left:${a.left}px;top:${a.top}px;width:${a.width}px;height:${a.height}px;opacity:${a.opacity}">`
    );
  }
  for (const t of texts) body.push(renderText(t, ox, oy));

  const html = `<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=${Math.round(origin.width)}">
<title>${esc(frame.title)}</title>
<link rel="stylesheet" href="fonts.css">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  html, body { background: #020202; }
  body { position: relative; width: ${Math.round(origin.width)}px; height: ${Math.round(origin.height)}px; overflow: hidden; }
</style>
</head>
<body>
${body.join('\n')}
</body>
</html>
`;

  fs.mkdirSync(path.join(OUT, frameKey), { recursive: true });
  fs.writeFileSync(path.join(OUT, frameKey, frame.file), html);
  console.log(`  wrote ${OUT}/${frameKey}/${frame.file}: ${placed.length} images, ${texts.length} texts`);
}

main().catch((e) => { console.error(e); process.exit(1); });

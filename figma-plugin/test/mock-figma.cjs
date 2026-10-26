// Figma Plugin API mock — mirrors the documented TextNode surface:
// characters, fontName {family, style}, fontSize, lineHeight {unit,value},
// letterSpacing {unit,value}, textAlignHorizontal, textCase, textDecoration,
// fills/strokes/effects, layout props, absoluteBoundingBox, children.
// NOTE: there is NO `.style` on TextNode — that was the bug.
const mixed = Symbol('mixed');

function textNode(name, chars, font, x, y, w, h) {
  return {
    id: '1:1', name, type: 'TEXT', characters: chars,
    fontName: { family: font.family, style: font.style },
    fontSize: font.size,
    lineHeight: font.lhUnit === 'PIXELS' ? { unit: 'PIXELS', value: font.lh } : { unit: 'AUTO' },
    letterSpacing: font.lsUnit === 'PIXELS' ? { unit: 'PIXELS', value: font.ls } : { unit: 'PERCENT', value: 0 },
    textAlignHorizontal: font.align || 'LEFT',
    textCase: font.case || 'ORIGINAL',
    textDecoration: font.deco || 'NONE',
    textAutoResize: 'WIDTH_AND_HEIGHT',
    fills: [{ type: 'SOLID', visible: true, opacity: 1, color: { r: 1, g: 1, b: 1 } }],
    strokes: [],
    effects: [],
    absoluteBoundingBox: { x, y, width: w, height: h },
  };
}

const frame = {
  id: '0:1', name: 'main', type: 'FRAME',
  absoluteBoundingBox: { x: 100, y: 200, width: 1440, height: 800 },
  fills: [{ type: 'SOLID', visible: true, opacity: 1, color: { r: 0.02, g: 0.02, b: 0.03 } }],
  strokes: [],
  effects: [],
  layoutMode: 'NONE',
  children: [
    textNode('AutoDNA Service', 'AutoDNA Service',
      { family: 'Helvetica Neue', style: 'Light', size: 15, lhUnit: 'PIXELS', lh: 15, lsUnit: 'PIXELS', ls: -0.4 },
      1149, 376, 141, 15),
    textNode('the genetic code', 'the genetic code',
      { family: 'Orbitron', style: 'Medium', size: 132, lhUnit: 'AUTO', lsUnit: 'PERCENT', case: 'UPPER' },
      124, 629, 1390, 112),
    {
      id: '1:3', name: 'card', type: 'FRAME',
      absoluteBoundingBox: { x: 200, y: 900, width: 291, height: 200 },
      fills: [{ type: 'IMAGE', visible: true, scaleMode: 'FILL', imageHash: 'abc123' }], strokes: [{ type: 'SOLID', visible: true, opacity: 1, color: { r: 0.5, g: 0.4, b: 1 } }],
      strokeWeight: 1, strokeAlign: 'INSIDE',
      cornerRadius: 12,
      effects: [{ type: 'DROP_SHADOW', visible: true, radius: 24, spread: 0, offset: { x: 0, y: 8 }, color: { r: 0, g: 0, b: 0, a: 0.5 } }],
      opacity: 0.9,
      layoutMode: 'VERTICAL', itemSpacing: 16,
      paddingTop: 20, paddingRight: 20, paddingBottom: 20, paddingLeft: 20,
      primaryAxisAlignItems: 'MIN', counterAxisAlignItems: 'MIN',
      children: [],
    },
  ],
};

// mixed-style node: fontName is figma.mixed, must not throw
const mixedNode = textNode('mixed copy', 'Bold and light words',
  { family: 'Helvetica Neue', style: 'Regular', size: 20, lhUnit: 'AUTO', lsUnit: 'PERCENT' },
  100, 1200, 300, 24);
mixedNode.fontName = mixed;
frame.children.push(mixedNode);


// styled-runs node: "SAVE 30-50%" where "30-50%" is accented
const runsNode = textNode('save more', 'SAVE 30-50%',
  { family: 'Helvetica Neue', style: 'Light', size: 40, lhUnit: 'AUTO', lsUnit: 'PERCENT' },
  100, 1400, 400, 44);
runsNode.getStyledTextSegments = () => ([
  { start: 0, end: 5, characters: 'SAVE ', fontName: { family: 'Helvetica Neue', style: 'Light' }, fontSize: 40,
    fills: [{ type: 'SOLID', visible: true, opacity: 1, color: { r: 1, g: 1, b: 1 } }], textDecoration: 'NONE' },
  { start: 5, end: 11, characters: '30-50%', fontName: { family: 'Helvetica Neue', style: 'Bold' }, fontSize: 40,
    fills: [{ type: 'SOLID', visible: true, opacity: 1, color: { r: 0.59, g: 0.52, b: 1 } }], textDecoration: 'NONE' },
]);
frame.children.push(runsNode);

// gradient vector
frame.children.push({
  id: '1:5', name: 'Ellipse 5', type: 'ELLIPSE',
  absoluteBoundingBox: { x: 200, y: 1500, width: 1504, height: 716 },
  fills: [{ type: 'GRADIENT_LINEAR', visible: true, opacity: 1,
    gradientStops: [
      { position: 0, color: { r: 0.09, g: 0.09, b: 0.14 } },
      { position: 0.466, color: { r: 0.32, g: 0.25, b: 0.78 } },
      { position: 1, color: { r: 0.09, g: 0.09, b: 0.14 } },
    ],
    gradientTransform: [[1, 0, 0], [0, 1, 0]] }],
  strokes: [], effects: [],
});

let posted = null;
global.__html__ = '<html></html>';
global.figma = {
  mixed,
  root: { name: 'AUTODNA (Copy)' },
  currentPage: { selection: [frame], children: [frame] },
  loadFontAsync: async (f) => {
    if (f && f.family === 'Helvetica Neue') throw new Error('The font "Helvetica Neue Light" could not be loaded');
  },
  showUI: () => {},
  ui: { postMessage: (m) => { posted = m; } },
  closePlugin: () => {},
};

(async () => {
  require('../code.js');
  await figma.ui.onmessage({ type: 'dump' });
  if (!posted || posted.type !== 'result') { console.log('FAIL: no result posted:', JSON.stringify(posted)); process.exit(1); }
  const out = JSON.stringify(posted.payload.length === 1 ? posted.payload[0] : posted.payload, null, 2);
  require('fs').writeFileSync('mock-dump.json', out);
  console.log('dump ok,', out.length, 'chars');

  // case 2: nothing selected -> dumps every top-level frame
  posted = null;
  figma.currentPage.selection = [];
  await figma.ui.onmessage({ type: 'dump' });
  console.log('empty-selection:', posted.type, 'frames:', posted.payload && posted.payload.length);

  // case 3: page without frames -> clean error, no crash
  posted = null;
  figma.currentPage.children = [{ id: '9:9', name: 'loose text', type: 'TEXT' }];
  await figma.ui.onmessage({ type: 'dump' });
  console.log('no-frames:', posted.type, '|', posted.message);
})().catch((e) => { console.log('FAIL:', e.message); process.exit(1); });

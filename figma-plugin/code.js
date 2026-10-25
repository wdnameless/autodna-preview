/**
 * AutoDNA — dump the selected frame as JSON.
 *
 * This is the free stand-in for Figma's MCP `get_design_context` / `get_metadata`:
 * it walks the node tree and writes every value the build needs — absolute geometry,
 * fills, strokes, corner radius, and for text its font, size, weight, spacing, line
 * height and the actual characters. Run it once per frame, save the JSON next to the
 * SVG, and the build reads values instead of guessing them.
 *
 * Select a frame (or several) in Figma, then run: Plugins → Development → AutoDNA dump.
 */

figma.showUI(__html__, { width: 420, height: 460 });

/** Collects one node, flattening anything the page would need as CSS. */
function describe(node, parentAbs) {
  const out = {
    id: node.id,
    name: node.name,
    type: node.type
  };

  if (typeof node.absoluteBoundingBox === 'object' && node.absoluteBoundingBox) {
    const b = node.absoluteBoundingBox;
    out.abs = { x: r(b.x), y: r(b.y), w: r(b.width), h: r(b.height) };
    // position relative to the frame being dumped — this is what CSS uses
    out.rel = { x: r(b.x - parentAbs.x), y: r(b.y - parentAbs.y) };
  }

  // text: everything a font substitution would otherwise ruin
  if (node.type === 'TEXT') {
    const t = node;
    out.text = t.characters;
    const s = t.style || {};
    out.font = {
      family: s.fontFamily,
      weight: s.fontWeight,
      size: s.fontSize,
      lineHeight: s.lineHeightPx != null ? r(s.lineHeightPx) : undefined,
      letterSpacing: s.letterSpacing != null ? r(s.letterSpacing) : undefined,
      letterSpacingUnit: s.letterSpacingUnit,
      align: s.textAlignHorizontal,
      transform: s.textCase,
      decoration: s.textDecoration
    };
    out.textAutoResize = t.textAutoResize;
  }

  // paints: fills, strokes, effects
  if (Array.isArray(node.fills) && node.fills.length) {
    out.fills = node.fills.filter((f) => f.visible !== false).map(paint);
  }
  if (Array.isArray(node.strokes) && node.strokes.length) {
    out.strokes = node.strokes.filter((f) => f.visible !== false).map(paint);
    out.strokeWeight = node.strokeWeight;
    out.strokeAlign = node.strokeAlign;
  }
  if (typeof node.cornerRadius === 'number') out.radius = node.cornerRadius;
  if (typeof node.cornerRadius === 'symbol') {
    out.radius = {
      tl: node.topLeftRadius, tr: node.topRightRadius,
      bl: node.bottomLeftRadius, br: node.bottomRightRadius
    };
  }
  if (Array.isArray(node.effects) && node.effects.length) {
    out.effects = node.effects.filter((e) => e.visible !== false).map((e) => ({
      type: e.type,
      radius: e.radius,
      spread: e.spread,
      offset: e.offset,
      color: e.color ? rgba(e.color) : undefined
    }));
  }
  if (typeof node.opacity === 'number' && node.opacity !== 1) out.opacity = node.opacity;

  // layout, when the frame uses auto layout
  if (node.layoutMode && node.layoutMode !== 'NONE') {
    out.layout = {
      mode: node.layoutMode,
      gap: node.itemSpacing,
      pad: [node.paddingTop, node.paddingRight, node.paddingBottom, node.paddingLeft],
      primary: node.primaryAxisAlignItems,
      counter: node.counterAxisAlignItems
    };
  }

  if ('children' in node && node.children.length) {
    out.children = node.children.map((c) => describe(c, parentAbs));
  }

  return out;
}

function r(n) {
  return Math.round(n * 1000) / 1000;
}

function rgba(c) {
  const hex = (v) => Math.round(v * 255).toString(16).padStart(2, '0');
  return `#${hex(c.r)}${hex(c.g)}${hex(c.b)}${c.a != null && c.a < 1 ? hex(c.a) : ''}`;
}

function paint(p) {
  if (p.type === 'SOLID') {
    return { type: 'solid', color: rgba(p.color), opacity: p.opacity };
  }
  if (p.type.indexOf('GRADIENT') === 0) {
    return {
      type: p.type,
      stops: (p.gradientStops || []).map((s) => ({
        at: r(s.position),
        color: rgba(s.color)
      })),
      transform: p.gradientTransform
    };
  }
  if (p.type === 'IMAGE') {
    return { type: 'image', scaleMode: p.scaleMode, imageHash: p.imageHash };
  }
  return { type: p.type };
}

/** Everything Figma knows about a frame, as one object. */
function dump(node) {
  const box = node.absoluteBoundingBox || { x: 0, y: 0, width: 0, height: 0 };
  return {
    file: figma.root.name,
    frame: node.name,
    frameSize: { w: r(box.width), h: r(box.height) },
    dumpedAt: new Date().toISOString(),
    tree: describe(node, box)
  };
}

figma.ui.onmessage = (msg) => {
  if (msg.type === 'close') {
    figma.closePlugin();
    return;
  }

  if (msg.type !== 'dump') return;

  const selection = figma.currentPage.selection;
  if (!selection.length) {
    figma.ui.postMessage({ type: 'error', message: 'Select at least one frame first.' });
    return;
  }

  const results = selection.map(dump);
  figma.ui.postMessage({ type: 'result', payload: results });
};

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
async function describe(node, parentAbs) {
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

  // text: everything a font substitution would otherwise ruin.
  // NOTE: TextNode has NO `.style` property — font data lives directly on the
  // node (fontName/fontSize/lineHeight/letterSpacing/...). Reading `.style`
  // yields {} and the dump silently loses every font. Verified against a mock
  // of the documented API surface (.tmp/mock-figma.cjs).
  if (node.type === 'TEXT') {
    const t = node;
    out.text = t.characters;

    // styled runs: mixed fonts/sizes inside one node (e.g. "SAVE 30-50%" with
    // an accented word) — record per-run so the build can wrap them in spans
    let runs = null;
    try {
      if (typeof t.getStyledTextSegments === 'function') {
        const segs = t.getStyledTextSegments(['fontName', 'fontSize', 'fills', 'textDecoration']);
        if (segs && segs.length > 1) {
          runs = segs.map((s) => ({
            start: s.start,
            end: s.end,
            chars: s.characters,
            family: s.fontName && s.fontName !== figma.mixed ? s.fontName.family : undefined,
            weight: s.fontName && s.fontName !== figma.mixed ? s.fontName.style : undefined,
            size: s.fontSize !== figma.mixed ? s.fontSize : undefined,
            fills: Array.isArray(s.fills) ? s.fills.filter((f) => f.visible !== false).map(paint) : undefined,
            decoration: s.textDecoration !== figma.mixed ? s.textDecoration : undefined
          }));
        }
      }
    } catch (_) { /* segments are optional; base fields below are enough */ }
    if (runs) out.runs = runs;

    // base style: readable only after the font is loaded; without the await a
    // real Figma throws and the mock below would too
    let font = {}, align, transform, decoration, autoResize;
    try {
      if (t.fontName && t.fontName !== figma.mixed) {
        await figma.loadFontAsync(t.fontName);
      }
      const lh = t.lineHeight;
      const ls = t.letterSpacing;
      font = {
        family: t.fontName && t.fontName !== figma.mixed ? t.fontName.family : undefined,
        weight: t.fontName && t.fontName !== figma.mixed ? t.fontName.style : undefined,
        size: t.fontSize !== figma.mixed ? t.fontSize : undefined,
        lineHeight: lh && lh !== figma.mixed && lh.unit === 'PIXELS' ? r(lh.value) : undefined,
        lineHeightUnit: lh && lh !== figma.mixed ? lh.unit : undefined,
        letterSpacing: ls && ls !== figma.mixed && ls.unit === 'PIXELS' ? r(ls.value) : undefined,
        letterSpacingUnit: ls && ls !== figma.mixed ? ls.unit : undefined
      };
      align = t.textAlignHorizontal !== figma.mixed ? t.textAlignHorizontal : undefined;
      transform = t.textCase !== figma.mixed ? t.textCase : undefined;
      decoration = t.textDecoration !== figma.mixed ? t.textDecoration : undefined;
      autoResize = t.textAutoResize;
    } catch (e) {
      // the font is missing on this machine (e.g. Helvetica Neue on Windows
      // without it installed) — loadFontAsync throws and every field guarded
      // by it would be lost. fontName/fontSize are plain values, not style
      // reads, so retry them individually: each in its own try, whatever
      // survives is still exact data for the build.
      font = { _error: String(e), _partial: true };
      const grab = (fn, key) => { try { const v = fn(); if (v !== undefined && v !== figma.mixed) font[key] = v; } catch { } };
      grab(() => t.fontName.family, 'family');
      grab(() => t.fontName.style, 'weight');
      grab(() => t.fontSize, 'size');
      grab(() => t.lineHeight.unit === 'PIXELS' ? r(t.lineHeight.value) : undefined, 'lineHeight');
      grab(() => t.lineHeight.unit, 'lineHeightUnit');
      grab(() => t.letterSpacing.unit === 'PIXELS' ? r(t.letterSpacing.value) : undefined, 'letterSpacing');
      grab(() => t.letterSpacing.unit, 'letterSpacingUnit');
      grab(() => t.textAlignHorizontal, 'align_tmp');
      if (font.align_tmp) { align = font.align_tmp; delete font.align_tmp; }
      grab(() => t.textCase, 'transform_tmp');
      if (font.transform_tmp) { transform = font.transform_tmp; delete font.transform_tmp; }
      grab(() => t.textDecoration, 'decoration_tmp');
      if (font.decoration_tmp) { decoration = font.decoration_tmp; delete font.decoration_tmp; }
      grab(() => t.textAutoResize, 'autoResize_tmp');
      if (font.autoResize_tmp) { autoResize = font.autoResize_tmp; delete font.autoResize_tmp; }
    }
    out.font = font;
    if (align) out.align = align;
    if (transform && transform !== 'ORIGINAL') out.transform = transform;
    if (decoration && decoration !== 'NONE') out.decoration = decoration;
    if (autoResize) out.textAutoResize = autoResize;
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
    out.children = [];
    for (const child of node.children) {
      out.children.push(await describe(child, parentAbs));
    }
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
async function dump(node) {
  const box = node.absoluteBoundingBox || { x: 0, y: 0, width: 0, height: 0 };
  return {
    file: figma.root.name,
    frame: node.name,
    frameSize: { w: r(box.width), h: r(box.height) },
    dumpedAt: new Date().toISOString(),
    tree: await describe(node, box)
  };
}

figma.ui.onmessage = async (msg) => {
  if (msg.type === 'close') {
    figma.closePlugin();
    return;
  }

  if (msg.type !== 'dump') return;

  // Selecting is optional: with nothing selected the plugin dumps every top-level
  // frame on the current page, which is the usual case for a board file.
  const selection = figma.currentPage.selection;
  const targets = selection.length
    ? selection
    : figma.currentPage.children.filter(function (n) {
        return n.type === 'FRAME' || n.type === 'COMPONENT' || n.type === 'SECTION';
      });

  if (!targets.length) {
    figma.ui.postMessage({ type: 'error', message: 'No frames on this page.' });
    return;
  }

  const results = [];
  for (const node of targets) {
    results.push(await dump(node));
  }
  figma.ui.postMessage({ type: 'result', payload: results });
};

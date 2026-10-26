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
 *
 * v2 for 1:1 builds additionally captures:
 * - vector geometry (fillGeometry paths) so HUD lines/elisions become exact SVG
 * - stroke geometry + weight/cap/join/dash for thin vector strokes
 * - image bytes (exportAsync PNG) keyed by node id, so photos don't need the API
 * - rotation, blend mode, visibility, lock, clipsContent, individual stroke weights
 * - per-side radius already existed; constraints and min/max size added for responsive
 */

figma.showUI(__html__, { width: 420, height: 500 });

/** Collects one node, flattening anything the page would need as CSS. */
async function describe(node, parentAbs, ctx) {
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

  // visibility / lock: hidden and locked layers explain phantom boxes
  if (node.visible === false) out.hidden = true;
  if (node.locked) out.locked = true;
  if (typeof node.opacity === 'number' && node.opacity !== 1) out.opacity = r(node.opacity);
  if (node.blendMode && node.blendMode !== 'NORMAL' && node.blendMode !== 'PASS_THROUGH') {
    out.blend = node.blendMode;
  }
  if (typeof node.rotation === 'number' && node.rotation !== 0) out.rotation = r(node.rotation * 180 / Math.PI);

  // text: everything a font substitution would otherwise ruin.
  // NOTE: TextNode has NO `.style` property — font data lives directly on the
  // node (fontName/fontSize/lineHeight/letterSpacing/...). Reading `.style`
  // yields {} and the dump silently loses every font. Verified against a mock
  // of the documented API surface (test/mock-figma.cjs).
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
    } catch { /* segments are optional; base fields below are enough */ }
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

  // vector geometry: the exact path data behind lines, ticks and ellipses.
  // Without this the build re-draws HUD connectors by eye; with it they copy over.
  if ((node.type === 'VECTOR' || node.type === 'ELLIPSE' || node.type === 'LINE' ||
       node.type === 'POLYGON' || node.type === 'STAR') && Array.isArray(node.fillGeometry)) {
    try {
      const paths = node.fillGeometry.map((g) => g.data).filter(Boolean);
      if (paths.length) out.paths = paths;
      if (Array.isArray(node.strokeGeometry)) {
        const sp = node.strokeGeometry.map((g) => g.data).filter(Boolean);
        if (sp.length) out.strokePaths = sp;
      }
    } catch { /* geometry is best-effort */ }
  }

  // paints: fills, strokes, effects
  if (Array.isArray(node.fills) && node.fills.length) {
    out.fills = node.fills.filter((f) => f.visible !== false).map(paint);
    // image bytes: export the node itself so the build never needs /images.
    // Only for nodes whose own fill is an image (photos), not for frames that
    // merely contain them — keeps the payload small.
    const hasImage = node.fills.some((f) => f.type === 'IMAGE' && f.visible !== false);
    if (hasImage && typeof node.exportAsync === 'function' && ctx && ctx.images) {
      try {
        const bytes = await node.exportAsync({ format: 'PNG', constraint: { type: 'WIDTH', value: 1600 } });
        ctx.images[node.id] = {
          name: node.name,
          w: Math.round(node.width || 0),
          h: Math.round(node.height || 0),
          png: base64(bytes)
        };
        out.imageRef = node.id;
      } catch { /* export is best-effort; the SVG fallback still works */ }
    }
  }
  if (Array.isArray(node.strokes) && node.strokes.length) {
    out.strokes = node.strokes.filter((f) => f.visible !== false).map(paint);
    out.strokeWeight = node.strokeWeight;
    out.strokeAlign = node.strokeAlign;
    if (node.strokeCap && node.strokeCap !== figma.mixed) out.strokeCap = node.strokeCap;
    if (node.strokeJoin && node.strokeJoin !== figma.mixed) out.strokeJoin = node.strokeJoin;
    if (Array.isArray(node.dashPattern) && node.dashPattern.length) out.dash = node.dashPattern.map(r);
    if (node.strokeWeight !== figma.mixed && typeof node.strokeWeight !== 'number' &&
        node.strokeTopWeight !== undefined) {
      out.strokeSides = {
        top: node.strokeTopWeight, right: node.strokeRightWeight,
        bottom: node.strokeBottomWeight, left: node.strokeLeftWeight
      };
    }
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
      blend: e.blendMode !== 'NORMAL' ? e.blendMode : undefined,
      color: e.color ? rgba(e.color) : undefined
    }));
  }

  // containers
  if (typeof node.clipsContent === 'boolean') out.clips = node.clipsContent;
  if (node.constraints) out.constraints = { h: node.constraints.horizontal, v: node.constraints.vertical };
  if (typeof node.minWidth === 'number' && node.minWidth) out.minW = node.minWidth;
  if (typeof node.maxWidth === 'number' && node.maxWidth) out.maxW = node.maxWidth;
  if (typeof node.minHeight === 'number' && node.minHeight) out.minH = node.minHeight;
  if (typeof node.maxHeight === 'number' && node.maxHeight) out.maxH = node.maxHeight;

  // layout, when the frame uses auto layout
  if (node.layoutMode && node.layoutMode !== 'NONE') {
    out.layout = {
      mode: node.layoutMode,
      gap: node.itemSpacing,
      pad: [node.paddingTop, node.paddingRight, node.paddingBottom, node.paddingLeft],
      primary: node.primaryAxisAlignItems,
      counter: node.counterAxisAlignItems
    };
    if (node.layoutWrap && node.layoutWrap !== 'NO_WRAP') out.layout.wrap = node.layoutWrap;
  }
  // sizing inside auto layout parents
  if (node.layoutAlign && node.layoutAlign !== 'INHERIT') out.layoutAlign = node.layoutAlign;
  if (node.layoutGrow !== undefined && node.layoutGrow !== 0) out.layoutGrow = node.layoutGrow;

  // instances: which component, so repeated cards stay in sync
  if (node.type === 'INSTANCE' && node.mainComponent) {
    try { out.component = node.mainComponent.name; } catch {}
  }

  if ('children' in node && node.children.length) {
    out.children = [];
    for (const child of node.children) {
      out.children.push(await describe(child, parentAbs, ctx));
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
    return {
      type: 'image',
      scaleMode: p.scaleMode,
      imageHash: p.imageHash,
      transform: p.imageTransform,
      rotation: p.rotation
    };
  }
  return { type: p.type };
}

/** Uint8Array → base64 without blowing the stack on large images. */
function base64(bytes) {
  let s = '';
  const CH = 8192;
  for (let i = 0; i < bytes.length; i += CH) {
    s += String.fromCharCode.apply(null, bytes.subarray(i, i + CH));
  }
  // btoa exists in the plugin sandbox; the mock polyfills it
  if (typeof btoa === 'function') return btoa(s);
  if (typeof Buffer === 'function') return Buffer.from(bytes).toString('base64');
  return '';
}

/** Everything Figma knows about a frame, as one object. */
async function dump(node) {
  const box = node.absoluteBoundingBox || { x: 0, y: 0, width: 0, height: 0 };
  const ctx = { images: {} };
  const tree = await describe(node, box, ctx);
  const out = {
    file: figma.root.name,
    frame: node.name,
    frameSize: { w: r(box.width), h: r(box.height) },
    dumpedAt: new Date().toISOString(),
    plugin: 'autodna-dump/2',
    tree
  };
  if (Object.keys(ctx.images).length) out.images = ctx.images;
  return out;
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

  figma.ui.postMessage({ type: 'progress', message: 'Reading ' + targets.length + ' frame(s)…' });
  const results = [];
  for (const node of targets) {
    results.push(await dump(node));
  }
  figma.ui.postMessage({ type: 'result', payload: results });
};

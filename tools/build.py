"""
Figma tree → real HTML/CSS.

No raster base page. Every node is emitted as markup:

  * rectangles and ellipses with solid or gradient paint  -> div with CSS background
  * image fills                                            -> cropped photo file from the frame export
  * complex vectors (glows, marks, icons)                  -> cropped PNG, positioned as an img
  * text                                                   -> <p> at the node's own coordinates and type metrics

Geometry comes from absoluteBoundingBox, typography from the node's style, colour from its
paints. The frame PNG is only ever used as a source of pixels for artwork that cannot be
expressed in CSS — never as the page itself.

Usage: python tools/build.py <page>   |   python tools/build.py all
"""
import json
import os
import sys

from PIL import Image

TREE = '.tmp/full.json'
OUT = 'build'

PAGES = {
    'main':    ('464:3249', 'index.html',        'AutoDNA — the genetic code',       'figma/main.png'),
    'dealer':  ('464:4868', 'skipthedealer.html', 'AutoDNA — SkipTheDealer',         'figma/SkipTheDealer.png'),
    'invest':  ('464:5846', 'invest.html',        'AutoDNA — Invest in cars',        'figma/Invest in cars.png'),
    'service': ('464:6132', 'service.html',       'AutoDNA — The future of service', 'figma/The future of service.png'),
}

FONT_STACK = {
    'Orbitron': "'Orbitron', sans-serif",
    'Helvetica Neue': "'Helvetica Neue', Helvetica, Arial, sans-serif",
    'DM Sans': "'DM Sans', sans-serif",
}


def find(node, ident):
    if node.get('id') == ident:
        return node
    for child in node.get('children') or []:
        hit = find(child, ident)
        if hit:
            return hit
    return None


def walk(node):
    yield node
    for child in node.get('children') or []:
        yield from walk(child)


def css_colour(paint):
    colour = paint.get('color') or {}
    r = round(colour.get('r', 0) * 255)
    g = round(colour.get('g', 0) * 255)
    b = round(colour.get('b', 0) * 255)
    a = colour.get('a', 1) * paint.get('opacity', 1)
    if a >= 0.999:
        return f'#{r:02x}{g:02x}{b:02x}'
    return f'rgba({r},{g},{b},{a:.3f})'


def paint_background(node):
    """CSS background for a node, or None when it carries no paintable fill."""
    # gradients first — they are what the design relies on for glows
    for paint in node.get('fills') or []:
        if paint.get('type', '').startswith('GRADIENT') and paint.get('visible', True):
            stops = paint.get('gradientStops') or []
            if not stops:
                continue
            parts = [f"{css_colour(stop)} {stop.get('position', 0) * 100:.4f}%" for stop in stops]
            kind = paint['type']
            handle = paint.get('gradientHandlePositions') or []
            if kind == 'GRADIENT_RADIAL' and len(handle) >= 2:
                # approximate the centre from the handle pair
                cx = handle[0].get('x', 0.5) * 100
                cy = handle[0].get('y', 0.5) * 100
                return f"radial-gradient(circle at {cx:.1f}% {cy:.1f}%, {', '.join(parts)})"
            return f"linear-gradient({gradient_angle(paint)}deg, {', '.join(parts)})"

    fills = [p for p in (node.get('fills') or [])
             if p.get('type') == 'SOLID' and p.get('visible', True)]
    if fills:
        return css_colour(fills[0])
    return None


def gradient_angle(paint):
    handle = paint.get('gradientHandlePositions') or []
    if len(handle) < 2:
        return 180
    dx = handle[1].get('x', 0) - handle[0].get('x', 0)
    dy = handle[1].get('y', 0) - handle[0].get('y', 0)
    import math
    return int((math.degrees(math.atan2(dx, -dy)) + 360) % 360)


def border_radius(node):
    if node.get('cornerRadius'):
        return node['cornerRadius']
    radii = node.get('rectangleCornerRadii')
    if radii:
        return max(radii)
    return 0


def type_css(node):
    style = node.get('style') or {}
    size = style.get('fontSize', 16)
    if style.get('lineHeightUnit') == 'FONT_SIZE_%':
        line_height = size * style.get('lineHeightPercentFontSize', 100) / 100
    else:
        line_height = style.get('lineHeightPx', size * 1.2)
    family = FONT_STACK.get(style.get('fontFamily'), FONT_STACK['Helvetica Neue'])
    align = (style.get('textAlignHorizontal') or 'LEFT').lower()
    transform = {'UPPER': 'uppercase', 'LOWER': 'lowercase'}.get(style.get('textCase'), 'none')
    rules = [
        f'font-family:{family}',
        f'font-size:{size:.2f}px',
        f"font-weight:{style.get('fontWeight', 400)}",
        f'line-height:{line_height:.2f}px',
        f"letter-spacing:{style.get('letterSpacing', 0):.2f}px",
        f'text-transform:{transform}',
        f'text-align:{align}',
        'white-space:pre-wrap',
    ]
    return ';'.join(rules)


def text_fill(node):
    for paint in node.get('fills') or []:
        if paint.get('type') == 'SOLID' and paint.get('visible', True):
            return css_colour(paint)
    return '#ffffff'


def geom_style(node, x, y, w, h, extra=''):
    parts = [f'left:{x}px', f'top:{y}px', f'width:{w}px', f'height:{h}px']
    opacity = node.get('opacity')
    if opacity is not None and opacity < 0.999:
        parts.append(f'opacity:{opacity}')
    blend = node.get('blendMode')
    if blend in ('MULTIPLY', 'SCREEN', 'OVERLAY', 'SOFT_LIGHT', 'HARD_LIGHT',
                 'COLOR_DODGE', 'COLOR_BURN', 'DIFFERENCE', 'EXCLUSION', 'LUMINOSITY'):
        parts.append('mix-blend-mode:' + blend.lower().replace('_', '-'))
    return ';'.join(parts) + ';' + extra


def esc(text):
    return text.replace('&', '&amp;').replace('<', '&lt;').replace('>', '&gt;')


def is_plain(node):
    """A node we can draw with CSS alone."""
    return node.get('type') in ('RECTANGLE', 'ELLIPSE')


def build(key):
    frame_id, filename, title, png_path = PAGES[key]
    doc = json.load(open(TREE, encoding='utf-8'))
    frame = find(doc['document']['children'][0], frame_id)
    if frame is None:
        raise SystemExit('frame missing: ' + frame_id)

    origin = frame['absoluteBoundingBox']
    ox, oy, fx, fy = origin['x'], origin['y'], round(origin['width']), round(origin['height'])
    sheet = Image.open(png_path).convert('RGB')
    if sheet.size != (fx, fy):
        sheet = sheet.resize((fx, fy), Image.LANCZOS)

    out_dir = os.path.join(OUT, key)
    asset_dir = os.path.join(out_dir, 'assets')
    os.makedirs(asset_dir, exist_ok=True)
    for stale in os.listdir(asset_dir):
        os.remove(os.path.join(asset_dir, stale))

    # --- blank out baked text before cropping anything ---------------------
    from PIL import ImageDraw
    from statistics import median

    draw = ImageDraw.Draw(sheet)
    all_text = [n for n in walk(frame) if n.get('type') == 'TEXT' and n.get('absoluteBoundingBox')]
    counts = {}
    for node in all_text:
        counts[node.get('characters', '').strip()] = counts.get(node.get('characters', '').strip(), 0) + 1

    # A layer is artwork, not page copy, when the SAME string is stacked at nearly the same
    # place — the board builds the hero wordmark that way. Identical strings at distant
    # coordinates (a tab label and a panel heading) are real copy and stay as HTML.
    groups = {}
    for node in all_text:
        groups.setdefault(node.get('characters', '').strip(), []).append(node)

    baked = set()
    for text, nodes in groups.items():
        if len(nodes) < 2:
            continue
        for i, first in enumerate(nodes):
            a = first['absoluteBoundingBox']
            for second in nodes[i + 1:]:
                b = second['absoluteBoundingBox']
                if abs(a['x'] - b['x']) < 400 and abs(a['y'] - b['y']) < 400:
                    baked.add(first['id'])
                    baked.add(second['id'])

    text_nodes = [n for n in all_text if n['id'] not in baked]

    def bg_colour(box, pad=5):
        x1, y1, x2, y2 = box
        samples = []
        for x in range(max(0, x1 - pad), min(fx, x2 + pad)):
            for y in (max(0, y1 - pad), min(fy - 1, y2 + pad - 1)):
                samples.append(sheet.getpixel((x, y)))
        for y in range(max(0, y1 - pad), min(fy, y2 + pad)):
            for x in (max(0, x1 - pad), min(fx - 1, x2 + pad - 1)):
                samples.append(sheet.getpixel((x, y)))
        if not samples:
            return (2, 2, 2)
        return tuple(int(median(ch)) for ch in zip(*samples))

    for node in text_nodes:
        b = node['absoluteBoundingBox']
        box = (round(b['x'] - ox) - 2, round(b['y'] - oy) - 2,
               round(b['x'] - ox + b['width']) + 2, round(b['y'] - oy + b['height']) + 2)
        draw.rectangle(box, fill=bg_colour(box))

    layers, texts, crops = [], [], 0

    def rel(node):
        b = node['absoluteBoundingBox']
        return (round(b['x'] - ox, 2), round(b['y'] - oy, 2),
                round(b['width'], 2), round(b['height'], 2))

    def crop(node, tag, pad=0):
        nonlocal crops
        x, y, w, h = rel(node)
        if w < 1 or h < 1:
            return None
        # The exported frame already contains the correctly transformed pixels for this layer's
        # box, so the crop is the box itself plus a small bleed to absorb sub-pixel rounding.
        box = (int(round(x)) - pad, int(round(y)) - pad,
               int(round(x + w)) + pad, int(round(y + h)) + pad)
        box = (max(0, box[0]), max(0, box[1]), min(fx, box[2]), min(fy, box[3]))
        if box[2] <= box[0] or box[3] <= box[1]:
            return None
        crops += 1
        name = f'{crops:03d}-{tag}.png'
        sheet.crop(box).save(os.path.join(asset_dir, name), 'PNG', optimize=True)
        return 'assets/' + name, box

    def emit(node):
        ntype = node.get('type')
        if ntype == 'TEXT':
            return

        children = node.get('children') or []
        x, y, w, h = rel(node) if node.get('absoluteBoundingBox') else (0, 0, 0, 0)

        has_image = any(p.get('type') == 'IMAGE' for p in node.get('fills') or [])
        bg = paint_background(node)

        if has_image or (not is_plain(node) and not children and w and h):
            # artwork that CSS cannot reproduce: take the exact pixels from the export
            made = crop(node, (node.get('name') or ntype).lower().replace(' ', '-')[:24])
            if made:
                src, box = made
                # place the bleed-adjusted crop exactly where it was taken from
                px, py = box[0], box[1]
                pw, ph = box[2] - box[0], box[3] - box[1]
                layers.append(
                    f'<img src="{src}" alt="" style="{geom_style(node, px, py, pw, ph)}">')
            return

        if ntype == 'ELLIPSE' and bg and not children:
            radius = 'border-radius:50%'
            layers.append(
                f'<div style="{geom_style(node, x, y, w, h, bg + ";")}{radius}"></div>')
            return

        if is_plain(node) and bg and not children:
            radius = border_radius(node)
            shape = f'border-radius:{radius}px' if radius else ''
            layers.append(
                f'<div style="{geom_style(node, x, y, w, h, bg + ";")}{shape}"></div>')
            return

        if is_plain(node) and bg and children:
            radius = border_radius(node)
            shape = f'border-radius:{radius}px' if radius else ''
            layers.append(
                f'<div style="{geom_style(node, x, y, w, h, bg + ";")}{shape}"></div>')

        for child in children:
            emit(child)

    for child in frame.get('children') or []:
        emit(child)

    body = list(layers)
    for node in text_nodes:
        x, y, w, h = rel(node)
        style_def = node.get('style') or {}
        vertical = style_def.get('textAlignVertical') == 'CENTER'
        auto = style_def.get('textAutoResize') or 'NONE'
        centring = f';height:{h}px;display:flex;align-items:center' if vertical else ''
        # WIDTH_AND_HEIGHT: the box grows with the glyphs, so do not clamp it
        sizing = '' if auto in ('WIDTH_AND_HEIGHT', 'HEIGHT') else f';width:{w}px'
        style = f'left:{x}px;top:{y}px{sizing};color:{text_fill(node)};{type_css(node)}{centring}'
        body.append(f'<p style="{style}">{esc(node.get("characters", ""))}</p>')

    html = '''<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>%s</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="page.css">
</head>
<body>
<div class="frame">
%s
</div>
</body>
</html>
''' % (esc(title), '\n'.join(body))

    css = '''/* %s — geometry and type taken from the Figma tree */
* { margin: 0; padding: 0; box-sizing: border-box; }
html, body { background: #020202; }
body { display: flex; justify-content: center; }
.frame {
  position: relative;
  width: %dpx;
  height: %dpx;
  overflow: hidden;
  flex: 0 0 auto;
}
.frame > div, .frame > img, .frame > p { position: absolute; display: block; }
.frame img { max-width: none; }
''' % (key, fx, fy)

    open(os.path.join(out_dir, 'page.css'), 'w', encoding='utf-8').write(css)
    open(os.path.join(out_dir, filename), 'w', encoding='utf-8').write(html)
    print('%-8s %dx%d  layers:%3d  images:%3d  text-html:%3d  text-in-artwork:%3d'
          % (key, fx, fy, len(layers), crops, len(text_nodes), len(baked)))


if __name__ == '__main__':
    which = sys.argv[1] if len(sys.argv) > 1 else 'all'
    for name in (PAGES if which == 'all' else [which]):
        build(name)

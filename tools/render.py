"""
Render a Figma frame to HTML with exact geometry, without the image API.

Method
------
The frame PNG is the ground truth for pixels. Every text node carries its own bounding box and
type metrics in the document tree, so:

  1. take the frame PNG as the base layer,
  2. for each text node, paint its bounding box with the local background colour sampled from
     the ring just outside the box (removes the baked-in text),
  3. emit that text as real, selectable HTML at the node's exact coordinates and style.

No values are invented: coordinates, font family, size, weight, tracking and line height all
come from the node. Usage: python tools/render.py <frame-key>
"""
import json
import os
import sys
from statistics import median

from PIL import Image, ImageDraw

TREE = '.tmp/full.json'
OUT = 'build'

FRAMES = {
    'main':    ('464:3249', 'index.html',        'AutoDNA — the genetic code',        'figma/main.png'),
    'dealer':  ('464:4868', 'skipthedealer.html', 'AutoDNA — SkipTheDealer',          'figma/SkipTheDealer.png'),
    'invest':  ('464:5846', 'invest.html',        'AutoDNA — Invest in cars',         'figma/Invest in cars.png'),
    'service': ('464:6132', 'service.html',       'AutoDNA — The future of service',  'figma/The future of service.png'),
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


def hex_colour(paint):
    if not paint:
        return None
    colour = paint.get('color') or {}
    r = round(colour.get('r', 0) * 255)
    g = round(colour.get('g', 0) * 255)
    b = round(colour.get('b', 0) * 255)
    a = colour.get('a', 1) * paint.get('opacity', 1)
    if a >= 0.999:
        return '#%02x%02x%02x' % (r, g, b)
    return 'rgba(%d,%d,%d,%.3f)' % (r, g, b, a)


def text_colour(node):
    for paint in node.get('fills') or []:
        if paint.get('type') == 'SOLID' and paint.get('visible', True):
            return hex_colour(paint)
    return '#ffffff'


def patch_background(image, box, padding=4):
    """Fill a box with the scene behind it: border pixels interpolated across the hole."""
    from PIL import Image as _Image

    x1, y1, x2, y2 = box
    w, h = image.size
    x1, y1 = max(0, x1), max(0, y1)
    x2, y2 = min(w, x2), min(h, y2)
    if x2 - x1 < 2 or y2 - y1 < 2:
        return None

    left = image.crop((max(0, x1 - padding), y1, max(0, x1 - 1), y2)).resize((1, y2 - y1))
    right = image.crop((min(w - 1, x2), y1, min(w, x2 + padding), y2)).resize((1, y2 - y1))
    width = x2 - x1

    # a horizontal gradient from the left border colour to the right one
    patch = _Image.new('RGB', (width, y2 - y1))
    left_px = left.load()
    right_px = right.load()
    dst = patch.load()
    for y in range(y2 - y1):
        a = left_px[0, y]
        b = right_px[0, y]
        for x in range(width):
            t = x / max(width - 1, 1)
            dst[x, y] = (int(a[0] + (b[0] - a[0]) * t),
                         int(a[1] + (b[1] - a[1]) * t),
                         int(a[2] + (b[2] - a[2]) * t))
    return patch


def escaped(text):
    return (text.replace('&', '&amp;').replace('<', '&lt;').replace('>', '&gt;'))


def build(key):
    frame_id, filename, title, png_path = FRAMES[key]
    doc = json.load(open(TREE, encoding='utf-8'))
    page = doc['document']['children'][0]
    frame = find(page, frame_id)
    if frame is None:
        raise SystemExit('frame not in tree: ' + frame_id)

    origin = frame['absoluteBoundingBox']
    ox, oy = origin['x'], origin['y']
    width, height = round(origin['width']), round(origin['height'])

    base = Image.open(png_path).convert('RGB')
    if base.size != (width, height):
        base = base.resize((width, height), Image.LANCZOS)

    draw = ImageDraw.Draw(base)
    texts = []

    for node in walk(frame):
        if node.get('type') != 'TEXT':
            continue
        bbox = node.get('absoluteBoundingBox')
        if not bbox:
            continue
        size = (node.get('style') or {}).get('fontSize', 16)
        # generous bleed: stroke, italics and descenders all live outside the reported box
        bleed = int(max(6, size * 0.18))
        box = (
            round(bbox['x'] - ox) - bleed,
            round(bbox['y'] - oy) - bleed,
            round(bbox['x'] - ox + bbox['width']) + bleed,
            round(bbox['y'] - oy + bbox['height']) + bleed,
        )
        # paint out the baked text by continuing the scene through the box
        box = (max(0, box[0]), max(0, box[1]),
               min(base.size[0], box[2]), min(base.size[1], box[3]))
        patch = patch_background(base, box)
        if patch is not None:
            base.paste(patch, (max(0, box[0]), max(0, box[1])))
        texts.append((node, box))

    out_dir = os.path.join(OUT, key)
    os.makedirs(os.path.join(out_dir, 'assets'), exist_ok=True)
    if base.size != (width, height):
        base = base.crop((0, 0, width, height))
    base_path = os.path.join(out_dir, 'assets', 'base.png')
    base.save(base_path, 'PNG', optimize=True)

    parts = [
        '<img class="base" src="assets/base.png" alt="" width="%d" height="%d">' % (width, height)
    ]

    for node, box in texts:
        style = node.get('style') or {}
        size = style.get('fontSize', 16)
        family = style.get('fontFamily', 'Helvetica Neue')
        if style.get('lineHeightUnit') == 'FONT_SIZE_%':
            line_height = size * style.get('lineHeightPercentFontSize', 100) / 100
        else:
            line_height = style.get('lineHeightPx', size * 1.2)
        tracking = style.get('letterSpacing', 0)
        align = (style.get('textAlignHorizontal') or 'LEFT').lower()
        transform = style.get('textCase') == 'UPPER' and 'uppercase' or \
                    style.get('textCase') == 'LOWER' and 'lowercase' or 'none'

        css = [
            'left:%dpx' % box[0],
            'top:%dpx' % box[1],
            'width:%dpx' % (box[2] - box[0]),
            'font-family:%s' % FONT_STACK.get(family, "'Helvetica Neue', Arial, sans-serif"),
            'font-size:%.2fpx' % size,
            'font-weight:%s' % style.get('fontWeight', 400),
            'line-height:%.2fpx' % line_height,
            'letter-spacing:%.2fpx' % tracking,
            'color:%s' % text_colour(node),
            'text-transform:%s' % transform,
            'text-align:%s' % align,
            'white-space:pre-wrap',
        ]
        if style.get('textAlignVertical') == 'CENTER':
            css.append('height:%dpx' % (box[3] - box[1]))
            css.append('display:flex')
            css.append('align-items:center')

        parts.append('<p style="%s">%s</p>' % (';'.join(css), escaped(node.get('characters', ''))))

    html = '''<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=%d">
<title>%s</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  html, body { background: #020202; }
  body { position: relative; width: %dpx; height: %dpx; }
  .base { position: absolute; left: 0; top: 0; display: block; }
  body > p { position: absolute; }
</style>
</head>
<body>
%s
</body>
</html>
''' % (width, escaped(title), width, height, '\n'.join(parts))

    with open(os.path.join(out_dir, filename), 'w', encoding='utf-8') as handle:
        handle.write(html)

    print('%s: %d text nodes, base %dx%d, wrote %s' % (key, len(texts), width, height, os.path.join(out_dir, filename)))


if __name__ == '__main__':
    build(sys.argv[1] if len(sys.argv) > 1 else 'service')

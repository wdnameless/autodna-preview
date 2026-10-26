"""Generate the board page from nodes-main.json.

Figma sizes a text frame to its line boxes, so the dump's box height divided by the
number of rendered lines is the font size. Explicit newlines give the line count
directly; for engine-wrapped copy the count is inferred by solving for the size at
which the string fills the measured width and height together.

No font properties are present in the dump (the plugin's font read needs a re-run),
so line height uses the box height exactly and the type scale follows the geometry.
"""
import json
import html

D = json.load(open('nodes-main.json', encoding='utf-8'))
MAIN = next(f for f in D if f['frame'] == 'main')
TREE = MAIN['tree']
OX, OY = TREE['abs']['x'], TREE['abs']['y']

DISPLAY = {'the genetic code', 'Price   Comparison', 'Services', 'Auto Club', 'carlears'}
MEAN_ADVANCE = 0.47  # em; Helvetica Neue Light, measured in the browser


def box(n):
    a = n['abs']
    return a['y'] - OY, a['x'] - OX, a['w'], a['h']


def colour(n):
    return ((n.get('fills') or [{}])[0].get('color')) or '#ffffff'


def line_count(text, w, h):
    """Rendered line count for a node.

    A single line of the board's face is about 0.47em per character wide, so a box of
    w px holds w / (0.47 * size) characters. Try every plausible line count and keep
    the one whose implied size makes the string just fill the box width.
    """
    if '\n' in text:
        return text.count('\n') + 1

    n = len(text)
    best = None
    for lines in range(1, 12):
        size = h / lines
        if size < 8:
            break
        capacity = max(1.0, w / (MEAN_ADVANCE * size)) * lines
        if capacity >= n:
            best = lines
            break
    return best or 1


def size_for(n):
    y, x, w, h = box(n)
    txt = n['text'].strip()
    if txt in DISPLAY:
        return round(h * 0.55, 1)
    lines = line_count(txt, w, h)
    if lines > 1:
        # multi-line: the box height already accounts for leading, so solve the size
        # from the width and the number of lines
        per_char = w / max(1, len(txt)) * lines
        return round(min(h / lines, per_char / MEAN_ADVANCE) * 0.98, 1)
    return round(h, 1)


def texts(y0, y1):
    out = []

    def walk(n):
        if n.get('type') == 'TEXT' and n.get('text', '').strip():
            if y0 <= n['abs']['y'] - OY < y1:
                out.append(n)
        for c in n.get('children', []):
            walk(c)

    walk(TREE)
    return sorted(out, key=lambda n: (n['abs']['y'], n['abs']['x']))


def render(n, base):
    y, x, w, h = box(n)
    size = size_for(n)
    txt = n['text'].strip()
    lines = line_count(txt, w, h)
    c = colour(n)
    body = html.escape(n['text'], quote=False).replace('\n', '<br>')
    style = (
        'left:{:.1f}px;top:{:.1f}px;width:{:.1f}px;'
        'font-size:{}px;line-height:{:.1f}px;'
    ).format(x, y - base, w, size, round(size * 1.32, 1))
    if c.lower() not in ('#ffffff', '#f7f7f7', '#f1f0ff'):
        style += 'color:{};'.format(c)
    return '<div class="bt" style="{}">{}</div>'.format(style, body)


BANDS = [
    ('values', 1454, 1750), ('imagine', 2079, 2700), ('compare', 2871, 3300),
    ('services', 3893, 4700), ('stats', 4946, 5420), ('parent', 5698, 6540),
    ('club', 6709, 7560), ('community', 7576, 8290), ('footer', 8290, 8554),
]

parts = []
for name, y0, y1 in BANDS:
    parts.append('<section class="band {}" id="{}" style="top:{}px;height:{}px">'
                 .format(name, name, y0, y1 - y0))
    for node in texts(y0, y1):
        parts.append(render(node, y0))
    parts.append('</section>')

open('.tmp/bands.html', 'w', encoding='utf-8').write('\n'.join(parts))
print('bands.html:', len('\n'.join(parts)), 'chars')

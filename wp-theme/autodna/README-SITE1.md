# AutoDNA WP theme — install (site-1)

Built 1:1 from the board (`figma/main.png` + `1.json` dump). Local fonts
only — no Google Fonts calls.

## Install

1. WP Admin → Appearance → Themes → Add New → Upload Theme.
2. Upload `autodna-site1.zip` (or zip the `autodna/` folder yourself).
3. Activate **AutoDNA**.
4. Settings → Reading → "A static page" → Homepage: create a page with the
   template **AutoDNA - Home Page (Site 1)** and select it.

## Menu (optional)

Appearance → Menus → create a menu with 9 anchor links and assign to
**Primary Navigation**:

| Label | URL |
|---|---|
| Home | `#home` |
| Who We Are | `#carlears` |
| Why AutoDNA | `#value` |
| Price Comparison | `#compare` |
| Our Services | `#services` |
| Facts & Figures | `#facts` |
| About AutoDNA | `#corporate` |
| DNA Auto Club | `#club` |
| Contact | `#contact` |

Without a menu the theme falls back to the same 9 anchors automatically
(`autodna_fallback_menu` in `functions.php`).

## Files

- `front-page.php` — all 10 bands, asset URLs via `get_template_directory_uri()`
- `assets/css/site1.css`, `assets/js/site1.js` — byte-copies of the verified static build
- `assets/img/site1/*` — hero trio, corolla, building, community trio, services, collage
- `assets/fonts/*` — Orbitron + Helvetica Neue woff2

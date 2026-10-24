# AutoDNA — marketing site

Static build of the AutoDNA site: a main page and three product pages, cut 1:1 from the
customer's Figma board. No build step, no framework, no dependencies to install — open
`index.html` and it runs.

```
index.html            Main site
skipthedealer.html    SkipTheDealer™
invest.html           DNA Flip™ (invest in cars)
service.html          DNA Service™ (PaintBot, Skip the Shop, DriveCarePlan, Commercial)
```

## Running it

Open `index.html` in a browser. That's the whole setup.

A local server is only needed if you want clean paths and proper MIME types:

```sh
npx serve .
# or
python -m http.server 8000
```

Deploy by uploading the folder to any static host (Netlify, Vercel, S3, plain nginx).
The pages use relative paths, so they work from a subdirectory too.

## Stack

- **HTML5** — one hand-written file per page, semantic sections, English copy taken from the mockups
- **Tailwind CSS** via CDN, with a small `tailwind.config` in each page's `<head>` holding the brand tokens
- **Custom CSS** in `assets/css/style.css` for things Tailwind doesn't do well here: HUD corner brackets, gradient pills, glass cards, the ticker, scroll-reveal states
- **Vanilla JS** — no library. Preloader, fullscreen menu, IntersectionObserver reveals, counters, the profit calculator, form validation, sliders

## Structure

```
assets/
  css/
    style.css           shared: tokens, chrome, components
    page-main.css       page-specific, one file per page
    page-dealer.css
    page-invest.css
    page-service.css
  js/
    main.js             preloader, menu, reveal, counters, calculator, forms
    page-main.js        main page slider controls
    page-dealer.js      results carousel + FAQ accordion
  img/
    logo.svg
    main/ dealer/ invest/ service/ shared/    photos per page
```

Each page loads `style.css` + `main.js` plus its own `page-*.css` / `page-*.js`. Nothing is
bundled or minified on purpose — the customer can open any file and read it.

## Design values

Taken from the Figma board through the API, not eyeballed:

| | |
|---|---|
| Display type | Orbitron 500 — 133px / 124px / 96px / 85px in the mockups |
| Body type | Helvetica Neue 300 (DM Sans 300 for one accent line) |
| Page background | `#020202` |
| Primary purple | `#9685ff` |
| Light lavender (body text) | `#c2b9ff` |
| Deep accent | `#433694` |
| Card surface | `#121121` |

Type scale in the mockups: 133 / 124 / 96 / 85 / 50 / 40 / 35 / 32 / 30 / 28 / 24 / 20 / 18 / 15 / 14 px.

**One open item:** Helvetica Neue is a licensed font and isn't bundled. The stack falls back to
the system Helvetica/Arial, which is close but not identical. Drop `HelveticaNeue*.woff2` into
`assets/fonts/` and add an `@font-face` block in `style.css` to close the gap — no other changes
needed.

## Behaviour notes

- **Forms** validate on the client and show a success state. There is no backend by design —
  the brief scoped this as markup only. Wire the `action` attribute to whatever endpoint the
  customer picks.
- **Calculator** on the invest page: amount × tier rate (18% / 28% / 40%) → projected value.
  The formula came from the mockup's own example figures.
- **Sliders** are CSS-transform based on the dealer page, scroll-based on the main page. Both
  respect the viewport: 1 card on mobile, 2 on tablet, 3 on desktop.
- **Mobile** breakpoint is 393px, matching the mockups' phone frames.

## Source of truth

The four frames that are in scope, as confirmed by the customer:

| Page | Frame | Size |
|---|---|---|
| Main | `main` | 1440 × 8554 |
| SkipTheDealer | `SkipTheDealer` | 1440 × 6602 |
| Invest in cars | `Invest in cars` | 1440 × 6745 |
| The future of service | `The future of service` | 1440 × 5418 |

Out of scope: `STD`, the tall `SkipTheDealer` (15951) and `DNA service` (7923) drafts,
`SkipTheSearch`, the sub-service frames as standalone pages, and the WordPress build.

## Photos

Cropped from the board's exported frames at full resolution, then resized to a 1920px long
edge and saved as JPEG q82. Total weight of all imagery: ~6 MB.

Replacing a photo is a file swap — keep the filename, and keep roughly the same aspect ratio.

## Browser support

Evergreen Chrome, Firefox, Safari, Edge. Uses `IntersectionObserver` and CSS `backdrop-filter`;
both are safe in anything from 2021 onward.

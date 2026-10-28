# AutoDNA — Marketing Website & WordPress Theme

Pixel-faithful, high-performance website and custom WordPress theme built directly from the official Figma design.

- **Live Client Preview (GitHub Pages)**: [https://wdnameless.github.io/autodna-preview/](https://wdnameless.github.io/autodna-preview/)
- **Production Private Repository**: [https://github.com/wdnameless/autodna-portal](https://github.com/wdnameless/autodna-portal)

---

## 🚀 Live Demo & Client Preview
Open in any modern browser (desktop, tablet, or mobile):
👉 **[https://wdnameless.github.io/autodna-preview/](https://wdnameless.github.io/autodna-preview/)**

- **Full-Screen Responsive**: Seamless full-bleed layouts (1440px to 2560px Ultrawide).
- **Mobile Responsive (393px / iPhone)**: Strict compliance with `main mob.svg` layout.
- **Interactive Animations**:
  - Kinetic staged Hero intro with subtle ambient breathing.
  - Symmetrical glassmorphism cards.
  - Interactive full-screen Services panorama with smooth crossfade on hover.
  - Auto Club cards with glassmorphism and neon ultraviolet background glow.

---

## 📦 WordPress Deployment Guide

The theme is located in the `wp-theme/autodna/` directory.

### Quick Install (ZIP):
1. In the project root, the theme package is ready to be zipped:
   ```bash
   python -c "import zipfile, os; z=zipfile.ZipFile('autodna-theme.zip','w',zipfile.ZIP_DEFLATED); [z.write(os.path.join(r,f), os.path.relpath(os.path.join(r,f),'wp-theme')) for r,d,fs in os.walk('wp-theme/autodna') for f in fs]; print('Packed autodna-theme.zip')"
   ```
2. In your WordPress Admin Dashboard, navigate to:
   **Appearance (Внешний вид) → Themes (Темы) → Add New (Добавить новую) → Upload Theme (Загрузить тему)**.
3. Select `autodna-theme.zip` and click **Install Now (Установить)**.
4. Click **Activate (Активировать)**.

### Manual Install:
Copy the `wp-theme/autodna` folder directly to your WordPress installation directory:
```
wp-content/themes/autodna/
```
Then activate the theme in **Appearance → Themes**.

---

## 🛠 Project Structure (Clean Production Assets Only)

```
├── index.html              # Clean static entry point (HTML5)
├── assets/                 # Production-only assets
│   ├── css/site1.css       # Unified design system & responsive styles
│   ├── js/site1.js         # Interactive triggers, carousel & hover engine
│   ├── fonts/              # WOFF2 web fonts (Orbitron, Helvetica Neue, DM Sans)
│   └── img/site1/          # High-resolution production images & exact SVGs
└── wp-theme/autodna/       # Complete WordPress Theme
    ├── style.css           # WP theme header & metadata
    ├── index.php           # Core WordPress fallback template
    ├── functions.php       # Enqueue scripts, styles & theme setup
    ├── header.php          # Global header template
    ├── footer.php          # Global footer template
    ├── front-page.php      # Main landing page template
    └── assets/             # Bundled local theme assets
```

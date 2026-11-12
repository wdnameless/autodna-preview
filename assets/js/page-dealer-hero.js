/** SkipTheDealer — burger menu (closed by default) + instant anchor scrolling */
(function () {
  'use strict';

  var burger, menu, closeTimer = null;

  function setMenu(open) {
    if (!menu || !burger) return;
    clearTimeout(closeTimer);
    if (open) {
      menu.hidden = false;
      burger.setAttribute('aria-expanded', 'true');
      burger.setAttribute('aria-label', 'Close menu');
      requestAnimationFrame(function () {
        requestAnimationFrame(function () { menu.classList.add('is-open'); });
      });
    } else {
      burger.setAttribute('aria-expanded', 'false');
      burger.setAttribute('aria-label', 'Open menu');
      menu.classList.remove('is-open');
      closeTimer = setTimeout(function () {
        if (!menu.classList.contains('is-open')) menu.hidden = true;
      }, 220);
    }
  }

  function isOpen() {
    return !!menu && !menu.hidden && menu.classList.contains('is-open');
  }

  function scrollToHash(hash) {
    if (!hash || hash === '#') return;
    if (hash === '#top' || hash === '#home') {
      window.scrollTo({ top: 0, behavior: 'smooth' });
      if (history.pushState) history.pushState(null, null, '#top');
      return;
    }
    var target = document.querySelector(hash);
    if (!target) return;
    // anchor divs are 1x1 at an absolute % offset inside the body board:
    // scroll so that the anchor top lands on the viewport top
    var rect = target.getBoundingClientRect();
    var y = window.scrollY + rect.top;
    window.scrollTo({ top: Math.max(0, y), behavior: 'smooth' });
    if (history.pushState) history.pushState(null, null, hash);
  }

  // --u is the size of one design pixel in viewport pixels: the stage is always
  // a 1440x895 box contain-fitted, and all artwork is positioned in design %.
  var ART_W = 1440, ART_H = 895, heroEl = null, artEl = null;

  function syncScale() {
    if (!heroEl || !artEl) return;
    var W = heroEl.clientWidth, H = heroEl.clientHeight;
    if (!W || !H) return;
    // contain-fit: the full artboard (CTA included) is always on screen, and the
    // same factor drives the menu popover so it never diverges from the artwork
    // Contain-fit, no shrink: the frame is 16:9, so on any 16:9 screen it fills
    // the viewport exactly and the CTA sits on the bottom edge like the design.
    var s = Math.min(W / ART_W, H / ART_H);
    heroEl.style.setProperty('--dh-s', String(s));

    // Поля по вертикали продолжаются цветом краёв макета (см. .dh::before/::after),
    // поэтому их высота должна быть известна точно.
    var padY = Math.max(0, (H - ART_H * s) / 2);
    heroEl.style.setProperty('--dh-pad-top', padY.toFixed(1) + 'px');
    heroEl.style.setProperty('--dh-pad-bottom', padY.toFixed(1) + 'px');
    artEl.style.setProperty('--dh-s', String(s));

    // place the (unscaled) menu popover under the burger, and scale its metrics
    var burger = document.getElementById('dh-burger');
    var menu = document.getElementById('dh-menu');
    if (!burger || !menu) return;
    var br = burger.getBoundingClientRect();
    menu.style.top = Math.round(br.bottom + 4) + 'px';
    menu.style.left = Math.round(br.right - 289 * s) + 'px';
    menu.style.maxHeight = Math.round(innerHeight - br.bottom - 16) + 'px';
    menu.style.setProperty('--dh-menu-w', (289 * s).toFixed(1) + 'px');
    menu.style.setProperty('--dh-row-h', (43.4 * s).toFixed(2) + 'px');
    menu.style.setProperty('--dh-row-fs', (15 * s).toFixed(2) + 'px');
    menu.style.setProperty('--dh-row-px', (18 * s).toFixed(2) + 'px');
    menu.style.setProperty('--dh-row-icon', (14 * s).toFixed(2) + 'px');
  }

  function init() {
    burger = document.querySelector('#dh-burger');
    menu = document.querySelector('#dh-menu');
    heroEl = document.querySelector('.dh');
    artEl = document.querySelector('.dh__art');

    syncScale();
    window.addEventListener('resize', syncScale);
    if (window.ResizeObserver && heroEl) new ResizeObserver(syncScale).observe(heroEl);

    if (burger && menu) {
      burger.addEventListener('click', function (e) {
        e.stopPropagation();
        setMenu(!isOpen());
      });

      document.addEventListener('click', function (e) {
        if (isOpen() && !e.target.closest('#dh-menu') && !e.target.closest('#dh-burger')) {
          setMenu(false);
        }
      });

      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && isOpen()) setMenu(false);
      });
    }

    // Anchor links anywhere on the page (hero menu, body hitareas, CTA button)
    document.addEventListener('click', function (e) {
      var link = e.target.closest('a[href^="#"]');
      if (!link) return;
      if (link.classList.contains('dh__row') || link.classList.contains('db__hit') ||
          link.classList.contains('db__mhit') || link.classList.contains('dh__cta')) {
        e.preventDefault();
        setMenu(false);
        scrollToHash(link.getAttribute('href'));
      }
    });

    // Direct hash on load
    if (window.location.hash) {
      setTimeout(function () { scrollToHash(window.location.hash); }, 260);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

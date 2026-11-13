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
  var ART_W = 1440, ART_H = 950, heroEl = null;

  function syncScale() {
    if (!heroEl) return;
    var W = heroEl.clientWidth, H = heroEl.clientHeight;
    if (!W || !H) return;
    // contain по обох осях: кадр завжди цілком у вьюпорті, CTA видно
    var s = Math.min(W / ART_W, H / ART_H);
    heroEl.style.setProperty('--dh-s', String(s));

    var stageEl = heroEl.querySelector('.dh__stage');
    var frameEl = heroEl.querySelector('.dh__frame');
    var fw = (ART_W * s).toFixed(1) + 'px';
    var fh = (ART_H * s).toFixed(1) + 'px';
    if (stageEl) { stageEl.style.width = fw; stageEl.style.height = fh; }
    if (frameEl) { frameEl.style.width = fw; frameEl.style.height = fh; }
    var bleedFrame = heroEl.querySelector('.dh__bleed-frame');
    if (bleedFrame) { bleedFrame.style.width = fw; bleedFrame.style.height = fh; }

  }

  function init() {
    burger = document.querySelector('#dh-burger');
    menu = document.querySelector('#dh-menu');
    heroEl = document.querySelector('.dh');

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

/** AutoDNA SkipTheDealer Page Scripts — 100% Reliable Native Anchor Scrolling */
(function () {
  'use strict';

  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(link => {
      link.addEventListener('click', (e) => {
        const hash = link.getAttribute('href');
        if (!hash) return;

        if (hash === '#top') {
          e.preventDefault();
          window.scrollTo({ top: 0, behavior: 'smooth' });
          if (history.pushState) history.pushState(null, null, '#top');
          return;
        }

        const target = document.querySelector(hash);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth' });
          if (history.pushState) history.pushState(null, null, hash);
        }
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSmoothScroll);
  } else {
    initSmoothScroll();
  }
})();

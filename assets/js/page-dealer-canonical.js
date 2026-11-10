/** AutoDNA SkipTheDealer — Instant Smooth Scrolling & Hash Handling */
(function () {
  'use strict';

  function scrollToTarget(hash) {
    if (!hash || hash === '#' || hash === '#top' || hash === '#home') {
      window.scrollTo({ top: 0, behavior: 'smooth' });
      if (history.pushState) history.pushState(null, null, '#top');
      return;
    }

    const target = document.querySelector(hash);
    if (target) {
      target.scrollIntoView({ behavior: 'smooth' });
      if (history.pushState) history.pushState(null, null, hash);
    }
  }

  function initLinks() {
    document.querySelectorAll('a[href^="#"]').forEach(link => {
      link.addEventListener('click', (e) => {
        const hash = link.getAttribute('href');
        if (hash) {
          e.preventDefault();
          scrollToTarget(hash);
        }
      });
    });

    // Handle initial hash on page load (e.g. #how-it-works)
    if (window.location.hash) {
      setTimeout(() => {
        scrollToTarget(window.location.hash);
      }, 300);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initLinks);
  } else {
    initLinks();
  }
})();

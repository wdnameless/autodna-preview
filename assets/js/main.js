/**
 * MAIN PAGE — smooth anchor scrolling.
 *
 * The drawer itself is owned by site.js (it wires [data-menu-open] and
 * [data-menu-close]). This file only adds what that one lacks: smooth scrolling
 * with the URL hash kept in sync, and no jump when the target is a section id.
 */
(function () {
  'use strict';

  function initSmoothScroll() {
    // CSS scroll-behavior handles the motion; this only adds the header offset and
    // keeps the URL hash in sync without a jump.
    document.addEventListener('click', function (event) {
      var link = event.target.closest('a[href^="#"]');
      if (!link) return;

      var id = link.getAttribute('href');
      if (!id || id === '#') return;

      var target = document.querySelector(id);
      if (!target) return;

      event.preventDefault();
      var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      target.scrollIntoView({ behavior: reduced ? 'auto' : 'smooth', block: 'start' });

      if (history.replaceState) history.replaceState(null, '', id);
    });
  }

  function initReveal() {
    var items = document.querySelectorAll(
      '.value-card, .imagine__col, .stat, .club-card, .parent__row, .compare__inner, .community__inner, .foot__grid'
    );
    if (!items.length) return;

    if (!('IntersectionObserver' in window)) return;

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-in');
        io.unobserve(entry.target);
      });
    }, { rootMargin: '0px 0px -18% 0px', threshold: 0.08 });

    items.forEach(function (el) {
      el.classList.add('reveal');
      io.observe(el);
    });
  }

  function boot() {
    initSmoothScroll();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

/** AutoDNA site-1: preloader, menu overlay, compare tabs, service cards, reveal. */
(function () {
  'use strict';

  // preloader: once per session, 2.2s to match the board's timing
  function initPreloader() {
    var el = document.getElementById('preloader');
    if (!el) return;
    if (sessionStorage.getItem('dna-pre') === '1') {
      el.classList.add('is-done');
      return;
    }
    setTimeout(function () {
      el.classList.add('is-done');
      sessionStorage.setItem('dna-pre', '1');
    }, 2200);
  }

  // fullscreen menu overlay
  function initMenu() {
    var burger = document.getElementById('burger');
    var menu = document.getElementById('menu');
    if (!burger || !menu) return;
    function set(open) {
      menu.hidden = !open;
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
      burger.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
      document.body.style.overflow = open ? 'hidden' : '';
    }
    burger.addEventListener('click', function () {
      set(menu.hidden);
    });
    menu.addEventListener('click', function (e) {
      if (e.target.closest('a')) set(false);
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && !menu.hidden) set(false);
    });
  }

  // compare tabs (mobile): highlight one seller row
  function initCompare() {
    var tabs = document.querySelectorAll('.compare__tabs [role="tab"]');
    if (!tabs.length) return;
    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        tabs.forEach(function (t) { t.setAttribute('aria-selected', 'false'); });
        tab.setAttribute('aria-selected', 'true');
        var col = tab.getAttribute('data-col');
        document.querySelectorAll('.compare__table tbody tr').forEach(function (row) {
          row.classList.toggle('is-lit', row.getAttribute('data-col') === col);
        });
      });
    });
  }

  // service cards: click toggles the active panel
  function initServices() {
    var cards = document.querySelectorAll('.svc');
    cards.forEach(function (card) {
      card.addEventListener('click', function () {
        cards.forEach(function (c) { c.classList.remove('is-active'); });
        card.classList.add('is-active');
      });
    });
  }

  // scroll reveal
  function initReveal() {
    var els = document.querySelectorAll('.clr-card, .club-card, .fact, .value__grid > div, .corporate__photo, .community__photo');
    els.forEach(function (el) { el.classList.add('rv'); });
    if (!('IntersectionObserver' in window)) {
      els.forEach(function (el) { el.classList.add('is-in'); });
      return;
    }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) {
          en.target.classList.add('is-in');
          io.unobserve(en.target);
        }
      });
    }, { threshold: 0.12 });
    els.forEach(function (el) { io.observe(el); });
  }

  function boot() {
    initPreloader();
    initMenu();
    initCompare();
    initServices();
    initReveal();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

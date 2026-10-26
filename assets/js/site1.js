/** AutoDNA site-1: preloader, menu overlay, compare tabs, service cards, reveal. */
(function () {
  'use strict';

  // preloader: DNA reveal + real load progress, curtain lift, once per session
  function initPreloader() {
    var el = document.getElementById('preloader');
    if (!el) return;
    if (sessionStorage.getItem('dna-pre') === '1') {
      el.style.display = 'none';
      return;
    }
    var bar = el.querySelector('.preloader__bar span');
    var pct = el.querySelector('.preloader__pct');
    var t0 = Date.now();
    var pct_ = 0, done = false;
    document.body.style.overflow = 'hidden';
    function paint(n) {
      pct_ = Math.min(100, Math.max(pct_, n));
      if (bar) bar.style.width = pct_ + '%';
      if (pct) pct.textContent = Math.round(pct_) + '%';
    }
    // tick toward 90% while resources load; window load jumps to 100
    var tick = setInterval(function () {
      if (done) return;
      var dt = (Date.now() - t0) / 1000;
      paint(Math.min(90, dt * 55 + 8));
    }, 120);
    function finish() {
      if (done) return;
      done = true;
      clearInterval(tick);
      paint(100);
      // hold the full bar a beat, then lift the curtain
      setTimeout(function () {
        el.classList.add('is-done');
        document.body.style.overflow = '';
        sessionStorage.setItem('dna-pre', '1');
      }, 350);
    }
    if (document.readyState === 'complete') {
      setTimeout(finish, 1400);
    } else {
      window.addEventListener('load', function () {
        var wait = Math.max(0, 1400 - (Date.now() - t0));
        setTimeout(finish, wait);
      });
      // safety: never trap the user behind the curtain
      setTimeout(finish, 6000);
    }
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

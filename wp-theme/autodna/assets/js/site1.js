/** AutoDNA site-1: preloader, menu overlay, compare tabs, service cards, reveal. */
(function () {
  'use strict';

  // preloader: DNA reveal + real load progress, curtain lift — always visible
  // (short version on repeat visits so the user sees every deploy)
  function initPreloader() {
    var el = document.getElementById('preloader');
    if (!el) return;
    var repeat = false;
    try { repeat = sessionStorage.getItem('dna-pre') === '1'; } catch (e) { void e; }
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
        document.body.classList.add('hero-in');
        try { sessionStorage.setItem('dna-pre', '1'); } catch (e) { void e; }
      }, 350);
    }
    var hold = repeat ? 500 : 1400;
    if (document.readyState === 'complete') {
      setTimeout(finish, hold);
    } else {
      window.addEventListener('load', function () {
        var wait = Math.max(0, hold - (Date.now() - t0));
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
      // link click OR backdrop click (anything outside the panel) closes
      if (e.target.closest('a') || !e.target.closest('.menu__panel')) set(false);
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
    var els = document.querySelectorAll('.club-card, .fact, .value__grid > div, .corporate__photo, .community__photo');
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
    // carlears: section-level cascade trigger
    var car = document.querySelector('.carlears');
    if (car) {
      if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
      car.classList.add('cfx');
      var cio = new IntersectionObserver(function (entries) {
        entries.forEach(function (en) {
          if (en.isIntersecting) { car.classList.add('cx-in'); cio.disconnect(); }
        });
      }, { threshold: 0.18 });
      cio.observe(car);
    }
  }

  // premium hero: staged intro + parallax + breathing glow (geometry untouched)
  function initHeroFx() {
    var hero = document.querySelector('.hero');
    if (!hero) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      hero.classList.add('hero--static');
      return;
    }
    var frame = hero.querySelector('.hero__frame');
    var trip = hero.querySelector('.hero__triptych img');
    var word = hero.querySelector('.hero__word');
    var subs = hero.querySelectorAll('.hero__sub');
    var rails = hero.querySelectorAll('.rail a');
    var quote = hero.querySelector('.hero__quote');
    var bg = hero.querySelector('.hero__bg');
    hero.classList.add('hero--fx');
    var mo = null;
    function play() {
      hero.classList.add('hero--in');
      var steps = [trip && trip.parentNode, word, subs[0], subs[1], quote];
      for (var i = 0; i < steps.length; i++) {
        var el = steps[i];
        if (!el) continue;
        el.style.transitionDelay = (0.15 + i * 0.14) + 's';
        el.classList.add('hx-in');
      }
      for (var j = 0; j < rails.length; j++) {
        rails[j].style.transitionDelay = (0.9 + j * 0.12) + 's';
        rails[j].classList.add('hx-in');
      }
    }
    if (document.body.classList.contains('hero-in')) play();
    else {
      mo = new MutationObserver(function () {
        if (document.body.classList.contains('hero-in')) { mo.disconnect(); play(); }
      });
      mo.observe(document.body, { attributes: true, attributeFilter: ['class'] });
      setTimeout(play, 4000);
    }
    var ticking = false;
    function onScroll() {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(function () {
        var y = Math.min(window.scrollY, 900);
        if (bg) bg.style.transform = 'translate3d(0,' + (y * 0.18) + 'px,0) scale(1.02)';
        if (frame) frame.style.transform = 'translate3d(0,' + (y * -0.06) + 'px,0)';
        if (quote) quote.style.transform = 'translate3d(0,' + (y * -0.12) + 'px,0)';
        ticking = false;
      });
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    for (var k = 0; k < rails.length; k++) {
      (function (a) {
        a.addEventListener('mouseenter', function () { a.classList.add('rail--hot'); });
        a.addEventListener('mouseleave', function () { a.classList.remove('rail--hot'); });
      })(rails[k]);
    }
  }

  function boot() {
    initPreloader();
    initMenu();
    initCompare();
    initServices();
    initReveal();
    initHeroFx();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

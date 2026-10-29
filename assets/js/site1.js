/** AutoDNA site-1: preloader, menu overlay, compare tabs, service cards, reveal. */
(function () {
  'use strict';

  // preloader: DNA reveal + real load progress, curtain lift — always visible
  function initPreloader() {
    const el = document.getElementById('preloader');
    if (!el) return;
    let repeat = false;
    try { repeat = sessionStorage.getItem('dna-pre') === '1'; } catch (e) { void e; }
    const bar = el.querySelector('.preloader__bar span');
    const pct = el.querySelector('.preloader__pct');
    const t0 = Date.now();
    let pct_ = 0;
    let done = false;
    document.body.style.overflow = 'hidden';

    function paint(n) {
      pct_ = Math.min(100, Math.max(pct_, n));
      if (bar) bar.style.width = `${pct_}%`;
      if (pct) pct.textContent = `${Math.round(pct_)}%`;
    }

    const tick = setInterval(() => {
      if (done) return;
      const dt = (Date.now() - t0) / 1000;
      paint(Math.min(90, dt * 55 + 8));
    }, 120);

    function finish() {
      if (done) return;
      done = true;
      clearInterval(tick);
      paint(100);
      setTimeout(() => {
        el.classList.add('is-done');
        document.body.style.overflow = '';
        document.body.classList.add('hero-in');
        try { sessionStorage.setItem('dna-pre', '1'); } catch (e) { void e; }
      }, 350);
    }

    const hold = repeat ? 500 : 1400;
    if (document.readyState === 'complete') {
      setTimeout(finish, hold);
    } else {
      window.addEventListener('load', () => {
        const wait = Math.max(0, hold - (Date.now() - t0));
        setTimeout(finish, wait);
      });
      setTimeout(finish, 6000);
    }
  }

  // fullscreen menu overlay
  function initMenu() {
    const burger = document.getElementById('burger');
    const menu = document.getElementById('menu');
    const closeBtn = document.getElementById('menu-close');
    if (!burger || !menu) return;

    function set(open) {
      menu.hidden = !open;
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
      burger.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
      document.body.style.overflow = open ? 'hidden' : '';
    }

    burger.addEventListener('click', () => set(menu.hidden));
    if (closeBtn) closeBtn.addEventListener('click', () => set(false));

    menu.addEventListener('click', (e) => {
      if (e.target.closest('a') || e.target.closest('#menu-close')) {
        set(false);
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !menu.hidden) set(false);
    });
  }

  // compare tabs (mobile): highlight one seller row
  function initCompare() {
    const tabs = document.querySelectorAll('.compare__tabs button');
    if (!tabs.length) return;
    for (const btn of tabs) {
      btn.addEventListener('click', () => {
        const col = btn.getAttribute('data-col');
        for (const t of tabs) t.setAttribute('aria-selected', 'false');
        btn.setAttribute('aria-selected', 'true');
        for (const row of document.querySelectorAll('.compare__table tbody tr')) {
          row.classList.toggle('is-lit', row.getAttribute('data-col') === col);
        }
      });
    }
  }

  // fullscreen interactive services: hover + click crossfades background layer & toggles card
  function initServices() {
    const cols = document.querySelectorAll('.svc-col');
    const layers = document.querySelectorAll('.services__bg-layer');
    if (!cols.length || !layers.length) return;

    function activate(target) {
      const id = target.getAttribute('data-svc');
      for (const c of cols) {
        const isActive = (c === target);
        c.classList.toggle('is-active', isActive);
        c.setAttribute('aria-expanded', isActive ? 'true' : 'false');
      }
      for (const l of layers) {
        l.classList.toggle('is-active', l.classList.contains(`services__bg-layer--${id}`));
      }
    }

    for (const col of cols) {
      col.addEventListener('mouseenter', () => activate(col));
      col.addEventListener('click', () => activate(col));
      col.addEventListener('focus', () => activate(col));
    }
  }

  // scroll reveal
  function initReveal() {
    const els = document.querySelectorAll('.club-card, .fact, .value__grid > div, .corporate__photo, .community__photo');
    for (const el of els) el.classList.add('rv');

    if (!('IntersectionObserver' in window)) {
      for (const el of els) el.classList.add('is-in');
      return;
    }

    const io = new IntersectionObserver((entries) => {
      for (const en of entries) {
        if (en.isIntersecting) {
          en.target.classList.add('is-in');
          io.unobserve(en.target);
        }
      }
    }, { threshold: 0.12 });

    for (const el of els) io.observe(el);

    // carlears: section-level cascade trigger
    const car = document.querySelector('.carlears');
    if (car) {
      if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
      car.classList.add('cfx');
      const cio = new IntersectionObserver((entries) => {
        for (const en of entries) {
          if (en.isIntersecting) { car.classList.add('cx-in'); cio.disconnect(); }
        }
      }, { threshold: 0.18 });
      cio.observe(car);
    }
  }

  // premium hero: staged intro + parallax + breathing glow (geometry untouched)
  function initHeroFx() {
    const hero = document.querySelector('.hero');
    if (!hero) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      hero.classList.add('hero--static');
      return;
    }
    const trip = hero.querySelector('.hero__triptych img');
    const word = hero.querySelector('.hero__word');
    const subs = hero.querySelectorAll('.hero__sub');
    const rails = hero.querySelectorAll('.rail a');
    const quote = hero.querySelector('.hero__quote');
    const bg = hero.querySelector('.hero__bg');
    hero.classList.add('hero--fx');

    function play() {
      hero.classList.add('hero--in');
      const steps = [trip && trip.parentNode, word, subs[0], subs[1], quote];
      for (let i = 0; i < steps.length; i++) {
        const el = steps[i];
        if (!el) continue;
        el.style.transitionDelay = `${0.15 + i * 0.14}s`;
        el.classList.add('hx-in');
      }
      for (let j = 0; j < rails.length; j++) {
        rails[j].style.transitionDelay = `${0.9 + j * 0.12}s`;
        rails[j].classList.add('hx-in');
      }
    }

    if (document.body.classList.contains('hero-in')) {
      play();
    } else {
      const mo = new MutationObserver(() => {
        if (document.body.classList.contains('hero-in')) { mo.disconnect(); play(); }
      });
      mo.observe(document.body, { attributes: true, attributeFilter: ['class'] });
      setTimeout(play, 4000);
    }

    let ticking = false;
    function onScroll() {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(() => {
        const y = Math.min(window.scrollY, 900);
        if (bg) bg.style.transform = `translate3d(0,${y * 0.18}px,0) scale(1.02)`;
        if (trip) trip.style.transform = `translate3d(0,${y * -0.05}px,0)`;
        if (quote) quote.style.transform = `translate3d(0,${y * -0.12}px,0)`;
        ticking = false;
      });
    }
    window.addEventListener('scroll', onScroll, { passive: true });

    for (const r of rails) {
      r.addEventListener('mouseenter', () => r.classList.add('rail--hot'));
      r.addEventListener('mouseleave', () => r.classList.remove('rail--hot'));
    }
  }

  // global dynamics: section title reveals + fact glow + carlears bg drift
  function initGlobalFx() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    if (!('IntersectionObserver' in window)) { document.body.classList.add('gfx', 'gx-in'); return; }
    document.body.classList.add('gfx');

    const titles = document.querySelectorAll('.value h2, .compare h2, .services__title, .club h2, .community h2');
    const tio = new IntersectionObserver((entries) => {
      for (const en of entries) {
        if (en.isIntersecting) { en.target.classList.add('tx-in'); tio.unobserve(en.target); }
      }
    }, { threshold: 0.2 });
    for (const t of titles) tio.observe(t);

    const facts = document.querySelectorAll('.fact');
    const fio = new IntersectionObserver((entries) => {
      for (const en of entries) {
        if (en.isIntersecting) {
          const idx = Array.prototype.indexOf.call(facts, en.target);
          setTimeout(() => en.target.classList.add('lit'), idx * 220);
          fio.unobserve(en.target);
        }
      }
    }, { threshold: 0.4 });
    for (const f of facts) fio.observe(f);

    let ticking = false;
    window.addEventListener('scroll', () => {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(() => {
        const y = window.scrollY;
        if (y > 500 && y < 2600) {
          const car = document.querySelector('.carlears');
          if (car) car.style.backgroundPosition = `center ${(y - 900) * 0.08}px`;
        }
        ticking = false;
      });
    }, { passive: true });
  }

    // mobile carlears carousel buttons (prev/next)
  function initCarlearsCarousel() {
    const prev = document.getElementById('carlears-prev');
    const next = document.getElementById('carlears-next');
    const grid = document.querySelector('.carlears__grid');
    if (!prev || !next || !grid) return;

    prev.addEventListener('click', () => {
      grid.scrollBy({ left: -305, behavior: 'smooth' });
    });
    next.addEventListener('click', () => {
      grid.scrollBy({ left: 305, behavior: 'smooth' });
    });
  }

  function initClubCarousel() {
    const prev = document.getElementById('club-prev');
    const next = document.getElementById('club-next');
    const grid = document.querySelector('.club__grid');
    if (!prev || !next || !grid) return;

    prev.addEventListener('click', () => {
      grid.scrollBy({ left: -306, behavior: 'smooth' });
    });
    next.addEventListener('click', () => {
      grid.scrollBy({ left: 306, behavior: 'smooth' });
    });
  }

  function boot() {
    initPreloader();
    initMenu();
    initCompare();
    initServices();
    initReveal();
    initHeroFx();
    initGlobalFx();
    initCarlearsCarousel();
    initClubCarousel();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

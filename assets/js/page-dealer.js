/** AutoDNA SkipTheDealer Page Scripts */
(function () {
  'use strict';

  // preloader: DNA reveal + real load progress, curtain lift
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

    const hold = repeat ? 400 : 1200;
    if (document.readyState === 'complete') {
      setTimeout(finish, hold);
    } else {
      window.addEventListener('load', () => {
        const wait = Math.max(0, hold - (Date.now() - t0));
        setTimeout(finish, wait);
      });
      setTimeout(finish, 5000);
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

  // Interactive 4 Steps in HOW IT WORKS section
  function initHowItWorks() {
    const tabs = document.querySelectorAll('.hiw-tab');
    const steps = document.querySelectorAll('.hiw-step-card');
    if (!tabs.length || !steps.length) return;

    function activateStep(stepNum) {
      for (const tab of tabs) {
        const isActive = tab.getAttribute('data-step') === stepNum;
        tab.classList.toggle('is-active', isActive);
        tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
      }
      for (const card of steps) {
        const isActive = card.getAttribute('data-step') === stepNum;
        card.classList.toggle('is-active', isActive);
      }
    }

    for (const tab of tabs) {
      tab.addEventListener('click', () => {
        const stepNum = tab.getAttribute('data-step');
        activateStep(stepNum);
      });
    }
  }

  function boot() {
    initPreloader();
    initMenu();
    initHowItWorks();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

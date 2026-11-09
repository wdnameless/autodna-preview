/** AutoDNA SkipTheDealer Page Scripts — Smooth Anchor Scrolling */
(function () {
  'use strict';

  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(link => {
      link.addEventListener('click', (e) => {
        const hash = link.getAttribute('href');
        if (!hash) return;

        if (hash === '#top' || hash === '#home') {
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

  function initMobileMenu() {
    const mobBurger = document.querySelector('#mob-burger');
    const mobMenu = document.querySelector('#mob-menu');
    const mobClose = document.querySelector('#mob-close');
    if (!mobBurger || !mobMenu) return;

    function setMobMenu(open) {
      if (open) {
        mobMenu.hidden = false;
        mobBurger.setAttribute('aria-expanded', 'true');
        requestAnimationFrame(() => mobMenu.classList.add('is-open'));
      } else {
        mobBurger.setAttribute('aria-expanded', 'false');
        mobMenu.classList.remove('is-open');
        setTimeout(() => { mobMenu.hidden = true; }, 260);
      }
    }

    mobBurger.addEventListener('click', (e) => {
      e.stopPropagation();
      setMobMenu(mobMenu.hidden);
    });

    if (mobClose) {
      mobClose.addEventListener('click', (e) => {
        e.stopPropagation();
        setMobMenu(false);
      });
    }

    document.addEventListener('click', (e) => {
      if (!mobMenu.hidden && !e.target.closest('#mob-menu') && !e.target.closest('#mob-burger')) {
        setMobMenu(false);
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !mobMenu.hidden) {
        setMobMenu(false);
      }
    });

    mobMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        setMobMenu(false);
      });
    });
  }

  function boot() {
    initSmoothScroll();
    initMobileMenu();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

/** SkipTheDealer Perfect Responsive Navigation & Menu Interaction */
(function () {
  'use strict';

  // 1. Desktop Hero Menu Toggle & Navigation
  function initDesktopMenu() {
    const burgerBtn = document.querySelector('#burger-btn');
    const heroMenu = document.querySelector('#hero-menu');
    if (!burgerBtn || !heroMenu) return;

    burgerBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      const isCollapsed = heroMenu.classList.toggle('is-collapsed');
      burgerBtn.setAttribute('aria-expanded', !isCollapsed);
    });

    // Close when clicking outside on mobile or desktop
    document.addEventListener('click', (e) => {
      if (!heroMenu.classList.contains('is-collapsed') && !e.target.closest('#hero-menu') && !e.target.closest('#burger-btn')) {
        // Only collapse on small screens or when user explicitly clicks outside
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        heroMenu.classList.add('is-collapsed');
        burgerBtn.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // 2. Mobile Drawer Menu
  function initMobileMenu() {
    const mobBurger = document.querySelector('#mob-burger');
    const mobMenu = document.querySelector('#mob-menu');
    const mobClose = document.querySelector('#mob-close');
    if (!mobBurger || !mobMenu) return;

    function openMobMenu() {
      mobMenu.hidden = false;
      mobBurger.setAttribute('aria-expanded', 'true');
      requestAnimationFrame(() => mobMenu.classList.add('is-open'));
    }

    function closeMobMenu() {
      mobBurger.setAttribute('aria-expanded', 'false');
      mobMenu.classList.remove('is-open');
      setTimeout(() => {
        if (!mobMenu.classList.contains('is-open')) mobMenu.hidden = true;
      }, 250);
    }

    mobBurger.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = !mobMenu.hidden && mobMenu.classList.contains('is-open');
      if (isOpen) closeMobMenu();
      else openMobMenu();
    });

    if (mobClose) {
      mobClose.addEventListener('click', (e) => {
        e.stopPropagation();
        closeMobMenu();
      });
    }

    document.addEventListener('click', (e) => {
      if (!mobMenu.hidden && !e.target.closest('#mob-menu') && !e.target.closest('#mob-burger')) {
        closeMobMenu();
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !mobMenu.hidden) {
        closeMobMenu();
      }
    });

    mobMenu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        closeMobMenu();
      });
    });
  }

  // 3. Smooth Scroll to Anchors
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        const hash = this.getAttribute('href');
        if (!hash || hash === '#') return;

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

  function boot() {
    initDesktopMenu();
    initMobileMenu();
    initSmoothScroll();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

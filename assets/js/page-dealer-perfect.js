/** SkipTheDealer Perfect Responsive Navigation & Menu Interaction */
(function () {
  'use strict';

  // 1. Desktop Dropdown Menu
  function initDesktopMenu() {
    const burgerBtn = document.querySelector('#burger-btn');
    const dropdown = document.querySelector('#hero-dropdown');
    const closeBtn = document.querySelector('#dropdown-close-btn');
    if (!burgerBtn || !dropdown) return;

    function openMenu() {
      dropdown.hidden = false;
      burgerBtn.setAttribute('aria-expanded', 'true');
      requestAnimationFrame(() => dropdown.classList.add('is-open'));
    }

    function closeMenu() {
      burgerBtn.setAttribute('aria-expanded', 'false');
      dropdown.classList.remove('is-open');
      setTimeout(() => {
        if (!dropdown.classList.contains('is-open')) dropdown.hidden = true;
      }, 250);
    }

    burgerBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = !dropdown.hidden && dropdown.classList.contains('is-open');
      if (isOpen) closeMenu();
      else openMenu();
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        closeMenu();
      });
    }

    // Close when clicking outside
    document.addEventListener('click', (e) => {
      if (!dropdown.hidden && !e.target.closest('#hero-dropdown') && !e.target.closest('#burger-btn')) {
        closeMenu();
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !dropdown.hidden) {
        closeMenu();
      }
    });

    // Close when clicking any menu link
    dropdown.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        closeMenu();
      });
    });
  }

  // 2. Mobile Menu
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

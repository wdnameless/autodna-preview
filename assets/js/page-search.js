/**
 * AutoDNA SkipTheSearch Page Scripts
 */
(function () {
  'use strict';

  // 1. Fullscreen Menu Overlay
  function initMenu() {
    const burger = document.getElementById('burger');
    const menu = document.getElementById('menu');
    const closeBtn = document.getElementById('menu-close');
    if (!burger || !menu) return;

    let closeTimer = null;

    function setMenu(open) {
      clearTimeout(closeTimer);
      if (open) {
        menu.hidden = false;
        burger.setAttribute('aria-expanded', 'true');
        burger.setAttribute('aria-label', 'Close menu');
        requestAnimationFrame(() => {
          requestAnimationFrame(() => {
            menu.classList.add('is-open');
          });
        });
      } else {
        burger.setAttribute('aria-expanded', 'false');
        burger.setAttribute('aria-label', 'Open menu');
        menu.classList.remove('is-open');
        closeTimer = setTimeout(() => {
          if (!menu.classList.contains('is-open')) {
            menu.hidden = true;
          }
        }, 280);
      }
    }

    burger.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = menu.classList.contains('is-open') && !menu.hidden;
      setMenu(!isOpen);
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        setMenu(false);
      });
    }

    // Submenu toggling on touch
    const subItems = menu.querySelectorAll('.menu-item--has-sub');
    subItems.forEach(item => {
      const link = item.querySelector('.menu-link');
      if (link) {
        link.addEventListener('click', (e) => {
          if (window.matchMedia('(max-width: 768px)').matches || e.target.closest('.menu-chevron')) {
            if (!item.classList.contains('is-expanded')) {
              e.preventDefault();
              item.classList.add('is-expanded');
              return;
            }
          }
        });
      }
    });

    menu.addEventListener('click', (e) => {
      if (!e.target.closest('.menu__panel') || (e.target.closest('a') && !e.target.closest('.menu-item--has-sub > a'))) {
        setMenu(false);
      }
      if (e.target.closest('.menu-sublink')) {
        setMenu(false);
      }
    });

    document.addEventListener('click', (e) => {
      if (menu.classList.contains('is-open')) {
        if (!e.target.closest('.menu__panel') && !e.target.closest('#burger')) {
          setMenu(false);
        }
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && menu.classList.contains('is-open')) {
        setMenu(false);
      }
    });
  }

  // 2. Interactive 5 Steps Switcher (HOW OUR SERVICE WORKS)
  function initSteps() {
    const btns = document.querySelectorAll('.search-step-btn');
    const views = document.querySelectorAll('.search-step-view');
    if (!btns.length || !views.length) return;

    function activateStep(stepNum) {
      btns.forEach(b => {
        const isActive = b.getAttribute('data-step') === stepNum;
        b.classList.toggle('is-active', isActive);
      });

      views.forEach(v => {
        const isActive = v.getAttribute('data-step-view') === stepNum;
        v.classList.toggle('is-active', isActive);
      });
    }

    btns.forEach(btn => {
      btn.addEventListener('click', () => {
        const stepNum = btn.getAttribute('data-step');
        activateStep(stepNum);
      });

      btn.addEventListener('mouseenter', () => {
        const stepNum = btn.getAttribute('data-step');
        activateStep(stepNum);
      });
    });
  }

  function boot() {
    initMenu();
    initSteps();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

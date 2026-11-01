/**
 * AutoDNA Service Page Scripts — Interactive In-Place Service Tabs
 */
(function() {
  'use strict';

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

    // Clicking anywhere outside .menu__panel (or on any menu link) closes the menu
    menu.addEventListener('click', (e) => {
      if (!e.target.closest('.menu__panel') || e.target.closest('a')) {
        setMenu(false);
      }
    });

    // Global click listener to close menu if clicking anywhere on the screen
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

  // Interactive in-place service tabs switcher (Component 8)
  function initServiceTabs() {
    const img = document.getElementById('service-view-img');
    const btns = document.querySelectorAll('.service-tab-btn');
    if (!img || !btns.length) return;

    const sources = {
      'shop': 'assets/img/site1/service-state-shop-vector.svg',
      'plan': 'assets/img/site1/service-state-plan-vector.svg',
      'paint': 'assets/img/site1/service-state-paint-vector.svg'
    };

    btns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const service = btn.getAttribute('data-service');
        if (!sources[service]) return;

        btns.forEach(b => b.classList.remove('is-active'));
        btn.classList.add('is-active');

        // Smooth crossfade
        img.classList.add('is-switching');
        setTimeout(() => {
          img.src = sources[service];
          img.onload = () => {
            img.classList.remove('is-switching');
          };
          // Fallback if cached
          setTimeout(() => {
            img.classList.remove('is-switching');
          }, 50);
        }, 150);
      });
    });
  }

  function boot() {
    initMenu();
    initServiceTabs();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

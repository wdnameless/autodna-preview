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

    function setMenu(open) {
      if (open) {
        menu.hidden = false;
        burger.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
      } else {
        menu.hidden = true;
        burger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    }

    burger.addEventListener('click', () => {
      setMenu(menu.hidden);
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', () => {
        setMenu(false);
      });
    }

    menu.addEventListener('click', (e) => {
      if (e.target.closest('a')) {
        setMenu(false);
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !menu.hidden) {
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
      'shop': 'assets/img/site1/service-state-shop.jpg',
      'plan': 'assets/img/site1/service-state-plan.jpg',
      'paint': 'assets/img/site1/service-state-paint.jpg'
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

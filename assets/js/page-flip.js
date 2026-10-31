/**
 * AutoDNA Flip Page Scripts
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

  function boot() {
    initMenu();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

/** AutoDNA SkipTheDealer Page Scripts */
(function () {
  'use strict';

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

  // Interactive 4 Steps in HOW IT WORKS section (Figma Screenshot 2)
  function initHowItWorks() {
    const tabs = document.querySelectorAll('.hiw-tab');
    const steps = document.querySelectorAll('.hiw-step-view');
    if (!tabs.length || !steps.length) return;

    function activateStep(stepNum) {
      for (const tab of tabs) {
        const isActive = tab.getAttribute('data-step') === stepNum;
        tab.classList.toggle('is-active', isActive);
        tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
      }
      for (const view of steps) {
        const isActive = view.getAttribute('data-step') === stepNum;
        view.classList.toggle('is-active', isActive);
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
    initMenu();
    initHowItWorks();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

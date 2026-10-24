/**
 * AutoDNA — Core Interaction Engine
 * Handles Preloader, Fullscreen Menu Overlay, Interactive Component 7 (Main Services Accordion),
 * SkipTheDealer Step Switcher (Component 4), and Service Component 8 Tabs (Hover/Click).
 */

(function () {
  'use strict';

  /* --- 1. Preloader Overlay --- */
  function initPreloader() {
    var preloader = document.getElementById('preloader');
    if (!preloader) return;

    function hide() {
      preloader.classList.add('is-hidden');
      setTimeout(function () {
        preloader.style.display = 'none';
      }, 600);
    }

    if (document.readyState === 'complete') {
      setTimeout(hide, 800);
    } else {
      window.addEventListener('load', function () {
        setTimeout(hide, 800);
      });
      setTimeout(hide, 2000); // fallback safety
    }
  }

  /* --- 2. Menu Drawer Overlay --- */
  function initMenu() {
    var overlay = document.getElementById('menu');
    if (!overlay) return;

    var openBtns = document.querySelectorAll('[data-menu-open]');
    var closeBtns = document.querySelectorAll('[data-menu-close]');

    function openMenu() {
      overlay.classList.add('is-open');
      document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
      overlay.classList.remove('is-open');
      document.body.style.overflow = '';
    }

    openBtns.forEach(function (btn) {
      btn.addEventListener('click', openMenu);
    });

    closeBtns.forEach(function (btn) {
      btn.addEventListener('click', closeMenu);
    });

    overlay.addEventListener('click', function (e) {
      if (e.target === overlay) {
        closeMenu();
      }
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && overlay.classList.contains('is-open')) {
        closeMenu();
      }
    });

    // Close menu when clicking internal jump links
    overlay.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        closeMenu();
      });
    });
  }

  /* --- 3. SkipTheDealer Step Switcher (Component 4) --- */
  function initStepSwitcher() {
    var container = document.querySelector('[data-step-switcher]');
    if (!container) return;

    var tabs = container.querySelectorAll('[data-step-tab]');
    var panels = container.querySelectorAll('[data-step-panel]');

    function activateStep(stepNum) {
      tabs.forEach(function (tab) {
        var active = tab.getAttribute('data-step-tab') === stepNum;
        tab.classList.toggle('is-active', active);
        tab.setAttribute('aria-selected', active ? 'true' : 'false');
      });

      panels.forEach(function (panel) {
        var active = panel.getAttribute('data-step-panel') === stepNum;
        panel.classList.toggle('is-active', active);
      });
    }

    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        var step = this.getAttribute('data-step-tab');
        activateStep(step);
      });
    });
  }

  /* --- 4. Service Page Component 8 Tabs (Hover and Click Switcher) --- */
  function initServiceSwitcher() {
    var container = document.querySelector('[data-service-switcher]');
    if (!container) return;

    var tabs = container.querySelectorAll('[data-service-tab]');
    var panels = container.querySelectorAll('[data-service-panel]');

    function activateTab(tabKey) {
      tabs.forEach(function (tab) {
        var active = tab.getAttribute('data-service-tab') === tabKey;
        tab.classList.toggle('is-active', active);
        tab.setAttribute('aria-selected', active ? 'true' : 'false');
      });

      panels.forEach(function (panel) {
        var active = panel.getAttribute('data-service-panel') === tabKey;
        panel.classList.toggle('is-active', active);
      });
    }

    tabs.forEach(function (tab) {
      // Switch on click
      tab.addEventListener('click', function () {
        var key = this.getAttribute('data-service-tab');
        activateTab(key);
      });

      // Switch on hover for fluid desktop exploration as requested in video
      tab.addEventListener('mouseenter', function () {
        var key = this.getAttribute('data-service-tab');
        activateTab(key);
      });
    });
  }

  /* --- 5. Main Page Component 7 Accordion / Hover --- */
  function initServicesAccordion() {
    var container = document.querySelector('[data-services-accordion]');
    if (!container) return;

    var cards = container.querySelectorAll('.dna-service-card');

    cards.forEach(function (card) {
      card.addEventListener('mouseenter', function () {
        cards.forEach(function (c) { c.classList.remove('is-expanded'); });
        this.classList.add('is-expanded');
      });
    });
  }

  /* --- 6. Form Validation --- */
  function initForms() {
    var forms = document.querySelectorAll('form[data-quote]');
    forms.forEach(function (form) {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var isValid = true;
        var requiredInputs = form.querySelectorAll('[required]');

        requiredInputs.forEach(function (input) {
          var field = input.closest('.dna-field');
          var value = (input.value || '').trim();
          var fieldValid = value.length > 0;

          if (input.type === 'email' && value) {
            fieldValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
          }

          if (field) {
            field.classList.toggle('is-invalid', !fieldValid);
          }

          if (!fieldValid) {
            isValid = false;
          }
        });

        if (!isValid) return;

        var successMsg = form.querySelector('.dna-form-success');
        if (successMsg) {
          form.querySelectorAll('.dna-form-grid, button[type="submit"]').forEach(function (el) {
            el.style.display = 'none';
          });
          successMsg.classList.add('is-visible');
        }

        form.reset();
      });
    });
  }

  /* --- Initialize all modules --- */
  function boot() {
    initPreloader();
    initMenu();
    initStepSwitcher();
    initServiceSwitcher();
    initServicesAccordion();
    initForms();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

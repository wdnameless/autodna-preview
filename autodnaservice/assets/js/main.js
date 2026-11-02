/**
 * AutoDNA Service — Standalone Website Scripts
 */
(function() {
  'use strict';

  // ══ 1. DYNAMIC STICKY DOCKED HEADER & DROPDOWNS ═══════════════════════
  function initHeader() {
    const stickyHeader = document.querySelector('#sticky-header');
    const evoPanel = document.querySelector('.panel-evolution');
    const evoBtn = document.querySelector('#btn-evolution');

    // Toggle evolution panel on click
    if (evoPanel && evoBtn) {
      evoBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = evoPanel.classList.contains('is-open');
        evoPanel.classList.toggle('is-open', !isOpen);
        evoBtn.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
      });
    }

    // Scroll listener: dock sticky header when scrolled down past hero (> 400px)
    if (stickyHeader) {
      function onScroll() {
        const scrolled = window.scrollY > 400;
        stickyHeader.classList.toggle('is-docked', scrolled);
      }
      window.addEventListener('scroll', onScroll, { passive: true });
      onScroll();
    }

    // Connect dropdown links to smooth scroll and multiple-services tabs
    document.querySelectorAll('[data-tab]').forEach(link => {
      link.addEventListener('click', () => {
        const tab = link.getAttribute('data-tab');
        if (tab && window.activateServiceTab) {
          window.activateServiceTab(tab);
        }
      });
    });
  }

  // ══ 2. MULTI-SERVICE TABS ═════════════════════════════════════════════
  function initMultiview() {
    const btns = document.querySelectorAll('.body-tab-btn');

    window.activateServiceTab = function(service) {
      btns.forEach(b => {
        const isActive = b.getAttribute('data-service') === service;
        b.classList.toggle('is-active', isActive);
      });
    };

    btns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const service = btn.getAttribute('data-service');
        if (service) window.activateServiceTab(service);
      });
    });
  }

  // ══ 3. BOOTSTRAP ══════════════════════════════════════════════════════
  function boot() {
    initHeader();
    initMultiview();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

/**
 * AutoDNA Service — Standalone Website Scripts
 */
(function() {
  'use strict';

  // ══ 1. MULTI-SERVICE TABS (Switch on HOVER & click) ═══════════════════
  function initMultiview() {
    const columnBtns = document.querySelectorAll('.service-tab-btn, .multiview-column-btn');
    const states = document.querySelectorAll('.multiview-state');
    if (!states.length) return;

    window.activateServiceTab = function(service) {
      columnBtns.forEach(b => {
        const isActive = b.getAttribute('data-service') === service;
        b.classList.toggle('is-active', isActive);
      });

      states.forEach(s => {
        const isActive = s.classList.contains('multiview-state--' + service);
        s.classList.toggle('is-active', isActive);
      });
    };

    columnBtns.forEach(btn => {
      // Hover switches image & active card immediately
      btn.addEventListener('mouseenter', () => {
        const service = btn.getAttribute('data-service');
        if (service) window.activateServiceTab(service);
      });
      // Click also switches
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const service = btn.getAttribute('data-service');
        if (service) window.activateServiceTab(service);
      });
    });

    // Handle all data-tab triggers across the page (Hero indicators & Header dropdown)
    document.querySelectorAll('[data-tab]').forEach(link => {
      link.addEventListener('mouseenter', () => {
        const tab = link.getAttribute('data-tab');
        if (tab && window.activateServiceTab) {
          window.activateServiceTab(tab);
        }
      });
      link.addEventListener('click', () => {
        const tab = link.getAttribute('data-tab');
        if (tab && window.activateServiceTab) {
          window.activateServiceTab(tab);
        }
      });
    });
  }

  // ══ 2. DYNAMIC STICKY HEADER & DROPDOWNS ══════════════════════════════
  function initHeader() {
    const evoPanel = document.querySelector('.panel-evolution');
    const evoBtn = document.querySelector('#btn-evolution');

    if (evoPanel && evoBtn) {
      evoBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = evoPanel.classList.contains('is-open');
        evoPanel.classList.toggle('is-open', !isOpen);
        evoBtn.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
      });

      document.addEventListener('click', (e) => {
        if (!e.target.closest('.panel-evolution')) {
          evoPanel.classList.remove('is-open');
          evoBtn.setAttribute('aria-expanded', 'false');
        }
      });
    }
  }

  // ══ 3. BOOTSTRAP ══════════════════════════════════════════════════════
  function boot() {
    initMultiview();
    initHeader();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

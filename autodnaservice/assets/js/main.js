/**
 * AutoDNA Service — Standalone Website Scripts
 */
(function() {
  'use strict';

  // ══ 1. MULTI-SERVICE TABS (Switch on HOVER & click) ═══════════════════
  function initMultiview() {
    const columnBtns = document.querySelectorAll('.service-col-btn, .service-tab-btn, .multiview-column-btn');
    const views = document.querySelectorAll('.service-card-view, .multiview-state');
    if (!columnBtns.length && !views.length) return;

    window.activateServiceTab = function(service) {
      columnBtns.forEach(b => {
        const isActive = b.getAttribute('data-service') === service;
        b.classList.toggle('is-active', isActive);
      });

      views.forEach(v => {
        const vService = v.getAttribute('data-service-view') || (v.classList.contains('multiview-state--' + service) ? service : '');
        const isActive = vService === service;
        v.classList.toggle('is-active', isActive);
      });
    };

    columnBtns.forEach(btn => {
      btn.addEventListener('mouseenter', () => {
        const service = btn.getAttribute('data-service');
        if (service) window.activateServiceTab(service);
      });
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

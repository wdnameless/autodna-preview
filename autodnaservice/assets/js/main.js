/**
 * AutoDNA Service — Standalone Website Scripts
 */
(function() {
  'use strict';

  // ══ 1. DYNAMIC STICKY HEADER & DROPDOWNS ══════════════════════════════
  function initHeader() {
    const evoPanel = document.querySelector('.panel-evolution');
    const evoBtn = document.getElementById('btn-evolution');

    if (evoPanel && evoBtn) {
      evoBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = evoPanel.classList.contains('is-open');
        evoPanel.classList.toggle('is-open', !isOpen);
        evoBtn.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');
      });
    }

    // Connect dropdown links to multiview tabs
    document.querySelectorAll('[data-tab]').forEach(link => {
      link.addEventListener('click', (e) => {
        const tab = link.getAttribute('data-tab');
        if (tab && window.activateServiceTab) {
          window.activateServiceTab(tab);
        }
      });
    });
  }

  // ══ 2. MULTI-SERVICE TABS (Instant 0ms resident layer crossfade) ═══════
  function initMultiview() {
    const btns = document.querySelectorAll('.multiview-tab-btn');
    const layers = document.querySelectorAll('.multiview-layer');
    if (!btns.length || !layers.length) return;

    window.activateServiceTab = function(service) {
      btns.forEach(b => {
        const isActive = b.getAttribute('data-service') === service;
        b.classList.toggle('is-active', isActive);
      });

      layers.forEach(l => {
        const isActive = l.classList.contains('multiview-layer--' + service);
        l.classList.toggle('is-active', isActive);
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

  // ══ 3. PRICE RESET TABLE INTERACTION ══════════════════════════════════
  function initPriceReset() {
    const rows = document.querySelectorAll('.hitarea--price-row');
    rows.forEach(row => {
      row.addEventListener('click', () => {
        rows.forEach(r => r.style.background = 'transparent');
        row.style.background = 'rgba(150, 133, 255, 0.22)';
      });
    });
  }

  // ══ 4. BOOTSTRAP ══════════════════════════════════════════════════════
  function boot() {
    initHeader();
    initMultiview();
    initPriceReset();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

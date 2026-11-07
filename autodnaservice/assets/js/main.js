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
        const service = btn.getAttribute('data-service');
        const href = btn.getAttribute('href') || btn.getAttribute('data-href');
        // If already active or arrow clicked, navigate to subpage!
        if (btn.classList.contains('is-active') && href && href !== '#') {
          window.location.href = href;
          return;
        }
        e.preventDefault();
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
  
  // ══ 3. SMOOTH SCROLLING FOR ALL IN-PAGE ANCHORS ═══════════════════════
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href === '#' || !href) return;
        const target = document.querySelector(href);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
          try {
            history.pushState(null, '', href);
          } catch (e) { void e; }
        }
      });
    });
  }

  
  // ══ 0. FULLSCREEN HUD BURGER MENU ═════════════════════════════════════
  function initMenu() {
    const burger = document.getElementById('burger');
    const menu = document.getElementById('menu');
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

    // Toggle submenu on mobile / click
    const subItems = menu.querySelectorAll('.menu-item--has-sub');
    subItems.forEach(item => {
      const link = item.querySelector('.menu-link');
      if (link) {
        link.addEventListener('click', (e) => {
          if (window.matchMedia('(max-width: 768px)').matches || e.target.closest('.menu-chevron')) {
            if (!item.classList.contains('is-expanded')) {
              e.preventDefault();
              item.classList.add('is-expanded');
            }
          }
        });
      }
    });

    // Close on click outside
    document.addEventListener('click', (e) => {
      if (menu.classList.contains('is-open')) {
        if (!e.target.closest('.menu__panel') && !e.target.closest('#burger')) {
          setMenu(false);
        }
      }
    });
  }

function boot() {
    initMenu();
    initMultiview();
    initHeader();
    initSmoothScroll();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

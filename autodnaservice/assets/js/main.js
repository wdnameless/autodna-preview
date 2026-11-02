/**
 * AutoDNA Service — Standalone Website Scripts
 */
(function() {
  'use strict';

  // ══ 1. SLIDING MENU DRAWER & SUBMENU ══════════════════════════════════
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

    // Submenu click toggle
    const subItems = menu.querySelectorAll('.menu-item--has-sub');
    subItems.forEach(item => {
      const link = item.querySelector('.menu-link');
      if (link) {
        link.addEventListener('click', (e) => {
          if (window.matchMedia('(max-width: 768px)').matches || e.target.closest('.menu-chevron')) {
            if (!item.classList.contains('is-expanded')) {
              e.preventDefault();
              item.classList.add('is-expanded');
              return;
            }
          }
        });
      }
    });

    // Close on click outside panel
    menu.addEventListener('click', (e) => {
      if (!e.target.closest('.menu__panel') || (e.target.closest('a') && !e.target.closest('.menu-item--has-sub > a'))) {
        setMenu(false);
      }
      if (e.target.closest('.menu-sublink')) {
        setMenu(false);
      }
    });

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

  // ══ 2. MULTI-SERVICE TABS (Instant 0ms resident layer crossfade) ═══════
  function initMultiview() {
    const btns = document.querySelectorAll('.multiview-tab-btn');
    const layers = document.querySelectorAll('.multiview-layer');
    if (!btns.length || !layers.length) return;

    function activateTab(service) {
      btns.forEach(b => {
        const isActive = b.getAttribute('data-service') === service;
        b.classList.toggle('is-active', isActive);
      });

      layers.forEach(l => {
        const isActive = l.classList.contains('multiview-layer--' + service);
        l.classList.toggle('is-active', isActive);
      });
    }

    btns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const service = btn.getAttribute('data-service');
        if (service) activateTab(service);
      });
    });

    // Listen to header dropdown links with data-tab
    document.querySelectorAll('[data-tab]').forEach(link => {
      link.addEventListener('click', () => {
        const tab = link.getAttribute('data-tab');
        if (tab) {
          activateTab(tab);
          const target = document.getElementById('multiple-services');
          if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
          }
        }
      });
    });
  }

  // ══ 3. PRICE RESET TABLE INTERACTION ══════════════════════════════════
  function initPriceReset() {
    const rows = document.querySelectorAll('.hitarea--price-row');
    rows.forEach((row, i) => {
      row.addEventListener('click', () => {
        rows.forEach(r => r.style.background = 'transparent');
        row.style.background = 'rgba(150, 133, 255, 0.22)';
      });
    });
  }

  // ══ 4. BOOTSTRAP ══════════════════════════════════════════════════════
  function boot() {
    initMenu();
    initMultiview();
    initPriceReset();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

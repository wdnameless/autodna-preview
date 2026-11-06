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

    // Toggle submenu on mobile / click
    const subItems = menu.querySelectorAll('.menu-item--has-sub');
    subItems.forEach(item => {
      const link = item.querySelector('.menu-link');
      if (link) {
        link.addEventListener('click', () => {
          // If on touch device, toggle submenu
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

    // Clicking anywhere outside .menu__panel (or on any regular menu link) closes the menu
    menu.addEventListener('click', (e) => {
      if (!e.target.closest('.menu__panel') || (e.target.closest('a') && !e.target.closest('.menu-item--has-sub > a'))) {
        setMenu(false);
      }
      if (e.target.closest('.menu-sublink')) {
        setMenu(false);
      }
    });

    // Global click listener to close menu if clicking anywhere on the screen
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

  // Interactive in-place service tabs switcher & direct subpage navigation
  function initServiceTabs() {
    const btns = document.querySelectorAll('.service-col-btn, .service-tab-btn');
    const layers = document.querySelectorAll('.service-card-view, .service-view-layer');
    if (!btns.length && !layers.length) return;

    function activateTab(service) {
      btns.forEach(b => {
        const isActive = b.getAttribute('data-service') === service;
        b.classList.toggle('is-active', isActive);
      });

      layers.forEach(layer => {
        const layerService = layer.getAttribute('data-service-view') || (layer.classList.contains('service-view-layer--' + service) ? service : '');
        const isActive = layerService === service;
        layer.classList.toggle('is-active', isActive);
      });
    }

    btns.forEach(btn => {
      btn.addEventListener('mouseenter', () => {
        const service = btn.getAttribute('data-service');
        if (service) activateTab(service);
      });

      btn.addEventListener('click', function(e) {
        const service = this.getAttribute('data-service');
        const href = this.getAttribute('href') || this.getAttribute('data-href');

        // If card is active and has href, navigate directly to subpage!
        if (this.classList.contains('is-active') && href && href !== '#') {
          window.location.href = href;
          return;
        }

        e.preventDefault();
        if (service) activateTab(service);
      });
    });

    // Dedicated arrow buttons [↗] ALWAYS navigate immediately
    document.querySelectorAll('.service-arrow-btn').forEach(arrow => {
      arrow.addEventListener('click', function() {
        const href = this.getAttribute('href');
        if (href && href !== '#') {
          window.location.href = href;
        }
      });
    });

    // Handle all data-tab triggers across the page (Hero indicators & Header dropdown)
    document.querySelectorAll('[data-tab]').forEach(link => {
      link.addEventListener('mouseenter', () => {
        const tab = link.getAttribute('data-tab');
        if (tab) activateTab(tab);
      });
      link.addEventListener('click', () => {
        const tab = link.getAttribute('data-tab');
        if (tab) activateTab(tab);
      });
    });
  }

  
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

  function boot() {
    initMenu();
    initServiceTabs();
    initSmoothScroll();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

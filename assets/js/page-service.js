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
        link.addEventListener('click', (e) => {
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

  
  // ══ DYNAMIC STICKY HEADER & DROPDOWNS ══════════════════════════════
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

function boot() {
    initMenu();
    initHeader();
    initServiceTabs();
    initSmoothScroll();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

/* ══ MOBILE STEPS CAROUSEL — swipe, dots, keyboard ══════════════════════ */
(function () {
  'use strict';

  function initSteps() {
    document.querySelectorAll('[data-steps]').forEach(function (root) {
      var viewport = root.querySelector('.steps__viewport');
      var slides = root.querySelectorAll('.steps__slide');
      var dots = root.querySelectorAll('.steps__dot');
      if (!viewport || !slides.length) return;

      var index = 0;

      function setActive(i) {
        index = i;
        dots.forEach(function (d, di) {
          d.classList.toggle('is-active', di === i);
          d.setAttribute('aria-selected', di === i ? 'true' : 'false');
        });
      }

      function goTo(i, smooth) {
        i = Math.max(0, Math.min(slides.length - 1, i));
        var target = slides[i];
        if (!target) return;
        viewport.scrollTo({
          left: target.offsetLeft - viewport.offsetLeft,
          behavior: smooth === false ? 'auto' : 'smooth'
        });
        setActive(i);
      }

      // Sync active dot while the user swipes
      var raf = 0;
      viewport.addEventListener('scroll', function () {
        cancelAnimationFrame(raf);
        raf = requestAnimationFrame(function () {
          var w = viewport.clientWidth || 1;
          var i = Math.round(viewport.scrollLeft / w);
          if (i !== index) setActive(i);
        });
      }, { passive: true });

      // Dots
      dots.forEach(function (d) {
        d.addEventListener('click', function () {
          goTo(parseInt(d.getAttribute('data-go'), 10) || 0);
        });
      });

      // Keyboard: arrows swipe left/right
      root.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowRight') { e.preventDefault(); goTo(index + 1); }
        if (e.key === 'ArrowLeft')  { e.preventDefault(); goTo(index - 1); }
      });

      // Drag-to-swipe with a mouse (desktop touchpads already work natively)
      var down = false, startX = 0, startLeft = 0;
      viewport.addEventListener('pointerdown', function (e) {
        if (e.pointerType === 'mouse') {
          down = true; startX = e.clientX; startLeft = viewport.scrollLeft;
          viewport.style.cursor = 'grabbing';
        }
      });
      viewport.addEventListener('pointermove', function (e) {
        if (!down) return;
        viewport.scrollLeft = startLeft - (e.clientX - startX);
      });
      ['pointerup', 'pointerleave', 'pointercancel'].forEach(function (ev) {
        viewport.addEventListener(ev, function () {
          if (!down) return;
          down = false;
          viewport.style.cursor = '';
          goTo(Math.round(viewport.scrollLeft / (viewport.clientWidth || 1)));
        });
      });

      setActive(0);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSteps);
  } else {
    initSteps();
  }
})();

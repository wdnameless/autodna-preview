/** AutoDNA SkipTheDealer Page Scripts — Living Interactive Menu & Precise Smooth Scroll */
(function () {
  'use strict';

  // Exact section target ratios in 15951px artboard
  const SECTION_RATIOS = {
    'top': 0,
    'cars': 0.1160,       // y ≈ 1850 in 15951 (Cars & Inventory)
    'how-it-works': 0.2037, // y ≈ 3250 in 15951 (How It Works)
    'carlears': 0.3950,   // y ≈ 6300 in 15951 (Why Us / Carlears)
    'standard': 0.6395,   // y ≈ 10200 in 15951 (The Standard / Extras)
    'contact': 0.9090     // y ≈ 14500 in 15951 (Submit A Request & Footer)
  };

  // Mobile section ratios in 17278px mobile artboard
  const MOB_SECTION_RATIOS = {
    'top': 0,
    'how-it-works': 0.043,
    'cars': 0.180,
    'contact': 0.910
  };

  function scrollToSection(key) {
    const isMobile = window.matchMedia('(max-width: 768px)').matches;
    const ratios = isMobile ? MOB_SECTION_RATIOS : SECTION_RATIOS;
    const ratio = ratios[key];
    if (ratio === undefined) return;

    const totalHeight = document.body.scrollHeight || document.documentElement.scrollHeight;
    const targetY = totalHeight * ratio;

    window.scrollTo({
      top: targetY,
      behavior: 'smooth'
    });
  }

  // 1. Living Hero Menu (Desktop)
  function initHeroMenu() {
    const heroMenu = document.querySelector('#hero-menu');
    if (!heroMenu) return;

    // Smooth scroll for hero menu links
    heroMenu.querySelectorAll('[data-scroll]').forEach(link => {
      link.addEventListener('click', (e) => {
        const key = link.getAttribute('data-scroll');
        if (key && key !== 'top') {
          e.preventDefault();
          scrollToSection(key);
        }
      });
    });

    // Scrollspy: update active link as user scrolls
    const menuRows = heroMenu.querySelectorAll('.dealer-hero-menu__row[data-scroll]');
    function updateScrollspy() {
      const scrollY = window.scrollY;
      const totalH = document.body.scrollHeight || document.documentElement.scrollHeight;
      const scrollRatio = scrollY / totalH;

      let currentKey = 'top';
      for (const [key, ratio] of Object.entries(SECTION_RATIOS)) {
        if (scrollRatio >= ratio - 0.04) {
          currentKey = key;
        }
      }

      menuRows.forEach(row => {
        const isMatch = row.getAttribute('data-scroll') === currentKey;
        row.classList.toggle('is-active', isMatch);
      });
    }

    window.addEventListener('scroll', updateScrollspy, { passive: true });
    updateScrollspy();
  }

  // 2. Sticky HUD on Scroll
  function initStickyHUD() {
    const stickyHud = document.querySelector('#sticky-hud');
    const stickyBurger = document.querySelector('#sticky-burger');
    const mobBurger = document.querySelector('#mob-burger');
    const menu = document.querySelector('#menu');
    if (!menu) return;

    function setMenu(open) {
      if (open) {
        menu.hidden = false;
        requestAnimationFrame(() => {
          menu.classList.add('is-open');
        });
      } else {
        menu.classList.remove('is-open');
        setTimeout(() => {
          if (!menu.classList.contains('is-open')) menu.hidden = true;
        }, 250);
      }
    }

    function toggleMenu() {
      const isOpen = menu.classList.contains('is-open') && !menu.hidden;
      setMenu(!isOpen);
    }

    if (stickyBurger) stickyBurger.addEventListener('click', toggleMenu);
    if (mobBurger) mobBurger.addEventListener('click', toggleMenu);

    // Show/hide sticky HUD on scroll
    if (stickyHud) {
      window.addEventListener('scroll', () => {
        if (window.scrollY > 700) {
          stickyHud.classList.add('is-visible');
        } else {
          stickyHud.classList.remove('is-visible');
        }
      }, { passive: true });
    }

    // Smooth scroll for menu drawer links
    menu.querySelectorAll('[data-scroll]').forEach(link => {
      link.addEventListener('click', (e) => {
        const key = link.getAttribute('data-scroll');
        if (key) {
          e.preventDefault();
          setMenu(false);
          setTimeout(() => scrollToSection(key), 100);
        }
      });
    });

    // Close menu when clicking outside
    menu.addEventListener('click', (e) => {
      if (!e.target.closest('.menu__panel')) {
        setMenu(false);
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && menu.classList.contains('is-open')) {
        setMenu(false);
      }
    });
  }

  // 3. Page CTA Hitareas Smooth Scrolling
  function initHitareas() {
    document.querySelectorAll('[data-scroll]').forEach(el => {
      if (el.closest('#hero-menu') || el.closest('#menu')) return;
      el.addEventListener('click', (e) => {
        const key = el.getAttribute('data-scroll');
        if (key) {
          e.preventDefault();
          scrollToSection(key);
        }
      });
    });
  }

  function boot() {
    initHeroMenu();
    initStickyHUD();
    initHitareas();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

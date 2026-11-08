/** AutoDNA SkipTheDealer Page Scripts — Standard Global Burger Menu + Living Hero Menu */
(function () {
  'use strict';

  // Section target ratios in 15951px artboard
  const SECTION_RATIOS = {
    'top': 0,
    'cars': 0.1160,       // y ≈ 1850 in 15951 (Cars & Inventory)
    'how-it-works': 0.2037, // y ≈ 3250 in 15951 (How It Works)
    'carlears': 0.3950,   // y ≈ 6300 in 15951 (Why Us / Carlears)
    'standard': 0.6395,   // y ≈ 10200 in 15951 (The Standard / Extras)
    'contact': 0.9090     // y ≈ 14500 in 15951 (Submit A Request & Footer)
  };

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

  // 1. Standard Fullscreen / Sliding Burger Menu (Matching all other pages)
  function initStandardBurgerMenu() {
    const burgerBtns = document.querySelectorAll('#burger, #mob-burger, #sticky-burger');
    const menu = document.querySelector('#menu');
    if (!burgerBtns.length || !menu) return;

    let closeTimer = null;

    function setMenu(open) {
      clearTimeout(closeTimer);
      if (open) {
        menu.hidden = false;
        document.body.classList.add('menu-open');
        burgerBtns.forEach(b => {
          b.setAttribute('aria-expanded', 'true');
          b.setAttribute('aria-label', 'Close menu');
        });
        requestAnimationFrame(() => {
          requestAnimationFrame(() => {
            menu.classList.add('is-open');
          });
        });
      } else {
        document.body.classList.remove('menu-open');
        burgerBtns.forEach(b => {
          b.setAttribute('aria-expanded', 'false');
          b.setAttribute('aria-label', 'Open menu');
        });
        menu.classList.remove('is-open');
        closeTimer = setTimeout(() => {
          if (!menu.classList.contains('is-open')) {
            menu.hidden = true;
          }
        }, 280);
      }
    }

    burgerBtns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const isOpen = menu.classList.contains('is-open') && !menu.hidden;
        setMenu(!isOpen);
      });
    });

    const closeBtn = document.querySelector('#menu-close');
    if (closeBtn) {
      closeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        setMenu(false);
      });
    }

    // Toggle submenus inside menu
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

    // Clicking anywhere outside .menu__panel closes the menu
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

    // Handle smooth scroll for menu links with data-scroll
    menu.querySelectorAll('[data-scroll]').forEach(link => {
      link.addEventListener('click', (e) => {
        const key = link.getAttribute('data-scroll');
        if (key) {
          e.preventDefault();
          setMenu(false);
          setTimeout(() => scrollToSection(key), 120);
        }
      });
    });
  }

  // 2. Living Hero Menu (Desktop)
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

  // 3. CTA Hitareas Smooth Scrolling
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
    initStandardBurgerMenu();
    initHeroMenu();
    initHitareas();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

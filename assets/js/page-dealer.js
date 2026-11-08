/** AutoDNA SkipTheDealer Page Scripts — 100% Authentic Figma Navigation */
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

  // 1. Hero Menu & Hitareas Smooth Scrolling
  function initHeroNav() {
    document.querySelectorAll('[data-scroll]').forEach(link => {
      link.addEventListener('click', (e) => {
        const key = link.getAttribute('data-scroll');
        if (key && key !== 'top') {
          e.preventDefault();
          scrollToSection(key);
        }
      });
    });

    const burgerBtn = document.querySelector('#burger');
    if (burgerBtn) {
      burgerBtn.addEventListener('click', () => {
        // Burger click scrolls smoothly to How It Works
        scrollToSection('how-it-works');
      });
    }
  }

  // 2. Sticky HUD & Dropdown Menu
  function initStickyHUD() {
    const stickyHud = document.querySelector('#sticky-hud');
    const stickyBurger = document.querySelector('#sticky-burger');
    const stickyMenu = document.querySelector('#sticky-menu');
    if (!stickyHud || !stickyBurger || !stickyMenu) return;

    window.addEventListener('scroll', () => {
      if (window.scrollY > 750) {
        stickyHud.classList.add('is-visible');
      } else {
        stickyHud.classList.remove('is-visible');
        stickyMenu.hidden = true;
        stickyBurger.setAttribute('aria-expanded', 'false');
      }
    }, { passive: true });

    stickyBurger.addEventListener('click', (e) => {
      e.stopPropagation();
      const isHidden = stickyMenu.hidden;
      stickyMenu.hidden = !isHidden;
      stickyBurger.setAttribute('aria-expanded', isHidden);
    });

    document.addEventListener('click', (e) => {
      if (!stickyMenu.hidden && !e.target.closest('#sticky-hud')) {
        stickyMenu.hidden = true;
        stickyBurger.setAttribute('aria-expanded', 'false');
      }
    });

    stickyMenu.querySelectorAll('[data-scroll]').forEach(link => {
      link.addEventListener('click', (e) => {
        const key = link.getAttribute('data-scroll');
        if (key) {
          e.preventDefault();
          stickyMenu.hidden = true;
          stickyBurger.setAttribute('aria-expanded', 'false');
          setTimeout(() => scrollToSection(key), 80);
        }
      });
    });
  }

  // 3. Mobile Navigation Drawer
  function initMobileMenu() {
    const mobBurger = document.querySelector('#mob-burger');
    const mobMenu = document.querySelector('#mob-menu');
    const mobClose = document.querySelector('#mob-close');
    if (!mobBurger || !mobMenu) return;

    function setMobMenu(open) {
      if (open) {
        mobMenu.hidden = false;
        mobBurger.setAttribute('aria-expanded', 'true');
        requestAnimationFrame(() => mobMenu.classList.add('is-open'));
      } else {
        mobBurger.setAttribute('aria-expanded', 'false');
        mobMenu.classList.remove('is-open');
        setTimeout(() => { mobMenu.hidden = true; }, 260);
      }
    }

    mobBurger.addEventListener('click', (e) => {
      e.stopPropagation();
      setMobMenu(mobMenu.hidden);
    });

    if (mobClose) {
      mobClose.addEventListener('click', (e) => {
        e.stopPropagation();
        setMobMenu(false);
      });
    }

    document.addEventListener('click', (e) => {
      if (!mobMenu.hidden && !e.target.closest('#mob-menu') && !e.target.closest('#mob-burger')) {
        setMobMenu(false);
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !mobMenu.hidden) {
        setMobMenu(false);
      }
    });

    mobMenu.querySelectorAll('[data-scroll]').forEach(link => {
      link.addEventListener('click', (e) => {
        const key = link.getAttribute('data-scroll');
        if (key) {
          e.preventDefault();
          setMobMenu(false);
          setTimeout(() => scrollToSection(key), 120);
        }
      });
    });
  }

  function boot() {
    initHeroNav();
    initStickyHUD();
    initMobileMenu();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

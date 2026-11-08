/** AutoDNA SkipTheDealer Page Scripts — Clean Full-Bleed & On-Click Menu Only */
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

  // 1. Desktop Hero Menu (Opens ONLY when clicking burger button)
  function initHeroMenu() {
    const heroMenu = document.querySelector('#hero-menu');
    const burgerBtn = document.querySelector('#burger');
    const closeBtn = document.querySelector('#btn-close-menu');
    if (!heroMenu || !burgerBtn) return;

    function setMenu(open) {
      if (open) {
        heroMenu.hidden = false;
        burgerBtn.setAttribute('aria-expanded', 'true');
        requestAnimationFrame(() => {
          heroMenu.classList.add('is-open');
        });
      } else {
        burgerBtn.setAttribute('aria-expanded', 'false');
        heroMenu.classList.remove('is-open');
        setTimeout(() => {
          if (!heroMenu.classList.contains('is-open')) {
            heroMenu.hidden = true;
          }
        }, 250);
      }
    }

    burgerBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = heroMenu.classList.contains('is-open') && !heroMenu.hidden;
      setMenu(!isOpen);
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        setMenu(false);
      });
    }

    // Close when clicking outside
    document.addEventListener('click', (e) => {
      if (!heroMenu.hidden && !e.target.closest('#hero-menu') && !e.target.closest('#burger')) {
        setMenu(false);
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !heroMenu.hidden) {
        setMenu(false);
      }
    });

    // Smooth scroll for hero menu links
    heroMenu.querySelectorAll('[data-scroll]').forEach(link => {
      link.addEventListener('click', (e) => {
        const key = link.getAttribute('data-scroll');
        if (key) {
          e.preventDefault();
          setMenu(false);
          setTimeout(() => scrollToSection(key), 80);
        }
      });
    });
  }

  // 2. Mobile Navigation Drawer
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

    // Close when clicking outside
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

    // Smooth scroll for mobile links
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

  // 3. CTA Hitareas Smooth Scrolling
  function initHitareas() {
    document.querySelectorAll('[data-scroll]').forEach(el => {
      if (el.closest('#hero-menu') || el.closest('#mob-menu')) return;
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
    initMobileMenu();
    initHitareas();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

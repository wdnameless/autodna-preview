/** AutoDNA SkipTheDealer Page Scripts — 100% Pure Figma Navigation */
(function () {
  'use strict';

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

  function boot() {
    document.querySelectorAll('[data-scroll]').forEach(link => {
      link.addEventListener('click', (e) => {
        const key = link.getAttribute('data-scroll');
        if (key && key !== 'top') {
          e.preventDefault();
          scrollToSection(key);
        } else if (key === 'top') {
          e.preventDefault();
          window.scrollTo({ top: 0, behavior: 'smooth' });
        }
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

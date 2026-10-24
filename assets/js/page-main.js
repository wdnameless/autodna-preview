/**
 * Main page — slider controls
 */
(function () {
  'use strict';

  function initSliders() {
    const sliders = document.querySelectorAll('[data-slider]');
    sliders.forEach(function (slider) {
      const group = slider.closest('[data-slider-group]') || slider.parentElement;
      if (!group) return;

      const prevBtn = group.querySelector('[data-prev]');
      const nextBtn = group.querySelector('[data-next]');

      function slide(direction) {
        const firstChild = slider.firstElementChild;
        const scrollDistance = firstChild ? firstChild.offsetWidth + 16 : 280;
        slider.scrollBy({ left: direction * scrollDistance, behavior: 'smooth' });
      }

      if (prevBtn) {
        prevBtn.addEventListener('click', function (e) {
          e.preventDefault();
          slide(-1);
        });
      }

      if (nextBtn) {
        nextBtn.addEventListener('click', function (e) {
          e.preventDefault();
          slide(1);
        });
      }
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSliders);
  } else {
    initSliders();
  }
})();

/**
 * SkipTheDealer — results carousel and FAQ accordion
 */
document.addEventListener('DOMContentLoaded', () => {
  // --- Carousel Slider ---
  const sliders = document.querySelectorAll('[data-slider]');
  sliders.forEach((slider) => {
    const track = slider.querySelector('.dealer-carousel-track') || slider.querySelector('[data-slider-track]');
    const prevBtn = slider.querySelector('[data-prev]');
    const nextBtn = slider.querySelector('[data-next]');
    if (!track) return;

    let currentIndex = 0;
    const cards = track.children;
    const totalCards = cards.length;

    const updateSlider = () => {
      if (totalCards === 0) return;
      const cardWidth = cards[0].offsetWidth;
      const gap = 24; // 1.5rem / gap-6
      const offset = currentIndex * (cardWidth + gap);
      track.style.transform = `translateX(-${offset}px)`;
    };

    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        const visibleCount = window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1;
        const maxIndex = Math.max(0, totalCards - visibleCount);
        if (currentIndex < maxIndex) {
          currentIndex++;
        } else {
          currentIndex = 0;
        }
        updateSlider();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        const visibleCount = window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1;
        const maxIndex = Math.max(0, totalCards - visibleCount);
        if (currentIndex > 0) {
          currentIndex--;
        } else {
          currentIndex = maxIndex;
        }
        updateSlider();
      });
    }

    window.addEventListener('resize', updateSlider);
  });

  // --- FAQ Accordion ---
  const faqItems = document.querySelectorAll('.faq-item');
  faqItems.forEach((item) => {
    const trigger = item.querySelector('.faq-trigger') || item.querySelector('button');
    if (!trigger) return;
    trigger.addEventListener('click', () => {
      const isActive = item.classList.contains('active');
      faqItems.forEach((other) => other.classList.remove('active'));
      if (!isActive) {
        item.classList.add('active');
      }
    });
  });
});

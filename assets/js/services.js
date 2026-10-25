/**
 * SERVICES band — the whole third is the hit area.
 *
 * The board has three states for this block: SkipTheDealers (default), AutoDNA Flip,
 * AutoDNA Service. Pointing anywhere inside a third brings its state forward; leaving
 * the band returns to the default so the block always reads as designed at rest.
 *
 * Hit columns and cards are separate elements: the columns cover the full height of
 * each third (so hover works over the photograph too), while the cards are painted in
 * their own grid and never take the pointer on desktop.
 */
(function () {
  'use strict';

  function init() {
    var stage = document.querySelector('.svc__stage');
    if (!stage) return;

    var backdrops = stage.querySelectorAll('.svc__bg');
    var zones = stage.querySelectorAll('.svc__zone');
    var cards = stage.querySelectorAll('.svc__card');
    var DEFAULT = 'skip';

    // Below 1024px the same services stack as three separate cards, each owning its photo.
    // There is nothing to swap there, so the band logic stays off the stacked layout.
    var band = window.matchMedia('(min-width: 1024px)');

    function show(key) {
      backdrops.forEach(function (img) {
        var on = img.getAttribute('data-state') === key;
        img.classList.toggle('is-active', on);
        img.setAttribute('aria-hidden', on ? 'false' : 'true');
      });
      cards.forEach(function (card) {
        card.classList.toggle('is-active', card.getAttribute('data-card') === key);
      });
    }

    // In the stacked layout every photo and every card is on screen.
    function reset() {
      backdrops.forEach(function (img) {
        img.classList.add('is-active');
        img.setAttribute('aria-hidden', 'false');
      });
      cards.forEach(function (card) {
        card.classList.toggle('is-active', card.getAttribute('data-card') === DEFAULT);
      });
    }

    function sync() {
      if (band.matches) show(DEFAULT);
      else reset();
    }

    zones.forEach(function (zone) {
      var key = zone.getAttribute('data-zone');

      zone.addEventListener('mouseenter', function () { if (band.matches) show(key); });
      zone.addEventListener('focus', function () { if (band.matches) show(key); });

      // touch devices have no hover: a tap is the state change
      zone.addEventListener('touchstart', function () { if (band.matches) show(key); }, { passive: true });

      // the label is a link placeholder for now; keep the state change from jumping
      zone.addEventListener('click', function (event) { event.preventDefault(); if (band.matches) show(key); });
    });

    // returning to the band's resting state
    stage.addEventListener('mouseleave', function () { if (band.matches) show(DEFAULT); });

    // keyboard users tab through the cards; leaving the last one restores the default
    stage.addEventListener('focusout', function (event) {
      if (band.matches && !stage.contains(event.relatedTarget)) show(DEFAULT);
    });

    if (band.addEventListener) band.addEventListener('change', sync);
    else band.addListener(sync);

    sync();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

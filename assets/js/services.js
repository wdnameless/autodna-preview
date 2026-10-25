/**
 * SERVICES band — swap the backdrop depending on which third the pointer is over.
 *
 * The board has three states for this block: SkipTheDealers (default), AutoDNA Flip,
 * AutoDNA Service. Hovering a third brings its state forward; leaving the band returns
 * to the default so the block always reads as designed at rest.
 */
(function () {
  'use strict';

  function init() {
    var stage = document.querySelector('.svc__stage');
    if (!stage) return;

    var backdrops = stage.querySelectorAll('.svc__bg');
    var zones = stage.querySelectorAll('.svc__zone');
    var DEFAULT = 'skip';

    function show(key) {
      backdrops.forEach(function (img) {
        var on = img.getAttribute('data-state') === key;
        img.classList.toggle('is-active', on);
        img.setAttribute('aria-hidden', on ? 'false' : 'true');
      });
      zones.forEach(function (zone) {
        zone.classList.toggle('is-active', zone.getAttribute('data-zone') === key);
      });
    }

    zones.forEach(function (zone) {
      var key = zone.getAttribute('data-zone');

      zone.addEventListener('mouseenter', function () { show(key); });
      zone.addEventListener('focus', function () { show(key); });

      // touch devices have no hover: a tap is the state change
      zone.addEventListener('touchstart', function () { show(key); }, { passive: true });

      // the label is a link placeholder for now; keep the state change from jumping
      zone.addEventListener('click', function (event) { event.preventDefault(); show(key); });
    });

    // returning to the band's resting state
    stage.addEventListener('mouseleave', function () { show(DEFAULT); });

    // keyboard users tab through zones; leaving the last one restores the default
    stage.addEventListener('focusout', function (event) {
      if (!stage.contains(event.relatedTarget)) show(DEFAULT);
    });

    show(DEFAULT);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

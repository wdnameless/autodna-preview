/**
 * Step switcher for the SkipTheDealer "How It Works" block.
 * Four tabs, one panel visible at a time — the interaction the design calls for.
 */
(function () {
  'use strict';

  function init() {
    var host = document.querySelector('[data-step-switcher]');
    if (!host) return;

    var tabs = host.querySelectorAll('[data-step-tab]');
    var panels = host.querySelectorAll('[data-step-panel]');

    function activate(key) {
      tabs.forEach(function (tab) {
        var on = tab.getAttribute('data-step-tab') === key;
        tab.classList.toggle('is-active', on);
        tab.setAttribute('aria-selected', on ? 'true' : 'false');
      });

      panels.forEach(function (panel) {
        panel.classList.toggle('is-active', panel.getAttribute('data-step-panel') === key);
      });
    }

    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        activate(tab.getAttribute('data-step-tab'));
      });

      // arrow keys move between tabs, as a tablist should
      tab.addEventListener('keydown', function (event) {
        var list = Array.prototype.slice.call(tabs);
        var index = list.indexOf(tab);
        var next = null;

        if (event.key === 'ArrowRight') next = list[(index + 1) % list.length];
        if (event.key === 'ArrowLeft') next = list[(index - 1 + list.length) % list.length];

        if (next) {
          event.preventDefault();
          next.focus();
          activate(next.getAttribute('data-step-tab'));
        }
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

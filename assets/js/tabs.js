/**
 * Service switcher for the "One DNA. Multiple services." block.
 * Three tabs; the board switches on hover as well as click, so both are wired.
 */
(function () {
  'use strict';

  function init() {
    var host = document.querySelector('[data-service-switcher]');
    if (!host) return;

    var tabs = host.querySelectorAll('[data-service-tab]');
    var panels = host.querySelectorAll('[data-service-panel]');

    function activate(key) {
      tabs.forEach(function (tab) {
        var on = tab.getAttribute('data-service-tab') === key;
        tab.classList.toggle('is-active', on);
        tab.setAttribute('aria-selected', on ? 'true' : 'false');
      });
      panels.forEach(function (panel) {
        panel.classList.toggle('is-active', panel.getAttribute('data-service-panel') === key);
      });
    }

    tabs.forEach(function (tab) {
      var key = tab.getAttribute('data-service-tab');
      tab.addEventListener('click', function () { activate(key); });
      tab.addEventListener('mouseenter', function () { activate(key); });
      tab.addEventListener('focus', function () { activate(key); });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();

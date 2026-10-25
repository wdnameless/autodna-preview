/**
 * AutoDNA — page behaviour.
 * Preloader, drawer, reveal-on-scroll, counters and quote-form validation.
 * No dependencies, no framework.
 */
(function () {
  'use strict';

  /* ── preloader ────────────────────────────────────────────────────────── */

  function initPreloader() {
    var pre = document.getElementById('preloader');
    if (!pre) {
      document.body.classList.remove('loading');
      return;
    }

    var done = false;

    function hide() {
      if (done) return;
      done = true;
      pre.classList.add('is-done');
      document.body.classList.remove('loading');
      window.setTimeout(function () {
        if (pre.parentNode) pre.parentNode.removeChild(pre);
      }, 800);
    }

    // 2.5s total, fade included: the screen starts lifting at 1.8s and is gone by 2.5s
    var FADE = 700;
    window.setTimeout(hide, 2500 - FADE);
  }

  /* ── drawer ───────────────────────────────────────────────────────────── */

  function initDrawer() {
    var drawer = document.getElementById('drawer');
    if (!drawer) return;

    var openers = document.querySelectorAll('[data-menu-open]');
    var closers = drawer.querySelectorAll('[data-menu-close]');
    var burger = document.querySelector('[data-menu-open]');

    function open() {
      drawer.classList.add('is-open');
      drawer.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
      if (burger) burger.setAttribute('aria-expanded', 'true');
      var first = drawer.querySelector('a, button');
      if (first) first.focus();
    }

    function close() {
      drawer.classList.remove('is-open');
      drawer.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
      if (burger) {
        burger.setAttribute('aria-expanded', 'false');
        burger.focus();
      }
    }

    openers.forEach(function (el) { el.addEventListener('click', open); });
    closers.forEach(function (el) { el.addEventListener('click', close); });

    drawer.addEventListener('click', function (event) {
      if (event.target === drawer) close();
    });

    drawer.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', close);
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && drawer.classList.contains('is-open')) close();
    });
  }

  /* ── reveal on scroll ─────────────────────────────────────────────────── */

  function initReveal() {
    var items = document.querySelectorAll('.reveal');
    if (!items.length) return;

    if (!('IntersectionObserver' in window)) {
      items.forEach(function (el) { el.classList.add('in'); });
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('in');
        observer.unobserve(entry.target);
      });
    }, { threshold: 0.12 });

    items.forEach(function (el) { observer.observe(el); });
  }

  /* ── quote forms ──────────────────────────────────────────────────────── */

  function initForms() {
    document.querySelectorAll('form[data-quote]').forEach(function (form) {
      form.addEventListener('submit', function (event) {
        event.preventDefault();
        var valid = true;

        form.querySelectorAll('[required]').forEach(function (input) {
          var value = (input.value || '').trim();
          var ok = value.length > 0;

          if (ok && input.type === 'email') {
            ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
          }

          var field = input.closest('.field');
          if (field) field.classList.toggle('is-invalid', !ok);
          if (!ok) valid = false;
        });

        if (!valid) return;

        var success = form.querySelector('.form-success');
        if (success) {
          form.querySelectorAll('.field, button[type="submit"]').forEach(function (el) {
            el.style.display = 'none';
          });
          success.classList.add('is-visible');
        }
        form.reset();
      });
    });
  }


  /* ── hero scene scaling ────────────────────────────────────────────────────
     The hero is a 1440px canvas with absolute positions. On narrower screens it
     scales as one unit, and its wrapper reserves the scaled height so the page
     still scrolls correctly. */

  function initSceneScale() {
    // Fixed-width drawings (hero scenes, the services band) scale as one unit on narrow
    // screens. The drawing keeps its own pixel size; only its transform changes, and the
    // wrapper reserves the scaled height so the page still scrolls correctly.
    document.querySelectorAll('[class$="__scene"]').forEach(function (scene) {
      var frameWidth = scene.offsetWidth || 1440;
      var frameHeight = scene.offsetHeight || 809;

      function fit() {
        var scale = Math.min(1, document.documentElement.clientWidth / frameWidth);
        scene.style.transform = 'scale(' + scale + ')';
        scene.style.transformOrigin = 'top left';
        if (scene.parentNode) {
          scene.parentNode.style.height = Math.round(frameHeight * scale) + 'px';
          scene.parentNode.style.overflow = 'hidden';
        }
      }

      fit();
      window.addEventListener('resize', fit);
    });
  }

  /* ── boot ─────────────────────────────────────────────────────────────── */

  function boot() {
    initPreloader();
    initDrawer();
    initReveal();
    initSceneScale();
    initForms();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();

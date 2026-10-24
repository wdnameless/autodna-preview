/**
 * AutoDNA — shared behaviour
 * Preloader, menu overlay, scroll reveal, counters and form validation.
 * No dependencies.
 */
(function () {
  'use strict';

  /* --- Preloader ---------------------------------------------------------- */

  function hidePreloader() {
    var el = document.getElementById('preloader');
    if (!el) return;
    el.classList.add('loaded');
    window.setTimeout(function () {
      el.style.display = 'none';
    }, 600);
  }

  /* --- Menu overlay ------------------------------------------------------- */

  function initMenu() {
    var overlay = document.getElementById('menu');
    if (!overlay) return;

    function open() {
      overlay.classList.add('open');
      document.body.style.overflow = 'hidden';
    }

    function close() {
      overlay.classList.remove('open');
      document.body.style.overflow = '';
    }

    document.querySelectorAll('[data-menu-open]').forEach(function (btn) {
      btn.addEventListener('click', open);
    });

    document.querySelectorAll('[data-menu-close]').forEach(function (btn) {
      btn.addEventListener('click', close);
    });

    overlay.addEventListener('click', function (event) {
      if (event.target === overlay) close();
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') close();
    });
  }

  /* --- Scroll reveal ------------------------------------------------------ */

  function initReveal() {
    var items = document.querySelectorAll('.reveal');
    if (!items.length) return;

    if (!('IntersectionObserver' in window)) {
      items.forEach(function (el) { el.classList.add('in'); });
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    items.forEach(function (el) { observer.observe(el); });
  }

  /* --- Counters ----------------------------------------------------------- */

  function animateCounter(el) {
    var target = parseFloat(el.getAttribute('data-count'));
    if (isNaN(target)) return;
    var suffix = el.getAttribute('data-suffix') || '';
    var duration = 1400;
    var start = null;

    function step(timestamp) {
      if (start === null) start = timestamp;
      var progress = Math.min((timestamp - start) / duration, 1);
      var value = Math.floor(progress * target);
      el.textContent = value + suffix;
      if (progress < 1) window.requestAnimationFrame(step);
      else el.textContent = target + suffix;
    }

    window.requestAnimationFrame(step);
  }

  function initCounters() {
    var items = document.querySelectorAll('[data-count]');
    if (!items.length) return;

    if (!('IntersectionObserver' in window)) {
      items.forEach(animateCounter);
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4 });

    items.forEach(function (el) { observer.observe(el); });
  }

  /* --- Forms -------------------------------------------------------------- */

  function initForms() {
    document.querySelectorAll('form[data-quote]').forEach(function (form) {
      form.addEventListener('submit', function (event) {
        event.preventDefault();
        var valid = true;

        form.querySelectorAll('[required]').forEach(function (field) {
          var wrapper = field.closest('.field');
          var value = field.value.trim();
          var fieldValid = value !== '';

          if (field.type === 'email' && value) {
            fieldValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
          }

          if (wrapper) wrapper.classList.toggle('invalid', !fieldValid);
          if (!fieldValid) valid = false;
        });

        if (!valid) return;

        var success = form.querySelector('.form-success');
        if (success) {
          form.querySelectorAll('.field, button[type="submit"]').forEach(function (el) {
            el.classList.add('hidden');
          });
          success.classList.add('visible');
        }
        form.reset();
      });
    });
  }

  /* --- Boot --------------------------------------------------------------- */

  function boot() {
    hidePreloader();
    initMenu();
    initReveal();
    initCounters();
    initForms();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }

  window.addEventListener('load', hidePreloader);
  window.setTimeout(hidePreloader, 2500);
})();

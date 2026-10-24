/**
 * AUTODNA — Shared Shell & Interaction Engine
 * Vanilla JS Modules: Preloader, Menu, Reveal, Counters, Calculator, Forms, Smooth, Ticker
 */

(function (window, document) {
  'use strict';

  // --- Preloader Module ---
  const Preloader = {
    hideOnLoad(options = {}) {
      const maxFallback = options.maxFallback || 2500;
      const preloader = document.getElementById('dna-preloader') || document.querySelector('.dna-preloader');
      if (!preloader) return;

      const bar = document.getElementById('dna-preloader-bar') || preloader.querySelector('.dna-progress-fill');
      let progress = 15;
      let isLoaded = false;

      // Animate progress incrementally
      const progressTimer = setInterval(() => {
        if (!isLoaded) {
          progress = Math.min(progress + Math.floor(Math.random() * 15) + 5, 88);
          if (bar) bar.style.width = progress + '%';
        }
      }, 120);

      const finish = () => {
        if (isLoaded) return;
        isLoaded = true;
        clearInterval(progressTimer);
        if (bar) bar.style.width = '100%';

        setTimeout(() => {
          preloader.classList.add('loaded');
          setTimeout(() => {
            preloader.style.display = 'none';
          }, 500);
        }, 200);
      };

      // Listen for window load
      if (document.readyState === 'complete') {
        finish();
      } else {
        window.addEventListener('load', finish, { once: true });
        // Fallback max 2.5s per shell spec
        setTimeout(finish, maxFallback);
      }
    }
  };

  // --- Menu Module ---
  const Menu = {
    isOpen: false,

    getMenuEl() {
      return document.getElementById('dna-menu');
    },

    open() {
      const menu = this.getMenuEl();
      if (!menu) return;
      this.isOpen = true;
      menu.classList.add('active');
      menu.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
      document.dispatchEvent(new CustomEvent('dna:menu:opened'));
    },

    close() {
      const menu = this.getMenuEl();
      if (!menu) return;
      this.isOpen = false;
      menu.classList.remove('active');
      menu.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
      document.dispatchEvent(new CustomEvent('dna:menu:closed'));
    },

    toggle() {
      if (this.isOpen) {
        this.close();
      } else {
        this.open();
      }
    },

    bind() {
      // Open triggers
      document.querySelectorAll('[data-menu-open]').forEach((btn) => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          this.open();
        });
      });

      // Close triggers
      document.querySelectorAll('[data-menu-close]').forEach((btn) => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          this.close();
        });
      });

      // Toggle triggers
      document.querySelectorAll('[data-menu-toggle]').forEach((btn) => {
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          this.toggle();
        });
      });

      // Close on Escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && this.isOpen) {
          this.close();
        }
      });

      // Close when clicking internal menu links
      const menu = this.getMenuEl();
      if (menu) {
        menu.querySelectorAll('a').forEach((link) => {
          link.addEventListener('click', () => {
            this.close();
          });
        });
      }
    }
  };

  // --- Reveal on Scroll Module ---
  const Reveal = {
    bind(selector = '[data-reveal]') {
      const elements = document.querySelectorAll(selector);
      if (!elements.length) return;

      if (!('IntersectionObserver' in window)) {
        elements.forEach((el) => el.classList.add('in'));
        return;
      }

      const observer = new IntersectionObserver(
        (entries, obs) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add('in');
              obs.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
      );

      elements.forEach((el) => {
        el.classList.add('reveal');
        observer.observe(el);
      });
    }
  };

  // --- Counters Module ---
  const Counters = {
    animate(selector = '[data-count]') {
      const elements = document.querySelectorAll(selector);
      if (!elements.length) return;

      const runCounter = (el) => {
        const rawTarget = el.getAttribute('data-count') || el.innerText;
        const target = parseFloat(rawTarget.replace(/[^0-9.-]+/g, '')) || 0;
        const prefix = el.getAttribute('data-count-prefix') || '';
        const suffix = el.getAttribute('data-count-suffix') || '';
        const duration = parseInt(el.getAttribute('data-count-duration'), 10) || 1600;
        const startTime = performance.now();
        const isDecimal = rawTarget.includes('.');

        const step = (currentTime) => {
          const elapsed = currentTime - startTime;
          const progress = Math.min(elapsed / duration, 1);
          // Ease out cubic
          const eased = 1 - Math.pow(1 - progress, 3);
          const currentVal = target * eased;

          const formatted = isDecimal ? currentVal.toFixed(1) : Math.floor(currentVal).toLocaleString();
          el.innerText = `${prefix}${formatted}${suffix}`;

          if (progress < 1) {
            requestAnimationFrame(step);
          } else {
            const finalVal = isDecimal ? target.toFixed(1) : Math.floor(target).toLocaleString();
            el.innerText = `${prefix}${finalVal}${suffix}`;
          }
        };

        requestAnimationFrame(step);
      };

      if (!('IntersectionObserver' in window)) {
        elements.forEach(runCounter);
        return;
      }

      const observer = new IntersectionObserver(
        (entries, obs) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              runCounter(entry.target);
              obs.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.25 }
      );

      elements.forEach((el) => observer.observe(el));
    }
  };

  // --- Profit Calculator Module (Invest / DNA Flip) ---
  const Calculator = {
    bind(selector = '#earn-calc') {
      const root = document.querySelector(selector);
      if (!root) return;

      const amountInput = root.querySelector('input[name="amount"], #calc-amount, input[type="range"], input[type="number"]');
      const amountDisplay = root.querySelector('#calc-amount-display, [data-amount-display]');
      const resultOutput = root.querySelector('#earn-result, [data-calc-result]');
      const profitOutput = root.querySelector('#earn-profit, [data-calc-profit]');
      const tierInputs = root.querySelectorAll('input[name="tier"], [data-tier], button[data-tier-rate]');

      const calculate = () => {
        let amount = 10000;
        if (amountInput) {
          amount = parseFloat(amountInput.value) || 0;
        }

        // Selected tier rate: default 28% (0.28)
        let rate = 0.28;
        const checkedTier = root.querySelector('input[name="tier"]:checked');
        if (checkedTier) {
          const val = parseFloat(checkedTier.value);
          rate = val > 1 ? val / 100 : val;
        } else {
          const activeBtn = root.querySelector('[data-tier].active, button[data-tier-rate].active');
          if (activeBtn) {
            const val = parseFloat(activeBtn.dataset.tierRate || activeBtn.dataset.tier);
            rate = val > 1 ? val / 100 : val;
          }
        }

        const projectedTotal = Math.round(amount * (1 + rate));
        const projectedProfit = Math.round(amount * rate);

        if (amountDisplay) {
          amountDisplay.innerText = '$' + amount.toLocaleString('en-US');
        }

        if (resultOutput) {
          resultOutput.innerText = '$' + projectedTotal.toLocaleString('en-US');
        }

        if (profitOutput) {
          profitOutput.innerText = '+$' + projectedProfit.toLocaleString('en-US');
        }
      };

      if (amountInput) {
        amountInput.addEventListener('input', calculate);
        amountInput.addEventListener('change', calculate);
      }

      tierInputs.forEach((tier) => {
        tier.addEventListener('change', calculate);
        tier.addEventListener('click', (e) => {
          if (tier.tagName === 'BUTTON') {
            e.preventDefault();
            tierInputs.forEach((b) => b.classList.remove('active'));
            tier.classList.add('active');
            calculate();
          }
        });
      });

      // Run on bind
      calculate();
    }
  };

  // --- Quote Forms Module ---
  const Forms = {
    validate(selector = 'form[data-quote]') {
      const forms = document.querySelectorAll(selector);
      if (!forms.length) return;

      forms.forEach((form) => {
        form.setAttribute('novalidate', 'true');

        form.addEventListener('submit', (e) => {
          e.preventDefault();
          let isValid = true;
          let firstErrorEl = null;

          // Clear previous errors
          form.querySelectorAll('.form-input-error').forEach((el) => el.classList.remove('form-input-error'));
          form.querySelectorAll('.form-error-msg').forEach((el) => el.remove());

          // Fields to validate: name, make, model, year, budget, message
          const requiredFields = ['name', 'make', 'model', 'year', 'budget', 'message'];

          requiredFields.forEach((fieldName) => {
            const field = form.querySelector(`[name="${fieldName}"], [name="car-${fieldName}"]`);
            if (field) {
              const val = field.value.trim();
              let fieldValid = true;

              if (!val) {
                fieldValid = false;
              } else if (fieldName === 'year') {
                const yearNum = parseInt(val, 10);
                if (isNaN(yearNum) || yearNum < 1980 || yearNum > 2035) {
                  fieldValid = false;
                }
              }

              if (!fieldValid) {
                isValid = false;
                field.classList.add('form-input-error');
                const errMsg = document.createElement('div');
                errMsg.className = 'form-error-msg';
                errMsg.innerText = fieldName === 'year' ? 'Please enter a valid 4-digit year' : `Please enter your ${fieldName}`;
                field.parentNode.appendChild(errMsg);

                if (!firstErrorEl) firstErrorEl = field;
              }
            }
          });

          if (!isValid) {
            if (firstErrorEl) firstErrorEl.focus();
            return;
          }

          // Show success state
          let successPanel = form.querySelector('.form-success-panel');
          if (!successPanel) {
            successPanel = document.createElement('div');
            successPanel.className = 'form-success-panel visible';
            successPanel.innerHTML = `
              <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-[#8b7cf6]/20 border border-[#8b7cf6] text-[#a78bfa] mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              </div>
              <h4 class="text-xl font-display uppercase tracking-wider text-white mb-2">Request Received</h4>
              <p class="text-sm text-[#9d93b8]">Thank you! Your quote request has been registered. An AutoDNA expert will contact you shortly.</p>
            `;
            form.appendChild(successPanel);
          } else {
            successPanel.classList.add('visible');
          }

          // Hide form inputs container if present
          const fieldsWrap = form.querySelector('.form-fields') || form.querySelector('.grid') || form.querySelector('fieldset');
          if (fieldsWrap) {
            fieldsWrap.style.display = 'none';
          }
          const submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
          if (submitBtn) {
            submitBtn.style.display = 'none';
          }

          form.reset();
        });
      });
    }
  };

  // --- Smooth Scroll Module ---
  const Smooth = {
    anchor() {
      document.addEventListener('click', (e) => {
        const link = e.target.closest('a[href^="#"]');
        if (!link) return;

        const href = link.getAttribute('href');
        if (!href || href === '#' || href.length < 2) return;

        const target = document.querySelector(href);
        if (target) {
          e.preventDefault();
          const headerOffset = 80;
          const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;
          window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
          });
        }
      });
    }
  };

  // --- Ticker Module (CSS keyframes companion) ---
  const Ticker = {
    cssOnly: true,
    init() {
      // Seamless marquee helper: duplicate content if track width < 2x container
      const tracks = document.querySelectorAll('.ticker-track');
      tracks.forEach((track) => {
        if (!track.dataset.duplicated) {
          track.dataset.duplicated = 'true';
          const clone = track.cloneNode(true);
          while (clone.firstChild) {
            track.appendChild(clone.firstChild);
          }
        }
      });
    }
  };

  // --- Header Sticky & Scroll Spy ---
  const Header = {
    init() {
      const header = document.querySelector('.dna-header');
      if (!header) return;

      const onScroll = () => {
        if (window.scrollY > 20) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
      };

      window.addEventListener('scroll', onScroll, { passive: true });
      onScroll();
    }
  };

  // --- Public DNA API ---
  const DNA = {
    Preloader,
    Menu,
    Reveal,
    Counters,
    Calculator,
    Forms,
    Smooth,
    Ticker,
    Header,

    init() {
      Preloader.hideOnLoad();
      Menu.bind();
      Reveal.bind('[data-reveal]');
      Counters.animate('[data-count]');
      Calculator.bind('#earn-calc');
      Forms.validate('form[data-quote]');
      Smooth.anchor();
      Ticker.init();
      Header.init();
    }
  };

  window.DNA = DNA;

  // Auto initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => DNA.init());
  } else {
    DNA.init();
  }
})(window, document);

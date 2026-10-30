<?php
/**
 * Template Name: AutoDNA - SkipTheDealer Page
 *
 * @package AutoDNA
 */

get_header(); ?>

<main>

<!-- ══ 1. HERO (Exact Figma 464:4868) ═════════════════════════════════════ -->
<section class="dealer-hero" aria-label="SkipTheDealer Intro">
  <!-- Desktop 1440x810 pixel-perfect board -->
  <div class="dealer-hero__board">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/dealer-hero-exact.jpg" class="dealer-hero__board-img" alt="SkipTheDealer — Buy cars up to 40% cheaper" fetchpriority="high">
    <a href="#how-it-works" class="dealer-hero__cta-hitarea" aria-label="See how it works"></a>
  </div>

  <!-- Mobile Hero layout (shown only under 768px) -->
  <div class="dealer-hero__mob">
    <p class="dealer-hero__mob-sub">BUY CARS UP TO<br>40% CHEAPER</p>
    <h1 class="dealer-hero__mob-title">SkipThe<br>Dealer</h1>
    <div class="dealer-hero__mob-stage">
      <div class="dealer-hero__mob-card ticks">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <p>YOU PAY THE <span class="neon-violet">REAL PRICE</span>, NOT SOMEONE ELSE’S MARKUP.</p>
      </div>
      <div class="dealer-hero__mob-card ticks">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <p>NO SHOWROOMS, NO FANCY WORDS. <span class="neon-violet">JUST CHEAPER CARS.</span></p>
      </div>
      <a class="dealer-hero__mob-cta ticks" href="#how-it-works">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <span>SEE HOW IT WORKS</span>
        <svg viewBox="0 0 13 13" aria-hidden="true">
          <path d="M0 0L11 11M11 0V11H0" stroke="#C2B9FF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        </svg>
      </a>
    </div>
  </div>
</section>

<!-- ══ 2. SCENARIOS (Exact Figma 464:5122..5138) ═════════════════════════ -->
<section class="dealer-scenarios" aria-label="Market Scenarios">
  <div class="dealer-scenarios__container">
    <div class="dealer-scenarios__heading">
      <h2 class="dealer-scenarios__title">
        <span>IMAGINE BUYING A</span>
        <span>DEALERS ARE OUT OF THE GAME.</span>
        <span class="neon-violet">NOW IT’S YOUR TURN.</span>
      </h2>

      <p class="dealer-scenarios__sub">
        <span>CUSTOMERS CAN GET A CAR</span>
        <span class="neon-violet">30–40% CHEAPER THAN THE MARKET PRICE.</span>
        <span>THERE ARE TWO MAIN SCENARIOS:</span>
      </p>
    </div>

    <!-- Wire brackets + vertical center divider -->
    <div class="dealer-scenarios__wire-box" aria-hidden="true">
      <svg class="dealer-scenarios__brackets" viewBox="0 0 938 90" preserveAspectRatio="none">
        <path d="M0 90V0H90" stroke="#C2B9FF" stroke-width="1" fill="none"/>
        <path d="M937.2 90V0H847.2" stroke="#C2B9FF" stroke-width="1" fill="none"/>
      </svg>
      <div class="dealer-scenarios__v-divider"></div>
    </div>

    <!-- 2 Scenarios columns -->
    <div class="dealer-scenarios__grid">
      <!-- Scenario 1: Buy and profit -->
      <div class="dealer-scenario-col dealer-scenario-col--1">
        <h3 class="dealer-scenario-col__title">1. BUY AND PROFIT</h3>
        <p class="dealer-scenario-col__body">A customer buys a car for $10,000, while the market price is $14,000–$15,000. They immediately gain <span class="neon-violet">$4,000–$5,000 in built-in savings</span>. If they choose to resell the car right away, they can essentially earn this money.</p>
      </div>

      <!-- Scenario 2: Drive without losing -->
      <div class="dealer-scenario-col dealer-scenario-col--2">
        <h3 class="dealer-scenario-col__title">2. DRIVE WITHOUT LOSING</h3>
        <p class="dealer-scenario-col__body">A customer keeps the car for 2–3 years. During this time, the market price might drop from $15,000 to $10,000. But since they bought the car for $10,000, they can <span class="neon-violet">sell it for the same amount without losing anything</span>.</p>
      </div>
    </div>

    <p class="dealer-scenarios__banner-quote">
      WITH SKIPTHEDEALER, CUSTOMERS EITHER PROFIT OR MINIMIZE LOSSES TO ZERO.
    </p>
  </div>
</section>

<!-- ══ 3. HOW IT WORKS (Figma Screenshot 2 / Component 464:5152) ═══════ -->
<section class="dealer-how" id="how-it-works" aria-label="How it works">
  <div class="dealer-how__glow-bloom" aria-hidden="true"></div>

  <div class="dealer-how__container">
    <div class="dealer-how__header">
      <div class="dealer-how__title-circuit">
        <span class="dealer-how__title-word">HOW IT</span>
        <svg class="dealer-how__title-wire" viewBox="0 0 250 40" preserveAspectRatio="none" aria-hidden="true">
          <path d="M0 20H100L130 0H250" stroke="#C2B9FF" stroke-width="1" fill="none"/>
        </svg>
        <span class="dealer-how__title-word">WORKS</span>
      </div>

      <!-- 4 Interactive Tabs on horizontal hairline -->
      <div class="dealer-how__tabs-bar">
        <div class="dealer-how__tabs-wire" aria-hidden="true"></div>
        <div class="dealer-how__tabs" role="tablist" aria-label="Steps">
          <button class="hiw-tab ticks is-active" data-step="1" role="tab" aria-selected="true">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <span>STEP 1</span>
          </button>
          <button class="hiw-tab ticks" data-step="2" role="tab" aria-selected="false">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <span>STEP 2</span>
          </button>
          <button class="hiw-tab ticks" data-step="3" role="tab" aria-selected="false">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <span>STEP 3</span>
          </button>
          <button class="hiw-tab ticks" data-step="4" role="tab" aria-selected="false">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <span>STEP 4</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Active Step Content (Centered in purple glow) -->
    <div class="dealer-how__content-stage">
      <!-- Step 1 (Exact match to user screenshot) -->
      <div class="hiw-step-view is-active" data-step="1">
        <h3 class="hiw-step-view__title">STEP 1.<br>INTRODUCTION &amp; CAR<br>SELECTION</h3>
        <p class="hiw-step-view__sub">You tell us about your dream car — make, model, year, body type,<br>features, and budget.</p>

        <span class="hiw-step-view__v-line" aria-hidden="true"></span>
        <p class="hiw-step-view__sub-2">At this stage, you immediately receive<br>an approximate financial overview:</p>

        <div class="hiw-step-view__grid hiw-step-view__grid--4">
          <div class="hiw-col">
            <p><strong>Approximate purchase price at auction</strong> — Estimated cost to buy the car at auction.</p>
          </div>
          <div class="hiw-col">
            <p><strong>Repair costs (if the car has any damage)</strong> — Expected expenses to fix any damages.</p>
          </div>
          <div class="hiw-col">
            <p><strong>Additional expenses (inspection, diagnostics, registration, fees)</strong> — Extra costs for inspections, registration, and fees.</p>
          </div>
          <div class="hiw-col">
            <p><strong>Final “turnkey” price</strong> — Total cost to have the car ready to drive.</p>
          </div>
        </div>

        <p class="hiw-step-view__banner">
          WE ALWAYS CALCULATE THE TOTAL WITH YOUR EXPECTED SAVINGS IN MIND — YOUR CAR ENDS UP <span class="neon-violet">30–40% CHEAPER</span> THAN DEALER OR MARKETPLACE PRICES.
        </p>

        <div class="hiw-step-view__grid hiw-step-view__grid--2 hiw-step-view__example">
          <div class="hiw-col hiw-col--example">
            <p>Example: if the market price of a car is <strong>$20,000</strong>, we typically buy it at auction for around <strong>$10,000</strong>. Then we add repair, inspection, fees, and registration costs — and the final price comes to about <strong>$14,000</strong>. As a result, you save <strong>$6,000</strong> compared to the market.</p>
          </div>
          <div class="hiw-col hiw-col--transparency">
            <p>Thanks to this transparency, even before buying you know:<br>
            - how much the car itself will cost,<br>
            - what the repair and documentation expenses will be,<br>
            - what the total final price is,<br>
            - and how much money you’ll actually save.</p>
          </div>
        </div>
      </div>

      <!-- Step 2<!-- Step 2 (Exact from user screenshot!) -->
      <div class="hiw-step-view" data-step="2">
        <h3 class="hiw-step-view__title">STEP 2.<br>DAILY SELECTION<br>&amp; AUCTIONS</h3>
        <p class="hiw-step-view__sub">Every day, we select several cars that match your requirements:</p>

        <div class="hiw-step-view__grid hiw-step-view__grid--4">
          <div class="hiw-col">
            <p><strong>Daily selection</strong> — We pick cars that match your requirements.</p>
          </div>
          <div class="hiw-col">
            <p><strong>Detailed analysis</strong> — You get photos, history, and estimated costs for each car.</p>
          </div>
          <div class="hiw-col">
            <p><strong>Your confirmation</strong> — You choose which cars meet your needs.</p>
          </div>
          <div class="hiw-col">
            <p><strong>Auction bidding</strong> — We place bids on the selected cars.</p>
          </div>
        </div>

        <p class="hiw-step-view__banner">
          AUCTIONS ARE COMPETITIVE—SOMETIMES A CAR IS NOT WON IMMEDIATELY. WE KEEP SEARCHING UNTIL WE SECURE A VEHICLE WITHIN YOUR BUDGET, USUALLY WITHIN A WEEK.
        </p>
      </div>

      <!-- Step 3 (Exact from user screenshot!) -->
      <div class="hiw-step-view" data-step="3">
        <h3 class="hiw-step-view__title">STEP 3.<br>PURCHASE &amp; RESTORATION</h3>
        <p class="hiw-step-view__sub">After winning the auction, your car is delivered to our service center for a full inspection:</p>

        <div class="hiw-step-view__grid hiw-step-view__grid--2">
          <div class="hiw-col">
            <p><strong>If the car is intact →</strong><br>we perform a complete check and fix all technical issues.</p>
          </div>
          <div class="hiw-col">
            <p><strong>If damaged (collision, hail, cosmetic) →</strong><br>we do bodywork, painting, and full repairs.</p>
          </div>
        </div>

        <p class="hiw-step-view__banner">
          THE RESULT: A CAR IN PERFECT CONDITION.
        </p>
      </div>

      <!-- Step 4 -->
      <div class="hiw-step-view" data-step="4">
        <h3 class="hiw-step-view__title">STEP 4.<br>INSPECTION &amp; DOCUMENTS</h3>
        <p class="hiw-step-view__sub">In all cases, you receive official documents confirming the car’s safety and full compliance:</p>

        <div class="hiw-step-view__grid hiw-step-view__grid--2">
          <div class="hiw-col">
            <p><strong>If the car is clean (active status) →</strong><br>you can register it immediately.</p>
          </div>
          <div class="hiw-col">
            <p><strong>If the car has salvage status →</strong><br>it undergoes an AMVIC inspection and gets rebuilt status.</p>
          </div>
        </div>

        <p class="hiw-step-view__banner">
          IN ALL CASES, YOU RECEIVE OFFICIAL DOCUMENTS CONFIRMING THE CAR’S SAFETY AND FULL COMPLIANCE WITH CANADIAN STANDARDS.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ══ 4. REAL SAVINGS ON EVERY CAR (Figma Screenshot 1) ═══════════════ -->
<section class="dealer-savings" id="real-savings" aria-label="Real savings table">
  <!-- Seamless Full-Bleed 2560px Cars Banner with zero cuts or rectangular borders -->
  <div class="dealer-savings__hero">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/dealer-savings-hero-seamless.jpg" alt="Real Savings on Every Car: 2019 Honda Civic, 2020 VW Tiguan, 2021 Hyundai Elantra" class="dealer-savings__hero-img" loading="lazy">
  </div>

  <div class="dealer-savings__container">
    <!-- Accessible SEO title -->
    <h2 class="sr-only">Real Savings on Every Car</h2>

    <!-- Table matching Screenshot 1 -->
    <div class="dealer-savings__wrap ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <table class="dealer-savings__table">
        <thead>
          <tr>
            <th>Car (Year &amp; Model)</th>
            <th>Dealer Price</th>
            <th>SkipTheDealer Price</th>
            <th class="th-save">You Save</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>2019 HONDA CIVIC</th>
            <td>$18,900</td>
            <td>$13,200</td>
            <td class="td-save td-save--1">$5,700</td>
          </tr>
          <tr>
            <th>2020 VW TIGUAN</th>
            <td>$26,500</td>
            <td>$18,900</td>
            <td class="td-save td-save--2">$7,600</td>
          </tr>
          <tr>
            <th>2021 HYUNDAI ELANTRA</th>
            <td>$21,700</td>
            <td>$15,200</td>
            <td class="td-save td-save--3 is-lit">$6,500</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ══ 5. FRIENDS & STATS ══════════════════════════════════════════════════ -->
<section class="dealer-friends" aria-label="Our friends community">
  <div class="dealer-friends__container">
    <div class="dealer-friends__card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <div class="dealer-friends__photo ticks">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/dealer-friends.jpg" alt="AutoDNA team and friends">
      </div>
      <h3>Your friends are our friends!</h3>
      <p>Your friends and family can enjoy a 30% discount on every service. And when they make their first order — you’ll get 30% off too.</p>
    </div>

    <!-- 5 Stats cards -->
    <div class="dealer-stats-grid">
      <div class="dealer-stat-item ticks">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <div class="stat-num">30–40%</div>
        <div class="stat-title">Cheaper</div>
        <p>Save compared to dealer and Marketplace private seller prices.</p>
      </div>

      <div class="dealer-stat-item ticks">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <div class="stat-title" style="margin-top: 14px;">Access to exclusive auctions</div>
        <p>We represent you at closed wholesale auctions regular buyers can’t access.</p>
      </div>

      <div class="dealer-stat-item ticks">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <div class="stat-title" style="margin-top: 14px;">Full inspection &amp; safety</div>
        <p>Every car goes through a full diagnostic, road test, and AMVIC inspection.</p>
      </div>

      <div class="dealer-stat-item ticks">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <div class="stat-title" style="margin-top: 14px;">Long-term financial benefit</div>
        <p>In 2–3 years, you can resell your car for nearly the same price — zero losses.</p>
      </div>

      <div class="dealer-stat-item ticks">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <div class="stat-title" style="margin-top: 14px;">Zero dealer markup</div>
        <p>Dealers buy from the same auctions and markup prices. We buy for you directly.</p>
      </div>
    </div>
  </div>
</section>

<!-- ══ 6. CTA / REQUEST A QUOTE ════════════════════════════════════════════ -->
<section class="dealer-cta-section" aria-label="Request quote">
  <h2>Save up to $10,000 on your next car?<br>— It’s real.</h2>
  <a href="#contact" class="dealer-cta-btn ticks">
    <span class="tick tl"></span><span class="tick tr"></span>
    <span class="tick bl"></span><span class="tick br"></span>
    <span>Submit a request</span>
    <svg viewBox="0 0 14 14" width="14" height="14" aria-hidden="true">
      <path d="M0 13L13 0M0 0H13V13" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
    </svg>
  </a>
</section>

<!-- ══ 7. FOOTER ═══════════════════════════════════════════════════════════ -->
<footer class="foot" id="contact" style="background: #020202 url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/community-bg.svg') center bottom / 100% 100% no-repeat; padding-bottom: 40px;">
  <div class="foot__box">
    <svg class="foot__ticks" viewBox="0 0 1370 176" preserveAspectRatio="none" aria-hidden="true">
      <path d="M0 18.8V0H18.8 M1370 18.8V0H1351.2 M0 157.2V176H18.8 M1370 157.2V176H1351.2" stroke="#C2B9FF" fill="none" stroke-width="1"/>
    </svg>

    <div class="foot__grid">
      <!-- Col 1: Contact us -->
      <div class="foot__col foot__col--contact">
        <h3>CONTACT US</h3>
        <div class="foot__item">
          <a href="tel:+14033128306" class="foot__link">+1 (403) 312-8306</a>
          <svg class="foot__item-line" viewBox="0 0 348 35" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0 34.2H246.7L312.8 0H348.2" stroke="#C2B9FF" fill="none" stroke-width="1"/>
            <path d="M340.2 8L348.2 0M340.2 0H348.2V8" stroke="#C2B9FF" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
          </svg>
        </div>
        <div class="foot__item">
          <a href="mailto:info@autodna.com" class="foot__link">info@autodna.com</a>
          <svg class="foot__item-line" viewBox="0 0 348 35" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0 34.2H246.7L312.8 0H348.2" stroke="#C2B9FF" fill="none" stroke-width="1"/>
            <path d="M340.2 8L348.2 0M340.2 0H348.2V8" stroke="#C2B9FF" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
          </svg>
        </div>
      </div>

      <!-- Col 2: Follow Us -->
      <div class="foot__col foot__col--social">
        <h3>FOLLOW US</h3>
        <div class="foot__socials">
          <a href="#" aria-label="Facebook" class="foot__soc-btn">
            <svg viewBox="0 0 40 40" aria-hidden="true">
              <circle cx="20" cy="20" r="19.5" fill="none" stroke="#C2B9FF"/>
              <path d="M22 29v-9h3l.5-3.5h-3.5v-2c0-1 .3-1.8 1.8-1.8h2V9.5c-.4 0-1.4-.1-2.6-.1-2.6 0-4.4 1.6-4.4 4.5v2.6H16V20h2.8v9H22Z" fill="#FFFFFF"/>
            </svg>
          </a>
          <a href="#" aria-label="X" class="foot__soc-btn">
            <svg viewBox="0 0 40 40" aria-hidden="true">
              <circle cx="20" cy="20" r="19.5" fill="none" stroke="#C2B9FF"/>
              <path d="M25.5 12h2.5l-5.5 6.3L29 27h-5.1l-4-5.2-4.6 5.2h-2.5l5.9-6.8L12.5 12h5.2l3.6 4.8L25.5 12Zm-.9 13.5h1.4L17.1 13.4h-1.5l9 12.1Z" fill="#FFFFFF"/>
            </svg>
          </a>
          <a href="#" aria-label="Instagram" class="foot__soc-btn">
            <svg viewBox="0 0 40 40" aria-hidden="true">
              <circle cx="20" cy="20" r="19.5" fill="none" stroke="#C2B9FF"/>
              <rect x="13" y="13" width="14" height="14" rx="4" fill="none" stroke="#FFFFFF" stroke-width="1.8"/>
              <circle cx="20" cy="20" r="3.5" fill="none" stroke="#FFFFFF" stroke-width="1.8"/>
              <circle cx="24.5" cy="15.5" r="1" fill="#FFFFFF"/>
            </svg>
          </a>
        </div>
        <svg class="foot__social-underline" viewBox="0 0 207 1" preserveAspectRatio="none" aria-hidden="true">
          <line x1="0" y1="0.5" x2="207" y2="0.5" stroke="#C2B9FF"/>
        </svg>
      </div>

      <!-- Col 3: Find Us -->
      <div class="foot__col foot__col--find">
        <h3>FIND US</h3>
        <div class="foot__item">
          <p class="foot__address">730 2 Ave SW,<br>Calgary, T2P1R8,<br>Canada</p>
          <svg class="foot__item-line foot__item-line--find" viewBox="0 0 348 35" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0 34.2H246.7L312.8 0H348.2" stroke="#C2B9FF" fill="none" stroke-width="1"/>
            <path d="M340.2 8L348.2 0M340.2 0H348.2V8" stroke="#C2B9FF" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
          </svg>
        </div>
      </div>
    </div>
  </div>

  <p class="foot__copy">© 2025 AutoDNA Canada. All rights reserved.</p>
</footer>

</main>

<?php
get_footer();

<?php
/**
 * Template Name: AutoDNA - SkipTheDealer Page
 *
 * @package AutoDNA
 */

get_header(); ?>

<main>

<!-- ══ 1. HERO (Exact Figma 464:4868 / 100% Crisp Vector SVG) ═══════════════ -->
<section class="dealer-hero" id="hero" aria-label="SkipTheDealer Intro">
  <!-- Desktop 100% Vector Board (1440x880, exact Figma proportions, razor-sharp typography) -->
  <div class="dealer-board dealer-board--desktop">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/dealer-hero-vector.svg" class="dealer-board__svg" alt="SkipTheDealer — Buy cars up to 40% cheaper" fetchpriority="high">
    <a href="#how-it-works" class="dealer-board__cta-hitarea dealer-board__cta-hitarea--hero" aria-label="See how it works"></a>
  </div>

  <!-- Mobile Vector Board (393px exact Figma mobile vector) -->
  <div class="dealer-board dealer-board--mobile">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/dealer-mob-hero-scenarios.svg" class="dealer-board__svg" alt="SkipTheDealer — Buy cars up to 40% cheaper" fetchpriority="high">
    <a href="#how-it-works" class="dealer-board__cta-hitarea dealer-board__cta-hitarea--mob" aria-label="See how it works"></a>
  </div>
</section>

<!-- ══ 2. SCENARIOS (Exact Figma 464:5122..5138 / Seamless #020202) ════════ -->
<section class="dealer-scenarios" id="scenarios" aria-label="Market Scenarios">
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

<!-- ══ 4. REAL SAVINGS ON EVERY CAR (Exact 100% Vector SVG from Figma skipthedealer/) ══ -->
<section class="dealer-savings" id="real-savings" aria-label="Real savings table">
  <!-- Desktop 100% Vector SVG Board: Exact match to user screenshot -->
  <div class="dealer-board dealer-board--desktop">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/dealer-savings-exact-clean.svg" class="dealer-board__svg" alt="Real Savings on Every Car: 2019 Honda Civic, 2020 VW Tiguan, 2021 Hyundai Elantra" loading="lazy">
  </div>

  <!-- Mobile Layout -->
  <div class="dealer-savings__container dealer-savings__container--mobile">
    <div class="dealer-savings__stage">
      <div class="dealer-savings__cars">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/dealer-savings-cars-exact.jpg" alt="Honda Civic, VW Tiguan, Hyundai Elantra" loading="lazy">
      </div>
      <h2 class="dealer-savings__title">
        <span>REAL</span> <span class="neon-lavender">SAVINGS ON</span><br>
        <span>EVERY CAR</span>
      </h2>
    </div>

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

<!-- ══ 5. FRIENDS, STATS, CTA & FOOTER (Exact 100% Vector SVG from Figma skipthedealer/) ══ -->
<section class="dealer-bottom-zone" id="footer-zone" aria-label="Community, Benefits, and Contact">
  <!-- Desktop 100% Vector SVG Board: Exact match to user screenshot -->
  <div class="dealer-board dealer-board--desktop">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/dealer-footer-exact-clean.svg" class="dealer-board__svg" alt="AutoDNA Friends, 30-40% Cheaper Benefits, Submit a Request, and Contact" loading="lazy">

    <!-- Interactive click hitarea over 'SUBMIT A REQUEST ↗' button -->
    <a href="#top" class="dealer-board__cta-bottom-hitarea" aria-label="Submit a request"></a>

    <!-- Interactive telephone and email links over footer -->
    <a href="tel:+14033128306" class="dealer-board__phone-hitarea" aria-label="Call +1 (403) 312-8306"></a>
    <a href="mailto:info@autodna.com" class="dealer-board__email-hitarea" aria-label="Email info@autodna.com"></a>

    <!-- Interactive Social Links -->
    <div class="dealer-board__socials-hitarea">
      <a href="https://facebook.com" target="_blank" rel="noopener" aria-label="Facebook"></a>
      <a href="https://x.com" target="_blank" rel="noopener" aria-label="X (Twitter)"></a>
      <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram"></a>
    </div>

    <!-- Interactive Address Link to Google Maps -->
    <a href="https://maps.google.com/?q=730+2+Ave+SW+Calgary+T2P1R8+Canada" target="_blank" rel="noopener" class="dealer-board__address-hitarea" aria-label="Open location in Google Maps"></a>
  </div>

  <!-- Mobile Vector Board (from skipthedealer/SkipTheDealer mob.svg) -->
  <div class="dealer-board dealer-board--mobile">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/dealer-mob-footer-clean.svg" class="dealer-board__svg" alt="AutoDNA Friends and Contact" loading="lazy">
  </div>
</section>

</main>

<?php
get_footer();

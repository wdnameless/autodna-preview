<?php
/**
 * Template Name: AutoDNA — SkipTheDealer
 */

get_header(); ?>

<!-- HERO SECTION -->
<section class="dna-hero" style="background: radial-gradient(100% 70% at 50% 25%, rgba(89, 75, 177, 0.6) 0%, rgba(7, 5, 29, 0) 70%), var(--dna-bg);">
    <div class="shell" style="text-align: center;">
      
      <!-- Hero Top Heading -->
      <p class="kicker" style="font-size: clamp(16px, 2.2vw, 24px); margin-bottom: 8px;">
        Buy cars up to <span style="color: var(--dna-purple-soft);">40% cheaper</span>
      </p>

      <h1 class="dna-hero-title" style="margin-top: 0; font-size: clamp(48px, 9.6vw, 120px);">
        SkipTheDealer
      </h1>

      <p class="prose-dna" style="font-size: clamp(18px, 2.2vw, 28px); margin: 20px auto 36px; max-width: 760px; line-height: 1.35;">
        You pay the real price, not someone else’s markup.<br>
        <span style="color: var(--dna-dim);">No showrooms, no fancy words. Just cheaper cars.</span>
      </p>

      <!-- Center Hero Showcase Image -->
      <div class="bracket" style="max-width: 960px; margin: 0 auto; overflow: hidden;">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/dealer/hero-car.jpg" alt="SkipTheDealer vehicle showcase" style="width: 100%;">
      </div>

      <!-- Action Buttons -->
      <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; margin-top: 44px;">
        <a href="#how" class="btn-bracket">See how it works</a>
        <a href="#quote" class="btn-bracket btn-solid">Start your search</a>
      </div>

    </div>
  </section>

  <!-- TWO SCENARIOS SECTION -->
  <section class="section" id="scenarios">
    <div class="shell">
      <div style="text-align: center; max-width: 860px; margin: 0 auto 50px;">
        <h2 class="display" style="font-size: clamp(26px, 3.5vw, 44px); line-height: 1.15; color: #fff;">
          Imagine buying a car —<br>
          <span style="color: var(--dna-purple);">dealers are out of the game.</span><br>
          Now it’s your turn.
        </h2>
        <p class="prose-dna" style="margin-top: 18px; font-size: 19px;">
          Customers can get a car 30–40% cheaper than the market price. There are two main scenarios:
        </p>
      </div>

      <div class="dna-scenarios-grid">
        <div class="glass-card bracket" style="padding: 40px 36px;">
          <h3 class="display" style="font-size: 28px; color: #fff; margin-bottom: 20px;">
            1. Buy and profit
          </h3>
          <p class="prose-dna" style="font-size: 17px; line-height: 1.6;">
            A customer buys a car for $10,000, while the market price is $14,000–$15,000. They immediately gain $4,000–$5,000 in equity and save 30% or more from day one.
          </p>
        </div>

        <div class="glass-card bracket" style="padding: 40px 36px;">
          <h3 class="display" style="font-size: 28px; color: #fff; margin-bottom: 20px;">
            2. Drive without losing
          </h3>
          <p class="prose-dna" style="font-size: 17px; line-height: 1.6;">
            A customer keeps the car for 2–3 years. During this time, the market price might drop from $15,000 to $7,000–$8,000 — but since they bought it for only $10,000, their actual financial loss is virtually zero.
          </p>
        </div>
      </div>

      <p class="display" style="font-size: clamp(22px, 3vw, 40px); line-height: 1.2; text-align: center; margin-top: 60px; color: #fff;">
        With SkipTheDealer, customers either profit<br>
        <span style="color: var(--dna-purple);">or minimize losses to zero.</span>
      </p>
    </div>
  </section>

  <!-- HOW IT WORKS INTERACTIVE STEP SWITCHER (FIGMA COMPONENT 4) -->
  <section class="section" id="how" style="background: radial-gradient(90% 60% at 50% 35%, rgba(67, 54, 148, 0.45) 0%, rgba(7, 5, 29, 0) 70%);">
    <div class="shell" data-step-switcher>
      
      <!-- Big Section Title with Connector Lines -->
      <h2 class="display" style="font-size: clamp(48px, 10vw, 130px); text-align: center; color: #fff;">
        HOW IT <span style="color: var(--dna-purple-soft);">WORKS</span>
      </h2>

      <!-- 4 Step Buttons (Click to switch dynamically as requested in video) -->
      <div class="dna-step-tabs" role="tablist">
        <button type="button" class="dna-step-tab-btn bracket-all is-active" data-step-tab="1" role="tab" aria-selected="true">
          Step 1
        </button>
        <button type="button" class="dna-step-tab-btn bracket-all" data-step-tab="2" role="tab" aria-selected="false">
          Step 2
        </button>
        <button type="button" class="dna-step-tab-btn bracket-all" data-step-tab="3" role="tab" aria-selected="false">
          Step 3
        </button>
        <button type="button" class="dna-step-tab-btn bracket-all" data-step-tab="4" role="tab" aria-selected="false">
          Step 4
        </button>
      </div>

      <!-- Step Panels Container -->
      <div class="glass-card bracket" style="padding: 48px; max-width: 1100px; margin: 0 auto;">
        
        <!-- PANEL 1 (Default Active) -->
        <div class="dna-step-panel is-active" data-step-panel="1" role="tabpanel">
          <div style="text-align: center; max-width: 800px; margin: 0 auto 36px;">
            <h3 class="display" style="font-size: clamp(26px, 3.2vw, 44px); color: #fff; margin-bottom: 16px;">
              Step 1. Introduction &amp; Car Selection
            </h3>
            <p class="prose-dna" style="font-size: 18px;">
              You tell us about your dream car — make, model, year, body type, features, and budget.
            </p>
            <p class="prose-dna" style="font-size: 17px; color: var(--dna-purple-soft); margin-top: 14px;">
              At this stage, you immediately receive an approximate financial overview:
            </p>
          </div>

          <!-- 4 Financial Breakdown Pillars -->
          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 20px; margin: 30px 0;">
            <div style="border-left: 2px solid var(--dna-purple); padding-left: 16px;">
              <h4 style="font-size: 16px; font-weight: 500; color: #fff; margin-bottom: 6px;">Auction Price</h4>
              <p class="prose-dna" style="font-size: 14px;">Estimated cost to buy the car directly at auction.</p>
            </div>
            <div style="border-left: 2px solid var(--dna-purple); padding-left: 16px;">
              <h4 style="font-size: 16px; font-weight: 500; color: #fff; margin-bottom: 6px;">Repair Costs</h4>
              <p class="prose-dna" style="font-size: 14px;">Expected expenses to fix any cosmetic or technical damage.</p>
            </div>
            <div style="border-left: 2px solid var(--dna-purple); padding-left: 16px;">
              <h4 style="font-size: 16px; font-weight: 500; color: #fff; margin-bottom: 6px;">Additional Fees</h4>
              <p class="prose-dna" style="font-size: 14px;">Extra costs for inspections, diagnostics, registration, and documentation.</p>
            </div>
            <div style="border-left: 2px solid var(--dna-purple); padding-left: 16px;">
              <h4 style="font-size: 16px; font-weight: 500; color: #fff; margin-bottom: 6px;">Final Turnkey</h4>
              <p class="prose-dna" style="font-size: 14px;">Total turnkey cost to have the car registered and ready to drive.</p>
            </div>
          </div>

          <div style="margin-top: 36px; padding-top: 24px; border-top: 1px solid var(--dna-line); text-align: center;">
            <p class="display" style="font-size: 20px; color: var(--dna-purple-soft); margin-bottom: 12px;">
              We always calculate the total with your expected savings in mind:
            </p>
            <p class="prose-dna" style="font-size: 16px; max-width: 820px; margin: 0 auto;">
              <strong>Example:</strong> If the market price of a car is $20,000, we typically buy it at auction for around $10,000. Adding repair, inspection, fees, and registration costs, the final price comes to about $14,000. <strong>You save $6,000 compared to market.</strong>
            </p>
          </div>
        </div>

        <!-- PANEL 2 -->
        <div class="dna-step-panel" data-step-panel="2" role="tabpanel">
          <div style="text-align: center; max-width: 800px; margin: 0 auto 36px;">
            <h3 class="display" style="font-size: clamp(26px, 3.2vw, 44px); color: #fff; margin-bottom: 16px;">
              Step 2. Daily Selection &amp; Auctions
            </h3>
            <p class="prose-dna" style="font-size: 18px;">
              Every day, our specialists hunt and select several cars that strictly match your requirements:
            </p>
          </div>

          <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 20px; margin: 30px 0;">
            <div style="border-left: 2px solid var(--dna-purple); padding-left: 16px;">
              <h4 style="font-size: 16px; font-weight: 500; color: #fff; margin-bottom: 6px;">Daily Selection</h4>
              <p class="prose-dna" style="font-size: 14px;">We pick verified vehicles matching your exact criteria.</p>
            </div>
            <div style="border-left: 2px solid var(--dna-purple); padding-left: 16px;">
              <h4 style="font-size: 16px; font-weight: 500; color: #fff; margin-bottom: 6px;">Detailed Analysis</h4>
              <p class="prose-dna" style="font-size: 14px;">You get complete photos, history reports, and itemized cost estimates.</p>
            </div>
            <div style="border-left: 2px solid var(--dna-purple); padding-left: 16px;">
              <h4 style="font-size: 16px; font-weight: 500; color: #fff; margin-bottom: 6px;">Your Confirmation</h4>
              <p class="prose-dna" style="font-size: 14px;">You choose and confirm which specific cars we place bids on.</p>
            </div>
            <div style="border-left: 2px solid var(--dna-purple); padding-left: 16px;">
              <h4 style="font-size: 16px; font-weight: 500; color: #fff; margin-bottom: 6px;">Auction Bidding</h4>
              <p class="prose-dna" style="font-size: 14px;">We represent you at competitive closed dealer auctions.</p>
            </div>
          </div>

          <div style="margin-top: 36px; padding-top: 24px; border-top: 1px solid var(--dna-line); text-align: center;">
            <p class="prose-dna" style="font-size: 16px; max-width: 820px; margin: 0 auto;">
              Auctions are competitive — sometimes a car is not won immediately. We keep searching until we secure a vehicle within your budget, usually within a week.
            </p>
          </div>
        </div>

        <!-- PANEL 3 -->
        <div class="dna-step-panel" data-step-panel="3" role="tabpanel">
          <div style="text-align: center; max-width: 800px; margin: 0 auto 36px;">
            <h3 class="display" style="font-size: clamp(26px, 3.2vw, 44px); color: #fff; margin-bottom: 16px;">
              Step 3. Purchase &amp; Restoration
            </h3>
            <p class="prose-dna" style="font-size: 18px;">
              After winning the auction, your car is delivered to our certified Calgary service center for a full inspection:
            </p>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin: 30px 0;">
            <div class="glass-card" style="padding: 24px; border-left: 3px solid var(--dna-purple);">
              <h4 style="font-size: 18px; font-weight: 500; color: #fff; margin-bottom: 8px;">If the car is intact</h4>
              <p class="prose-dna" style="font-size: 15px;">We perform a complete mechanical check, full diagnostics, and fix all minor technical issues.</p>
            </div>
            <div class="glass-card" style="padding: 24px; border-left: 3px solid var(--dna-purple);">
              <h4 style="font-size: 18px; font-weight: 500; color: #fff; margin-bottom: 8px;">If damaged (collision, hail, cosmetic)</h4>
              <p class="prose-dna" style="font-size: 15px;">We do precision robotic bodywork, PaintBot painting, and comprehensive mechanical repairs.</p>
            </div>
          </div>

          <div style="margin-top: 36px; padding-top: 24px; border-top: 1px solid var(--dna-line); text-align: center;">
            <p class="display" style="font-size: 24px; color: var(--dna-purple);">
              The result: A car in perfect condition.
            </p>
          </div>
        </div>

        <!-- PANEL 4 -->
        <div class="dna-step-panel" data-step-panel="4" role="tabpanel">
          <div style="text-align: center; max-width: 800px; margin: 0 auto 36px;">
            <h3 class="display" style="font-size: clamp(26px, 3.2vw, 44px); color: #fff; margin-bottom: 16px;">
              Step 4. Inspection &amp; Documents
            </h3>
            <p class="prose-dna" style="font-size: 18px;">
              Official documentation and certified provincial registration ready for driving:
            </p>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin: 30px 0;">
            <div class="glass-card" style="padding: 24px; border-left: 3px solid var(--dna-purple);">
              <h4 style="font-size: 18px; font-weight: 500; color: #fff; margin-bottom: 8px;">Clean Active Status</h4>
              <p class="prose-dna" style="font-size: 15px;">If the car has clean active status, you can register and insure it immediately.</p>
            </div>
            <div class="glass-card" style="padding: 24px; border-left: 3px solid var(--dna-purple);">
              <h4 style="font-size: 18px; font-weight: 500; color: #fff; margin-bottom: 8px;">Salvage Status to Rebuilt</h4>
              <p class="prose-dna" style="font-size: 15px;">Undergoes rigorous AMVIC inspection and receives certified rebuilt active roadworthy status.</p>
            </div>
          </div>

          <div style="margin-top: 36px; padding-top: 24px; border-top: 1px solid var(--dna-line); text-align: center;">
            <p class="prose-dna" style="font-size: 17px; color: #fff;">
              In all cases, you receive complete official documents confirming the vehicle’s safety, mechanical integrity, and legal registration.
            </p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- REAL SAVINGS ON EVERY CAR (TABLE + DELIVERED CARS) -->
  <section class="section" id="savings">
    <div class="shell">
      <h2 class="display" style="font-size: clamp(36px, 6.5vw, 90px); line-height: 1; color: #fff; margin-bottom: 16px;">
        Real savings<br>on every car
      </h2>
      <p class="prose-dna" style="font-size: 18px;">Audited benchmark deals sourced for our clients.</p>

      <!-- 4-Column Savings Benchmark Table -->
      <div class="table-scroll">
        <table class="dna-table">
          <thead>
            <tr>
              <th>Car (Year &amp; Model)</th>
              <th>Dealer Price</th>
              <th>SkipTheDealer Price</th>
              <th>You Save</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>2019 Honda Civic</strong></td>
              <td>$18,900</td>
              <td class="highlight">$13,200</td>
              <td class="highlight" style="color: var(--dna-purple-bright);"><strong>$5,700</strong></td>
            </tr>
            <tr>
              <td><strong>2020 VW Tiguan</strong></td>
              <td>$26,500</td>
              <td class="highlight">$18,900</td>
              <td class="highlight" style="color: var(--dna-purple-bright);"><strong>$7,600</strong></td>
            </tr>
            <tr>
              <td><strong>2021 Hyundai Elantra</strong></td>
              <td>$21,700</td>
              <td class="highlight">$15,200</td>
              <td class="highlight" style="color: var(--dna-purple-bright);"><strong>$6,500</strong></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- 3 Real Car Photos Grid -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-top: 40px;">
        <figure class="bracket" style="overflow: hidden; margin: 0;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/dealer/car-sedan.jpg" alt="Delivered Honda Civic" style="width: 100%;">
          <figcaption style="padding: 14px 4px; font-size: 15px; color: var(--dna-muted);">
            2019 Honda Civic — <span style="color: var(--dna-purple); font-weight: 500;">Saved $5,700</span>
          </figcaption>
        </figure>

        <figure class="bracket" style="overflow: hidden; margin: 0;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/dealer/car-suv.jpg" alt="Delivered VW Tiguan" style="width: 100%;">
          <figcaption style="padding: 14px 4px; font-size: 15px; color: var(--dna-muted);">
            2020 VW Tiguan — <span style="color: var(--dna-purple); font-weight: 500;">Saved $7,600</span>
          </figcaption>
        </figure>

        <figure class="bracket" style="overflow: hidden; margin: 0;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/dealer/car-handshake.jpg" alt="Delivered Hyundai Elantra" style="width: 100%;">
          <figcaption style="padding: 14px 4px; font-size: 15px; color: var(--dna-muted);">
            2021 Hyundai Elantra — <span style="color: var(--dna-purple); font-weight: 500;">Saved $6,500</span>
          </figcaption>
        </figure>
      </div>
    </div>
  </section>

  <!-- WHY IT WORKS (5 BENEFIT CARDS) -->
  <section class="section" id="why">
    <div class="shell">
      <p class="kicker" style="margin-bottom: 10px;">The AutoDNA Advantage</p>
      <h2 class="display" style="font-size: clamp(32px, 5vw, 64px); color: #fff; margin-bottom: 40px;">
        Why It Works
      </h2>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px;">
        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 22px; color: var(--dna-purple); margin-bottom: 14px;">30–40% Cheaper</h3>
          <p class="prose-dna" style="font-size: 16px;">Save thousands compared to traditional dealerships and Marketplace private seller markups.</p>
        </div>

        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 14px;">Full Inspection &amp; Safety</h3>
          <p class="prose-dna" style="font-size: 16px;">Every vehicle goes through complete 150-point diagnostic and AMVIC certified inspection.</p>
        </div>

        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 14px;">Zero Dealer Markup</h3>
          <p class="prose-dna" style="font-size: 16px;">Dealers buy from the same auctions and resell for high profits. We buy directly for you at true dealer price.</p>
        </div>

        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 14px;">Exclusive Auctions</h3>
          <p class="prose-dna" style="font-size: 16px;">We represent you at closed wholesale dealer auctions regular retail buyers cannot access.</p>
        </div>

        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 14px;">Long-Term Value</h3>
          <p class="prose-dna" style="font-size: 16px;">In 2–3 years, you can resell your car for nearly the same price you paid — zero depreciation loss.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- YOUR FRIENDS ARE OUR FRIENDS (WITH FAMILY PHOTO) -->
  <section class="section">
    <div class="shell">
      <div class="glass-card bracket" style="padding: 48px; max-width: 900px; margin: 0 auto; text-align: center;">
        <h2 class="display" style="font-size: clamp(28px, 4.5vw, 54px); color: #fff; margin-bottom: 24px;">
          Your friends are our friends!
        </h2>
        <div class="bracket" style="max-width: 420px; margin: 0 auto 28px; overflow: hidden;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/dealer/family.jpg" alt="AutoDNA happy family client" style="width: 100%;">
        </div>
        <p class="prose-dna" style="font-size: 19px; max-width: 640px; margin: 0 auto;">
          Your friends and family can enjoy a <strong>30% discount</strong> on every second order.<br>
          And when they make their first order — <strong>you’ll get 30% off too!</strong>
        </p>
      </div>
    </div>
  </section>

  <!-- REQUEST A QUOTE (FORM) -->
  <section class="section" id="quote" style="background: radial-gradient(100% 60% at 50% 30%, rgba(67, 54, 148, 0.35) 0%, rgba(7, 5, 29, 0) 70%);">
    <div class="shell" style="max-width: 860px;">
      <p class="kicker">Direct Auction Intake</p>
      <h2 class="display" style="font-size: clamp(32px, 5.4vw, 72px); color: #fff; margin: 12px 0 40px;">
        Not sure where to start?
      </h2>

      <form data-quote novalidate>
        <div class="dna-form-grid">
          <div class="dna-field">
            <label for="quote-name">Your Name</label>
            <input type="text" id="quote-name" name="name" required placeholder="John Doe">
            <span class="dna-form-error">Please enter your name</span>
          </div>

          <div class="dna-field">
            <label for="quote-make">Preferred Make</label>
            <input type="text" id="quote-make" name="make" required placeholder="e.g. Toyota, BMW, Audi">
            <span class="dna-form-error">Required</span>
          </div>

          <div class="dna-field">
            <label for="quote-model">Model</label>
            <input type="text" id="quote-model" name="model" placeholder="e.g. Corolla, X5, A4">
          </div>

          <div class="dna-field">
            <label for="quote-year">Year Range</label>
            <input type="text" id="quote-year" name="year" placeholder="e.g. 2020 – 2023">
          </div>

          <div class="dna-field">
            <label for="quote-budget">Target Budget (CAD)</label>
            <input type="text" id="quote-budget" name="budget" required placeholder="e.g. $18,000">
            <span class="dna-form-error">Required</span>
          </div>

          <div class="dna-field">
            <label for="quote-contact">Phone or Email</label>
            <input type="text" id="quote-contact" name="contact" required placeholder="+1 (403) ... or email">
            <span class="dna-form-error">Required</span>
          </div>

          <div class="dna-field" style="grid-column: 1 / -1;">
            <label for="quote-message">Additional Requirements</label>
            <textarea id="quote-message" name="message" rows="3" placeholder="Color, trim level, mileage preference, etc."></textarea>
          </div>
        </div>

        <button type="submit" class="btn-bracket btn-solid" style="margin-top: 36px; width: 100%; max-width: 320px;">
          Submit a request
        </button>

        <div class="dna-form-success">
          Thank you! Our auction specialists will prepare a vehicle overview within 24 hours.
        </div>
      </form>
    </div>
  </section>

  <!-- CLOSING CALLOUT & TEAM -->
  <section class="section" style="padding-bottom: 60px;">
    <div class="shell">
      <div style="text-align: center; margin-bottom: 70px;">
        <p class="display" style="font-size: clamp(28px, 4.6vw, 64px); color: #fff;">
          Save up to $10,000 on your next car?
        </p>
        <p class="display" style="font-size: clamp(24px, 3.4vw, 48px); color: var(--dna-purple); margin-top: 10px;">
          — It’s real.
        </p>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1.1fr; gap: 48px; align-items: center;">
        <div>
          <div class="display" style="font-size: clamp(48px, 7vw, 100px); line-height: 0.95; color: #fff;">
            we<br>don’t<br><span style="color: var(--dna-purple);">just</span><br>sell<br>cars.
          </div>
          <p class="prose-dna" style="font-size: 20px; margin-top: 32px; text-transform: uppercase; letter-spacing: 0.04em;">
            We’re building a community where every customer gets more than they expect.
          </p>
        </div>

        <div class="bracket" style="overflow: hidden;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/dealer/team.jpg" alt="SkipTheDealer AutoDNA Team">
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>

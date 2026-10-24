<?php
/**
 * Template Name: AutoDNA — AutoDNA Flip (Invest)
 */

get_header(); ?>

<!-- HERO SECTION -->
<section class="dna-hero" style="background: radial-gradient(100% 70% at 50% 25%, rgba(160, 140, 255, 0.6) 0%, rgba(7, 5, 29, 0) 70%), var(--dna-bg);">
    <div class="shell">
      
      <!-- Top Title Area -->
      <div style="margin-bottom: 30px;">
        <h1 class="display" style="font-size: clamp(48px, 9.6vw, 130px); color: rgba(237, 235, 251, 0.7); line-height: 0.95; text-transform: none;">
          Invest in cars.
        </h1>
        <div style="display: flex; justify-content: space-between; align-items: baseline; flex-wrap: wrap; gap: 16px; margin-top: 10px;">
          <p class="display" style="font-size: clamp(20px, 2.6vw, 36px); color: #fff;">
            Earn from <span style="color: var(--dna-purple); font-weight: 600;">$2,000</span>
          </p>
          <p class="display" style="font-size: clamp(20px, 2.6vw, 36px); color: #fff;">
            on each vehicle.
          </p>
        </div>
      </div>

      <!-- Hero 3-Column Layout: Lede + Handshake Photo + Facts Rail -->
      <div class="dna-invest-hero-grid">
        <p class="prose-dna" style="font-size: clamp(18px, 1.8vw, 24px); line-height: 1.35; color: #fff; text-transform: uppercase;">
          We buy, repair, and<br>sell cars — you<br>earn the profit.
        </p>

        <div class="bracket" style="overflow: hidden;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/invest/handshake.jpg" alt="AutoDNA Investor Partner Handshake" style="width: 100%;">
        </div>

        <ul style="display: flex; flex-direction: column; gap: 24px; text-align: right;">
          <li style="font-size: 17px; color: var(--dna-purple-soft); font-weight: 300; display: flex; align-items: center; justify-content: flex-end; gap: 12px;">
            <span>Tangible assets</span> <span style="color: var(--dna-purple);">—</span>
          </li>
          <li style="font-size: 17px; color: var(--dna-purple-soft); font-weight: 300; display: flex; align-items: center; justify-content: flex-end; gap: 12px;">
            <span>Up to 40% ROI</span> <span style="color: var(--dna-purple);">—</span>
          </li>
          <li style="font-size: 17px; color: var(--dna-purple-soft); font-weight: 300; display: flex; align-items: center; justify-content: flex-end; gap: 12px;">
            <span>Lower risk</span> <span style="color: var(--dna-purple);">—</span>
          </li>
        </ul>
      </div>

      <div style="margin-top: 48px;">
        <a href="#quote" class="btn-bracket btn-solid" style="min-width: 280px;">
          Become an investor
        </a>
      </div>

    </div>
  </section>

  <!-- HOW IT WORKS (4 STEPS PROTOCOL) -->
  <section class="section" id="how" style="background: radial-gradient(90% 60% at 50% 30%, rgba(89, 75, 177, 0.45) 0%, rgba(7, 5, 29, 0) 70%);">
    <div class="shell">
      <h2 class="display" style="font-size: clamp(48px, 10vw, 130px); color: #fff; margin-bottom: 50px; text-align: center;">
        HOW IT <span style="color: var(--dna-purple-soft);">WORKS</span>
      </h2>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 28px;">
        <article class="glass-card bracket" style="padding: 36px 30px; display: flex; flex-direction: column; justify-content: space-between;">
          <div>
            <div class="bracket-all" style="display: inline-block; padding: 10px 18px; margin-bottom: 24px; font-size: 14px; text-transform: uppercase; color: var(--dna-muted);">
              Step 1
            </div>
            <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 16px;">
              Investment Plan &amp; Start
            </h3>
            <p class="prose-dna" style="font-size: 15px;">
              The investor meets with us and receives a detailed action plan — how exactly we buy, repair, and sell cars, and what return on investment they can expect.
            </p>
          </div>
          <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--dna-line); font-size: 14px; text-transform: uppercase; color: #fff;">
            <span style="color: var(--dna-purple);">Goal:</span> Full clarity and confidence before investing.
          </div>
        </article>

        <article class="glass-card bracket" style="padding: 36px 30px; display: flex; flex-direction: column; justify-content: space-between;">
          <div>
            <div class="bracket-all" style="display: inline-block; padding: 10px 18px; margin-bottom: 24px; font-size: 14px; text-transform: uppercase; color: var(--dna-muted);">
              Step 2
            </div>
            <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 16px;">
              Car Purchase at Auction
            </h3>
            <p class="prose-dna" style="font-size: 15px;">
              We buy cars only from trusted, official auctions — minimizing risk at every stage. Each vehicle is carefully checked and appraised before bidding.
            </p>
          </div>
          <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--dna-line); font-size: 14px; text-transform: uppercase; color: #fff;">
            <span style="color: var(--dna-purple);">Goal:</span> Safe purchase with zero unnecessary risks.
          </div>
        </article>

        <article class="glass-card bracket" style="padding: 36px 30px; display: flex; flex-direction: column; justify-content: space-between;">
          <div>
            <div class="bracket-all" style="display: inline-block; padding: 10px 18px; margin-bottom: 24px; font-size: 14px; text-transform: uppercase; color: var(--dna-muted);">
              Step 3
            </div>
            <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 16px;">
              Repair &amp; Preparation
            </h3>
            <p class="prose-dna" style="font-size: 15px;">
              We work with our own Calgary service network and verified partners to restore each vehicle, keeping quality exceptionally high and costs strictly under control.
            </p>
          </div>
          <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--dna-line); font-size: 14px; text-transform: uppercase; color: #fff;">
            <span style="color: var(--dna-purple);">Goal:</span> Maximize value through quality and efficiency.
          </div>
        </article>

        <article class="glass-card bracket" style="padding: 36px 30px; display: flex; flex-direction: column; justify-content: space-between;">
          <div>
            <div class="bracket-all" style="display: inline-block; padding: 10px 18px; margin-bottom: 24px; font-size: 14px; text-transform: uppercase; color: var(--dna-muted);">
              Step 4
            </div>
            <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 16px;">
              Selling at Market Price
            </h3>
            <p class="prose-dna" style="font-size: 15px;">
              After full restoration, the car is listed for sale through our trusted sales channels. Each sale generates transparent financial results for the investor.
            </p>
          </div>
          <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid var(--dna-line); font-size: 14px; text-transform: uppercase; color: #fff;">
            <span style="color: var(--dna-purple);">Goal:</span> Fast sale at fair market value.
          </div>
        </article>
      </div>

      <!-- Cars Strip Banner from Figma -->
      <div style="margin-top: 60px; border: 1px solid var(--dna-line); overflow: hidden;">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/invest/cars-strip.jpg" alt="AutoDNA fleet inventory strip" style="width: 100%;">
      </div>
    </div>
  </section>

  <!-- PROFIT EXAMPLES TABLE -->
  <section class="section" id="profit" style="padding-top: 40px;">
    <div class="shell">
      <!-- 4 Cars Sourced Fleet from Figma -->
      <div style="max-width: 1200px; margin: 0 auto; overflow: hidden; position: relative;">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/invest/cars-profit.jpg" alt="AutoDNA Flip Curated Vehicle Portfolio" style="width: 100%; display: block;">
      </div>

      <div style="text-align: center; margin-top: -20px; margin-bottom: 40px; position: relative; z-index: 2;">
        <h2 class="display-outline" style="font-size: clamp(48px, 9.6vw, 120px);">
          Profit Examples
        </h2>
        <p class="prose-dna" style="margin-top: 14px; font-size: 18px;">
          Audited vehicle investment returns based on our recent Calgary auction sales.
        </p>
      </div>

      <div class="table-scroll">
        <table class="dna-table">
          <thead>
            <tr>
              <th>Investment Amount</th>
              <th>Potential Profit</th>
              <th>Number of Cars</th>
              <th>Notes</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>$10,000</strong></td>
              <td class="highlight" style="color: var(--dna-purple-bright);"><strong>$2,500</strong></td>
              <td>1 car</td>
              <td>Single car example</td>
            </tr>
            <tr>
              <td><strong>$30,000</strong></td>
              <td class="highlight" style="color: var(--dna-purple-bright);"><strong>$6,000 – $9,000</strong></td>
              <td>2–3 cars</td>
              <td>Multiple cars per cycle</td>
            </tr>
            <tr>
              <td><strong>$50,000</strong></td>
              <td class="highlight" style="color: var(--dna-purple-bright);"><strong>$8,000 – $15,000 / mo</strong></td>
              <td>4–5 cars</td>
              <td>Higher investment, more cars deployed simultaneously</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- INVESTOR BENEFITS -->
  <section class="section" id="benefits" style="background: radial-gradient(circle at 50% 50%, rgba(89, 75, 177, 0.55) 0%, rgba(67, 54, 148, 0.25) 50%, transparent 80%);">
    <div class="shell">
      <h2 class="display display-glow" style="font-size: clamp(44px, 8vw, 120px); color: #fff; margin-bottom: 44px; text-align: center;">
        INVESTOR <span style="color: var(--dna-purple-soft);">BENEFITS</span>
      </h2>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px;">
        <div class="glass-card bracket" style="padding: 36px 30px;">
          <h3 class="display" style="font-size: 24px; color: var(--dna-purple); margin-bottom: 14px;">High Returns</h3>
          <p class="prose-dna" style="font-size: 16px;">Earn 20–30% profit per deal, consistently and reliably backed by physical collateral.</p>
        </div>

        <div class="glass-card bracket" style="padding: 36px 30px;">
          <h3 class="display" style="font-size: 24px; color: #fff; margin-bottom: 14px;">Reliable Investment</h3>
          <p class="prose-dna" style="font-size: 16px;">A real, tangible business with physical vehicle assets, not just “virtual opportunities”.</p>
        </div>

        <div class="glass-card bracket" style="padding: 36px 30px; border-left: 3px solid var(--dna-purple);">
          <h3 class="display" style="font-size: 24px; color: var(--dna-purple-soft); margin-bottom: 14px;">All-Inclusive Service</h3>
          <p class="prose-dna" style="font-size: 16px;">We handle hunting, inspection, bidding, restoration, marketing, and closing.</p>
        </div>

        <div class="glass-card bracket" style="padding: 36px 30px;">
          <h3 class="display" style="font-size: 24px; color: #fff; margin-bottom: 14px;">Full Transparency</h3>
          <p class="prose-dna" style="font-size: 16px;">Every detail tracked — all purchases, repair costs, inspections, and sales are documented.</p>
        </div>

        <div class="glass-card bracket" style="padding: 36px 30px;">
          <h3 class="display" style="font-size: 24px; color: #fff; margin-bottom: 14px;">Fast Turnover</h3>
          <p class="prose-dna" style="font-size: 16px;">Each investment cycle takes approximately 30 days from auction purchase to resale.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- GUARANTEE & TRANSPARENCY -->
  <section class="section" id="guarantee" style="background: radial-gradient(100% 60% at 50% 30%, rgba(67, 54, 148, 0.35) 0%, rgba(7, 5, 29, 0) 70%);">
    <div class="shell">
      <div style="text-align: center; margin-bottom: 40px;">
        <h2 class="display" style="font-size: clamp(26px, 6.5vw, 90px); color: #fff;">
          GUARANTEE &amp; <span style="color: var(--dna-purple-soft);">TRANSPARENCY</span>
        </h2>
      </div>

      <!-- 3 Primary Guarantee Cards -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px; margin-bottom: 60px;">
        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 20px; color: #fff; margin-bottom: 12px;">Official Auctions</h3>
          <p class="prose-dna" style="font-size: 15px;">Reliable sourcing — We work only with verified official auctions like Copart, IAAI, and ADESA.</p>
        </div>

        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 20px; color: #fff; margin-bottom: 12px;">Cars in Top Condition</h3>
          <p class="prose-dna" style="font-size: 15px;">Each vehicle is thoroughly inspected, repaired, and restored before listing for sale.</p>
        </div>

        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 20px; color: #fff; margin-bottom: 12px;">Safe &amp; Transparent</h3>
          <p class="prose-dna" style="font-size: 15px;">No hidden costs, no surprises — you see every line item, invoice, and bill of sale.</p>
        </div>
      </div>

      <!-- Full Documentation Sub-Section -->
      <div style="text-align: center; margin-bottom: 30px;">
        <h3 class="display" style="font-size: 28px; color: var(--dna-purple-soft);">
          Full Documentation
        </h3>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
        <div class="glass-card bracket" style="padding: 30px 26px;">
          <h4 class="display" style="font-size: 18px; color: #fff; margin-bottom: 10px;">Complete Financial Reports</h4>
          <p class="prose-dna" style="font-size: 14px;">Investor insight — You receive an itemized financial breakdown of every transaction.</p>
        </div>

        <div class="glass-card bracket" style="padding: 30px 26px;">
          <h4 class="display" style="font-size: 18px; color: #fff; margin-bottom: 10px;">Quality Assurance</h4>
          <p class="prose-dna" style="font-size: 14px;">Every vehicle adheres strictly to AMVIC certified provincial safety inspection standards.</p>
        </div>

        <div class="glass-card bracket" style="padding: 30px 26px;">
          <h4 class="display" style="font-size: 18px; color: #fff; margin-bottom: 10px;">Peace of Mind</h4>
          <p class="prose-dna" style="font-size: 14px;">All purchases, repair costs, inspections, and sale proceeds are documented with legal clarity.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- COMPARE YOUR OPTIONS (BENCHMARK TABLE) -->
  <section class="section" id="compare">
    <div class="shell">
      <div style="text-align: center; margin-bottom: 40px;">
        <h2 class="display-outline" style="font-size: clamp(40px, 8vw, 100px);">
          Compare Your Options
        </h2>
      </div>

      <div class="table-scroll">
        <table class="dna-table">
          <thead>
            <tr>
              <th>Investment Type</th>
              <th>Typical Return / Notes</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Bank Deposit</td>
              <td style="color: var(--dna-dim);">3–5% per year (Below real inflation)</td>
            </tr>
            <tr>
              <td>Stock Market</td>
              <td style="color: var(--dna-dim);">Unpredictable, volatile, long-term commitment required</td>
            </tr>
            <tr>
              <td>Cryptocurrency</td>
              <td style="color: var(--dna-dim);">High risk, speculative, zero physical asset backing</td>
            </tr>
            <tr class="highlight">
              <td><strong>AutoDNA Flip</strong></td>
              <td style="color: #ffffff;"><strong>20–30% per deal, ~30-day cycle, backed by physical cars</strong></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- BECOME AN INVESTOR (FORM) -->
  <section class="section" id="quote" style="background: radial-gradient(100% 60% at 50% 30%, rgba(67, 54, 148, 0.4) 0%, rgba(7, 5, 29, 0) 70%);">
    <div class="shell" style="max-width: 860px;">
      <p class="kicker">Capital Deployment</p>
      <h2 class="display" style="font-size: clamp(32px, 5.4vw, 72px); color: #fff; margin: 12px 0 16px;">
        Ready to invest?
      </h2>
      <p class="prose-dna" style="font-size: 19px; margin-bottom: 40px;">
        Put your capital to work today. Profit — in 30 days.
      </p>

      <form data-quote novalidate>
        <div class="dna-form-grid">
          <div class="dna-field">
            <label for="investor-name">Your Full Name</label>
            <input type="text" id="investor-name" name="name" required placeholder="Alexander Vance">
            <span class="dna-form-error">Please enter your name</span>
          </div>

          <div class="dna-field">
            <label for="investor-email">Email Address</label>
            <input type="email" id="investor-email" name="email" required placeholder="alex@investment.ca">
            <span class="dna-form-error">Please enter a valid email</span>
          </div>

          <div class="dna-field">
            <label for="investor-phone">Phone Number</label>
            <input type="text" id="investor-phone" name="phone" required placeholder="+1 (403) 000-0000">
            <span class="dna-form-error">Required</span>
          </div>

          <div class="dna-field">
            <label for="investor-amount">Target Capital (CAD)</label>
            <input type="text" id="investor-amount" name="amount" required placeholder="e.g. $25,000 or $50,000+">
            <span class="dna-form-error">Required</span>
          </div>

          <div class="dna-field" style="grid-column: 1 / -1;">
            <label for="investor-message">Investment Horizon / Notes</label>
            <textarea id="investor-message" name="message" rows="3" placeholder="Single vehicle cycle or rolling multi-car portfolio?"></textarea>
          </div>
        </div>

        <button type="submit" class="btn-bracket btn-solid" style="margin-top: 36px; width: 100%; max-width: 320px;">
          Submit a request
        </button>

        <div class="dna-form-success">
          Thank you! An AutoDNA Flip investment manager will contact you with the current vehicle pipeline.
        </div>
      </form>
    </div>
  </section>

<?php get_footer(); ?>

<?php
/**
 * Template Name: AutoDNA - SkipTheDealer Page
 *
 * @package AutoDNA
 */

get_header(); ?>

<main>

<!-- ══ 1. HERO (Exact Figma 464:4868 / User Reference) ═══════════════════ -->
<section class="dealer-hero" aria-label="SkipTheDealer Intro">
  <div class="dealer-hero__shade--top" aria-hidden="true"></div>
  <div class="dealer-hero__shade--bottom" aria-hidden="true"></div>

  <div class="dealer-hero__container">
    <p class="dealer-hero__sub">
      <span>BUY CARS UP TO</span> <span>40% CHEAPER</span>
    </p>

    <h1 class="dealer-hero__title" aria-label="SkipTheDealer">
      <span>SkipThe</span><span>Dealer</span>
    </h1>

    <div class="dealer-hero__stage">
      <!-- Item 1: Real Price -->
      <div class="dealer-hero__bullet dealer-hero__bullet--1">
        <p>YOU PAY THE <span class="neon-violet">REAL PRICE</span>, NOT SOMEONE ELSE’S MARKUP.</p>
      </div>

      <!-- Connector Vector 41 -->
      <svg class="dealer-hero__wire" viewBox="0 0 242 78" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 77.9H121.9L173.8 0H241.4" stroke="#C2B9FF" stroke-width="1" fill="none"/>
      </svg>

      <!-- Item 2: Showrooms -->
      <div class="dealer-hero__bullet dealer-hero__bullet--2">
        <p>NO SHOWROOMS, NO FANCY WORDS. <span class="neon-violet">JUST CHEAPER CARS.</span></p>
      </div>

      <!-- Item 3: See how it works button -->
      <a class="dealer-hero__cta-btn ticks" href="#how-it-works">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <span>SEE HOW IT WORKS</span>
        <svg class="dealer-hero__cta-arrow" viewBox="0 0 13 13" aria-hidden="true">
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
        <span>CUSTOMERS CAN GET A CAR <span class="neon-violet">30–40% CHEAPER THAN THE MARKET PRICE.</span></span>
        <span>THERE ARE TWO MAIN SCENARIOS:</span>
      </p>
    </div>

    <!-- Wire brackets + vertical center divider -->
    <div class="dealer-scenarios__wire-box" aria-hidden="true">
      <svg class="dealer-scenarios__brackets" viewBox="0 0 938 90" preserveAspectRatio="none">
        <!-- Left bracket (Vector 38) -->
        <path d="M0 90V0H90" stroke="#C2B9FF" stroke-width="1" fill="none"/>
        <!-- Right bracket (Vector 39) -->
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

<!-- ══ 3. HOW IT WORKS (Interactive 4 Steps Component 464:5152) ═══════════ -->
<section class="dealer-how" id="how-it-works" aria-label="How it works">
  <img class="dealer-how__glow" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/how-it-works-glow.svg" alt="" aria-hidden="true">

  <div class="dealer-how__container">
    <div class="dealer-how__header">
      <h2 class="dealer-how__title">HOW IT WORKS</h2>

      <!-- 4 Interactive Tabs -->
      <div class="dealer-how__tabs" role="tablist" aria-label="Steps">
        <button class="hiw-tab ticks is-active" data-step="1" role="tab" aria-selected="true">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <span>Step 1</span>
        </button>
        <button class="hiw-tab ticks" data-step="2" role="tab" aria-selected="false">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <span>Step 2</span>
        </button>
        <button class="hiw-tab ticks" data-step="3" role="tab" aria-selected="false">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <span>Step 3</span>
        </button>
        <button class="hiw-tab ticks" data-step="4" role="tab" aria-selected="false">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <span>Step 4</span>
        </button>
      </div>
    </div>

    <!-- Interactive Step Cards Stage -->
    <div class="dealer-how__stage">
      <!-- Step 1 Card -->
      <div class="hiw-step-card ticks is-active" data-step="1">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <h3>Step 1. Introduction &amp; Car Selection</h3>
        <p class="hiw-lead">You tell us about your dream car — make, model, year, body type, features, and budget. At this stage, you immediately receive an approximate financial overview:</p>

        <div class="hiw-items-grid">
          <div class="hiw-item ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <p><strong>Approximate purchase price at auction</strong> — Estimated cost to buy the car at auction.</p>
          </div>
          <div class="hiw-item ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <p><strong>Repair costs</strong> (if the car has any damage) — Expected expenses to fix any damages.</p>
          </div>
          <div class="hiw-item ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <p><strong>Additional expenses</strong> — Extra costs for inspections, diagnostics, registration, and fees.</p>
          </div>
          <div class="hiw-item ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <p><strong>Final “turnkey” price</strong> — Total cost to have the car completely ready to drive.</p>
          </div>
        </div>

        <div class="hiw-calc-callout ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <p>We always calculate the total with your expected savings in mind — your car ends up <strong>30–40% cheaper</strong> than dealer or Marketplace prices.</p>
        </div>

        <div class="hiw-example-box ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <p><strong>Example:</strong> if the market price of a car is $20,000, we typically buy it at auction for around $10,000. Then we add repair, inspection, fees, and registration costs — and the final price comes to about $14,000. As a result, you save $6,000 compared to the market.</p>
          <ul>
            <li>✓ How much the car itself will cost</li>
            <li>✓ What the repair and documentation expenses will be</li>
            <li>✓ What the total final price is</li>
            <li>✓ And how much money you’ll actually save</li>
          </ul>
        </div>
      </div>

      <!-- Step 2 Card -->
      <div class="hiw-step-card ticks" data-step="2">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <h3>Step 2. Daily Selection &amp; Auctions</h3>
        <p class="hiw-lead">Every day, we select several cars that match your requirements:</p>

        <div class="hiw-items-grid">
          <div class="hiw-item ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <p><strong>Daily selection</strong> — We handpick matching vehicles across licensed wholesale auctions.</p>
          </div>
          <div class="hiw-item ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <p><strong>Detailed analysis</strong> — You get high-res photos, CarFax history, and estimated costs for each car.</p>
          </div>
          <div class="hiw-item ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <p><strong>Your confirmation</strong> — You choose which cars meet your exact expectations.</p>
          </div>
          <div class="hiw-item ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <p><strong>Auction bidding</strong> — We place expert bids on the confirmed cars within your budget.</p>
          </div>
        </div>

        <div class="hiw-calc-callout ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <p>Auctions are competitive — sometimes a car is not won immediately. We keep searching and bidding until we secure the right one within your target budget.</p>
        </div>
      </div>

      <!-- Step 3 Card -->
      <div class="hiw-step-card ticks" data-step="3">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <h3>Step 3. Purchase &amp; Restoration</h3>
        <p class="hiw-lead">After winning the auction, your car is delivered to our service center for a full restoration:</p>

        <div class="hiw-items-grid" style="grid-template-columns: repeat(2, 1fr);">
          <div class="hiw-item ticks" style="padding: 30px;">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <h4 style="font-size: 22px; color: #c2b9ff; margin-bottom: 12px; font-weight: 300;">If the car is intact →</h4>
            <p style="font-size: 18px; line-height: 24px;">We perform a complete mechanical check, full fluid maintenance, and fix all technical issues.</p>
          </div>
          <div class="hiw-item ticks" style="padding: 30px;">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <h4 style="font-size: 22px; color: #c2b9ff; margin-bottom: 12px; font-weight: 300;">If damaged (collision, hail, cosmetic) →</h4>
            <p style="font-size: 18px; line-height: 24px;">We do certified bodywork, laser geometry alignment, OEM painting, and full restoration in our dedicated shop.</p>
          </div>
        </div>

        <div class="hiw-calc-callout ticks" style="text-align: center;">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <p style="font-size: 24px; color: #ffffff;">The result: a car in perfect condition.</p>
        </div>
      </div>

      <!-- Step 4 Card -->
      <div class="hiw-step-card ticks" data-step="4">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <h3>Step 4. Inspection &amp; Documents</h3>
        <p class="hiw-lead">We take care of all paperwork, regulatory approvals, and insurance certification:</p>

        <div class="hiw-items-grid" style="grid-template-columns: repeat(2, 1fr);">
          <div class="hiw-item ticks" style="padding: 30px;">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <h4 style="font-size: 22px; color: #c2b9ff; margin-bottom: 12px; font-weight: 300;">If the car is clean (active status) →</h4>
            <p style="font-size: 18px; line-height: 24px;">You can register it immediately with clean Canadian title.</p>
          </div>
          <div class="hiw-item ticks" style="padding: 30px;">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <h4 style="font-size: 22px; color: #c2b9ff; margin-bottom: 12px; font-weight: 300;">If the car has salvage status →</h4>
            <p style="font-size: 18px; line-height: 24px;">It undergoes a rigorous AMVIC inspection and receives official certified rebuilt status.</p>
          </div>
        </div>

        <div class="hiw-calc-callout ticks" style="text-align: center;">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <p style="font-size: 20px; color: #ffffff;">In all cases, you receive official documents confirming the car’s safety and full compliance with Canadian standards.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ 4. REAL SAVINGS TABLE ═══════════════════════════════════════════════ -->
<section class="dealer-savings" aria-label="Real savings table">
  <div class="dealer-savings__container">
    <div class="dealer-savings__banner ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/dealer-savings-cars.jpg" alt="SkipTheDealer cars savings">
    </div>

    <h2 class="dealer-savings__title">REAL SAVINGS ON EVERY CAR</h2>

    <div class="dealer-savings__wrap">
      <table class="dealer-savings__table">
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
            <th>2019 Honda Civic</th>
            <td>$18,900</td>
            <td>$13,200</td>
            <td class="dealer-savings__save-val">$5,700</td>
          </tr>
          <tr>
            <th>2020 VW Tiguan</th>
            <td>$26,500</td>
            <td>$21,700</td>
            <td class="dealer-savings__save-val">$4,800</td>
          </tr>
          <tr>
            <th>2021 Hyundai Elantra</th>
            <td>$18,900</td>
            <td>$15,200</td>
            <td class="dealer-savings__save-val">$3,700</td>
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

<?php
/**
 * Template Name: AutoDNA — Home Page
 */

get_header(); ?>

<!-- HERO SECTION -->
<section class="dna-hero">
    <div class="shell" style="position: relative;">
      
      <!-- Top Right Explore Links -->
      <aside class="dna-explore-rail">
        <a href="<?php echo esc_url( home_url( '/skipthedealer/' ) ); ?>" class="dna-explore-link">Explore SkipTheDealer</a>
        <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="dna-explore-link">AutoDNA Flip</a>
        <a href="<?php echo esc_url( home_url( '/service/' ) ); ?>" class="dna-explore-link">AutoDNA Service</a>
      </aside>

      <!-- Center Triptych Image -->
      <div class="dna-hero-triptych bracket">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/main/hero-trio.jpg" alt="AutoDNA vehicle showcase trio">
      </div>

      <!-- Hero Typography -->
      <h1 class="dna-hero-title">the genetic code</h1>

      <div class="dna-hero-sub">
        <span class="accent">to your car</span>
        <span class="light">has already been found</span>
      </div>

    </div>
  </section>

  <!-- CARLEARS SECTION -->
  <section class="section" id="carlears">
    <div class="shell">
      <div style="max-width: 840px;">
        <p class="prose-dna" style="font-size: clamp(20px, 2.6vw, 36px); line-height: 1.25; text-transform: uppercase;">
          We don’t call ourselves a dealer,<br>we don’t like that word.
        </p>
        <p class="prose-dna" style="font-size: clamp(20px, 2.6vw, 36px); line-height: 1.25; text-transform: uppercase; margin-top: 20px;">
          We’re starting<br><span style="color: var(--dna-purple);">a new slang term</span>
        </p>
      </div>

      <div style="margin-top: 50px;">
        <div class="display-outline" style="font-size: clamp(30px, 11vw, 190px); letter-spacing: 0.02em; letter-spacing: 0.05em;">
          carlears
        </div>
      </div>

      <!-- 4 Benefit Cards Grid -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-top: 60px;">
        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 26px; color: #fff; margin-bottom: 24px;">High quality</h3>
          <p class="prose-dna" style="font-size: 16px;">A higher level of quality you can trust at an affordable price</p>
        </div>
        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 26px; color: #fff; margin-bottom: 24px;">Wide choice</h3>
          <p class="prose-dna" style="font-size: 16px;">A great selection of cars to match every lifestyle and need</p>
        </div>
        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 26px; color: #fff; margin-bottom: 24px;">Save more</h3>
          <p class="prose-dna" style="font-size: 16px;">A smarter way to save money without compromising on quality</p>
        </div>
        <div class="glass-card bracket" style="padding: 32px 28px;">
          <h3 class="display" style="font-size: 26px; color: #fff; margin-bottom: 24px;">True value</h3>
          <p class="prose-dna" style="font-size: 16px;">A real value that gives you confidence and satisfaction every time</p>
        </div>
      </div>
    </div>
  </section>

  <!-- VALUE PROPOSITION (5 FAN PILLARS) -->
  <section class="section" style="padding-top: 30px;">
    <div class="shell" style="text-align: center;">
      <p class="prose-dna" style="font-size: clamp(22px, 3vw, 40px); line-height: 1.2; text-transform: uppercase;">
        Imagine buying a<br>car from a dealer —
      </p>
      <p style="font-size: clamp(22px, 3vw, 40px); line-height: 1.2; text-transform: uppercase; color: var(--dna-purple); margin-top: 14px; font-weight: 300;">
        but paying the same price<br>you’d pay a private seller.
      </p>

      <!-- Radiating Connector Hairlines -->
      <div style="margin: 40px auto 30px; max-width: 1200px;">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="width: 100%; height: 90px; display: block;" aria-hidden="true">
          <line x1="600" y1="0" x2="120" y2="115" stroke="rgba(194,185,255,0.35)" stroke-width="1"/>
          <line x1="600" y1="0" x2="360" y2="115" stroke="rgba(194,185,255,0.35)" stroke-width="1"/>
          <line x1="600" y1="0" x2="600" y2="115" stroke="rgba(194,185,255,0.35)" stroke-width="1"/>
          <line x1="600" y1="0" x2="840" y2="115" stroke="rgba(194,185,255,0.35)" stroke-width="1"/>
          <line x1="600" y1="0" x2="1080" y2="115" stroke="rgba(194,185,255,0.35)" stroke-width="1"/>
        </svg>
      </div>

      <!-- 5 Benefit Pillars -->
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 24px; text-align: center;">
        <div>
          <h3 class="display" style="font-size: 18px; color: #fff; margin-bottom: 12px;">No<br>surprises</h3>
          <p class="prose-dna" style="font-size: 15px;">No hidden fees. No surprises. We cover the GST ourselves.</p>
        </div>
        <div>
          <h3 class="display" style="font-size: 18px; color: #fff; margin-bottom: 12px;">Affordable<br>dealer prices</h3>
          <p class="prose-dna" style="font-size: 15px;">Buying from a dealer can be just as affordable as buying privately.</p>
        </div>
        <div>
          <h3 class="display" style="font-size: 18px; color: #fff; margin-bottom: 12px;">Changing<br>the game</h3>
          <p class="prose-dna" style="font-size: 15px;">Calgary has never seen this before. We put the customer first.</p>
        </div>
        <div>
          <h3 class="display" style="font-size: 18px; color: #fff; margin-bottom: 12px;">Flexible<br>options</h3>
          <p class="prose-dna" style="font-size: 15px;">Flexible financing and an extended warranty from our partners.</p>
        </div>
        <div>
          <h3 class="display" style="font-size: 18px; color: #fff; margin-bottom: 12px;">Real<br>value</h3>
          <p class="prose-dna" style="font-size: 15px;">Zero profit for us — just fair prices and peace of mind for you.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- PRICE COMPARISON BENCHMARK -->
  <section class="section" id="comparison">
    <div class="shell">
      <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 20px;">
        <div>
          <p class="kicker">Benchmark vs Market</p>
          <div class="display-outline" style="font-size: clamp(34px, 8vw, 120px); margin-top: 10px;">
            Price<br>Comparison
          </div>
        </div>
        <div style="max-width: 580px; width: 100%;">
          <p class="kicker" style="color: var(--dna-purple-soft); margin-bottom: 10px;">Toyota Corolla Hatchback 2021</p>
          <div class="bracket" style="overflow: hidden;">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/main/toyota-corolla.jpg" alt="Toyota Corolla Hatchback 2021">
          </div>
        </div>
      </div>

      <div class="table-scroll">
        <table class="dna-table">
          <thead>
            <tr>
              <th>Option</th>
              <th>Price</th>
              <th>Features</th>
              <th>Cons</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Dealers</td>
              <td>$23,000 + GST</td>
              <td>Dealer purchase</td>
              <td style="color: var(--dna-dim);">Higher price, GST extra</td>
            </tr>
            <tr>
              <td>Marketplace</td>
              <td>$21,000</td>
              <td>Lower price</td>
              <td style="color: var(--dna-dim);">Car not inspected, potential issues, no warranty</td>
            </tr>
            <tr class="highlight">
              <td><strong>AutoDNA</strong></td>
              <td><strong>$21,000</strong> <span style="font-size: 14px; opacity: 0.85;">(GST included)</span></td>
              <td>Full inspection completed, 3-year paid warranty, financing available</td>
              <td style="color: var(--dna-purple-soft);"><strong>None — all value included</strong></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- SERVICES ACCORDION (COMPONENT 7 FROM FIGMA) -->
  <section class="section" id="services" style="background: radial-gradient(100% 60% at 50% 30%, rgba(67, 54, 148, 0.45) 0%, rgba(7, 5, 29, 0) 70%);">
    <div class="shell">
      <div style="text-align: center; margin-bottom: 20px;">
        <h2 class="display display-glow" style="font-size: clamp(52px, 11vw, 150px); color: #fff;">
          services
        </h2>
      </div>

      <!-- Component 7 Cards (Interactive Hover / Jump to Pages) -->
      <div class="dna-services-container" data-services-accordion>
        <!-- Card 1: SkipTheDealers -->
        <a href="<?php echo esc_url( home_url( '/skipthedealer/' ) ); ?>" class="dna-service-card bracket">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/main/service-dealer.jpg" alt="SkipTheDealers">
          <div class="dna-service-overlay">
            <h3>SkipTheDealers</h3>
            <p>Find, bid, and buy the best vehicles directly from trusted car auctions. Smart, transparent, and hassle-free — we handle the process from search to delivery.</p>
          </div>
        </a>

        <!-- Card 2: AutoDNA Flip -->
        <a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>" class="dna-service-card bracket">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/main/service-flip.jpg" alt="AutoDNA Flip">
          <div class="dna-service-overlay">
            <h3>AutoDNA Flip</h3>
            <p>Turn vehicles into valuable assets. We help you invest wisely in high-demand cars and maximize your returns through strategic resale.</p>
          </div>
        </a>

        <!-- Card 3: AutoDNA Service -->
        <a href="<?php echo esc_url( home_url( '/service/' ) ); ?>" class="dna-service-card bracket">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/main/service-service.jpg" alt="AutoDNA Service">
          <div class="dna-service-overlay">
            <h3>AutoDNA Service</h3>
            <p>AutoDNA Service is a next-generation automotive center, equipped with innovative technology, a modern minimalist interior, smart service systems, and skilled technicians.</p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- STATS & AUDITED METRICS -->
  <section class="section">
    <div class="shell">
      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 24px;">
        <div class="glass-card bracket" style="padding: 30px 24px;">
          <div class="display" style="font-size: 56px; color: #fff;">12</div>
          <div class="display" style="font-size: 16px; color: var(--dna-purple-soft); margin: 10px 0 14px;">Stages of Inspection</div>
          <p class="prose-dna" style="font-size: 15px;">We test, verify, and only then hand over the keys. Real inspection — not intuition.</p>
        </div>

        <div class="glass-card bracket" style="padding: 30px 24px;">
          <div class="display" style="font-size: 56px; color: #fff;">450+</div>
          <div class="display" style="font-size: 16px; color: var(--dna-purple-soft); margin: 10px 0 14px;">Clients Said “Wow!”</div>
          <p class="prose-dna" style="font-size: 15px;">And new ones join every week. Every car is a story — and our client is always the main character.</p>
        </div>

        <div class="glass-card bracket" style="padding: 30px 24px;">
          <div class="display" style="font-size: 56px; color: #fff;">10+</div>
          <div class="display" style="font-size: 16px; color: var(--dna-purple-soft); margin: 10px 0 14px;">Years in Industry</div>
          <p class="prose-dna" style="font-size: 15px;">We’ve seen it all — and that’s why we do it right. It’s in our DNA.</p>
        </div>

        <div class="glass-card bracket" style="padding: 30px 24px;">
          <div class="display" style="font-size: 56px; color: #fff;">3–4</div>
          <div class="display" style="font-size: 16px; color: var(--dna-purple-soft); margin: 10px 0 14px;">Weeks — Faster</div>
          <p class="prose-dna" style="font-size: 15px;">An optimized process — no delays, no surprises. Search, preparation, and the car is yours.</p>
        </div>

        <div class="glass-card bracket" style="padding: 30px 24px;">
          <div class="kicker" style="margin-bottom: 6px;">Overpaying isn’t our style</div>
          <div class="display" style="font-size: 48px; color: var(--dna-purple);">30–50%</div>
          <div class="display" style="font-size: 16px; color: #fff; margin-top: 10px;">Save Big</div>
          <p class="prose-dna" style="font-size: 15px; margin-top: 10px;">Auctions let you save thousands without sacrificing quality.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- PARENT CORPORATION & CALGARY HQ -->
  <section class="section">
    <div class="shell">
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;">
        <div>
          <p class="kicker">Corporate Vision</p>
          <h2 class="display" style="font-size: clamp(32px, 4.5vw, 56px); line-height: 1.1; margin: 16px 0 24px; color: #fff;">
            AutoDNA is the parent corporation
          </h2>
          <p class="prose-dna" style="font-size: 18px; margin-bottom: 24px;">
            Bringing together SkipTheDealer, AutoDNA Service, AutoDNA Flip, and future automotive technologies under one vision.
          </p>
          <div class="glass-card bracket" style="padding: 24px 28px; border-left: 3px solid var(--dna-purple);">
            <p style="font-family: var(--dna-font-display); font-size: 20px; color: #fff; text-transform: uppercase;">
              We play by new rules — and this is just the beginning.
            </p>
          </div>
          <p class="prose-dna" style="font-size: 17px; margin-top: 24px;">
            Over the next two years, we plan to create a complete automotive hub for car enthusiasts in Calgary, offering all kinds of services and community perks.
          </p>
        </div>

        <div class="bracket" style="overflow: hidden;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/main/calgary-hq.jpg" alt="AutoDNA Calgary Facility">
        </div>
      </div>
    </div>
  </section>

  <!-- AUTO CLUB BENEFITS -->
  <section class="section" id="autoclub">
    <div class="shell">
      <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 20px; margin-bottom: 40px;">
        <div>
          <p class="kicker">Exclusive Driver Perks</p>
          <h2 class="display display-glow" style="font-size: clamp(48px, 10vw, 130px); margin-top: 10px;">
            auto club
          </h2>
        </div>
        <p class="prose-dna" style="max-width: 420px; font-size: 18px; text-align: right;">
          Join DNA Auto Club and get more than just service. Real benefits, real savings — made for drivers like you.
        </p>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px;">
        <div class="glass-card bracket" style="padding: 32px 26px;">
          <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 16px;">Service</h3>
          <div class="display" style="font-size: 48px; color: var(--dna-purple);">30%</div>
          <div class="display" style="font-size: 16px; color: #fff; margin: 8px 0 14px;">Off Any Work</div>
          <p class="prose-dna" style="font-size: 15px;">The lowest prices in Calgary for bodywork, mechanics, and painting.</p>
        </div>

        <div class="glass-card bracket" style="padding: 32px 26px;">
          <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 16px;">Carwash</h3>
          <div class="display" style="font-size: 20px; color: var(--dna-purple-soft);">Every Second Wash</div>
          <div class="display" style="font-size: 38px; color: #fff; margin: 8px 0 14px;">Is Free</div>
          <p class="prose-dna" style="font-size: 15px;">Modern automatic carwash that preserves your vehicle’s protective coating.</p>
        </div>

        <div class="glass-card bracket" style="padding: 32px 26px;">
          <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 16px;">Wheel Alignment</h3>
          <div class="display" style="font-size: 48px; color: #fff;">$70</div>
          <div class="display" style="font-size: 15px; color: var(--dna-purple); margin: 8px 0 14px;">Market Price $150</div>
          <p class="prose-dna" style="font-size: 15px;">State-of-the-art equipment with automatic laser adjustment.</p>
        </div>

        <div class="glass-card bracket" style="padding: 32px 26px;">
          <h3 class="display" style="font-size: 22px; color: #fff; margin-bottom: 16px;">Tire Change</h3>
          <div class="display" style="font-size: 48px; color: #fff;">$60</div>
          <div class="display" style="font-size: 15px; color: var(--dna-purple); margin: 8px 0 14px;">Market Price $120</div>
          <p class="prose-dna" style="font-size: 15px;">Any wheel repair, seasonal tire replacement, and free seasonal storage.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- TEAM / COMMUNITY -->
  <section class="section">
    <div class="shell">
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
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/main/team.jpg" alt="AutoDNA Team and Community in Calgary">
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>

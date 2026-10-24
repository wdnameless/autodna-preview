<?php
/**
 * Template Name: AutoDNA — AutoDNA Service
 */

get_header(); ?>

<!-- HERO SECTION -->
<section class="dna-hero" style="padding: 0; background: #0b0820;">
    <div style="width: 100%; position: relative;">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/service/hero-collage.jpg" alt="The future of service is already here — AutoDNA Service" style="width: 100%; height: auto; display: block;">
    </div>
  </section>

  <!-- INTRO & SHOWROOM SECTION -->
  <section class="section" id="intro">
    <div class="shell" style="max-width: 1080px; text-align: center;">
      
      <p class="kicker" style="font-size: 16px; margin-bottom: 14px;">Innovation. Technology. Trust.</p>
      
      <h1 class="display" style="font-size: clamp(32px, 5.2vw, 68px); color: #fff; line-height: 1.1; margin-bottom: 24px;">
        The future of service<br>
        <span style="color: var(--dna-purple);">is already here.</span>
      </h1>

      <p class="prose-dna" style="font-size: 19px; max-width: 780px; margin: 0 auto 20px;">
        AutoDNA Service is a next-generation automotive center, equipped with innovative technology, a modern minimalist and spotless interior, smart service systems, a skilled team, and much more.
      </p>

      <p class="prose-dna" style="font-size: 18px; color: var(--dna-purple-soft); max-width: 720px; margin: 0 auto 48px;">
        It’s not just a service — it’s a modern automotive ecosystem that integrates telematics, robotics, and customer comfort.
      </p>

      <div class="bracket" style="overflow: hidden; max-width: 860px; margin: 0 auto;">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/service/showroom.jpg" alt="AutoDNA Calgary Service Center Facility" style="width: 100%;">
      </div>

      <h2 class="display" style="font-size: clamp(26px, 4vw, 52px); color: #fff; margin-top: 48px; line-height: 1.15;">
        The future of car service<br>
        <span style="color: var(--dna-purple-soft);">begins in Calgary.</span>
      </h2>

    </div>
  </section>

  <!-- ONE DNA. MULTIPLE SERVICES. (FIGMA COMPONENT 8 INTERACTIVE TABS) -->
  <section class="section" id="services" style="background: radial-gradient(circle at 50% 50%, rgba(89, 75, 177, 0.65) 0%, rgba(67, 54, 148, 0.3) 55%, transparent 80%);">
    <div class="shell" data-service-switcher>
      
      <div style="text-align: center; margin-bottom: 24px;">
        <h2 class="display display-glow" style="font-size: clamp(40px, 8.4vw, 110px); color: #fff;">
          ONE DNA.<br>
          <span style="color: var(--dna-purple-soft);">MULTIPLE SERVICES.</span>
        </h2>
      </div>

      <!-- Tab Buttons (Interactive Hover / Click Switcher from Video) -->
      <nav class="dna-service-switcher" role="tablist" aria-label="AutoDNA Services">
        <button type="button" class="dna-service-tab-btn bracket-all is-active" data-service-tab="shop" role="tab" aria-selected="true">
          SkipTheShop
        </button>
        <button type="button" class="dna-service-tab-btn bracket-all" data-service-tab="drivecare" role="tab" aria-selected="false">
          DriveCarePlan
        </button>
        <button type="button" class="dna-service-tab-btn bracket-all" data-service-tab="paintbot" role="tab" aria-selected="false">
          PaintBot
        </button>
      </nav>

      <!-- PANELS CONTAINER -->
      <div class="glass-card bracket" style="padding: 48px; max-width: 1000px; margin: 0 auto; text-align: center;">
        
        <!-- PANEL 1: SKIP THE SHOP (DEFAULT ACTIVE) -->
        <div class="dna-service-panel is-active" data-service-panel="shop" role="tabpanel">
          <h3 class="display" style="font-size: clamp(32px, 5vw, 64px); color: #fff; margin-bottom: 12px;">
            SkipTheShop
          </h3>
          <p class="kicker" style="font-size: 18px; color: var(--dna-purple); margin-bottom: 36px;">
            YOUR CAR GOES TO SERVICE. YOU DON’T.
          </p>

          <div class="bracket" style="max-width: 760px; margin: 0 auto 36px; overflow: hidden;">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/service/skiptheshop-triptych.jpg" alt="SkipTheShop Concierge Service Triptych" style="width: 100%; display: block;">
          </div>

          <p class="prose-dna" style="font-size: 18px; max-width: 680px; margin: 0 auto 16px;">
            A new format of car service — where you don’t go to the shop. Our technician picks up your car, completes all necessary maintenance and inspections, and brings it back to you.
          </p>
          <p class="display" style="font-size: 20px; color: var(--dna-purple-soft);">
            Fast. No lines. No wasted time.
          </p>
        </div>

        <!-- PANEL 2: DRIVECAREPLAN -->
        <div class="dna-service-panel" data-service-panel="drivecare" role="tabpanel">
          <h3 class="display" style="font-size: clamp(32px, 5vw, 64px); color: #fff; margin-bottom: 12px;">
            DriveCarePlan
          </h3>
          <p class="kicker" style="font-size: 18px; color: var(--dna-purple); margin-bottom: 36px;">
            STAY INFORMED. STAY AHEAD.
          </p>

          <div class="bracket" style="max-width: 680px; margin: 0 auto 36px; overflow: hidden;">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/service/drivecare-obd.jpg" alt="DriveCarePlan Telematics OBD II Module" style="width: 100%;">
          </div>

          <p class="prose-dna" style="font-size: 18px; max-width: 720px; margin: 0 auto 16px;">
            It’s a system with an OBD II module that combines vehicle monitoring, analytics, and preventive maintenance.
          </p>
          <p class="prose-dna" style="font-size: 16px; max-width: 720px; margin: 0 auto;">
            It remotely tracks each car’s condition — mileage, fuel consumption, ECU errors, temperature, and load — and automatically reminds you when it’s time for service, diagnostics, or refueling.
          </p>
        </div>

        <!-- PANEL 3: PAINTBOT -->
        <div class="dna-service-panel" data-service-panel="paintbot" role="tabpanel">
          <h3 class="display" style="font-size: clamp(32px, 5vw, 64px); color: #fff; margin-bottom: 12px;">
            PaintBot
          </h3>
          <p class="kicker" style="font-size: 18px; color: var(--dna-purple); margin-bottom: 36px;">
            REINVENTING BODY SHOP PAINTING.
          </p>

          <div class="bracket" style="max-width: 680px; margin: 0 auto 36px; overflow: hidden;">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/service/paintbot-robot.jpg" alt="PaintBot Industrial Robot Car Painting" style="width: 100%;">
          </div>

          <p class="prose-dna" style="font-size: 18px; max-width: 720px; margin: 0 auto 16px;">
            The first body shop in Calgary to use an industrial robot for car painting. The robot paints with precision beyond human capability.
          </p>
          <p class="prose-dna" style="font-size: 16px; max-width: 720px; margin: 0 auto;">
            A technology once reserved for major automotive manufacturers is now available in our service — for private clients.
          </p>
        </div>

      </div>

      <!-- Official Site Link -->
      <p class="prose-dna" style="text-align: center; margin-top: 40px; font-size: 16px;">
        Explore the future of car care — learn more on our AutoDNA Service official site:
        <span style="color: var(--dna-purple-soft); font-weight: 500;">AutoDnaService</span>
      </p>

    </div>
  </section>

  <!-- INSIDE THE MIND OF AUTODNA & CONTACT CALLOUT -->
  <section class="section" id="team" style="background: linear-gradient(180deg, #07051d 0%, rgba(67, 54, 148, 0.45) 50%, #020202 100%); padding-bottom: 60px;">
    <div class="shell" style="text-align: center;">
      
      <!-- Centered Framed Card with HUD Brackets -->
      <div class="glass-card bracket" style="max-width: 780px; margin: 0 auto 60px; padding: 40px; text-align: left;">
        <h2 class="display" style="font-size: clamp(22px, 3vw, 36px); color: var(--dna-purple-soft); margin-bottom: 24px; line-height: 1.15;">
          INSIDE THE MIND<br>OF AUTODNA.
        </h2>

        <div style="overflow: hidden; border: 1px solid var(--dna-line); margin-bottom: 24px;">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/' ); ?>img/clean/service/team-members.jpg" alt="Inside the Mind of AutoDNA Team" style="width: 100%; display: block;">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; border-top: 1px solid var(--dna-line); padding-top: 20px;">
          <p class="prose-dna" style="font-size: 14px; line-height: 1.5;">
            We believe <span style="color: #fff;">great service starts with clarity</span> — in thinking, in process, in space.
          </p>
          <p class="prose-dna" style="font-size: 14px; line-height: 1.5;">
            And It’s born where great people work together with one clear vision — <span style="color: var(--dna-purple);">to redefine car care.</span>
          </p>
        </div>
      </div>

      <!-- Centered Claim & Contact Callout -->
      <div style="max-width: 900px; margin: 0 auto;">
        <p class="display" style="font-size: clamp(24px, 3.8vw, 48px); color: #fff; line-height: 1.15; margin-bottom: 14px;">
          THEY’RE THE REASON<br>AUTODNA FEELS DIFFERENT.
        </p>
        <p class="display" style="font-size: clamp(18px, 2.6vw, 32px); color: var(--dna-purple-soft); line-height: 1.2; margin-bottom: 36px;">
          EVERY FACE HERE STANDS FOR<br>RELIABILITY, INNOVATION, AND TRUST.
        </p>

        <a href="#contact" class="btn-bracket" style="display: inline-flex; margin: 0 auto;">
          CONTACT WITH US
        </a>
      </div>

    </div>
  </section>

<?php get_footer(); ?>

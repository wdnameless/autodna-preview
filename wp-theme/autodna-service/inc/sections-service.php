<?php
/**
 * AutoDNA Service: page sections (one board per page, desktop + mobile).
 *
 * Pixel ports of autodnaservice/*.html <main> blocks. Board images come from
 * Customizer (adsvc_* settings, see inc/customize-content.php) with bundled
 * fallbacks; contacts come from AutoDNA Contact (adsvc_contact()).
 * Each function doubles as its selective-refresh render callback.
 *
 * @package AutoDNA Service
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function autodna_service_section_home() {
    $c       = adsvc_contact();
    $u_shop  = home_url( '/skiptheshop/' );
    $u_plan  = home_url( '/drivecareplan/' );
    $u_paint = home_url( '/paintbot/' );
    $u_buy   = 'https://autodnagroup.ca/skipthedealer/';
    ?>
<main class="site-main">
  <h1 class="sr-only">AutoDNA Service — The Future of Service is Already Here</h1>

  <!-- ══ DESKTOP SITE (100% Full-Bleed Edge-to-Edge) ═════════════════════ -->
  <div class="layout-desktop">
    <!-- 100% Vector SVG Board from Figma DNA service-1.svg (1440x7923) -->
    <div class="service-board-full">
      <img src="<?php echo esc_url( adsvc_img( 'adsvc_home_desktop', 'img/dnaservice-full-desktop-clean.svg' ) ); ?>" class="block-svg" alt="AutoDNA Service — The Future of Service is Already Here" fetchpriority="high">

      <!-- Interactive 3-State Overlays for Section 4 (y=2275.5..3044.5 in 7923px canvas) -->
      <div class="service-cards-container" id="multiple-services">
        <div class="service-card-view is-active" data-service-view="shop"></div>
        <div class="service-card-view" data-service-view="plan">
          <img src="<?php echo esc_url( adsvc_img( 'adsvc_home_state_plan', 'img/service-cards-state-plan.svg' ) ); ?>" alt="DriveCarePlan" loading="eager">
        </div>
        <div class="service-card-view" data-service-view="paint">
          <img src="<?php echo esc_url( adsvc_img( 'adsvc_home_state_paint', 'img/service-cards-state-paint.svg' ) ); ?>" alt="PaintBot" loading="eager">
        </div>
      </div>

      <!-- 3 Clickable Column Cards across the bottom (Hover previews, Click opens subpage!) -->
      <a href="<?php echo esc_url( $u_shop ); ?>" class="service-col-btn service-col-btn--shop is-active" data-service="shop" data-href="<?php echo esc_url( $u_shop ); ?>" aria-label="SkipTheShop — Open subpage"></a>
      <a href="<?php echo esc_url( $u_plan ); ?>" class="service-col-btn service-col-btn--plan" data-service="plan" data-href="<?php echo esc_url( $u_plan ); ?>" aria-label="DriveCarePlan — Open subpage"></a>
      <a href="<?php echo esc_url( $u_paint ); ?>" class="service-col-btn service-col-btn--paint" data-service="paint" data-href="<?php echo esc_url( $u_paint ); ?>" aria-label="PaintBot — Open subpage"></a>

      <!-- Dedicated Top-Right Arrow Buttons [↗] for instant navigation -->
      <a href="<?php echo esc_url( $u_shop ); ?>" class="service-arrow-btn service-arrow-btn--shop" aria-label="Open SkipTheShop subpage"></a>
      <a href="<?php echo esc_url( $u_plan ); ?>" class="service-arrow-btn service-arrow-btn--plan" aria-label="Open DriveCarePlan subpage"></a>
      <a href="<?php echo esc_url( $u_paint ); ?>" class="service-arrow-btn service-arrow-btn--paint" aria-label="Open PaintBot subpage"></a>

      <!-- Right Indicators on Hero (y=480..716 in 7923px canvas) -->
      <a href="<?php echo esc_url( $u_shop ); ?>" class="hero-ind-hitarea hero-ind-hitarea--shop" aria-label="Open SkipTheShop subpage"></a>
      <a href="<?php echo esc_url( $u_plan ); ?>" class="hero-ind-hitarea hero-ind-hitarea--plan" aria-label="Open DriveCarePlan subpage"></a>
      <a href="<?php echo esc_url( $u_paint ); ?>" class="hero-ind-hitarea hero-ind-hitarea--paint" aria-label="Open PaintBot subpage"></a>

      <!-- Official Site Button (y=1950..2030 in 7923px canvas) -->
      <a href="https://autodnaservice.com" target="_blank" rel="noopener" class="service-full-hitarea--official" aria-label="Visit AutoDNA Service official site"></a>

      <!-- ══ INTERACTIVE CATALOG GRID BUTTONS & LINKS (ROCK-SOLID SELF-CONTAINED HITAREAS) ═══ -->
      <!-- Column 1: Auto Services Header & 11 Items -->
      <a href="#price-reset" class="cat-grid-btn" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; top: 47.96%; width: 20.56%; height: 1.01%;" aria-label="Auto Services"></a>
      <a href="#price-reset" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 49.14%; height: 0.50%;" aria-label="Oil change ($29)"></a>
      <a href="#price-reset" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 49.67%; height: 0.50%;" aria-label="Tire Services &amp; Balancing ($69)"></a>
      <a href="#price-reset" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 50.20%; height: 0.50%;" aria-label="Wheel alignment ($79)"></a>
      <a href="#contact" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 50.73%; height: 0.50%;" aria-label="Check engine lights repair"></a>
      <a href="#contact" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 51.26%; height: 0.50%;" aria-label="Belts &amp; hoses"></a>
      <a href="#contact" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 51.79%; height: 0.50%;" aria-label="Lights / Wipers"></a>
      <a href="#price-reset" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 52.32%; height: 0.50%;" aria-label="AC / Heating Repair ($59)"></a>
      <a href="#contact" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 52.85%; height: 0.50%;" aria-label="Steering and Suspension"></a>
      <a href="#contact" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 53.38%; height: 0.50%;" aria-label="Car battery Replacement"></a>
      <a href="#contact" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 53.91%; height: 0.50%;" aria-label="Engine repair"></a>
      <a href="#contact" class="cat-grid-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 5.37%; width: 20.56%; top: 54.44%; height: 0.50%;" aria-label="Transmission repair"></a>

      <!-- Column 2: Inspections Header & 4 Items -->
      <a href="#price-reset" class="cat-grid-btn" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 28.29%; top: 47.96%; width: 20.56%; height: 1.01%;" aria-label="Inspections"></a>
      <a href="#price-reset" class="cat-grid-insp-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 28.29%; width: 20.56%; top: 49.14%; height: 0.54%;" aria-label="Mechanical inspection ($59)"></a>
      <a href="#contact" class="cat-grid-insp-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 28.29%; width: 20.56%; top: 49.71%; height: 0.54%;" aria-label="Insurance Inspection"></a>
      <a href="#contact" class="cat-grid-insp-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 28.29%; width: 20.56%; top: 50.28%; height: 0.54%;" aria-label="Out of Province Inspection"></a>
      <a href="#contact" class="cat-grid-insp-item" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 28.29%; width: 20.56%; top: 50.85%; height: 0.54%;" aria-label="Salvage Inspection"></a>

      <!-- Column 3: Remote Starters & Car Buying Assist -->
      <a href="#contact" class="cat-grid-btn" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 51.21%; top: 47.96%; width: 20.56%; height: 1.01%;" aria-label="Remote Starters installation"></a>
      <a href="<?php echo esc_url( $u_buy ); ?>" target="_blank" rel="noopener" class="cat-grid-btn" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 51.21%; top: 53.05%; width: 20.56%; height: 1.01%;" aria-label="Car Buying Assist (SkipTheDealer)"></a>

      <!-- Column 4: Towing / OnRoad & EV Service -->
      <a href="<?php echo esc_url( $c['tel'] ); ?>" class="cat-grid-btn" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 74.13%; top: 47.96%; width: 20.56%; height: 1.01%;" aria-label="Towing / OnRoad support"></a>
      <a href="#contact" class="cat-grid-btn" style="position: absolute; display: block; z-index: 35; cursor: pointer; left: 74.13%; top: 53.01%; width: 20.56%; height: 1.01%;" aria-label="EV / Electric cars service"></a>

      <!-- Target Anchors -->
      <div id="home" style="position: absolute; top: 0; left: 0;"></div>
      <div id="calgary-facility" style="position: absolute; top: 15%; left: 0;"></div>
      <div id="catalog-services" style="position: absolute; top: 40%; left: 0;"></div>
      <div id="price-reset" style="position: absolute; top: 60%; left: 0;"></div>
      <div id="fuel-refund" style="position: absolute; top: 72%; left: 0;"></div>
      <div id="team" style="position: absolute; top: 80%; left: 0;"></div>
      <div id="contact" style="position: absolute; bottom: 5%; left: 0;"></div>

      <!-- Contact Button (y=7470..7550 in 7923px canvas) -->
      <a href="#contact" class="service-full-hitarea--contact-btn" aria-label="Contact with us"></a>

      <!-- Interactive Footer Links -->
      <a href="<?php echo esc_url( $c['tel'] ); ?>" class="service-full-hitarea--phone" aria-label="Call <?php echo esc_attr( $c['phone'] ); ?>"></a>
      <a href="<?php echo esc_url( $c['mailto'] ); ?>" class="service-full-hitarea--email" aria-label="Email <?php echo esc_attr( $c['email'] ); ?>"></a>

      <div class="service-full-hitarea--socials">
        <a href="<?php echo esc_url( $c['fb'] ); ?>" target="_blank" rel="noopener" aria-label="Facebook"></a>
        <a href="<?php echo esc_url( $c['x'] ); ?>" target="_blank" rel="noopener" aria-label="X (Twitter)"></a>
        <a href="<?php echo esc_url( $c['ig'] ); ?>" target="_blank" rel="noopener" aria-label="Instagram"></a>
      </div>

      <a href="<?php echo esc_url( $c['maps'] ); ?>" target="_blank" rel="noopener" class="service-full-hitarea--address" aria-label="Find us on Google Maps"></a>
    </div>
  </div>

  <!-- ══ MOBILE SITE (100% Vector SVG from Figma 393x10228 - Stacked 3 Cards) ══ -->
  <div class="layout-mobile">
    <img src="<?php echo esc_url( adsvc_img( 'adsvc_home_mobile', 'img/dnaservice-mobile.svg' ) ); ?>" class="mobile-svg" alt="AutoDNA Service Mobile" fetchpriority="high">

    <!-- Interactive Mobile Service Cards -->
    <a href="<?php echo esc_url( $u_shop ); ?>" class="mob-hitarea mob-hitarea--card-shop" aria-label="SkipTheShop subpage"></a>
    <a href="<?php echo esc_url( $u_plan ); ?>" class="mob-hitarea mob-hitarea--card-plan" aria-label="DriveCarePlan subpage"></a>
    <a href="<?php echo esc_url( $u_paint ); ?>" class="mob-hitarea mob-hitarea--card-paint" aria-label="PaintBot subpage"></a>

    <!-- Interactive Mobile Hitareas -->
    <a href="https://autodnaservice.com" target="_blank" rel="noopener" class="mob-hitarea mob-hitarea--official" aria-label="Visit AutoDNA Service official site"></a>
    <a href="#contact" class="mob-hitarea mob-hitarea--contact-btn" aria-label="Contact with us"></a>
    <a href="<?php echo esc_url( $c['tel'] ); ?>" class="mob-hitarea mob-hitarea--phone" aria-label="Call <?php echo esc_attr( $c['phone'] ); ?>"></a>
    <a href="<?php echo esc_url( $c['mailto'] ); ?>" class="mob-hitarea mob-hitarea--email" aria-label="Email <?php echo esc_attr( $c['email'] ); ?>"></a>
    <a href="<?php echo esc_url( $c['maps'] ); ?>" target="_blank" rel="noopener" class="mob-hitarea mob-hitarea--address" aria-label="Find us on Google Maps"></a>
  </div>

</main>
    <?php
}

function autodna_service_section_shop() {
    $c      = adsvc_contact();
    $u_home = home_url( '/#multiple-services' );
    ?>
<main class="shop-main">
  <h1 class="sr-only">SkipTheShop™ — Your car goes to service. You don't.</h1>

  <!-- ══ DESKTOP BOARD (100% Vector SVG from Figma Skip the Shop.svg, 1440x4376) ══ -->
  <div class="shop-board shop-board--desktop">
    <img src="<?php echo esc_url( adsvc_img( 'adsvc_shop_desktop', 'img/skiptheshop-desktop-clean.svg' ) ); ?>" class="shop-svg" alt="SkipTheShop™ — Your car goes to service. You don’t." fetchpriority="high">

    <div id="how-it-works" style="position:absolute;top:15%;left:0;"></div>
    <!-- Interactive Top Button: Back to AutoDNA Service / Dropdown -->
    <a href="<?php echo esc_url( $u_home ); ?>" class="shop-hitarea shop-hitarea--top-btn" aria-label="Back to AutoDNA Service"></a>

    <!-- Interactive 2 Promise Cards Arrow Buttons [ ↗ ] -->
    <a href="#how-it-works" class="shop-hitarea shop-hitarea--promise-1" aria-label="Diagnostic live stream"></a>
    <a href="#how-it-works" class="shop-hitarea shop-hitarea--promise-2" aria-label="Partner car wash"></a>

    <!-- Interactive 5 Benefit Cards -->
    <div class="shop-hitarea shop-hitarea--benefit-1" tabindex="0" role="button" aria-label="No queues or trips"></div>
    <div class="shop-hitarea shop-hitarea--benefit-2" tabindex="0" role="button" aria-label="Professional service"></div>
    <div class="shop-hitarea shop-hitarea--benefit-3" tabindex="0" role="button" aria-label="Subscription option DriveCarePlan"></div>
    <div class="shop-hitarea shop-hitarea--benefit-4" tabindex="0" role="button" aria-label="Transparent communication"></div>
    <div class="shop-hitarea shop-hitarea--benefit-5" tabindex="0" role="button" aria-label="Convenient for busy people"></div>

    <!-- Interactive Footer Links -->
    <a href="<?php echo esc_url( $c['tel'] ); ?>" class="shop-hitarea shop-hitarea--phone" aria-label="Call <?php echo esc_attr( $c['phone'] ); ?>"></a>
    <a href="<?php echo esc_url( $c['mailto'] ); ?>" class="shop-hitarea shop-hitarea--email" aria-label="Email <?php echo esc_attr( $c['email'] ); ?>"></a>

    <div class="shop-hitarea shop-hitarea--socials">
      <a href="<?php echo esc_url( $c['fb'] ); ?>" target="_blank" rel="noopener" aria-label="Facebook"></a>
      <a href="<?php echo esc_url( $c['x'] ); ?>" target="_blank" rel="noopener" aria-label="X (Twitter)"></a>
      <a href="<?php echo esc_url( $c['ig'] ); ?>" target="_blank" rel="noopener" aria-label="Instagram"></a>
    </div>

    <a href="<?php echo esc_url( $c['maps'] ); ?>" target="_blank" rel="noopener" class="shop-hitarea shop-hitarea--address" aria-label="Find us on Google Maps"></a>
  </div>

  <!-- ══ MOBILE BOARD (100% Vector SVG from Figma SkipTheDealer mob-1.svg, 393x4597) ══ -->
  <div class="shop-board shop-board--mobile">
    <div id="how-it-works-mob" style="position:absolute;top:22%;left:0;"></div>
    <!-- ══ SWIPEABLE STEPS CAROUSEL (replaces baked-in single-step artwork) ══ -->
    <section class="steps" id="steps" data-steps style="--band-top:24.472%;--band-h:8.701%">
      <div class="steps__viewport" tabindex="0" role="region" aria-label="How it works steps">
        <div class="steps__track">
        <article class="steps__slide" data-index="0">
          <div class="steps__tab">STEP 1</div>
          <div class="steps__panel">
            <h3 class="steps__title">ORDER</h3>
            <span class="steps__rule" aria-hidden="true"></span>
            <p class="steps__desc">VIA WEBSITE, PHONE CALL,<br>OR APP—YOU CHOOSE THE<br>TIME AND THE SERVICE.</p>
          </div>
        </article>
        <article class="steps__slide" data-index="1">
          <div class="steps__tab">STEP 2</div>
          <div class="steps__panel">
            <h3 class="steps__title">PICKUP</h3>
            <span class="steps__rule" aria-hidden="true"></span>
            <p class="steps__desc">OUR CERTIFIED TECHNICIAN<br>ARRIVES AND PICKS UP<br>YOUR CAR.</p>
          </div>
        </article>
        <article class="steps__slide" data-index="2">
          <div class="steps__tab">STEP 3</div>
          <div class="steps__panel">
            <h3 class="steps__title">SERVICE</h3>
            <span class="steps__rule" aria-hidden="true"></span>
            <p class="steps__desc">REPAIR, DIAGNOSTICS, OR<br>DETAILING — EVERYTHING IS<br>DONE AT OUR AUTODNA.</p>
          </div>
        </article>
        <article class="steps__slide" data-index="3">
          <div class="steps__tab">STEP 4</div>
          <div class="steps__panel">
            <h3 class="steps__title">RETURN</h3>
            <span class="steps__rule" aria-hidden="true"></span>
            <p class="steps__desc">WE RETURN THE CAR CLEAN,<br>CHECKED, AND READY FOR<br>THE ROAD.</p>
          </div>
        </article>
        </div>
      </div>
      <div class="steps__dots" role="tablist" aria-label="Steps">
        <button class="steps__dot is-active" data-go="0" aria-label="Step 1"></button><button class="steps__dot" data-go="1" aria-label="Step 2"></button><button class="steps__dot" data-go="2" aria-label="Step 3"></button><button class="steps__dot" data-go="3" aria-label="Step 4"></button>
      </div>
    </section>

    <img src="<?php echo esc_url( adsvc_img( 'adsvc_shop_mobile', 'img/skiptheshop-mobile-clean.svg' ) ); ?>" class="shop-svg" alt="SkipTheShop Mobile" fetchpriority="high">

    <!-- Interactive Mobile Hitareas -->
    <a href="<?php echo esc_url( $u_home ); ?>" class="shop-mob-hitarea shop-mob-hitarea--top-btn" aria-label="Back to AutoDNA Service"></a>
    <a href="#how-it-works-mob" class="shop-mob-hitarea shop-mob-hitarea--promise-1" aria-label="Live diagnostic stream"></a>
    <a href="#how-it-works-mob" class="shop-mob-hitarea shop-mob-hitarea--promise-2" aria-label="Partner car wash"></a>
    <a href="<?php echo esc_url( $c['tel'] ); ?>" class="shop-mob-hitarea shop-mob-hitarea--phone" aria-label="Call <?php echo esc_attr( $c['phone'] ); ?>"></a>
    <a href="<?php echo esc_url( $c['mailto'] ); ?>" class="shop-mob-hitarea shop-mob-hitarea--email" aria-label="Email <?php echo esc_attr( $c['email'] ); ?>"></a>
    <a href="<?php echo esc_url( $c['maps'] ); ?>" target="_blank" rel="noopener" class="shop-mob-hitarea shop-mob-hitarea--address" aria-label="Find us on Google Maps"></a>
  </div>

</main>
    <?php
}

function autodna_service_section_plan() {
    $c      = adsvc_contact();
    $u_home = home_url( '/#multiple-services' );
    ?>
<main class="plan-main">
  <h1 class="sr-only">DriveCarePlan™ — Stay Informed. Stay Ahead.</h1>

  <!-- ══ DESKTOP BOARD (100% Vector SVG from Figma DriveCarePlan.svg, 1440x3923) ══ -->
  <div class="plan-board plan-board--desktop">
    <img src="<?php echo esc_url( adsvc_img( 'adsvc_plan_desktop', 'img/drivecareplan-desktop-clean.svg' ) ); ?>" class="plan-svg" alt="DriveCarePlan™ — Stay Informed. Stay Ahead." fetchpriority="high">

    <!-- Interactive Top Button: Back to AutoDNA Service / Dropdown -->
    <a href="<?php echo esc_url( $u_home ); ?>" class="plan-hitarea plan-hitarea--top-btn" aria-label="Back to AutoDNA Service"></a>

    <!-- Interactive Table Rows -->
    <div class="plan-hitarea plan-hitarea--table-row plan-hitarea--row-1" tabindex="0" role="button" aria-label="24/7 Telematics Monitoring"></div>
    <div class="plan-hitarea plan-hitarea--table-row plan-hitarea--row-2" tabindex="0" role="button" aria-label="Automatic Error Notifications"></div>
    <div class="plan-hitarea plan-hitarea--table-row plan-hitarea--row-3" tabindex="0" role="button" aria-label="Driving and Efficiency Analytics"></div>
    <div class="plan-hitarea plan-hitarea--table-row plan-hitarea--row-4" tabindex="0" role="button" aria-label="Mileage and Scheduled Maintenance Reminders"></div>
    <div class="plan-hitarea plan-hitarea--table-row plan-hitarea--row-5" tabindex="0" role="button" aria-label="Low Fuel Concierge"></div>
    <div class="plan-hitarea plan-hitarea--table-row plan-hitarea--row-6" tabindex="0" role="button" aria-label="Priority Service"></div>
    <div class="plan-hitarea plan-hitarea--table-row plan-hitarea--row-7" tabindex="0" role="button" aria-label="Free Pickup & Return"></div>
    <div class="plan-hitarea plan-hitarea--table-row plan-hitarea--row-8" tabindex="0" role="button" aria-label="Monthly Technical Report"></div>

    <!-- Interactive Footer Links -->
    <a href="<?php echo esc_url( $c['tel'] ); ?>" class="plan-hitarea plan-hitarea--phone" aria-label="Call <?php echo esc_attr( $c['phone'] ); ?>"></a>
    <a href="<?php echo esc_url( $c['mailto'] ); ?>" class="plan-hitarea plan-hitarea--email" aria-label="Email <?php echo esc_attr( $c['email'] ); ?>"></a>

    <div class="plan-hitarea plan-hitarea--socials">
      <a href="<?php echo esc_url( $c['fb'] ); ?>" target="_blank" rel="noopener" aria-label="Facebook"></a>
      <a href="<?php echo esc_url( $c['x'] ); ?>" target="_blank" rel="noopener" aria-label="X (Twitter)"></a>
      <a href="<?php echo esc_url( $c['ig'] ); ?>" target="_blank" rel="noopener" aria-label="Instagram"></a>
    </div>

    <a href="<?php echo esc_url( $c['maps'] ); ?>" target="_blank" rel="noopener" class="plan-hitarea plan-hitarea--address" aria-label="Find us on Google Maps"></a>
  </div>

  <!-- ══ MOBILE BOARD WITH INTERACTIVE HORIZONTALLY SCROLLABLE TABLE ══════ -->
  <div class="plan-board plan-board--mobile">

    <!-- 1. Top Section (Hero, Intro, Office Photos) -->
    <div class="mob-plan-top">
      <img src="<?php echo esc_url( adsvc_img( 'adsvc_plan_mob_top', 'img/drivecareplan-mob-top.svg' ) ); ?>" class="plan-svg" alt="DriveCarePlan Mobile" fetchpriority="high">
      <a href="<?php echo esc_url( $u_home ); ?>" class="plan-mob-hitarea plan-mob-hitarea--top-btn" aria-label="Back to AutoDNA Service"></a>
    </div>

    <!-- 2. Interactive Scrollable Table with Left & Right Arrows -->
    <div class="mob-plan-table-container">
      <div class="mob-table-nav">
        <button type="button" class="mob-table-btn mob-table-btn--prev ticks" id="table-btn-prev" aria-label="Scroll left">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none">
            <path d="M19 12H5M5 12L11 6M5 12L11 18" stroke="#C2B9FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>

        <div class="mob-table-hint">
          <span>⇄ SWIPE OR USE ARROWS</span>
        </div>

        <button type="button" class="mob-table-btn mob-table-btn--next ticks" id="table-btn-next" aria-label="Scroll right">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <svg viewBox="0 0 24 24" width="22" height="22" fill="none">
            <path d="M5 12H19M19 12L13 6M19 12L13 18" stroke="#C2B9FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>

      <div class="mob-table-scroll-track" id="mob-table-scroll" tabindex="0" role="region" aria-label="Specifications Table">
        <img src="<?php echo esc_url( adsvc_img( 'adsvc_plan_mob_table', 'img/drivecareplan-mob-table.svg' ) ); ?>" class="mob-table-svg" alt="DriveCarePlan Specifications Table">
      </div>
    </div>

    <!-- 3. Bottom Section (See Problems Before They Happen + 3 Cars + Footer) -->
    <div class="mob-plan-bottom">
      <img src="<?php echo esc_url( adsvc_img( 'adsvc_plan_mob_bottom', 'img/drivecareplan-mob-bottom.svg' ) ); ?>" class="plan-svg" alt="DriveCarePlan Footer" loading="lazy">
      <a href="<?php echo esc_url( $c['tel'] ); ?>" class="plan-mob-hitarea plan-mob-hitarea--phone" aria-label="Call <?php echo esc_attr( $c['phone'] ); ?>"></a>
      <a href="<?php echo esc_url( $c['mailto'] ); ?>" class="plan-mob-hitarea plan-mob-hitarea--email" aria-label="Email <?php echo esc_attr( $c['email'] ); ?>"></a>
      <a href="<?php echo esc_url( $c['maps'] ); ?>" target="_blank" rel="noopener" class="plan-mob-hitarea plan-mob-hitarea--address" aria-label="Find us on Google Maps"></a>
    </div>

  </div>

</main>

<script>
  // Mobile Table Horizontal Smooth Scroller with Interactive Left & Right Arrows
  (function() {
    const scrollTrack = document.querySelector('#mob-table-scroll');
    const btnPrev = document.querySelector('#table-btn-prev');
    const btnNext = document.querySelector('#table-btn-next');
    if (!scrollTrack || !btnPrev || !btnNext) return;

    function updateArrows() {
      const maxScroll = scrollTrack.scrollWidth - scrollTrack.clientWidth;
      btnPrev.style.opacity = scrollTrack.scrollLeft <= 5 ? '0.35' : '1';
      btnNext.style.opacity = scrollTrack.scrollLeft >= maxScroll - 5 ? '0.35' : '1';
    }

    btnPrev.addEventListener('click', function() {
      scrollTrack.scrollBy({ left: -340, behavior: 'smooth' });
    });

    btnNext.addEventListener('click', function() {
      scrollTrack.scrollBy({ left: 340, behavior: 'smooth' });
    });

    scrollTrack.addEventListener('scroll', updateArrows, { passive: true });
    window.addEventListener('resize', updateArrows);
    updateArrows();
  })();
</script>
    <?php
}

function autodna_service_section_paint() {
    $c      = adsvc_contact();
    $u_home = home_url( '/#multiple-services' );
    ?>
<main class="paintbot-main">
  <h1 class="sr-only">PaintBot™ — Meet the Robot that Paints.</h1>

  <!-- ══ DESKTOP BOARD (100% Vector SVG from Figma PaintBot™.svg, 1440x4606) ══ -->
  <div class="paintbot-board paintbot-board--desktop">
    <img src="<?php echo esc_url( adsvc_img( 'adsvc_paint_desktop', 'img/paintbot-clean.svg' ) ); ?>" class="paintbot-svg" alt="PaintBot™ — Meet the Robot that Paints." fetchpriority="high">

    <!-- Interactive Top Button: Back to AutoDNA Service / Dropdown -->
    <a href="<?php echo esc_url( $u_home ); ?>" class="paintbot-hitarea paintbot-hitarea--top-btn" aria-label="Back to AutoDNA Service"></a>

    <!-- Interactive Footer Links -->
    <a href="<?php echo esc_url( $c['tel'] ); ?>" class="paintbot-hitarea paintbot-hitarea--phone" aria-label="Call <?php echo esc_attr( $c['phone'] ); ?>"></a>
    <a href="<?php echo esc_url( $c['mailto'] ); ?>" class="paintbot-hitarea paintbot-hitarea--email" aria-label="Email <?php echo esc_attr( $c['email'] ); ?>"></a>

    <div class="paintbot-hitarea paintbot-hitarea--socials">
      <a href="<?php echo esc_url( $c['fb'] ); ?>" target="_blank" rel="noopener" aria-label="Facebook"></a>
      <a href="<?php echo esc_url( $c['x'] ); ?>" target="_blank" rel="noopener" aria-label="X (Twitter)"></a>
      <a href="<?php echo esc_url( $c['ig'] ); ?>" target="_blank" rel="noopener" aria-label="Instagram"></a>
    </div>

    <a href="<?php echo esc_url( $c['maps'] ); ?>" target="_blank" rel="noopener" class="paintbot-hitarea paintbot-hitarea--address" aria-label="Find us on Google Maps"></a>
  </div>

  <!-- ══ MOBILE BOARD (100% Vector SVG from Figma SkipTheDealer mob-4.svg, 393x4537) ══ -->
  <div class="paintbot-board paintbot-board--mobile">
    <!-- ══ SWIPEABLE STEPS CAROUSEL (replaces baked-in single-step artwork) ══ -->
    <section class="steps" id="steps" data-steps style="--band-top:53.780%;--band-h:8.376%">
      <div class="steps__viewport" tabindex="0" role="region" aria-label="How it works steps">
        <div class="steps__track">
        <article class="steps__slide" data-index="0">
          <div class="steps__tab">STEP 1</div>
          <div class="steps__panel">
            <h3 class="steps__title">3D SCANNING</h3>
            <span class="steps__rule" aria-hidden="true"></span>
            <p class="steps__desc">3D BODY SCANNING<br>(LASER MAPPING)</p>
          </div>
        </article>
        <article class="steps__slide" data-index="1">
          <div class="steps__tab">STEP 2</div>
          <div class="steps__panel">
            <h3 class="steps__title">TRAJECTORY PLANNING</h3>
            <span class="steps__rule" aria-hidden="true"></span>
            <p class="steps__desc">AUTOMATIC PLANNING OF<br>THE PAINTING TRAJECTORY</p>
          </div>
        </article>
        <article class="steps__slide" data-index="2">
          <div class="steps__tab">STEP 3</div>
          <div class="steps__panel">
            <h3 class="steps__title">PRECISION PAINTING</h3>
            <span class="steps__rule" aria-hidden="true"></span>
            <p class="steps__desc">THE ROBOT APPLIES PAINT<br>WITH MICRON-LEVEL PRECISION</p>
          </div>
        </article>
        </div>
      </div>
      <div class="steps__dots" role="tablist" aria-label="Steps">
        <button class="steps__dot is-active" data-go="0" aria-label="Step 1"></button><button class="steps__dot" data-go="1" aria-label="Step 2"></button><button class="steps__dot" data-go="2" aria-label="Step 3"></button>
      </div>
    </section>

    <img src="<?php echo esc_url( adsvc_img( 'adsvc_paint_mobile', 'img/paintbot-mobile-clean.svg' ) ); ?>" class="paintbot-svg" alt="PaintBot Mobile" fetchpriority="high">

    <!-- Interactive Mobile Hitareas -->
    <a href="<?php echo esc_url( $u_home ); ?>" class="paintbot-mob-hitarea paintbot-mob-hitarea--top-btn" aria-label="Back to AutoDNA Service"></a>
    <a href="<?php echo esc_url( $c['tel'] ); ?>" class="paintbot-mob-hitarea paintbot-mob-hitarea--phone" aria-label="Call <?php echo esc_attr( $c['phone'] ); ?>"></a>
    <a href="<?php echo esc_url( $c['mailto'] ); ?>" class="paintbot-mob-hitarea paintbot-mob-hitarea--email" aria-label="Email <?php echo esc_attr( $c['email'] ); ?>"></a>
    <a href="<?php echo esc_url( $c['maps'] ); ?>" target="_blank" rel="noopener" class="paintbot-mob-hitarea paintbot-mob-hitarea--address" aria-label="Find us on Google Maps"></a>
  </div>

</main>
    <?php
}

<?php
/**
 * Template Name: AutoDNA - Home Page (Site 1)
 */

get_header(); ?>

<main id="home">

<!-- ══ 1. HERO 0–810 ═════════════════════════════════════════════════════ -->
<section class="hero" aria-label="Intro">
  <img class="hero__bg" src=\"<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/hero-ground.svg' ); ?>\" alt="" aria-hidden="true">
  <div class="hero__frame">
    <div class="hero__triptych ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <img src=\"<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/hero-trio.jpg' ); ?>\" alt="Pickup, Honda crossover and Tesla side by side" fetchpriority="high">
    </div>
    <h1 class="hero__word">the genetic code</h1>
    <p class="hero__sub hero__sub--l">to <em>your</em><br><span>car</span></p>
    <p class="hero__sub hero__sub--r">has <em>already</em><br>been found</p>
    <svg class="hero__elbow" viewBox="0 0 265 50" preserveAspectRatio="none" aria-hidden="true">
      <path d="M0 49.5H150.7L191.12 0H265.24"/>
    </svg>
    <nav class="rail" aria-label="Explore">
      <a href="#services"><span>Explore</span>SkipTheDealer</a>
      <a href="#services">AutoDNA<br>Flip</a>
      <a href="#services">AutoDNA<br>Service</a>
    </nav>
  </div>
</section>

<!-- ══ 2. CARLEARS 810–1790 ══════════════════════════════════════════════ -->
<section class="carlears" id="carlears" aria-label="Carlears">
  <p class="carlears__lede">We’re starting</p>
  <p class="carlears__new">a <em>new</em> slang term</p>
  <h2 class="carlears__word" aria-label="carlears">carlears</h2>
  <div class="carlears__grid">
    <article class="clr-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>High quality</h3>
      <p>A higher level of quality you can trust at an affordable price</p>
    </article>
    <article class="clr-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>Wide choice</h3>
      <p>A great selection of cars to match every lifestyle and need</p>
    </article>
    <article class="clr-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>Save more</h3>
      <p>A smarter way to save money without compromising on quality</p>
    </article>
    <article class="clr-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>True value</h3>
      <p>A real value that gives you confidence and satisfaction every time</p>
    </article>
  </div>
</section>

<!-- ══ 3. VALUE 1790–2830 ════════════════════════════════════════════════ -->
<section class="value" id="value" aria-label="Why AutoDNA">
  <h2 class="value__title">Imagine buying a<br>car from a dealer —<br><em>but paying the same price you’d pay a private seller.</em></h2>
  <svg class="value__fan" viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
    <path d="M200 0 L360 120 M520 0 L560 120 M720 0 L720 120 M920 0 L880 120 M1240 0 L1080 120"/>
  </svg>
  <div class="value__grid">
    <div><h3>No Surprises</h3><p>No hidden fees. No surprises. We cover the GST ourselves.</p></div>
    <div><h3>Affordable Dealer Prices</h3><p>Buying from a dealer can be just as affordable as buying privately.</p></div>
    <div><h3>Changing the Game</h3><p>Calgary has never seen this before. We put the customer first.</p></div>
    <div><h3>Flexible Options</h3><p>Flexible financing and an extended warranty from our partners.</p></div>
    <div><h3>Real Value</h3><p>Zero profit for us — just fair prices and peace of mind for you.</p></div>
  </div>
</section>

<!-- ══ 4. COMPARE 2830–3820 ══════════════════════════════════════════════ -->
<section class="compare" id="compare" aria-label="Price comparison">
  <div class="compare__car">
    <img src=\"<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/corolla.jpg' ); ?>\" alt="Toyota Corolla Hatchback 2021">
    <p class="compare__badge">Toyota Corolla Hatchback 2021</p>
  </div>
  <h2 class="compare__title">Price Comparison</h2>
  <p class="compare__mirror" aria-hidden="true">Price Comparison</p>
  <div class="compare__tabs" role="tablist" aria-label="Seller">
    <button role="tab" aria-selected="false" data-col="dealer">Dealers</button>
    <button role="tab" aria-selected="false" data-col="market">Marketplace</button>
    <button role="tab" aria-selected="true" data-col="dna">AutoDNA</button>
  </div>
  <div class="compare__wrap">
    <table class="compare__table">
      <thead><tr><th>Option</th><th>Price</th><th>Features</th><th>Cons</th></tr></thead>
      <tbody>
        <tr data-col="dealer"><th>Dealers</th><td>$23,000 + GST</td><td>Dealer purchase</td><td>Higher price, GST extra</td></tr>
        <tr data-col="market"><th>Marketplace</th><td>$21,000</td><td>Lower price</td><td>Car not inspected, potential issues, no warranty</td></tr>
        <tr data-col="dna" class="is-lit"><th>AutoDNA</th><td>$21,000 (GST included)</td><td>Full inspection completed, 3-year paid warranty, financing available</td><td>None — all value included</td></tr>
      </tbody>
    </table>
  </div>
</section>

<!-- ══ 5. SERVICES 3820–4790 ═════════════════════════════════════════════ -->
<section class="services" id="services" aria-label="Services">
  <h2 class="services__title">Services</h2>
  <div class="services__grid">
    <button class="svc is-active" data-svc="dealer">
      <img src=\"<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/service-dealer.jpg' ); ?>\" alt="">
      <span class="svc__name">SkipTheDealers</span>
      <span class="svc__more">Auction cars without the auction risk →</span>
    </button>
    <button class="svc" data-svc="flip">
      <img src=\"<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/service-flip.jpg' ); ?>\" alt="">
      <span class="svc__name">AutoDNA Flip</span>
      <span class="svc__more">Turn vehicles into valuable assets. We help you invest wisely in high-demand cars →</span>
    </button>
    <button class="svc" data-svc="service">
      <img src=\"<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/service-service.jpg' ); ?>\" alt="">
      <span class="svc__name">AutoDNA Service</span>
      <span class="svc__more">A next-generation automotive center, equipped with innovation →</span>
    </button>
  </div>
</section>

<!-- ══ 6. FACTS 4790–5430 ════════════════════════════════════════════════ -->
<section class="facts" id="facts" aria-label="Facts and figures">
  <div class="fact"><p class="fact__n">12</p><p class="fact__l">Years of<br>experience</p><p class="fact__t">Auto experts with a decade of auction wins.</p></div>
  <div class="fact"><p class="fact__n">10+</p><p class="fact__l">Cars in stock</p><p class="fact__t">Fresh auction picks every week.</p></div>
  <div class="fact"><p class="fact__n">30-50%</p><p class="fact__l">Save 30-50%</p><p class="fact__t">Below dealer sticker, every time.</p></div>
  <div class="fact"><p class="fact__n">450+</p><p class="fact__l">Happy clients</p><p class="fact__t">Drivers who skipped the dealer.</p></div>
  <div class="fact"><p class="fact__n">4.9</p><p class="fact__l">Average rating</p><p class="fact__t">From verified buyer reviews.</p></div>
</section>

<!-- ══ 7. CORPORATE 5430–6630 ════════════════════════════════════════════ -->
<section class="corporate" id="corporate" aria-label="About AutoDNA">
  <p class="corporate__dna" aria-hidden="true">DNA</p>
  <div class="corporate__top">
    <p class="corporate__about">AutoDNA is the parent corporation that brings together SkipTheDealer, AutoDNA&nbsp;Service, and other companies.</p>
    <aside class="corporate__card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <p>We play by new rules — and this is just the beginning.</p>
    </aside>
  </div>
  <figure class="corporate__photo ticks">
    <span class="tick tl"></span><span class="tick tr"></span>
    <span class="tick bl"></span><span class="tick br"></span>
    <img src=\"<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/building.jpg' ); ?>\" alt="DNA Auto dealership building in Calgary">
  </figure>
  <p class="corporate__plan">Over the next two years, we plan to create a complete automotive hub for car enthusiasts, offering all kinds of services and entertainment for our clients.</p>
</section>

<!-- ══ 8. CLUB 6630–7580 ═════════════════════════════════════════════════ -->
<section class="club" id="club" aria-label="DNA Auto Club">
  <p class="club__lede">Join DNA Auto Club and get more than just service.</p>
  <h2 class="club__title">Auto Club</h2>
  <div class="club__grid">
    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>Service</h3><p class="club-card__big">30% <small>off any work.</small></p>
      <p>The lowest prices in Calgary for bodywork, mechanics, and painting.</p>
    </article>
    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>Carwash</h3><p class="club-card__big">Every second wash <small>is free</small></p>
      <p>Modern automatic carwash that preserves your car’s coating.</p>
    </article>
    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>Wheel Alignment</h3><p class="club-card__big">$70 <small>market price $150</small></p>
      <p>State-of-the-art equipment with automatic adjustment.</p>
    </article>
    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>Tire Change</h3><p class="club-card__big">$60 <small>market price - $120</small></p>
      <p>Any wheel repair, seasonal tire replacement, and free tire storage.</p>
    </article>
  </div>
  <p class="club__out">Real benefits, real savings — made for drivers like you.</p>
</section>

<!-- ══ 9. COMMUNITY 7580–8240 ════════════════════════════════════════════ -->
<section class="community" aria-label="Community">
  <h2 class="community__title">We don’t <em>just</em> sell cars.</h2>
  <figure class="community__photo ticks">
    <span class="tick tl"></span><span class="tick tr"></span>
    <span class="tick bl"></span><span class="tick br"></span>
    <img src=\"<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/community-trio.jpg' ); ?>\" alt="Three groups of happy AutoDNA customers with their cars">
  </figure>
  <p class="community__sub"><span>We’re building a community where</span> every customer gets more than they expect.</p>
</section>

<!-- ══ 10. FOOTER 8240–8554 ══════════════════════════════════════════════ -->
<footer class="foot" id="contact">
  <div class="foot__grid">
    <div><h3>Contact us</h3><a href="tel:+14033128306">+1 (403) 312-8306</a><a href="mailto:info@autodna.com">info@autodna.com</a></div>
    <div><h3>Follow us</h3><p class="foot__social"><a href="#" aria-label="Facebook">f</a><a href="#" aria-label="X">x</a><a href="#" aria-label="Instagram">ig</a></p></div>
    <div><h3>Find us</h3><p>730 2 Ave SW,<br>Calgary, T2P1R8,<br>Canada</p></div>
  </div>
  <p class="foot__legal">© 2025 AutoDNA Canada. All rights reserved.</p>
</footer>

</main>

<?php get_footer(); ?>

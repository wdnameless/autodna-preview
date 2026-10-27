<?php
/**
 * Template Name: AutoDNA - Home Page (Site 1)
 */

get_header(); ?>

<main id="home">

<!-- ══ 1. HERO ═════════════════════════════════════════════════════════════ -->
<section class="hero" aria-label="Intro">
  <img class="hero__bg" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/hero-ground.jpg" alt="" aria-hidden="true" fetchpriority="high">
  <div class="hero__shade hero__shade--top" aria-hidden="true"></div>
  <div class="hero__shade hero__shade--bottom" aria-hidden="true"></div>
  <div class="hero__frame">
    <div class="hero__triptych">
      <svg class="hero__ticks" viewBox="330 167 776 416" preserveAspectRatio="none" aria-hidden="true"><path d="M340.219 190.684V177.352H353.551M1096.19 190.684V177.351H1082.86M353.551 572.609H340.219V559.277M1082.86 572.609H1096.19V559.277"/></svg>
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/hero-trio.jpg" alt="Pickup, Honda crossover and Tesla side by side" fetchpriority="high">
    </div>
    <h1 class="hero__word">the genetic code</h1>
    <p class="hero__sub hero__sub--l">to&nbsp;&nbsp;your<br>car</p>
    <p class="hero__sub hero__sub--r">has&nbsp;&nbsp;&nbsp;&nbsp;<em>already</em><br>been found</p>
    <svg class="hero__elbow" viewBox="480 615 265 50" preserveAspectRatio="none" aria-hidden="true">
      <path d="M479.781 664.905H630.487L670.902 615.441H744.829"/>
    </svg>
    <a class="hero__cta" href="#services">Explore our services ↘</a>
    <nav class="rail" aria-label="Explore">
      <svg class="rail__vectors" viewBox="0 0 265.05 228.03" preserveAspectRatio="none" aria-hidden="true">
        <path class="rail__line rail__line--1" d="M0 67.465H150.71L191.12 18.002H265.05"/>
        <path class="rail__arrow-svg rail__arrow-svg--1" d="M257.05 8.002L265.05 0M257.05 0H265.05V8.002" stroke-linecap="round" stroke-linejoin="round"/>
        <path class="rail__line rail__line--2" d="M0 92.836H150.7L191.12 142.299H265.05"/>
        <path class="rail__arrow-svg rail__arrow-svg--2" d="M257.04 125.034L265.04 133.034M257.04 133.034H265.04V125.034" stroke-linecap="round" stroke-linejoin="round"/>
        <path class="rail__line rail__line--3" d="M0 228.026H150.7L191.12 178.562H265.05"/>
        <path class="rail__arrow-svg rail__arrow-svg--3" d="M257.05 168.562L265.05 160.562M257.05 160.562H265.05V168.562" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <a href="#services" class="rail__link rail__link--1">
        <span>Explore</span>
        <span>SkipTheDealer</span>
      </a>
      <a href="#services" class="rail__link rail__link--2">
        <span>AutoDNA</span>
        <span>Flip</span>
      </a>
      <a href="#services" class="rail__link rail__link--3">
        <span>AutoDNA Service</span>
      </a>
    </nav>
  </div>
  <figure class="hero__quote">
    <svg class="hero__quote-ticks" viewBox="340 870 760 335" preserveAspectRatio="none" aria-hidden="true"><path d="M342.016 883.61V870.277H355.348M1097.98 883.61V870.277H1084.65M355.348 1203.15H342.016V1189.82M1084.65 1203.15H1097.98V1189.82"/></svg>
    <blockquote>We don’t call ourselves a dealer, we don’t like that word.</blockquote>
    <span class="hero__quote-line" aria-hidden="true"></span>
  </figure>
</section>

<!-- ══ 2. CARLEARS ══════════════════════════════════════════════════════ -->
<section class="carlears" id="carlears" aria-label="Carlears">
  <div class="carlears__top-block">
    <svg class="carlears__ticks" viewBox="0 0 756 333" preserveAspectRatio="none" aria-hidden="true">
      <path d="M0 13.3V0H13.3 M756 13.3V0H742.7 M0 319.7V333H13.3 M756 319.7V333H742.7" stroke="#C2B9FF" fill="none" stroke-width="1"/>
    </svg>
    <figure class="carlears__quote">
      <blockquote>We don’t call ourselves a dealer, we don’t like that word.</blockquote>
      <span class="carlears__quote-line" aria-hidden="true"></span>
    </figure>
    <p class="carlears__lede">
      <span>We’re starting</span>
      <span>a <em class="carlears__new-badge">new</em> slang term</span>
    </p>
    <div class="carlears__word-wrap">
      <span class="carlears__flank carlears__flank--l" aria-hidden="true"></span>
      <h2 class="carlears__word" aria-label="carlears">carlears</h2>
      <span class="carlears__flank carlears__flank--r" aria-hidden="true"></span>
    </div>
  </div>

  <div class="carlears__grid">
    <article class="clr-card">
      <svg class="clr-card__ticks" viewBox="0 0 289 291" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 18.8V0H18.8 M289 18.8V0H270.2 M0 272.2V291H18.8 M289 272.2V291H270.2" stroke="#C2B9FF" fill="none" stroke-width="1"/>
      </svg>
      <h3>High quality</h3>
      <p>A higher level of quality you can trust at an affordable price</p>
    </article>
    <article class="clr-card">
      <svg class="clr-card__ticks" viewBox="0 0 289 291" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 18.8V0H18.8 M289 18.8V0H270.2 M0 272.2V291H18.8 M289 272.2V291H270.2" stroke="#C2B9FF" fill="none" stroke-width="1"/>
      </svg>
      <h3>Wide choice</h3>
      <p>A great selection of cars to match every lifestyle and need</p>
    </article>
    <article class="clr-card">
      <svg class="clr-card__ticks" viewBox="0 0 289 291" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 18.8V0H18.8 M289 18.8V0H270.2 M0 272.2V291H18.8 M289 272.2V291H270.2" stroke="#C2B9FF" fill="none" stroke-width="1"/>
      </svg>
      <h3>Save more</h3>
      <p>A smarter way to save money without compromising on quality</p>
    </article>
    <article class="clr-card">
      <svg class="clr-card__ticks" viewBox="0 0 289 291" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 18.8V0H18.8 M289 18.8V0H270.2 M0 272.2V291H18.8 M289 272.2V291H270.2" stroke="#C2B9FF" fill="none" stroke-width="1"/>
      </svg>
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
  <div class="compare__top">
    <div class="compare__car">
      <p class="compare__badge">Toyota Corolla<br>Hatchback 2021</p>
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/corolla.jpg' ); ?>" alt="Toyota Corolla Hatchback 2021">
    </div>
    <h2 class="compare__title">Price<br>Comparison</h2>
  </div>
  <p class="compare__mirror" aria-hidden="true">Price<br>Comparison</p>
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
  <figure class="services__pano ticks">
    <span class="tick tl"></span><span class="tick tr"></span>
    <span class="tick bl"></span><span class="tick br"></span>
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/services-hall.jpg' ); ?>" alt="AutoDNA team with three cars in the violet hall">
  </figure>
  <div class="services__grid">
    <button class="svc is-active" data-svc="dealer">
      <span class="svc__name">SkipTheDealers</span>
      <span class="svc__more">Find, bid, and buy the best vehicles directly from trusted car auctions. Smart, transparent, and hassle-free — we handle the process from search to delivery. →</span>
    </button>
    <button class="svc" data-svc="flip">
      <span class="svc__name">AutoDNA Flip</span>
      <span class="svc__more">Turn vehicles into valuable assets. We help you invest wisely in high-demand cars and maximize your returns through strategic resale. →</span>
    </button>
    <button class="svc" data-svc="service">
      <span class="svc__name">AutoDNA Service</span>
      <span class="svc__more">AutoDNA Service is a next-generation automotive center, equipped with innovative technology, a modern minimalist and spotless interior. →</span>
    </button>
  </div>
</section>

<!-- ══ 6. FACTS 4790–5430 ════════════════════════════════════════════════ -->
<section class="facts" id="facts" aria-label="Facts and figures">
  <div class="fact fact--a ticks"><span class="tick tl"></span><span class="tick tr"></span><span class="tick bl"></span><span class="tick br"></span><p class="fact__n">12</p><p class="fact__l">Stages of Inspection</p><p class="fact__t">We test, verify, and only then hand over the keys. Real inspection — not intuition.</p></div>
  <div class="fact fact--b ticks"><span class="tick tl"></span><span class="tick tr"></span><span class="tick bl"></span><span class="tick br"></span><p class="fact__n">10+</p><p class="fact__l">Years in the Industry</p><p class="fact__t">We’ve seen it all — and that’s why we do it right. It’s in our DNA.</p></div>
  <div class="fact fact--c ticks"><span class="tick tl"></span><span class="tick tr"></span><span class="tick bl"></span><span class="tick br"></span><p class="fact__n">450+</p><p class="fact__l">Clients Said “Wow!”</p><p class="fact__t">And new ones join every week. Every car is a story — and our client is always the main character.</p></div>
  <div class="fact fact--d ticks"><span class="tick tl"></span><span class="tick tr"></span><span class="tick bl"></span><span class="tick br"></span><p class="fact__n">3-4</p><p class="fact__l">Weeks — Faster Than You Expect</p><p class="fact__t">An optimized process — no delays, no surprises. Search, preparation, and the car is yours.</p></div>
  <div class="fact fact--e ticks"><span class="tick tl"></span><span class="tick tr"></span><span class="tick bl"></span><span class="tick br"></span><p class="fact__k">Save</p><p class="fact__n">30-50%</p><p class="fact__t">Overpaying isn’t our style — auctions let you save big.</p></div>
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
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/building.jpg' ); ?>" alt="DNA Auto dealership building in Calgary">
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
      <h3>Service</h3><p class="club-card__big">30%</p><p class="club-card__mid">off any work.</p>
      <p>The lowest prices in Calgary for bodywork, mechanics, and painting.</p>
    </article>
    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>Carwash</h3><p class="club-card__mid">every second wash</p><p class="club-card__big">is free</p>
      <p>Modern automatic carwash that preserves your car’s coating.</p>
    </article>
    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>Wheel Alignment</h3><p class="club-card__big">$70</p><p class="club-card__mid">market price $150</p>
      <p>State-of-the-art equipment with automatic adjustment.</p>
    </article>
    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>Tire Change</h3><p class="club-card__big">$60</p><p class="club-card__mid">market price - $120</p>
      <p>Any wheel repair, seasonal tire replacement, and free tire storage.</p>
    </article>
  </div>
  <p class="club__out">Real benefits, real savings — made for drivers like you.</p>
</section>

<!-- ══ 9. COMMUNITY 7580–8240 ════════════════════════════════════════════ -->
<section class="community" aria-label="Community">
  <h2 class="community__title">We<br>don’t<br><em>just</em><br>sell<br>cars.</h2>
  <figure class="community__photo ticks">
    <span class="tick tl"></span><span class="tick tr"></span>
    <span class="tick bl"></span><span class="tick br"></span>
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/community-trio.jpg' ); ?>" alt="AutoDNA community with five cars">
  </figure>
  <p class="community__sub"><span>We’re building a community where</span> every customer gets more than they expect.</p>
</section>

<!-- ══ 10. FOOTER 8240–8554 ══════════════════════════════════════════════ -->
<footer class="foot" id="contact">
  <div class="foot__grid">
    <div class="foot__col"><h3>Contact us</h3><a href="tel:+14033128306">+1 (403) 312-8306<svg viewBox="0 0 348 34" preserveAspectRatio="none" aria-hidden="true"><path d="M0 34H247L277 0H348"/></svg></a><a href="mailto:info@autodna.com">info@autodna.com<svg viewBox="0 0 348 34" preserveAspectRatio="none" aria-hidden="true"><path d="M0 34H247L277 0H348"/></svg></a></div>
    <div class="foot__col"><h3>Follow Us</h3><p class="foot__social"><a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 21v-7h2.4l.4-3h-2.8V9.1c0-.9.3-1.5 1.6-1.5h1.3V4.9c-.3 0-1.1-.1-2-.1-2 0-3.4 1.2-3.4 3.5V11H8.5v3H11v7h2.5Z"/></svg></a><a href="#" aria-label="X"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17.5 4h2.9l-6.4 7.3L21.5 20h-5.9l-4.6-6-5.3 6H2.8l6.9-7.8L2.5 4h6l4.2 5.5L17.5 4Zm-1 14.3h1.6L7.7 5.6H6L16.5 18.3Z"/></svg></a><a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 8.8A3.2 3.2 0 1 0 12 15.2 3.2 3.2 0 0 0 12 8.8Zm0-2.1a5.3 5.3 0 1 1 0 10.6 5.3 5.3 0 0 1 0-10.6Zm6.8-.3a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0ZM12 4.2c-2.5 0-2.8 0-3.8.1a5 5 0 0 0-1.7.3 3.4 3.4 0 0 0-2 2 5 5 0 0 0-.3 1.7c-.1 1-.1 1.3-.1 3.8s0 2.8.1 3.8a5 5 0 0 0 .3 1.7 3.4 3.4 0 0 0 2 2 5 5 0 0 0 1.7.3c1 .1 1.3.1 3.8.1s2.8 0 3.8-.1a5 5 0 0 0 1.7-.3 3.4 3.4 0 0 0 2-2 5 5 0 0 0 .3-1.7c.1-1 .1-1.3.1-3.8s0-2.8-.1-3.8a5 5 0 0 0-.3-1.7 3.4 3.4 0 0 0-2-2 5 5 0 0 0-1.7-.3c-1-.1-1.3-.1-3.8-.1Z"/></svg></a></p></div>
    <div class="foot__col"><h3>Find Us</h3><p>730 2 Ave SW, Calgary, T2P1R8, Canada<svg viewBox="0 0 348 34" preserveAspectRatio="none" aria-hidden="true"><path d="M0 34H247L277 0H348"/></svg></p></div>
  </div>
  <p class="foot__legal">© 2025 AutoDNA Canada. All rights reserved.</p>
</footer>

</main>

<?php get_footer(); ?>

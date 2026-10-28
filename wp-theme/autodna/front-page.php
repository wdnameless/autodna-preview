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
  <h2 class="value__title">Imagine buying a car from a dealer —<br><em>but paying the same price you’d pay a private seller.</em></h2>
  <svg class="value__fan" viewBox="0 2276 1440 283" preserveAspectRatio="xMidYMid meet" aria-hidden="true">
    <defs><linearGradient id="fanStroke" x1="0" y1="0" x2="1" y2="0"><stop offset="0" stop-color="#c2b9ff"/><stop offset="1" stop-color="#746f99"/></linearGradient></defs>
    <path d="M720 2276L144 2559M720 2276L433 2559M720 2276L720 2559M720 2276L1012 2559M720 2276L1301 2559"/>
  </svg>
  <div class="value__grid">
    <div><h3>No Surprises</h3><p>No hidden fees. No surprises. We cover the GST ourselves.</p></div>
    <div><h3>Affordable Dealer Prices</h3><p>Buying from a dealer can be just as affordable as buying privately.</p></div>
    <div><h3>Changing the Game</h3><p>Calgary has never seen this before. We put the customer first.</p></div>
    <div><h3>Flexible Options</h3><p>Flexible financing and an extended warranty from our partners.</p></div>
    <div><h3>Real Value</h3><p>Zero profit for us — just fair prices and peace of mind for you.</p></div>
  </div>
</section>

<!-- ══ 4. COMPARE ═══════════════════════════════════════════════════════ -->
<section class="compare" id="compare" aria-label="Price comparison">
  <div class="compare__stage">
    <!-- Callout badge + line -->
    <div class="compare__badge-box">
      <p class="compare__badge">
        <span>TOYOTA COROLLA</span>
        <span>HATCHBACK 2021</span>
      </p>
      <svg class="compare__badge-line" viewBox="0 0 391 50" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 0H200L240.4 49.5H390.8" stroke="#C2B9FF" fill="none" stroke-width="1"/>
      </svg>
    </div>

    <!-- Corolla photo -->
    <div class="compare__car">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/corolla.png" alt="Toyota Corolla Hatchback 2021" fetchpriority="low">
    </div>

    <!-- Big Orbitron Title behind table header -->
    <h2 class="compare__title" aria-label="Price Comparison">
      <span>PRICE</span>
      <span>COMPARISON</span>
    </h2>
  </div>

  <div class="compare__tabs" role="tablist" aria-label="Seller">
    <button role="tab" aria-selected="false" data-col="dealer">Dealers</button>
    <button role="tab" aria-selected="false" data-col="market">Marketplace</button>
    <button role="tab" aria-selected="true" data-col="dna">AutoDNA</button>
  </div>

  <div class="compare__wrap">
    <svg class="compare__table-ticks" viewBox="0 0 1388.5 520" preserveAspectRatio="none" aria-hidden="true">
      <path d="M0 18.8V0H18.8 M1388.5 18.8V0H1369.7 M0 501.2V520H18.8 M1388.5 501.2V520H1369.7" stroke="#C2B9FF" fill="none" stroke-width="1"/>
    </svg>
    <table class="compare__table">
      <thead>
        <tr>
          <th>Option</th>
          <th>Price</th>
          <th>Features</th>
          <th>Cons</th>
        </tr>
      </thead>
      <tbody>
        <tr data-col="dealer">
          <th>DEALERS</th>
          <td>$23,000 + GST</td>
          <td>Dealer purchase</td>
          <td>Higher price, GST extra</td>
        </tr>
        <tr data-col="market">
          <th>MARKETPLACE</th>
          <td>$21,000</td>
          <td>Lower price</td>
          <td>Car not inspected, potential issues, no warranty</td>
        </tr>
        <tr data-col="dna" class="is-lit">
          <th>AUTODNA</th>
          <td>$21,000<br><span class="compare__gst">(GST INCLUDED)</span></td>
          <td>Full inspection completed, 3-year paid warranty, financing available</td>
          <td class="compare__none">NONE — ALL VALUE INCLUDED</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<!-- ══ 5. SERVICES (Full-screen interactive panorama) ═══════════════════ -->
<section class="services" id="services" aria-label="Services">
  <!-- 3 Full-bleed background layers with crossfade on hover -->
  <div class="services__bg-layer services__bg-layer--1 is-active" aria-hidden="true" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/service-dealer-bg.jpg');"></div>
  <div class="services__bg-layer services__bg-layer--2" aria-hidden="true" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/service-flip-bg.jpg');"></div>
  <div class="services__bg-layer services__bg-layer--3" aria-hidden="true" style="background-image: url('<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/service-service-bg.jpg');"></div>

  <!-- Ambient dark gradient vignettes -->
  <div class="services__shade services__shade--top" aria-hidden="true"></div>
  <div class="services__shade services__shade--bottom" aria-hidden="true"></div>

  <div class="services__content">
    <h2 class="services__title">SERVICES</h2>

    <!-- 3 Interactive service columns at the bottom -->
    <div class="services__interactive-grid">
      <!-- Col 1: SkipTheDealers -->
      <div class="svc-col is-active" data-svc="1" tabindex="0" role="button" aria-expanded="true">
        <div class="svc-card ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <h3 class="svc-col__name">SkipTheDealers</h3>
          <p class="svc-col__desc">Find, bid, and buy the best vehicles directly from trusted car auctions. Smart, transparent, and hassle-free — we handle the process from search to delivery.</p>
        </div>
      </div>

      <!-- Col 2: AutoDNA Flip -->
      <div class="svc-col" data-svc="2" tabindex="0" role="button" aria-expanded="false">
        <div class="svc-card ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <h3 class="svc-col__name">AutoDNA Flip</h3>
          <p class="svc-col__desc">Turn vehicles into valuable assets. We help you invest wisely in high-demand cars and maximize your returns through strategic resale.</p>
        </div>
      </div>

      <!-- Col 3: AutoDNA Service -->
      <div class="svc-col" data-svc="3" tabindex="0" role="button" aria-expanded="false">
        <div class="svc-card ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <h3 class="svc-col__name">AutoDNA Service</h3>
          <p class="svc-col__desc">AutoDNA Service is a next-generation automotive center, equipped with innovative technology, a modern minimalist and spotless interior.</p>
        </div>
      </div>
    </div>
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
  <img class="corporate__dna" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/corporate-bg.svg" alt="" aria-hidden="true">
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
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/corporate-hall.jpg" alt="DNA Auto dealership building in Calgary">
  </figure>
  <p class="corporate__plan">Over the next two years, we plan to create a complete automotive hub for car enthusiasts, offering all kinds of services and entertainment for our clients.</p>
</section>

<!-- ══ 8. CLUB ═════════════════════════════════════════════════════════ -->
<section class="club" id="club" aria-label="DNA Auto Club">
  <div class="club__stage">
    <p class="club__lede">
      <span class="club__lede-row"><span>JOIN</span><span>DNA</span></span>
      <span class="club__lede-row"><span>AUTO</span><span>CLUB</span></span>
      <span class="club__lede-row"><span>AND</span><span>GET</span></span>
      <span class="club__lede-row"><span>MORE</span><span>THAN</span></span>
      <span class="club__lede-row"><span>JUST</span></span>
      <span class="club__lede-row"><span>SERVICE.</span></span>
    </p>
    <h2 class="club__title">AUTO CLUB</h2>
  </div>

  <div class="club__grid">
    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>SERVICE</h3>
      <div class="club-card__offer">
        <p class="club-card__big">30%</p>
        <p class="club-card__mid">OFF ANY WORK.</p>
      </div>
      <p class="club-card__desc">The lowest prices in Calgary for bodywork, mechanics, and painting.</p>
    </article>

    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>CARWASH</h3>
      <div class="club-card__offer">
        <p class="club-card__mid">EVERY<br>SECOND WASH</p>
        <p class="club-card__big">IS FREE</p>
      </div>
      <p class="club-card__desc">Modern automatic carwash that preserves your car’s coating.</p>
    </article>

    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>WHEEL<br>ALIGNMENT</h3>
      <div class="club-card__offer">
        <p class="club-card__big">$70</p>
        <p class="club-card__mid">MARKET PRICE<br>$150</p>
      </div>
      <p class="club-card__desc">State-of-the-art equipment with automatic adjustment.</p>
    </article>

    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3>TIRE CHANGE</h3>
      <div class="club-card__offer">
        <p class="club-card__big">$60</p>
        <p class="club-card__mid">MARKET PRICE<br>- $120</p>
      </div>
      <p class="club-card__desc">Any wheel repair, seasonal tire replacement, and free tire storage.</p>
    </article>
  </div>

  <p class="club__out">
    <span>REAL BENEFITS, REAL SAVINGS —</span>
    <span>MADE FOR DRIVERS LIKE YOU.</span>
  </p>
</section>

<!-- ══ 9. COMMUNITY & FOOTER ═══════════════════════════════════════════ -->
<section class="community-zone" id="community" aria-label="Community and Contact">
  <!-- Top part: Community -->
  <div class="community">
    <div class="community__left">
      <h2 class="community__title">
        <span>WE</span>
        <span>DON’T</span>
        <span class="community__title--just">JUST</span>
        <span>SELL</span>
        <span>CARS.</span>
      </h2>
    </div>

    <div class="community__right">
      <figure class="community__photo">
        <svg class="community__photo-ticks" viewBox="0 0 776 406" preserveAspectRatio="none" aria-hidden="true">
          <path d="M0 13.7V0H13.7 M776 13.7V0H762.3 M0 392.3V406H13.7 M776 392.3V406H762.3" stroke="#C2B9FF" fill="none" stroke-width="1"/>
        </svg>
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/community-trio.jpg" alt="AutoDNA community with five cars" fetchpriority="low">
      </figure>

      <div class="community__sub-wrap">
        <svg class="community__sub-line" viewBox="0 0 265 50" preserveAspectRatio="none" aria-hidden="true">
          <path d="M0 49.5H150.7L191.1 0H265" stroke="#C2B9FF" fill="none" stroke-width="1"/>
        </svg>
        <p class="community__sub">
          <span>WE’RE BUILDING A COMMUNITY</span>
          <span>WHERE EVERY CUSTOMER GETS</span>
          <span>MORE THAN THEY EXPECT.</span>
        </p>
      </div>
    </div>
  </div>

  <!-- Bottom part: Footer -->
  <footer class="foot" id="contact">
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
</section>

</main>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/site1.js" defer></script>
</body>
</html>
</main>

<?php get_footer(); ?>

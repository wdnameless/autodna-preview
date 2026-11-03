<?php
/**
 * Front Page Template
 *
 * @package AutoDNA
 */

get_header(); ?>

<main id="home">

<!-- ══ 1. HERO ═════════════════════════════════════════════════════════════ -->
<?php
// Hero content: editable via AutoDNA Content → Hero. ACF textarea newlines split into lines.
$ad_hero_sub_l = preg_split( '/\r\n|\r|\n/', ad_field( 'ad_hero_sub_l', "to  your\ncar" ) );
$ad_hero_sub_r = preg_split( '/\r\n|\r|\n/', ad_field( 'ad_hero_sub_r', "has    already\nbeen found" ) );
?>
<section class="hero" aria-label="Intro">
  <img class="hero__bg" src="<?php echo esc_url( ad_img( 'ad_hero_bg', 'img/site1/hero-ground.jpg' ) ); ?>" alt="" aria-hidden="true" fetchpriority="high">
  <div class="hero__shade hero__shade--top" aria-hidden="true"></div>
  <div class="hero__shade hero__shade--bottom" aria-hidden="true"></div>
  <div class="hero__frame">
    <div class="hero__triptych ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <svg class="hero__ticks" viewBox="330 167 776 416" preserveAspectRatio="none" aria-hidden="true"><path d="M340.219 190.684V177.352H353.551M1096.19 190.684V177.351H1082.86M353.551 572.609H340.219V559.277M1082.86 572.609H1096.19V559.277"/></svg>
      <img src="<?php echo esc_url( ad_img( 'ad_hero_trio', 'img/site1/hero-trio.jpg' ) ); ?>" alt="Pickup, Honda crossover and Tesla side by side" fetchpriority="high">
    </div>
    <h1 class="hero__word">
      <span><?php echo esc_html( ad_field( 'ad_hero_word_1', 'THE' ) ); ?></span>
      <span><?php echo esc_html( ad_field( 'ad_hero_word_2', 'GENETIC' ) ); ?></span>
      <span><?php echo esc_html( ad_field( 'ad_hero_word_3', 'CODE' ) ); ?></span>
    </h1>
    <p class="hero__sub hero__sub--l"><?php echo wp_kses_post( implode( '<br>', array_map( 'esc_html', $ad_hero_sub_l ) ) ); ?></p>
    <p class="hero__sub hero__sub--r"><?php echo wp_kses_post( implode( '<br>', array_map( 'esc_html', $ad_hero_sub_r ) ) ); ?></p>
    <svg class="hero__elbow" viewBox="480 615 265 50" preserveAspectRatio="none" aria-hidden="true">
      <path d="M479.781 664.905H630.487L670.902 615.441H744.829"/>
    </svg>

    <!-- Mobile specific subs block with exact Figma Vector 12 wire -->
    <div class="hero__mob-subs-block" aria-hidden="true">
      <div class="hero__mob-sub hero__mob-sub--l">
        <?php foreach ( $ad_hero_sub_l as $line ) : ?>
        <span><?php echo esc_html( $line ); ?></span>
        <?php endforeach; ?>
      </div>
      <svg class="hero__mob-sub-wire" viewBox="0 0 126 28" preserveAspectRatio="none">
        <path d="M0 27.1H71.3L90.5 0H125.5" stroke="#C2B9FF" fill="none" stroke-width="1"/>
      </svg>
      <div class="hero__mob-sub hero__mob-sub--r">
        <?php foreach ( $ad_hero_sub_r as $line ) : ?>
        <span><?php echo esc_html( $line ); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
    <a class="hero__cta ticks" href="#services">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <span><?php echo esc_html( ad_field( 'ad_hero_cta', 'EXPLORE OUR SERVICES' ) ); ?></span>
      <svg class="hero__cta-arrow" viewBox="0 0 13 13" aria-hidden="true">
        <path d="M0 0L11 11M11 0V11H0" stroke="#C2B9FF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      </svg>
    </a>
    <nav class="rail" aria-label="Explore">
      <svg class="rail__vectors" viewBox="0 0 265.05 228.03" preserveAspectRatio="none" aria-hidden="true">
        <path class="rail__line rail__line--1" d="M0 67.465H150.71L191.12 18.002H265.05"/>
        <path class="rail__arrow-svg rail__arrow-svg--1" d="M257.05 8.002L265.05 0M257.05 0H265.05V8.002" stroke-linecap="round" stroke-linejoin="round"/>
        <path class="rail__line rail__line--2" d="M0 92.836H150.7L191.12 142.299H265.05"/>
        <path class="rail__arrow-svg rail__arrow-svg--2" d="M257.04 125.034L265.04 133.034M257.04 133.034H265.04V125.034" stroke-linecap="round" stroke-linejoin="round"/>
        <path class="rail__line rail__line--3" d="M0 228.026H150.7L191.12 178.562H265.05"/>
        <path class="rail__arrow-svg rail__arrow-svg--3" d="M257.05 168.562L265.05 160.562M257.05 160.562H265.05V168.562" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <a href="<?php echo esc_url( home_url( '/skipthedealer/' ) ); ?>" class="rail__link rail__link--1">
        <span>Explore</span>
        <span>SkipTheDealer</span>
      </a>
      <a href="<?php echo esc_url( home_url( '/dnainvest/' ) ); ?>" class="rail__link rail__link--2">
        <span>DNA</span>
        <span>Invest</span>
      </a>
      <a href="<?php echo esc_url( home_url( '/dnaservice/' ) ); ?>" class="rail__link rail__link--3">
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
      <blockquote><?php echo esc_html( ad_field( 'ad_carlears_quote', 'We don’t call ourselves a dealer, we don’t like that word.' ) ); ?></blockquote>
      <span class="carlears__quote-line" aria-hidden="true"></span>
    </figure>
    <?php
    // Lede line 2: second word glows ("a new slang term" → em on "new").
    $ad_lede2 = preg_split( '/\s+/', ad_field( 'ad_carlears_lede_2', 'a new slang term' ), 3 );
    ?>
    <p class="carlears__lede">
      <span><?php echo esc_html( ad_field( 'ad_carlears_lede_1', 'We’re starting' ) ); ?></span>
      <span><?php echo esc_html( $ad_lede2[0] ?? '' ); ?> <em class="carlears__new-badge"><?php echo esc_html( $ad_lede2[1] ?? '' ); ?></em> <?php echo esc_html( $ad_lede2[2] ?? '' ); ?></span>
    </p>
    <div class="carlears__word-wrap">
      <span class="carlears__flank carlears__flank--l" aria-hidden="true"></span>
      <h2 class="carlears__word" aria-label="carlears"><?php echo esc_html( ad_field( 'ad_carlears_word', 'carlears' ) ); ?></h2>
      <span class="carlears__flank carlears__flank--r" aria-hidden="true"></span>
    </div>

  <!-- Mobile Carlears Carousel Nav Buttons (Frame 1769) -->
  <div class="carlears__nav" aria-label="Carousel navigation">
    <button class="carlears__nav-btn carlears__nav-btn--prev ticks" id="carlears-prev" aria-label="Previous card">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <svg viewBox="0 0 18 18" aria-hidden="true">
        <path d="M11 4L6 9L11 14" stroke="#C2B9FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      </svg>
    </button>
    <button class="carlears__nav-btn carlears__nav-btn--next ticks" id="carlears-next" aria-label="Next card">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <svg viewBox="0 0 18 18" aria-hidden="true">
        <path d="M7 4L12 9L7 14" stroke="#C2B9FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      </svg>
    </button>
  </div>

  <?php
  $ad_carlears_cards = ad_rows( 'ad_carlears_cards', array(
      array( 'title' => 'High quality', 'text' => 'A higher level of quality you can trust at an affordable price' ),
      array( 'title' => 'Wide choice', 'text' => 'A great selection of cars to match every lifestyle and need' ),
      array( 'title' => 'Save more', 'text' => 'A smarter way to save money without compromising on quality' ),
      array( 'title' => 'True value', 'text' => 'A real value that gives you confidence and satisfaction every time' ),
  ) );
  ?>
  <div class="carlears__grid">
    <?php foreach ( $ad_carlears_cards as $card ) : ?>
    <article class="clr-card">
      <svg class="clr-card__ticks" viewBox="0 0 289 291" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 18.8V0H18.8 M289 18.8V0H270.2 M0 272.2V291H18.8 M289 272.2V291H270.2" stroke="#C2B9FF" fill="none" stroke-width="1"/>
      </svg>
      <h3><?php echo esc_html( $card['title'] ); ?></h3>
      <p><?php echo esc_html( $card['text'] ); ?></p>
    </article>
    <?php endforeach; ?>
  </div>
</section>

<!-- ══ 3. VALUE 1790–2830 ════════════════════════════════════════════════ -->
<?php
// Value title: two lines — plain + violet glow. Newline in the field splits them.
$ad_value_title = preg_split( '/\r\n|\r|\n/', ad_field( 'ad_value_title', "Imagine buying a car from a dealer —\nbut paying the same price you’d pay a private seller." ) );
?>
<section class="value" id="value" aria-label="Why AutoDNA">
  <h2 class="value__title">
    <span><?php echo esc_html( $ad_value_title[0] ); ?></span>
    <?php if ( ! empty( $ad_value_title[1] ) ) : ?>
    <em class="value__title-em"><?php echo esc_html( $ad_value_title[1] ); ?></em>
    <?php endif; ?>
  </h2>
  <span class="value__title-v-line" aria-hidden="true"></span>
  <svg class="value__fan" viewBox="0 2276 1440 283" preserveAspectRatio="xMidYMid meet" aria-hidden="true">
    <defs><linearGradient id="fanStroke" x1="0" y1="0" x2="1" y2="0"><stop offset="0" stop-color="#c2b9ff"/><stop offset="1" stop-color="#746f99"/></linearGradient></defs>
    <path d="M720 2276L144 2559M720 2276L433 2559M720 2276L720 2559M720 2276L1012 2559M720 2276L1301 2559"/>
  </svg>
  <?php
  $ad_value_items = ad_rows( 'ad_value_items', array(
      array( 'title' => 'No Surprises', 'text' => 'No hidden fees. No surprises. We cover the GST ourselves.' ),
      array( 'title' => 'Affordable Dealer Prices', 'text' => 'Buying from a dealer can be just as affordable as buying privately.' ),
      array( 'title' => 'Changing the Game', 'text' => 'Calgary has never seen this before. We put the customer first.' ),
      array( 'title' => 'Flexible Options', 'text' => 'Flexible financing and an extended warranty from our partners.' ),
      array( 'title' => 'Real Value', 'text' => 'Zero profit for us — just fair prices and peace of mind for you.' ),
  ) );
  $ad_vi_total = count( $ad_value_items );
  ?>
  <div class="value__grid">
    <?php foreach ( $ad_value_items as $i => $item ) : ?>
    <div class="value__item">
      <h3><?php echo esc_html( $item['title'] ); ?></h3>
      <p><?php echo esc_html( $item['text'] ); ?></p>
      <?php if ( $i < $ad_vi_total - 1 ) : ?>
      <span class="value__v-line" aria-hidden="true"></span>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ══ 4. COMPARE ═══════════════════════════════════════════════════════ -->
<section class="compare" id="compare" aria-label="Price comparison">
  <div class="compare__stage">
    <!-- Callout badge + line -->
    <div class="compare__badge-box">
      <p class="compare__badge">
        <span><?php echo esc_html( ad_field( 'ad_compare_badge_1', 'TOYOTA COROLLA' ) ); ?></span>
        <span><?php echo esc_html( ad_field( 'ad_compare_badge_2', 'HATCHBACK 2021' ) ); ?></span>
      </p>
      <svg class="compare__badge-line" viewBox="0 0 391 50" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 0H200L240.4 49.5H390.8" stroke="#C2B9FF" fill="none" stroke-width="1"/>
      </svg>
    </div>

    <!-- Corolla photo -->
    <div class="compare__car">
      <img src="<?php echo esc_url( ad_img( 'ad_compare_car', 'img/site1/corolla.png' ) ); ?>" alt="Toyota Corolla Hatchback 2021" fetchpriority="low">
    </div>

    <!-- Big Orbitron Title behind table header -->
    <h2 class="compare__title" aria-label="Price Comparison">
      <span>PRICE</span>
      <span>COMPARISON</span>
    </h2>
  </div>

  <div class="compare__nav" aria-label="Comparison navigation">
    <button class="compare__nav-btn ticks" id="compare-prev" aria-label="Previous columns">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <svg viewBox="0 0 18 18" aria-hidden="true">
        <path d="M11 4L6 9L11 14" stroke="#C2B9FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      </svg>
    </button>
    <button class="compare__nav-btn ticks" id="compare-next" aria-label="Next columns">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <svg viewBox="0 0 18 18" aria-hidden="true">
        <path d="M7 4L12 9L7 14" stroke="#C2B9FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      </svg>
    </button>
  </div>

  <div class="compare__tabs" role="tablist" aria-label="Seller">
    <button role="tab" aria-selected="false" data-col="dealer">Dealers</button>
    <button role="tab" aria-selected="false" data-col="market">Marketplace</button>
    <button role="tab" aria-selected="true" data-col="dna">AutoDNA</button>
  </div>

  <div class="compare__wrap ticks">
    <span class="tick tl"></span><span class="tick tr"></span>
    <span class="tick bl"></span><span class="tick br"></span>
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
        <?php
        $ad_compare_rows = ad_rows( 'ad_compare_rows', array(
            array( 'option' => 'DEALERS', 'price' => '$23,000 + GST', 'features' => 'Dealer purchase', 'cons' => 'Higher price, GST extra', 'col' => 'dealer' ),
            array( 'option' => 'MARKETPLACE', 'price' => '$21,000', 'features' => 'Lower price', 'cons' => 'Car not inspected, potential issues, no warranty', 'col' => 'market' ),
            array( 'option' => 'AUTODNA', 'price' => '$21,000', 'features' => 'Full inspection completed, 3-year paid warranty, financing available', 'cons' => 'NONE — ALL VALUE INCLUDED', 'col' => 'dna' ),
        ) );
        $ad_cr_total = count( $ad_compare_rows );
        ?>
        <?php foreach ( $ad_compare_rows as $i => $row ) : $is_dna = ( $i === $ad_cr_total - 1 ); ?>
        <tr data-col="<?php echo esc_attr( $row['col'] ?? ( $is_dna ? 'dna' : 'col' . $i ) ); ?>"<?php echo $is_dna ? ' class="is-lit"' : ''; ?>>
          <th><?php echo esc_html( $row['option'] ); ?></th>
          <td><?php echo esc_html( $row['price'] ); ?><?php echo $is_dna ? '<br><span class="compare__gst">(GST INCLUDED)</span>' : ''; ?></td>
          <td><?php echo esc_html( $row['features'] ); ?></td>
          <td<?php echo $is_dna ? ' class="compare__none"' : ''; ?>><?php echo esc_html( $row['cons'] ); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<!-- ══ 5. SERVICES (Full-screen interactive panorama) ═══════════════════ -->
<section class="services" id="services" aria-label="Services">
  <!-- 3 Full-bleed background layers with crossfade on hover -->
  <div class="services__bg-layer services__bg-layer--1 is-active" aria-hidden="true" style="background-image: url('<?php echo esc_url( ad_img( 'ad_svc_bg_1', 'img/site1/service-dealer-bg.jpg' ) ); ?>');"></div>
  <div class="services__bg-layer services__bg-layer--2" aria-hidden="true" style="background-image: url('<?php echo esc_url( ad_img( 'ad_svc_bg_2', 'img/site1/service-flip-bg.jpg' ) ); ?>');"></div>
  <div class="services__bg-layer services__bg-layer--3" aria-hidden="true" style="background-image: url('<?php echo esc_url( ad_img( 'ad_svc_bg_3', 'img/site1/service-service-bg.jpg' ) ); ?>');"></div>

  <!-- Ambient dark gradient vignettes -->
  <div class="services__shade services__shade--top" aria-hidden="true"></div>
  <div class="services__shade services__shade--bottom" aria-hidden="true"></div>

  <div class="services__content">
        <div class="services__title-wrap ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h2 class="services__title">SERVICES</h2>
    </div>

    <!-- 3 Interactive service columns at the bottom (Desktop triptych & Mobile 3 stacked cards per Frame 1792) -->
    <div class="services__interactive-grid">
      <!-- Col 1: SkipTheDealer -->
      <a href="<?php echo esc_url( home_url( '/skipthedealer/' ) ); ?>" class="svc-col is-active" data-svc="1" aria-label="Explore SkipTheDealer">
        <div class="svc-col__media ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <img src="<?php echo esc_url( ad_img( 'ad_svc_card_1', 'img/site1/mob-svc1.jpg' ) ); ?>" alt="SkipTheDealer" loading="lazy">
        </div>
        <div class="svc-card ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <div class="svc-card__btn ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <svg viewBox="0 0 13 13" aria-hidden="true">
              <path d="M0 11L11 0M0 0H11V11" stroke="#C2B9FF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
            </svg>
          </div>
          <h3 class="svc-col__name"><?php echo esc_html( ad_field( 'ad_svc_name_1', 'SkipTheDealer' ) ); ?></h3>
          <p class="svc-col__desc"><?php echo esc_html( ad_field( 'ad_svc_desc_1', 'Find, bid, and buy the best vehicles directly from trusted car auctions. Smart, transparent, and hassle-free — we handle the process from search to delivery.' ) ); ?></p>
        </div>
      </a>

      <!-- Col 2: DNA Invest -->
      <a href="<?php echo esc_url( home_url( '/dnainvest/' ) ); ?>" class="svc-col" data-svc="2" aria-label="Explore DNA Invest">
        <div class="svc-col__media ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <img src="<?php echo esc_url( ad_img( 'ad_svc_card_2', 'img/site1/mob-svc2.jpg' ) ); ?>" alt="DNA Invest" loading="lazy">
        </div>
        <div class="svc-card ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <div class="svc-card__btn ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <svg viewBox="0 0 13 13" aria-hidden="true">
              <path d="M0 11L11 0M0 0H11V11" stroke="#C2B9FF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
            </svg>
          </div>
          <h3 class="svc-col__name"><?php echo esc_html( ad_field( 'ad_svc_name_2', 'DNA Invest' ) ); ?></h3>
          <p class="svc-col__desc"><?php echo esc_html( ad_field( 'ad_svc_desc_2', 'Turn vehicles into valuable assets. We help you invest wisely in high-demand cars and maximize your returns through strategic resale.' ) ); ?></p>
        </div>
      </a>

      <!-- Col 3: AutoDNA Service -->
      <a href="<?php echo esc_url( home_url( '/dnaservice/' ) ); ?>" class="svc-col" data-svc="3" aria-label="Explore AutoDNA Service">
        <div class="svc-col__media ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <img src="<?php echo esc_url( ad_img( 'ad_svc_card_3', 'img/site1/mob-svc3.jpg' ) ); ?>" alt="AutoDNA Service" loading="lazy">
        </div>
        <div class="svc-card ticks">
          <span class="tick tl"></span><span class="tick tr"></span>
          <span class="tick bl"></span><span class="tick br"></span>
          <div class="svc-card__btn ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <svg viewBox="0 0 13 13" aria-hidden="true">
              <path d="M0 11L11 0M0 0H11V11" stroke="#C2B9FF" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
            </svg>
          </div>
          <h3 class="svc-col__name"><?php echo esc_html( ad_field( 'ad_svc_name_3', 'AutoDNA Service' ) ); ?></h3>
          <p class="svc-col__desc"><?php echo esc_html( ad_field( 'ad_svc_desc_3', 'AutoDNA Service is a next-generation automotive center, equipped with innovative technology, a modern minimalist and spotless interior, smart service systems, a skilled team, and much more — as described below.' ) ); ?></p>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- ══ 6. FACTS 4790–5430 ════════════════════════════════════════════════ -->
<section class="facts" id="facts" aria-label="Facts and figures">
  <div class="facts__nav" aria-label="Facts carousel navigation">
    <button class="facts__nav-btn ticks" id="facts-prev" aria-label="Previous fact">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <svg viewBox="0 0 18 18" aria-hidden="true">
        <path d="M11 4L6 9L11 14" stroke="#C2B9FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      </svg>
    </button>
    <button class="facts__nav-btn ticks" id="facts-next" aria-label="Next fact">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <svg viewBox="0 0 18 18" aria-hidden="true">
        <path d="M7 4L12 9L7 14" stroke="#C2B9FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      </svg>
    </button>
  </div>
  <?php
  $ad_fact_items = ad_rows( 'ad_fact_items', array(
      array( 'kicker' => '', 'number' => '12', 'label' => 'Stages of Inspection', 'text' => 'We test, verify, and only then hand over the keys. Real inspection — not intuition.' ),
      array( 'kicker' => '', 'number' => '10+', 'label' => 'Years in the Industry', 'text' => 'We’ve seen it all — and that’s why we do it right. It’s in our DNA.' ),
      array( 'kicker' => '', 'number' => '450+', 'label' => 'Clients Said “Wow!”', 'text' => 'And new ones join every week. Every car is a story — and our client is always the main character.' ),
      array( 'kicker' => '', 'number' => '3-4', 'label' => 'Weeks — Faster Than You Expect', 'text' => 'An optimized process — no delays, no surprises. Search, preparation, and the car is yours.' ),
      array( 'kicker' => 'Save', 'number' => '30-50%', 'label' => '', 'text' => 'Overpaying isn’t our style — auctions let you save big.' ),
  ) );
  $ad_fact_mods = array( 'a', 'b', 'c', 'd', 'e' );
  ?>
  <div class="facts__grid">
    <?php foreach ( $ad_fact_items as $i => $fact ) : ?>
    <div class="fact fact--<?php echo esc_attr( $ad_fact_mods[ $i % 5 ] ); ?> ticks"><span class="tick tl"></span><span class="tick tr"></span><span class="tick bl"></span><span class="tick br"></span><?php if ( $fact['kicker'] !== '' ) : ?><p class="fact__k"><?php echo esc_html( $fact['kicker'] ); ?></p><?php endif; ?><p class="fact__n"><?php echo esc_html( $fact['number'] ); ?></p><?php if ( $fact['label'] !== '' ) : ?><p class="fact__l"><?php echo esc_html( $fact['label'] ); ?></p><?php endif; ?><p class="fact__t"><?php echo esc_html( $fact['text'] ); ?></p></div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ══ 7. CORPORATE 5430–6630 ════════════════════════════════════════════ -->
<?php
// Corporate paragraphs: two-tone (lavender + white). Newline splits the tones.
$ad_corp_about = preg_split( '/\r\n|\r|\n/', ad_field( 'ad_corp_about', "AutoDNA is the parent corporation that brings\ntogether SkipTheDealer, AutoDNA Service, and other companies." ) );
$ad_corp_plan = preg_split( '/\r\n|\r|\n/', ad_field( 'ad_corp_plan', "Over the next two years, we plan to create a complete automotive\nhub for car enthusiasts, offering all kinds of services and entertainment for our clients." ) );
?>
<section class="corporate" id="corporate" aria-label="About AutoDNA">
  <img class="corporate__dna" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/site1/corporate-bg.svg" alt="" aria-hidden="true">
  <div class="corporate__top">
    <p class="corporate__about">
      <span class="text-lavender"><?php echo esc_html( $ad_corp_about[0] ); ?></span>
      <?php if ( ! empty( $ad_corp_about[1] ) ) : ?>
      <span class="text-white"><?php echo esc_html( $ad_corp_about[1] ); ?></span>
      <?php endif; ?>
    </p>
    <aside class="corporate__card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <p>
        <span class="text-white">We play by new rules —</span>
        <span class="text-lavender">and this is just the beginning.</span>
      </p>
    </aside>
  </div>
  <figure class="corporate__photo ticks">
    <span class="tick tl"></span><span class="tick tr"></span>
    <span class="tick bl"></span><span class="tick br"></span>
    <img src="<?php echo esc_url( ad_img( 'ad_corp_hall', 'img/site1/corporate-hall.jpg' ) ); ?>" alt="DNA Auto dealership building in Calgary">
  </figure>
  <p class="corporate__plan">
    <span class="text-lavender"><?php echo esc_html( $ad_corp_plan[0] ); ?></span>
    <?php if ( ! empty( $ad_corp_plan[1] ) ) : ?>
    <span class="text-white"><?php echo esc_html( $ad_corp_plan[1] ); ?></span>
    <?php endif; ?>
  </p>
</section>

<!-- ══ 8. CLUB ═════════════════════════════════════════════════════════ -->
<section class="club" id="club" aria-label="DNA Auto Club">
  <div class="club__stage">
    <p class="club__lede">
      <span class="club__lede-row"><span>JOIN</span> <span>DNA</span> <span>AUTO</span></span>
      <span class="club__lede-row"><span>CLUB</span> <span>AND</span> <span>GET</span></span>
      <span class="club__lede-row"><span>MORE</span> <span>THAN</span> <span>JUST</span></span>
      <span class="club__lede-row"><span>SERVICE.</span></span>
    </p>
    <h2 class="club__title">AUTO CLUB</h2>
  </div>

    <!-- Mobile Carousel Nav Buttons (per Figma main mob) -->
  <div class="club__nav" aria-label="Club carousel navigation">
    <button class="club__nav-btn ticks" id="club-prev" aria-label="Previous card">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <svg viewBox="0 0 18 18" aria-hidden="true">
        <path d="M11 4L6 9L11 14" stroke="#C2B9FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      </svg>
    </button>
    <button class="club__nav-btn ticks" id="club-next" aria-label="Next card">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <svg viewBox="0 0 18 18" aria-hidden="true">
        <path d="M7 4L12 9L7 14" stroke="#C2B9FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      </svg>
    </button>
  </div>

  <?php
  $ad_club_cards = ad_rows( 'ad_club_cards', array(
      array( 'title' => 'SERVICE', 'big' => '30%', 'mid' => 'OFF ANY WORK.', 'desc' => 'The lowest prices in Calgary for bodywork, mechanics, and painting.', 'flip' => false ),
      array( 'title' => 'CARWASH', 'big' => 'IS FREE', 'mid' => "EVERY\nSECOND WASH", 'desc' => 'Modern automatic carwash that preserves your car’s coating.', 'flip' => true ),
      array( 'title' => "WHEEL\nALIGNMENT", 'big' => '$70', 'mid' => "MARKET PRICE\n$150", 'desc' => 'State-of-the-art equipment with automatic adjustment.', 'flip' => false ),
      array( 'title' => 'TIRE CHANGE', 'big' => '$60', 'mid' => "MARKET PRICE\n- $120", 'desc' => 'Any wheel repair, seasonal tire replacement, and free tire storage.', 'flip' => false ),
  ) );
  ?>
  <div class="club__grid">
    <?php foreach ( $ad_club_cards as $card ) : ?>
    <article class="club-card ticks">
      <span class="tick tl"></span><span class="tick tr"></span>
      <span class="tick bl"></span><span class="tick br"></span>
      <h3><?php echo wp_kses_post( implode( '<br>', array_map( 'esc_html', preg_split( '/\r\n|\r|\n/', $card['title'] ) ) ) ); ?></h3>
      <div class="club-card__offer">
        <?php $ad_big = '<p class="club-card__big">' . esc_html( $card['big'] ) . '</p>'; ?>
        <?php $ad_mid = '<p class="club-card__mid">' . wp_kses_post( implode( '<br>', array_map( 'esc_html', preg_split( '/\r\n|\r|\n/', $card['mid'] ) ) ) ) . '</p>'; ?>
        <?php echo ! empty( $card['flip'] ) ? $ad_mid . $ad_big : $ad_big . $ad_mid; ?>
      </div>
      <p class="club-card__desc"><?php echo esc_html( $card['desc'] ); ?></p>
    </article>
    <?php endforeach; ?>
  </div>

  <p class="club__out">
    <span class="text-lavender">REAL BENEFITS, REAL SAVINGS —</span>
    <span class="text-white">MADE FOR DRIVERS LIKE YOU.</span>
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
      <figure class="community__photo ticks">
        <span class="tick tl"></span><span class="tick tr"></span>
        <span class="tick bl"></span><span class="tick br"></span>
        <svg class="community__photo-ticks" viewBox="0 0 776 406" preserveAspectRatio="none" aria-hidden="true">
          <path d="M0 13.7V0H13.7 M776 13.7V0H762.3 M0 392.3V406H13.7 M776 392.3V406H762.3" stroke="#C2B9FF" fill="none" stroke-width="1"/>
        </svg>
        <img src="<?php echo esc_url( ad_img( 'ad_community_photo', 'img/site1/community-trio.jpg' ) ); ?>" alt="AutoDNA community with five cars" fetchpriority="low">
      </figure>

      <div class="community__sub-wrap">
        <svg class="community__sub-line" viewBox="0 0 265 50" preserveAspectRatio="none" aria-hidden="true">
          <path d="M0 49.5H150.7L191.1 0H265" stroke="#C2B9FF" fill="none" stroke-width="1"/>
        </svg>
        <?php $ad_community_sub = preg_split( '/\r\n|\r|\n/', ad_field( 'ad_community_sub', "WE’RE BUILDING A COMMUNITY\nWHERE EVERY CUSTOMER GETS\nMORE THAN THEY EXPECT." ) ); ?>
        <p class="community__sub">
          <?php foreach ( $ad_community_sub as $line ) : ?>
          <span><?php echo esc_html( $line ); ?></span>
          <?php endforeach; ?>
        </p>
      </div>
    </div>
  </div>

  <!-- Bottom part: Footer -->
  <?php
  // Footer contacts: editable via Customizer → AutoDNA Contact.
  $ad_phone = get_theme_mod( 'autodna_phone', '+1 (403) 312-8306' );
  $ad_email = get_theme_mod( 'autodna_email', 'info@autodna.com' );
  $ad_addr  = get_theme_mod( 'autodna_address', '730 2 Ave SW, Calgary, T2P1R8, Canada' );
  $ad_tel   = 'tel:+' . preg_replace( '/\D+/', '', $ad_phone );
  ?>
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
            <a href="<?php echo esc_url( $ad_tel ); ?>" class="foot__link"><?php echo esc_html( $ad_phone ); ?></a>
            <svg class="foot__item-line" viewBox="0 0 348 35" preserveAspectRatio="none" aria-hidden="true">
              <path d="M0 34.2H246.7L312.8 0H348.2" stroke="#C2B9FF" fill="none" stroke-width="1"/>
              <path d="M340.2 8L348.2 0M340.2 0H348.2V8" stroke="#C2B9FF" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
            </svg>
          </div>
          <div class="foot__item">
            <a href="mailto:<?php echo esc_attr( $ad_email ); ?>" class="foot__link"><?php echo esc_html( $ad_email ); ?></a>
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
            <a href="<?php echo esc_url( get_theme_mod( 'autodna_facebook', '#' ) ); ?>" aria-label="Facebook" class="foot__soc-btn">
              <svg viewBox="0 0 40 40" aria-hidden="true">
                <circle cx="20" cy="20" r="19.5" fill="none" stroke="#C2B9FF"/>
                <path d="M22 29v-9h3l.5-3.5h-3.5v-2c0-1 .3-1.8 1.8-1.8h2V9.5c-.4 0-1.4-.1-2.6-.1-2.6 0-4.4 1.6-4.4 4.5v2.6H16V20h2.8v9H22Z" fill="#FFFFFF"/>
              </svg>
            </a>
            <a href="<?php echo esc_url( get_theme_mod( 'autodna_x', '#' ) ); ?>" aria-label="X" class="foot__soc-btn">
              <svg viewBox="0 0 40 40" aria-hidden="true">
                <circle cx="20" cy="20" r="19.5" fill="none" stroke="#C2B9FF"/>
                <path d="M25.5 12h2.5l-5.5 6.3L29 27h-5.1l-4-5.2-4.6 5.2h-2.5l5.9-6.8L12.5 12h5.2l3.6 4.8L25.5 12Zm-.9 13.5h1.4L17.1 13.4h-1.5l9 12.1Z" fill="#FFFFFF"/>
              </svg>
            </a>
            <a href="<?php echo esc_url( get_theme_mod( 'autodna_instagram', '#' ) ); ?>" aria-label="Instagram" class="foot__soc-btn">
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
            <p class="foot__address"><?php echo wp_kses_post( implode( '<br>', array_map( 'esc_html', array_map( 'trim', explode( ',', $ad_addr ) ) ) ) ); ?></p>
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

<?php
get_footer();

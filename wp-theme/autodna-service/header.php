<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Next-generation automotive center in Calgary equipped with innovative technology, modern minimalist interior, and smart service systems.">
<?php wp_head(); ?>
</head>
<?php
// Current service page: drives body class, evolution title + active item.
$adsvc_tpl = get_page_template_slug();
if ( is_front_page() ) {
    $adsvc_page = 'home';
} elseif ( 'page-skiptheshop.php' === $adsvc_tpl || is_page( 'skiptheshop' ) ) {
    $adsvc_page = 'shop';
} elseif ( 'page-drivecareplan.php' === $adsvc_tpl || is_page( 'drivecareplan' ) ) {
    $adsvc_page = 'plan';
} elseif ( 'page-paintbot.php' === $adsvc_tpl || is_page( 'paintbot' ) ) {
    $adsvc_page = 'paint';
} else {
    $adsvc_page = 'home';
}
$adsvc_titles = array(
    'home'  => 'SERVICE EVOLUTION',
    'shop'  => 'SKIPTHESHOP™',
    'plan'  => 'DRIVECAREPLAN™',
    'paint' => 'PAINTBOT™',
);
// Functional: CSS scopes desktop/mobile chrome off these (body.site-service .hud etc).
$adsvc_body = array(
    'home'  => 'site-service',
    'shop'  => 'page-shop',
    'plan'  => 'page-plan',
    'paint' => 'page-paintbot',
);
$adsvc_c = adsvc_contact();
?>
<body <?php body_class( $adsvc_body[ $adsvc_page ] ); ?>>
<?php wp_body_open(); ?>

<!-- ══ DYNAMIC STICKY HEADER (ALWAYS PRESENT / FLOATING AS YOU SCROLL) ═══ -->

<header class="sticky-header" id="sticky-header">
  <div class="sticky-header__container">

    <!-- Left Panel: SERVICE EVOLUTION (Dropdown per Figma) -->
    <div class="panel-evolution">
      <div class="panel-evolution__box ticks">
        <span class="tick tl"></span>
        <span class="tick tr"></span>
        <span class="tick bl"></span>
        <span class="tick br"></span>

        <button class="panel-evolution__btn" id="btn-evolution" aria-expanded="false">
          <span class="panel-evolution__title"><?php echo esc_html( $adsvc_titles[ $adsvc_page ] ); ?></span>
          <svg class="panel-evolution__chevron" viewBox="0 0 10 6"><path d="M1 1L5 5L9 1"/></svg>
        </button>

        <ul class="panel-evolution__menu" id="menu-evolution">
          <?php if ( 'home' !== $adsvc_page ) : ?>
          <li class="panel-evolution__item">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="panel-evolution__link" aria-label="Service Overview">
              <span class="panel-evolution__text">Service Overview</span>
              <svg class="panel-evolution__arrow" viewBox="0 0 14 10"><path d="M0 5H12M7 1L12 5L7 9"/></svg>
            </a>
          </li>
          <?php endif; ?>
          <?php
          $adsvc_evo = array(
              'shop'  => array( '/skiptheshop/', 'SkipTheShop™' ),
              'plan'  => array( '/drivecareplan/', 'DriveCarePlan™' ),
              'paint' => array( '/paintbot/', 'PaintBot™' ),
          );
          foreach ( $adsvc_evo as $adsvc_k => $adsvc_item ) :
          ?>
          <li class="panel-evolution__item">
            <a href="<?php echo esc_url( home_url( $adsvc_item[0] ) ); ?>" class="panel-evolution__link<?php echo $adsvc_k === $adsvc_page ? ' is-active' : ''; ?>" aria-label="<?php echo esc_attr( $adsvc_item[1] . ' subpage' ); ?>">
              <span class="panel-evolution__text"><?php echo esc_html( $adsvc_item[1] ); ?></span>
              <svg class="panel-evolution__arrow" viewBox="0 0 14 10"><path d="M0 5H12M7 1L12 5L7 9"/></svg>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <!-- Right Panel: Horizontal Navigation Bar with Dropdowns -->
    <nav class="panel-nav" aria-label="Services Navigation">
      <div class="panel-nav__box ticks">
        <span class="tick tl"></span>
        <span class="tick tr"></span>
        <span class="tick bl"></span>
        <span class="tick br"></span>

        <!-- Item 1: AutoServices Dropdown -->
        <div class="panel-nav__item">
          <button class="panel-nav__dropdown-btn">
            <span>AutoServices</span>
            <svg class="panel-nav__chevron" viewBox="0 0 8 5"><path d="M1 1L4 4L7 1"/></svg>
          </button>
          <ul class="panel-nav__dropdown-menu ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Oil change ($29)</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Tire Services &amp; Balancing</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Wheel alignment ($79)</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Check engine diagnostics</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">AC &amp; Heating Repair ($59)</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Brakes replacement ($79)</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Steering &amp; Suspension</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Engine &amp; Transmission repair</a></li>
          </ul>
        </div>

        <!-- Item 2: Remote Starters -->
        <div class="panel-nav__item">
          <a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>" class="panel-nav__link">Remote Starters installation</a>
        </div>

        <!-- Item 3: Inspections Dropdown -->
        <div class="panel-nav__item">
          <button class="panel-nav__dropdown-btn">
            <span>Inspections</span>
            <svg class="panel-nav__chevron" viewBox="0 0 8 5"><path d="M1 1L4 4L7 1"/></svg>
          </button>
          <ul class="panel-nav__dropdown-menu ticks">
            <span class="tick tl"></span><span class="tick tr"></span>
            <span class="tick bl"></span><span class="tick br"></span>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Mechanical inspection ($59)</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Insurance Inspection</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Out of Province Inspection</a></li>
            <li><a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>">Salvage Inspection</a></li>
          </ul>
        </div>

        <!-- Item 4: Towing / OnRoad -->
        <div class="panel-nav__item">
          <a href="<?php echo esc_url( $adsvc_c['tel'] ); ?>" class="panel-nav__link" aria-label="Towing / OnRoad support">Towing/OnRoad support</a>
        </div>

        <!-- Item 5: Car Buying Assist -->
        <div class="panel-nav__item">
          <a href="https://autodnagroup.ca/skipthedealer/" target="_blank" rel="noopener" class="panel-nav__link" aria-label="Car Buying Assist (SkipTheDealer)">Car Buying Assist</a>
        </div>

        <!-- Item 6: EV Service -->
        <div class="panel-nav__item">
          <a href="<?php echo esc_url( home_url( '/#catalog-services' ) ); ?>" class="panel-nav__link">EV/Electric cars service</a>
        </div>

      </div>
    </nav>

  </div>
</header>

<!-- ══ PORTAL BURGER (mobile only — desktop artboard carries its own header) ══ -->
<header class="hud" id="top">
  <a class="hud__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="AutoDNA Service home">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.svg' ); ?>" width="36" height="18" alt="AutoDNA">
  </a>
  <button class="hud__burger" id="burger" aria-label="Open menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</header>

<?php get_template_part( 'template-parts/menu-overlay' ); ?>

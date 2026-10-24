<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.svg' ); ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- Preloader Overlay (1-2 seconds on load) -->
  <div class="dna-preloader" id="preloader">
    <div class="dna-preloader-inner">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.svg' ); ?>" alt="AutoDNA" class="dna-preloader-logo">
      <div class="dna-preloader-bar">
        <div class="dna-preloader-fill"></div>
      </div>
    </div>
  </div>

  <!-- Shared Site Header -->
  <header class="dna-header">
    <div class="shell">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="dna-brand" aria-label="<?php esc_attr_e( 'AutoDNA Home', 'autodna' ); ?>">
        <?php if ( has_custom_logo() ) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.svg' ); ?>" alt="AutoDNA Logo">
        <?php endif; ?>
      </a>
      <button class="dna-burger" type="button" data-menu-open aria-label="<?php esc_attr_e( 'Open Navigation Menu', 'autodna' ); ?>">
        <span></span><span></span><span></span>
      </button>
    </div>
  </header>

  <!-- Fullscreen Navigation Menu Overlay -->
  <div class="dna-menu-overlay" id="menu" role="dialog" aria-modal="true" aria-label="Navigation Menu">
    <div class="dna-menu-drawer">
      <div class="dna-menu-top">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="dna-brand">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.svg' ); ?>" alt="AutoDNA">
        </a>
        <button class="dna-menu-close" type="button" data-menu-close aria-label="<?php esc_attr_e( 'Close Navigation Menu', 'autodna' ); ?>">
          <span>✕ CLOSE</span>
        </button>
      </div>

      <ul class="dna-menu-links">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
        <li><a href="<?php echo esc_url( home_url( '/skipthedealer/' ) ); ?>">SkipTheDealer™</a></li>
        <li><a href="<?php echo esc_url( home_url( '/invest/' ) ); ?>">AutoDNA Flip™ (Invest)</a></li>
        <li><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">AutoDNA Service™</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#carlears' ) ); ?>">Carlears</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#comparison' ) ); ?>">Price Comparison</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#services' ) ); ?>">Services</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#autoclub' ) ); ?>">DNA Auto Club</a></li>
        <li><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>">Contact Us</a></li>
      </ul>

      <div class="dna-menu-footer">
        <div><strong>Calgary HQ:</strong> 730 2 Ave SW, Calgary, AB</div>
        <div><strong>Phone:</strong> <a href="tel:+14033128306">+1 (403) 312-8306</a></div>
        <div><strong>Email:</strong> <a href="mailto:info@autodna.com">info@autodna.com</a></div>
      </div>
    </div>
  </div>

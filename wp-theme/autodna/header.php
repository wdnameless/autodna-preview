<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="AutoDNA: auction-priced cars with full inspection, warranty and financing. Skip the dealer, keep the confidence.">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="preloader" id="preloader" aria-hidden="true">
  <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/preloader.svg' ); ?>" alt="">
</div>

<header class="hud" id="top">
  <a class="hud__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="AutoDNA home">
    <svg viewBox="0 0 37 20" width="37" height="20" aria-hidden="true">
      <path d="M2 18V6.5L6.5 2h6L17 6.5V18h-4.5v-8.5L11 8H8.5l-1.5 1.5V18H2Z" fill="#fff"/>
      <path d="M19 18V2h4.5v13.5L25 14V2h4.5v16H25l-6-4.5V18H19Z" fill="#fff" opacity=".85"/>
      <path d="M31 18V2h4.5v16H31Z" fill="#9685ff"/>
    </svg>
  </a>
  <button class="hud__burger" id="burger" aria-label="Open menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</header>

<nav class="menu" id="menu" aria-label="Site menu" hidden>
  <?php
  wp_nav_menu( array(
    'theme_location' => 'primary',
    'container'      => false,
    'fallback_cb'    => 'autodna_fallback_menu',
  ) );
  ?>
  <div class="menu__foot">
    <a href="tel:+14033128306">+1 (403) 312-8306</a>
    <a href="mailto:info@autodna.com">info@autodna.com</a>
  </div>
</nav>

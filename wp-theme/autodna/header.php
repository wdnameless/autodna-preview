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

<!-- ══ PRELOADER ═════════════════════════════════════════════════════════ -->
<div class="preloader" id="preloader" aria-hidden="true">
  <img class="preloader__logo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/dna-logo.svg' ); ?>" alt="">
  <div class="preloader__bar" aria-hidden="true"><span></span></div>

<header class="hud" id="top">
  <a class="hud__logo" href="#home" aria-label="AutoDNA home">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/site1/logo.svg' ); ?>" width="37" height="21" alt="AutoDNA">
  </a>
  <button class="hud__burger" id="burger" aria-label="Open menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</header>

<?php get_template_part( 'template-parts/menu-overlay' ); ?>

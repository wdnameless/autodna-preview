<?php
/**
 * Site header — the board draws only the wordmark and the burger, so that is all this outputs.
 *
 * @package Autodna
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="dna-header">
	<a class="dna-header__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'AutoDNA home', 'autodna' ); ?>">
		<?php if ( has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php else : ?>
			<span class="dna-header__wordmark">AUTODNA</span>
		<?php endif; ?>
	</a>
	<button class="dna-header__burger" type="button" aria-label="<?php esc_attr_e( 'Menu', 'autodna' ); ?>">
		<span></span><span></span><span></span>
	</button>
</header>
<main class="dna-main">

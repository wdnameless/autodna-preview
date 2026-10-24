<?php
/**
 * Autodna theme bootstrap.
 *
 * @package Autodna
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AUTODNA_VERSION', '3.0.0' );

/**
 * Theme supports, menus and the frame stylesheet.
 */
function autodna_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'html5', array( 'style', 'script' ) );

	register_nav_menus( array( 'primary' => __( 'Primary Navigation', 'autodna' ) ) );
}
add_action( 'after_setup_theme', 'autodna_setup' );

/**
 * Fonts the boards use, plus the frame rules.
 */
function autodna_assets() {
	wp_enqueue_style(
		'autodna-fonts',
		'https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=DM+Sans:wght@300;400;500&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'autodna-theme', get_stylesheet_uri(), array( 'autodna-fonts' ), AUTODNA_VERSION );
}
add_action( 'wp_enqueue_scripts', 'autodna_assets' );

<?php
/**
 * Autodna theme bootstrap.
 *
 * The four page templates are positioned exactly as drawn on the Figma boards, so the theme
 * ships one stylesheet with the frame rules and nothing else. No CSS framework: the design's
 * own values are in the markup.
 *
 * @package Autodna
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'AUTODNA_VERSION', '2.0.0' );

/**
 * Theme supports and menus.
 */
function autodna_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 64,
			'width'       => 220,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'html5', array( 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'autodna' ),
		)
	);
}
add_action( 'after_setup_theme', 'autodna_setup' );

/**
 * Styles and fonts.
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

/**
 * Frame dimensions, read from the board at build time so the template can size its wrapper.
 *
 * @param string $key Page key: main, dealer, invest, service.
 * @return array{0:int,1:int}
 */
function autodna_frame_size( $key ) {
	$sizes = array(
		'main'    => array( 1440, 8554 ),
		'dealer'  => array( 1440, 6602 ),
		'invest'  => array( 1440, 6745 ),
		'service' => array( 1440, 5418 ),
	);
	return isset( $sizes[ $key ] ) ? $sizes[ $key ] : array( 1440, 800 );
}

/**
 * ACF groups — every field falls back to the value already in the markup.
 */
function autodna_acf_groups() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_dna_contacts',
			'title'  => 'DNA — Contacts',
			'fields' => array(
				array( 'key' => 'field_dna_email', 'label' => 'Email', 'name' => 'contact_email', 'type' => 'email' ),
				array( 'key' => 'field_dna_phone', 'label' => 'Phone', 'name' => 'contact_phone', 'type' => 'text' ),
				array( 'key' => 'field_dna_address', 'label' => 'Address', 'name' => 'contact_address', 'type' => 'textarea', 'rows' => 2 ),
				array( 'key' => 'field_dna_instagram', 'label' => 'Instagram URL', 'name' => 'social_instagram', 'type' => 'url' ),
				array( 'key' => 'field_dna_linkedin', 'label' => 'LinkedIn URL', 'name' => 'social_linkedin', 'type' => 'url' ),
				array( 'key' => 'field_dna_x', 'label' => 'X URL', 'name' => 'social_x', 'type' => 'url' ),
				array( 'key' => 'field_dna_youtube', 'label' => 'YouTube URL', 'name' => 'social_youtube', 'type' => 'url' ),
			),
			'location' => array( array( array( 'param' => 'page_template', 'operator' => '==', 'value' => 'default' ) ) ),
		)
	);
}
add_action( 'acf/init', 'autodna_acf_groups' );

/**
 * ACF field with the design's own value as fallback.
 *
 * @param string $key      Field name.
 * @param mixed  $fallback Value from the board.
 * @return mixed
 */
function autodna_field( $key, $fallback = '' ) {
	if ( function_exists( 'get_field' ) ) {
		$value = get_field( $key );
		if ( '' !== $value && null !== $value && false !== $value ) {
			return $value;
		}
	}
	return $fallback;
}

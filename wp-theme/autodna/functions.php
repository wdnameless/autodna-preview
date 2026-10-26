<?php
/**
 * AutoDNA Theme Functions and Definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AUTODNA_THEME_VERSION', '1.0.0' );

function autodna_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'autodna' ),
    ) );
}
add_action( 'after_setup_theme', 'autodna_theme_setup' );

function autodna_enqueue_assets() {
    // site-1: local fonts only (Orbitron + Helvetica Neue woff2), no Google Fonts
    wp_enqueue_style(
        'autodna-site1',
        get_template_directory_uri() . '/assets/css/site1.css',
        array(),
        AUTODNA_THEME_VERSION
    );

    wp_enqueue_script(
        'autodna-site1',
        get_template_directory_uri() . '/assets/js/site1.js',
        array(),
        AUTODNA_THEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'autodna_enqueue_assets' );

/** Fallback menu: the board's 9 anchors, used until a WP menu is assigned. */
function autodna_fallback_menu() {
    $items = array(
        '#home'      => 'Home',
        '#carlears'  => 'Who We Are',
        '#value'     => 'Why AutoDNA',
        '#compare'   => 'Price Comparison',
        '#services'  => 'Our Services',
        '#facts'     => 'Facts & Figures',
        '#corporate' => 'About AutoDNA',
        '#club'      => 'DNA Auto Club',
        '#contact'   => 'Contact',
    );
    echo '<ul>';
    foreach ( $items as $href => $label ) {
        printf(
            '<li><a href="%s">%s</a></li>',
            esc_url( home_url( '/' . $href ) ),
            esc_html( $label )
        );
    }
    echo '</ul>';
}

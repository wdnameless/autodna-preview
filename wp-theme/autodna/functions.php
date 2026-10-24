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
    // Google Fonts
    wp_enqueue_style(
        'autodna-fonts',
        'https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap',
        array(),
        null
    );

    // Main Style
    wp_enqueue_style(
        'autodna-core-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array( 'autodna-fonts' ),
        AUTODNA_THEME_VERSION
    );

    // Main Script
    wp_enqueue_script(
        'autodna-core-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        AUTODNA_THEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'autodna_enqueue_assets' );

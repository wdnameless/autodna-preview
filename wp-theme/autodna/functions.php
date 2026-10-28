<?php
/**
 * AutoDNA Theme Functions and Definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AUTODNA_THEME_VERSION', '1.1.0' );

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
    // base styles
    wp_enqueue_style(
        'autodna-site1',
        get_template_directory_uri() . '/assets/css/site1.css',
        array(),
        AUTODNA_THEME_VERSION
    );

    if ( is_page_template( 'page-skipthedealer.php' ) || is_page( 'skipthedealer' ) ) {
        wp_enqueue_style(
            'autodna-dealer',
            get_template_directory_uri() . '/assets/css/page-dealer.css',
            array( 'autodna-site1' ),
            AUTODNA_THEME_VERSION
        );
        wp_enqueue_script(
            'autodna-dealer',
            get_template_directory_uri() . '/assets/js/page-dealer.js',
            array(),
            AUTODNA_THEME_VERSION,
            true
        );
    } else {
        wp_enqueue_script(
            'autodna-site1',
            get_template_directory_uri() . '/assets/js/site1.js',
            array(),
            AUTODNA_THEME_VERSION,
            true
        );
    }
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

/** Gutenberg: pattern category + editor styles. */
function autodna_register_pattern_category() {
    register_block_pattern_category( 'autodna', array( 'label' => __( 'AutoDNA', 'autodna' ) ) );
}
add_action( 'init', 'autodna_register_pattern_category' );

function autodna_editor_setup() {
    add_editor_style( 'assets/css/site1.css' );
}
add_action( 'after_setup_theme', 'autodna_editor_setup' );

/** Customizer: editable contact fields used by footer/menu patterns. */
function autodna_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'autodna_contact', array( 'title' => __( 'AutoDNA Contact', 'autodna' ) ) );
    $fields = array(
        'autodna_phone'     => '+1 (403) 312-8306',
        'autodna_email'     => 'info@autodna.com',
        'autodna_address'   => '730 2 Ave SW, Calgary, T2P1R8, Canada',
        'autodna_facebook'  => '#',
        'autodna_x'         => '#',
        'autodna_instagram' => '#',
    );
    foreach ( $fields as $key => $def ) {
        $wp_customize->add_setting( $key, array( 'default' => $def, 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( $key, array(
            'label'   => ucwords( str_replace( '_', ' ', preg_replace( '/^autodna_/', '', $key ) ) ),
            'section' => 'autodna_contact',
            'type'    => 'text',
        ) );
    }
}
add_action( 'customize_register', 'autodna_customize_register' );

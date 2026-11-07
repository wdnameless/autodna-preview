<?php
/**
 * AutoDNA Theme Functions and Definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AUTODNA_THEME_VERSION', '1.6.0' );

require_once get_template_directory() . '/inc/content-defaults.php';
require_once get_template_directory() . '/inc/content-helpers.php';
require_once get_template_directory() . '/inc/sections-home.php';
require_once get_template_directory() . '/inc/customize-content.php';
require_once get_template_directory() . '/inc/menu-walker.php';
require_once get_template_directory() . '/inc/admin-tidy.php';

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
    } elseif ( is_page_template( 'page-autodnaflip.php' ) || is_page( 'dnainvest' ) ) {
        wp_enqueue_style(
            'autodna-flip',
            get_template_directory_uri() . '/assets/css/page-flip.css',
            array( 'autodna-site1' ),
            AUTODNA_THEME_VERSION
        );
        wp_enqueue_script(
            'autodna-flip',
            get_template_directory_uri() . '/assets/js/page-flip.js',
            array(),
            AUTODNA_THEME_VERSION,
            true
        );
    } elseif ( is_page_template( 'page-dnaservice.php' ) || is_page( 'dnaservice' )
        || is_page_template( 'page-drivecareplan.php' ) || is_page_template( 'page-paintbot.php' )
        || is_page_template( 'page-skiptheshop.php' ) ) {
        wp_enqueue_style(
            'autodna-service',
            get_template_directory_uri() . '/assets/css/page-service.css',
            array( 'autodna-site1' ),
            AUTODNA_THEME_VERSION
        );
        wp_enqueue_script(
            'autodna-service',
            get_template_directory_uri() . '/assets/js/page-service.js',
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

/** Fallback menu: same 9 anchors + services submenu, overlay markup. */
function autodna_fallback_menu() {
    $arrow = '<svg class="menu-arrow" viewBox="0 0 16 12" aria-hidden="true"><path d="M0 6H13M8 1.5L13 6L8 10.5"/></svg>';
    $items = array(
        array( '/', 'Home' ),
        array( '/#carlears', 'Who We Are' ),
        array( '/#value', 'Why AutoDNA' ),
        array( '/#compare', 'Price Comparison' ),
        array( '/#facts', 'Facts & Figures' ),
        array( '/#corporate', 'About AutoDNA' ),
        array( '/#club', 'DNA Auto Club' ),
        array( '/#contact', 'Contact' ),
    );
    echo '<ul class="menu-list">';
    foreach ( array_slice( $items, 0, 4 ) as $it ) {
        printf( '<li class="menu-item"><a href="%s" class="menu-link"><span class="menu-text">%s</span>%s</a></li>',
            esc_url( home_url( $it[0] ) ), esc_html( $it[1] ), $arrow );
    }
    printf( '<li class="menu-item menu-item--has-sub"><a href="%s" class="menu-link"><div style="display: flex; align-items: flex-end;"><span class="menu-text">Our Services</span><svg class="menu-chevron" viewBox="0 0 8 8" aria-hidden="true"><path d="M2 1L5 4L2 7"/></svg></div>%s</a><ul class="menu-sublist">',
        esc_url( home_url( '/#services' ) ), $arrow );
    foreach ( array(
        array( '/skipthedealer/', 'SkipTheDealer' ),
        array( '/skipthesearch/', '↳ SkipTheSearch' ),
        array( '/dnaservice/', 'AutoDNA Service' ),
        array( '/skiptheshop/', '↳ SkipTheShop™' ),
        array( '/drivecareplan/', '↳ DriveCarePlan™' ),
        array( '/commercial/', '↳ DriveCare Plan™ Commercial' ),
        array( '/paintbot/', '↳ PaintBot™' ),
        array( '/dnainvest/', 'AutoDNA Flip' ),
    ) as $sub ) {
        printf( '<li class="menu-subitem"><a href="%s" class="menu-sublink"><span class="menu-subtext">%s</span>%s</a></li>',
            esc_url( home_url( $sub[0] ) ), esc_html( $sub[1] ), $arrow );
    }
    echo '</ul></li>';
    foreach ( array_slice( $items, 4 ) as $it ) {
        printf( '<li class="menu-item"><a href="%s" class="menu-link"><span class="menu-text">%s</span>%s</a></li>',
            esc_url( home_url( $it[0] ) ), esc_html( $it[1] ), $arrow );
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
        $wp_customize->add_setting( $key, array( 'default' => $def, 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $key, array(
            'label'   => ucwords( str_replace( '_', ' ', preg_replace( '/^autodna_/', '', $key ) ) ),
            'section' => 'autodna_contact',
            'type'    => 'text',
        ) );
    }
}
add_action( 'customize_register', 'autodna_customize_register' );

/** Front-end hygiene for a marketing site: no generator/RSD/oEmbed/emoji bloat, no XML-RPC. */
function autodna_front_cleanup() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    add_filter( 'xmlrpc_enabled', '__return_false' );
}
add_action( 'init', 'autodna_front_cleanup' );

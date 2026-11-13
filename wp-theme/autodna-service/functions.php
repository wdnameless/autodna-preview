<?php
/**
 * AutoDNA Service Theme Functions and Definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AUTODNA_SERVICE_VERSION', '1.0.1' );

require_once get_template_directory() . '/inc/content-helpers.php';
require_once get_template_directory() . '/inc/customize-content.php';
require_once get_template_directory() . '/inc/menu-walker.php';
require_once get_template_directory() . '/inc/admin-tidy.php';
require_once get_template_directory() . '/inc/sections-service.php';

function autodna_service_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'autodna-service' ),
    ) );
}
add_action( 'after_setup_theme', 'autodna_service_setup' );

function autodna_service_enqueue_assets() {
    // local fonts (no Google Fonts request)
    wp_enqueue_style(
        'autodna-service-fonts',
        get_template_directory_uri() . '/assets/css/fonts.css',
        array(),
        AUTODNA_SERVICE_VERSION
    );
    // base styles
    wp_enqueue_style(
        'autodna-service',
        get_template_directory_uri() . '/assets/css/style.css',
        array( 'autodna-service-fonts' ),
        AUTODNA_SERVICE_VERSION
    );

    if ( is_front_page() ) {
        wp_enqueue_script(
            'autodna-service-main',
            get_template_directory_uri() . '/assets/js/main.js',
            array(),
            AUTODNA_SERVICE_VERSION,
            true
        );
    } else {
        wp_enqueue_script(
            'autodna-service-page',
            get_template_directory_uri() . '/assets/js/page-service.js',
            array(),
            AUTODNA_SERVICE_VERSION,
            true
        );
        $map = array(
            'page-skiptheshop.php'   => 'shop',
            'page-drivecareplan.php' => 'plan',
            'page-paintbot.php'      => 'paintbot',
        );
        $slug = get_page_template_slug();
        if ( ! isset( $map[ $slug ] ) ) {
            // Template not assigned yet: fall back to the page slug.
            foreach ( $map as $tpl => $k ) {
                if ( is_page( str_replace( array( 'page-', '.php' ), '', $tpl ) ) ) {
                    $slug = $tpl;
                    break;
                }
            }
        }
        if ( isset( $map[ $slug ] ) ) {
            $k = $map[ $slug ];
            wp_enqueue_style(
                'autodna-service-' . $k,
                get_template_directory_uri() . '/assets/css/page-' . $k . '.css',
                array( 'autodna-service' ),
                AUTODNA_SERVICE_VERSION
            );
        }
    }
}
add_action( 'wp_enqueue_scripts', 'autodna_service_enqueue_assets' );

/** Fallback menu: service pages, overlay markup. */
function autodna_service_fallback_menu() {
    $arrow = '<svg class="menu-arrow" viewBox="0 0 16 12" aria-hidden="true"><path d="M0 6H13M8 1.5L13 6L8 10.5"/></svg>';
    $items = array(
        array( '/', 'Service Overview' ),
        array( '/skiptheshop/', 'SkipTheShop' ),
        array( '/drivecareplan/', 'DriveCarePlan' ),
        array( '/paintbot/', 'PaintBot' ),
    );
    echo '<ul class="menu-list">';
    foreach ( $items as $it ) {
        printf( '<li class="menu-item"><a href="%s" class="menu-link"><span class="menu-text">%s</span>%s</a></li>',
            esc_url( home_url( $it[0] ) ), esc_html( $it[1] ), $arrow );
    }
    echo '</ul>';
}

/** Customizer: editable contact fields (header tel + board hitareas). */
function autodna_service_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'autodna_contact', array( 'title' => __( 'AutoDNA Contact', 'autodna-service' ) ) );
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
add_action( 'customize_register', 'autodna_service_customize_register' );

/** Front-end hygiene for a marketing site: no generator/RSD/oEmbed/emoji bloat, no XML-RPC. */
function autodna_service_front_cleanup() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    add_filter( 'xmlrpc_enabled', '__return_false' );
}
add_action( 'init', 'autodna_service_front_cleanup' );

<?php
/**
 * AutoDNA Service: visual editing in the Customizer.
 *
 * One section per page (Overview + 3 subpages), image-only controls —
 * the design is SVG boards, so texts live inside the boards and only
 * board/photo swaps are editable. Selective refresh per board.
 * No plugins required.
 *
 * @package AutoDNA Service
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function autodna_service_customize_content( $wp_customize ) {
    $img = function ( $id, $label, $section, $desc = '' ) use ( $wp_customize ) {
        $wp_customize->add_setting( $id, array( 'default' => 0, 'sanitize_callback' => 'absint', 'transport' => 'postMessage', 'capability' => 'edit_posts' ) );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, $id, array(
            'label' => $label, 'description' => $desc, 'section' => $section,
            'mime_type' => 'image',
        ) ) );
    };

    $wp_customize->add_section( 'adsvc_home', array(
        'title' => __( 'Service Overview page', 'autodna-service' ), 'priority' => 30,
    ) );
    $img( 'adsvc_home_desktop', __( 'Desktop board (SVG)', 'autodna-service' ), 'adsvc_home' );
    $img( 'adsvc_home_state_plan', __( '“Plan” state board (SVG)', 'autodna-service' ), 'adsvc_home' );
    $img( 'adsvc_home_state_paint', __( '“Paint” state board (SVG)', 'autodna-service' ), 'adsvc_home' );
    $img( 'adsvc_home_mobile', __( 'Mobile board (SVG)', 'autodna-service' ), 'adsvc_home' );

    $wp_customize->add_section( 'adsvc_shop', array(
        'title' => __( 'SkipTheShop page', 'autodna-service' ), 'priority' => 31,
    ) );
    $img( 'adsvc_shop_desktop', __( 'Desktop board (SVG)', 'autodna-service' ), 'adsvc_shop' );
    $img( 'adsvc_shop_mobile', __( 'Mobile board (SVG)', 'autodna-service' ), 'adsvc_shop' );

    $wp_customize->add_section( 'adsvc_plan', array(
        'title' => __( 'DriveCarePlan page', 'autodna-service' ), 'priority' => 32,
    ) );
    $img( 'adsvc_plan_desktop', __( 'Desktop board (SVG)', 'autodna-service' ), 'adsvc_plan' );
    $img( 'adsvc_plan_mob_top', __( 'Mobile top board (SVG)', 'autodna-service' ), 'adsvc_plan' );
    $img( 'adsvc_plan_mob_table', __( 'Mobile table board (SVG)', 'autodna-service' ), 'adsvc_plan' );
    $img( 'adsvc_plan_mob_bottom', __( 'Mobile bottom board (SVG)', 'autodna-service' ), 'adsvc_plan' );

    $wp_customize->add_section( 'adsvc_paint', array(
        'title' => __( 'PaintBot page', 'autodna-service' ), 'priority' => 33,
    ) );
    $img( 'adsvc_paint_desktop', __( 'Desktop board (SVG)', 'autodna-service' ), 'adsvc_paint' );
    $img( 'adsvc_paint_mobile', __( 'Mobile board (SVG)', 'autodna-service' ), 'adsvc_paint' );

    // Footer contacts live in section autodna_contact (functions.php).

    // ── SELECTIVE REFRESH: one partial per board ──────
    // 'settings' binding is REQUIRED: without it the preview renders
    // published values instead of the staged ones.
    if ( isset( $wp_customize->selective_refresh ) ) {
        // Board hitareas render contacts, so contact edits refresh the boards too.
        // (Header tel updates on Publish — it lives outside the refreshed <main>.)
        $adsvc_contacts = array( 'autodna_phone', 'autodna_email', 'autodna_address', 'autodna_facebook', 'autodna_x', 'autodna_instagram' );
        // Selector MUST be the callback's root: each callback renders its whole <main>.
        $map = array(
            'home'  => array(
                'body.home main.site-main',
                array( 'adsvc_home_desktop', 'adsvc_home_state_plan', 'adsvc_home_state_paint', 'adsvc_home_mobile' ),
                'autodna_service_section_home',
            ),
            'shop'  => array( 'main.shop-main', array( 'adsvc_shop_desktop', 'adsvc_shop_mobile' ), 'autodna_service_section_shop' ),
            'plan'  => array( 'main.plan-main', array( 'adsvc_plan_desktop', 'adsvc_plan_mob_top', 'adsvc_plan_mob_table', 'adsvc_plan_mob_bottom' ), 'autodna_service_section_plan' ),
            'paint' => array( 'main.paintbot-main', array( 'adsvc_paint_desktop', 'adsvc_paint_mobile' ), 'autodna_service_section_paint' ),
        );
        foreach ( $map as $name => $def ) {
            list( $selector, $settings, $fn ) = $def;
            $wp_customize->selective_refresh->add_partial( 'adsvc_p_' . $name, array(
                'selector'            => $selector,
                'settings'            => array_merge( $settings, $adsvc_contacts ),
                'capability'          => 'edit_posts',
                'render_callback'     => $fn,
                'container_inclusive' => true,
            ) );
        }
    }
}
add_action( 'customize_register', 'autodna_service_customize_content' );

/** Allow SVG uploads for board images (admin only, file-type checked). */
function autodna_service_allow_svg_upload( $mimes ) {
    if ( current_user_can( 'upload_files' ) ) {
        $mimes['svg'] = 'image/svg+xml';
    }
    return $mimes;
}
add_filter( 'upload_mimes', 'autodna_service_allow_svg_upload' );

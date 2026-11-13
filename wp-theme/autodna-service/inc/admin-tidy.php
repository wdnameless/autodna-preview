<?php
/**
 * AutoDNA Service: customer-proof admin.
 *
 * Managed pages render from the Customizer (boards + contacts), not the
 * editor: block editor off, editor box hidden, pointer notice shown,
 * non-admins cannot trash them, admin menu trimmed.
 *
 * @package AutoDNA Service
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Templates fully controlled by the theme (content comes from the Customizer, not the editor).
 */
function autodna_service_managed_templates() {
    return array(
        'page-skiptheshop.php',
        'page-drivecareplan.php',
        'page-paintbot.php',
    );
}

function autodna_service_is_managed_page( $post_id ) {
    $post_id = (int) $post_id;
    if ( $post_id <= 0 ) {
        return false;
    }
    // Front page renders via front-page.php automatically.
    if ( $post_id === (int) get_option( 'page_on_front' ) ) {
        return true;
    }
    return in_array( get_page_template_slug( $post_id ), autodna_service_managed_templates(), true );
}

// Gutenberg off on managed pages: its empty canvas confuses owners.
function autodna_service_disable_blocks_on_managed( $use, $post ) {
    if ( $post instanceof WP_Post && 'page' === $post->post_type && autodna_service_is_managed_page( $post->ID ) ) {
        return false;
    }
    return $use;
}
add_filter( 'use_block_editor_for_post', 'autodna_service_disable_blocks_on_managed', 10, 2 );

// Current edited page ID when it is a managed page, else 0.
function autodna_service_current_managed_id() {
    $screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
    if ( ! $screen || 'post' !== $screen->base || 'page' !== $screen->post_type ) {
        return 0;
    }
    $post_id = isset( $_GET['post'] ) ? (int) $_GET['post'] : 0;
    return autodna_service_is_managed_page( $post_id ) ? $post_id : 0;
}

// …and hide the classic editor box itself: its content is ignored by design.
function autodna_service_hide_editor_on_managed() {
    if ( autodna_service_current_managed_id() ) {
        echo '<style>#postdivrich{display:none!important}</style>';
    }
}
add_action( 'admin_head', 'autodna_service_hide_editor_on_managed' );

// Pointer notice on managed pages: content is edited in the Customizer.
function autodna_service_managed_page_notice() {
    if ( ! autodna_service_current_managed_id() ) {
        return;
    }
    $url = esc_url( admin_url( 'customize.php' ) );
    echo '<div class="notice notice-info" style="border-left-width:4px;padding:12px 16px;">'
        . '<p style="font-size:15px;margin:0 0 6px;"><strong>' . esc_html__( 'Edit this page visually, with live preview.', 'autodna-service' ) . '</strong></p>'
        . '<p style="font-size:14px;margin:0;">'
        . esc_html__( 'Open', 'autodna-service' )
        . ' <a href="' . $url . '" style="font-weight:600;">' . esc_html__( 'Appearance → Customize', 'autodna-service' ) . '</a>'
        . ' ' . esc_html__( '→ Service Overview / SkipTheShop / DriveCarePlan / PaintBot. Pick a board image on the left, see it instantly on the right, then Publish. Phone, email, address and socials live under AutoDNA Contact.', 'autodna-service' )
        . '</p></div>';
}
add_action( 'admin_notices', 'autodna_service_managed_page_notice' );

// Editors need this cap to open the Customizer (boards + AutoDNA Contact).
function autodna_service_editor_caps() {
    $role = get_role( 'editor' );
    if ( $role && ! $role->has_cap( 'edit_theme_options' ) ) {
        $role->add_cap( 'edit_theme_options' );
    }
}
add_action( 'init', 'autodna_service_editor_caps' );

// Trim the admin menu for everyone except administrators.
function autodna_service_trim_menu() {
    if ( current_user_can( 'manage_options' ) ) {
        return;
    }
    remove_menu_page( 'edit.php' );             // Posts (unused)
    remove_menu_page( 'edit-comments.php' );    // Comments
    remove_menu_page( 'plugins.php' );          // Plugins
    remove_menu_page( 'tools.php' );            // Tools
    remove_menu_page( 'users.php' );            // Users
    remove_menu_page( 'options-general.php' );  // Settings

    // Appearance: keep only Customize (boards + contacts live there).
    global $submenu;
    if ( isset( $submenu['themes.php'] ) ) {
        foreach ( $submenu['themes.php'] as $i => $item ) {
            if ( ! isset( $item[2] ) || 'customize.php' !== $item[2] ) {
                unset( $submenu['themes.php'][ $i ] );
            }
        }
    }
}
add_action( 'admin_menu', 'autodna_service_trim_menu', 999 );

// Guard: non-admins cannot trash/delete the 4 managed pages.
// NOTE: pre_trash_post is a FILTER ($check, $post, $prev) in modern WP, not an action.
function autodna_service_guard_trash( $check, $post, $previous_status ) {
    if ( current_user_can( 'manage_options' ) ) {
        return $check;
    }
    $post_id = $post instanceof WP_Post ? $post->ID : (int) $post;
    if ( $post_id > 0 && autodna_service_is_managed_page( $post_id ) ) {
        wp_die(
            esc_html__( 'This page is part of the website design and cannot be deleted. To change its content, use Appearance → Customize.', 'autodna-service' ),
            esc_html__( 'Protected page', 'autodna-service' ),
            array( 'back_link' => true )
        );
    }
    return $check;
}
add_filter( 'pre_trash_post', 'autodna_service_guard_trash', 10, 3 );

function autodna_service_guard_managed_pages( $post_id ) {
    if ( current_user_can( 'manage_options' ) ) {
        return;
    }
    $post = get_post( $post_id );
    if ( $post && 'page' === $post->post_type && autodna_service_is_managed_page( $post_id ) ) {
        wp_die(
            esc_html__( 'This page is part of the website design and cannot be deleted. To change its content, use Appearance → Customize.', 'autodna-service' ),
            esc_html__( 'Protected page', 'autodna-service' ),
            array( 'back_link' => true )
        );
    }
}
add_action( 'before_delete_post', 'autodna_service_guard_managed_pages', 10, 1 );

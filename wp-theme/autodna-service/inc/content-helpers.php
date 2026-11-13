<?php
/**
 * AutoDNA Service: content helpers reading Customizer (theme_mod).
 *
 * Same contract as the group theme: every adsvc_* key has a matching
 * Customizer setting; values preview live via selective refresh.
 * No value = theme-bundled $default. No plugins required.
 *
 * @package AutoDNA Service
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme-mod value or null when unset/empty.
 */
function adsvc_mod( $name ) {
    $v = get_theme_mod( $name, null );
    if ( is_string( $v ) ) {
        $v = trim( $v );
        return '' === $v ? null : $v;
    }
    if ( is_numeric( $v ) && (float) $v > 0 ) {
        return $v;
    }
    return null;
}

/**
 * Image URL, or theme-bundled $default (relative to theme assets/).
 * Accepts attachment ID (WP_Customize_Media_Control) or raw URL.
 */
function adsvc_img( $name, $default ) {
    $v = adsvc_mod( $name );
    if ( is_numeric( $v ) && (int) $v > 0 ) {
        $u = wp_get_attachment_url( (int) $v );
        if ( $u ) {
            return $u;
        }
    }
    if ( is_string( $v ) && '' !== $v && ! is_numeric( $v ) ) {
        return $v;
    }
    return get_template_directory_uri() . '/assets/' . ltrim( $default, '/' );
}

/**
 * Contact bundle from Customizer → AutoDNA Contact (+ derived hrefs).
 * Defaults match the register() fields in functions.php.
 *
 * @return array phone,email,tel,mailto,fb,x,ig,maps
 */
function adsvc_contact() {
    $phone = get_theme_mod( 'autodna_phone', '+1 (403) 312-8306' );
    $email = get_theme_mod( 'autodna_email', 'info@autodna.com' );
    $addr  = get_theme_mod( 'autodna_address', '730 2 Ave SW, Calgary, T2P1R8, Canada' );
    return array(
        'phone'  => $phone,
        'email'  => $email,
        'tel'    => 'tel:+' . preg_replace( '/\D+/', '', (string) $phone ),
        'mailto' => 'mailto:' . $email,
        'fb'     => get_theme_mod( 'autodna_facebook', '#' ),
        'x'      => get_theme_mod( 'autodna_x', '#' ),
        'ig'     => get_theme_mod( 'autodna_instagram', '#' ),
        'maps'   => 'https://maps.google.com/?q=' . rawurlencode( $addr ),
    );
}

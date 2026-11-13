<?php
/**
 * AutoDNA menu walker: renders the WP Primary menu inside the fullscreen
 * overlay with pixel-identical markup (Figma 464:3660).
 *
 * Top level:  <li class="menu-item[ menu-item--has-sub]"><a class="menu-link">
 *              <span class="menu-text">… + arrow svg (chevron wrap when children)
 * Children:   <ul class="menu-sublist"><li class="menu-subitem">
 *              <a class="menu-sublink"><span class="menu-subtext">…
 *
 * @package AutoDNA Service
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Autodna_Menu_Walker extends Walker_Nav_Menu {
    const ARROW = '<svg class="menu-arrow" viewBox="0 0 16 12" aria-hidden="true"><path d="M0 6H13M8 1.5L13 6L8 10.5"/></svg>';
    const CHEVRON = '<svg class="menu-chevron" viewBox="0 0 8 8" aria-hidden="true"><path d="M2 1L5 4L2 7"/></svg>';

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<ul class="menu-sublist">';
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $has_kids = in_array( 'menu-item-has-children', (array) $item->classes, true );
        $title = esc_html( $item->title );
        $url   = esc_url( $item->url );

        if ( 0 === $depth ) {
            $output .= '<li class="menu-item' . ( $has_kids ? ' menu-item--has-sub' : '' ) . '">';
            $output .= '<a href="' . $url . '" class="menu-link">';
            if ( $has_kids ) {
                $output .= '<div style="display: flex; align-items: flex-end;">'
                    . '<span class="menu-text">' . $title . '</span>'
                    . self::CHEVRON . '</div>' . self::ARROW;
            } else {
                $output .= '<span class="menu-text">' . $title . '</span>' . self::ARROW;
            }
            $output .= '</a>';
        } else {
            $output .= '<li class="menu-subitem">';
            $output .= '<a href="' . $url . '" class="menu-sublink">'
                . '<span class="menu-subtext">' . $title . '</span>' . self::ARROW
                . '</a>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</li>';
    }
}

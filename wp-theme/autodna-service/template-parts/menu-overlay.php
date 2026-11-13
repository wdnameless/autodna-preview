<?php
/**
 * Menu Overlay Template Part
 *
 * @package AutoDNA Service
 */
?>
<!-- ══ FULLSCREEN MENU OVERLAY (EXACT FIGMA 464:3660 MATCH) ══════════════ -->
<nav class="menu" id="menu" aria-label="Site menu" hidden>
  <div class="menu__container">
    <div class="menu__panel ticks">
      <span class="tick tl"></span>
      <span class="tick tr"></span>
      <span class="tick bl"></span>
      <span class="tick br"></span>

      <?php
      wp_nav_menu( array(
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '<ul class="menu-list">%3$s</ul>',
          'walker'         => new Autodna_Menu_Walker(),
          'fallback_cb'    => 'autodna_service_fallback_menu',
      ) );
      ?>
    </div>
  </div>
</nav>

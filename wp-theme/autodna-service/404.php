<?php
/**
 * 404 template: on-brand "not found" with a way home.
 *
 * @package AutoDNA Service
 */

get_header(); ?>

<main id="missing" style="min-height:70vh;display:flex;align-items:center;justify-content:center;text-align:center;padding:120px 24px 80px;">
  <div>
    <p style="font-family:Orbitron,'Arial Black',sans-serif;font-size:clamp(64px,12vw,160px);line-height:1;color:#fff;margin:0 0 16px;">404</p>
    <h1 style="font-size:clamp(20px,3vw,32px);color:#c2b9ff;font-weight:400;margin:0 0 24px;"><?php esc_html_e( 'This page drove off the lot.', 'autodna-service' ); ?></h1>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="display:inline-block;border:1px solid #c2b9ff;color:#fff;text-decoration:none;padding:14px 34px;font-size:16px;letter-spacing:.12em;"><?php esc_html_e( 'BACK TO HOME', 'autodna-service' ); ?></a>
  </div>
</main>

<?php
get_footer();

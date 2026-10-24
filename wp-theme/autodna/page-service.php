<?php
/**
 * Template Name: Autodna — DNA Service
 *
 * @package Autodna
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<div class="dna-frame-wrap">
<div class="frame" data-frame="service">
<img class="base" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/service/base.png" alt="" width="1440" height="5418">
<p style="left:399px;top:4038px;width:347px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:40.00px;font-weight:300;line-height:37.20px;letter-spacing:-0.80px;color:#c2b9ff;text-transform:uppercase;text-align:left;white-space:pre-wrap">Inside the Mind of AutoDNA.</p>
<p style="left:758px;top:4419px;width:283px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:20.00px;font-weight:300;line-height:20.00px;letter-spacing:-0.40px;color:#ffffff;text-transform:none;text-align:justified;white-space:pre-wrap">And It’s born where great people work together with one clear vision — to redefine car care.</p>
<p style="left:452px;top:4568px;width:537px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:40.00px;font-weight:300;line-height:37.20px;letter-spacing:-0.80px;color:#e1d9ff;text-transform:uppercase;text-align:center;white-space:pre-wrap">They’re the reason AutoDNA feels different.</p>
<p style="left:593px;top:4809px;width:226px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:20.00px;font-weight:300;line-height:20.00px;letter-spacing:-0.40px;color:#ffffff;text-transform:uppercase;text-align:left;white-space:pre-wrap">contact with us</p>
<p style="left:593px;top:3607px;width:226px;font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;font-size:20.00px;font-weight:300;line-height:20.00px;letter-spacing:-0.40px;color:#ffffff;text-transform:none;text-align:left;white-space:pre-wrap">AutoDnaService</p>
</div>
</div>

<script>
(function () {
  var frame = document.querySelector('.dna-frame-wrap .frame');
  if (!frame) return;
  function fit() {
    var scale = Math.min(1, window.innerWidth / 1440);
    frame.style.transform = 'scale(' + scale + ')';
    frame.parentNode.style.height = (frame.offsetHeight * scale) + 'px';
  }
  fit();
  window.addEventListener('resize', fit);
})();
</script>

<?php get_footer();

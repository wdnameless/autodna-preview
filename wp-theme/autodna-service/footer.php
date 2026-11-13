<?php wp_footer(); ?>
<script>
// admin bar offset guard: fixed HUD + sticky header must clear WP admin bar
(function () {
  function fix() {
    var bar = document.getElementById('wpadminbar');
    if (!bar) return;
    var hud = document.querySelector('.hud');
    if (hud) hud.style.top = bar.offsetHeight + 'px';
    var sticky = document.querySelector('.sticky-header');
    if (sticky) sticky.style.top = (bar.offsetHeight + 32) + 'px';
  }
  window.addEventListener('load', fix);
  document.addEventListener('DOMContentLoaded', fix);
})();
</script>
</body>
</html>

<?php wp_footer(); ?>
<script>
// admin bar offset guard: fixed HUD must clear WP admin bar
(function () {
  function fix() {
    var bar = document.getElementById('wpadminbar');
    var hud = document.querySelector('.hud');
    if (bar && hud) hud.style.top = bar.offsetHeight + 'px';
  }
  window.addEventListener('load', fix);
  document.addEventListener('DOMContentLoaded', fix);
})();
</script>
</body>
</html>

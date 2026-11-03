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
// universal preloader finish: subpage scripts don't hide it, so guarantee it here
(function () {
  var el = document.getElementById('preloader');
  if (!el) return;
  var done = false;
  function finish() {
    if (done || el.classList.contains('is-done')) { done = true; return; }
    done = true;
    el.classList.add('is-done');
    document.body.style.overflow = '';
    document.body.classList.add('hero-in');
  }
  window.addEventListener('load', function () { setTimeout(finish, 900); });
  setTimeout(finish, 5000);
})();
</script>
</body>
</html>

<!DOCTYPE html>
<html <?php language_attributes(); ?> data-tema="<?php echo isset($_COOKIE['mt_theme']) ? esc_attr($_COOKIE['mt_theme']) : 'dark'; ?>">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Arquivo-Memória de Ativismo Digital — midiatatica.net">
<?php wp_head(); ?>
<script>
(function() {
    var tema = document.cookie.match(/mt_theme=([^;]+)/);
    if (tema) {
        document.documentElement.setAttribute('data-tema', tema[1]);
    } else {
        document.documentElement.setAttribute('data-tema', 'dark');
    }
})();
</script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<button class="theme-toggle" id="toggle-tema" title="Alternar tema claro/escuro">
    <span id="theme-icon">&#9789;</span> <span id="theme-label">CLARO</span>
</button>
<script>
/* Toggle de tema INLINE — não depende de terminal.js (funciona mesmo com JS desatualizado) */
(function() {
    if (window.__mtToggleBound) return;
    window.__mtToggleBound = true;
    function mtUpdate() {
        var dark = document.documentElement.getAttribute('data-tema') === 'dark';
        var icon = document.getElementById('theme-icon');
        var label = document.getElementById('theme-label');
        if (icon) icon.innerHTML = dark ? '&#9788;' : '&#9789;';
        if (label) label.textContent = dark ? 'CLARO' : 'ESCURO';
    }
    function mtBind() {
        var btn = document.getElementById('toggle-tema');
        if (!btn) return;
        btn.addEventListener('click', function() {
            var h = document.documentElement, c = h.getAttribute('data-tema');
            if (c === 'dark') { h.removeAttribute('data-tema'); document.cookie = 'mt_theme=light; path=/; max-age=31536000'; }
            else { h.setAttribute('data-tema', 'dark'); document.cookie = 'mt_theme=dark; path=/; max-age=31536000'; }
            mtUpdate();
        });
        mtUpdate();
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', mtBind);
    else mtBind();
})();
</script>
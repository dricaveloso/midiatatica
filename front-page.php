<?php
/**
 * Front Page — Acesso Direto + Busca
 */
get_header();
?>

<!-- ═══ BOOT SEQUENCE — primeira entrada da sessão (clique para pular) ═══ -->
<style>
/* Boot sequence — crítico, inline para funcionar mesmo com CSS desatualizado */
#boot-sequence{position:fixed;top:0;left:0;width:100%;height:100%;background:var(--bg,#0a0a0f);z-index:99999;display:flex;flex-direction:column;justify-content:flex-start;padding:2.5rem;overflow-y:auto;cursor:pointer;font-family:'Space Mono','Courier New',monospace}
#boot-sequence.hidden{display:none}
.boot-line{color:var(--accent,#00ff41);margin-bottom:.3rem;opacity:0;font-size:.95rem;white-space:pre-wrap}
.boot-line.visible{opacity:1}
.boot-line.error{color:#ff4444}
.boot-line.warn{color:var(--archive-amber,#ffb800)}
.boot-line.info{color:var(--text-dim,#888)}
.boot-cursor{display:inline-block;width:12px;height:22px;background:var(--accent,#00ff41);animation:mtBlink .5s infinite;margin-top:10px}
@keyframes mtBlink{0%,100%{opacity:1}50%{opacity:0}}
@media (max-width:768px){#boot-sequence{padding:1.25rem}}
</style>
<div id="boot-sequence">
    <div id="boot-content"></div>
    <div class="boot-cursor"></div>
</div>
<script>
(function() {
    'use strict';
    var bootEl = document.getElementById('boot-sequence');
    if (!bootEl) return;

    // Só exibe na primeira entrada da sessão
    var seen = false;
    try { seen = sessionStorage.getItem('mt_booted') === '1'; } catch (e) {}
    if (seen) { bootEl.classList.add('hidden'); return; }

    var now = new Date();
    var formattedDate = now.toLocaleDateString('en-US', { month: '2-digit', day: '2-digit', year: '2-digit' });
    var formattedTime = now.toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit', second: '2-digit' });

    var bootLines = [
        { text: 'BIOS Date: ' + formattedDate + ' ' + formattedTime + ' Ver 20.00', type: 'info', delay: 100 },
        { text: 'CPU: ActivistCore(tm) 64FX-2 Processor', type: 'info', delay: 200 },
        { text: 'Checking system integrity...', type: 'info', delay: 400 },
        { text: '[ OK ] Memory: 64TB Tactical Storage', type: 'success', delay: 200 },
        { text: '[ OK ] Processor: Organic-Silicon Bridge', type: 'success', delay: 150 },
        { text: '> Establishing secure link to /midiatatica/...', type: 'info', delay: 300 },
        { text: '> WARNING: Archive contains subversive material', type: 'warn', delay: 500 },
        { text: '> Proceeding with caution...', type: 'warn', delay: 300 },
        { text: '> Loading interface modules...', type: 'info', delay: 400 },
        { text: '> UI.tactical_v4.2 injected successfully', type: 'success', delay: 200 },
        { text: '> Decryption keys: ACTIVE', type: 'success', delay: 150 },
        { text: '> System ready. Welcome, activist.', type: 'success', delay: 600 }
    ];

    // Trava o scroll da página enquanto a boot roda
    document.documentElement.style.overflow = 'hidden';
    document.body.style.overflow = 'hidden';

    var content = document.getElementById('boot-content');
    var lineIndex = 0, finished = false;

    function finish() {
        if (finished) return;
        finished = true;
        try { sessionStorage.setItem('mt_booted', '1'); } catch (e) {}
        document.documentElement.style.overflow = '';
        document.body.style.overflow = '';
        bootEl.classList.add('hidden');
        var html = document.documentElement, prev = html.style.scrollBehavior;
        html.style.scrollBehavior = 'auto';
        window.scrollTo(0, 0);
        html.style.scrollBehavior = prev;
    }

    function showNextLine() {
        if (finished) return;
        if (lineIndex >= bootLines.length) { setTimeout(finish, 900); return; }
        var line = bootLines[lineIndex];
        setTimeout(function() {
            if (finished) return;
            var div = document.createElement('div');
            div.className = 'boot-line ' + line.type + ' visible';
            div.textContent = line.text;
            content.appendChild(div);
            lineIndex++;
            showNextLine();
        }, line.delay);
    }

    bootEl.addEventListener('click', finish);
    showNextLine();
})();
</script>

    <div class="container">

        <div class="protocol-box">
            [PROTOCOL: ARCHIVE_RECOVERY_v4.2]
        </div>

        <header>
            <div class="logo-main">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Mídia Tática</a>
            </div>
            <div class="tagline-main">ARQUIVO-MEMÓRIA DE ATIVISMO DIGITAL</div>
        </header>


        <div class="mt-system-line">
            <span>[SISTEMA DE ARQUIVOS TÁTICOS v4.2]</span>
            <a href="<?php echo esc_url( home_url( '/sobre/' ) ); ?>">Saiba mais</a>
        </div>

        <h2>Acesso Direto</h2>

        <!-- BUSCA-FRONT -->
        <form role="search" method="get" class="search-form-box" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div style="display: flex; gap: 0.5rem;">
                <input type="search" class="search-field" name="s" value="<?php echo isset($_GET['s']) ? esc_attr($_GET['s']) : ''; ?>" placeholder="Pesquisar..." required style="flex: 1;">
                <button type="submit" class="search-icon-btn">Pesquisar</button>
            </div>
        </form>

        <div class="fs-nav">
            <a href="https://arquivos.midiatatica.net/" class="fs-item">
                <span class="perms">drwxr-xr-x</span>
                <div class="fs-icon">&#128193;</div>
                <div class="fs-name">arquivos_taticos/</div>
                <div class="fs-meta">Documentos táticos (PDF, TXT)</div>
            </a>
            <a href="<?php echo esc_url( home_url( '/videos/' ) ); ?>" class="fs-item">
                <span class="perms">drwxr-xr-x</span>
                <div class="fs-icon">&#9654;</div>
                <div class="fs-name">videos_taticos/</div>
                <div class="fs-meta">Registros em vídeo (.mp4, .mkv)</div>
            </a>
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="fs-item">
                <span class="perms">drwxr-xr-x</span>
                <div class="fs-icon">&#128221;</div>
                <div class="fs-name">blog_tatico/</div>
                <div class="fs-meta">Registros textuais e reflexões (.md, .txt)</div>
            </a>
            <a href="https://quantumfagia.midiatatica.net/" class="fs-item">
                <span class="perms">drwx------</span>
                <div class="fs-icon">&lt;/&gt;</div>
                <div class="fs-name">quantumfagia/</div>
                <div class="fs-meta">Laboratório de pesquisa ativa</div>
            </a>
        </div>

        <?php get_footer(); ?>

    </div>

</body>
</html>
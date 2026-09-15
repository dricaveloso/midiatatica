<?php
/**
 * Tactical Footer — Console + Status + Licença
 */

// Garante o terminal novo mesmo se o functions.php estiver indisponível,
// e remove o terminal antigo do tema pai para não rodar em duplicata.
wp_dequeue_script( 'tactical-terminal' );
wp_enqueue_script( 'midiatatica-terminal', get_stylesheet_directory_uri() . '/terminal.js', array(), '4.2.8', true );
?>

        <style>
/* Console — paleta segue o tema (claro: branco/preto | escuro: preto/verde). Inline: funciona mesmo com style.css desatualizado. */
:root{--c-bg:#ffffff;--c-txt:#0a0a0a;--c-acc:#dc2626;--c-dim:#525252}
[data-tema="dark"]{--c-bg:#050508;--c-txt:#e8e8e8;--c-acc:#00ff41;--c-dim:#888888}
.terminal-box{background:var(--c-bg)!important;border:1px solid var(--border,#e5e5e5)!important;border-radius:4px}
[data-tema="dark"] .terminal-box{border-color:var(--c-acc)!important;box-shadow:inset 0 0 20px rgba(0,255,65,.05)!important}
#terminal-output{color:var(--c-dim)!important}
.terminal-line{color:var(--c-txt)!important;white-space:pre-wrap;word-break:break-word;margin-bottom:.5rem}
.terminal-line.cmd{color:var(--c-acc)!important}
.terminal-line.error{color:#ff4444!important}
.terminal-line.success{color:var(--c-txt)!important}
.terminal-line.warn{color:#ffb800!important}
.terminal-input-row{display:flex;gap:.75rem;align-items:center;margin-top:1.25rem;border-top:1px solid var(--border,#e5e5e5);padding-top:1rem}
.terminal-input{background:transparent!important;border:none;border-bottom:1px solid var(--c-acc);color:var(--c-txt)!important;outline:none;width:100%;font-family:inherit;font-size:1rem;caret-color:var(--c-acc)}
.terminal-input::placeholder{color:var(--c-dim)}
.terminal-loading{color:var(--c-acc);font-style:italic}
</style>
<h2>Console de Comando</h2>
        <div class="terminal-box">
            <div id="terminal-output"></div>
            <div class="terminal-input-row">
                <span style="font-weight: 700; color: var(--c-acc, #dc2626);">&gt;</span>
                <input type="text" class="terminal-input" id="terminal-input" placeholder="DIGITE HELP..." spellcheck="false" autocomplete="off">
            </div>
        </div>

        <div class="status-bar" style="margin-top: 2.5rem; justify-content: center; gap: 1.5rem;">
            <span>[STATUS] 2002 - <?php echo date('Y'); ?></span>
            <span style="opacity: 0.3">::</span>
            <span style="font-weight: 700;">ESTADO: ATIVO</span>
        </div>

        <footer>
            <div class="quote">"A memoria e um ato politico. Arquivar e resistir."</div>
            <div class="footer-links">
                <a href="https://quantumfagia.substack.com" target="_blank">[SUBSTACK]</a>
                <a href="https://padlet.com/quantumfagia/memorias-taticas-omcv6hpxbw3r5b96" target="_blank">[PADLET]</a>
            </div>
            <div class="license-text">
                midiatatica.net e um projeto gerado a partir de uma literatura coletiva, e possivel, gracas ao empenho colaborativo em compartilhar conhecimento e experiencias atraves destas publicacoes, assim como a disponibilidade digital dos arquivos e suas devidas licencas atribuidas. Sob licenca <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Atribuicao-NaoComercial-CompartilhaIgual 4.0 Internacional (CC BY-NC-SA 4.0)</a>
            </div>
            <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank" class="cc-badge">
                <img src="https://arquivos.midiatatica.net/wp-content/uploads/sites/6/2026/06/creative-commons.png" alt="Creative Commons BY-NC-SA 4.0">
            </a>
            <div class="uptime">
                &copy; <?php echo date('Y'); ?> ARCHIVE_RESISTANCE // ENCRYPTED_STREAM<br>
                quantumfagia@proton.me
            </div>
        </footer>

    </div><!-- /.container -->

<?php wp_footer(); ?>
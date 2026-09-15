<?php
/**
 * 404 — Recurso Não Encontrado
 */
get_header();
?>

    <div class="container">

        <div class="protocol-box">
            [PROTOCOL: 404_RECOVERY_v2.0]
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

        <div class="breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">[HOME]</a>
            <span class="breadcrumb-sep">/</span>
            <span>[ERRO_404]</span>
        </div>

        <h1>Recurso Não Encontrado</h1>

        <div class="status-bar" style="justify-content: center;">
            <span>[STATUS: FALHA]</span>
            <span style="margin: 0 1rem;">::</span>
            <span>HTTP 404</span>
        </div>

        <div class="error-box">
            <div class="error-code">404</div>
            <div class="error-message"><?php esc_html_e( 'Nothing found for the requested page.', 'midiatatica' ); ?></div>
            <div class="error-detail">
                O arquivo ou página solicitada não existe no arquivo tático.<br>
                Verifique o endereço ou utilize a busca abaixo.
            </div>
            <div class="error-trace">
                <div class="trace-line">Traceback (most recent call last):</div>
                <div class="trace-line">  File "/srv/www/midiatatica/<span class="trace-file"><?php echo esc_html( $_SERVER['REQUEST_URI'] ); ?></span>", line 1</div>
                <div class="trace-line">    <span class="trace-func">load_resource()</span></div>
                <div class="trace-line">ResourceNotFoundError: O caminho solicitado não foi localizado no arquivo.</div>
            </div>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="back-link">&lt; VOLTAR AO ARQUIVO</a>
        </div>

        <?php get_search_form(); ?>

        <?php get_footer(); ?>

    </div>

</body>
</html>
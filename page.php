<?php
/**
 * Page — Página genérica
 */
get_header();
?>

    <div class="container">

        <div class="protocol-box">
            [PROTOCOL: PAGE_RECOVERY_v4.2]
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


        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">[HOME]</a>
                <span class="breadcrumb-sep">/</span>
                <span>[<?php echo strtoupper( esc_html( get_the_title() ) ); ?>]</span>
            </div>

            <div class="post-header">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="post-meta">
                    <span>[PÁGINA]</span>
                    <span>::</span>
                    <span>[ID: #<?php the_ID(); ?>]</span>
                    <?php edit_post_link( '[EDITAR]', '<span>::</span> ', '' ); ?>
                </div>
            </div>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <?php if ( comments_open() || get_comments_number() ) : ?>
                <div class="comments-area">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>

        <?php endwhile; endif; ?>

        <?php get_footer(); ?>

    </div>

</body>
</html>
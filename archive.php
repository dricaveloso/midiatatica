<?php
/**
 * Archive — Arquivo genérico
 */
get_header();
?>

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

        <div class="breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">[HOME]</a>
            <span class="breadcrumb-sep">/</span>
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">[BLOG_TATICO]</a>
            <span class="breadcrumb-sep">/</span>
            <span>[ARQUIVO]</span>
        </div>

        <h1><?php the_archive_title(); ?></h1>

        <?php if ( have_posts() ) : ?>
            <div class="status-bar">
                <span>[REGISTROS DO ARQUIVO]</span>
                <span><?php echo $wp_query->found_posts; ?> ENTRADA<?php echo $wp_query->found_posts !== 1 ? 'S' : ''; ?></span>
            </div>
            <div class="post-list">
                <?php while ( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="post-item">
                        <div class="post-item-title"><?php the_title(); ?></div>
                        <div class="post-item-meta">
                            <span>[<?php echo get_the_date('d.m.Y'); ?>]</span>
                            <span>[AUTOR: <?php the_author(); ?>]</span>
                            <span>[ID: #<?php the_ID(); ?>]</span>
                        </div>
                        <div class="post-item-excerpt">
                            <?php $excerpt = get_the_excerpt(); if ( empty( $excerpt ) ) { $excerpt = wp_trim_words( get_the_content(), 30, '...' ); } echo esc_html( wp_trim_words( $excerpt, 25, '...' ) ); ?>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            <div class="pagination">
                <?php echo paginate_links( array( 'prev_text' => '&lt; ANTERIOR', 'next_text' => 'PRÓXIMO &gt;', 'type' => 'plain' ) ); ?>
            </div>
        <?php else : ?>
            <div class="no-posts">[AVISO] Nenhum registro encontrado.<br>Status: VAZIO</div>
        <?php endif; ?>

        <?php get_footer(); ?>

    </div>

</body>
</html>
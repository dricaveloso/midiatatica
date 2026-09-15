<?php
/**
 * Author — Arquivo do autor
 */
get_header();
?>

    <div class="container">

        <div class="protocol-box">
            [PROTOCOL: AUTHOR_RECOVERY_v4.2]
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
            <span>[AUTOR]</span>
        </div>

        <?php the_post(); ?>

        <h1><?php the_author(); ?></h1>

        <div class="author-profile">
            <div class="author-name"><?php the_author_link(); ?></div>
            <div class="author-meta">
                <span>[UID: <?php echo esc_html( get_the_author_meta('ID') ); ?>]</span>
                <span>[POSTS: <?php echo count_user_posts( get_the_author_meta('ID') ); ?>]</span>
                <span>[DESDE: <?php echo esc_html( mysql2date('d.m.Y', get_the_author_meta('user_registered') ) ); ?>]</span>
            </div>
            <?php if ( '' != get_the_author_meta( 'user_description' ) ) : ?>
                <div class="author-bio"><?php echo wp_kses_post( get_the_author_meta( 'user_description' ) ); ?></div>
            <?php endif; ?>
        </div>

        <?php rewind_posts(); ?>

        <?php if ( have_posts() ) : ?>
            <h2>Publicações do Autor</h2>
            <div class="status-bar">
                <span>[REGISTROS DO AUTOR]</span>
                <span><?php echo count_user_posts( get_the_author_meta('ID') ); ?> ENTRADA<?php echo count_user_posts( get_the_author_meta('ID') ) !== 1 ? 'S' : ''; ?></span>
            </div>
            <div class="post-list">
                <?php while ( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="post-item">
                        <div class="post-item-title"><?php the_title(); ?></div>
                        <div class="post-item-meta">
                            <span>[<?php echo get_the_date('d.m.Y'); ?>]</span>
                            <span>[ID: #<?php the_ID(); ?>]</span>
                            <?php if ( get_the_category() ) : ?>
                                <span>[CAT: <?php echo esc_html( get_the_category()[0]->name ); ?>]</span>
                            <?php endif; ?>
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
            <div class="status-bar"><span>[STATUS: SEM REGISTROS]</span><span>0 ENTRADAS</span></div>
            <div class="no-posts">[AVISO] Nenhuma publicação encontrada para este autor.<br>Status: VAZIO</div>
        <?php endif; ?>

        <?php get_footer(); ?>

    </div>

</body>
</html>
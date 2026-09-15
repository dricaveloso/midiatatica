<?php
/**
 * Single Post
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


        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">[HOME]</a>
                <span class="breadcrumb-sep">/</span>
                <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">[BLOG_TATICO]</a>
                <span class="breadcrumb-sep">/</span>
                <?php $categories = get_the_category(); if ( ! empty( $categories ) ) { $cat = $categories[0]; echo '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">[' . strtoupper( esc_html( $cat->name ) ) . ']</a>'; } else { echo '<span>[ARQUIVO]</span>'; } ?>
                <span class="breadcrumb-sep">/</span>
                <span>[POST_<?php the_ID(); ?>]</span>
            </div>

            <div class="post-header">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="post-meta">
                    <span>[AUTOR: <?php the_author(); ?>]</span>
                    <span>::</span>
                    <span>[DATA: <?php echo get_the_date('d.m.Y'); ?>]</span>
                    <span>::</span>
                    <span>[ID: #<?php the_ID(); ?>]</span>
                </div>
            </div>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <?php $tags = get_the_tags(); if ( $tags ) : ?>
            <div class="post-tags">
                <?php foreach ( $tags as $tag ) : ?>
                    <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="post-tag">#<?php echo esc_html( $tag->name ); ?></a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div class="post-nav">
                <?php $prev = get_previous_post(); $next = get_next_post(); ?>
                <?php if ( $prev ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $prev ) ); ?>"><span class="nav-label">&lt; ANTERIOR</span><?php echo esc_html( $prev->post_title ); ?></a>
                <?php else: ?><span></span><?php endif; ?>
                <?php if ( $next ) : ?>
                    <a href="<?php echo esc_url( get_permalink( $next ) ); ?>" style="text-align: right;"><span class="nav-label">PRÓXIMO &gt;</span><?php echo esc_html( $next->post_title ); ?></a>
                <?php else: ?><span></span><?php endif; ?>
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
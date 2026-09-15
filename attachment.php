<?php
/**
 * Attachment — Anexo
 */
get_header();
?>

    <div class="container">

        <div class="protocol-box">
            [PROTOCOL: ATTACHMENT_RECOVERY_v4.2]
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


        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); global $post; ?>

            <div class="breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">[HOME]</a>
                <span class="breadcrumb-sep">/</span>
                <a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>">[<?php echo strtoupper( esc_html( get_the_title( $post->post_parent ) ) ); ?>]</a>
                <span class="breadcrumb-sep">/</span>
                <span>[ANEXO]</span>
            </div>

            <h1><?php the_title(); ?></h1>

            <div class="attachment-meta">
                <span>[<?php echo get_the_date('d.m.Y'); ?>]</span>
                <span>[TIPO: <?php echo esc_html( get_post_mime_type() ); ?>]</span>
                <span>[ID: #<?php the_ID(); ?>]</span>
                <?php edit_post_link( '[EDITAR]', '', '', null, 'edit-link' ); ?>
            </div>

            <a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" class="parent-link">
                <span>&larr;</span> Voltar para "<?php echo esc_html( get_the_title( $post->post_parent ) ); ?>"
            </a>

            <div class="attachment-nav">
                <div><?php previous_image_link( false, '&lsaquo; ANTERIOR' ); if ( ! get_previous_image_link() ) echo '<span class="nav-placeholder">&lsaquo; ANTERIOR</span>'; ?></div>
                <div><?php next_image_link( false, 'PRÓXIMA &rsaquo;' ); if ( ! get_next_image_link() ) echo '<span class="nav-placeholder">PRÓXIMA &rsaquo;</span>'; ?></div>
            </div>

            <?php if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, 'full' ); ?>
                <div class="attachment-image-container">
                    <a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" rel="attachment">
                        <img src="<?php echo esc_url( $att_image[0] ); ?>" width="<?php echo esc_attr( $att_image[1] ); ?>" height="<?php echo esc_attr( $att_image[2] ); ?>" alt="<?php echo esc_attr( $post->post_excerpt ); ?>">
                    </a>
                </div>
            <?php else : ?>
                <div class="attachment-file-box">
                    <a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" rel="attachment">&#128196; <?php echo esc_html( basename( $post->guid ) ); ?></a>
                </div>
            <?php endif; ?>

            <?php if ( ! empty( $post->post_excerpt ) ) : ?>
                <div class="attachment-caption"><?php the_excerpt(); ?></div>
            <?php endif; ?>

            <?php comments_template(); ?>

        <?php endwhile; endif; ?>

        <?php get_footer(); ?>

    </div>

</body>
</html>
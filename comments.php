<?php
/**
 * BlankSlate comments.php — Comments Template with Tactical Terminal Aesthetic
 *
 * This is an included template. Styles are embedded to ensure they work
 * when loaded within parent templates via comments_template().
 */
?>
<style>
    .comments-section-title {
        color: var(--tactical-green);
        font-size: 1.35rem;
        margin: 2.5rem 0 1.25rem;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: bold;
    }

    .comments-section-title::before {
        content: '>';
        color: var(--tactical-dim);
    }

    .comments-container {
        margin: 2rem 0;
    }

    .comment-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .comment-list li {
        background: var(--bg-secondary);
        border: 1px solid var(--border);
        padding: 1.25rem;
        transition: border-color 0.2s;
    }

    .comment-list li:hover {
        border-color: var(--tactical-dim);
    }

    .comment-list li.depth-2,
    .comment-list li.depth-3,
    .comment-list li.depth-4,
    .comment-list li.depth-5 {
        margin-left: 2rem;
        border-left: 2px solid var(--tactical-dim);
    }

    .comment-meta {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 0.75rem;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .comment-author {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .comment-author .avatar {
        border: 1px solid var(--tactical-dim);
        background: var(--bg);
    }

    .comment-author .fn {
        color: var(--tactical-green);
        font-weight: bold;
        font-style: normal;
    }

    .comment-author .fn a {
        color: inherit;
        text-decoration: none;
    }

    .comment-author .fn a:hover {
        text-decoration: underline;
    }

    .comment-author .says {
        color: var(--text-dim);
        font-size: 0.85rem;
    }

    .comment-metadata {
        font-size: 0.75rem;
        color: var(--text-dim);
    }

    .comment-metadata a {
        color: var(--text-dim);
        text-decoration: none;
    }

    .comment-metadata a:hover {
        color: var(--archive-amber);
    }

    .comment-metadata .edit-link {
        margin-left: 0.5rem;
        color: var(--archive-amber);
    }

    .comment-content {
        color: var(--text);
        font-size: 0.95rem;
        line-height: 1.7;
        padding-left: 3rem;
    }

    .comment-content p {
        margin-bottom: 0.75rem;
    }

    .comment-content p:last-child {
        margin-bottom: 0;
    }

    .reply {
        margin-top: 0.75rem;
        padding-left: 3rem;
    }

    .reply a {
        color: var(--tactical-green);
        text-decoration: none;
        font-size: 0.8rem;
        border: 1px solid var(--tactical-dim);
        padding: 0.35rem 0.75rem;
        transition: all 0.2s;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .reply a:hover {
        border-color: var(--tactical-green);
        background: rgba(0, 255, 65, 0.05);
    }

    .bypostauthor {
        border-color: var(--archive-amber) !important;
    }

    .bypostauthor .comment-author .fn {
        color: var(--archive-amber);
    }

    .comments-navigation {
        margin: 1.5rem 0;
        padding: 1rem;
        border: 1px solid var(--border);
        background: var(--bg-secondary);
        display: flex;
        justify-content: center;
    }

    .paginated-comments-links {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .paginated-comments-links a,
    .paginated-comments-links span {
        color: var(--tactical-green);
        text-decoration: none;
        font-size: 0.8rem;
        padding: 0.35rem 0.75rem;
        border: 1px solid var(--border);
        transition: all 0.2s;
    }

    .paginated-comments-links a:hover {
        border-color: var(--tactical-green);
        background: rgba(0, 255, 65, 0.05);
    }

    .paginated-comments-links .current {
        color: var(--archive-amber);
        border-color: var(--archive-amber);
    }

    /* Pingbacks / Trackbacks */
    .pingback-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pingback-list li {
        background: var(--bg-secondary);
        border: 1px solid var(--border);
        padding: 0.75rem 1rem;
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
        color: var(--text-dim);
    }

    .pingback-list li a {
        color: var(--tactical-green);
        text-decoration: none;
    }

    .pingback-list li a:hover {
        text-decoration: underline;
    }

    .ping-count {
        color: var(--archive-amber);
        font-weight: bold;
    }

    /* Comment Form */
    .comment-respond {
        margin-top: 2.5rem;
        background: var(--bg-secondary);
        border: 1px solid var(--border);
        padding: 1.5rem;
    }

    .comment-reply-title {
        color: var(--tactical-green);
        font-size: 1.15rem;
        text-transform: uppercase;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: bold;
    }

    .comment-reply-title::before {
        content: '>';
        color: var(--tactical-dim);
    }

    .comment-reply-title small {
        margin-left: auto;
        font-size: 0.8rem;
    }

    .comment-reply-title small a {
        color: var(--archive-amber);
        text-decoration: none;
        border: 1px solid var(--border);
        padding: 0.25rem 0.5rem;
        transition: all 0.2s;
    }

    .comment-reply-title small a:hover {
        border-color: var(--archive-amber);
    }

    .comment-form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .comment-form p {
        margin: 0;
    }

    .comment-form label {
        display: block;
        color: var(--tactical-green);
        font-size: 0.85rem;
        margin-bottom: 0.4rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .comment-form input[type="text"],
    .comment-form input[type="email"],
    .comment-form input[type="url"],
    .comment-form textarea {
        background: var(--bg);
        border: 1px solid var(--tactical-dim);
        color: var(--text);
        padding: 0.75rem 1rem;
        font-family: 'JetBrains Mono', 'Courier New', monospace;
        font-size: 0.95rem;
        width: 100%;
        outline: none;
        caret-color: var(--tactical-green);
    }

    .comment-form input[type="text"]:focus,
    .comment-form input[type="email"]:focus,
    .comment-form input[type="url"]:focus,
    .comment-form textarea:focus {
        border-color: var(--tactical-green);
        box-shadow: 0 0 10px rgba(0, 255, 65, 0.1);
    }

    .comment-form textarea {
        min-height: 120px;
        resize: vertical;
    }

    .comment-form input[type="submit"] {
        background: transparent;
        border: 1px solid var(--tactical-green);
        color: var(--tactical-green);
        padding: 0.75rem 1.5rem;
        font-family: 'JetBrains Mono', 'Courier New', monospace;
        font-size: 0.9rem;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.2s;
    }

    .comment-form input[type="submit"]:hover {
        background: rgba(0, 255, 65, 0.1);
        border-color: var(--tactical-green);
    }

    .comment-form .required {
        color: var(--error-red, #ff4444);
    }

    .comment-form-cookies-consent {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .comment-form-cookies-consent input[type="checkbox"] {
        accent-color: var(--tactical-green);
    }

    .comment-form-cookies-consent label {
        margin: 0;
        text-transform: none;
        color: var(--text-dim);
        font-size: 0.85rem;
    }

    .logged-in-as {
        color: var(--text-dim);
        font-size: 0.85rem;
        margin-bottom: 1rem;
    }

    .logged-in-as a {
        color: var(--tactical-green);
        text-decoration: none;
    }

    .logged-in-as a:hover {
        text-decoration: underline;
    }

    .no-comments {
        text-align: center;
        color: var(--text-dim);
        padding: 2rem;
        border: 1px solid var(--border);
        margin: 1.5rem 0;
        font-style: italic;
    }

    @media (max-width: 768px) {
        .comment-content {
            padding-left: 0;
            margin-top: 0.75rem;
        }

        .reply {
            padding-left: 0;
        }

        .comment-author {
            flex-wrap: wrap;
        }

        .comment-meta {
            flex-direction: column;
        }

        .comment-list li.depth-2,
        .comment-list li.depth-3,
        .comment-list li.depth-4,
        .comment-list li.depth-5 {
            margin-left: 1rem;
        }
    }
</style>

<div id="comments">

<?php
// Trackbacks / Pingbacks Section
if ( have_comments() ) :
    global $comments_by_type;
    $comments_by_type = separate_comments( $comments );

    // Comments List
    if ( ! empty( $comments_by_type['comment'] ) ) :
?>
    <section id="comments-list" class="comments">
        <h2 class="comments-section-title"><?php comments_number( '0 Comentários', '1 Comentário', '% Comentários' ); ?></h2>

        <?php if ( get_comment_pages_count() > 1 ) : ?>
        <nav id="comments-nav-above" class="comments-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Comments Navigation', 'blankslate' ); ?>">
            <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
        </nav>
        <?php endif; ?>

        <ul class="comment-list">
            <?php wp_list_comments( 'type=comment' ); ?>
        </ul>

        <?php if ( get_comment_pages_count() > 1 ) : ?>
        <nav id="comments-nav-below" class="comments-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Comments Navigation', 'blankslate' ); ?>">
            <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
        </nav>
        <?php endif; ?>
    </section>
<?php
    endif;

    // Pingbacks / Trackbacks List
    if ( ! empty( $comments_by_type['pings'] ) ) :
        $ping_count = count( $comments_by_type['pings'] );
?>
    <section id="trackbacks-list" class="comments">
        <h2 class="comments-section-title"><span class="ping-count"><?php echo esc_html( $ping_count ); ?></span> <?php echo esc_html( _nx( 'Trackback ou Pingback', 'Trackbacks e Pingbacks', $ping_count, 'comments count', 'blankslate' ) ); ?></h2>
        <ul class="pingback-list">
            <?php wp_list_comments( 'type=pings&callback=blankslate_custom_pings' ); ?>
        </ul>
    </section>
<?php
    endif;
endif;

// Comment Form
if ( comments_open() && ! post_password_required() ) {
    comment_form( array(
        'title_reply'          => 'Deixar Comentário',
        'title_reply_to'       => 'Responder %s',
        'cancel_reply_link'    => '[CANCELAR]',
        'label_submit'         => 'Enviar Comentário',
        'comment_field'        => '<p><label for="comment">[MENSAGEM] &gt;</label><textarea id="comment" name="comment" required></textarea></p>',
        'logged_in_as'         => '<p class="logged-in-as">[SESSAO_ATIVA] uid=' . get_current_user_id() . ' (' . wp_get_current_user()->display_name . ')</p>',
        'class_form'           => 'comment-form',
        'class_submit'         => 'submit',
        'submit_field'         => '<p>%1$s %2$s</p>',
    ) );
}
?>

</div>

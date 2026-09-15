<?php
/**
 * Mídia Tática — Tema Unificado (Claro/Vermelho + Escuro/Verde)
 * Version: 4.2.8
 */

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'midiatatica-style', get_stylesheet_uri(), array(), '4.2.8' );
    wp_enqueue_style( 'midiatatica-font', 'https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap', array(), null );
    wp_enqueue_script( 'midiatatica-terminal', get_stylesheet_directory_uri() . '/terminal.js', array(), '4.2.8', true );
});

add_action( 'after_setup_theme', function() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    register_nav_menus( array( 'main-menu' => __( 'Main Menu', 'midiatatica' ) ) );
});

add_action( 'pre_get_posts', function( $query ) {
    if ( ! is_admin() && $query->is_main_query() && $query->is_search() ) {
        $query->set( 'post_type', array( 'post', 'page', 'attachment' ) );
        $query->set( 'posts_per_page', 20 );
    }
});

add_filter( 'get_search_form', function( $form ) {
    $action = esc_url( home_url( '/' ) );
    $value  = isset($_GET['s']) ? esc_attr( $_GET['s'] ) : '';
    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>';
    return '<form role="search" method="get" class="search-form-box" action="' . $action . '"><label for="search-field">[BUSCA] &gt; Procurar no arquivo:</label><div style="display:flex;gap:0.5rem;"><input type="search" id="search-field" class="search-field" name="s" value="' . $value . '" placeholder="Digite um termo de busca..." required style="flex:1;"><button type="submit" class="search-icon-btn">' . $icon . ' BUSCAR</button></div></form>';
});

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
/**
 * O tema pai (BlankSlate) carrega um terminal.js antigo em js/terminal.js.
 * Removemos para não rodar dois terminais em paralelo (comandos duplicados).
 */
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_script( 'tactical-terminal' );
}, 100 );

<?php

function flake_titre () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
}

function flake_register_assets() {
    wp_register_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_register_script('bootstrap_script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', [], false, true );
    wp_enqueue_script('bootstrap_script');
    wp_enqueue_style('bootstrap_css');
   
}

function flake_title_separator () {
    return ' | ' ;
}

function flake_document_title_parts ($title) {
    unset($title['tagline']);
    return $title;
}

function flake_menu_class ($classes) {
    $classes[] = 'nav-item';
    return $classes;

}


function flake_menu_link($atts) {
    $atts['class'] = 'nav-link';
    return $atts;

}

function flake_pagination() {
    $pages = paginate_links(['type' => 'array']) ;
    if ( $pages == null ) {
        return;
    }
    echo '<nav aria-label="Pagination">';
    echo '<ul class ="pagination">';
    $pages = paginate_links(['type' => 'array']) ;
    foreach($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class .'">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
}

add_action('after_setup_theme', 'flake_titre');
add_action('wp_enqueue_scripts', 'flake_register_assets' );
add_filter('document_title_separator', 'flake_title_separator');
add_filter('document_title_parts', 'flake_document_title_parts');
add_filter('nav-menu-css-class', 'flake_menu_class');
add_filter('nav_menu_link_attributes', 'flake_menu_link');

?>
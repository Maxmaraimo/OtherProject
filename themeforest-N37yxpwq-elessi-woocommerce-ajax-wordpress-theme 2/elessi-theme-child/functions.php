<?php
//
// Recommended way to include parent theme styles.
// (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 998);
function theme_enqueue_styles() {
    $prefix = function_exists('elessi_prefix_theme') ? elessi_prefix_theme() : 'elessi';
    wp_enqueue_style($prefix . '-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style($prefix . '-child-style', get_stylesheet_uri());
}

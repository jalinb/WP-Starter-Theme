<?php
/**
 * Functions for admin enqueues
 */


// Theme Editor Styles
// function theme_editor_styles() {
//     add_editor_style( 'editor-style.css' );
// }
// add_action( 'init', 'theme_editor_styles' );




// ACF Styles
function acf_admin_style() {
    wp_register_style( 'acf_styles', get_stylesheet_directory_uri() . '/assets/css/acf.css' );
    wp_enqueue_style( 'acf_styles' );
}
add_action( 'admin_enqueue_scripts', 'acf_admin_style' );

?>
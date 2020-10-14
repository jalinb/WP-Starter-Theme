<?php
/**
 * Theme Enqueues
 */

// Theme JS & CSS
function theme_enqueue_styles() {
    // Main Style Sheet
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    // Custom JS file
    wp_enqueue_script( 'theme-script', get_stylesheet_directory_uri() . '/assets/js/app.js', array( 'jquery' ) );

    // FontAwesome
    wp_enqueue_style( 'fontawesome-style', get_stylesheet_directory_uri() . '/assets/css/all.min.css' );
    wp_enqueue_script( 'fontawesome-script', get_stylesheet_directory_uri() . '/assets/js/all.min.js', array( 'jquery' ) );
    
    // Bootstrap 4.5.0 CSS
    wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );
    
    // Flickity CSS
    wp_enqueue_style( 'flickity-style', get_stylesheet_directory_uri() . '/assets/css/flickity.css' );
    // Flickity JS
    wp_enqueue_script( 'flickity-script', get_stylesheet_directory_uri() . '/assets/js/flickity.pkgd.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );




// Removing default jQuery
function modify_jquery() {
    if (!is_admin()) {
        // comment out the lines below to load the local copy of jQuery
        wp_deregister_script('jquery');
        // jQuery 3.5.1
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', false, '3.5.1');
        wp_enqueue_script('jquery');


        // Bootstrap 4.5.0
        wp_enqueue_script( 'popper-script', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'bootstrap-script', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ) );
    }
}
add_action('init', 'modify_jquery');




// Add Responsive Style Sheet Last (999 meaing load 999th in position)
function responsive_styles() {
    wp_enqueue_style( 'responsive-styles', get_stylesheet_directory_uri() . '/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'responsive_styles', 999 );

?>
<?php
/**
 * Functions for custom image sizes
 */

// Custom Image Sizes
add_theme_support( 'post-thumbnails' );
add_image_size( 'map-icon', 60, 60 ); // Map Icon
add_image_size( 'gallery-thumb', 380, 250, array( 'center', 'center' ) ); // Gallery Thumbnail
add_image_size( 'team-thumb', 380, 300, array( 'center', 'center' ) ); // Team Thumbnail
add_image_size( 'card-thumb', 600, 400, array( 'center', 'center' ) ); // Card Thumbnail
add_image_size( 'community-thumb', 380, 250, array( 'center', 'center' ) ); // Community Thumbnail
add_image_size( 'community-preview', 730, 300, array( 'center', 'center' ) ); // Community Preview
add_image_size( 'portrait-thumb', 450, 600, array( 'center', 'center' ) ); // Portrait Thumbnail
?>
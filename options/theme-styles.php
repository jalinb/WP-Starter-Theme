<?php 
/**
 * Template that generates CSS from the theme & community styles
 */

// If is a community page pull Community Options
if (is_singular('communities')):
    // Get the the posts taxonomy
    $term_obj_list  = get_the_terms( $post->ID, 'community' );
    $terms_string   = wp_list_pluck($term_obj_list, 'term_id');

    $header_font_link       = get_field('header_font_link', 'community_' . $terms_string[0]); 
    $header_font_family     = get_field('header_font_family', 'community_' . $terms_string[0]); 
    $body_font_link         = get_field('body_font_link', 'community_' . $terms_string[0]); 
    $body_font_family       = get_field('body_font_family', 'community_' . $terms_string[0]); 
    $theme_primary_color    = get_field('theme_primary_color', 'community_' . $terms_string[0]); 
    $theme_secondary_color  = get_field('theme_secondary_color', 'community_' . $terms_string[0]); 
    $theme_tertiary_color   = get_field('theme_tertiary_color', 'community_' . $terms_string[0]); 
    $theme_quaternary_color = get_field('theme_quaternary_color', 'community_' . $terms_string[0]); 
// Else pull Theme Options
else:
    $header_font_link       = get_field('header_font_link', 'option'); 
    $header_font_family     = get_field('header_font_family', 'option'); 
    $body_font_link         = get_field('body_font_link', 'option');
    $body_font_family       = get_field('body_font_family', 'option');  
    $theme_primary_color    = get_field('theme_primary_color', 'option'); 
    $theme_secondary_color  = get_field('theme_secondary_color', 'option'); 
    $theme_tertiary_color   = get_field('theme_tertiary_color', 'option'); 
    $theme_quaternary_color = get_field('theme_quaternary_color', 'option'); 
endif;
 
// Opaque Secondary Color
$color = $theme_secondary_color;
$rgb = hex2rgba($color);
$rgba = hex2rgba($color, 0.5);
?>

<!-- Theme Font-Family -->
<?php echo $header_font_link; ?>
<?php echo $body_font_link; ?>

<!-- Theme Styles -->
<style type="text/css">
    /* --------------------
        General
    -------------------- */
    body {
        font-family: <?php echo $body_font_family; ?> !important;
    }
    h1, h2, h3, h4, h5, h6 {
        font-family: <?php echo $header_font_family; ?> !important;
    }
    .font-header {
        font-family: <?php echo $header_font_family; ?> !important;
    }
    .font-body {
        font-family: <?php echo $body_font_family; ?> !important;
    }
    /* Selection Colors */
    ::selection {
        background: <?php echo $theme_secondary_color; ?> !important;
    }
        ::-moz-selection {
        background: <?php echo $theme_secondary_color; ?> !important;
    }
    /* --------------------
        Text
    -------------------- */
    .color-primary {
        color: <?php echo $theme_primary_color; ?> !important;
    }
    .color-secondary {
        color: <?php echo $theme_secondary_color; ?> !important;
    }
    .color-tertiary {
        color: <?php echo $theme_tertiary_color; ?> !important;
    }
    .color-quaternary {
        color: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* Color Hovers */
    .color-primary-hover:hover {
        color: <?php echo $theme_primary_color; ?> !important;
    }
    .color-secondary-hover:hover {
        color: <?php echo $theme_secondary_color; ?> !important;
    }
    .color-tertiary-hover:hover {
        color: <?php echo $theme_tertiary_color; ?> !important;
    }
    .color-quaternary-hover:hover {
        color: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* --------------------
        Backgrounds
    -------------------- */
    .bg-primary {
        background: <?php echo $theme_primary_color; ?> !important;
    }
    .bg-secondary {
        background: <?php echo $theme_secondary_color; ?> !important;
    }
    .bg-tertiary {
        background: <?php echo $theme_tertiary_color; ?> !important;
    }
    .bg-quaternary {
        background: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* Background Hovers */
    .bg-primary-hover:hover {
        background: <?php echo $theme_primary_color; ?> !important;
    }
    .bg-secondary-hover:hover {
        background: <?php echo $theme_secondary_color; ?> !important;
    }
    .bg-secondary-opaque-hover:hover {
        background: <?php echo $rgba; ?> !important;
    }
    .bg-tertiary-hover:hover {
        background: <?php echo $theme_tertiary_color; ?> !important;
    }
    .bg-quaternary-hover:hover {
        background: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* --------------------
        Anchor Text 
    -------------------- */
    a.anchor-primary {
        color: <?php echo $theme_primary_color; ?> !important;
    }
    a.anchor-secondary {
        color: <?php echo $theme_secondary_color; ?> !important;
    }
    a.anchor-tertiary {
        color: <?php echo $theme_tertiary_color; ?> !important;
    }
    a.anchor-quaternary {
        color: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* Anchor Hovers */
    a.anchor-primary-hover:hover {
        color: <?php echo $theme_primary_color; ?> !important;
    }
    a.anchor-secondary-hover:hover {
        color: <?php echo $theme_secondary_color; ?> !important;
    }
    a.anchor-tertiary-hover:hover {
        color: <?php echo $theme_tertiary_color; ?> !important;
    }
    a.anchor-quaternary-hover:hover {
        color: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* --------------------
        Buttons 
    -------------------- */
    .btn-primary {
        background: <?php echo $theme_primary_color; ?> !important;
        color: #fff !important;
        border: 0 !important;
    }
    .btn-secondary {
        background: <?php echo $theme_secondary_color; ?> !important;
        color: #fff !important;
        border: 0 !important;
    }
    .btn-tertiary {
        background: <?php echo $theme_tertiary_color; ?> !important;
        color: #fff !important;
        border: 0 !important;
    }
    .btn-quaternary {
        background: <?php echo $theme_quaternary_color; ?> !important;
        color: #fff !important;
        border: 0 !important;
    }
    /* Button Hovers Only */
    .btn-primary-hover:hover {
        background: <?php echo $theme_primary_color; ?> !important;
    }
    .btn-secondary-hover:hover {
        background: <?php echo $theme_secondary_color; ?> !important;
    }
    .btn-tertiary-hover:hover {
        background: <?php echo $theme_tertiary_color; ?> !important;
    }
    .btn-quaternary-hover:hover {
        background: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* Stoked Buttons */
    .btn-primary-stroke {
        background: transparent;
        border: 1px solid <?php echo $theme_primary_color; ?>;
        color: <?php echo $theme_primary_color; ?> !important;
    }
    .btn-primary-stroke:hover {
        background: <?php echo $theme_primary_color; ?>;
        border: 1px solid <?php echo $theme_primary_color; ?>;
        color: #fff !important;
    }
    .btn-secondary-stroke {
        background: transparent;
        border: 1px solid <?php echo $theme_secondary_color; ?>;
        color: <?php echo $theme_secondary_color; ?> !important;
    }
    .btn-secondary-stroke:hover {
        background: <?php echo $theme_secondary_color; ?>;
        border: 1px solid <?php echo $theme_secondary_color; ?>;
        color: #fff !important;
    }
    .btn-tertiary-stroke {
        background: transparent;
        border: 1px solid <?php echo $theme_tertiary_color; ?>;
        color: <?php echo $theme_tertiary_color; ?> !important;
    }
    .btn-tertiary-stroke:hover {
        background: <?php echo $theme_tertiary_color; ?>;
        border: 1px solid <?php echo $theme_tertiary_color; ?>;
        color: #fff !important;
    }
    .btn-quaternary-stroke {
        background: transparent;
        border: 1px solid <?php echo $theme_quaternary_color; ?>;
        color: <?php echo $theme_quaternary_color; ?> !important;
    }
    .btn-quaternary-stroke:hover {
        background: <?php echo $theme_quaternary_color; ?>;
        border: 1px solid <?php echo $theme_quaternary_color; ?>;
        color: #fff !important;
    }
    /* WP Search Button */
    input.search-submit {
        background: <?php echo $theme_primary_color; ?>;
        border-radius: 0;
    }
    /* --------------------
        Border 
    -------------------- */
    .border-primary {
        border-color: <?php echo $theme_primary_color; ?> !important;
    }
    .border-secondary {
        border-color: <?php echo $theme_secondary_color; ?> !important;
    }
    .border-tertiary {
        border-color: <?php echo $theme_tertiary_color; ?> !important;
    }
    .border-quaternary {
        border-color: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* Border Hovers */
    .border-primary-hover:hover {
        border-color: <?php echo $theme_primary_color; ?> !important;
    }
    .border-secondary-hover:hover {
        border-color: <?php echo $theme_secondary_color; ?> !important;
    }
    .border-tertiary-hover:hover {
        border-color: <?php echo $theme_tertiary_color; ?> !important;
    }
    .border-quaternary-hover:hover {
        border-color: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* --------------------
        Pseudo Classes
    -------------------- */
    /* Before */
    .before-primary *:before {
        color: <?php echo $theme_primary_color; ?> !important;
    }
    .before-secondary *:before {
        color: <?php echo $theme_secondary_color; ?> !important;
    }
    .before-tertiary *:before {
        color: <?php echo $theme_tertiary_color; ?> !important;
    }
    .before-quaternary *:before {
        color: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* After */
    .after-primary *:after {
        color: <?php echo $theme_primary_color; ?> !important;
    }
    .after-secondary *:after {
        color: <?php echo $theme_secondary_color; ?> !important;
    }
    .after-tertiary *:after {
        color: <?php echo $theme_tertiary_color; ?> !important;
    }
    .after-quaternary *:after {
        color: <?php echo $theme_quaternary_color; ?> !important;
    }
    /* --------------------
        Miscellaneous 
    -------------------- */
    /* Modal Close */
    .close {
        color: <?php echo $theme_primary_color; ?> !important;
    }
    /* Google Maps */
    .gm-style {
        font-family: <?php echo $body_font_family; ?> !important;
    }
    /* Sub-Menu Top Arrow */
    .desktop-navigation .sub-menu:after {
        border-bottom-color: <?php echo $theme_primary_color; ?> !important;
    }
    /* Footer Social Links */
    footer .social-icon a {
        border: 1px solid <?php echo $theme_primary_color; ?> !important;
        color: <?php echo $theme_primary_color; ?> !important;
    }
    footer .social-icon a:hover {
        background: <?php echo $theme_secondary_color; ?> !important;
        border-color: transparent !important;
        color: #fff !important;
    }
    /* Communities List Block */
    .community-link:hover {
        color: #fff !important;
    }
    .active {
        color: <?php echo $theme_primary_color; ?> !important;
    }
    .service-active {
        border-color: <?php echo $theme_secondary_color; ?> !important;
    }
    /* Text Overlay Arrow */
    .overlay-content.order-md-1:before {
        border-right: 20px solid <?php echo $theme_primary_color; ?> !important;
    }
    .overlay-content.order-md-0:before {
        border-left: 20px solid <?php echo $theme_primary_color; ?> !important;
        left: unset !important;
        right: -40px !important;
    }
    /* Sitemap */
    .sitemap .page_item a:hover {
        color: <?php echo $theme_primary_color; ?> !important;
    }
</style>

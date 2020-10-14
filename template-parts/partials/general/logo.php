<?php
/**
 * The template for displaying the large logo
 */
?>

<?php 
// Get the the posts taxonomy
$term_obj_list  = get_the_terms( $post->ID, 'community' );
$terms_string   = wp_list_pluck($term_obj_list, 'term_id');

// If a community page get Community Options if not get Theme Options
if (is_singular('communities')):
    $home_link      = get_field('community_home_page', 'community_' . $terms_string[0]);
    $logo_class     = 'community-logo';
    $brand_name     = get_field('brand_name', 'community_' . $terms_string[0]);
    $large_logo     = get_field('large_logo', 'community_' . $terms_string[0]);
    $logo_path      = pathinfo($large_logo['url']);
else:
    $home_link      = get_site_url();
    $logo_class     = 'brand-logo';
    $brand_name     = get_field('brand_name', 'option');
    $large_logo     = get_field('large_logo', 'option'); 
    $logo_path      = pathinfo($large_logo['url']);
endif;
?>

<div class="<?php echo $logo_class; ?> mx-0 mx-md-auto">
    <a href="<?php echo $home_link; ?>">
        <?php if($logo_path['extension'] == 'svg'): ?>
            <?php echo file_get_contents($large_logo['url']); ?>
        <?php else: ?>
            <img src="<?php echo $large_logo['url']; ?>" alt="<?php echo $brand_name; ?>" />
        <?php endif; ?>
    </a>
</div>

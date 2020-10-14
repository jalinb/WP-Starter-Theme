<?php
/**
 * The template for displaying the top bar
 */
?> 

<?php
// Get the the posts taxonomy
$term_obj_list      = get_the_terms( $post->ID, 'community' );
$terms_string       = wp_list_pluck($term_obj_list, 'term_id');

// If a community page get Community Options if not get Theme Options
if (is_singular('communities')):
    $contact_page       = get_field('contact_page', 'community_' . $terms_string[0]);
    $careers_page       = get_field('careers_page', 'community_' . $terms_string[0]);
    $careers_target     = $careers_page['target'] ? $careers_page['target'] : '_self';
    $address_line_1     = get_field('address_line_1', 'community_' . $terms_string[0]);
    $address_line_2     = get_field('address_line_2', 'community_' . $terms_string[0]);
    $city_state_zip     = get_field('city_state_zip', 'community_' . $terms_string[0]);
    $google_maps_url    = get_field('google_maps_url', 'community_' . $terms_string[0]);
else:
    $contact_page       = get_field('contact_page', 'option');
    $careers_page       = get_field('careers_page', 'option');
    $careers_target     = $careers_page['target'] ? $careers_page['target'] : '_self';
    $address_line_1     = get_field('address_line_1', 'option');
    $address_line_2     = get_field('address_line_2', 'option');
    $city_state_zip     = get_field('city_state_zip', 'option');
    $google_maps_url    = get_field('google_maps_url', 'option');
endif;
?>

<div class="d-flex justify-content-end w-100 white">
    <div class="d-flex py-2 font-header">

        <a href="tel:<?php get_template_part( 'template-parts/partials/general/phone', 'number' ); ?>" class="d-flex anchor-secondary-hover">
            <div class="phone-icon mr-1">
                <i class="fas fa-phone"></i>
            </div>
            <?php get_template_part( 'template-parts/partials/general/phone', 'number' ); ?>
        </a>

        <div class="border-right mx-2"></div>

        <a href="<?php echo $contact_page; ?>" class="text-uppercase anchor-secondary-hover">Contact Us</a>

        <div class="border-right mx-2"></div>

        <a href="<?php echo $careers_page['url']; ?>" target="<?php echo $careers_target; ?>" class="text-uppercase anchor-secondary-hover">Interested in a career?</a>

        <div class="border-right mx-2"></div>

        <?php get_template_part( 'template-parts/partials/general/social', 'menu' ); ?>
    </div>
    
</div>

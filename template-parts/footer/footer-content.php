<?php
/**
 * The template for displaying the footer content
 */

?>

<?php 
// Get the the posts taxonomy
$term_obj_list  = get_the_terms( $post->ID, 'community' );
$terms_string   = wp_list_pluck($term_obj_list, 'term_id');

// If a community page get Community Options if not get Theme Options
if (is_singular('communities')):
    $contact_page   = get_field('contact_page', 'community_' . $terms_string[0]);
    $home_link      = get_field('community_home_page', 'community_' . $terms_string[0]);
    $logo_class     = 'community-logo';
    $brand_name     = get_field('brand_name', 'community_' . $terms_string[0]);
    $large_logo     = get_field('large_logo', 'community_' . $terms_string[0]);
    $logo_path      = pathinfo($large_logo['url']);
else:
    $contact_page   = get_field('contact_page', 'option');
    $home_link      = get_site_url();
    $logo_class     = 'brand-logo';
    $brand_name     = get_field('brand_name', 'option');
    $large_logo     = get_field('large_logo', 'option'); 
    $logo_path      = pathinfo($large_logo['url']);
endif;

$background_image   = get_field('background_image', 'option');


?> 

<section class="footer">
    <div class="bg-light position-relative">

        <div class="position-absolute h-100 w-100 bg-img" style="background-image:url('<?php echo $background_image['url']; ?>');"></div>

        <div class="container footer-wrap py-5">
            <div class="row justify-content-between">
    
                <div class="col-12 col-md-3 mb-4 mb-md-0">
                    <div class="footer-logo-wrap <?php echo $logo_class; ?> mb-2">
                        <a href="<?php echo $home_link; ?>">
                            <?php if($logo_path['extension'] == 'svg'): ?>
                                <?php echo file_get_contents($large_logo['url']); ?>
                            <?php else: ?>
                                <img src="<?php echo $large_logo['url']; ?>" alt="<?php echo $brand_name; ?>" />
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="footer-contact font-header my-3">
                        <div class="footer-address d-flex align-items-center mb-1">
                            <div class="phone-icon text-large d-inline-block mr-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="d-inline-block text-small">
                                <?php get_template_part( 'template-parts/partials/general/brand', 'address' ); ?>
                            </div>
                        </div>
                        <div class="footer-phone d-flex align-items-center">
                            <div class="phone-icon text-large mr-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <a href="tel:<?php get_template_part( 'template-parts/partials/general/phone', 'number' ); ?>" class="d-flex anchor-secondary-hover">
                                <?php get_template_part( 'template-parts/partials/general/phone', 'number' ); ?>
                            </a>
                        </div>
                    </div>
                    <a href="<?php echo $contact_page; ?>" class="btn btn-primary-stroke btn-secondary-hover btn-hover-nostroke mb-4">Contact Us</a>
                    <?php get_template_part( 'template-parts/partials/general/footer-social', 'menu' ); ?>
                    <?php if (is_singular('communities')): ?>
                        <a href="<?php echo get_site_url(); ?>" class="managed d-flex align-items-start color-primary anchor-secondary-hover d-block font-weight-black mt-3">Managed by <img src="/wp-content/uploads/vivage.svg" alt="Vivage Senior Living" class="ml-1"></a>
                    <?php endif; ?>
                </div>

                <div class="col-12 col-md-9 d-flex justify-content-between mb-4 mb-md-0">
                    <?php get_template_part( 'template-parts/footer/footer', 'nav-wrap' ); ?>
                </div>
    
            </div>
        </div>

    </div>
    
    <div class="bg-primary border-top border-width border-secondary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php get_template_part( 'template-parts/footer/copyright' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
/**
 * The template for displaying the list of communities by state
 */

?>

<?php
$hide_block             = get_sub_field('hide_block');
$filter_by_state        = get_sub_field('filter_by_state');
$filtered_state         = get_sub_field('filtered_state');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');
$post_title_color       = get_sub_field('post_title_color');
$image_border_color     = get_sub_field('image_border_color');
$button_type            = get_sub_field('button_type');
$button_style           = get_sub_field('button_style');
$button_hover           = get_sub_field('button_hover');

// Post Title Color 
if($post_title_color == 'primary'):
    $post_ttl_color = 'color-primary';
elseif($post_title_color == 'secondary'):
    $post_ttl_color = 'color-secondary';
elseif($post_title_color == 'tertiary'):
    $post_ttl_color = 'color-tertiary';
elseif($post_title_color == 'quaternary'):
    $post_ttl_color = 'color-quaternary';               
elseif($post_title_color == 'white'):
    $post_ttl_color = 'color-white';
elseif($post_title_color == 'dark'):
    $post_ttl_color = 'color-dark';
elseif($post_title_color == 'black'):
    $post_ttl_color = 'color-black';
elseif($post_title_color == 'default'):
    $post_ttl_color = '';
endif;

// Image Border Color
if($image_border_color == 'primary'):
    $img_border_color = 'color-primary';
elseif($image_border_color == 'secondary'):
    $img_border_color = 'color-secondary';
elseif($image_border_color == 'tertiary'):
    $img_border_color = 'color-tertiary';
elseif($image_border_color == 'quaternary'):
    $img_border_color = 'color-quaternary';               
elseif($image_border_color == 'white'):
    $img_border_color = 'color-white';
elseif($image_border_color == 'dark'):
    $img_border_color = 'color-dark';
elseif($image_border_color == 'black'):
    $img_border_color = 'color-black';
endif;

// Button Type
if($button_type == 'border'):
    $button_type = ' btn-stroke btn-hover-nostroke';
else:
    $button_type = '';
endif;

// Button Color
if($button_style == 'primary'):
    $btn_style = 'btn-primary';
elseif($button_style == 'secondary'):
    $btn_style = 'btn-secondary';
elseif($button_style == 'tertiary'):
    $btn_style = 'btn-tertiary';
elseif($button_style == 'quaternary'):
    $btn_style = 'btn-quaternary';               
elseif($button_style == 'white'):
    $btn_style = 'btn-white';
elseif($button_style == 'dark'):
    $btn_style = 'btn-dark';
endif;

// Button Hover Color
if($button_hover == 'primary'):
    $btn_hover = 'btn-primary-hover';
elseif($button_hover == 'secondary'):
    $btn_hover = 'btn-secondary-hover';
elseif($button_hover == 'tertiary'):
    $btn_hover = 'btn-tertiary-hover';
elseif($button_hover == 'quaternary'):
    $btn_hover = 'btn-quaternary-hover';               
elseif($button_hover == 'white'):
    $btn_hover = 'btn-white-hover';
elseif($button_hover == 'dark'):
    $btn_hover = 'btn-dark-hover';
endif;
?>

<?php if( empty($hide_block) ) : ?>

    <!-- Communities Full List
	========================= -->
    <section class="service-communities<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
        <div class="container">

            <div class="row">
                <?php // Query Communites
                query_posts(array(
                    'posts_per_page' => -1,
                    'post_type' => 'communities',
                    'post_status' => 'publish',
                    'post_parent' => 0,
                    'meta_key' => 'community_position',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC'
                ));
                ?>
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post();
                        // Get the Posts Taxonomy
                        $term_obj_list  = get_the_terms( $post->ID, 'community' );
                        $terms_string   = wp_list_pluck($term_obj_list, 'term_id');

                        // Current Taxonomy ACF Fields
                        $brand_name         = get_field('brand_name', 'community_' . $terms_string[0]);
		                $community_type     = get_field('community_type', 'community_' . $terms_string[0]);
		                $coming_soon        = get_field('coming_soon', 'community_' . $terms_string[0]);
		                $coming_soon_desc   = get_field('coming_soon_desc', 'community_' . $terms_string[0]);
                        $community_website  = get_field('community_website', 'community_' . $terms_string[0]);
                        $order_last         = get_field('order_last', 'community_' . $terms_string[0]);
                        $state              = get_field('state', 'community_' . $terms_string[0]);
                        $services           = get_field('services', 'community_' . $terms_string[0]);
                        $community_image    = get_field('community_image', 'community_' . $terms_string[0]);
                        $address_line_1     = get_field('address_line_1', 'community_' . $terms_string[0]);
                        $address_line_2     = get_field('address_line_2', 'community_' . $terms_string[0]);
                        $city_state_zip     = get_field('city_state_zip', 'community_' . $terms_string[0]);
                        $phone_number       = get_field('phone_number', 'community_' . $terms_string[0]);
                        $google_maps_url    = get_field('google_maps_url', 'community_' . $terms_string[0]);
                        // Get the Post ID
                        $id = get_the_ID();

                        $address = $address_line_1 . '<br>';
                        if($address_line_2):
                            $address .= $address_line_2 . '<br>';
                        endif;
                        $address .= $city_state_zip;
                    ?>

                        <?php if($state == $filtered_state): ?>
                            <div class="col-12 col-md-6 mb-4">
                                <div class="community-type-single bg-white shadow h-100">
                                    
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="community-img">
                                                <a href="<?php if($community_type): echo $community_website; else: the_permalink(); endif; ?>"<?php if($community_type): ?> target="_blank"<?php endif; ?>>
                                                    <img src="<?php echo $community_image['sizes']['community-preview']; ?>" class=" img-border <?php echo $img_border_color; ?>" alt="<?php echo $brand_name; ?>" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row p-3">
                                        <div class="col-12">
                                            <div class="community-name">
                                                <h3 class="<?php echo $post_ttl_color; if($coming_soon): echo ' mb-0'; else: echo ' mb-2'; endif; ?>"><?php echo $brand_name; ?></h3>
                                                <p class="<?php if(!$coming_soon): echo 'd-none'; endif; ?>"><strong><?php echo $coming_soon_desc; ?></strong></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <div class="community-location">
                                                <p class="dark font-weight-bold mb-2">Location</p>
                                                <div class="community-phone d-flex line-height-reset mb-1">
                                                    <i class="fas fa-phone color-primary mt-1 mr-2"></i>
                                                    <a href="tel:<?php echo $phone_number; ?>" class="anchor-primary-hover"><?php echo $phone_number; ?></a>
                                                </div>
                                                <div class="community-address d-flex line-height-reset">
                                                    <i class="fas fa-map-marker-alt color-primary mt-1 mr-2"></i><a href="<?php echo $google_maps_url; ?>" target="_blank" class="anchor-primary-hover"><?php echo $address; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 mb-3">
                                            <div class="community-location">
                                                <p class="dark font-weight-bold mb-2">Services Offered</p>
                                                <div class="community-services d-flex">
                                                    <ul class="check-list before-primary after-primary">
                                                    <?php foreach($services as $service): 
                                                        $service_name = ucwords($service);
                                                        $service_name = str_replace("Ccrc", "CCRC", $service_name); 
                                                        $service_name = implode('-', array_map('ucfirst', explode('-', $service_name)));
                                                        ?>
                                                        <li><?php echo $service_name; ?></li>
                                                    <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <a href="<?php if($community_type): echo $community_website; else: the_permalink(); endif; ?>"<?php if($community_type): ?> target="_blank"<?php endif; ?> class="btn<?php echo $button_type; ?> <?php echo $btn_style; ?> <?php echo $btn_hover; ?>">View Community</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endif; ?>

                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>

        </div>
    </section>

<?php endif; ?>

<?php
/**
 * The template for displaying the community list by state navigation
 */

?>

<?php
$hide_block             = get_sub_field('hide_block');
$default_community      = get_sub_field('default_community');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');
?>

<?php if( empty($hide_block) ) : ?>

    <!-- Communities List
	========================= -->
    <section class="communities-list<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-4">
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
                        <div class="state-communities mb-4">
                            <h4 class="dark mb-2">Colorado</h4>
                            <div class="dropdown mb-5">
                                <button class="community-dropdown dropdown-toggle btn-primary btn-primary-hover w-100 text-left font-weight-normal" type="button" id="coloradoDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select a Community
                                </button>
                                <ul class="dropdown-menu w-100 shadow border-0 rounded-0 p-0" aria-labelledby="coloradoDropdown">
                                    <?php while ( have_posts() ) : the_post();
                                        // Get the Posts Taxonomy
                                        $term_obj_list  = get_the_terms( $post->ID, 'community' );
                                        $terms_string   = wp_list_pluck($term_obj_list, 'term_id');

                                        // Current Taxonomy ACF Fields
                                        $brand_name         = get_field('brand_name', 'community_' . $terms_string[0]);
                                        $brand_id           = preg_replace("/[^A-Za-z 0-9\-\']/", '', $brand_name);
                                        $brand_id           = strtolower(str_replace("  ", " ", $brand_id));
                                        $state              = get_field('state', 'community_' . $terms_string[0]);
                                        $services           = get_field('services', 'community_' . $terms_string[0]);
                                        // Get the Post ID
                                        $id = get_the_ID();

                                        if($id == $default_community):
                                            $active = ' active';
                                        else:
                                            $active = '';
                                        endif;
                                        ?>

                                        <?php // Filter by State
                                        if($state == 'Colorado'): ?>
                                            <li data-link="<?php echo strtolower(str_replace(" ", "-", $brand_id)); ?>-<?php echo $id; ?>" class="community-link text-small bg-primary-hover px-3 pb-1<?php echo $active; ?>"><?php echo $brand_name; ?></li>
                                        <?php endif;?>

                                    <?php endwhile; ?>
                                </ul>
                            </div>

                            <h4 class="dark mb-2">Missouri</h4>
                            <div class="dropdown">
                                <button class="community-dropdown dropdown-toggle btn-primary btn-primary-hover w-100 text-left font-weight-normal" type="button" id="coloradoDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select a Community
                                </button>
                                <ul class="dropdown-menu w-100 shadow border-0 rounded-0 p-0" aria-labelledby="coloradoDropdown">
                                    <?php while ( have_posts() ) : the_post();
                                        // Get the Posts Taxonomy
                                        $term_obj_list  = get_the_terms( $post->ID, 'community' );
                                        $terms_string   = wp_list_pluck($term_obj_list, 'term_id');

                                        // Current Taxonomy ACF Fields
                                        $brand_name         = get_field('brand_name', 'community_' . $terms_string[0]);
                                        $brand_id           = preg_replace("/[^A-Za-z 0-9\-\']/", '', $brand_name);
                                        $brand_id           = strtolower(str_replace("  ", " ", $brand_id));
                                        $state              = get_field('state', 'community_' . $terms_string[0]);
                                        $services           = get_field('services', 'community_' . $terms_string[0]);
                                        // Get the Post ID
                                        $id = get_the_ID();

                                        if($id == $default_community):
                                            $active = ' active';
                                        else:
                                            $active = '';
                                        endif;
                                        ?>

                                        <?php // Filter by State
                                        if($state == 'Missouri'): ?>
                                            <li data-link="<?php echo strtolower(str_replace(" ", "-", $brand_id)); ?>-<?php echo $id; ?>" class="community-link text-small bg-primary-hover px-3 pb-1<?php echo $active; ?>"><?php echo $brand_name; ?></li>
                                        <?php endif;?>

                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>

                </div>


                <div id="community-single" class="col-12 col-md-8">
                    <?php // Query Communites
                        query_posts(array(
                            'posts_per_page' => -1,
                            'post_type' => 'communities',
                            'post_status' => 'publish',
                            'post_parent' => 0,
                            'orderby' => 'title',
                            'order' => 'ASC'
                        ));
                        ?>
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post();
                                // Get the Posts Taxonomy
                                $term_obj_list      = get_the_terms( $post->ID, 'community' );
                                $terms_string       = wp_list_pluck($term_obj_list, 'term_id');

                                // Current Taxonomy ACF Fields
                                $brand_name         = get_field('brand_name', 'community_' . $terms_string[0]);
                                $brand_id           = preg_replace("/[^A-Za-z 0-9\-\']/", '', $brand_name);
                                $brand_id           = strtolower(str_replace("  ", " ", $brand_id));
                                $community_type     = get_field('community_type', 'community_' . $terms_string[0]);
                                $community_website  = get_field('community_website', 'community_' . $terms_string[0]);
                                $state              = get_field('state', 'community_' . $terms_string[0]);
                                $services           = get_field('services', 'community_' . $terms_string[0]);
                                $community_image    = get_field('community_image', 'community_' . $terms_string[0]);
                                $city_state_zip     = get_field('city_state_zip', 'community_' . $terms_string[0]);
                                // Get the Post ID
                                $id = get_the_ID();

                                if($id == $default_community):
                                    $show = ' show';
                                else:
                                    $show = '';
                                endif;

                                // Remove Zip From Address
                                $address = $words = preg_replace('/[0-9]+/', '', $city_state_zip); ?>
                                <div id="<?php echo strtolower(str_replace(" ", "-", $brand_id)); ?>-<?php echo $id; ?>" class="community-single<?php echo $show; ?>">
                                    <div class="community-img">
                                        <a href="<?php if($community_type): echo $community_website; else: the_permalink(); endif; ?>"<?php if($community_type): ?> target="_blank"<?php endif; ?>>
                                            <img src="<?php echo $community_image['sizes']['community-preview']; ?>" class="mb-3" alt="<?php echo $brand_name; ?>" />
                                        </a>
                                    </div>
                                    <div class="community-info">
                                        <h4 class="color-primary mb-0"><?php echo $address; ?></h4>
                                        <h2 class="dark font-weight-normal"><?php echo $brand_name; ?></h2>
                                        <?php if($services): ?>
                                            <div class="services-list d-flex flex-wrap mb-3">
                                                <?php foreach($services as $service): 
                                                    $service_name = ucwords($service);
                                                    $service_name = str_replace("Ccrc", "CCRC", $service_name); 
                                                    $service_name = implode('-', array_map('ucfirst', explode('-', $service_name)));
                                                    ?>
                                                    <span class="community-services"><?php echo $service_name; ?></span>
                                                    <?php if ($service === end($services)): ?>
                                                    <?php else: ?>
                                                        <div class="border-right border-grey mx-2"></div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                        <a href="<?php if($community_type): echo $community_website; else: the_permalink(); endif; ?>"<?php if($community_type): ?> target="_blank"<?php endif; ?> class="btn btn-primary btn-secondary-hover">Learn More</a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query(); ?>
                </div>


            </div>
        </div>
    </section>

<?php endif; ?>

<?php
/**
 * Template part for displaying the service types partial
 */

$hide_block             = get_sub_field('hide_block');
$default_title          = get_sub_field('default_title');
$default_description    = get_sub_field('default_description');
?>

<?php if( empty($hide_block) ) : ?>

    <!-- Service Types
	========================= -->
    <section class="service-types">

        <!-- Service Icons -->
        <div class="container">
            <div class="row service-icons justify-content-center mb-3">
                <?php if( have_rows('service') ): // Repeater
                    while ( have_rows('service') ) : the_row(); 
                    
                        $title               = get_sub_field('title');
                        $icon                = get_sub_field('icon');
                        $description         = get_sub_field('description');
                        $service_id          = get_sub_field('service_id');
                        $button_text         = get_sub_field('button_button_text');
                        $button_link_type    = get_sub_field('button_button_link_type');
                        $button_select_link  = get_sub_field('button_button_select_link');
                        $button_custom_link  = get_sub_field('button_button_custom_link');
                        $new_window          = get_sub_field('button_new_window');
                        ?>

                        <div class="service-single d-flex justify-content-center align-items-center mb-md-0 text-center" id="<?php echo $service_id; ?>">
                            <div class="service-icon border-secondary-hover d-none d-md-flex align-items-center justify-content-center color-primary mb-1 shadow" id="<?php echo $service_id; ?>-icon">
                                <?php echo $icon; ?>
                            </div>
                            <a class="d-block d-md-none" href="<?php if ($button_link_type == 'Select Link'): echo $button_select_link; else: echo $button_custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?>>
                                <div class="service-icon color-primary mb-1">
                                    <?php echo $icon; ?>
                                </div>
                                <div class="service-title">
                                    <h4 class="font-weight-normal text-uppercase text-medium"><?php echo $title; ?></h4>
                                </div>
                            </a>
                        </div>

                        <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>

        <!-- Services Single -->
        <div class="container d-none d-md-block mb-0 mb-md-5">
            <div class="row service-descriptions justify-content-center align-items-center">

                <div class="service-description col-12 col-md-8 justify-content-center align-items-center text-center animate">
                    <div class="pt-4">
                        <h3 class="text-uppercase mb-3"><?php echo $default_title; ?></h3>
                        <p><?php echo $default_description; ?></p>
                    </div>
                </div>

                <?php if( have_rows('service') ): // Repeater
                    while ( have_rows('service') ) : the_row(); 
                    
                        $title       = get_sub_field('title');
                        $icon        = get_sub_field('icon');
                        $description = get_sub_field('description');
                        $service_id  = get_sub_field('service_id');
                        ?>

                        <div class="service-description col-12 col-md-8 justify-content-center align-items-center text-center hide" id="<?php echo $service_id; ?>-description">
                            <div class="pt-4">
                                <h3 class="text-uppercase mb-3"><?php echo $title; ?></h3>
                                <?php echo $description; ?>
                                <?php get_template_part( 'template-parts/partials/general/button' ); ?>
                            </div>
                        </div>

                        <?php
                    endwhile;
                endif;
                ?>
            </div>

        </div>
    </section>

<?php endif; ?>

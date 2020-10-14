<?php
/**
 * Template part for displaying the blue bar partial
 */

//Advanced Custom Fields 
$hide_block             = get_sub_field('hide_block');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');
?>

<?php if( empty($hide_block) ) : ?>

    <!-- Blue Bar
	========================= -->
    <section class="blue-bar bg-blue<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
        <div class="container">
            <div class="row py-5">

                <?php if( have_rows('cta') ): // Repeater
                    while ( have_rows('cta') ) : the_row(); 
                    
                    $title              = get_sub_field('title');
                    $description 	    = get_sub_field('description');
                    ?>

                    <div class="col-12 col-md d-flex justify-content-center align-items-center mb-4 mb-md-0">
                        <div class="cta-single-description text-center">
                            <h4 class="white mb-3"><?php echo $title; ?></h4>
                            <?php echo $description; ?>
                            <?php get_template_part( 'template-parts/partials/general/button' ); ?>
                        </div>
                    </div>
                    <div class="border-right"></div>
                    <?php
                    endwhile;
                endif;
                ?>

            </div>
        </div>
    </section>

<?php endif; ?>

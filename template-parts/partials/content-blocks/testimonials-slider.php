<?php
/**
 * Template part for displaying the testimonials slider partial
 */

?>

<?php 
$hide_block             = get_sub_field('hide_block');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');
$image                  = get_sub_field('image');
$background_color       = get_sub_field('background_color');

if($background_color == 'primary'):
    $bg_color = 'bg-primary';
elseif($background_color == 'secondary'):
    $bg_color = 'bg-secondary';
elseif($background_color == 'tertiary'):
    $bg_color = 'bg-tertiary';
elseif($background_color == 'quaternary'):
    $bg_color = 'bg-quaternary';               
elseif($background_color == 'white'):
    $bg_color = 'bg-white';
elseif($background_color == 'dark'):
    $bg_color = 'bg-dark';
elseif($background_color == 'black'):
    $bg_color = 'bg-black';
endif;
?>

<?php if( empty($hide_block) ) : ?>

    <!-- Testimonials Slider
    ========================= -->
    <section class="testimonials-slider <?php echo $bg_color; ?> position-relative<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
        <div class="position-absolute h-100 w-100 bg-img bg-opaque" style="background-image:url('<?php echo $image['url']; ?>');"></div>
        <div class="container">
            <div class="row pt-2 pb-4">
            <div class="col-12 col-md-10 mx-auto">

                    <div id="testimonialSlider" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <?php 
                            if( have_rows('slide') ):
                                $z=0;
                                while ( have_rows('slide') ) : the_row(); ?>
                                    <li data-target="#testimonialSlider" data-slide-to="<?php echo $z; ?>"<?php if ($z==0): echo ' class="active"'; endif; ?>></li>
                                <?php
                                $z++;
                                endwhile;
                            endif;
                            ?>
                        </ol>
                
                        <div class="carousel-inner">
                            <?php 
                            if( have_rows('slide') ):
                                $z=0;
                                while ( have_rows('slide') ) : the_row();
                                $testimonial    = get_sub_field('testimonial');
                                $name           = get_sub_field('name');
                                $location       = get_sub_field('location');
                                ?>
                
                                    <div class="carousel-item<?php if ($z==0): echo ' active'; endif; ?>">
                                        <div class="testimonail-single d-flex justify-content-center align-items-center">
                                            <div class="text-center white w-75">
                                                <p class="position-relative mb-2">
                                                    <i class="fas fa-quote-left quote-icon"></i>
                                                    <span class="font-italic"><?php echo $testimonial; ?></span>
                                                </p>
                                                <span class="testimonail-name font-weight-bold d-block"><?php echo $name; ?></span>
                                                <span class="testimonail-location d-block"><?php echo $location; ?></span>
                                            </div>
                                        </div>
                                    </div>
                
                                <?php
                                $z++;
                                endwhile;
                            endif;
                            ?>
                        </div>
                
                
                        <a class="carousel-control-prev" href="#testimonialSlider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#testimonialSlider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                
                    </div>

            </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php
/**
 * The template for displaying the text gallery overlay partial
 */

?>

<?php
$hide_block             = get_sub_field('hide_block');
$content_position       = get_sub_field('content_position');
$description            = get_sub_field('description');
$image_top 		        = get_sub_field('image_top');
$image_bottom_left 		= get_sub_field('image_bottom_left');
$image_bottom_right     = get_sub_field('image_bottom_right');
$background_color       = get_sub_field('background_color');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');

// Content Positioning
if($content_position == 'right'):
    $image_class = 'order-md-0';
    $bg_position_class = 'justify-content-start';
    $content_class = 'order-md-1';
else:
    $image_class = 'order-md-1';
    $bg_position_class = 'justify-content-end';
    $content_class = 'order-md-0';
endif;

// Background Color
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
elseif($background_color == 'none'):
    $bg_color = '';
endif;
?>

<?php if( empty($hide_block) ) : ?>

    <!-- Text Gallery Overlay
    ========================= -->
    <section class="text-gallery-overlay<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-md-6 gallery-imgs px-0 d-flex flex-wrap align-items-stretch order-0 <?php echo $bg_color; ?> <?php echo $image_class; ?>">
                    <div class="row gallery-row">
                        <div class="col-12">
                            <div class="position-absolute h-100 w-100 bg-img gal-img" style="background-image: url('<?php echo $image_top['url']; ?>')" data-toggle="modal" data-target="#modal-<?php echo $image_top['id']; ?>" rel="noopener noreferrer"></div>
                        </div>
                    </div>
                    <div class="row gallery-row">
                        <div class="col-6">
                            <div class="position-absolute h-100 w-100 bg-img gal-img" style="background-image: url('<?php echo $image_bottom_left['url']; ?>')" data-toggle="modal" data-target="#modal-<?php echo $image_bottom_left['id']; ?>" rel="noopener noreferrer"></div>
                        </div>
                        <div class="col-6">
                            <div class="position-absolute h-100 w-100 bg-img gal-img" style="background-image: url('<?php echo $image_bottom_right['url']; ?>')" data-toggle="modal" data-target="#modal-<?php echo $image_bottom_right['id']; ?>" rel="noopener noreferrer"></div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 py-0 py-md-5 overlay-content d-flex align-items-center order-1 <?php echo $content_class; ?> <?php echo $bg_position_class; ?>">
                    <div class="container-half py-4">
                        <?php echo $description; ?>
                        <?php get_template_part( 'template-parts/partials/general/button' ); ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="gallery-modals">

            <!-- Modal: Gallery Top -->
            <div class="modal fade gallery-single-modal" id="modal-<?php echo $image_top['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $image_top['alt']; ?>Title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-0 text-center">
                            <img src="<?php echo $image_top['url']; ?>" alt="<?php echo $image_top['alt']; ?>" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal: Gallery Bottom Left -->
            <div class="modal fade gallery-single-modal" id="modal-<?php echo $image_bottom_left['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $image_bottom_left['alt']; ?>Title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-0 text-center">
                            <img src="<?php echo $image_bottom_left['url']; ?>" alt="<?php echo $image_bottom_left['alt']; ?>" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal: Gallery Bottom Right -->
            <div class="modal fade gallery-single-modal" id="modal-<?php echo $image_bottom_right['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $image_bottom_right['alt']; ?>Title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-0 text-center">
                            <img src="<?php echo $image_bottom_right['url']; ?>" alt="<?php echo $image_bottom_right['alt']; ?>" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
    </section>

<?php endif; ?>

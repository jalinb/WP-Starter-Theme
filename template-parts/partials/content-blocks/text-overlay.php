<?php
/**
 * The template for displaying the text overlay partial
 */

?>

<?php
$hide_block             = get_sub_field('hide_block');
$content_position       = get_sub_field('content_position');
$title                  = get_sub_field('title');
$description            = get_sub_field('description');
$background_image 		= get_sub_field('background_image');
$add_button             = get_sub_field('add_button');
$button_text            = get_sub_field('button_text');
$button_link_type       = get_sub_field('button_link_type');
$button_select_link     = get_sub_field('button_select_link');
$button_custom_link     = get_sub_field('button_custom_link');
$new_window             = get_sub_field('new_window');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');

if($content_position == 'right'):
    $bg_order = 'justify-content-start';
    $padding_bg = 'pr-md-0';
    $padding_description = 'pl-md-0';
    $image_order = 'order-md-0';
    $description_order = 'order-md-1';
else:
    $bg_order = 'justify-content-end';
    $padding_bg = 'pl-md-0';
    $padding_description = 'pr-md-0';
    $image_order = 'order-md-1';
    $description_order = 'order-md-0';
endif;
?>

<?php if( empty($hide_block) ) : ?>

    <!-- Text Overlay
    ========================= -->
    <section class="text-overlay<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
        <div class="container">
            <div class="row position-relative <?php echo $bg_order; ?>">
                <div class="col-12 col-md-6 overlay-img order-0 <?php echo $image_order; ?> <?php echo $padding_bg; ?>">
                    <div class="d-none d-md-block w-100 h-100 bg-img border-bottom border-width border-secondary" style="background-image: url('<?php echo $background_image['url']; ?>')"></div>
                    <img class="d-block d-md-none img-border color-secondary" src="<?php echo $background_image['url']; ?>" alt="<?php echo $sub_menu_title; ?>">
                </div>
    
                <div class="col-12 col-md-6 overlay-content order-1 <?php echo $description_order; ?> <?php echo $padding_description; ?>">
                    <div class="bg-primary px-3 py-2 px-md-4 py-md-5 white">
                        <h3 class="font-weight-normal"><?php echo $title; ?></h3>
                        <?php echo $description; ?>                      
                    </div>
                </div>
            </div>

            <?php if($add_button) : ?>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center bg-light px-3 py-1">
                            <div class="text-uppercase">
                                <p class="text-small mb-0"><?php echo $title; ?></p>
                                <a href="<?php if ($button_link_type == 'Select Link'): echo $button_select_link; else: echo $button_custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?> class="header-font text-large anchor-primary anchor-secondary-hover">
                                    <?php echo $button_text; ?>
                                </a>
                            </div>
                            <a href="<?php if ($button_link_type == 'Select Link'): echo $button_select_link; else: echo $button_custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?> class="anchor-secondary-hover">
                                <i class="fas fa-angle-right text-extra-large"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>

<?php endif; ?>

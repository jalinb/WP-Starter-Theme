<?php
/**
 * Template part for displaying the community search partial
 */ 

$hide_block       = get_sub_field('hide_block');
$search_title 	  = get_sub_field('search_title');
$search_sub_title = get_sub_field('search_sub_title');
$image            = get_sub_field('image');
$background_color = get_sub_field('background_color');
$button_type      = get_sub_field('button_type');
$button_style     = get_sub_field('button_style');
$button_hover     = get_sub_field('button_hover');

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

    <section class="community-search position-relative <?php echo $bg_color; ?>">
        <div class="position-absolute h-100 w-100 bg-img bg-opaque" style="background-image:url('<?php echo $image['url']; ?>');"></div>
        <div class="container">
            <div class="row hero-search py-4">
                <div class="col-12 col-md-10 d-flex mx-md-auto py-2">

                    <div class="search-title header-font text-uppercase mr-4">
                        <h4 class="font-weight-normal white mb-0"><?php echo $search_title; ?></h4>
                        <p class="text-medium white mb-1"><?php echo $search_sub_title; ?></p>
                    </div>
 
                    <div class="col community-search">
                        <?php $search_widget = new WPSL_Search_Widget(); ?>
                        <form action="/our-senior-living-communities/search" method="post" id="wpsl-widget-form" class="mx-auto">
                            <div class="input-group addon d-flex align-items-end">
                                <?php do_action( 'wpsl_before_widget_input' ); ?>
                                <input type="text" name="wpsl-widget-search" placeholder="Search By City, State, or Zip" id="wpsl-widget-search" value="" class="form-control search-bar">
                                <?php do_action( 'wpsl_after_widget_input' );?>
                                <div class="input-group-btn">
                                    <button id="wpsl-widget-submit" type="submit" class="btn<?php echo $button_type; ?> <?php echo $btn_style; ?> <?php echo $btn_hover; ?>"><i class="fas fa-search mr-2"></i>Search</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php endif; ?>	

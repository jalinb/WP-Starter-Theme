<?php
/**
 * The template for displaying a list of the current page's child pages. NOTE: This pulls from the main navigation menu so that the list is organized the same way as the navigation.
 */

?>

<?php
// Current Page ID
$current_page_id = get_the_id();
$hide_block      = get_sub_field('hide_block');
$title_color     = get_sub_field('title_color');
$button_style    = get_sub_field('button_style');
$button_hover    = get_sub_field('button_hover');

// Title Color 
if($title_color == 'primary'):
    $ttl_color = 'color-primary';
elseif($title_color == 'secondary'):
    $ttl_color = 'color-secondary';
elseif($title_color == 'tertiary'):
    $ttl_color = 'color-tertiary';
elseif($title_color == 'quaternary'):
    $ttl_color = 'color-quaternary';               
elseif($title_color == 'white'):
    $ttl_color = 'color-white';
elseif($title_color == 'dark'):
    $ttl_color = 'color-dark';
elseif($title_color == 'black'):
    $ttl_color = 'color-black';
elseif($title_color == 'default'):
    $ttl_color = '';
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

if( empty($hide_block) ) : ?>

    <!-- CORPORATE CHILD PAGES
	========================= -->
    <div class="container">

        
        <?php // Corporate Nav Menu Items

        // Main Nav Menu
        if( have_rows('main_menu_item', 'option') ):
            while ( have_rows('main_menu_item', 'option') ) : the_row();

                $select_link    = get_sub_field('select_link');
                $page_id		= url_to_postid( $select_link );

                // If is a child of the current page
                if($current_page_id == $page_id):

                    // Current page's sub-menu
                    if( have_rows('sub_menu') ):
                        while ( have_rows( 'sub_menu') ) : the_row();

                            if( have_rows('sub_menu_item') ):
                                $i = 0;
                                while ( have_rows( 'sub_menu_item') ) : the_row();

                                    $sub_menu_title 		= get_sub_field('sub_menu_title');
                                    $sub_menu_link_type     = get_sub_field('sub_menu_link_type');
                                    $sub_menu_select_link 	= get_sub_field('sub_menu_select_link');
                                    $page_id			    = url_to_postid( $sub_menu_select_link );
                                    $sub_menu_custom_link   = get_sub_field('sub_menu_custom_link');
                                    $new_window             = get_sub_field('new_window');
                                    $page_description  	    = get_field('page_description', $page_id);
	                                $page_image  		    = get_field('page_image', $page_id);
	                                $page_cta 		        = get_field('page_cta_text', $page_id);

                                    if($sub_menu_link_type == 'Custom Link'):
                                        $page_image       = get_sub_field('sub-menu_image');
                                        $page_description = get_sub_field('sub-menu_description');
                                    endif;

                                    if($i%2 == 0):
                                        $bg_order = 'justify-content-end';
                                        $padding_bg = 'pl-md-0';
                                        $padding_description = 'pr-md-0';
                                        $image_order = 'order-md-1';
                                        $description_order = 'order-md-0';
                                    else:
                                        $bg_order = 'justify-content-start';
                                        $padding_bg = 'pr-md-0';
                                        $padding_description = 'pl-md-0';
                                        $image_order = 'order-md-0';
                                        $description_order = 'order-md-1';
                                    endif;
                                    $i++;
                                ?>

                                    <div class="row position-relative <?php echo $bg_order; ?>">

                                        <div class="col-12 col-md-6 overlay-img order-0 <?php echo $image_order; ?> <?php echo $padding_bg; ?>">
                                            <div class="d-none d-md-block w-100 h-100 bg-img border-bottom border-width border-secondary" style="background-image: url('<?php echo $page_image['url']; ?>')"></div>
                                            <img class="d-block d-md-none img-border color-secondary" src="<?php echo $page_image['url']; ?>" alt="<?php echo $sub_menu_title; ?>">
                                        </div>

                                        <div class="col-12 col-md-6 overlay-content order-1 <?php echo $description_order; ?> <?php echo $padding_description; ?>">
                                            <div class="bg-primary px-3 py-2 px-md-4 py-md-5 white">
                                                <h3 class="font-weight-normal"><?php echo $sub_menu_title; ?></h3>
                                                <p><?php echo $page_description; ?></p>                        
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between align-items-center bg-light px-3 py-1">
                                                <div class="text-uppercase">
                                                    <p class="text-small mb-0"><?php echo $sub_menu_title; ?></p>
                                                    <a href="<?php if ($sub_menu_link_type == 'Select Link'): echo $sub_menu_select_link; else: echo $sub_menu_custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?> class="header-font text-large anchor-primary anchor-secondary-hover">
                                                        <?php if($page_cta): echo $page_cta; else: echo 'Learn More'; endif; ?>
                                                    </a>
                                                </div>
                                                <a href="<?php if ($sub_menu_link_type == 'Select Link'): echo $sub_menu_select_link; else: echo $sub_menu_custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?> class="anchor-secondary-hover">
                                                    <i class="fas fa-angle-right text-extra-large"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                endwhile;
                            endif;

                        endwhile;
                    endif;

                endif;


            endwhile;
        endif;
        ?>

    </div>

<?php endif; ?>
<?php
/**
 * The template for displaying the footer column three navigation
 */

?>
 
<?php 
// Get the the posts taxonomy
$term_obj_list = get_the_terms( $post->ID, 'community' );
$terms_string = wp_list_pluck($term_obj_list, 'term_id');

// Main Footer Menu
if( have_rows('c3_footer_menu_item', 'community_' . $terms_string[0]) ): // Repeater
    while ( have_rows('c3_footer_menu_item', 'community_' . $terms_string[0]) ) : the_row();

        $menu_title         = get_sub_field('menu_title');
        $nav_name           = str_replace(' ', '', $menu_title);
        $show_in_sub_menu   = get_sub_field('show_in_sub_menu');
        $link_type          = get_sub_field('link_type');
        $select_link        = get_sub_field('select_link');
        $custom_link        = get_sub_field('custom_link');
        $new_window         = get_sub_field('new_window');
        $add_sub_menu       = get_sub_field('add_sub_menu');
        ?>

        <div class="nav-group-wrap">
            <ul class="list-unstyled mb-0">
                <li class="vivage-circles color-primary text-extra-small">
                    <i class="fas fa-circle mr-1"></i><i class="fas fa-circle mr-1"></i><i class="fas fa-circle mr-1"></i>
                </li>
                <li class="main-menu-item has-sub-menu d-flex flex-wrap text-uppercase" id="item<?php echo $nav_name; ?>">
                    <div class="w-100">

                        <?php if ($link_type == 'No Link'): ?>
                            <span class="dark font-weight-black"><?php echo $menu_title; ?></span>
                        <?php else: ?>
                            <a href="<?php if ($link_type == 'Select Link'): echo $select_link; else: echo $custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?> class="dark anchor-primary-hover">
                                <?php echo $menu_title; ?>
                            </a>
                        <?php endif; ?>
                    
                        <?php // Main Footer Sub-Menu
                        if($add_sub_menu):
                            if( have_rows('sub_menu') ): //Group
                                while ( have_rows( 'sub_menu') ) : the_row();
                                        
                                    if( have_rows('sub_menu_item') ): // Repeater ?>
                                        <ul class="list-unstyled mb-0">
                                        <?php while ( have_rows( 'sub_menu_item') ) : the_row();
                                            $sub_menu_title         = get_sub_field('sub_menu_title');
                                            $sub_menu_link_type     = get_sub_field('sub_menu_link_type');
                                            $sub_menu_select_link   = get_sub_field('sub_menu_select_link');
                                            $sub_menu_custom_link   = get_sub_field('sub_menu_custom_link');
                                            $new_window             = get_sub_field('new_window');
                                            ?>

                                            <li class="sub-menu-item">
                                                <a href="<?php if ($sub_menu_link_type == 'Select Link'): echo $sub_menu_select_link; else: echo $sub_menu_custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?> class="text-small text-uppercase anchor-primary-hover">
                                                    <?php echo $sub_menu_title; ?>
                                                </a>
                                            </li>

                                        <?php
                                        endwhile; ?>
                                        </ul>
                                    <?php
                                    endif;

                                endwhile;
                            endif;
                        endif; ?>
                        
                    </div>
                </li>
            </ul>
        </div>

    <?php
    endwhile;
endif;
?>

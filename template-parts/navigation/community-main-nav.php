<?php
/**
 * The template for displaying the community main navigation
 */

?>

<? // Get the the posts taxonomy
$term_obj_list = get_the_terms( $post->ID, 'community' );
$terms_string = wp_list_pluck($term_obj_list, 'term_id');
?>

<!-- Logo -->
<div class="logo-wrap mb-2 mb-lg-0">
	<?php get_template_part( 'template-parts/partials/general/logo' ); ?>
</div>

<!-- Community Navigation -->
<nav id="community-navigation" class="col-lg w-auto px-1 px-lg-2">
    <ul class="nav main-nav justify-content-end">

        <?php // Main Nav Menu
	        if( have_rows('main_menu_item', 'community_' . $terms_string[0]) ): // Repeater
                $counter = 0;
	            while ( have_rows('main_menu_item', 'community_' . $terms_string[0]) ) : the_row();
                    $menu_title         = get_sub_field('menu_title');
	                $nav_name 			= str_replace(' ', '', $menu_title);
	                $show_in_sub_menu 	= get_sub_field('show_in_sub_menu');
	                $link_type 			= get_sub_field('link_type');
	                $select_link 		= get_sub_field('select_link');
					$custom_link 		= get_sub_field('custom_link');
					$new_window 		= get_sub_field('new_window');
	                $add_sub_menu 		= get_sub_field('add_sub_menu');
	
	                // Get Number Of Main Menu Items
	                $field_object 		= get_field_object('main_menu_item', 'community_' . $terms_string[0]);
	                $total_rows 		= count($field_object['value']);
	                $counter++;
	                
	                // Add Border Right Class On All Main Menu Items But The Last
	                if($counter == $total_rows ):
	                    $border_class = '';
	                else:
	                    $border_class = 'border-right ';
	                endif;
	                ?>
	
	                <li class="main-menu-item<?php if($add_sub_menu): ?> has-sub-menu<?php endif; ?> color-primary-hover" id="item<?php echo $nav_name; ?>">
	                    <?php if ($link_type == 'No Link'): ?>
	                        <span class="color-primary-hover"><?php echo $menu_title; ?></span>
	                        
	                    <?php else: ?>
	                        <a href="<?php if ($link_type == 'Select Link'): echo $select_link; else: echo $custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?> class="color-primary-hover">
	                            <?php echo $menu_title; ?>
	                        </a>
	                        
	                    <?php endif; ?>
	                        
	                    <?php // Main Nav Sub-Menu
		                    if($add_sub_menu):
		                        if( have_rows('sub_menu') ): //Group
		                            while ( have_rows( 'sub_menu') ) : the_row();
		                                    get_template_part( 'template-parts/navigation/sub-menu', 'nav' );
		                            endwhile;
		                        endif;
		                    endif;
	                    ?>
	                </li>
	
	            <?php
	            endwhile;
	        endif;
        ?>

    </ul>
</nav>

<?php
/**
 * The template for displaying the community mobile navigation
 */

?>

<? // Get the the posts taxonomy
$term_obj_list = get_the_terms( $post->ID, 'community' );
$terms_string = wp_list_pluck($term_obj_list, 'term_id');
?>

<button class="navbar-toggler mobile-nav-btn color-primary" type="button" data-toggle="collapse" data-target="#mobile-navigation" aria-controls="mobile-navigation" aria-expanded="false" aria-label="Toggle navigation">
	<i class="fas fa-bars"></i>
</button>

<div class="mobile-nav">
	<nav class="navbar">
		<div id="mobile-navigation" class="navbar-collapse collapse">
			<ul class="navbar-nav bg-primary mb-2">

				<?php // Main Nav Menu
				if( have_rows('main_menu_item', 'community_' . $terms_string[0]) ): // Repeater
					while ( have_rows('main_menu_item', 'community_' . $terms_string[0]) ) : the_row();
					
						$menu_title 		= get_sub_field('menu_title');
						$link_type 			= get_sub_field('link_type');
						$select_link 		= get_sub_field('select_link');
						$custom_link 		= get_sub_field('custom_link');
						$new_window 		= get_sub_field('new_window');
						$show_in_sub_menu 	= get_sub_field('show_in_sub_menu');
						$add_sub_menu 		= get_sub_field('add_sub_menu');
						$sub_menu 			= get_sub_field('sub_menu');
						?>

						<li class="mobile-main-menu-item <?php if($sub_menu): ?>mobile-dropdown<?php endif; ?>">
							<?php if(empty($add_sub_menu)): ?>
								<a href="<?php if ($link_type == 'Select Link'): echo $select_link; else: echo $custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?>>
									<?php echo $menu_title; ?>
								</a>
							<?php else: ?>
								<span class="has-sub font-weight-bold text-uppercase d-inline-block"><?php echo $menu_title; ?></span>
							<?php endif; ?>
							<?php if($add_sub_menu): ?>
								<div class="dropdown-caret"><i class="fas fa-caret-down"></i></div>
								<?php
								if( have_rows('sub_menu') ): //Group
									while ( have_rows( 'sub_menu') ) : the_row();
										$sub_menu = get_sub_field('sub_menu'); //Group Field ?>
										
										<ul>
										<?php if( have_rows('sub_menu_item') ): // Repeater ?>

											<?php if($show_in_sub_menu): ?>
												<li class="sub-menu-item">
													<a href="<?php if ($link_type == 'Select Link'): echo $select_link; else: echo $custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?>>
														<?php echo $menu_title; ?>
													</a>
												</li>
											<?php endif; ?>

											<?php
												
												while ( have_rows( 'sub_menu_item') ) : the_row();

													$sub_menu_title 		= get_sub_field('sub_menu_title');
													$sub_menu_link_type 	= get_sub_field('sub_menu_link_type');
													$sub_menu_select_link 	= get_sub_field('sub_menu_select_link');
													$sub_menu_custom_link 	= get_sub_field('sub_menu_custom_link');
													$new_window 			= get_sub_field('new_window');
												
											?>

												<li class="sub-menu-item">
													<a href="<?php if ($sub_menu_link_type == 'Select Link'): echo $sub_menu_select_link; else: echo $sub_menu_custom_link; endif;?>" <?php if($new_window): ?>target="_blank"<?php endif; ?>>
														<?php echo $sub_menu_title; ?>
													</a>
												</li>

											<?php
											endwhile;
										endif; ?>
										</ul>
										
									<?php
									endwhile;
								endif;
							endif; ?>
						</li>

					<?php
					endwhile;
				endif;
				?>

			</ul>
		</div>
	</nav>
</div>

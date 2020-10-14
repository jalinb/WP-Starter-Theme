<?php
/**
 * Template part for displaying the events partial
 */

//Advanced Custom Fields 
$hide_block   			= get_sub_field('hide_block');
$title_color  			= get_sub_field('title_color');
$button_style 			= get_sub_field('button_style');
$button_hover 			= get_sub_field('button_hover');
$image_border_color 	= get_sub_field('image_border_color');
$how_many_post_per_page = get_sub_field('how_many_post_per_page');

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

// Image Border Color
if($image_border_color == 'primary'):
	$img_border_color = 'color-primary';
elseif($image_border_color == 'secondary'):
	$img_border_color = 'color-secondary';
elseif($image_border_color == 'tertiary'):
	$img_border_color = 'color-tertiary';
elseif($image_border_color == 'quaternary'):
	$img_border_color = 'color-quaternary';               
elseif($image_border_color == 'white'):
	$img_border_color = 'color-white';
elseif($image_border_color == 'dark'):
	$img_border_color = 'color-dark';
elseif($image_border_color == 'black'):
	$img_border_color = 'color-black';
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

	<!-- STAFF
	========================= -->
	<section class="events">
	    <div class="container">
	
	        <div class="row justify-content-center">
	
				<?php 
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	            $query = new WP_Query(array(
	                'post_type'      => 'communities',
	                'post_status'    => 'publish',
                    'posts_per_page' => $how_many_post_per_page,
                    'post_parent'    => $post->ID,
                    'orderby'        => 'date',
					'order'          => 'DESC',
					'paged' 		 => $paged
	            ));
	
				if ( $query->have_posts() ) :
	                while ( $query->have_posts() ) : $query->the_post(); 
	
                        $page_description  	= get_field('page_description');
						$page_image  		= get_field('page_image');
						$date				= get_the_date();
	                    ?>
	
	                    <div class="col-12 col-md-4 mb-4 event-single">
	                        <div class="h-100 shadow">
	                        	<div class="event-img">
									<img src="<?php echo $page_image['sizes']['card-thumb']; ?>" alt="<?php the_title(); ?>" class="img-fluid img-border <?php echo $img_border_color; ?>" />
		                        </div>
		                        <div class="event-content p-3 text-left">
		                            <h3 class="<?php echo $ttl_color; ?> mb-1"><?php the_title(); ?></h3>
		                            <p class="dark mb-2"><?php echo $date; ?></p>
									<p><?php echo $page_description; ?></p>
		                            <a href="<?php the_permalink(); ?>" class="btn <?php echo $btn_style; ?> <?php echo $btn_hover; ?>">Learn More</a>
		                        </div>
	                        </div>
	                    </div>
	
					<?php 
	                endwhile;
	            endif;
	            wp_reset_query(); 
	            ?>
	
			</div>
			
			<div class="row">
				<div class="col-12">
					<div class="pagination d-flex justify-content-center mt-5">
						<?php 
						echo paginate_links( array(
							'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
							'total'        => $query->max_num_pages,
							'current'      => max( 1, get_query_var( 'paged' ) ),
							'format'       => '?paged=%#%',
							'show_all'     => true,
							'type'         => 'plain',
							'end_size'     => 2,
							'mid_size'     => 1,
							'prev_next'    => true,
							'prev_text'    => sprintf( '<i class="fal fa-angle-left"></i> %1$s', __( 'Previous', 'text-domain' ) ),
							'next_text'    => sprintf( '%1$s <i class="fal fa-angle-right"></i>', __( 'Next', 'text-domain' ) ),
							'add_args'     => false,
							'add_fragment' => '',
						) ); ?>
					</div>
				</div>
			</div>
	
	    </div>
	</section>

<?php endif; ?>

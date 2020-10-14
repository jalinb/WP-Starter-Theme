<?php
/**
 * Template part for displaying the staff partial
 */

//Advanced Custom Fields 
$hide_block   = get_sub_field('hide_block');
$title_color  = get_sub_field('title_color');
$button_type  = get_sub_field('button_type');
$button_style = get_sub_field('button_style');
$button_hover = get_sub_field('button_hover');

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

	<!-- STAFF
	========================= -->
	<section class="staff">
	    <div class="container">
	
	        <div class="row">
	
	            <?php 
	            query_posts(array(
	                'post_type' => 'staff',
	                'post_status' => 'publish',
	                'posts_per_page' => -1
	            ));
	
				if ( have_posts() ) :
					$i = 0;
	                while ( have_posts() ) : the_post(); 
	
	                    $name = get_the_title();
	                    $image = get_field('image');
	                    $title = get_field('title');
	                    $bio = get_field('bio');
	                    $email = get_field('email');
	                    ?>
	
	                    <div class="col-12 col-md-6 mb-5">
	                        <div class="staff-member">
	                        	<div class="staff-img mb-3">
		                            <img src="<?php echo $image['sizes']['portrait-thumb']; ?>" alt="<?php echo $name; ?>" class="staff-img img-fluid" />
		                        </div>
		                        <div class="staff-content">
		                            <h3 class="<?php echo $ttl_color; ?> mb-1"><?php echo $name; ?></h3>
		                            <p class="dark mb-2"><?php echo $title; ?></p>
		                            <a href="#" class="btn<?php echo $button_type; ?> <?php echo $btn_style; ?> <?php echo $btn_hover; ?>" data-toggle="modal" data-target="#modal-<?php echo $i; ?>" rel="noopener noreferrer">View Bio</a>
		                        </div>
	                        </div>
	                    </div>
	
					<?php 
					$i++;
	                endwhile;
	            endif;
	            wp_reset_query(); 
	            ?>
	
	        </div>
	
	
	        <div class="staff-modals">
	
	            <?php 
	            query_posts(array(
	                'post_type' => 'staff',
	                'post_status' => 'publish',
	                'posts_per_page' => -1
	            ));
	
				if ( have_posts() ) :
					$i = 0;
	                while ( have_posts() ) : the_post(); 
	                    $name = get_the_title();
	                    $image = get_field('image');
	                    $title = get_field('title');
	                    $bio = get_field('bio');
	                    $email = get_field('email');
	                    ?>
	
	                    <!-- Modal: Staff Single -->
	                    <div class="modal fade staff-single-modal" id="modal-<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo str_replace(' ', '-', $name); ?>-Title" aria-hidden="true">
	                        <div class="modal-dialog modal-dialog-centered" role="document">
	                            <div class="modal-content rounded-0">
	                                <div class="modal-header">
	                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                        <span aria-hidden="true">&times;</span>
	                                    </button>
	                                </div>
	                                <div class="modal-body bg-white p-4">
	                                    <div class="staff-content">
	                                        <h3 class="mb-0 <?php echo $ttl_color; ?>"><?php echo $name; ?></h3>
	                                        <p class="dark"><?php echo $title; ?></p>
	                                        <?php echo $bio; ?>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	
						<?php 
						$i++;
	                endwhile;
	            endif;
	            wp_reset_query(); 
	            ?>
	
	        </div>
	
	    </div>
	</section>

<?php endif; ?>

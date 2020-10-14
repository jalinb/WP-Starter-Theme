<?php
/**
 * Template part for displaying the floor plan partial
 */

//Advanced Custom Fields 
$hide_block 			= get_sub_field('hide_block');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');
?>

<?php if( empty($hide_block) ) : ?> 

	<!-- FLOOR PLANS
	========================= -->
	<section class="floor-plans<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
	    <div class="container">
	        <div class="row justify-content-center">
	    
	            <?php
	            if( have_rows('floor_plan') ): // Repeater
	                while ( have_rows('floor_plan') ) : the_row();
	    
	                    $image = get_sub_field('image');
	                    $title = get_sub_field('title');
	                    ?>
	
	                    <!-- Floor Plan Single -->
	                    <div class="col-6 col-md-6 floor-plan-single text-center mb-4">
	                        <a href="#" class="modal-link d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#modal-<?php echo $image['id']; ?>" rel="noopener noreferrer">
	                            <div class="floor-plan-img">
	                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>" class="img-fluid" />
	                            </div>
	                        </a>
	                        <h4 class="dark mt-2 mb-0"><?php echo $title; ?></h4>
	                    </div>
	    
	                <?php 
	                endwhile;
	            endif; ?>
	    
	        </div>
	    </div>
	
	    <div class="floor-plan-modals">
	        <?php
	        if( have_rows('floor_plan') ): // Repeater
	            while ( have_rows('floor_plan') ) : the_row();
	    
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
	                ?>
	    
	                <!-- Modal: Floor Plan Single -->
	                <div class="modal fade floor-plan-single-modal" id="modal-<?php echo $image['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $title; ?>Title" aria-hidden="true">
	                    <div class="modal-dialog modal-dialog-centered" role="document">
	                        <div class="modal-content rounded-0">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                    <span aria-hidden="true">&times;</span>
	                                </button>
	                            </div>
	                            <div class="modal-body pt-0 pb-0 px-3 pb-md-4 px-md-5 text-center">
	                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>" class="img-fluid mb-3" />
	                                <p class="mb-2"><?php echo $title; ?></p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            <?php 
	            endwhile;
	        endif; ?>
	    </div>
	
	</section>

<?php endif; ?>

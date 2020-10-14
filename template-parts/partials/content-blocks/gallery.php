<?php
/**
 * Template part for displaying the gallery partial
 */

//Advanced Custom Fields 
$hide_block 			= get_sub_field('hide_block');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');
$hero_gallery   		= get_sub_field('hero_gallery');
?>

<?php if( empty($hide_block) ) : ?> 

	<?php // Hero Gallery
	if($hero_gallery): ?> 
		<!-- GALLERY
		========================= -->
		<section class="gallery<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
			<div class="container-fluid">
				<div class="row mt-md-5 mt-lg-n4 mt-xl-n5">
			
					<?php
					if( have_rows('gallery') ): // Repeater
						while ( have_rows('gallery') ) : the_row();
			
							$image = get_sub_field('image');
							$add_caption = get_sub_field('add_caption');
							$caption = get_sub_field('caption');
							$caption_below_image = get_sub_field('caption_below_image');
							?>
		
							<!-- Gallery Single -->
							<div class="col-6 col-md-4 col-lg gallery-single mb-3 mb-lg-0">
								<a href="#" class="modal-link d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#modal-<?php echo $image['id']; ?>" rel="noopener noreferrer">
									<div class="bg-blue shadow">
										<img src="<?php echo $image['sizes']['gallery-thumb']; ?>" alt="<?php echo $caption; ?>" class="img-fluid" />
									</div>
									<div class="caption text-center">
										<i class="fad fa-search-plus white"></i>
									</div>
								</a>
								<?php if($caption_below_image): ?>
									<h3 class="text-center mt-2 mb-0"><?php echo $caption; ?></h3>
								<?php endif; ?>
							</div>
			
						<?php 
						endwhile;
					endif; ?>
			
				</div>
			</div>


		<?php // Default Gallery
		else: ?> 
			<!-- GALLERY
			========================= -->
			<section class="gallery<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
				<div class="container">
					<div class="row">
				
						<?php
						if( have_rows('gallery') ): // Repeater
							while ( have_rows('gallery') ) : the_row();
				
								$image = get_sub_field('image');
								$add_caption = get_sub_field('add_caption');
								$caption = get_sub_field('caption');
								$caption_below_image = get_sub_field('caption_below_image');
								?>

								<!-- Gallery Single -->
								<div class="col-6 col-md-4 gallery-single mb-3">
									<a href="#" class="modal-link d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#modal-<?php echo $image['id']; ?>" rel="noopener noreferrer">
										<div class="bg-blue shadow">
											<img src="<?php echo $image['sizes']['gallery-thumb']; ?>" alt="<?php echo $caption; ?>" class="img-fluid" />
										</div>
										<div class="caption text-center">
											<i class="fad fa-search-plus white"></i>
										</div>
									</a>
									<?php if($caption_below_image): ?>
										<h3 class="text-center mt-2 mb-0"><?php echo $caption; ?></h3>
									<?php endif; ?>
								</div>
				
							<?php 
							endwhile;
						endif; ?>
				
					</div>
				</div>
		<?php endif; ?>

	
	    <div class="gallery-modals">
	        <?php
	        if( have_rows('gallery') ): // Repeater
	            while ( have_rows('gallery') ) : the_row();
	    
	                $image = get_sub_field('image');
	                $add_caption = get_sub_field('add_caption');
	                $caption = get_sub_field('caption');
	                ?>
	    
	                <!-- Modal: Gallery Single -->
	                <div class="modal fade gallery-single-modal" id="modal-<?php echo $image['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $caption; ?>Title" aria-hidden="true">
	                    <div class="modal-dialog modal-dialog-centered" role="document">
	                        <div class="modal-content rounded-0">
	                            <div class="modal-header">
	                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                    <span aria-hidden="true">&times;</span>
	                                </button>
	                            </div>
	                            <div class="modal-body p-0 text-center">
	                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $caption; ?>" class="img-fluid" />
	                                <?php if($add_caption): ?>
	                                    <p class="mb-2"><?php echo $caption; ?></p>
	                                <?php endif; ?>
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

<?php
/**
 * Template part for displaying the horizontal cards partial
 */

//Advanced Custom Fields 
$hide_block = get_sub_field('hide_block');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');
?>

<?php if( empty($hide_block) ) : ?>
 
	<!-- HORIZONTAL CARDS
	========================= -->
	<section class="cards <?php if(!$remove_margin_bottom): ?> mb-4<?php endif; ?>">
	    <div class="container">
	        <div class="row">
	
	            <?php
	            if( have_rows('card') ):
	                while ( have_rows('card') ) : the_row(); 
	
	                    $column_sizes 			= get_sub_field('column_sizes');
	                    $card_type 				= get_sub_field('card_type');
	                    $media_right_or_left 	= get_sub_field('media_right_or_left');
	                    $background_color 		= get_sub_field('background_color');
	                    $box_shadow 			= get_sub_field('box_shadow');
	                    $image 					= get_sub_field('image');
						$image_style 			= get_sub_field('image_style');
						$image_border_color 	= get_sub_field('image_border_color');
	                    $youtube_url 			= get_sub_field('youtube_url');
	                    $text_alignment 		= get_sub_field('text_alignment');
	                    $title 					= get_sub_field('title');
	                    $title_color            = get_sub_field('title_color');
	                    $description 			= get_sub_field('description');
	
	                    // Button
	                    $add_button = get_sub_field('button_add_button');
	                    $button_text = get_sub_field('button_button_text');
	                    $button_link_type = get_sub_field('button_button_link_type');
	                    $button_select_link = get_sub_field('button_button_select_link');
	                    $button_custom_link = get_sub_field('button_button_custom_link');
	                    $new_window = get_sub_field('button_new_window');
	                    
	                    if($column_sizes == '6_6'):
	                        $column_img = ' col-md-6';
	                        $column_description = ' col-md-6';
	                    elseif($column_sizes == '5_7'):
	                        $column_img = ' col-md-5';
	                        $column_description = ' col-md-7';
	                    endif;
	                    
	                    // Background Color
	                    if($background_color == 'none'):
	                        $background_color = '';
	                    elseif($background_color == 'white'):
	                        $background_color = ' bg-white';
	                    endif;
	
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
	
	                    // Type: Image
	                    if($image_style == 'default'):
	                        $image_class = ' card-img pt-3 pl-3 pr-3';
	                    elseif($image_style == 'full_width'):
	                        $image_class = ' pr-md-0';
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
	
	                    // Type: Video
	                    $video_embed = str_replace('watch?v=', 'embed/', $youtube_url);
	
	                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_url, $match)) :
	                        $video_id = $match[1];
	                    endif; 
	                    ?>
	
	                    <div class="col-12 card-single mb-4">
	                        <div class="h-100<?php echo $background_color; ?><?php if($box_shadow): ?> shadow<?php endif; ?>">
	
	                            <div class="row">
	                                <?php if($media_right_or_left == 'left'): ?>
	
	                                    <?php // Type: Image ?>
	                                    <?php if($card_type == 'image'): ?>
	                                        <div class="col-12<?php echo $column_img; ?><?php echo $image_class; ?>">
	                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>" class="img-border <?php echo $img_border_color; ?>">
	                                        </div>
	                                    <?php endif; ?>
	                        
	                                    <?php // Type: Video ?>
	                                    <?php if($card_type == 'video'): ?>
											<div class="col-12<?php echo $column_img; ?>">
												<div class="video-img">
													<div class="position-absolute d-flex align-items-center justify-content-center w-100 h-100 play-btn">
														<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 176 124"><defs><style>.yt-red{fill:red;}.yt-white{fill:#fff;}</style></defs><title>youtube-btn</title><path class="yt-red" d="M173.32,20.36A22.12,22.12,0,0,0,157.76,4.7C144,1,89,1,89,1S34,1,20.24,4.7A22.12,22.12,0,0,0,4.68,20.36C1,34.18,1,63,1,63s0,28.82,3.68,42.64A22.12,22.12,0,0,0,20.24,121.3C34,125,89,125,89,125s55,0,68.76-3.7a22.12,22.12,0,0,0,15.56-15.66C177,91.82,177,63,177,63S177,34.18,173.32,20.36Z" transform="translate(-1 -1)"/><polygon class="yt-white" points="70 88.17 116 62 70 35.83 70 88.17"/></svg>
													</div>
													<a href="#" class="modal-link video-btn" data-toggle="modal" data-target="#videoModal" data-src="<?php echo $video_embed; ?>" rel="noopener noreferrer">
		
														<?php // If there is a YouTube default image show it, if not use the default image
														$max_image_url = 'https://i3.ytimg.com/vi/'.$video_id.'/maxresdefault.jpg';
														$max_header_response = get_headers($max_image_url, 1);
														$mq_image_url = 'https://i3.ytimg.com/vi/'.$video_id.'/mqdefault.jpg';
														$mq_header_response = get_headers($mq_image_url, 1);
		
														if ( strpos( $max_header_response[0], "404" ) == false ): ?>
															<img src="https://i3.ytimg.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg" alt="<?php echo $title; ?>" class="img-border <?php echo $img_border_color; ?>">
														<?php elseif ( strpos( $mq_header_response[0], "404" ) == false ): ?>
															<img src="https://i3.ytimg.com/vi/<?php echo $video_id; ?>/mqdefault.jpg" alt="<?php echo $title; ?>" class="w-100 img-border <?php echo $img_border_color; ?>">
														<?php else: ?>
															<img src="/wp-content/uploads/youtube-default.jpg" alt="<?php echo $title; ?>" class="img-border <?php echo $img_border_color; ?>">
														<?php endif; ?>
														
													</a>
												</div>
	                                        </div>
	                                    <?php endif; ?>
	
	                                <?php endif; ?>
	
	                                <div class="col-12<?php echo $column_description; ?> card-content p-3 text-center text-md-<?php echo $text_alignment; ?> d-flex justify-content-center align-items-center">
	                                    <div class="card-content-wrap">
	                                        <h3 class="mb-3 <?php echo $ttl_color; ?>"><?php echo $title; ?></h3>
	                                        <?php echo $description; ?>
	                                        <?php get_template_part( 'template-parts/partials/general/button' ); ?>
	                                    </div>
	                                </div>
	
	                                <?php if($media_right_or_left == 'right'): ?>
	
	                                    <?php // Type: Image ?>
	                                    <?php if($card_type == 'image'): ?>
	                                        <div class="col-12<?php echo $column_img; ?><?php echo $image_class; ?>">
	                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>" class="img-border <?php echo $img_border_color; ?>">
	                                        </div>
	                                    <?php endif; ?>
	                        
	                                    <?php // Type: Video ?>
	                                    <?php if($card_type == 'video'): ?>
											<div class="col-12<?php echo $column_img; ?>">
												<div class="video-img">
													<div class="position-absolute d-flex align-items-center justify-content-center w-100 h-100 play-btn">
														<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 176 124"><defs><style>.yt-red{fill:red;}.yt-white{fill:#fff;}</style></defs><title>youtube-btn</title><path class="yt-red" d="M173.32,20.36A22.12,22.12,0,0,0,157.76,4.7C144,1,89,1,89,1S34,1,20.24,4.7A22.12,22.12,0,0,0,4.68,20.36C1,34.18,1,63,1,63s0,28.82,3.68,42.64A22.12,22.12,0,0,0,20.24,121.3C34,125,89,125,89,125s55,0,68.76-3.7a22.12,22.12,0,0,0,15.56-15.66C177,91.82,177,63,177,63S177,34.18,173.32,20.36Z" transform="translate(-1 -1)"/><polygon class="yt-white" points="70 88.17 116 62 70 35.83 70 88.17"/></svg>
													</div>
													<a href="#" class="modal-link video-btn" data-toggle="modal" data-target="#videoModal" data-src="<?php echo $video_embed; ?>" rel="noopener noreferrer">
		
														<?php // If there is a YouTube default image show it, if not use the default image
														$max_image_url = 'https://i3.ytimg.com/vi/'.$video_id.'/maxresdefault.jpg';
														$max_header_response = get_headers($max_image_url, 1);
														$mq_image_url = 'https://i3.ytimg.com/vi/'.$video_id.'/mqdefault.jpg';
														$mq_header_response = get_headers($mq_image_url, 1);
		
														if ( strpos( $max_header_response[0], "404" ) == false ): ?>
															<img src="https://i3.ytimg.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg" alt="<?php echo $title; ?>" class="img-border <?php echo $img_border_color; ?>">
														<?php elseif ( strpos( $mq_header_response[0], "404" ) == false ): ?>
															<img src="https://i3.ytimg.com/vi/<?php echo $video_id; ?>/mqdefault.jpg" alt="<?php echo $title; ?>" class="w-100 img-border <?php echo $img_border_color; ?>">
														<?php else: ?>
															<img src="/wp-content/uploads/youtube-default.jpg" alt="<?php echo $title; ?>" class="img-border <?php echo $img_border_color; ?>">
														<?php endif; ?>
														
													</a>
												</div>
	                                        </div>
	                                    <?php endif; ?>
	
	                                <?php endif; ?>
	
	                            </div>
	
	                        </div>
	                    </div>
	
	                <?php
	                endwhile;
	            endif;
	            ?>
	
	        </div>
	    </div>
	
	    <?php // Modal: Video ?>
	    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalTitle" aria-hidden="true">
	        <div class="modal-dialog modal-dialog-centered video-modal" role="document">
	            <div class="modal-content rounded-0">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                    </button>
	                </div>
	                <div class="modal-body d-flex p-0">
	                    <div class="embed-responsive embed-responsive-16by9">
	                        <iframe class="embed-responsive-item" src="" id="video" frameborder="0" allow="autoplay" allowfullscreen></iframe>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>

<?php endif; ?>

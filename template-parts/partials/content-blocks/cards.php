<?php
/**
 * Template part for displaying the cards partial
 */

$hide_block             = get_sub_field('hide_block');
$columns_per_row 		= get_sub_field('columns_per_row');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');
$counter 				= count(get_sub_field('card'));

if($columns_per_row == '2'):
    $column = ' col-md-6 ';
elseif($columns_per_row == '3'):
    $column = ' col-md-4 ';
elseif($columns_per_row == '4'):
    $column = ' col-md-3 ';
endif;

// More Than Two Cards Add Margin Bottom
if($counter >= '4'):
	$margin_bottom = '';
else:
	$margin_bottom = ' mb-md-0';
endif;
?>

<?php if( empty($hide_block) ) : ?>

	<!-- CARDS
	========================= -->
	<section class="cards<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
	    <div class="container">
	        <div class="row justify-content-center">
	
	            <?php 
				if( have_rows('card') ):
	                while ( have_rows('card') ) : the_row(); 
	
	                    $card_type 				= get_sub_field('card_type');
	                    $background_color 		= get_sub_field('background_color');
	                    $box_shadow 			= get_sub_field('box_shadow');
	                    $image 					= get_sub_field('image');
						$image_style 			= get_sub_field('image_style');
						$image_border_color 	= get_sub_field('image_border_color');
	                    $youtube_url 			= get_sub_field('youtube_url');
	                    $media_shadow 		 	= get_sub_field('media_shadow');
	                    $text_alignment 	 	= get_sub_field('text_alignment');
	                    $remove_text_padding 	= get_sub_field('remove_text_padding');
	                    $title 					= get_sub_field('title');
						$title_size 			= get_sub_field('title_size');
						$title_color            = get_sub_field('title_color');
	                    $top_title 				= get_sub_field('top_title');
	                    $description 			= get_sub_field('description');
	
	                    
	                    // Background Color
	                    if($background_color == 'none'):
	                        $background_color = '';
	                    elseif($background_color == 'grey'):
	                        $background_color = ' bg-light';
	                    endif;
	
	                    // Media Shadow
	                    if($media_shadow):
	                        $media_shadow = ' shadow';
	                    else:
	                        $media_shadow = '';
	                    endif;
	
	                    // Type: Image
	                    if($image_style == 'default'):
	                        $image_class = 'card-img p-3 bg-dark-blue w-100 d-flex justify-content-center align-items-center';
	                    elseif($image_style == 'full_width'):
	                        $image_class = 'p-0' . $background_color;
	                    elseif($image_style == 'max_width'):
	                        $image_class = $background_color;
	                        $image_width = ' w-100';
	                    elseif($image_style == 'offset_top'):
	                        $image_class = 'card-img pr-3 pl-3 pb-3' . $background_color;
	                        $image_offset = 'mt-n5';
	                        $offset_padding = ' pb-5 pb-md-0';
	                    endif;
	
	                    // Type: Video
	                    $video_embed = str_replace('watch?v=', 'embed/', $youtube_url);
	
	                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_url, $match)) :
	                        $video_id = $match[1];
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
	                    ?>
	
	                    <div class="col-12<?php echo $column; ?>card-single mb-4<?php echo $margin_bottom; ?><?php echo $offset_padding; ?>">
	                        <div class="h-100<?php if($box_shadow): ?> shadow<?php endif; ?>">
	                            <?php if($top_title): ?>
	                                <?php if($title_size == 'small'): ?>
	                                    <h5 class="mb-2 text-center font-weight-bold <?php echo $ttl_color; ?>"><?php echo $title; ?></h5>
	                                <?php else: ?>
	                                    <h4 class="mb-3 text-center <?php echo $ttl_color; ?> font-weight-bold"><?php echo $title; ?></h4>
	                                <?php endif; ?>
	                            <?php endif; ?>
	
	                            <?php // Type: Image ?>
	                            <?php if($card_type == 'image'): ?>
	                                <div class="<?php echo $image_class; ?>">
	                                    <img src="<?php echo $image['sizes']['card-thumb']; ?>" alt="<?php echo $title; ?>" class="<?php if($image_offset): echo $image_offset; endif; ?><?php echo $media_shadow; ?><?php echo $image_width; ?> img-border <?php echo $img_border_color; ?>" />
	                                </div>
	                            <?php endif; ?>
	    
	                            <?php // Type: Video ?>
	                            <?php if($card_type == 'video'): ?>
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
	                                            <img src="https://i3.ytimg.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg" class="<?php echo $media_shadow; ?> img-border <?php echo $img_border_color; ?>" alt="<?php echo $title; ?>">
	                                        <?php elseif ( strpos( $mq_header_response[0], "404" ) == false ): ?>
	                                            <img src="https://i3.ytimg.com/vi/<?php echo $video_id; ?>/mqdefault.jpg" class="<?php echo $media_shadow; ?> img-border <?php echo $img_border_color; ?>" alt="<?php echo $title; ?>" class="w-100">
	                                        <?php else: ?>
	                                            <img src="/wp-content/uploads/youtube-default.jpg" class="<?php echo $media_shadow; ?> img-border <?php echo $img_border_color; ?>" alt="<?php echo $title; ?>">
	                                        <?php endif; ?>
	                                        
	                                    </a>
	                                </div>
	                            <?php endif; ?>
	    
	                            <div class="card-content<?php echo $background_color; ?><?php if(!$remove_text_padding): ?> p-3<?php endif; ?> text-<?php echo $text_alignment; ?>">
	                                <?php if(!$top_title): ?>
	                                    <?php if($title_size == 'small'): ?>
	                                        <h5 class="mb-3 font-weight-bold <?php echo $ttl_color; ?>"><?php echo $title; ?></h5>
	                                    <?php else: ?>
	                                        <h4 class="mb-3 <?php echo $ttl_color; ?> font-weight-bold"><?php echo $title; ?></h4>
	                                    <?php endif; ?>
	                                <?php endif; ?>
	                                <?php echo $description; ?>
	                                <?php get_template_part( 'template-parts/partials/general/button' ); ?>
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

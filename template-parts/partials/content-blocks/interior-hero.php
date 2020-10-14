<?php
/**
 * Template part for displaying the hero partial
 */

$hide_block = get_sub_field('hide_block');
?>

<?php if( empty($hide_block) ) : ?>

    <?php
    $hero_type 			        = get_sub_field('hero_type');
    $image 					    = get_sub_field('image');
    $youtube_url 			    = get_sub_field('youtube_url');
    $title                      = get_sub_field('title');
    $title_color                = get_sub_field('title_color');
    $title_h1                   = get_sub_field('title_h1');
    $description 			    = get_sub_field('description');
    $description_background_box = get_sub_field('description_background_box');
    $remove_margin_bottom       = get_sub_field('remove_margin_bottom');

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

    // Type: Video
    $video_embed = str_replace('watch?v=', 'embed/', $youtube_url);
    
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_url, $match)) :
        $video_id = $match[1];
    endif; 
?>


    <!-- Interior Hero
    ========================= -->
    <section class="hero<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">

        <?php // Type: Image ?>
        <?php if($hero_type == 'image'): ?>
            <div class="container-fluid hero-type-image">
                <div class="row position-relative">

                    <?php if($description_background_box): ?>
                        <div class="d-none d-md-block position-absolute h-100 bg-img image-wide-overlay-right" style="background-image: url('<?php echo $image['url']; ?>')"></div>

                        <div class="col-12 col-md-6 p-0">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>" class="d-block d-md-none" />
                        </div>

                        <div class="col-12 col-md-6 d-flex justify-content-start align-items-center interior-hero-padding">
                            <div class="container-half bg-white shadow p-4">
                                <?php if($title_h1): ?>
                                    <h1 class="hero-title color-primary mb-1 <?php echo $ttl_color; ?>"><?php echo $title; ?></h1>
                                <?php else: ?>
                                    <h2 class="hero-title color-primary mb-1 <?php echo $ttl_color; ?>"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php echo $description; ?>
                                <?php get_template_part( 'template-parts/partials/general/button' ); ?>
                            </div>
                        </div>

                    <?php else: ?>
                        <div class="d-none d-md-block position-absolute h-100 bg-img image-overlay-right" style="background-image: url('<?php echo $image['url']; ?>')"></div>

                        <div class="col-12 col-md-6 p-0">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>" class="d-block d-md-none" />
                        </div>

                        <div class="col-12 col-md-6 d-flex justify-content-start align-items-center interior-hero-padding">
                            <div class="container-half pt-3 pt-md-0">
                                <?php if($title_h1): ?>
                                    <h1 class="hero-title color-primary mb-1 <?php echo $ttl_color; ?>"><?php echo $title; ?></h1>
                                <?php else: ?>
                                    <h2 class="hero-title color-primary mb-1 <?php echo $ttl_color; ?>"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php echo $description; ?>
                                <?php get_template_part( 'template-parts/partials/general/button' ); ?>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>


        <?php // Type: Video ?>
        <?php elseif($hero_type == 'video'): ?>
            <div class="container-fluid hero-type-video">
                <div class="row position-relative">

                    <div class="position-absolute h-100 bg-img bg-overlay-right" style="background-image: url('<?php echo $image['url']; ?>')"></div>

                    <div class="position-absolute h-100 w-100 bg-blue-overlay bg-overlay-right"></div>
    
                    <div class="col-12 col-md-6 d-flex justify-content-md-end align-items-center interior-hero-padding">
                        <div class="hero-description container-half white">
                            <?php if($title_h1): ?>
                                <h1 class="hero-title color-primary mb-1 <?php echo $ttl_color; ?>"><?php echo $title; ?></h1>
                            <?php else: ?>
                                <h2 class="hero-title color-primary mb-1 <?php echo $ttl_color; ?>"><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php echo $description; ?>
                            <?php get_template_part( 'template-parts/partials/general/button' ); ?>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6 d-flex align-items-center mb-3 mb-md-0">
                        <div class="video-img shadow">
                            <div class="position-absolute d-flex align-items-center justify-content-center w-100 h-100 play-btn">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 176 124"><defs><style>.yt-red{fill:red;}.yt-white{fill:#fff;}</style></defs><title>youtube-btn</title><path class="yt-red" d="M173.32,20.36A22.12,22.12,0,0,0,157.76,4.7C144,1,89,1,89,1S34,1,20.24,4.7A22.12,22.12,0,0,0,4.68,20.36C1,34.18,1,63,1,63s0,28.82,3.68,42.64A22.12,22.12,0,0,0,20.24,121.3C34,125,89,125,89,125s55,0,68.76-3.7a22.12,22.12,0,0,0,15.56-15.66C177,91.82,177,63,177,63S177,34.18,173.32,20.36Z" transform="translate(-1 -1)"/><polygon class="yt-white" points="70 88.17 116 62 70 35.83 70 88.17"/></svg>
                            </div>
                            
                            <a href="#" class="modal-link video-btn" data-toggle="modal" data-target="#videoModal" data-src="<?php echo $video_embed; ?>" rel="noopener noreferrer">
                                <?php // If there is a YouTube default image show it, if not use the default image
                                    $max_image_url 			= 'https://i3.ytimg.com/vi/'.$video_id.'/maxresdefault.jpg';
                                    $max_header_response 	= get_headers($max_image_url, 1);
                                    $mq_image_url 			= 'https://i3.ytimg.com/vi/'.$video_id.'/mqdefault.jpg';
                                    $mq_header_response 	= get_headers($mq_image_url, 1);
        
                                if ( strpos( $max_header_response[0], "404" ) == false ): ?>
                                    <img src="https://i3.ytimg.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg" alt="<?php echo $title; ?>">
                                    
                                    <?php elseif ( strpos( $mq_header_response[0], "404" ) == false ): ?>
                                        <img src="https://i3.ytimg.com/vi/<?php echo $video_id; ?>/mqdefault.jpg" alt="<?php echo $title; ?>" class="w-100">
                                        
                                    <?php else: ?>
                                        <img src="/wp-content/uploads/youtube-default.jpg" alt="<?php echo $title; ?>">
                                        
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
    
                </div>
            </div>
        <?php endif; ?>
	
	
	    <?php // Modal: Video ?>
	    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalTitle" aria-hidden="true">
	        <div class="modal-dialog modal-dialog-centered video-modal" role="document">
	            <div class="modal-content rounded-0">
	                <div class="modal-header">
	                    <button type="button" class="close color-theme" data-dismiss="modal" aria-label="Close">
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

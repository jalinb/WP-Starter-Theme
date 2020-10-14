<?php
/**
 * Template part for displaying the hero partial
 */

//Advanced Custom Fields 
$hide_block = get_sub_field('hide_block');
?>

<?php if( empty($hide_block) ) : ?>

    <?php
    $show_video_background 	= get_sub_field('show_video_background');
    $background_video_webm 	= get_sub_field('background_video_webm');
    $background_video_mp4 	= get_sub_field('background_video_mp4');
    $image 			        = get_sub_field('image');
    $search_main_title 	    = get_sub_field('search_main_title');
    $search_title 		    = get_sub_field('search_title');
    $search_sub_title       = get_sub_field('search_sub_title');
    $remove_margin_bottom   = get_sub_field('remove_margin_bottom'); 
    ?>


    <!-- HOME HERO
	========================= -->
    <section class="home-hero position-relative border-bottom border-width border-secondary<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>" style="background-image:url('<?php echo $image['url']; ?>');">
        
        <div class="hero-height py-5"></div>

        <?php if($show_video_background): ?>
            <div class="hero-video w-100 h-100 position-absolute d-none d-md-block">
                <div class="video w-100 h-100">
                    <video autoplay="" playsinline="" loop="" muted="" id="video-bg">
                        <source src="<?php echo $background_video_mp4['url']; ?>" type="video/mp4">
                        <source src="<?php echo $background_video_webm['url']; ?>" type="video/webm">
                    </video>
                </div>
            </div>
        <?php endif; ?>

        <div class="hero-search position-relative">
            <div class="position-absolute h-100 w-100 bg-primary bg-opaque-75"></div>

            <div class="container">
                <div class="row hero-search py-4">

                    <div class="col-12 hero-title white text-center">
                        <?php echo $search_main_title; ?>
                    </div>

                    <div class="col-12 d-flex">
                        <div class="search-title header-font text-uppercase mr-4">
                            <h4 class="font-weight-normal white mb-0"><?php echo $search_title; ?></h4>
                            <p class="text-medium white mb-1"><?php echo $search_sub_title; ?></p>
                        </div>
    
                        <div class="col community-search">
                            <?php $search_widget = new WPSL_Search_Widget(); ?>
                            <form action="/wellage-senior-living-communities/" method="post" id="wpsl-widget-form" class="mx-auto">
                                <div class="input-group addon d-flex align-items-end">
                                    <?php do_action( 'wpsl_before_widget_input' ); ?>
                                    <input type="text" name="wpsl-widget-search" placeholder="Search By City, State, or Zip" id="wpsl-widget-search" value="" class="form-control search-bar">
                                    <?php do_action( 'wpsl_after_widget_input' );?>
                                    <div class="input-group-btn">
                                        <button id="wpsl-widget-submit" type="submit" class="btn btn-stroke btn-hover-nostroke btn-white btn-secondary-hover"><i class="fas fa-search mr-2"></i>Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

<?php endif; ?>

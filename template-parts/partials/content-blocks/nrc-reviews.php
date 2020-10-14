<?php
/**
 * Template part for displaying the NRC reviews partial
 */ 

$hide_block             = get_sub_field('hide_block');
$image                  = get_sub_field('image');
$background_color       = get_sub_field('background_color');
$title 	                = get_sub_field('title');
$sub_title              = get_sub_field('sub_title');
$number_of_reviews      = get_sub_field('number_of_reviews');
$community_script_url   = get_sub_field('community_script_url');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');

// Background Color
if($background_color == 'primary'):
    $bg_color = 'bg-primary';
elseif($background_color == 'secondary'):
    $bg_color = 'bg-secondary';
elseif($background_color == 'tertiary'):
    $bg_color = 'bg-tertiary';
elseif($background_color == 'quaternary'):
    $bg_color = 'bg-quaternary';               
elseif($background_color == 'white'):
    $bg_color = 'bg-white';
elseif($background_color == 'dark'):
    $bg_color = 'bg-dark';
elseif($background_color == 'black'):
    $bg_color = 'bg-black';
elseif($background_color == 'none'):
    $bg_color = '';
endif;
?> 

<?php if( empty($hide_block) ) : ?>

    <section class="nrc-reviews position-relative <?php echo $bg_color; ?><?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
        <div class="position-absolute h-100 w-100 bg-img bg-opaque" style="background-image:url('<?php echo $image['url']; ?>');"></div>

        <div class="container pt-5 pb-4">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase white mb-1"><?php echo $title; ?></h2>
                    <h4 class="text-uppercase white font-weight-normal mb-4"><?php echo $sub_title; ?></h4>
                </div>
            </div>

            <div id="reviews-block" class="row justify-content-center">
            <!-- NRC Health Dependencies -->
            <div class="nrc-health">
                <div class="ds-summary"></div>
                <div class="ds-breakdown"></div>
                <div class="ds-distribution" data-ds-clickable="true"></div>
                <div class="ds-comments" data-ds-pagesize="<?php echo $number_of_reviews; ?>"></div>
                <script src="<?php echo $community_script_url; ?>" async></script>
                <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/nrc-reviews.js"></script>
            </div>

        </div>

    </section>

<?php endif; ?>	

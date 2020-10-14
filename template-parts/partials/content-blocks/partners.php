<?php
/**
 * Template part for displaying the partners partial
 */

$hide_block             = get_sub_field('hide_block');
$background_color       = get_sub_field('background_color');
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

    <!-- Partners
    ========================= -->
    <section class="partners-slider <?php echo $bg_color; ?><?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
        <div class="container">

            <div class="row">
                <div class="col-12 col-md-8 py-3 mx-auto">         
                    <div class="main-carousel" data-flickity='{ "pageDots": false, "groupCells": 3 }'>

                        <?php 
                        if( have_rows('partner') ):
                            while ( have_rows('partner') ) : the_row();
                                $image      = get_sub_field('image');
                                $title      = get_sub_field('title');
                                $url        = get_sub_field('url');
                                $new_window = get_sub_field('new_window');
                                ?>

                                <div class="carousel-cell partner-slide">
                                    <a href="<?php echo $url; ?>" <?php if($new_window): ?>target="_blank"<?php endif; ?>><img src="<?php echo $image['url']; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>" /></a>
                                </div>
                            <?php
                            endwhile;
                        endif;
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </section>

<?php endif; ?>

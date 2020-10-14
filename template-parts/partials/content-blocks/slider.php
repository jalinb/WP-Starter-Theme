<?php
/**
 * Template part for displaying the slider partial
 */

?>

<?php
$title = get_sub_field('title');
$description = get_sub_field('description');
?>

<section class="slider bg-green">
    <div class="container py-5">

        <div class="row mb-4">
            <div class="col-12 text-center white">
                <h2 class="white mb-1"><?php echo $title; ?></h2>
                <h5 class="white"><?php echo $description; ?></h5>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-8 mx-auto">         
                <div class="main-carousel" data-flickity='{ "pageDots": false, "groupCells": 3 }'>

                    <?php 
                    if( have_rows('slide') ):
                        while ( have_rows('slide') ) : the_row();
                            $image = get_sub_field('image');
                            $url = get_sub_field('url');
                            $new_window = get_sub_field('new_window');
                            ?>

                            <div class="carousel-cell results-slide border-orange">
                                <a href="<?php echo $url; ?>" <?php if($new_window): ?>target="_blank"<?php endif; ?>><img src="<?php echo $image['url']; ?>" alt="" /></a>
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

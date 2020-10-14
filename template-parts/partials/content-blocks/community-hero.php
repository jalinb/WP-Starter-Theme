<?php
/**
 * Template part for displaying the community hero partial
 */

//Advanced Custom Fields 
$hide_block = get_sub_field('hide_block');
?>

<?php if( empty($hide_block) ) : ?>

    <?php
    $image 			        = get_sub_field('image');
    $title                  = get_sub_field('title');
    $remove_margin_bottom   = get_sub_field('remove_margin_bottom');
    ?>


    <!-- COMMUNITY HERO
	========================= -->
    <section class="community-hero position-relative<?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>" style="background-image:url('<?php echo $image['url']; ?>');">
        <div class="community-hero-gradient position-absolute w-100 h-100"></div>

        <div class="container">

            <div class="row community-hero-caption">
                <div class="col-12 text-center">
                    <h1 class="white font-weight-normal"><?php echo $title; ?></h1>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

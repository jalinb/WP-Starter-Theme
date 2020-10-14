<?php
/**
 * Template part for displaying the bottom cta partial
 */

$hide_block             = get_sub_field('hide_block');
$image                  = get_sub_field('image');
$background_color       = get_sub_field('background_color');
$title                  = get_sub_field('title');
$title_color            = get_sub_field('title_color');
$description            = get_sub_field('description');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');

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

// Background Color
$bg_opaque = 'bg-opaque';
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
    $bg_opaque = '';
endif;
?>

<?php if( empty($hide_block) ) : ?>

    <!-- CTA
    ========================= -->
    <section class="bottom-cta <?php echo $bg_color; ?><?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">

        <div class="container-fluid">
            <div class="row position-relative">

                    <div class="position-absolute h-100 w-100 bg-img <?php echo $bg_opaque; ?>" style="background-image: url('<?php echo $image['url']; ?>')"></div>

                    <div class="col-12 col-md-6"></div>

                    <div class="col-12 col-md-6 d-flex justify-content-start align-items-center py-5">
                        <div class="container-half shadow bg-white text-center p-5">
                            <h2 class="<?php echo $ttl_color; ?>"><?php echo $title; ?></h2>
                            <?php echo $description; ?>
                            <?php get_template_part( 'template-parts/partials/general/button' ); ?>
                        </div>
                    </div>

            </div>
        </div>

	</section>

<?php endif; ?>

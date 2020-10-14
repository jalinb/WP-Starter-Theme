<?php
/**
 * Template part for displaying the gradient block partial
 */
 
//Advanced Custom Fields 
$hide_block             = get_sub_field('hide_block');
$background_image       = get_sub_field('background_image');
$background_color = get_sub_field('background_color');
$description            = get_sub_field('description');
$remove_margin_bottom   = get_sub_field('remove_margin_bottom');

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

    <!-- Gradient Block
	========================= -->
    <section class="gradient-block position-relative <?php echo $bg_color; ?><?php if(!$remove_margin_bottom): ?> mb-5<?php endif; ?>">
        <div class="position-absolute h-100 w-100 bg-img bg-opaque" style="background-image: url('<?php echo $background_image['url']; ?>')"></div>
        
        <div class="container">
            <div class="row py-5">

                <?php echo $description; ?>

            </div>
        </div>
    </section>

<?php endif; ?>
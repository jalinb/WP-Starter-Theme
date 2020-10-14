<?php
/**
 * Template part for displaying the callout bar partial
 */

//Advanced Custom Fields
$description = get_sub_field('description');
$add_button = get_sub_field('button_add_button');

$hide_block = get_sub_field('hide_block');
?>

<?php if( empty($hide_block) ) : ?>

	<!-- CALLOUT BAR
	========================= -->
	<section class="callout bg-theme">
	    <div class="container">
	        <?php if($add_button): ?>
	            <div class="row justify-content-between py-4">
	                <div class="col-12 col-md-6 white text-center text-md-left mb-3 mb-md-0">
	                    <?php echo $description; ?>
	                </div>
	                <div class="col-12 col-md-5 d-flex justify-content-center align-items-center white">
	                    <?php get_template_part( 'template-parts/partials/general/button' ); ?>
	                </div>
	            </div>
	        <?php else: ?>
	            <div class="row justify-content-center">
	                <div class="col-12 col-md-5 text-center white py-4"><?php echo $description; ?></div>
	            </div>
	        <?php endif;?>
	    </div>
	</section>

<?php endif; ?>

<?php
/**
 * Template part for displaying the CTA partial
 */

//Advanced Custom Fields
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');

$hide_block = get_sub_field('$hide_block');
?>

<?php if( empty($hide_block) )  : ?>

	<!-- CTA
	============= -->
	<section class="cta">
	    <div class="container-fluid bg-theme">
	
	        <div class="row">
	            <div class="col-12 col-md-8">
	                <h3 class="highlight-title"><?php echo $title; ?></h3>
	                <h4 class="highlight-subtitle"><?php echo $subtitle; ?></h4>
	            </div>
	            <div class="col-12 col-md-4"><?php get_template_part( 'template-parts/partials/general/button' ); ?></div>
	        </div>
	
	    </div>
	</section>

<?php endif; ?>

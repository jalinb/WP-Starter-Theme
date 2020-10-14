<?php
/**
 * Template part for displaying the testminoals.
 */

//Advanced Custom Fields 
$hide_block = get_sub_field('hide_block');
?>

<?php if( empty($hide_block) ) : ?>

	<!-- TESTIMONIALS
	========================= -->
	<?php
		$testimonial_amount = get_sub_field('testimonial_amount');
	?>
	
	<section class="testimonials">
	    <div class="container">
	        <div class="row">
	
	            <?php
	            query_posts(array(
	                'post_type' => 'testimonials',
	                'post_status' => 'publish',
	                'posts_per_page' => $testimonial_amount));
	
	            if ( have_posts() ) :
	                while ( have_posts() ) : the_post();
	
	                    $testimonial = get_field('testimonial');
	                    ?>
	
	                    <div class="col-12 col-md-4 testimonial-single text-center">
	                        <p>"<?php echo $testimonial; ?>"<br />
	                        <span class="testimonial-name">- <?php the_title(); ?></span></p>
	                    </div>
	
	                <?php 
	                endwhile;
	            endif;
	            wp_reset_query();
	            ?>
	
	        </div>
	    </div>
	</section>
	
<?php endif; ?>	

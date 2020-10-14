<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-12">
	
						<?php if ( have_posts() ) : ?>
	
							<?php
							while ( have_posts() ) :
								the_post();
	
								get_template_part( 'template-parts/content/content', 'excerpt' );
	
							endwhile;
	
							// Previous/next page navigation.
							twentynineteen_the_posts_navigation();
	
							// If no content, include the "No posts found" template.
						else :
							get_template_part( 'template-parts/content/content', 'none' );
	
						endif;
						?>
						
					</div>
				</div>
			</div>
		</main>
	</section>

<?php
get_footer();

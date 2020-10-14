<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="page-content">

					<?php

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/default', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

					endwhile; // End of the loop.
					?>

				</div>

			</article><!-- #post-<?php the_ID(); ?> -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

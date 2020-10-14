<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content/post', 'router' );

					endwhile;
					?>
			</article>

		</main>
	</section>

<?php
get_footer();

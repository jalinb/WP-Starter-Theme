<?php
/**
 * The template for displaying 404 page
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php 
		$padding_top = get_field('padding_top');
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="page-content<?php if($padding_top): ?> page-top<?php endif; ?>">

                <div class="container">
                    <div class="row">

                        <div class="col-12 text-center mb-4">
                            <div class="404-header mb-5">
                                <h1>Page not found.</h1>
                                <h4>We can't seem to find what you are looking for.</h4>
                            </div>
            
                            <div class="404-search-box">
                                <p class="mb-2">Try searching below or return to the <a href="<?php echo get_site_url(); ?>">home page</a>.</p>
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                        
                    </div>
                </div>

			</div>

		</article><!-- #post-<?php the_ID(); ?> -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

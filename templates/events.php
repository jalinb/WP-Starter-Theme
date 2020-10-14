<?php
/**
 * Template Name: Events
 * Template Post Type: post, communities
 */

get_header();
?>

<?php 
$padding_top        = get_field('padding_top');
$current_page_id    = get_the_id();
$page_description  	= get_field('page_description');
$page_image  		= get_field('page_image');
?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main">

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="page-content<?php if($padding_top): ?> page-top<?php endif; ?>">


                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="color-primary mb-1"><?php the_title(); ?></h1>
                                <p class="dark"><?php the_date(); ?></p>
                                <hr class="bg-primary">
                            </div>
                        </div>
                    </div>

                    <?php // Flexible Content
                    if( have_rows('content_blocks') ):
                        while ( have_rows('content_blocks') ) : the_row();
                            get_template_part( 'template-parts/partials/all', 'partials' );
                        endwhile;
                    endif; ?>

                </div>
            </article><!-- #post-<?php the_ID(); ?> -->

        </main>
    </section>

<?php
get_footer();

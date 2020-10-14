<?php
/**
 * Template Name: Sitemap
 */

get_header();
?>

<?php 
$padding_top = get_field('padding_top');
?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main">

        
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="page-content<?php if($padding_top): ?> page-top<?php endif; ?>">


                    <div class="container sitemap">
                        <div class="row my-5">
                            <div class="col-12 text-center">
                                <h1 class="color-primary">Sitemap</h1>
                            </div>
                        </div>

                        <div class="row">

                            <!-- Pages -->
                            <div class="col-12 col-md-6">
                                <h2 class="color-tertiary">Pages</h2>
                                <ul>
                                    <?php // Sitemap
                                    wp_list_pages( array( 'title_li' => '', 'exclude' => 881, 'class' => 'anchor-primary-hover' ) ); ?>
                                </ul>
                            </div>


                            <!-- Posts -->
                            <div class="col-12 col-md-6">
                                <?php // Communities ?>
                                <h2 class="color-tertiary">Communities</h2>
                                <?php
                                query_posts(array(
                                    'post_type' => 'communities',
                                    'post_status' => 'publish',
                                    'posts_per_page' => -1,
                                    'post_parent' => 0,
                                    'orderby' => 'title',
                                    'order' => 'ASC'
                                ));

                                if ( have_posts() ) : ?>
                                    <ul>
                                        <?php
                                        while ( have_posts() ) : the_post(); ?>

                                            <li>
                                                <a href="<?php the_permalink();?>" class="anchor-primary-hover"><?php the_title(); ?></a>
                                                <?php 
                                                $temp_query_parent = $wp_query;  // Temp Query For Resetting
                                                $current_page_id = get_the_ID(); // Current Post ID
                                                query_posts(array(
                                                    'post_type' => 'communities',
                                                    'post_status' => 'publish',
                                                    'posts_per_page' => -1,
                                                    'post_parent' => $current_page_id,
                                                    'orderby' => 'title',
                                                    'order' => 'ASC'
                                                )); ?>

                                                <?php if ( have_posts() ) : ?>
                                                    <ul>
                                                    <?php while ( have_posts() ) : the_post(); ?>

                                                        <li>
                                                            <a href="<?php the_permalink();?>" class="anchor-primary-hover"><?php the_title(); ?></a>
                                                            <?php 
                                                            $temp_query_child = $wp_query;  // Temp Query For Resetting
                                                            $child_current_page_id = get_the_ID(); // Current Post ID
                                                            query_posts(array(
                                                                'post_type'      => 'communities',
                                                                'post_status'    => 'publish',
                                                                'posts_per_page' => -1,
                                                                'post_parent'    => $child_current_page_id,
                                                                'orderby'        => 'title',
                                                                'order'          => 'ASC'
                                                            )); ?>

                                                            <?php if ( have_posts() ) : ?>
                                                                <ul>
                                                                <?php while ( have_posts() ) : the_post(); ?>
                                                                    <li>
                                                                        <a href="<?php the_permalink();?>" class="anchor-primary-hover"><?php the_title(); ?></a>
                                                                        <?php 
                                                                        $temp_query_child_2 = $wp_query;  // Temp Query For Resetting
                                                                        $child_2_current_page_id = get_the_ID(); // Current Post ID
                                                                        query_posts(array(
                                                                            'post_type' => 'communities',
                                                                            'post_status' => 'publish',
                                                                            'posts_per_page' => -1,
                                                                            'post_parent' => $child_2_current_page_id,
                                                                            'orderby' => 'title',
                                                                            'order' => 'ASC'
                                                                        )); ?>

                                                                        <?php if ( have_posts() ) : ?>
                                                                            <ul>
                                                                            <?php while ( have_posts() ) : the_post(); ?>
                                                                                <li>
                                                                                    <a href="<?php the_permalink();?>" class="anchor-primary-hover"><?php the_title(); ?></a>
                                                                                </li>
                                                                            <?php endwhile; ?>
                                                                            </ul>
                                                                        <?php endif; ?>
                                                                        <?php if (isset($wp_query)) : $wp_query = $temp_query_child_2; endif; ?>
                                                                    </li>
                                                                <?php endwhile; ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                            <?php if (isset($wp_query)) : $wp_query = $temp_query_child; endif; ?>
                                                        </li>

                                                    <?php endwhile; ?>
                                                    </ul>
                                                <?php endif; ?>
                                                <?php if (isset($wp_query)) : $wp_query = $temp_query_parent; endif; ?>
                                                    
                                            </li>

                                        <?php 
                                        endwhile; ?>
                                    </ul>
                                <?php
                                endif;
                                wp_reset_query(); 
                                ?>
                            </div>


                        </div>
                    </div>


                </div>
            </article><!-- #post-<?php the_ID(); ?> -->

        </main>
    </section>

<?php
get_footer();

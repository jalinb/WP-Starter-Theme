<?php
/**
 * Template part for displaying the news partial
 */

?>

<section class="news mb-5 pb-1">
    <div class="container">


    <?php // 2023 News Posts
        query_posts(array(
            'post_type' => 'post',
            'cat' => 2,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'year' => '2023',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ( have_posts() ) : ?>
            <div class="news-2023 mb-5">
                <div class="row">
                    <div class="col-12 white mb-3">
                        <h2>News Releases 2023</h2>
                    </div>
                </div>

                <?php 
                while ( have_posts() ) : the_post(); 
                    $image = get_field('image');
                    $location = get_field('location');
                    $link_post_offsite = get_field('link_post_offsite');
                    $excerpt = get_field('excerpt');
                    $post_url = get_field('post_url');
                    $description = get_field('description');
                    $facebook_post = get_field('facebook_post');
                    $facebook_link = get_field('facebook_link');
                    ?>

                    <div class="row row-margin bg-white shadow p-3 event-single mb-4">
                        <div class="col-12 col-sm-5 col-md-3 pb-3 pb-sm-0 text-center">
                            <?php if($link_post_offsite): ?>
                                <a href="<?php echo $post_url; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                            <?php // Facebook link
                            if($facebook_post): ?>
                                <a href="<?php echo $facebook_link; ?>" target="_blank" class="btn font-weight-normal text-small mt-4 d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-square text-large mr-2"></i>Join the Conversation
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                            <?php if($link_post_offsite): ?>
                                <h4><a href="<?php echo $post_url; ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php else: ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                            <span class="event-meta text-medium"><?php echo $location; ?><?php if($location): ?> - <?php endif; ?><?php the_date('F j, Y'); ?></span>
                            <div class="event-description blue mt-2">
                                <?php if($link_post_offsite): ?>
                                    <?php echo $excerpt; ?>
                                <?php else: ?>
                                    <p><?php echo wp_trim_words( $description, 60, '...' ); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php // Get current page URL 
                            $shareURL = urlencode(get_permalink());

                            // Get current page title
                            $shareTitle = str_replace( ' ', '%20', get_the_title());

                            // Get Post Thumbnail for pinterest
                            $shareThumbnail = $image['url'];

                            $twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
                            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
                            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
                            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
                            ?>

                            <div class="d-flex flex-wrap align-items-end justify-content-between">
                                <?php if($link_post_offsite): ?>
                                    <a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="orange font-weight-bold mr-3">Read More</a>
                                <?php endif; ?>
                                <div class="share-social m-0">
                                    <span class="share-title">Share on:</span>
                                    <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
                                    <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
                                    <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php 
                endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_query(); 
        ?>


        <?php // 2022 News Posts
        query_posts(array(
            'post_type' => 'post',
            'cat' => 2,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'year' => '2022',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ( have_posts() ) : ?>
            <div class="news-2022 mb-5">
                <div class="row">
                    <div class="col-12 white mb-3">
                        <h2>News Releases 2022</h2>
                    </div>
                </div>

                <?php 
                while ( have_posts() ) : the_post(); 
                    $image = get_field('image');
                    $location = get_field('location');
                    $link_post_offsite = get_field('link_post_offsite');
                    $excerpt = get_field('excerpt');
                    $post_url = get_field('post_url');
                    $description = get_field('description');
                    $facebook_post = get_field('facebook_post');
                    $facebook_link = get_field('facebook_link');
                    ?>

                    <div class="row row-margin bg-white shadow p-3 event-single mb-4">
                        <div class="col-12 col-sm-5 col-md-3 pb-3 pb-sm-0 text-center">
                            <?php if($link_post_offsite): ?>
                                <a href="<?php echo $post_url; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                            <?php // Facebook link
                            if($facebook_post): ?>
                                <a href="<?php echo $facebook_link; ?>" target="_blank" class="btn font-weight-normal text-small mt-4 d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-square text-large mr-2"></i>Join the Conversation
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                            <?php if($link_post_offsite): ?>
                                <h4><a href="<?php echo $post_url; ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php else: ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                            <span class="event-meta text-medium"><?php echo $location; ?><?php if($location): ?> - <?php endif; ?><?php the_date('F j, Y'); ?></span>
                            <div class="event-description blue mt-2">
                                <?php if($link_post_offsite): ?>
                                    <?php echo $excerpt; ?>
                                <?php else: ?>
                                    <p><?php echo wp_trim_words( $description, 60, '...' ); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php // Get current page URL 
                            $shareURL = urlencode(get_permalink());

                            // Get current page title
                            $shareTitle = str_replace( ' ', '%20', get_the_title());

                            // Get Post Thumbnail for pinterest
                            $shareThumbnail = $image['url'];

                            $twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
                            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
                            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
                            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
                            ?>

                            <div class="d-flex flex-wrap align-items-end justify-content-between">
                                <?php if($link_post_offsite): ?>
                                    <a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="orange font-weight-bold mr-3">Read More</a>
                                <?php endif; ?>
                                <div class="share-social m-0">
                                    <span class="share-title">Share on:</span>
                                    <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
                                    <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
                                    <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php 
                endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_query(); 
        ?>


        <?php // 2021 News Posts
        query_posts(array(
            'post_type' => 'post',
            'cat' => 2,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'year' => '2021',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ( have_posts() ) : ?>
            <div class="news-2021 mb-5">
                <div class="row">
                    <div class="col-12 white mb-3">
                        <h2>News Releases 2021</h2>
                    </div>
                </div>

                <?php 
                while ( have_posts() ) : the_post(); 
                    $image = get_field('image');
                    $location = get_field('location');
                    $link_post_offsite = get_field('link_post_offsite');
                    $excerpt = get_field('excerpt');
                    $post_url = get_field('post_url');
                    $description = get_field('description');
                    $facebook_post = get_field('facebook_post');
                    $facebook_link = get_field('facebook_link');
                    ?>

                    <div class="row row-margin bg-white shadow p-3 event-single mb-4">
                        <div class="col-12 col-sm-5 col-md-3 pb-3 pb-sm-0 text-center">
                            <?php if($link_post_offsite): ?>
                                <a href="<?php echo $post_url; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                            <?php // Facebook link
                            if($facebook_post): ?>
                                <a href="<?php echo $facebook_link; ?>" target="_blank" class="btn font-weight-normal text-small mt-4 d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-square text-large mr-2"></i>Join the Conversation
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                            <?php if($link_post_offsite): ?>
                                <h4><a href="<?php echo $post_url; ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php else: ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                            <span class="event-meta text-medium"><?php echo $location; ?><?php if($location): ?> - <?php endif; ?><?php the_date('F j, Y'); ?></span>
                            <div class="event-description blue mt-2">
                                <?php if($link_post_offsite): ?>
                                    <?php echo $excerpt; ?>
                                <?php else: ?>
                                    <p><?php echo wp_trim_words( $description, 60, '...' ); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php // Get current page URL 
                            $shareURL = urlencode(get_permalink());

                            // Get current page title
                            $shareTitle = str_replace( ' ', '%20', get_the_title());

                            // Get Post Thumbnail for pinterest
                            $shareThumbnail = $image['url'];

                            $twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
                            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
                            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
                            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
                            ?>

                            <div class="d-flex flex-wrap align-items-end justify-content-between">
                                <?php if($link_post_offsite): ?>
                                    <a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="orange font-weight-bold mr-3">Read More</a>
                                <?php endif; ?>
                                <div class="share-social m-0">
                                    <span class="share-title">Share on:</span>
                                    <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
                                    <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
                                    <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php 
                endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_query(); 
        ?>


        <?php // 2020 News Posts
        query_posts(array(
            'post_type' => 'post',
            'cat' => 2,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'year' => '2020',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ( have_posts() ) : ?>
            <div class="news-2020 mb-5">
                <div class="row">
                    <div class="col-12 white mb-3">
                        <h2>News Releases 2020</h2>
                    </div>
                </div>

                <?php 
                while ( have_posts() ) : the_post(); 
                    $image = get_field('image');
                    $location = get_field('location');
                    $link_post_offsite = get_field('link_post_offsite');
                    $excerpt = get_field('excerpt');
                    $post_url = get_field('post_url');
                    $description = get_field('description');
                    $facebook_post = get_field('facebook_post');
                    $facebook_link = get_field('facebook_link');
                    ?>

                    <div class="row row-margin bg-white shadow p-3 event-single mb-4">
                        <div class="col-12 col-sm-5 col-md-3 pb-3 pb-sm-0 text-center">
                            <?php if($link_post_offsite): ?>
                                <a href="<?php echo $post_url; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                            <?php // Facebook link
                            if($facebook_post): ?>
                                <a href="<?php echo $facebook_link; ?>" target="_blank" class="btn font-weight-normal text-small mt-4 d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-square text-large mr-2"></i>Join the Conversation
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                            <?php if($link_post_offsite): ?>
                                <h4><a href="<?php echo $post_url; ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php else: ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                            <span class="event-meta text-medium"><?php echo $location; ?><?php if($location): ?> - <?php endif; ?><?php the_date('F j, Y'); ?></span>
                            <div class="event-description blue mt-2">
                                <?php if($link_post_offsite): ?>
                                    <?php echo $excerpt; ?>
                                <?php else: ?>
                                    <p><?php echo wp_trim_words( $description, 60, '...' ); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php // Get current page URL 
                            $shareURL = urlencode(get_permalink());

                            // Get current page title
                            $shareTitle = str_replace( ' ', '%20', get_the_title());

                            // Get Post Thumbnail for pinterest
                            $shareThumbnail = $image['url'];

                            $twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
                            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
                            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
                            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
                            ?>

                            <div class="d-flex flex-wrap align-items-end justify-content-between">
                                <?php if($link_post_offsite): ?>
                                    <a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="orange font-weight-bold mr-3">Read More</a>
                                <?php endif; ?>
                                <div class="share-social m-0">
                                    <span class="share-title">Share on:</span>
                                    <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
                                    <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
                                    <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php 
                endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_query(); 
        ?>


        <?php // 2019 News Posts
        query_posts(array(
            'post_type' => 'post',
            'cat' => 2,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'year' => '2019',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ( have_posts() ) : ?>
            <div class="news-2019 mb-5">
                <div class="row">
                    <div class="col-12 white mb-3">
                        <h2>News Releases 2019</h2>
                    </div>
                </div>

                <?php 
                while ( have_posts() ) : the_post(); 
                    $image = get_field('image');
                    $location = get_field('location');
                    $link_post_offsite = get_field('link_post_offsite');
                    $excerpt = get_field('excerpt');
                    $post_url = get_field('post_url');
                    $description = get_field('description');
                    $facebook_post = get_field('facebook_post');
                    $facebook_link = get_field('facebook_link');
                    ?>

                    <div class="row row-margin bg-white shadow p-3 event-single mb-4">
                        <div class="col-12 col-sm-5 col-md-3 pb-3 pb-sm-0 text-center">
                            <?php if($link_post_offsite): ?>
                                <a href="<?php echo $post_url; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                            <?php // Facebook link
                            if($facebook_post): ?>
                                <a href="<?php echo $facebook_link; ?>" target="_blank" class="btn font-weight-normal text-small mt-4 d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-square text-large mr-2"></i>Join the Conversation
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                            <?php if($link_post_offsite): ?>
                                <h4><a href="<?php echo $post_url; ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php else: ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                            <span class="event-meta text-medium"><?php echo $location; ?><?php if($location): ?> - <?php endif; ?><?php the_date('F j, Y'); ?></span>
                            <div class="event-description blue mt-2">
                                <?php if($link_post_offsite): ?>
                                    <?php echo $excerpt; ?>
                                <?php else: ?>
                                    <p><?php echo wp_trim_words( $description, 60, '...' ); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php // Get current page URL 
                            $shareURL = urlencode(get_permalink());

                            // Get current page title
                            $shareTitle = str_replace( ' ', '%20', get_the_title());

                            // Get Post Thumbnail for pinterest
                            $shareThumbnail = $image['url'];

                            $twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
                            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
                            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
                            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
                            ?>

                            <div class="d-flex flex-wrap align-items-end justify-content-between">
                                <?php if($link_post_offsite): ?>
                                    <a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="orange font-weight-bold mr-3">Read More</a>
                                <?php endif; ?>
                                <div class="share-social m-0">
                                    <span class="share-title">Share on:</span>
                                    <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
                                    <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
                                    <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php 
                endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_query(); 
        ?>


        <?php // 2018 News Posts
        query_posts(array(
            'post_type' => 'post',
            'cat' => 2,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'year' => '2018',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ( have_posts() ) : ?>
            <div class="news-2018 mb-5">
                <div class="row">
                    <div class="col-12 white mb-3">
                        <h2>News Releases 2018</h2>
                    </div>
                </div>

                <?php 
                while ( have_posts() ) : the_post(); 
                    $image = get_field('image');
                    $location = get_field('location');
                    $link_post_offsite = get_field('link_post_offsite');
                    $excerpt = get_field('excerpt');
                    $post_url = get_field('post_url');
                    $description = get_field('description');
                    $facebook_post = get_field('facebook_post');
                    $facebook_link = get_field('facebook_link');
                    ?>

                    <div class="row row-margin bg-white shadow p-3 event-single mb-4">
                        <div class="col-12 col-sm-5 col-md-3 pb-3 pb-sm-0 text-center">
                            <?php if($link_post_offsite): ?>
                                <a href="<?php echo $post_url; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                            <?php // Facebook link
                            if($facebook_post): ?>
                                <a href="<?php echo $facebook_link; ?>" target="_blank" class="btn font-weight-normal text-small mt-4 d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-square text-large mr-2"></i>Join the Conversation
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                            <?php if($link_post_offsite): ?>
                                <h4><a href="<?php echo $post_url; ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php else: ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                            <span class="event-meta text-medium"><?php echo $location; ?><?php if($location): ?> - <?php endif; ?><?php the_date('F j, Y'); ?></span>
                            <div class="event-description blue mt-2">
                                <?php if($link_post_offsite): ?>
                                    <?php echo $excerpt; ?>
                                <?php else: ?>
                                    <p><?php echo wp_trim_words( $description, 60, '...' ); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php // Get current page URL 
                            $shareURL = urlencode(get_permalink());

                            // Get current page title
                            $shareTitle = str_replace( ' ', '%20', get_the_title());

                            // Get Post Thumbnail for pinterest
                            $shareThumbnail = $image['url'];

                            $twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
                            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
                            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
                            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
                            ?>

                            <div class="d-flex flex-wrap align-items-end justify-content-between">
                                <?php if($link_post_offsite): ?>
                                    <a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="orange font-weight-bold mr-3">Read More</a>
                                <?php endif; ?>
                                <div class="share-social m-0">
                                    <span class="share-title">Share on:</span>
                                    <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
                                    <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
                                    <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php 
                endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_query(); 
        ?>


        <?php // 2017 News Posts
        query_posts(array(
            'post_type' => 'post',
            'cat' => 2,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'year' => '2017',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ( have_posts() ) : ?>
            <div class="news-2017 mb-5">
                <div class="row">
                    <div class="col-12 white mb-3">
                        <h2>News Releases 2017</h2>
                    </div>
                </div>

                <?php 
                while ( have_posts() ) : the_post(); 
                    $image = get_field('image');
                    $location = get_field('location');
                    $link_post_offsite = get_field('link_post_offsite');
                    $excerpt = get_field('excerpt');
                    $post_url = get_field('post_url');
                    $description = get_field('description');
                    $facebook_post = get_field('facebook_post');
                    $facebook_link = get_field('facebook_link');
                    ?>

                    <div class="row row-margin bg-white shadow p-3 event-single mb-4">
                        <div class="col-12 col-sm-5 col-md-3 pb-3 pb-sm-0 text-center">
                            <?php if($link_post_offsite): ?>
                                <a href="<?php echo $post_url; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                            <?php // Facebook link
                            if($facebook_post): ?>
                                <a href="<?php echo $facebook_link; ?>" target="_blank" class="btn font-weight-normal text-small mt-4 d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-square text-large mr-2"></i>Join the Conversation
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                            <?php if($link_post_offsite): ?>
                                <h4><a href="<?php echo $post_url; ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php else: ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                            <span class="event-meta text-medium"><?php echo $location; ?><?php if($location): ?> - <?php endif; ?><?php the_date('F j, Y'); ?></span>
                            <div class="event-description blue mt-2">
                                <?php if($link_post_offsite): ?>
                                    <?php echo $excerpt; ?>
                                <?php else: ?>
                                    <p><?php echo wp_trim_words( $description, 60, '...' ); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php // Get current page URL 
                            $shareURL = urlencode(get_permalink());

                            // Get current page title
                            $shareTitle = str_replace( ' ', '%20', get_the_title());

                            // Get Post Thumbnail for pinterest
                            $shareThumbnail = $image['url'];

                            $twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
                            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
                            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
                            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
                            ?>

                            <div class="d-flex flex-wrap align-items-end justify-content-between">
                                <?php if($link_post_offsite): ?>
                                    <a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="orange font-weight-bold mr-3">Read More</a>
                                <?php endif; ?>
                                <div class="share-social m-0">
                                    <span class="share-title">Share on:</span>
                                    <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
                                    <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
                                    <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php 
                endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_query(); 
        ?>


        <?php // 2016 News Posts
        query_posts(array(
            'post_type' => 'post',
            'cat' => 2,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'year' => '2016',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ( have_posts() ) : ?>
            <div class="news-2016 mb-5">
                <div class="row">
                    <div class="col-12 white mb-3">
                        <h2>News Releases 2016</h2>
                    </div>
                </div>

                <?php 
                while ( have_posts() ) : the_post(); 
                    $image = get_field('image');
                    $location = get_field('location');
                    $link_post_offsite = get_field('link_post_offsite');
                    $excerpt = get_field('excerpt');
                    $post_url = get_field('post_url');
                    $description = get_field('description');
                    $facebook_post = get_field('facebook_post');
                    $facebook_link = get_field('facebook_link');
                    ?>

                    <div class="row row-margin bg-white shadow p-3 event-single mb-4">
                        <div class="col-12 col-sm-5 col-md-3 pb-3 pb-sm-0 text-center">
                            <?php if($link_post_offsite): ?>
                                <a href="<?php echo $post_url; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                            <?php // Facebook link
                            if($facebook_post): ?>
                                <a href="<?php echo $facebook_link; ?>" target="_blank" class="btn font-weight-normal text-small mt-4 d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-square text-large mr-2"></i>Join the Conversation
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                            <?php if($link_post_offsite): ?>
                                <h4><a href="<?php echo $post_url; ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php else: ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                            <span class="event-meta text-medium"><?php echo $location; ?><?php if($location): ?> - <?php endif; ?><?php the_date('F j, Y'); ?></span>
                            <div class="event-description blue mt-2">
                                <?php if($link_post_offsite): ?>
                                    <?php echo $excerpt; ?>
                                <?php else: ?>
                                    <p><?php echo wp_trim_words( $description, 60, '...' ); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php // Get current page URL 
                            $shareURL = urlencode(get_permalink());

                            // Get current page title
                            $shareTitle = str_replace( ' ', '%20', get_the_title());

                            // Get Post Thumbnail for pinterest
                            $shareThumbnail = $image['url'];

                            $twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
                            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
                            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
                            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
                            ?>

                            <div class="d-flex flex-wrap align-items-end justify-content-between">
                                <?php if($link_post_offsite): ?>
                                    <a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="orange font-weight-bold mr-3">Read More</a>
                                <?php endif; ?>
                                <div class="share-social m-0">
                                    <span class="share-title">Share on:</span>
                                    <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
                                    <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
                                    <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php 
                endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_query(); 
        ?>


        <?php // 2015 News Posts
        query_posts(array(
            'post_type' => 'post',
            'cat' => 2,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'year' => '2015',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ( have_posts() ) : ?>
            <div class="news-2015 mb-5">
                <div class="row">
                    <div class="col-12 white mb-3">
                        <h2>News Releases 2015</h2>
                    </div>
                </div>

                <?php 
                while ( have_posts() ) : the_post(); 
                    $image = get_field('image');
                    $location = get_field('location');
                    $link_post_offsite = get_field('link_post_offsite');
                    $excerpt = get_field('excerpt');
                    $post_url = get_field('post_url');
                    $description = get_field('description');
                    $facebook_post = get_field('facebook_post');
                    $facebook_link = get_field('facebook_link');
                    ?>

                    <div class="row row-margin bg-white shadow p-3 event-single mb-4">
                        <div class="col-12 col-sm-5 col-md-3 pb-3 pb-sm-0 text-center">
                            <?php if($link_post_offsite): ?>
                                <a href="<?php echo $post_url; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                            <?php // Facebook link
                            if($facebook_post): ?>
                                <a href="<?php echo $facebook_link; ?>" target="_blank" class="btn font-weight-normal text-small mt-4 d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-square text-large mr-2"></i>Join the Conversation
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                            <?php if($link_post_offsite): ?>
                                <h4><a href="<?php echo $post_url; ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php else: ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                            <span class="event-meta text-medium"><?php echo $location; ?><?php if($location): ?> - <?php endif; ?><?php the_date('F j, Y'); ?></span>
                            <div class="event-description blue mt-2">
                                <?php if($link_post_offsite): ?>
                                    <?php echo $excerpt; ?>
                                <?php else: ?>
                                    <p><?php echo wp_trim_words( $description, 60, '...' ); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php // Get current page URL 
                            $shareURL = urlencode(get_permalink());

                            // Get current page title
                            $shareTitle = str_replace( ' ', '%20', get_the_title());

                            // Get Post Thumbnail for pinterest
                            $shareThumbnail = $image['url'];

                            $twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
                            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
                            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
                            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
                            ?>

                            <div class="d-flex flex-wrap align-items-end justify-content-between">
                                <?php if($link_post_offsite): ?>
                                    <a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="orange font-weight-bold mr-3">Read More</a>
                                <?php endif; ?>
                                <div class="share-social m-0">
                                    <span class="share-title">Share on:</span>
                                    <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
                                    <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
                                    <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php 
                endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_query(); 
        ?>


        <?php // 2014 News Posts
        query_posts(array(
            'post_type' => 'post',
            'cat' => 2,
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'year' => '2014',
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if ( have_posts() ) : ?>
            <div class="news-2014 mb-5">
                <div class="row">
                    <div class="col-12 white mb-3">
                        <h2>News Releases 2014</h2>
                    </div>
                </div>

                <?php 
                while ( have_posts() ) : the_post(); 
                    $image = get_field('image');
                    $location = get_field('location');
                    $link_post_offsite = get_field('link_post_offsite');
                    $excerpt = get_field('excerpt');
                    $post_url = get_field('post_url');
                    $description = get_field('description');
                    $facebook_post = get_field('facebook_post');
                    $facebook_link = get_field('facebook_link');
                    ?>

                    <div class="row row-margin bg-white shadow p-3 event-single mb-4">
                        <div class="col-12 col-sm-5 col-md-3 pb-3 pb-sm-0 text-center">
                            <?php if($link_post_offsite): ?>
                                <a href="<?php echo $post_url; ?>" target="_blank"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url']; ?>" alt="<?php the_title(); ?>" /></a>
                            <?php endif; ?>
                            <?php // Facebook link
                            if($facebook_post): ?>
                                <a href="<?php echo $facebook_link; ?>" target="_blank" class="btn font-weight-normal text-small mt-4 d-flex align-items-center justify-content-center">
                                    <i class="fab fa-facebook-square text-large mr-2"></i>Join the Conversation
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-sm-7 col-md-9">
                            <?php if($link_post_offsite): ?>
                                <h4><a href="<?php echo $post_url; ?>" target="_blank"><?php the_title(); ?></a></h4>
                            <?php else: ?>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                            <span class="event-meta text-medium"><?php echo $location; ?><?php if($location): ?> - <?php endif; ?><?php the_date('F j, Y'); ?></span>
                            <div class="event-description blue mt-2">
                                <?php if($link_post_offsite): ?>
                                    <?php echo $excerpt; ?>
                                <?php else: ?>
                                    <p><?php echo wp_trim_words( $description, 60, '...' ); ?></p>
                                <?php endif; ?>
                            </div>
                            
                            <?php // Get current page URL 
                            $shareURL = urlencode(get_permalink());

                            // Get current page title
                            $shareTitle = str_replace( ' ', '%20', get_the_title());

                            // Get Post Thumbnail for pinterest
                            $shareThumbnail = $image['url'];

                            $twitterURL = 'https://twitter.com/intent/tweet?text='.$shareTitle.'&amp;url='.$shareURL;
                            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shareURL;
                            $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$shareURL.'&amp;title='.$shareTitle;
                            $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$shareURL.'&amp;media='.$shareThumbnail.'&amp;description='.$shareTitle;
                            ?>

                            <div class="d-flex flex-wrap align-items-end justify-content-between">
                                <?php if($link_post_offsite): ?>
                                    <a href="<?php echo $post_url; ?>" target="_blank" class="orange font-weight-bold mr-3">Read More</a>
                                <?php else: ?>
                                    <a href="<?php the_permalink(); ?>" class="orange font-weight-bold mr-3">Read More</a>
                                <?php endif; ?>
                                <div class="share-social m-0">
                                    <span class="share-title">Share on:</span>
                                    <a class="share-link share-twitter" href="<?php echo $twitterURL; ?>" target="_blank">Twitter</a>
                                    <a class="share-link share-facebook" href="<?php echo $facebookURL; ?>" target="_blank">Facebook</a>
                                    <a class="share-link share-linkedin" href="<?php echo $linkedInURL; ?>" target="_blank">LinkedIn</a>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php 
                endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_query(); 
        ?>
    

    </div>
</section>

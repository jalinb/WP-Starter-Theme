<?php
/**
 * Template part for displaying social links partial
 */
?>

<?php
// Get the the posts taxonomy
$term_obj_list  = get_the_terms( $post->ID, 'community' );
$terms_string   = wp_list_pluck($term_obj_list, 'term_id');

// If a community page get Community Options if not get Theme Options
if (is_singular('communities')):
    $social_links = get_field('social_links', 'community_' . $terms_string[0]);
else:
    $social_links = get_field('social_links', 'option');
endif;
?>

<div class="social-links d-flex justify-content-center">
    <?php if ($social_links['facebook']): ?>
        <div class="social-icon d-flex justify-content-center align-items-center">
            <a href="<?php echo $social_links['facebook']; ?>" target="_blank" class="d-flex justify-content-center align-items-center anchor-secondary-hover">
                <i class="fab fa-facebook-square"></i>
            </a>
        </div>
    <?php endif; ?>

    <?php if ($social_links['instagram']): ?>
        <div class="social-icon d-flex justify-content-center align-items-center">
            <a href="<?php echo $social_links['instagram']; ?>" target="_blank" class="d-flex justify-content-center align-items-center anchor-secondary-hover">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    <?php endif; ?>

    <?php if ($social_links['twitter']): ?>
        <div class="social-icon d-flex justify-content-center align-items-center">
            <a href="<?php echo $social_links['twitter']; ?>" target="_blank" class="d-flex justify-content-center align-items-center anchor-secondary-hover">
                <i class="fab fa-twitter"></i>
            </a>
        </div>
    <?php endif; ?>

    <?php if ($social_links['google+']): ?>
        <div class="social-icon d-flex justify-content-center align-items-center">
            <a href="<?php echo $social_links['google+']; ?>" target="_blank" class="d-flex justify-content-center align-items-center anchor-secondary-hover">
                <i class="fab fa-google-plus-g"></i>
            </a>
        </div>
    <?php endif; ?>

    <?php if ($social_links['linkedin']): ?>
        <div class="social-icon d-flex justify-content-center align-items-center">
            <a href="<?php echo $social_links['linkedin']; ?>" target="_blank" class="d-flex justify-content-center align-items-center anchor-secondary-hover">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    <?php endif; ?>

    <?php if ($social_links['youtube']): ?>
        <div class="social-icon d-flex justify-content-center align-items-center">
            <a href="<?php echo $social_links['youtube']; ?>" target="_blank" class="d-flex justify-content-center align-items-center anchor-secondary-hover">
                <i class="fab fa-youtube"></i>
            </a>
        </div>
    <?php endif; ?>

    <?php if ($social_links['yelp']): ?>
        <div class="social-icon d-flex justify-content-center align-items-center">
            <a href="<?php echo $social_links['yelp']; ?>" target="_blank" class="d-flex justify-content-center align-items-center anchor-secondary-hover">
                <i class="fab fa-yelp"></i>
            </a>
        </div>
    <?php endif; ?>

    <?php if ($social_links['trip_advisor']): ?>
        <div class="social-icon d-flex justify-content-center align-items-center">
            <a href="<?php echo $social_links['trip_advisor']; ?>" target="_blank" class="d-flex justify-content-center align-items-center anchor-secondary-hover">
                <i class="fab fa-tripadvisor"></i>
            </a>
        </div>
    <?php endif; ?>

</div>

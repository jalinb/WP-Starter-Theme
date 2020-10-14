<?php
/**
 * The template for displaying the main email address
 */

?>

<?php 
// Get the the posts taxonomy
$term_obj_list = get_the_terms( $post->ID, 'community' );
$terms_string = wp_list_pluck($term_obj_list, 'term_id');

// If a community page get Community Options if not get Theme Options
if (is_singular('communities')):
    $email_address = get_field('email_address', 'community_' . $terms_string[0]);
else:
    $email_address = get_field('email_address', 'option');
endif;

echo $email_address;
?>

<?php
/**
 * The template for displaying the main phone number
 */
?>
 
<?php
// Get the the posts taxonomy
$term_obj_list  = get_the_terms( $post->ID, 'community' );
$terms_string   = wp_list_pluck($term_obj_list, 'term_id');

// If a community page get Community Options if not get Theme Options
if (is_singular('communities')):
    $phone_number = get_field('phone_number', 'community_' . $terms_string[0]);
else:
    $phone_number = get_field('phone_number', 'option');
endif;

echo $phone_number;
?>

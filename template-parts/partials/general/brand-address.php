<?php
/**
 * The template for displaying the brand address
 */
 
?>

<?php  
// Get the the posts taxonomy
$term_obj_list = get_the_terms( $post->ID, 'community' );
$terms_string = wp_list_pluck($term_obj_list, 'term_id');

// If a community page get Community Options if not get Theme Options
if (is_singular('communities')):
    $address_line_1     = get_field('address_line_1', 'community_' . $terms_string[0]);
    $address_line_2     = get_field('address_line_2', 'community_' . $terms_string[0]);
    $city_state_zip     = get_field('city_state_zip', 'community_' . $terms_string[0]);
    $google_maps_url    = get_field('google_maps_url', 'community_' . $terms_string[0]);
else:
    $address_line_1     = get_field('address_line_1', 'option');
    $address_line_2     = get_field('address_line_2', 'option');
    $city_state_zip     = get_field('city_state_zip', 'option');
    $google_maps_url    = get_field('google_maps_url', 'option');
endif;

// Drop state to a new line if addresses are empty
if ((!$address_line_1) && (!$address_line_2)):
    $city_state_zip = str_replace(', ', ',<br />', $city_state_zip);
endif;
?>

<?php if($google_maps_url): ?>
    <a href="<?php echo $google_maps_url; ?>" target="_blank" class="anchor-primary-hover">
<?php endif; ?>

        <address class="mb-1">
            <?php if($address_line_1):
                echo $address_line_1;
                echo '<br />';
            endif; ?>
            <?php if($address_line_2):
                echo $address_line_2;
                echo '<br />';
            endif; ?>
            <?php if($city_state_zip):
                echo $city_state_zip;
            endif; ?>
        </address>

<?php if($google_maps_url): ?>
    </a>
<?php endif; ?>

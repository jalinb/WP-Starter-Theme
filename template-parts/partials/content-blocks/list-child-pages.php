<?php
/**
 * The template for displaying a list of the current page's child pages. NOTE: This pulls from the main navigation menu so that the list is organized the same way as the navigation.
 */

?>

<?php
if (is_singular('communities')):
    get_template_part( 'template-parts/partials/content-blocks/list-child-pages', 'community' );
else:
    get_template_part( 'template-parts/partials/content-blocks/list-child-pages', 'corporate' );
endif;
?>
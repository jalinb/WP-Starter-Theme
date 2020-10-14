<?php
/**
 * Functions for Advanced Custom Fields
 */

// Advanced Custom Fields Options Page
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
        'capability'	=> 'edit_posts',
        'parent_slug'   => '',
        'icon_url'      => false,
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
      'page_title' 		=> 'Navigation',
          'menu_title'	=> 'Navigation',
          'menu_slug'   => 'theme-options-navigation',
          'capability'  => 'edit_posts',
          'parent_slug'	=> 'theme-options',
          'icon_url'    => false,
    ));
      
    acf_add_options_sub_page(array(
        'page_title' 		=> 'Footer',
            'menu_title'	=> 'Footer',
            'menu_slug'     => 'theme-options-footer',
            'capability'    => 'edit_posts',
            'parent_slug'	=> 'theme-options',
            'icon_url'      => false,
    ));

}




// Add quick-collapse feature to ACF Flexible Content fields
add_action('acf/input/admin_head', function() { ?>
    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                var collapseButtonClass = 'collapse-all';

                // Add a clickable link to the label line of flexible content fields
                $('.acf-field-flexible-content > .acf-label')
                    .append('<a class="' + collapseButtonClass + '" style="position: absolute; top: 0; right: 0; cursor: pointer;">Collapse All</a>');

                // Simulate a click on each flexible content item's "collapse" button when clicking the new link
                $('.' + collapseButtonClass).on('click', function() {
                    $('.acf-flexible-content .layout:not(.-collapsed) .acf-fc-layout-controls .-collapse').click();
                });
            });
        })(jQuery);
    </script><?php
});




// Dynamically populate ACF select list with all communities
function acf_load_community_field_choices( $field ) {
    // reset choices
    $field['choices'] = array();

    // Load all terms of the Community Taxonomy
    $communities = get_terms( 'taxonomy=community' );

    // loop through array and add to field 'choices'
    if( is_array($communities) ) {
        foreach( $communities as $community ) {

            $community_home_page = get_field('community_home_page', $community->taxonomy . '_' . $community->term_id);
            $id = url_to_postid( site_url($community_home_page) );

            $field['choices'][ $id ] = $community->name;
        }
    }
    
    // return the field
    return $field;
}

add_filter('acf/load_field/name=default_community', 'acf_load_community_field_choices');

?>
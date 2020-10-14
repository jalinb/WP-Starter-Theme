<?php
/**
 * Functions for registering custom post types
 */


// ------------------------------
// Begin Communities Post Type
// ------------------------------

// Custom Taxonomy
function themes_taxonomy() {  
    register_taxonomy(  
        'community',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'communities',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Communities',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'community', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'themes_taxonomy');




// Custom Post Type - Communities
function custom_post_type_communities() {
    $labels = array(
        'name'                => _x( 'Communities', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Community Page', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Communities', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Page:', 'text_domain' ),
        'all_items'           => __( 'All Pages', 'text_domain' ),
        'view_item'           => __( 'View Page', 'text_domain' ),
        'add_new_item'        => __( 'Add New Page', 'text_domain' ),
        'add_new'             => __( 'Add New Page', 'text_domain' ),
        'edit_item'           => __( 'Edit Page', 'text_domain' ),
        'update_item'         => __( 'Update Page', 'text_domain' ),
        'search_items'        => __( 'Search Page', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'Communities', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'page-attributes', 'custom-fields' ),
        'taxonomies'          => array( 'community'),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-location-alt',
        'can_export'          => true,
        //'rewrite'             => array('slug' => false, 'with_front' => false),
        'has_archive'       => 'community',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'communities', $args );
}
add_action( 'init', 'custom_post_type_communities', 0 );




// Admin Screen: Filter By Taxonomies
function filter_pages_by_taxonomies( $post_type, $which ) {
	// Apply this only on a specific post type
	if ( 'communities' !== $post_type )
		return;

	// A list of taxonomy slugs to filter by
	$taxonomies = array( 'community' );

	foreach ( $taxonomies as $taxonomy_slug ) {

		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;

		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
			);
		}
		echo '</select>';
	}

}
add_action( 'restrict_manage_posts', 'filter_pages_by_taxonomies' , 10, 2);




// Allow Pagination: For events inside the communities CPT. It must use paged in the query.
function events_disable_redirect_canonical( $redirect_url ) {
    if ( is_paged() && is_singular() ) $redirect_url = false; 
    return $redirect_url; 
}
add_filter( 'redirect_canonical', 'events_disable_redirect_canonical' );
// ------------------------------
// End Communities Post Type
// ------------------------------




// ------------------------------
// Begin Staff Post Type
// ------------------------------
function custom_post_type_staff() {
    $labels = array(
        'name'                => _x( 'Staff', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Staff Member', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Staff', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Staff:', 'text_domain' ),
        'all_items'           => __( 'All Staff', 'text_domain' ),
        'view_item'           => __( 'View Staff', 'text_domain' ),
        'add_new_item'        => __( 'Add New Staff Member', 'text_domain' ),
        'add_new'             => __( 'Add New', 'text_domain' ),
        'edit_item'           => __( 'Edit Staff Member', 'text_domain' ),
        'update_item'         => __( 'Update Staff Member', 'text_domain' ),
        'search_items'        => __( 'Search Staff Member', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'Staff', 'text_domain' ),
        'description'         => __( 'Post Type Description', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'category'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-groups',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'Staff', $args );
}
add_action( 'init', 'custom_post_type_staff', 0 );

// Staff - Admin Title Text
function custom_staff_title( $input ) {

    global $post_type;

    if( is_admin() && 'Add title' == $input && 'staff' == $post_type )
        return 'Enter staff name';

    return $input;
}
add_filter('gettext','custom_staff_title');
// ------------------------------
// End Staff Post Type
// ------------------------------
?>
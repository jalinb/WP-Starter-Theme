<?php
/**
 * Functions for WP Store Locator
 */


function custom_templates( $templates ) {
    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array (
        'id'   => 'custom',
        'name' => 'Custom template',
        'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/custom.php',
    );

    return $templates;
}
add_filter( 'wpsl_templates', 'custom_templates' );




function custom_widget_templates( $templates ) {

    /**
     * The 'id' is used in the shortcode and accessible with [wpsl_widget template="the-used-id"]
     * The 'name' is shown in the widget configuration screen.
     * The 'path' points in this example to a 'wpsl-templates' folder inside your theme folder.
     * The 'file_name' is the name of the file that contains the custom template code.
     */
    $templates[] = array (
        'id'        => 'custom',
        'name'      => 'Custom template',
        'path'      => get_stylesheet_directory() . '/' . 'wpsl-templates/',
        'file_name' => 'custom-widget.php'
    );

    return $templates;
}
add_filter( 'wpsl_widget_templates', 'custom_widget_templates' );




function custom_thumb_size() {
    
    $size = '';
    
    return $size;
}
add_filter( 'wpsl_thumb_size', 'custom_thumb_size' );




function custom_thumb_attr( $attr ) {
    
    $attr['class'] = 'wpsl-store-thumb custom-style img-border color-tertiary';
    
    return $attr;
}
add_filter( 'wpsl_thumb_attr', 'custom_thumb_attr' );




// Add Custom Fields
function custom_meta_box_fields( $meta_fields ) {

    $meta_fields[__( 'Location', 'wpsl' )] = array(
        'featured_dealer' => array(
            'label' => __( 'Featured', 'wpsl' ),
            'type'  => 'checkbox'
        ),
        'google_maps_url' => array(
            'label' => __( 'Google Maps URL', 'wpsl' )
        ),
        'address' => array(
            'label'    => __( 'Address', 'wpsl' ),
            'required' => true
        ),
        'address2' => array(
            'label' => __( 'Address 2', 'wpsl' )
        ),
        'city' => array(
            'label'    => __( 'City', 'wpsl' ),
            'required' => true
        ),
        'state' => array(
            'label' => __( 'State', 'wpsl' )
        ),
        'zip' => array(
            'label' => __( 'Zip Code', 'wpsl' )
        ),
        'country' => array(
            'label'    => __( 'Country', 'wpsl' ),
            'required' => true
        ),
        'country_iso' => array(
            'type' => 'hidden'
        ),
        'lat' => array(
            'label' => __( 'Latitude', 'wpsl' )
        ),
        'lng' => array(
            'label' => __( 'Longitude', 'wpsl' )
        )
    );

    $meta_fields[__( 'Additional Information', 'wpsl' )] = array(
        'phone' => array(
            'label' => __( 'Tel', 'wpsl' )
        ),
        'fax' => array(
            'label' => __( 'Fax', 'wpsl' )
        ),
        'email' => array(
            'label' => __( 'Email', 'wpsl' )
        ),
        'url' => array(
            'label' => __( 'Url', 'wpsl' )
        ),
        'new_window' => array(
            'label' => __( 'Open URL in a New Window', 'wpsl' ),
            'type'  => 'checkbox'
        ),
        'coming_soon' => array(
            'label' => __( 'Coming Soon Description', 'wpsl' )
        )
    );

    $meta_fields[__( 'Services', 'wpsl' )] = array(

        'assisted_living' => array(
            'label' => __( 'Assisted Living', 'wpsl' ),
            'type'  => 'checkbox'
        ),
        'independent_living' => array(
            'label' => __( 'Independent Living', 'wpsl' ),
            'type'  => 'checkbox'
        ),
        'memory_care' => array(
            'label' => __( 'Memory Care', 'wpsl' ),
            'type'  => 'checkbox'
        ),
        'short_term_stay' => array(
            'label' => __( 'Short-Term Stay', 'wpsl' ),
            'type'  => 'checkbox'
        ),
        'rental_ccrc' => array(
            'label' => __( 'Rental CCRC', 'wpsl' ),
            'type'  => 'checkbox'
        ),
        'rehabilitation' => array(
            'label' => __( 'Post-Hospitalization Rehabilitation', 'wpsl' ),
            'type'  => 'checkbox'
        ),
        'behavioral_health' => array(
            'label' => __( 'Behavioral Health', 'wpsl' ),
            'type'  => 'checkbox'
        ),
        'care_nursing' => array(
            'label' => __( 'Long-Term Care & Skilled Nursing', 'wpsl' ),
            'type'  => 'checkbox'
        )
    );

    return $meta_fields;
}
add_filter( 'wpsl_meta_box_fields', 'custom_meta_box_fields' );




// Add Service Data To The Returned Search
function custom_frontend_meta_fields( $store_fields ) {

    $store_fields['wpsl_coming_soon'] = array(
        'name' => 'coming_soon'
    );
    $store_fields['wpsl_featured_dealer'] = array(
        'name' => 'featured_dealer'
    );
    $store_fields['wpsl_new_window'] = array(
        'name' => 'new_window'
    );
    $store_fields['wpsl_google_maps_url'] = array(
        'name' => 'google_maps_url',
        'type' => 'url'
    );
    $store_fields['wpsl_assisted_living'] = array(
        'name' => 'assisted_living',
    );
    $store_fields['wpsl_independent_living'] = array(
        'name' => 'independent_living',
    );
    $store_fields['wpsl_memory_care'] = array(
        'name' => 'memory_care',
    );
    $store_fields['wpsl_short_term_stay'] = array(
        'name' => 'short_term_stay',
    );
    $store_fields['wpsl_rental_ccrc'] = array(
        'name' => 'rental_ccrc',
    );

    $store_fields['wpsl_rehabilitation'] = array(
        'name' => 'rehabilitation',
    );
    $store_fields['wpsl_behavioral_health'] = array(
        'name' => 'behavioral_health',
    );
    $store_fields['wpsl_care_nursing'] = array(
        'name' => 'care_nursing',
    );

    return $store_fields;
}
add_filter( 'wpsl_frontend_meta_fields', 'custom_frontend_meta_fields' );




// Listing Template Structure
function custom_listing_template() {

    global $wpsl, $wpsl_settings;

    $listing_template = '<li data-store-id="<%= id %>" class="col-12 col-md-6 wpsl-community-single mb-4">' . "\r\n";
    $listing_template .= "\t\t" . '<div class="wpsl-store-location h-100 bg-white shadow">' . "\r\n";
    $listing_template .= "\t\t\t" . '<div class="row">' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<div class="col-12 community-img mb-2"><a href="<%= url %>"<% if ( new_window ) { %> target="_blank"<% } %>><%= thumb %></a></div>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<div class="col-12 community-title px-4"><h3 class="color-tertiary mb-2"><%= store %> <% if ( coming_soon ) { %><stong class="d-block dark small font-weight-bold"><%= coming_soon %></stong><% } %></h3></div>' . "\r\n";



    $listing_template .= "\t\t\t\t" . '<div class="col-12">' . "\r\n";
    $listing_template .= "\t\t\t\t\t" . '<div class="row px-3">' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t" . '<div class="col-12 col-sm-6 community-info mb-3">' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<div class="community-location"><p class="dark font-weight-bold mb-2">Location</p></div>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<div class="community-phone d-flex line-height-reset mb-1"><i class="fas fa-phone color-primary mt-1 mr-2"></i><a href="tel:<%= phone %>" class="anchor-primary-hover"><%= phone %></a></div>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<% if ( google_maps_url ) { %>' . "\r\n"; // If has Google Maps link
    $listing_template .= "\t\t\t\t\t\t\t" . '<div class="community-address d-flex line-height-reset"><i class="fas fa-map-marker-alt color-primary mt-1 mr-2"></i><a href="<%= google_maps_url %>" target="_blank" class="anchor-primary-hover"><%= address %><br /><% if ( address2 ) { %><%= address2 %><br /><% } %><%= city %>, <%= state %></a></div>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% } else { %>' . "\r\n"; 
    $listing_template .= "\t\t\t\t\t\t\t" . '<div class="community-address d-flex line-height-reset"><i class="fas fa-map-marker-alt color-primary mt-1 mr-2"></i><%= address %><br /><% if ( address2 ) { %><%= address2 %><br /><% } %><%= city %>, <%= state %></div>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<% } %>' . "\r\n"; 
    $listing_template .= "\t\t\t\t\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t" . '<div class="col-12 col-sm-6 community-services mb-3">' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<p class="dark font-weight-bold mb-2">Services Offered</p>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<div class="community-services d-flex"><ul class="check-list before-primary after-primary">' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<% if ( independent_living ) { %><li>Independent Living</li><% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<% if ( assisted_living ) { %><li>Assisted Living</li><% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<% if ( memory_care ) { %><li>Memory Care</li><% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<% if ( short_term_stay ) { %><li>Respite Care &amp; Short-Term Stay</li><% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<% if ( rental_ccrc ) { %><li>Rental CCRC</li><% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<% if ( rehabilitation ) { %><li>Post-Hospitalization Rehabilitation</li><% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<% if ( behavioral_health ) { %><li>Behavioral Health</li><% } %>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t\t" . '<% if ( care_nursing ) { %><li>Long-Term Care & Skilled Nursing</li><% } %>' . "\r\n";

    $listing_template .= "\t\t\t\t\t\t\t" . '</ul></div>' . "\r\n";
    $listing_template .= "\t\t\t\t\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t\t\t\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t\t\t\t" . '<div class="col-12 community-link px-4 pb-3"><a class="btn btn-tertiary btn-dark-hover" href="<%= url %>"<% if ( new_window ) { %> target="_blank"<% } %>>View Community</a></div>' . "\r\n";


    $listing_template .= "\t\t\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t\t" . '</div>' . "\r\n";
    $listing_template .= "\t" . '</li>';

    return $listing_template;
}
add_filter( 'wpsl_listing_template', 'custom_listing_template' );

?>

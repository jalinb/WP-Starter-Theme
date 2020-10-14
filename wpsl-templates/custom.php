<?php 
global $wpsl_settings, $wpsl;

$output         = $this->get_custom_css(); 
$autoload_class = ( !$wpsl_settings['autoload'] ) ? ' wpsl-not-loaded' : '';

$output .= '<div id="wpsl-wrap">' . "\r\n";
$output .= "\t" . '<div class="wpsl-search wpsl-clearfix position-relative bg-black ' . $this->get_css_classes() . '">' . "\r\n";
$output .= "\t\t" . '<div class="position-absolute h-100 w-100 bg-img bg-opaque" style="background-image: url(/wp-content/uploads/bg-senior-dining.jpg)"></div>';
$output .= "\t\t" . '<div id="wpsl-search-wrap" class="container py-5">' . "\r\n";
$output .= "\t\t\t" . '<div class="row">';
$output .= "\t\t\t\t" . '<div class="col-12 text-center white">';
$output .= "\t\t\t\t\t" . '<h2 class="mb-1">Find Your Perfect Community</h2>';
$output .= "\t\t\t\t\t" . '<p>A trusted home you will love!</p>';
$output .= "\t\t\t\t" . '</div>';
$output .= "\t\t\t" . '</div>';
$output .= "\t\t\t" . '<div class="row"><div class="col-12"><form autocomplete="off" class="d-flex justify-content-center flex-wrap mb-3">' . "\r\n";
$output .= "\t\t\t" . '<div class="wpsl-input w-auto mr-0 border-bottom">' . "\r\n";
$output .= "\t\t\t\t" . '<input id="wpsl-search-input" type="text" value="' . apply_filters( 'wpsl_search_input', '' ) . '" name="wpsl-search-input" placeholder="Search By City, State, or Zip" aria-required="true" />' . "\r\n";
$output .= "\t\t\t" . '</div>' . "\r\n";

if ( $wpsl_settings['radius_dropdown'] || $wpsl_settings['results_dropdown']  ) {
    $output .= "\t\t\t" . '<div class="wpsl-select-wrap">' . "\r\n";

    if ( $wpsl_settings['radius_dropdown'] ) {
        $output .= "\t\t\t\t" . '<div id="wpsl-radius">' . "\r\n";
        $output .= "\t\t\t\t\t" . '<label for="wpsl-radius-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'radius_label', __( 'Search radius', 'wpsl' ) ) ) . '</label>' . "\r\n";
        $output .= "\t\t\t\t\t" . '<select id="wpsl-radius-dropdown" class="wpsl-dropdown" name="wpsl-radius">' . "\r\n";
        $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'search_radius' ) . "\r\n";
        $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
        $output .= "\t\t\t\t" . '</div>' . "\r\n";
    }

    if ( $wpsl_settings['results_dropdown'] ) {
        $output .= "\t\t\t\t" . '<div id="wpsl-results">' . "\r\n";
        $output .= "\t\t\t\t\t" . '<label for="wpsl-results-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'results_label', __( 'Results', 'wpsl' ) ) ) . '</label>' . "\r\n";
        $output .= "\t\t\t\t\t" . '<select id="wpsl-results-dropdown" class="wpsl-dropdown" name="wpsl-results">' . "\r\n";
        $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'max_results' ) . "\r\n";
        $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
        $output .= "\t\t\t\t" . '</div>' . "\r\n";
    } 

    $output .= "\t\t\t" . '</div>' . "\r\n";
}

if ( $this->use_category_filter() ) {
    $output .= $this->create_category_filter();
}


$output .= "\t\t\t\t" . '<div class="wpsl-search-btn-wrap ml-3"><button id="wpsl-search-btn" class="btn btn-primary btn-secondary-hover" type="submit"><i class="fas fa-search mr-2"></i>Search</button></div>' . "\r\n";

$output .= "\t\t" . '</form></div></div>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t" . '</div>' . "\r\n";
    
$output .= "\t" . '<div id="wpsl-gmap" class="wpsl-gmap-canvas mb-5"></div>' . "\r\n";

$output .= "\t" . '<div id="wpsl-result-list">' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-stores" class="container'. $autoload_class .'">' . "\r\n";
$output .= "\t\t\t" . '<ul class="row"></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-direction-details">' . "\r\n";
$output .= "\t\t\t" . '<ul></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t" . '</div>' . "\r\n";

if ( $wpsl_settings['show_credits'] ) { 
    $output .= "\t" . '<div class="wpsl-provided-by">'. sprintf( __( "Search provided by %sWP Store Locator%s", "wpsl" ), "<a target='_blank' href='https://wpstorelocator.co'>", "</a>" ) .'</div>' . "\r\n";
}

$output .= '</div>' . "\r\n";

return $output;

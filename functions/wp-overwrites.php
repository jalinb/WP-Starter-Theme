<?php
/**
 * Functions for WordPress overwrites
 */

// Branded Admin Screen
function wpb_login_logo() {
    $large_logo = get_field('large_logo', 'option'); 
    $theme_primary_color = get_field('theme_primary_color', 'option');
    $theme_secondary_color = get_field('theme_secondary_color', 'option');
    ?>
    <style type="text/css">
        body.login {
            background: <?php echo $theme_primary_color; ?> !important;
            padding: 10% 20px;
            height: auto;
        }
        #login a {
            color: <?php echo $theme_primary_color; ?> !important;
            transition: all .33s ease-in-out;
        }
        #login a:hover {
            color: <?php echo $theme_secondary_color; ?> !important;
        }
        #login {
            max-width: 600px;
            text-align: center;
            padding: 80px !important;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            width: auto !important;
        }
        .login label, .login form .forgetmenot label {
            font-size: 16px;
        }
        form#loginform {
            background: transparent;
            box-shadow: none;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
        p.forgetmenot {
            width: 100%;
            margin: 20px 0 15px 0 !important;
        }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo $large_logo['url']; ?>);
            height: 100px;
            max-width: 300px;
            width: 100%;
            background-size: contain;
            background-repeat: no-repeat;
            margin-bottom: 10px;
        }
        .wp-core-ui .button-primary {
            background: <?php echo $theme_primary_color; ?> !important;
            border: 0 !important;
            border-radius: 0 !important;
            font-size: 16px !important;
            line-height: 0 !important;
            box-shadow: none !important;
            color: #fff !important;
            text-decoration: none !important;
            text-transform: uppercase !important;
            text-shadow: none !important;
            padding: 20px 40px !important;
            transition: all .33s ease-in-out;
            width: 100%;
        }
        .wp-core-ui .button-primary:hover {
            background: <?php echo $theme_secondary_color; ?> !important;
        }
        #login .privacy-policy-page-link {
            display: none;
        }
        #login .login-message {
            margin-bottom: 40px;
        }
        .login #login_error, .login .message, .login .success {
            border: none !important;
            box-shadow: none !important;
        }

        @media screen and (max-width: 639px) {
            #login {
                padding: 60px 30px !important;
            }
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );


function wpb_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );
 

function wpb_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );


function custom_login_message( $message ) {
    return '<p class="login-message">Grown by <a href="https://www.growmarkentum.com/" target="_blank">Markentum</a></p>';
}
add_filter( 'login_message', 'custom_login_message' );




// Remove WP Version Number
function remove_wp_version() {
    return '';
}
add_filter('the_generator', 'remove_wp_version');




// Remove read more from excerpt
function custom_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more', 11 );

// Exerpt Length
function wpdocs_custom_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );




// Remove the auto paragraphs IF NOT a post
function remove_p_on_pages() {
    if ( is_page() ) {
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_excerpt', 'wpautop' );
    }
}
add_action( 'wp_head', 'remove_p_on_pages' );




// Show Page/Post/Media IDs in WordPress Dashboard
function posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID');
    return $defaults;
}
add_filter('manage_posts_columns', 'posts_columns_id', 5);
add_filter('manage_pages_columns', 'posts_columns_id', 5);
add_filter( 'manage_media_columns', 'posts_columns_id', 5 );

function posts_custom_id_columns($column_name, $id){
    if($column_name === 'wps_post_id'){
            echo $id;
    }
}
add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
add_action('manage_media_custom_column', 'posts_custom_id_columns', 5, 2);

function column_order($columns) {
  $n_columns = array();
  $before = 'title'; // move before this
 
  foreach($columns as $key => $value) {
    if ($key==$before){
      $n_columns['wps_post_id'] = '';
    }
      $n_columns[$key] = $value;
  }
  return $n_columns;
}
add_filter('manage_posts_columns', 'column_order');
add_filter('manage_pages_columns', 'column_order');




// Show CPT Count On The Dashboard
function cpad_at_glance_content_table_end() {
    $args = array(
        'public' => true,
        '_builtin' => false
    );
    $output = 'object';
    $operator = 'and';

    $post_types = get_post_types( $args, $output, $operator );
    foreach ( $post_types as $post_type ) {
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );
        if ( current_user_can( 'edit_posts' ) ) {
            $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
            echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
        }
    }
}
add_action( 'dashboard_glance_items', 'cpad_at_glance_content_table_end' );




// Remove WPAUTOP from ACF TinyMCE Editor
function acf_wysiwyg_remove_wpautop() {
  remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');




// Allow SVGs Uploads
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');




// Get Top Level Parent Page ID
function get_top_parent_page_id() {
    global $post;
    $ancestors = $post->ancestors;

    // Check if page is a child page (any level)
    if ($ancestors) {
        //  Grab the ID of top-level page from the tree
        return end($ancestors);
    } else {
        // Page is the top level, so use  it's own id
        return $post->ID;
    }
}




// Convert Hex to RGBA
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}

// How To Use Hex to RGBA...
// $color = '#ffa226';
// $rgb = hex2rgba($color);
// $rgba = hex2rgba($color, 0.7);

?>
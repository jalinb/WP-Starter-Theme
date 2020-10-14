<?php
/**
 * Template part for displaying Google Maps
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

//Advanced Custom Fields 
$hide_block = get_sub_field('hide_block');
?>

<?php if( empty($hide_block) ) : ?>

	<!-- GOOGLE MAPS
	========================= -->
	<?php 
	// Get the the posts taxonomy
	$term_obj_list = get_the_terms( $post->ID, 'community' );
	$terms_string = wp_list_pluck($term_obj_list, 'term_id');

	// If a community page get Community Options if not get Theme Options
	if (is_singular('communities')):
		$brand_name = get_field('brand_name', 'community_' . $terms_string[0]);
		$theme_primary_color = get_field('theme_primary_color', 'option');
		$large_logo = get_field('large_logo', 'community_' . $terms_string[0]);
		$small_logo = get_field('small_logo', 'option');
		$phone_number = get_field('phone_number', 'community_' . $terms_string[0]);
		$email_address = get_field('email_address', 'community_' . $terms_string[0]);
		$address_line_1 = get_field('address_line_1', 'community_' . $terms_string[0]);
		$address_line_2 = get_field('address_line_2', 'community_' . $terms_string[0]);
		$city_state_zip = get_field('city_state_zip', 'community_' . $terms_string[0]);
		$google_maps_api_key = get_field('google_maps_api_key', 'option');
		$longitude = get_field('longitude', 'community_' . $terms_string[0]);
		$latitude = get_field('latitude', 'community_' . $terms_string[0]);
		$map_icon = get_field('map_icon', 'community_' . $terms_string[0]);
		$office_hours = get_field('office_hours', 'community_' . $terms_string[0]);
		$office_days = get_field('office_days', 'community_' . $terms_string[0]);
	else:
		$brand_name = get_field('brand_name', 'option');
		$theme_primary_color = get_field('theme_primary_color', 'option');
		$large_logo = get_field('large_logo', 'option');
		$small_logo = get_field('small_logo', 'option');
		$phone_number = get_field('phone_number', 'option');
		$email_address = get_field('email_address', 'option');
		$address_line_1 = get_field('address_line_1', 'option');
		$address_line_2 = get_field('address_line_2', 'option');
		$city_state_zip = get_field('city_state_zip', 'option');
		$google_maps_api_key = get_field('google_maps_api_key', 'option');
		$longitude = get_field('longitude', 'option');
		$latitude = get_field('latitude', 'option');
		$map_icon = get_field('map_icon', 'option');
		$office_hours = get_field('office_hours', 'option');
		$office_days = get_field('office_days', 'option');
	endif;
	?>

	<section id="map"></section>

	<!-- Google Maps API -->
	<script>
	  function initMap() {
	
	    var longitude = <?php echo $longitude; ?>;
	    var latitude = <?php echo $latitude; ?>;
	    var location = {lat: latitude, lng: longitude};
	    var map = new google.maps.Map(document.getElementById('map'), {
	      zoom: 13,
	      center: location,
	      zoomControl: true,
	      mapTypeControl: false,
	      streetViewControl: false,
	      scrollwheel: false,
	      styles: [{"featureType": "administrative", "elementType": "all", "stylers": [{"saturation": "-100"} ] }, {"featureType": "administrative.province", "elementType": "all", "stylers": [{"visibility": "off"} ] }, {"featureType": "landscape", "elementType": "all", "stylers": [{"saturation": -100 }, {"lightness": 65 }, {"visibility": "on"} ] }, {"featureType": "poi", "elementType": "all", "stylers": [{"saturation": -100 }, {"lightness": "50"}, {"visibility": "simplified"} ] }, {"featureType": "road", "elementType": "all", "stylers": [{"saturation": "-100"} ] }, {"featureType": "road.highway", "elementType": "all", "stylers": [{"visibility": "simplified"} ] }, {"featureType": "road.arterial", "elementType": "all", "stylers": [{"lightness": "30"} ] }, {"featureType": "road.local", "elementType": "all", "stylers": [{"lightness": "40"} ] }, {"featureType": "transit", "elementType": "all", "stylers": [{"saturation": -100 }, {"visibility": "simplified"} ] }, {"featureType": "water", "elementType": "geometry", "stylers": [{"lightness": -25 }, {"saturation": -97 }, {"color": "<?php echo $theme_primary_color; ?>"} ] }, {"featureType": "water", "elementType": "labels", "stylers": [{"lightness": -25 }, {"saturation": -100 } ] } ]
	    });
	
	    var contentString = '<div id="map-content">'+
			'<div id="siteNotice">'+
			'</div>'+
			'<span class="map-title color-primary d-block mb-2"><?php echo $brand_name; ?></span>'+
			'<div id="bodyContent">'+
			'<div class="row">'+
			'<div class="col-12">'+
			'<address class="font-weight-normal mb-1">'+
			'<i class="fas fa-map-marker-alt color-primary"></i>'+
			<?php if($address_line_1): ?>
				'&nbsp;&nbsp;&nbsp;<?php echo $address_line_1; ?><br />'+
			<?php endif; ?>
			<?php if($address_line_2): ?>
			'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $address_line_2; ?><br />'+
			<?php endif; ?>
			<?php if(!($address_line_1) && !($address_line_2)): ?>
			'&nbsp;&nbsp;&nbsp;<?php echo $city_state_zip; ?>'+
			<?php else: ?>
			'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $city_state_zip; ?>'+
			<?php endif; ?>
			'</address>'+
			'<p class="mb-0"><i class="fas fa-phone color-primary"></i>&nbsp;&nbsp;<a class="font-weight-normal anchor-primary-hover" href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a>'+
			'<?php if($email_address): ?><br /><i class="fas fa-at color-primary"></i>&nbsp;&nbsp;<a class="font-weight-normal anchor-primary-hover" href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a><?php endif; ?></p>'+
			'<div class="mt-2 pl-3">'+
			'<p class="font-weight-bold color-primary mb-0">Office Hours:</p>'+
			'<p class="mb-0"><?php echo $office_hours; ?></p>'+
			'<p class="mb-0"><?php echo $office_days; ?></p>'+
			'</div>'+
			'</div>'+
			'</div>'+
			'</div>'+
			'</div>';
	
	    var infowindow = new google.maps.InfoWindow({
	      content: contentString,
	      width: 400,
	      maxWidth: 1000
	    });
	
	    var marker = new google.maps.Marker({
	      position: location,
	      map: map,
		  title: '<?php echo $brand_name; ?>',
		  <?php if($map_icon): ?>
			  icon: {url: '<?php echo $map_icon['sizes']['map-icon']; ?>'},
		  <?php endif;?>
	    });
	
	    if ( window.innerWidth >= 767 ) {
	        google.maps.event.addListenerOnce(map, 'idle', function() {
	          infowindow.open(map, marker);
	        });
	    }
	    marker.addListener('click', function() {
	      infowindow.open(map, marker);
	    });
	
	    // Reposition the map 100px south
	    function moveMap() {
	      map.panBy(0, -100);
	    }
	    setTimeout(moveMap, 10);
	
	  }
	  
	</script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_maps_api_key; ?>&callback=initMap"></script>

<?php endif; ?>

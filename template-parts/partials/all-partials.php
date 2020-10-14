<?php
/**
 * Template part for pulling all partials
 */

?>

<?php // Flexible Content Blocks

// Home Page Hero
if( get_row_layout() == 'home_page_hero' ):
	get_template_part( 'template-parts/partials/content-blocks/home', 'hero' );

// Community Page Hero
elseif( get_row_layout() == 'community_page_hero' ):
	get_template_part( 'template-parts/partials/content-blocks/community', 'hero' );
	
// Interior Page Hero
elseif( get_row_layout() == 'interior_page_hero' ):
	get_template_part( 'template-parts/partials/content-blocks/interior', 'hero' );

// Custom Content: Container-Fluid
elseif( get_row_layout() == 'custom_content_full_width' ):
	get_template_part( 'template-parts/partials/content-blocks/custom-content-full', 'width' );

// Custom Content: Container
elseif( get_row_layout() == 'custom_content_max_width' ):
	get_template_part( 'template-parts/partials/content-blocks/custom-content-max', 'width' );

// Text Overlay
elseif( get_row_layout() == 'text_overlay' ):
	get_template_part( 'template-parts/partials/content-blocks/text', 'overlay' );

// Text Gallery Overlay
elseif( get_row_layout() == 'text_gallery_overlay' ):
	get_template_part( 'template-parts/partials/content-blocks/text-gallery', 'overlay' );
	
// Service Types
elseif( get_row_layout() == 'service_types' ):
	get_template_part( 'template-parts/partials/content-blocks/service', 'types' );

// Community Search
elseif( get_row_layout() == 'community_search' ):
	get_template_part( 'template-parts/partials/content-blocks/community', 'search' );
	
// Blue Bar
elseif( get_row_layout() == 'blue_bar' ):
	get_template_part( 'template-parts/partials/content-blocks/blue', 'bar' );

// List Child Pages
elseif( get_row_layout() == 'list_child_pages' ):
	get_template_part( 'template-parts/partials/content-blocks/list-child', 'pages' );

// BG Image Block
elseif( get_row_layout() == 'bg_image_block' ):
	get_template_part( 'template-parts/partials/content-blocks/bg-image', 'block' );

// Slider
elseif( get_row_layout() == 'slider' ):
	get_template_part( 'template-parts/partials/content-blocks/slider' );

// Testimonials Slider
elseif( get_row_layout() == 'testimonials_slider' ):
	get_template_part( 'template-parts/partials/content-blocks/testimonials', 'slider' );

// NRC Reviews
elseif( get_row_layout() == 'nrc_reviews' ):
	get_template_part( 'template-parts/partials/content-blocks/nrc', 'reviews' );
	
// Gallery
elseif( get_row_layout() == 'gallery' ):
	get_template_part( 'template-parts/partials/content-blocks/gallery' );

// Cards
elseif( get_row_layout() == 'cards' ):
	get_template_part( 'template-parts/partials/content-blocks/cards' );

// Horizontal Cards
elseif( get_row_layout() == 'horizontal_cards' ):
	get_template_part( 'template-parts/partials/content-blocks/horizontal', 'cards' );

// Partners
elseif( get_row_layout() == 'partners' ):
	get_template_part( 'template-parts/partials/content-blocks/partners' );

// Floor Plans
elseif( get_row_layout() == 'floor_plans' ):
	get_template_part( 'template-parts/partials/content-blocks/floor', 'plans' );

// Communities List
elseif( get_row_layout() == 'communities_list' ):
	get_template_part( 'template-parts/partials/content-blocks/communities', 'list' );

// Communities by Service
elseif( get_row_layout() == 'communities_service' ):
	get_template_part( 'template-parts/partials/content-blocks/communities-by', 'service' );

// Communities by State
elseif( get_row_layout() == 'communities_by_state' ):
	get_template_part( 'template-parts/partials/content-blocks/communities-by', 'state' );

// Communities Full List
elseif( get_row_layout() == 'communities_full_list' ):
	get_template_part( 'template-parts/partials/content-blocks/communities-full', 'list' );

// HubSpot Blog Roll
elseif( get_row_layout() == 'hubspot_blog_roll' ):
	get_template_part( 'template-parts/partials/content-blocks/hubspot', 'blog' );

// CTA
elseif( get_row_layout() == 'cta' ):
	get_template_part( 'template-parts/partials/content-blocks/cta' );

// Testimonials
elseif( get_row_layout() == 'testimonials' ):
	get_template_part( 'template-parts/partials/content-blocks/testimonials' );
	
// Staff
elseif( get_row_layout() == 'staff' ):
	get_template_part( 'template-parts/partials/content-blocks/staff' );

// FAQs
elseif( get_row_layout() == 'faqs' ):
	get_template_part( 'template-parts/partials/content-blocks/faqs' );
	
// Form
elseif( get_row_layout() == 'form' ):
	get_template_part( 'template-parts/partials/content-blocks/form' );

// Google Maps
elseif( get_row_layout() == 'google_maps' ):
	get_template_part( 'template-parts/partials/content-blocks/google', 'maps' );

// Spacer
elseif( get_row_layout() == 'spacer' ):
	get_template_part( 'template-parts/partials/content-blocks/spacer' );

// Horizontal Line
elseif( get_row_layout() == 'hr_line' ):
	get_template_part( 'template-parts/partials/content-blocks/hr', 'line' );

// Request Forms
elseif( get_row_layout() == 'request_forms' ):
	get_template_part( 'template-parts/partials/content-blocks/request', 'forms' );

endif; ?>

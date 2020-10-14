<?php
	
/**
 * Functions for Mailchimp snippets
 */




/**
 * This will add the "gw-form" attribute to the form wrapper element.
 *
 * @param array $classes
 * @param MC4WP_Form $form
 *
 * @return array
 */
function myprefix_add_css_class_to_form( $classes = array(), MC4WP_Form $form ) {
	$classes[] = 'gw-form';
	return $classes;
}
add_filter( 'mc4wp_form_css_classes', 'myprefix_add_css_class_to_form', 10, 2 );

?>
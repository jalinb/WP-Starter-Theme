<?php
/**
 * Functions for Gravity Forms
 */

// Dynamically populate ACF select list
function acf_load_gravityforms_field_choices( $field ) {
    
    // reset choices
    $field['choices'] = array();

    // Load all GravityForms forms
    $forms = GFAPI::get_forms();

    // loop through array and add to field 'choices'
    if( is_array($forms) ) {

        foreach( $forms as $form ) {

            $field['choices'][ $form['id'] ] = $form['title'];

        }
        
    }
    
    // return the field
    return $field;
}

add_filter('acf/load_field/name=gravityforms', 'acf_load_gravityforms_field_choices');




// Submit Button
// add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
// function form_submit_button( $button, $form ) {
//     if(is_page(941)): // If is the Free eBook page make the button say "Download"
//         return "<button class='btn' id='gform_submit_button_{$form['id']}'>Download</button>";
//     else:
//         return "<button class='btn' id='gform_submit_button_{$form['id']}'>Submit</button>";
//     endif;
// }
 
?>
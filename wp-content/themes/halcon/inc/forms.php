<?php
/**
* Forms
*/

add_action('wp_enqueue_scripts', 'move_gf_scripts');

function move_gf_scripts(){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
  if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
    // move the gf scripts and styles to the header
    gravity_form_enqueue_scripts('form_id', 'ajax');
    gravity_form_enqueue_scripts(4, true);
  }
}

// update next, previous, and submit buttons markup to use button instead of input 
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
      $new_button->setAttribute( $attribute->name, $attribute->value );
    }
    $input->parentNode->replaceChild( $new_button, $input );
    return $dom->saveHtml( $new_button );
}

// turn on ability to hide labels in gravity forms
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

// add is_submitting class to submit button on submit
add_filter( 'gform_submit_button', 'add_onclick', 10, 2 );
add_filter( 'gform_next_button', 'add_onclick', 10, 2 );
function add_onclick( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( $button );
    $input = $dom->getElementsByTagName( 'button' )->item(0);
    $onclick = $input->getAttribute( 'onclick' );
    $onclick .= ' this.className += " is_submitting";';
    $input->setAttribute( 'onclick', $onclick );
    return $dom->saveHtml( $input );
}
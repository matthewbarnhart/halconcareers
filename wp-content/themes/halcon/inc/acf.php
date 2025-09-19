<?php
/**
* Advanced Custom Fields
*/

add_filter( 'wp_kses_allowed_html', 'custom_wpkses_post_tags', 10, 2 );

// don't strip out iframes in wp_kses_post
function custom_wpkses_post_tags( $tags, $context ) {
	if ( 'post' === $context ) {
    $tags['iframe'] = array(
			'src'             => true,
      'style'           => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		);
	}
	return $tags;
}

// sanitize acf fields
add_filter( 'acf/update_value/type=text', 'wp_kses_post', 10, 1 );
add_filter( 'acf/update_value/type=textarea', 'wp_kses_post', 10, 1 );
add_filter( 'acf/update_value/type=wysiwyg', 'wp_kses_post', 10, 1 );
add_filter( 'acf/update_value/type=password', 'wp_kses_post', 10, 1 );
add_filter( 'acf/update_value/type=radio', 'wp_kses_post', 10, 1 );
add_filter( 'acf/update_value/type=oembed', 'wp_kses_post', 10, 1 );

// hide the acf menu
// add_action( 'admin_menu', 'remove_acf_menu', 100 );
//
// function remove_acf_menu(){
//   remove_menu_page( 'edit.php?post_type=acf-field-group' );
// }

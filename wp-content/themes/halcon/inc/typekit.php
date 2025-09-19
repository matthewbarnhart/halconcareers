<?php
/**
* Typekit
*/

// enqueue typekit
add_action( 'wp_enqueue_scripts', 'enqueue_typekit' );

function enqueue_typekit() {
  wp_enqueue_script( 'enqueue_typekit', '//use.typekit.net/lyd5ycn.js');
}

add_action( 'wp_head', 'load_typekit_inline' );

function load_typekit_inline() {
  if ( wp_script_is( 'enqueue_typekit', 'done' ) ) { 
    echo '<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
  }
}

// add typekit fonts to editor
add_filter( 'mce_external_plugins', 'mce_external_plugins' );

function mce_external_plugins( $plugin_array ) {
	$plugin_array['typekit'] = get_template_directory_uri() . '/assets/scripts/typekit.tinymce.js';
	return $plugin_array;
}
<?php
/**
* Colors 
*/

// specify colors of tinymce color picker
add_filter('tiny_mce_before_init', 'tiny_mce_options');

function tiny_mce_options($init) {
  $custom_colors =
  '"3D3D3C", "Dark Gray",
  "8C8C8C", "Med Gray",
  "F2F2F2", "Light Gray",
  "FF5919", "Orange",';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$custom_colors.']';

  // enable 6th row for custom colours in grid
  $init['textcolor_rows'] = 6;

  return $init;
}

// add colors to advanced custom fields color picker
add_action('acf/input/admin_enqueue_scripts', 'acf_colors');

function acf_colors() {
  wp_enqueue_script( 'acf-custom-colors', get_template_directory_uri() . '/assets/scripts/colors.js', 'acf-input', '1.0', true );
}
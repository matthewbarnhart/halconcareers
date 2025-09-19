<?php
/**
* Images
*/

// remove the default gallery styles
add_filter( 'use_default_gallery_style', '__return_false' );

add_theme_support( 'post-thumbnails' ); 

if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'careers', 500, 330, false ); 
  add_image_size( 'careers-2x', 1000, 660, false ); 
  add_image_size( 'carousel', 737, 818, true ); 
  add_image_size( 'carousel-2x', 1474, 1636, false ); 
  add_image_size( 'full-column', 1920, 9999, false ); 
  add_image_size( 'full-column-2x', 3840, 9999, false ); 
  add_image_size( 'full-screen', 4000, 9999, false ); 
  // full screen images on smaller screens 
  add_image_size( 'full-screen-mobile', 2000, 9999, false ); 
  add_image_size( 'location', 782, 414, true ); 
  add_image_size( 'location-2x', 1564, 828, false ); 
  add_image_size( 'mobile', 320, 280, false ); 
  add_image_size( 'slider', 990, 1056, true ); 
  add_image_size( 'slider-2x', 1980, 2112, false ); 
}

// allow svg uploads to media library
add_filter('upload_mimes', 'cc_mime_types');

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_action('admin_init', 'imagelink_setup', 10);

function imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}

// replace WordPress' <div>s with HTML5's <figure> and <figcaption>
add_filter( 'img_caption_shortcode', 'atg_figure_caption', 10, 3 );

if (!function_exists( 'atg_figure_caption' )) {
	function atg_figure_caption( $output, $attr, $content ) {
		if ( is_feed() ) { return $output; }
		$defaults = array(
			'id' => '',
			'align' => 'alignnone',
			'width' => '',
			'caption' => ''
		);
		$attr = shortcode_atts( $defaults, $attr );
		if ( 1 > $attr['width'] ) { return $content; }
		$attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
		$attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
		$output = '<figure' . $attributes .' style="max-width: '.$attr['width'].'px">';
		$output .= do_shortcode( $content );
		if ($attr['caption'] !== '') :
			$output .= '<figcaption class="wp-caption-text">' . $attr['caption'] . '</figcaption>';
		endif;
		$output .= '</figure>';
    $output = preg_replace('#^<\/p>|<p>$#', '', $output); 
		return $output;
	}
}

add_filter( 'image_downsize', 'wpse240579_fix_svg_size_attributes', 10, 2 ); 

/**
 * Removes the width and height attributes of <img> tags for SVG
 * 
 * Without this filter, the width and height are set to "1" since
 * WordPress core can't seem to figure out an SVG file's dimensions.
 * 
 * For SVG:s, returns an array with file url, width and height set 
 * to null, and false for 'is_intermediate'.
 * 
 * @wp-hook image_downsize
 * @param mixed $out Value to be filtered
 * @param int $id Attachment ID for image.
 * @return bool|array False if not in admin or not SVG. Array otherwise.
 */
function wpse240579_fix_svg_size_attributes( $out, $id ) {
  $image_url  = wp_get_attachment_url( $id );
  $file_ext   = pathinfo( $image_url, PATHINFO_EXTENSION );

  if ( is_admin() || 'svg' !== $file_ext ) {
    return false;
  }

  return array( $image_url, null, null, false );
}

add_filter( 'wp_get_attachment_image_src', 'fix_wp_get_attachment_image_svg', 10, 4 ); 

 function fix_wp_get_attachment_image_svg($image, $attachment_id, $size, $icon) {
  if (is_array($image) && preg_match('/\.svg$/i', $image[0]) && $image[1] <= 1) {
    if(is_array($size)) {
      $image[1] = $size[0];
      $image[2] = $size[1];
    } elseif(($xml = simplexml_load_file($image[0])) !== false) {
      $attr = $xml->attributes();
      $viewbox = explode(' ', $attr->viewBox);
      $image[1] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
      $image[2] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
    } else {
      $image[1] = $image[2] = null;
    }
  }
  return $image;
}
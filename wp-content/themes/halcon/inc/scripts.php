<?php
/**
* Scripts
*/

add_action('wp_footer', 'enqueue_scripts');

function enqueue_scripts() {
	global $wp_scripts;
	wp_enqueue_script('jquery');
	//wp_enqueue_script('jquery-ui-core', array( 'jquery')); // Enqueue jQuery UI Core
	//wp_enqueue_script('jquery-ui-tabs', array( 'jquery')); // Enqueue jQuery UI Tabs
  // use modernizr to detect object-fit
  wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri(). '/assets/scripts/modernizr-custom.js', '', '1.0.0');
  //wp_enqueue_script('double-tap', get_stylesheet_directory_uri(). '/assets/scripts/jquery.doubletaptogo.js');
  wp_enqueue_script('swiper', get_stylesheet_directory_uri(). '/assets/scripts/swiper.min.js');
  wp_enqueue_script( 'lightbox', get_stylesheet_directory_uri(). '/assets/scripts/jquery.magnific-popup.min.js', '', '1.0.0');
  wp_enqueue_script( 'isonscreen', get_stylesheet_directory_uri(). '/assets/scripts/jquery.isonscreen.min.js');
  wp_enqueue_script('scripts', get_stylesheet_directory_uri(). '/assets/scripts/scripts.min.js', array(), filemtime( get_theme_file_path('/assets/scripts/scripts.min.js') ), true );
  if (get_theme_mod('address')) {
    wp_localize_script('scripts', 'scripts_vars', array(
        'address' => strip_tags( nl2br( get_theme_mod( 'address' ) ) ),
        'siteTitle' => get_bloginfo( 'name' ),
        'themePath' => get_bloginfo( 'stylesheet_directory' )
      )
    );
  }
  if(get_theme_mod('gmap_api_key')){
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key='.esc_attr(get_theme_mod('gmap_api_key')).'&callback=initMap');
  }
}
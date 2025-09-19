<?php
/**
 * @package WordPress
 * @subpackage HALCON Microsite
 */

// remove assorted junk from the head
add_action('after_setup_theme', 'clean_up_head');

function clean_up_head () {
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'rsd_link'); 
  remove_action('wp_head', 'wp_shortlink_wp_head');
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
  add_filter('the_generator', '__return_false'); 
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );  
}

/**
* Advanced Custom Fields
*/
require get_template_directory() . '/inc/acf.php';

/**
* Admin Login Screen
*/
require get_template_directory() . '/inc/admin.php';

/**
* Colors 
*/
require get_template_directory() . '/inc/colors.php';

/**
* Customizer
*/
require get_template_directory() . '/inc/customizer.php';

/**
* Excerpts
*/
require get_template_directory() . '/inc/excerpts.php';

/** 
* Footer
*/
require get_template_directory() . '/inc/footer.php';

/**
* Forms
*/
require get_template_directory() . '/inc/forms.php';

/**
* Images
*/
require get_template_directory() . '/inc/images.php';

/**
* Menus / Nav Walkers
*/
require get_template_directory() . '/inc/menus.php';

/**
* Posts and Pages
*/
require get_template_directory() . '/inc/posts.php';

/**
* Post Types
*/
require get_template_directory() . '/inc/post_types.php';

/**
* RSS 
*/
//require get_template_directory() . '/inc/rss.php';

/**
* Shortcodes 
*/
require get_template_directory() . '/inc/shortcodes.php';

/**
* Scripts
*/
require get_template_directory() . '/inc/scripts.php';

/**
* Styles
*/
require get_template_directory() . '/inc/styles.php';

/**
* Typekit
*/
require get_template_directory() . '/inc/typekit.php';

/**
* Video 
*/
require get_template_directory() . '/inc/video.php';

/**
* Widgets
*/
require get_template_directory() . '/inc/widgets.php';
<?php
/**
* Styles
*/

add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_styles() {
  // wp_register_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:400,400i,700|Oswald');
  // wp_enqueue_style( 'google-fonts' );
  wp_register_style( 'swiper', get_stylesheet_directory_uri() . '/assets/styles/swiper.min.css', array(), '4.4.6', 'all' );
  wp_enqueue_style( 'swiper' );
  // wp_register_style( 'typography', 'https://cloud.typography.com/7574432/7272372/css/fonts.css', array(), '', 'all' );
  // wp_enqueue_style( 'typography' );
  // lightbox needs to come before the theme css
  wp_register_style( 'lightbox', get_stylesheet_directory_uri() . '/assets/styles/magnific-popup.css', array(), '1.0.0', 'all' );
  wp_enqueue_style( 'lightbox' );
  wp_register_style( 'halcon', get_stylesheet_uri(), array(), filemtime( get_theme_file_path('/style.css') ), 'all' );
  wp_enqueue_style( 'halcon' );
  wp_register_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all' );
  wp_enqueue_style( 'font-awesome' );
}

add_action( 'admin_init', 'add_editor_styles' );

function add_editor_styles() {
  add_editor_style( 'assets/styles/editor-style.css' );
}

//add new styles to the TinyMCE "formats" menu dropdown
add_filter( 'tiny_mce_before_init', 'theme_styles_dropdown' );

if ( ! function_exists( 'theme_styles_dropdown' ) ) {
  function theme_styles_dropdown( $settings ) {
    // Create array of new styles
    $new_styles = array(
      array(
        'title'  => __( 'Custom Styles', 'theme' ),
        'items'  => array(
          array(
            'title'    => __('button','theme'),
            'selector'  => 'a',
            'classes'  => 'button'
          ),
        ),
      ),
    );
    // Merge old & new styles
    $settings['style_formats_merge'] = true;
    // Add new styles
    $settings['style_formats'] = json_encode( $new_styles );
    // Return New Settings
    return $settings;
  }
}

// refresh editor stylesheets
add_filter( 'mce_css', 't5_fresh_editor_style' );

// adds a parameter of the last modified time to all editor stylesheets.
function t5_fresh_editor_style( $css ) {
  global $editor_styles;

  if ( empty ( $css ) or empty ( $editor_styles ) ) {
    return $css;
  }

  // Modified copy of _WP_Editors::editor_settings()
  $mce_css   = array();
  $style_uri = get_stylesheet_directory_uri();
  $style_dir = get_stylesheet_directory();

  if ( is_child_theme() ) {
    $template_uri = get_template_directory_uri();
    $template_dir = get_template_directory();

    foreach ( $editor_styles as $key => $file ) {
      if ( $file && file_exists( "$template_dir/$file" ) ) {
        $mce_css[] = add_query_arg(
          'version',
          filemtime( "$template_dir/$file" ),
          "$template_uri/$file"
        );
      }
    }
  }

  foreach ( $editor_styles as $file ) {
    if ( $file && file_exists( "$style_dir/$file" ) ) {
      $mce_css[] = add_query_arg(
        'version',
        filemtime( "$style_dir/$file" ),
        "$style_uri/$file"
      );
    }
  }

  return implode( ',', $mce_css );
}

add_filter( 'tiny_mce_before_init', 'wpse33318_tiny_mce_before_init' );
function wpse33318_tiny_mce_before_init( $mce_init ) {
  $mce_init['cache_suffix'] = 'v=123';
  return $mce_init;    
}
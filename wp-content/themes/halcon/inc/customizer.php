<?php
/**
* Customizer
*/

// checkbox sanitization function
function op_sanitize_checkbox( $input ){
  return ( 1 === absint( $input ) ) ? 1 : 0;
}

add_action( 'customize_register', 'add_theme_options', 16 );

function add_theme_options( $wp_customize ) {
  
  $wp_customize->remove_section( 'custom_css' );
	
	// remove the tribe events panel
	$wp_customize->remove_panel( 'tribe_customizer' );
    
  $wp_customize->add_setting('theme_logo', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options'
  ));

  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'theme_logo_control',
      array(
        'label'    => 'Logo',
        'section'  => 'title_tagline',
        'settings' => 'theme_logo'
      )
    )
  );
  
  $wp_customize->add_section('ribbon', array(
    'title' => 'Top Ribbon',
    'priority' => 190
  ));
  
  $wp_customize->add_setting( 'show_ribbon', array(
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'op_sanitize_checkbox',
  ) );

  $wp_customize->add_control( 'show_ribbon', array(
    'type' => 'checkbox',
    'section' => 'ribbon', 
    'label' => __( 'Show Ribbon' ),
  ) );
  
  $wp_customize->add_setting('ribbon_text', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'esc_html'
  ));
  
  $wp_customize->add_control('ribbon_text', array(
    'type' => 'text',
    'label' => 'Text',
    'section' => 'ribbon'
  ));
  
  $wp_customize->add_setting('ribbon_button_text', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'esc_html'
  ));
  
  $wp_customize->add_control('ribbon_button_text', array(
    'type' => 'text',
    'label' => 'Button Text',
    'section' => 'ribbon'
  ));
  
  $wp_customize->add_setting('ribbon_button_link', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'esc_html'
  ));
  
  $wp_customize->add_control('ribbon_button_link', array(
    'type' => 'text',
    'label' => 'Button Link',
    'section' => 'ribbon'
  ));
  
  $wp_customize->add_section('contact', array(
    'title' => 'Contact Information',
    'priority' => 190
  ));
  
  $wp_customize->add_setting('address', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wp_filter_nohtml_kses'
  ));

  $wp_customize->add_control('address', array(
    'type' => 'textarea',
    'label' => 'Address',
    'section' => 'contact'
  ));
  
  $wp_customize->add_setting('phone', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wp_filter_nohtml_kses'
  ));

  $wp_customize->add_control('phone', array(
    'type' => 'text',
    'label' => 'Phone Number',
    'section' => 'contact'
  ));
  
  $wp_customize->add_setting('hours', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'esc_html'
  ));

  $wp_customize->add_control('hours', array(
    'type' => 'text',
    'label' => 'Hours',
    'section' => 'contact'
  ));
  
  $wp_customize->add_setting('email', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'esc_html'
  ));

  $wp_customize->add_control('email', array(
    'type' => 'text',
    'label' => 'Email Address',
    'section' => 'contact'
  ));
  
  $wp_customize->add_section('footer', array(
    'title' => 'Footer',
    'priority' => 200
  ));
  
  $wp_customize->add_setting('copyright', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post'
  ));

  $wp_customize->add_control('copyright', array(
    'type' => 'text',
    'label' => 'Copyright',
    'section'  => 'footer',
  ));
	
  $wp_customize->add_setting('credit', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'wp_kses_post'
  ));

  $wp_customize->add_control('credit', array(
    'type' => 'text',
    'label' => 'Credit',
    'section'  => 'footer',
  ));
  
  $wp_customize->add_section('gmap', array(
    'title' => 'Google Maps API',
    'priority' => 190
  ));
  
  $wp_customize->add_setting('gmap_api_key', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'esc_attr'
  ));

  $wp_customize->add_control('gmap_api_key', array(
    'type' => 'text',
    'label' => 'Google Map API Key',
    'section' => 'gmap'
  ));
  
  $wp_customize->add_section('analytics', array(
    'title' => 'Google Analytics',
    'priority' => 190
  ));
  
  $wp_customize->add_setting('tracking_id', array(
    'type' => 'theme_mod',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'esc_js'
  ));

  $wp_customize->add_control('tracking_id', array(
    'type' => 'text',
    'label' => 'Tracking ID',
    'section' => 'analytics'
  ));
}
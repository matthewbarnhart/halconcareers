<?php

// hide theme editor
define( 'DISALLOW_FILE_EDIT', true );

/**
* Admin Login Screen
*/

add_action( 'login_enqueue_scripts', 'login_logo' );

function login_logo() { 
  if(get_theme_mod('theme_logo')){
    $theme_logo_height = 17;
    $theme_logo_width = 320;
    printf('<style type="text/css">
      #login h1 a, 
      .login h1 a {
        background-image: url(%1$s);
        height: %2$spx;
        width: %3$spx;
        background-size: %3$spx %2$spx;
        background-repeat: no-repeat;
      }
      </style>',
      esc_url( wp_get_attachment_url( get_theme_mod( 'theme_logo' ) ) ),
      esc_attr($theme_logo_height),
      esc_attr($theme_logo_width)
    );
  }
}

add_filter( 'login_headerurl', 'login_logo_url' );

function login_logo_url() {
  return home_url();
}

add_filter( 'login_headertext', 'login_logo_url_title' );

function login_logo_url_title() {
  return get_bloginfo( 'name' );
}
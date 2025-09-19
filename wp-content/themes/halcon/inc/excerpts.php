<?php
/**
* Excerpts
*/

function show_excerpt( $id, $limit = 55 ) {
  if( get_post_field( 'post_excerpt', $id ) ) {
    return strip_shortcodes( get_post_field( 'post_excerpt', $id ) );
  } else {
    $excerpt = strip_shortcodes( get_post_field( 'post_content', $id ) );
    return wp_trim_words( $excerpt, $limit );
  }
}

add_action( 'init', 'add_excerpts_to_pages' );

function add_excerpts_to_pages() {
  add_post_type_support( 'page', 'excerpt' );
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_length( $length ) {
  return 15;
}

add_filter('excerpt_more', 'custom_excerpt_more');

function custom_excerpt_more($more) {
   global $post;
   return '&hellip;';
}
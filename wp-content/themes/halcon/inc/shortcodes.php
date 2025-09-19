<?php
/**
* Shortcodes 
*/

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

// remove any tags from around shortcodes
function wpex_clean_shortcodes($content){   
$array = array (
    '<h1>[' => '[', 
    ']</h1>' => ']', 
    '<h2>[' => '[', 
    ']</h2>' => ']', 
    '<h3>[' => '[', 
    ']</h3>' => ']', 
    '<h4>[' => '[', 
    ']</h4>' => ']', 
    '<h5>[' => '[', 
    ']</h5>' => ']', 
    '<h6>[' => '[', 
    ']</h6>' => ']', 
    '<p>[' => '[', 
    ']</p>' => ']', 
    ']<br />' => ']'
);
$content = strtr($content, $array);
return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');

add_shortcode( 'social', 'show_social' );
function show_social($atts) {
  $a = shortcode_atts( array(
    'sites' => ''
  ), $atts );
  
  // use array_map to remove any whitespace after commas
  $sites = array_map('trim', explode(',', $a['sites']));
  
  $social_media = array(
    'facebook' => array('fa' => 'facebook', 'title' => 'Facebook'),
    'flickr' => array('fa' => 'flickr', 'title' => 'Flickr'),
    'instagram' => array('fa' => 'instagram', 'title' => 'Instagram'),
    'google-plus' => array('fa' => 'google-plus', 'title' => 'Google Plus'),
    'linkedin' => array('fa' => 'linkedin', 'title' => 'Linkedin'),
    'pinterest' => array('fa' => 'pinterest', 'title' => 'Pinterest'),
    'snapchat' => array('fa' => 'snapchat-ghost', 'title' => 'Snapchat'),
    'tumblr' => array('fa' => 'tumblr', 'title' => 'Tumblr'),
    'twitter' => array('fa' => 'twitter', 'title' => 'Twitter'),
    'vimeo' => array('fa' => 'vimeo', 'title' => 'Vimeo'),
    'yelp' => array('fa' => 'yelp', 'title' => 'Yelp'),
    'youtube' => array('fa' => 'youtube-play', 'title' => 'Youtube'),
  );
  
  $showSocial = '<ul class="social-media-list">';
  foreach ($sites as $site) {
    $showSocial .= '<li class="social-media-list__item"><a class="social-media-list__link" href="'.esc_url(get_theme_mod('social_media_'.$site)).'" title="'.$social_media[$site]['title'].'" target="_blank"><i class="fa fa-'.$social_media[$site]['fa'].'"></i></a></li>';
  }
  $showSocial .= '</ul>';
  
  return $showSocial;
}
<?php
/**
* Events
*/

function nwc_show_time($block){
  ob_start();
    if(tribe_get_start_time() && tribe_get_start_time() === tribe_get_end_time()) {
      // only has start time
	  	printf( __( '<span class="%1$s__sep">@</span><span class="%1$s__time">%2$s</span>'),
				esc_attr( $block ),
	  		esc_html( tribe_get_start_time(null, 'g:ia') )
	  	);
    } else if(tribe_get_start_time()) {
      // has start and end time (and is not all day event)
	  	printf( __( '<span class="%1$s__sep">@</span><span class="%1$s__time">%2$s &ndash; %3$s</span>'),
				esc_attr( $block ),
	  		esc_html( tribe_get_start_time(null, 'g:ia') ),
				esc_html( tribe_get_end_time(null, 'g:ia') )
	  	);
    }
  $out = ob_get_clean();
  return $out;
}

function tribe_custom_theme_text ( $translation, $text, $domain ) {
	
	$text_to_replace = 'No matching %1$s listed under %2$s. Please try viewing the full calendar for a complete list of %3$s';
	$new_text = 'No upcoming %1$s listed under %2$s.';
 
	$custom_text = array(
		$text_to_replace => $new_text,
	);
	
	// If this text domain starts with "tribe-", "the-events-", or "event-" and we have replacement text
   if( (strpos($domain, 'tribe-') === 0 || strpos($domain, 'the-events-') === 0 || strpos($domain, 'event-') === 0) && strpos($translation, $text_to_replace) === 0 ) {
		$translation = $new_text;
	}
	return $translation;
}
add_filter('gettext', 'tribe_custom_theme_text', 20, 3);
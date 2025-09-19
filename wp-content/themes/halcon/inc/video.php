<?php
/**
* Video 
*/

add_filter('embed_oembed_html', 'wrap_embedded_video', 9999, 4);

function wrap_embedded_video($html, $url, $attr, $post_id) {
    return '<div class="embedded-video">' . $html . '</div>';
}
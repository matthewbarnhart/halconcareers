<?php
/**
* RSS 
*/

add_action('init', 'customRSS');

function customRSS(){
  add_feed('podcast', function(){
    get_template_part('rss', 'podcast');
  });
}

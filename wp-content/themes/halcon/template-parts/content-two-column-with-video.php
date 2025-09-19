<?php
/**
* Flexible content section for two column with video
*
* @package WordPress
* @subpackage 
*/

if( get_sub_field( 'anchor' ) ) {
  printf('<a name="%1$s"></a>',
    esc_attr__( get_sub_field( 'anchor' ) )
  );
}
echo '<div class="two-column-with-video">';
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-12">';
      if( get_sub_field( 'headline' ) ){
        printf('<h1 class="two-column-with-video__headline faded-out-3">%1$s</h1>',
          esc_html__( get_sub_field( 'headline' ) )
        );
      }
    echo '</div>'; 
  echo '</div>'; 
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-12">';
        
      if (get_sub_field('content')) {
  			echo '<div class="two-column-with-video__content faded-out-3">';
          echo '<div class="two-column-with-video__article op-article">';
            the_sub_field( 'content' );
          echo '</div>';
  			echo '</div>';
      }

    	$items = get_sub_field('items');

    	if( $items ) {
    		echo '<div class="two-column-with-video__items faded-out-2">';
    			foreach ($items as $item ) {
            echo '<div class="two-column-with-video__item">';
              if($item['subheadline']){
                printf('<h3 class="two-column-with-video__subhead">%1$s</h3>', 
                  esc_html__( $item['subheadline'] )
                );
              }
              if($item['text']){
                printf('<p class="two-column-with-video__text">%1$s</p>', 
                  esc_html__( $item['text'] )
                );
              }
            echo '</div>';
    			}
    		echo '</div>';
    	}
    echo '</div>';  
  echo '</div>'; 
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-12">';
  	$video = get_sub_field('video');

  	if( $video ) {
  		echo '<div class="two-column-with-video__video op-videos-wrapper faded-out-1">';
        echo apply_filters('the_content', esc_url( $video ) );
  		echo '</div>';
  	}
    echo '</div>'; 
  echo '</div>'; 
echo '</div>'; 
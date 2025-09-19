<?php
/**
* Flexible content section for why work with us
*
* @package WordPress
* @subpackage 
*/

if( get_sub_field( 'anchor' ) ) {
  printf('<a name="%1$s"></a>',
    esc_attr__( get_sub_field( 'anchor' ) )
  );
}

echo '<div class="why-work">';
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-6">';
      if( get_sub_field( 'headline' ) ){
        printf('<h1 class="why-work__headline faded-out-3">%1$s</h1>',
          esc_html__( get_sub_field( 'headline' ) )
        );
      }
  
    	$items = get_sub_field('items');
	
    	if( $items ) {
    		echo '<div class="why-work__items faded-out-2">';
    			foreach ($items as $item ) {
            echo '<div class="why-work__item">';
              if($item['subheadline']){
                printf('<h3 class="why-work__subhead">%1$s</h3>', 
                  esc_html__( $item['subheadline'] )
                );
              }
              if($item['text']){
                printf('<p class="why-work__text">%1$s</p>', 
                  esc_html__( $item['text'] )
                );
              }
            echo '</div>';
    			}
    		echo '</div>';
    	}
  
      if( get_sub_field( 'button' ) ){
        $button = get_sub_field( 'button' );
        printf('<a class="why-work__button faded-out-2" href="%1$s">%2$s</a>',
          esc_url( $button['url'] ),
          esc_html__( $button['title'] )
        );
      }
    echo '</div>'; 
    echo '<div class="op-col-start-7 op-col-end-12">';
  	$images = get_sub_field('images');

  	if( $images ) {
  		echo '<div class="why-work__images op-images-wrapper faded-out-1">';
        echo '<div class="swiper-container">';
          echo '<div class="swiper-wrapper">';
            foreach ($images as $image ) {
              echo '<div class="swiper-slide">';
                $image_id = $image['image']['ID'];
                echo '<div class="why-work__obj-fit-image-wrapper op-obj-fit-image-wrapper image-sliding-animation image-sliding-animation--slow">';
                  echo wp_get_attachment_image($image_id, 'slider', '', array( "class" => "why-work__obj-fit-image op-obj-fit-image" ));
                echo '</div>';
              echo '</div>';
            }
          echo '</div>';
        echo '</div>';
  		echo '</div>';
  	}
    echo '</div>'; 
  echo '</div>'; 
echo '</div>'; 
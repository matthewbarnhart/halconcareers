<?php
/**
* Flexible content section for two column with image
*
* @package WordPress
* @subpackage 
*/

if( get_sub_field( 'anchor' ) ) {
  printf('<a name="%1$s"></a>',
    esc_attr__( get_sub_field( 'anchor' ) )
  );
}

$layout = get_sub_field( 'layout' );

$two_column_style = $layout === 'left' ? 'two-column-with-image two-column-with-image--left' : 'two-column-with-image two-column-with-image--right';

echo '<div class="'.esc_attr__($two_column_style).'">';
  echo '<div class="op-row">';
    echo $layout === 'left' ?  '<div class="op-col-start-7 op-col-end-12">' : '<div class="op-col-start-1 op-col-end-6">';
      if( get_sub_field( 'headline' ) ){
        printf('<h1 class="two-column-with-image__headline faded-out-3">%1$s</h1>',
          esc_html__( get_sub_field( 'headline' ) )
        );
      }
      
      if (get_sub_field('content')) {
  			echo '<div class="two-column-with-image__content faded-out-3">';
          echo '<div class="two-column-with-image__article op-article">';
            the_sub_field( 'content' );
          echo '</div>';
  			echo '</div>';
      }
  
    	$items = get_sub_field('items');
	
    	if( $items ) {
    		echo '<div class="two-column-with-image__items faded-out-2">';
    			foreach ($items as $item ) {
            echo '<div class="two-column-with-image__item">';
              if($item['subheadline']){
                printf('<h3 class="two-column-with-image__subhead">%1$s</h3>', 
                  esc_html__( $item['subheadline'] )
                );
              }
              if($item['text']){
                printf('<p class="two-column-with-image__text">%1$s</p>', 
                  esc_html__( $item['text'] )
                );
              }
            echo '</div>';
    			}
    		echo '</div>';
    	}
  
      if( get_sub_field( 'button' ) ){
        $button = get_sub_field( 'button' );
        printf('<a class="two-column-with-image__button faded-out-2" href="%1$s">%2$s</a>',
          esc_url( $button['url'] ),
          esc_html__( $button['title'] )
        );
      }
    echo '</div>'; 
    echo $layout === 'left' ? '<div class="op-col-start-1 op-col-end-6">' : '<div class="op-col-start-7 op-col-end-12">';
  	$images = get_sub_field('images');

  	if( $images ) {
  		echo '<div class="two-column-with-image__images op-images-wrapper faded-out-1">';
        echo '<div class="swiper-container">';
          echo '<div class="swiper-wrapper">';
            foreach ($images as $image ) {
              echo '<div class="swiper-slide">';
                $image_id = $image['image']['ID'];
                echo '<div class="two-column-with-image__obj-fit-image-wrapper op-obj-fit-image-wrapper image-sliding-animation image-sliding-animation--slow">';
                  echo wp_get_attachment_image($image_id, 'slider', '', array( "class" => "two-column-with-image__obj-fit-image op-obj-fit-image" ));
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
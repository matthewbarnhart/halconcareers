<?php
/**
* Flexible content section for a slideshow
*
* @package WordPress
* @subpackage 
*/

echo '<div class="slideshow faded-out-1">';
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-12">';
      if( get_sub_field( 'headline' ) ){
        printf('<h1 class="slideshow__headline faded-out-3">%1$s</h1>',
          esc_html__( get_sub_field( 'headline' ) )
        );
      }
    
  	$images = get_sub_field('images');

  	if( $images ) {
  		echo '<div class="slideshow__images faded-out-2">';
        echo '<div class="swiper-container">';
          echo '<div class="swiper-wrapper">';
            foreach ($images as $image ) {
              echo '<div class="swiper-slide">';
                $image_id = $image['image']['ID'];
                echo '<div class="slideshow__obj-fit-image-wrapper op-obj-fit-image-wrapper">';
                  echo wp_get_attachment_image($image_id, 'carousel', '', array( "class" => "slideshow__obj-fit-image op-obj-fit-image" ));
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
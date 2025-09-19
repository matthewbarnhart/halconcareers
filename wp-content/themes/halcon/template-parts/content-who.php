<?php
/**
* Flexible content section for who is halcon
*
* @package WordPress
* @subpackage 
*/

echo '<div class="who-is-halcon">';
  if( get_sub_field( 'anchor' ) ) {
    printf('<a name="%1$s" class="who-is-halcon__anchor"></a>',
      esc_attr__( get_sub_field( 'anchor' ) )
    );
  }
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-6">';
  	$images = get_sub_field('images');

  	if( $images ) {
  		echo '<div class="who-is-halcon__images op-images-wrapper faded-out-1">';
        echo '<div class="swiper-container">';
          echo '<div class="swiper-wrapper">';
            foreach ($images as $image ) {
              echo '<div class="swiper-slide">';
                $image_id = $image['image']['ID'];
                echo '<div class="who-is-halcon__obj-fit-image-wrapper op-obj-fit-image-wrapper image-sliding-animation image-sliding-animation--slow">';
                  echo wp_get_attachment_image($image_id, 'slider', '', array( "class" => "who-is-halcon__obj-fit-image op-obj-fit-image" ));
                echo '</div>';
              echo '</div>';
            }
          echo '</div>';
        echo '</div>';
  		echo '</div>';
  	}
    echo '</div>'; 
    
    echo '<div class="op-col-start-7 op-col-end-12">';
      if( get_sub_field( 'headline' ) ){
        printf('<h1 class="who-is-halcon__headline faded-out-3">%1$s</h1>',
          esc_html__( get_sub_field( 'headline' ) )
        );
      }
      if (get_sub_field('content')) {
  			echo '<div class="who-is-halcon__content faded-out-3">';
          echo '<div class="who-is-halcon__article op-article">';
            the_sub_field( 'content' );
          echo '</div>';
  			echo '</div>';
      }
  
    echo '</div>'; 
    
  echo '</div>'; 
echo '</div>'; 
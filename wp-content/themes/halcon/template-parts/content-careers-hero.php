<?php
/**
* Flexible content section for the careers hero
*
* @package WordPress
* @subpackage 
*/

echo '<div class="hero">';
	if( get_sub_field( 'images' ) ){
	  $images = get_sub_field( 'images' );
    $rand_image_key = array_rand($images);
    $image_id = $images[$rand_image_key]['image']['ID'];
    echo '<div class="hero__op-obj-fit-image-wrapper op-obj-fit-image-wrapper">';
      echo wp_get_attachment_image($image_id, 'full-screen-2x', '', array( "class" => "op-obj-fit-image hero__obj-fit-image" ));
    echo '</div>';
	}	
  if( get_sub_field( 'headline' ) ){
    echo '<div class="hero__headline-wrapper">';
      echo '<div class="op-row">';
        echo '<div class="op-col-start-1 op-col-end-12">';
          printf('<h1 class="hero__headline">%1$s</h1>',
            esc_html__( get_sub_field( 'headline' ) )
          );
        echo '</div>'; 
      echo '</div>'; 
    echo '</div>'; 
  }
  echo '<nav class="hero__nav hero__nav--careers">';
    echo '<div class="op-row">';
      echo '<div class="op-col-start-1 op-col-end-12">';
        bem_menu('careers', 'hero-menu'); 
      echo '</div>'; 
    echo '</div>'; 
  echo '</nav>';
echo '</div>'; 
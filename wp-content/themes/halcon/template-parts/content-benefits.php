<?php
/**
* Flexible content section for benefits
*
* @package WordPress
* @subpackage 
*/

echo '<div class="benefits">';
  if( get_sub_field( 'anchor' ) ) {
    printf('<a name="%1$s" class="benefits__anchor"></a>',
      esc_attr__( get_sub_field( 'anchor' ) )
    );
  }
  echo '<div class="benefits__headline-wrapper faded-out-3">';
    echo '<div class="op-row">';
      echo '<div class="op-col-start-1 op-col-end-12">';
        if( get_sub_field( 'headline' ) ){
          printf('<h1 class="benefits__headline">%1$s</h1>',
            esc_html__( get_sub_field( 'headline' ) )
          );
        }
      echo '</div>'; 
    echo '</div>'; 
  echo '</div>'; 
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-12">';
    
    	$benefits = get_sub_field('benefits');
	
    	if( $benefits ) {
    		echo '<div class="benefits__items">';
    			foreach ($benefits as $benefit ) {
            echo '<div class="benefits__item faded-out-2">';
              if($benefit['image']) {
                $image_id = $benefit['image']['ID'];
                echo wp_get_attachment_image($image_id, 'full-screen', '', array( "class" => "benefits__image" ));
              }
              if($benefit['title']) {
                printf('<h3 class="benefits__title">%1$s</h3>', 
                  esc_html__( $benefit['title'] )
                );
              }
              if($benefit['text']) {
                printf('<p class="benefits__text">%1$s</p>', 
                  esc_html__( $benefit['text'] )
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
      if( get_sub_field( 'button' ) ){
        $button = get_sub_field( 'button' );
        printf('<a class="benefits__button faded-out-3" href="%1$s">%2$s</a>',
          esc_url( $button['url'] ),
          esc_html__( $button['title'] )
        );
      }
    echo '</div>'; 
  echo '</div>'; 
echo '</div>'; 
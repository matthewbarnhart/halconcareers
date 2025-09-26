<?php
/**
* Flexible content section for a careers banner
*
* @package WordPress
* @subpackage 
*/


echo '<div class="careers-banner-wrapper">'; 
	if( get_sub_field( 'anchor' ) ) {
	  printf('<a name="%1$s" class="careers-banner__anchor"></a>',
	    esc_attr( get_sub_field( 'anchor' ) )
	  );
	}
  echo '<div class="op-row">';
    echo '<div class="op-col-start-2 op-col-end-11">';
      echo '<div class="careers-banner">'; 
        if( get_sub_field( 'text' ) ){
          printf('<p class="careers-banner__text">%1$s</p>',
            esc_html__( get_sub_field( 'text' ) )
          );
        }
        if( get_sub_field( 'button' ) ) {
          $button = get_sub_field( 'button' );
          printf('<a href="%1$s" class="careers-banner__button" target="%2$s">%3$s</a>',
            esc_url( $button['url'] ),
            esc_attr( $button['target'] ),
            esc_html( $button['title'] )
          );
        } 
      echo '</div>'; 
    echo '</div>'; 
  echo '</div>'; 
echo '</div>'; 


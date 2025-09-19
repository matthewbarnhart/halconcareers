<?php
/**
* Flexible content section for map and location
*
* @package WordPress
* @subpackage 
*/

echo '<div class="map-and-location faded-out-1">';
  if( get_sub_field( 'anchor' ) ) {
    printf('<a name="%1$s" class="map-and-location__anchor"></a>',
      esc_attr__( get_sub_field( 'anchor' ) )
    );
  }
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-6">';
      if( get_sub_field( 'headline' ) ){
        printf('<h1 class="map-and-location__headline">%1$s</h1>',
          esc_html__( get_sub_field( 'headline' ) )
        );
      }
    echo '</div>'; 
    
    echo '<div class="op-col-start-7 op-col-end-9">';
  	  if(get_theme_mod('address')) {
  			printf( '<p class="map-and-location__address map-and-location__text">%1$s</p>',
  	      nl2br( esc_html__( get_theme_mod( 'address' ) ) )
  	    );
  	  }
      
  	  if(get_theme_mod('address')) {
  			printf( '<p class="map-and-location__phone map-and-location__text">P: %1$s</p>',
  	      esc_html__( get_theme_mod( 'phone' ) )
  	    );
  	  }
      
  	  if(get_theme_mod('email')) {
  			printf( '<p class="map-and-location__email map-and-location__text">E: <a href="mailto:%1$s" class="map-and-location__link">%1$s</a></p>',
  	      esc_html__( antispambot( get_theme_mod( 'email' ) ) )
  	    );
  	  }

    echo '</div>'; 
    
    echo '<div class="op-col-start-10 op-col-end-12">';
      if( get_sub_field( 'text' ) ){
        printf('<p class="map-and-location__text map-and-location__info">%1$s</p>',
          nl2br( esc_html__( get_sub_field( 'text' ) ) )
        );
      }
    echo '</div>'; 
  echo '</div>'; 
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-6">';
      if( get_theme_mod('gmap_api_key')){
      	echo '<div id="halcon-map" class="map-and-location__map faded-out-2"></div>';
      }
    echo '</div>'; 
    echo '<div class="op-col-start-7 op-col-end-12">';
    	if( get_sub_field( 'image' ) ){
    	  $image = get_sub_field( 'image' );
        $image_id = $image['ID'];
        echo '<div class="map-and-location__image-wrapper op-images-wrapper faded-out-2">';
          echo '<div class="map-and-location__obj-fit-image-wrapper op-obj-fit-image-wrapper image-sliding-animation">';
            echo wp_get_attachment_image($image_id, 'location', '', array( "class" => "op-obj-fit-image map-and-location__obj-fit-image" ));
          echo '</div>';
        echo '</div>';
    	}	
    echo '</div>'; 
  echo '</div>'; 
echo '</div>'; 
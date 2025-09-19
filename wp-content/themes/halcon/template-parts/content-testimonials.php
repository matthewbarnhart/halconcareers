<?php
/**
* Flexible content section for testimonials
*
* @package WordPress
* @subpackage 
*/

echo '<div class="testimonials faded-out-1">';
  if( get_sub_field( 'anchor' ) ) {
    printf('<a name="%1$s" class="testimonials__anchor"></a>',
      esc_attr__( get_sub_field( 'anchor' ) )
    );
  }
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-12">';
      if( get_sub_field( 'headline' ) ){
        printf('<h1 class="testimonials__headline faded-out-3">%1$s</h1>',
          esc_html__( get_sub_field( 'headline' ) )
        );
      }
    echo '</div>'; 
  echo '</div>'; 

  echo '<div class="op-row">';
    echo '<div class="op-col-start-3 op-col-end-10">';
    
    	$testimonials = get_sub_field('testimonials');
	
    	if( $testimonials ) {
    		echo '<div class="testimonials__items faded-out-2">';
          echo '<div class="swiper-container">';
            echo '<div class="swiper-wrapper">';
        			foreach ($testimonials as $testimonial ) {
                echo '<div class="swiper-slide">';
                  echo '<blockquote class="testimonials__item">';
                    if($testimonial['testimonial']) {
                      printf('<p class="testimonials__quote">%1$s</p>', 
                        esc_html__( $testimonial['testimonial'] )
                      );
                    }
                    echo '<footer class="testimonials__cite">';
                      if($testimonial['team_member']) {
                        echo esc_html__( $testimonial['team_member'] );
                      }
                      if($testimonial['job_title']) {
                        printf('<cite class="testimonials__job-title">%1$s</cite>', 
                          esc_html__( $testimonial['job_title'] )
                        );
                      }
                    echo '</footer>';
                  echo '</blockquote>';
                echo '</div>';
        			}
            echo '</div>';
            echo '<div class="testimonials-pagination"></div>';
          echo '</div>';
    		echo '</div>';
    	}
    echo '</div>'; 
  echo '</div>'; 
  
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-12">';
    	if( $testimonials ) {
    		echo '<div class="testimonial__images">';
          echo '<div class="swiper-container">';
            echo '<div class="swiper-wrapper">';
              foreach ($testimonials as $testimonial ) {
                echo '<div class="swiper-slide">';
                  $image_id = $testimonial['image']['ID'];
                  echo '<div class="testimonial__obj-fit-image-wrapper op-obj-fit-image-wrapper">';
                    echo wp_get_attachment_image($image_id, 'carousel', '', array( "class" => "testimonial__obj-fit-image op-obj-fit-image" ));
                  echo '</div>';
                echo '</div>';            
              }
            echo '</div>';
          echo '</div>';
    		echo '</div>';
    	}
    echo '</div>'; 
  echo '</div>'; 
  
  // echo '<div class="op-row">';
  //   echo '<div class="op-col-start-1 op-col-end-12">';
  //     if( $testimonials ) {
  //       echo '<div class="testimonials__images">';
  //         foreach ($testimonials as $testimonial ) {
  //           echo '<div class="testimonials__image">';
  //             if($testimonial['image']) {
  //               $image_id = $testimonial['image']['ID'];
  //               echo wp_get_attachment_image($image_id, 'full-screen', '', array( "class" => "testimonials__image" ));
  //             }
  //           echo '</div>';
  //         }
  //       echo '</div>';
  //     }
  //   echo '</div>';
  // echo '</div>';
  
echo '</div>'; 
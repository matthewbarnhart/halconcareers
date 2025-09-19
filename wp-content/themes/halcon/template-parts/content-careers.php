<?php
/**
* Flexible content section for career opportunties
*
* @package WordPress
* @subpackage 
*/

echo '<div class="careers">';
  if( get_sub_field( 'anchor' ) ) {
    printf('<a name="%1$s" class="careers__anchor"></a>',
      esc_attr( get_sub_field( 'anchor' ) )
    );
  }
  echo '<div class="careers__headline-wrapper faded-out-3">';
    echo '<div class="op-row">';
      echo '<div class="op-col-start-1 op-col-end-12">';
        if( get_sub_field( 'headline' ) ){
          printf('<h1 class="careers__headline">%1$s</h1>',
            esc_html__( get_sub_field( 'headline' ) )
          );
        }
      echo '</div>'; 
    echo '</div>'; 
  echo '</div>'; 
  
  $args = array(
  	'order' => 'ASC',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'post_type' => 'job',
  );
  global $wp_query, $wp_the_query;
  $wp_query = new WP_Query( $args );
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-12">';
      echo '<div class="career-list">';
    		if ( have_posts() ) :
    		  while ( have_posts() ) : the_post();
            echo '<div class="career-list-career faded-out-2">';
              $cat_array = get_primary_category();
              $cat = $cat_array['title'];
              $cat_id = $cat_array['id'];
              $cat_image = get_field( 'image', 'job_category_'.$cat_id );
          		$cat_image_id = $cat_image['ID'];
              
              echo '<div class="career-list-career__content">';
                printf('<h3 class="career-list-career__category">%1$s</h3>',
                  esc_html__($cat)
                );
                printf('<h4 class="career-list-career__title">%1$s</h4>',
                  esc_html__( get_the_title() )
                );
                echo '<div class="career-list-career__text">';
                  printf('<p class="career-list-career__para">%1$s</p>',
                    esc_html__( get_the_content() )
                  );
                  echo '<p class="career-list-career__links">';
                    $apply_str = ICL_LANGUAGE_CODE == 'es' ? 'aplica ya': 'apply now';
                    //$apply_indeed_str = ICL_LANGUAGE_CODE == 'es' ? 'aplicar con indeed': 'apply with indeed';
                    
                    // printf('<a href="#careers-popup" data-title="%1$s" class="career-list-career__link career-list-career__apply">%2$s</a>',
                    //   esc_attr( get_the_title() ),
                    //   esc_html__($apply_str)
                    // );
                    if( get_field('indeed_link') ){
                      printf('<a href="%1$s" class="career-list-career__link" target="_blank" rel="noopener">%2$s</a>',
                        esc_url( get_field('indeed_link') ),
                        esc_html__($apply_str)
                      );
                    }
                  echo '</p>';
                echo '</div>';
              echo '</div>';
              
          		echo '<div class="career-list-career__obj-fit-image-wrapper op-obj-fit-image-wrapper">';
                echo wp_get_attachment_image($cat_image_id, 'careers', '', array( "class" => "op-obj-fit-image career-list-career__obj-fit-image" ));
          		echo '</div>';
              
            echo '</div>';
    		  endwhile;
    		endif;
      echo '</div>'; 
    echo '</div>'; 
  echo '</div>'; 
  $wp_query = $wp_the_query;
  wp_reset_postdata();
  echo '<div class="op-row">';
    echo '<div class="op-col-start-1 op-col-end-12">';
      echo '<div class="career-list__button">view more career opportunities</div>';
    echo '</div>'; 
  echo '</div>'; 
echo '</div>'; 

if( get_sub_field( 'form' ) ) {
  echo '<div id="careers-popup" class="careers-popup-form mfp-hide">';
    echo '<div class="op-row">';
      echo '<div class="op-col-start-2 op-col-end-11">';
        gravity_form( get_sub_field( 'form' )['id'], false, false, false, '', true );
      echo '</div>'; 
      echo '<div class="careers-popup-form__close"><div class="careers-popup-form__close-inner"></div></div>';
    echo '</div>'; 
  echo '</div>';
}


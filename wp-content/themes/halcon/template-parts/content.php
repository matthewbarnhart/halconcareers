<?php
/**
* @package WordPress
* @subpackage 
*/
?>
<?php
// keep track of the spacers so we can adjust the margins for each one individually
$spacer = 1;

if( function_exists('have_rows') && have_rows('flexible_content_1') ):

    while ( have_rows('flexible_content_1') ) : the_row();
    
      if( get_row_layout() == 'benefits' ):

        get_template_part( 'template-parts/content','benefits');

      endif;
    
      if( get_row_layout() == 'career_opportunities' ):

        get_template_part( 'template-parts/content','careers');

      endif;
      
      if( get_row_layout() == 'hero' ):

        get_template_part( 'template-parts/content','hero');

      endif;
      
      if( get_row_layout() == 'location' ):

        get_template_part( 'template-parts/content','location');

      endif;
      
      if( get_row_layout() == 'ribbon' ):

        get_template_part( 'template-parts/content','ribbon');

      endif;
      
      if( get_row_layout() == 'slideshow' ):

        get_template_part( 'template-parts/content','slideshow');

      endif;
      
      if( get_row_layout() == 'spacer' ):

        if(get_sub_field('spacer_height')):
          echo '<div class="spacer spacer'.$spacer.'" style="height:'.esc_attr(get_sub_field('spacer_height')).'px"></div>';
          echo '<style type="text/css" media="screen">@media only screen and (max-width: 767px) { .spacer'.$spacer++.' { height: '.esc_attr(get_sub_field('spacer_height_mobile')).'px !important; } }</style>';
        endif;

      endif;
      
      if( get_row_layout() == 'two_column_with_image' ):

        get_template_part( 'template-parts/content','two-column-with-image');

      endif;
      
      if( get_row_layout() == 'two_column_with_video' ):

        get_template_part( 'template-parts/content','two-column-with-video');

      endif;
      
      if( get_row_layout() == 'testimonials' ):

        get_template_part( 'template-parts/content','testimonials');

      endif;
      
      if( get_row_layout() == 'why_work_with_us' ):

        get_template_part( 'template-parts/content','why-work');

      endif;
      
      if( get_row_layout() == 'who_is_halcon' ):

        get_template_part( 'template-parts/content','who');

      endif;
      
  endwhile;

endif;
?>
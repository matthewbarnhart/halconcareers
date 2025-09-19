<?php
/**
* Flexible content section for the ribbon
*
* @package WordPress
* @subpackage 
*/

if( get_theme_mod('show_ribbon') ){
  echo '<div class="ribbon-wrapper">'; 
    echo '<div class="op-row">';
      echo '<div class="op-col-start-2 op-col-end-11">';
        echo '<div class="ribbon">'; 
          if( get_theme_mod('ribbon_text') ){
            printf('<p class="ribbon__text">%1$s</p>',
              esc_html__( get_theme_mod('ribbon_text') )
            );
          }
          if( get_theme_mod('ribbon_button_text') && get_theme_mod('ribbon_button_link') ){
            
            if( isset($_GET['lang']) ) {
              $lang = $_GET['lang'];
              $button_link = '?lang='.$lang.get_theme_mod('ribbon_button_link').'';
            } else {
              $button_link = get_theme_mod('ribbon_button_link');
            }
            
            printf('<a class="ribbon__button" href="%1$s">%2$s</a>',
              esc_url( $button_link ),
              esc_html__( get_theme_mod('ribbon_button_text') )
            );
          }
        echo '</div>'; 
      echo '</div>'; 
    echo '</div>'; 
  echo '</div>'; 
}

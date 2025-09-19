<?php
/**
 * Template Name: 404
 * @package WordPress
 */
get_header(); ?>
<main class="main main--page-not-found">
  <?php
    global $wp_query; 
    $wp_query = new WP_Query('pagename=page-not-found');
  	if ( $wp_query->have_posts() ) :
  	  while ( $wp_query->have_posts() ) : $wp_query->the_post();
        get_template_part('template-parts/content'); 
  	  endwhile;
  	endif;
  ?>
</main>
<?php get_footer(); ?>
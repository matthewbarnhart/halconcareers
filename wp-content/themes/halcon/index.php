<?php
/**
 * @package WordPress
 * @subpackage HALCON Microsite
 */
get_header(); ?>
<main class="main">
<?php 
	// check if content is password protected
	if ( !post_password_required() ) { 
		get_template_part('template-parts/content'); 
	} else {
		echo '<div class="op-row">';
			echo '<div class="op-col-start-1 op-col-end-12">';
				if ( have_posts() ) :
				  while ( have_posts() ) : the_post();
						the_content();
				  endwhile;
				endif;
			echo '</div>'; 
		echo '</div>'; 
	}
?>
</main>
<?php get_footer(); ?>
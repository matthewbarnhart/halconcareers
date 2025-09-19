<?php
/**
 * @package WordPress
 * @subpackage HALCON Microsite
 */
get_header(); ?>
<main class="main main--search">
  <div class="container12"><div class="column12">
  <h1 class="search__header">Search results for: <?php echo get_search_query(); ?></h1>
  <?php
  
  $args = array(
    'paged' => $paged,
    's' => $s, 
  );

  $the_query = new WP_Query( $args ); 
  
  global $wp_query, $wp_the_query;
  $wp_query = new WP_Query( $args );

  if ( have_posts() ) : while ( have_posts() ) : the_post();
    
    echo '<div class="search__result">';
  		echo '<h2 class="search__title"><a href="'.get_the_permalink().'">';
      the_title(); 
      echo '</a></h2>';
      posted_on();
      echo '<p class="search__excerpt">'.show_excerpt().'</p>';
      //posted_in();
    echo '</div>';
      
  endwhile;
    
  else: 
    
    // pull in the 'not found' text from a search page i.e "Sorry, but nothing matched your search criteria. Please try again with some different keywords."
    echo '<div class="search__result">'.apply_filters('the_content', wp_kses_post(get_post_field('post_content', get_page_by_path('search')->ID))).'</div>';
      
  endif;
  
  $wp_query = $wp_the_query;
  wp_reset_postdata();

	// the WP-PageNavi plugin
	if($wp_query->max_num_pages>1) {	
		if(function_exists('wp_pagenavi')) {
			wp_pagenavi();
		} 
	}
  
	?>
  </div></div>
</main>

<?php get_footer(); ?>
<?php
/**
* Posts and Pages
*/

function posted_on() {
	printf( __( '<p class="postmeta"><span class="sep">Posted on </span><time class="entry-date" datetime="%3$s" pubdate>%4$s</time> <span class="meta-sep">by</span> <a href="%5$s">%6$s</a></p>'),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author(),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
		get_the_author()
	);
}

function posted_in_tags() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	$posted_in = __( '<p class="postmeta">Posted in %1$s</p>');
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

function posted_in_categories($showtags = false) {
	$posted_in = __( '<p class="postmeta">Posted in %1$s</p>');
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

// Set number of posts on a template by template basis to avoid 404 in pagination 
add_action( 'init', 'modify_posts_per_page', 0);

function modify_posts_per_page() {
  add_filter( 'option_posts_per_page', 'option_posts_per_page' );
}

$option_posts_per_page = get_option( 'posts_per_page' );

function option_posts_per_page( $value ) {
  global $option_posts_per_page;
  if ( is_home() || is_category() || is_search()) {
    return 5;
  } else {
    return $option_posts_per_page;
  }
}

/**
 * Gets the primary category set by Yoast SEO.
 *
 * @return array The category name, slug, and URL.
 */
function get_primary_category( $post = 0 ) {
	if ( ! $post ) {
		$post = get_the_ID();
	}
	// Show Yoast primary category, or first category
  $category = get_the_terms( $post, 'job_category' );
	$primary_category = array();
	// If post has a category assigned.
	if ($category){
    $category_id = '';
		$category_display = '';
		$category_slug = '';
		$category_link = '';
		if ( class_exists('WPSEO_Primary_Term') )
		{
			// Show the post's 'Primary' category, if this Yoast feature is available, & one is set
			$wpseo_primary_term = new WPSEO_Primary_Term( 'job_category', $post );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			$term = get_term( $wpseo_primary_term );
			if (is_wp_error($term)) {
				// Default to first category (not Yoast) if an error is returned
        $category_id = $category[0]->term_id;
				$category_display = $category[0]->name;
				$category_slug = $category[0]->slug;
				$category_link = get_category_link( $category[0]->term_id );
			} else {
				// Yoast Primary category
        $category_id = $term->term_id;
				$category_display = $term->name;
				$category_slug = $term->slug;
				$category_link = get_category_link( $term->term_id );
			}
		}
		else {
			// Default, display the first category in WP's list of assigned categories
      $category_id = $category[0]->term_id;
			$category_display = $category[0]->name;
			$category_slug = $category[0]->slug;
			$category_link = get_category_link( $category[0]->term_id );
		}
    $primary_category['id'] = $category_id;
		$primary_category['url'] = $category_link;
		$primary_category['slug'] = $category_slug;
		$primary_category['title'] = $category_display;
	}
	return $primary_category;
}
<?php
/**
* Post Types
*/

add_action( 'init', 'create_post_type' );

function create_post_type() {
  register_post_type( 'job', 
  array(
    'labels' => array(
      'name' => __( 'Jobs' ),
      'singular_name' => __( 'Job' )
    ),
    'public' => false,
    'has_archive' => false,
    'show_ui' => true,
    'show_in_menu' => true,
    'supports' => array('title','editor','page-attributes','thumbnail'),
    'menu_icon' => 'dashicons-groups'
    )
  );
}

/**
* Post Type Taxonomies
*/

add_action( 'init', 'create_project_taxonomies', 0 );

function create_project_taxonomies(){
  $args = array(
    'hierarchical' => true,
    'label' => 'Category',
    'labels' => array(
      'name'              => _x( 'Categories', 'taxonomy general name' ),
      'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
      'edit_item'         => __( 'Edit Category' ),
      'update_item'       => __( 'Update Category' ),
      'add_new_item'      => __( 'Add New Category' ),
      'new_item_name'     => __( 'New Category' ),
      'menu_name'         => __( 'Categories' ),
    ),
    'public' => false,
    'publicly_queryable' => false,
    'query_var' => true,
    'rewrite' => array('slug'=>'Categories'),
    'show_admin_column' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'update_count_callback' => '_update_post_term_count',
  );

  register_taxonomy('job_category', 'job', $args);
}
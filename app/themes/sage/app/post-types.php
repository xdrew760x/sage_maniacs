<?php

namespace App;

/**
*  Create custom post type and taxonomies
*
* @link    https://codex.wordpress.org/Function_Reference/register_post_type
* @link    https://codex.wordpress.org/Function_Reference/register_taxonomy
* @since   1.0.0
*/
add_action('init', function() {
  add_rewrite_rule( '(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top' );

  // Testimonials
  register_post_type('testimonials', [
    'label'                 => 'Testimonials',
    'public'                => false,
    'publicly_queryable'    => false,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'query_var'             => true,
    'rewrite'               => ['slug' => 'testimonials', 'with_front' => false],
    'capability_type'       => 'post',
    'has_archive'           => false,
    'hierarchical'          => false,
    'menu_position'         => null,
    'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#a0a5aa" d="M544 184.88V32.01C544 23.26 537.02 0 512.01 0H512c-7.12 0-14.19 2.38-19.98 7.02l-85.03 68.03C364.28 109.19 310.66 128 256 128H64c-35.35 0-64 28.65-64 64v96c0 35.35 28.65 64 64 64l-.48 32c0 39.77 9.26 77.35 25.56 110.94 5.19 10.69 16.52 17.06 28.4 17.06h106.28c26.05 0 41.69-29.84 25.9-50.56-16.4-21.52-26.15-48.36-26.15-77.44 0-11.11 1.62-21.79 4.41-32H256c54.66 0 108.28 18.81 150.98 52.95l85.03 68.03a32.023 32.023 0 0019.98 7.02c24.92 0 32-22.78 32-32V295.13c19.05-11.09 32-31.49 32-55.12.01-23.64-12.94-44.04-31.99-55.13zM127.73 464c-10.76-25.45-16.21-52.31-16.21-80 0-14.22 1.72-25.34 2.6-32h64.91c-2.09 10.7-3.52 21.41-3.52 32 0 28.22 6.58 55.4 19.21 80h-66.99zM240 304H64c-8.82 0-16-7.18-16-16v-96c0-8.82 7.18-16 16-16h176v128zm256 110.7l-59.04-47.24c-42.8-34.22-94.79-55.37-148.96-61.45V173.99c54.17-6.08 106.16-27.23 148.97-61.46L496 65.3v349.4z"/></svg>'),
    'supports'              => ['editor', 'title']
  ]);

  // Homes for Sale
  if(get_field('show_homes_for_sale', 'options') !== 0) {
    register_post_type('homes-for-sale', [
      'label'                 => 'Homes',
      'taxonomies'          => array( 'genres' ),
      'hierarchical'        => false,
      'public'              => true,
      'has_archive'         => false,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_position'       => 15,
      'can_export'          => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'page',
      'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#a0a5aa" d="M544 184.88V32.01C544 23.26 537.02 0 512.01 0H512c-7.12 0-14.19 2.38-19.98 7.02l-85.03 68.03C364.28 109.19 310.66 128 256 128H64c-35.35 0-64 28.65-64 64v96c0 35.35 28.65 64 64 64l-.48 32c0 39.77 9.26 77.35 25.56 110.94 5.19 10.69 16.52 17.06 28.4 17.06h106.28c26.05 0 41.69-29.84 25.9-50.56-16.4-21.52-26.15-48.36-26.15-77.44 0-11.11 1.62-21.79 4.41-32H256c54.66 0 108.28 18.81 150.98 52.95l85.03 68.03a32.023 32.023 0 0019.98 7.02c24.92 0 32-22.78 32-32V295.13c19.05-11.09 32-31.49 32-55.12.01-23.64-12.94-44.04-31.99-55.13zM127.73 464c-10.76-25.45-16.21-52.31-16.21-80 0-14.22 1.72-25.34 2.6-32h64.91c-2.09 10.7-3.52 21.41-3.52 32 0 28.22 6.58 55.4 19.21 80h-66.99zM240 304H64c-8.82 0-16-7.18-16-16v-96c0-8.82 7.18-16 16-16h176v128zm256 110.7l-59.04-47.24c-42.8-34.22-94.79-55.37-148.96-61.45V173.99c54.17-6.08 106.16-27.23 148.97-61.46L496 65.3v349.4z"/></svg>'),
      'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
    ]);
  }
  // Status Taxonomy
  $status = array(
    'name' => _x( 'status', 'taxonomy general name' ),
    'singular_name' => _x( 'status', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search status' ),
    'all_items' => __( 'All status' ),
    'parent_item' => __( 'Parent status' ),
    'parent_item_colon' => __( 'Parent status:' ),
    'edit_item' => __( 'Edit status' ),
    'update_item' => __( 'Update status' ),
    'add_new_item' => __( 'Add New status' ),
    'new_item_name' => __( 'New status' ),
    'menu_name' => __( 'Status' ),
  );

  register_taxonomy('status',array('homes-for-sale'), array(
    'hierarchical' => true,
    'labels' => $status,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'show_in_rest' => true, // Needed for tax to appear in Gutenberg editor
    'rewrite' => array( 'slug' => 'status' ),
  ));

  // Condition Type
  $condition = array(
    'name' => _x( 'condition', 'taxonomy general name' ),
    'singular_name' => _x( 'condition', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search condition' ),
    'all_items' => __( 'All condition' ),
    'parent_item' => __( 'Parent condition' ),
    'parent_item_colon' => __( 'Parent condition:' ),
    'edit_item' => __( 'Edit condition' ),
    'update_item' => __( 'Update condition' ),
    'add_new_item' => __( 'Add New condition' ),
    'new_item_name' => __( 'New condition' ),
    'menu_name' => __( 'Condition' ),
  );

  register_taxonomy('condition',array('homes-for-sale'), array(
    'hierarchical' => true,
    'labels' => $condition,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'show_in_rest' => true, // Needed for tax to appear in Gutenberg editor
    'rewrite' => array( 'slug' => 'condition' ),
  ));



});

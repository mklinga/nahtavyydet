<?php

add_action( 'init', 'post_types_adding' );

function post_types_adding() {

  /**
   *  Attraction
   */

  $labels = array(
    'name' => __('Attractions'),
    'singular_name' => __('Attractions'),
    'add_new' => __('Add New'),
    'add_new_item' => __('Add New Attraction'),
    'edit_item' => __('Edit Attraction'),
    'new_item' => __('New Attraction'),
    'all_items' => __('All Attractions'),
    'view_item' => __('View this Attraction'),
    'search_items' => __('Search Attractions'),
    'not_found' =>  __('No Attractions'),
    'not_found_in_trash' => __('No Attractions in Trash'),
    'parent_item_colon' => '',
    'menu_name' => __('Attractions'),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'kohteet', 'with_front' => true),
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-post-format', 'comments' ),
    'taxonomies' => array('ct_attraction', 'ct_location'),
  );

  register_post_type('attraction',$args);

  flush_rewrite_rules();

}

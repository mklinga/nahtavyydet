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
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'kohteet', 'with_front' => true),
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'thumbnail', 'comments'),
    'taxonomies' => array('post_tag')
  );

  register_post_type('attraction',$args);
  flush_rewrite_rules();


  /**
   *  Travelblog
   */

  $labels = array(
    'name' => __('Matkamuistot'),
    'singular_name' => __('Matkamuistot'),
    'add_new' => __('Add New'),
    'add_new_item' => __('Add New Matkamuisto'),
    'edit_item' => __('Edit Matkamuisto'),
    'new_item' => __('New Matkamuisto'),
    'all_items' => __('All Matkamuistot'),
    'view_item' => __('View this Matkamuisto'),
    'search_items' => __('Search Matkamuistot'),
    'not_found' =>  __('No Matkamuistot'),
    'not_found_in_trash' => __('No Matkamuistot in Trash'),
    'parent_item_colon' => '',
    'menu_name' => __('Matkamuistot'),
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'exclude_from_search' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'rewrite' => array('slug' => 'matkamuistot', 'with_front' => true),
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array('title', 'editor', 'thumbnail', 'comments', 'page-attributes', 'excerpt'),
    'taxonomies' => array('post_tag'),
    'has_archive' => true
  );

  register_post_type('diary',$args);

  add_post_type_support('page', 'excerpt');
  flush_rewrite_rules();

}

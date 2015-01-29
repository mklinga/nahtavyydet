<?php

function add_custom_taxonomies() {

  /**
   *  Attraction
   */
    register_taxonomy('ct_attraction', 'pt_attraction', array(
        'hierarchical' => true,
        'labels' => array( 'name' => _x( 'Attraction Categories', 'taxonomy general name'),
        'singular_name' => _x( 'Attraction Categories', 'taxonomy singular name'),
        'search_items' => __( 'Search Attraction Categories'),
        'all_items' => __( 'All Attraction Categories'),
        'parent_item' => __( 'Parent Attraction Category'),
        'parent_item_colon' => __( 'Parent Attraction Category'),
        'edit_item' => __( 'Edit Attraction Category'),
        'update_item' => __( 'Update Attraction Category'),
        'add_new_item' => __( 'Add New Attraction Category'),
        'new_item_name' => __( 'New Attraction Category'),
        'menu_name' => __( 'Attraction Categories'), ),
        'rewrite' => array( 'slug' => 'attraction-category',
        'with_front' => false, 'hierarchical' => true ),
    ));    
    
    /**
     *  Location
     */
    register_taxonomy('ct_location', array('pt_location', 'post'), array(
        'hierarchical' => true,
        'labels' => array( 'name' => _x( 'Location Categories', 'taxonomy general name'),
        'singular_name' => _x( 'Location Categories', 'taxonomy singular name'),
        'search_items' => __( 'Search Location Categories'),
        'all_items' => __( 'All Location Categories'),
        'parent_item' => __( 'Parent Location Category'),
        'parent_item_colon' => __( 'Parent Location Category'),
        'edit_item' => __( 'Edit Location Category'),
        'update_item' => __( 'Update Location Category'),
        'add_new_item' => __( 'Add New Location Category'),
        'new_item_name' => __( 'New Location Category'),
        'menu_name' => __( 'Location Categories'), ),
        'rewrite' => array( 'slug' => 'location-category',
        'with_front' => false, 'hierarchical' => true ),
    ));    
}

add_action( 'init', 'add_custom_taxonomies', 0 );

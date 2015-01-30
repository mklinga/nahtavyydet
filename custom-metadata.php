<?php

/* Display the location meta box. */
function attraction_content( $object ) {

  wp_nonce_field( plugin_basename( __FILE__ ), 'attraction_content_nonce' );
  echo '<p><label for="attraction-location">Location</label><br>';
  echo '<input style="width:100%;" type="text" id="attraction-location" name="attraction-location" placeholder="enter a location" value="'. esc_attr( get_post_meta( $object->ID, 'attraction-location', true ) ).'"/></p>';
  echo '<p><label for="attraction-type">Type</label><br>';

  $type = esc_attr( get_post_meta( $object->ID, 'attraction-type', true ) );
  echo '<select style="width: 100%;" name="attraction-type" id="attraction-type">';
  echo '<option value="Klassikot" '.selected( $type, "Klassikot").'>Klassikot</option>';
  echo '<option value="Erikoisuudet" '.selected( $type, "Erikoisuudet").'>Erikoisuudet</option>';
  echo '<option value="Rentoutuminen" '.selected( $type, "Rentoutuminen").'>Rentoutuminen</option>';
  echo '</select>';

}

function attraction_meta_box() {

  /**
   *  Attraction
   */

  add_meta_box(
    'attraction-meta',
    'Attraction Details',
    'attraction_content',
    'post',
    'side',
    'high'
  );
  add_meta_box(
    'attraction-meta',
    'Attraction Details',
    'attraction_content',
    'pt_attraction',
    'side',
    'high'
  );

}

function attraction_meta_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
    return;

  if ( !isset($_POST['attraction_content_nonce']) || !wp_verify_nonce( $_POST['attraction_content_nonce'], plugin_basename( __FILE__ ) ) )
    return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return;
  }

  $location = $_POST['attraction-location'];
  update_post_meta( $post_id, 'attraction-location', $location );

  $type = $_POST['attraction-type'];
  if ($type == "") $type ="Klassikot";

  update_post_meta( $post_id, 'attraction-type', $type );
}

add_action('add_meta_boxes', 'attraction_meta_box');
add_action( 'save_post', 'attraction_meta_save' );

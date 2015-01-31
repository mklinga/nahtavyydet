<?php

/* Display the meta box. */
function attraction_content( $object ) {

  wp_nonce_field( plugin_basename( __FILE__ ), 'attraction_content_nonce' );
  echo '<p><label for="attraction-country">Maa</label><br>';
  echo '<input style="width:100%;" type="text" id="attraction-country" name="attraction-country" placeholder="enter a country" value="'. esc_attr( get_post_meta( $object->ID, 'attraction-country', true ) ).'"/></p>';

  echo '<p><label for="attraction-city">Kaupunki</label><br>';
  echo '<input style="width:100%;" type="text" id="attraction-city" name="attraction-city" placeholder="enter a city" value="'. esc_attr( get_post_meta( $object->ID, 'attraction-city', true ) ).'"/></p>';

  echo '<p><label for="attraction-homepage">Kotisivu</label><br>';
  echo '<input style="width:100%;" type="text" id="attraction-homepage" name="attraction-homepage" placeholder="enter a homepage" value="'. esc_attr( get_post_meta( $object->ID, 'attraction-homepage', true ) ).'"/></p>';

  echo '<p><label for="attraction-map-location">Karttasijainti</label><br>';
  echo '<input style="width:100%;" type="text" id="attraction-map-location" name="attraction-map-location" placeholder="enter a url for map location" value="'. esc_attr( get_post_meta( $object->ID, 'attraction-map-location', true ) ).'"/></p>';

  echo '<p><label for="attraction-address">Osoite</label><br>';
  echo '<input style="width:100%;" type="text" id="attraction-address" name="attraction-address" placeholder="Nähtävyyden katuosoite" value="'. esc_attr( get_post_meta( $object->ID, 'attraction-address', true ) ).'"/></p>';

  $type = esc_attr( get_post_meta( $object->ID, 'attraction-type', true ) );
  echo '<p><label for="attraction-type">Kategoria</label><br>';
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

  add_meta_box( 'attraction-meta', 'Attraction Details', 'attraction_content', 'post', 'side', 'high');
  add_meta_box( 'attraction-meta', 'Attraction Details', 'attraction_content', 'pt_attraction', 'side', 'high');
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

  $country = $_POST['attraction-country'];
  update_post_meta( $post_id, 'attraction-country', $country );

  $city = $_POST['attraction-city'];
  update_post_meta( $post_id, 'attraction-city', $city );

  $homepage = $_POST['attraction-homepage'];
  update_post_meta( $post_id, 'attraction-homepage', $homepage );

  $map_location = $_POST['attraction-map-location'];
  update_post_meta( $post_id, 'attraction-map-location', $map_location );

  $address = $_POST['attraction-address'];
  update_post_meta( $post_id, 'attraction-address', $address );

  $type = $_POST['attraction-type'];
  if ($type == "") $type ="Klassikot";

  update_post_meta( $post_id, 'attraction-type', $type );
}

add_action('add_meta_boxes', 'attraction_meta_box');
add_action( 'save_post', 'attraction_meta_save' );

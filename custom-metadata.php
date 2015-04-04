<?php

/*
 *
 * Attraction
 *
 */


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
  add_meta_box( 'attraction-meta', 'Attraction Details', 'attraction_content', 'attraction', 'side', 'high');
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

/*
 *
 * Location
 *
 */


/* Display the meta box. */
function location_content( $object ) {

  wp_nonce_field( plugin_basename( __FILE__ ), 'location_content_nonce' );
  echo '<p><label for="location-country">Maa</label><br>';
  echo '<input style="width:100%;" type="text" id="location-country" name="location-country" placeholder="Syötä maa" value="'. esc_attr( get_post_meta( $object->ID, 'location-country', true ) ).'"/></p>';

  echo '<p><label for="location-city">Kaupunki</label><br>';
  echo '<input style="width:100%;" type="text" id="location-city" name="location-city" placeholder="Syötä kaupunki" value="'. esc_attr( get_post_meta( $object->ID, 'location-city', true ) ).'"/></p>';

  echo '<p><label for="location-homepage">Kotisivu</label><br>';
  echo '<input style="width:100%;" type="text" id="location-homepage" name="location-homepage" placeholder="Syötä kotisivu" value="'. esc_attr( get_post_meta( $object->ID, 'location-homepage', true ) ).'"/></p>';

  echo '<p><label for="location-wikipedia">Wikipedia</label><br>';
  echo '<input style="width:100%;" type="text" id="location-wikipedia" name="location-wikipedia" placeholder="Wikipedia-osoite" value="'. esc_attr( get_post_meta( $object->ID, 'location-wikipedia', true ) ).'"/></p>';

  echo '<p><label for="location-picture-credit">Kuvan ottaja</label><br>';
  echo '<input style="width:100%;" type="text" id="location-picture-credit" name="location-picture-credit" placeholder="Syötä kuvan ottaja" value="'. esc_attr( get_post_meta( $object->ID, 'location-picture-credit', true ) ).'"/></p>';

  echo '<p><label for="location-map-location">Karttasijainti</label><br>';
  echo '<input style="width:100%;" type="text" id="location-map-location" name="location-map-location" placeholder="Syötä karttasijainti" value="'. esc_attr( get_post_meta( $object->ID, 'location-map-location', true ) ).'"/></p>';

}

function location_meta_box() {
  add_meta_box( 'location-meta', 'Location Details', 'location_content', 'page', 'side', 'high');
}

function location_meta_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
    return;

  if ( !isset($_POST['location_content_nonce']) || !wp_verify_nonce( $_POST['location_content_nonce'], plugin_basename( __FILE__ ) ) )
    return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
      return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
      return;
  }

  $country = $_POST['location-country'];
  update_post_meta( $post_id, 'location-country', $country );

  $city = $_POST['location-city'];
  update_post_meta( $post_id, 'location-city', $city );

  $homepage = $_POST['location-homepage'];
  update_post_meta( $post_id, 'location-homepage', $homepage );

  $wikipedia = $_POST['location-wikipedia'];
  update_post_meta( $post_id, 'location-wikipedia', $homepage );

  $picture_credit = $_POST['location-picture-credit'];
  update_post_meta( $post_id, 'location-picture-credit', $picture_credit );

  $map_location = $_POST['location-map-location'];
  update_post_meta( $post_id, 'location-map-location', $map_location );

  update_post_meta( $post_id, 'location-type', $type );
}

add_action('add_meta_boxes', 'location_meta_box');
add_action( 'save_post', 'location_meta_save' );

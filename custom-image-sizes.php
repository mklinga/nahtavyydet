<?php

if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'extra-large', 1200, 1200, false );
  add_image_size( 'low-thumbnail', 400, 267, true );
}

add_filter('image_size_names_choose', 'my_image_sizes');

function my_image_sizes($sizes) {
  $addsizes = array(
    "extra-large" => __( "Erittäin suuri")
  );

  $newsizes = array_merge($sizes, $addsizes);

  return $newsizes;
}


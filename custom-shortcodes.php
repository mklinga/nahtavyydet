<?php

/*
 * Helper functions
 */

function make_embedded_result($query, $content, $name, $image, $text) {
  $result = '<div class="embedded-attraction">';

  if ($query->have_posts()) {
    while ($query->have_posts()) 
    {
      $query->the_post();
      $attraction_id = get_the_ID();

      /* Title */

      $result .= '<a href="' . get_permalink($attraction_id) .'">';
      $result .= '<h2>' . get_the_title($attraction_id) . '</h2>';
      $result .= '</a>';

      /* Attraction image and caption */
      if ( ( $image == "yes" ) && ( has_post_thumbnail() ) ) {
        $result .= '<section class="attraction-image">';
        $result .= get_the_post_thumbnail($attraction_id, 'large');
        $caption = get_post(get_post_thumbnail_id())->post_excerpt;
        if ($caption != '')
          $result .= '<span class="post-caption">' . $caption . '</span>';
        $result .= '<div class="clear"></div>';
        $result .= '</section>';
      }
    }

  }
  else {
      $result .= '<h2>' . $name . '</h2>';
  }

  if ($content != null) {
    $result .= do_shortcode($content);

    // TODO: lue lisää - linkki tähän perään
    // $result .= '<span class="read-more">Lue lisää...</span>';
  }

  $result .= '</div>';

  return $result;
}

/*
 * Location
 */

function show_location($attributes, $content = null) {

  extract(shortcode_atts(array(
    "name" => '',
    "image" => 'yes',
    "text" => ''
  ), $attributes));

  if ($name === '') return '';
  if ($text === '') $text = $name;

  $new_location = new WP_Query( array(
    'post_type' => 'page',
    'name' => sanitize_title($name),
    'posts_per_page' => 1
  ));

  $result = make_embedded_result($new_location, $content, $name, $image, $text);

  wp_reset_postdata();

  return $result;
}

add_shortcode('location', 'show_location');

/*
 * Location mention
 */

function show_location_link($attributes) {

  extract(shortcode_atts(array(
    "name" => '',
    "text" => ''
  ), $attributes));

  if ($name === '') return '';
  if ($text === '') $text = $name;

  // If there's no location, just return the name
  if (!get_page_by_title($name, OBJECT, 'page'))
    return '<span class="location-mention">' . $text . '</span>';
  else
    return '<a href="' . esc_url( get_permalink( get_page_by_path( sanitize_title($name), OBJECT, 'page' ) ) ) .'">' . $text .'</a>';
}

add_shortcode('location-mention', 'show_location_link');

/*
 * Attraction
 */

function show_attraction($attributes, $content = null) {

  extract(shortcode_atts(array(
    "name" => '',
    "image" => 'yes',
    "text" => ''
  ), $attributes));

  if ($name === '') return '';
  if ($text === '') $text = $name;

  $new_attraction = new WP_Query( array(
    'post_type' => 'attraction',
    'name' => sanitize_title($name),
    'posts_per_page' => 1
  ));

  $result = make_embedded_result($new_attraction, $content, $name, $image, $text);

  wp_reset_postdata();

  return $result;
}

add_shortcode('attraction', 'show_attraction');

/*
 * Attraction mention
 */

function show_attraction_link($attributes) {

  extract(shortcode_atts(array(
    "name" => '',
    "text" => ''
  ), $attributes));

  if ($name === '')
    return '';

  if ($text === '')
    $text = $name;

  // If there's no attraction, just return the name
  if (!get_page_by_title($name, OBJECT, 'attraction'))
    return '<span class="attraction-mention">' . $text . '</span>';
  else
    return '<a href="' . esc_url( get_permalink( get_page_by_path( sanitize_title($name), OBJECT, 'attraction' ) ) ) .'">' . $text .'</a>';
}

add_shortcode('attraction-mention', 'show_attraction_link');

/*
 * Adsense
 */

function showads() {

  return '<div id="adsense"><script type="text/javascript"><!--
    google_ad_client = "pub-XXXXXXXXXXXXXX";
  google_ad_slot = "4668915978";
  google_ad_width = 468;
  google_ad_height = 60;
  //-->
</script>

<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>';
}

//add_shortcode('adsense', 'showads');

<?php

function show_attraction($attributes) {

  extract(shortcode_atts(array(
    "name" => '',
    "image" => 'after-title' // TODO: support more positions
  ), $attributes));

  if ($name === '')
    return '';

  $new_attraction = new WP_Query( array(
    'post_type' => 'attraction',
    'name' => $name,
    'posts_per_page' => 1
  ));

  $result = '<div class="embedded-attraction">';

  if ($new_attraction->have_posts()) {
    while ($new_attraction->have_posts()) 
    {
      $new_attraction->the_post();
      $attraction_id = get_the_ID();

      /* Title */
      $result .= '<h2>' . get_the_title($attraction_id) . '</h2>';

      /* Attraction image and caption */
      if ( has_post_thumbnail() ) {
        $result .= '<section class="attraction-image">';
        $result .= get_the_post_thumbnail($attraction_id, 'large');
        $caption = get_post(get_post_thumbnail_id())->post_excerpt;
        if ($caption != '')
          $result .= '<span class="post-caption">' . $caption . '</span>';
        $result .= '<div class="clear"></div>';
        $result .= '</section>';
      }

      /* Content */
      $content = apply_filters( 'the_content', get_the_content($attraction_id) );
      $content = str_replace( ']]>', ']]&gt;', $content );
      $result .= '<div class="embedded-attraction-content">' . $content . '</div>';

      $result .= '</div>';
    }

  }
  wp_reset_postdata();

  return $result;
}

add_shortcode('attraction', 'show_attraction');

/*
 * Attraction header / image
 */

function show_attraction_header($attributes) {
  extract(shortcode_atts(array(
    "name" => '',
    "image" => 'yes',
    "text" => ''
  ), $attributes));

  if ($name === '')
    return '';

  $new_attraction = new WP_Query( array(
    'post_type' => 'attraction',
    'name' => $name,
    'posts_per_page' => 1
  ));

  $result = '<div class="embedded-attraction-header">';

  if ($new_attraction->have_posts()) {
    while ($new_attraction->have_posts()) 
    {
      $new_attraction->the_post();
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
    // No attraction found (yet)
    if ($text != '')
      $result .= '<h2>' . $text . '</h2>';
    else
      $result .= '<h2>' . $name . '</h2>'; // last resort, could be "unslugged attempt instead"?
  }

  $result .= '</div>';

  wp_reset_postdata();

  return $result;
}

add_shortcode('attraction-header', 'show_attraction_header');

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

<?php

function show_attraction($attributes) {

  extract(shortcode_atts(array(
    "name" => '',
    "image" => 'before-title' // TODO: support more positions
  ), $attributes));

  $new_attraction = new WP_Query( array(
    'post_type' => 'pt_attraction',
    'name' => $slug,
    'posts_per_page' => 1
  ));

  $result = '<div class="embedded-attraction">';

  if ($new_attraction->have_posts()) {
    while ($new_attraction->have_posts()) 
    {
      $new_attraction->the_post();
      $attraction_id = get_the_ID();

      if ( has_post_thumbnail() ) {
        $result .= get_the_post_thumbnail($attraction_id, 'large');
      }
      $result .= '<h2>' . get_the_title($attraction_id) . '</h2>';
      $result .=  get_the_content($attraction_id);
      $result .= '</div>';
    }

  }
  wp_reset_postdata();

  return $result;
}

add_shortcode('attraction', 'show_attraction');

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

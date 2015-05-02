<?php
  function make_link_or_span($name) {
    if (!get_page_by_title($name, OBJECT, 'page'))
      return "<span class='name-link'>".$name."</span>";
    else
      return "<a href='" . esc_url( get_permalink( get_page_by_path( sanitize_title($name), OBJECT, 'page'))) . "'>" . $name . "</a>";
  }
?>

  <section class="breadcrumbs">
<?php

  $country = get_post_meta(get_the_ID(), 'attraction-country', true);
  $city = get_post_meta(get_the_ID(), 'attraction-city', true);

  if (($country != "") && ($city != ""))
    echo (make_link_or_span($country) . ' -> ' . make_link_or_span($city));
?>
  </section>

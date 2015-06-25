<?php
$country = get_post_meta(get_the_ID(), 'location-country', true);
$city = get_post_meta(get_the_ID(), 'location-city', true);

if (($country != "") || ($city != "")) {

  $lists = array(
    array('type' => 'post', 'header' => 'Lue myös:', 'tags' => ($country . "," . $city)),
    array('type' => 'attraction', 'header' => 'Nähtävyydet:', 'tags' => $city)
  );

  foreach ($lists as $type) {
    $args = array(
      'post_type' =>$type['type'],
      'tag' => $type['tags']
    );

    $related = new WP_Query( $args );
    if ($related->have_posts()) {
?>
  <h2 class="related-articles-header"><?php echo $type['header']; ?></h2>
  <ul class="related-links">
<?php
      while ($related->have_posts()) {
        $related->the_post();

?>
    <li class="related-link"><a href="<?php the_permalink(); ?>">
<?php
        the_post_thumbnail('low-thumbnail');
        the_title();
?>
      </a></li>
<?php
      }
?>
    </ul>
<?php
    }


  }

}
?>

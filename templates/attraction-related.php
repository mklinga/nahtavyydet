<?php
$tag = get_post_meta(get_the_ID(), 'attraction-tag', true);
$city = get_post_meta(get_the_ID(), 'attraction-city', true);

if (($tag != "") || ($city != "")) {

  $args = array(
    'post_type' => 'post',
    'tag' => $tag . "," . $city
  );

  $related = new WP_Query( $args );
  if ($related->have_posts()) {
?>
  <h2 id="related-articles-header">Lue myös:</h2>
  <ul class="related-links">
<?php
    while ($related->have_posts()) {
      $related->the_post();

?>
    <li class="related-link"><a href="<?php the_permalink(); ?>">
<?php
      the_post_thumbnail('thumbnail');
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
?>

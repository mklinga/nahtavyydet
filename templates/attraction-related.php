<?php
$tag = get_post_meta(get_the_ID(), 'attraction-tag', true);

if ($tag != "") {

  $args = array(
    'post_type' => 'post',
    'tag' => $tag
  );

  $related = new WP_Query( $args );
  if ($related->have_posts()) {
?>
  <h2>Lisää kiinnostavia artikkeleita</h2>
  <ul class="related-links">
<?php
    while ($related->have_posts()) {
      $related->the_post();

?>
    <li class="related-link"><a href="<?php get_permalink(); ?>">
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

<?php

$query = new WP_Query(
  array(
    'post_type' => 'page',
    'posts_per_page' => 1,
    'order_by' => 'date',
    'meta_key' => 'location-type',
    'meta_value' => 'Kaupunki'
  )
);

if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();
?>
  <a href="<?php the_permalink(); ?>">
    <h2>Esittelyssä <?php the_title(); ?>!</h2>
  </a>
  <section class="home-featured-city">
  <a href="<?php the_permalink(); ?>">
    <?php echo the_post_thumbnail('large'); ?>
   </a>
    <div class="featured-city-excerpt"><?php the_excerpt(); ?></div>
  </section>
<?php
  }
}

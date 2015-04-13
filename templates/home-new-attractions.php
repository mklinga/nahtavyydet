<h2>Uusimmat nähtävyydet sivulla:</h2>
<?php

$query = new WP_Query(
  array(
    'post_type' => 'attraction',
    'posts_per_page' => 6,
    'order_by' => 'date',
    'order' => 'DESC'
  )
);

if ($query->have_posts() ) {
  while ($query->have_posts() ) {
    $query->the_post();
?>
  <div class="four columns latest-attraction">
  <a href="<?php echo the_permalink(); ?>">

<?php echo the_post_thumbnail('medium'); ?>

    <section class="featured-header">
      <h2><?php the_title(); ?></h2>
      <span class="post-date"><?php echo get_the_date(); ?></span>
    </section>

</a>
</div>
<?php
  }
}


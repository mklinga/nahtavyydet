<?php
$query = new WP_Query(
  array(
    'category_name' => 'featured',
    'posts_per_page' => 5,
    'order_by' => 'date'
  )
);

if ($query->have_posts() ) {
  $num = 0;
  while ($query->have_posts() ) {
    $query->the_post();
    $num++;
?>
  <div class="featured-item-<?php echo $num ?>">
  <a href="<?php echo the_permalink(); ?>">
<?php
    if ($num == 1)
      echo the_post_thumbnail(); // Show larger picture on the first one
    else
      echo the_post_thumbnail('medium');
?>
    <section class="featured-header">
      <h2><?php the_title(); ?></h2>
      <span class="post-date"><?php echo get_the_date(); ?></span>
    </section>
</a>
</div>
<?php
  }
}
wp_reset_postdata();
?>

<?php
$query = new WP_Query(
  array(
    'category_name' => 'featured',
    'posts_per_page' => 3,
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
      echo the_post_thumbnail();
    else
      echo the_post_thumbnail('medium');
?>
    <h2 class="featured-header"><?php the_title(); ?></h2>
</a>
</div>
<?php
  }
}
wp_reset_postdata();
?>

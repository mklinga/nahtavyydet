<?php

/*
 *    Latest posts
 */

$query = new WP_Query(
  array(
    'posts_per_page' => 5,
    'order_by' => 'date'
  )
);

if ($query->have_posts() ) {
  $is_left = false;
  $amount = 0;
  while ($query->have_posts() ) {
    ++$amount;
    if ($amount == 5) break;

    $query->the_post();

    if (get_the_ID() === $featured_id)
      continue;

    $is_left = !$is_left;
    $class_suffix = ($is_left)? "left" : "right";
?>
  <div class="latest-article-<?php echo $class_suffix; ?>">
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

wp_reset_postdata();

?>

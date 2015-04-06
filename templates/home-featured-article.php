<div class="row">
  <section class="eight columns featured-post">
<?php

/*
 *    Featured Post
 */

$query = new WP_Query(
  array(
    'category_name' => 'featured',
    'posts_per_page' => 1,
    'order_by' => 'date'
  )
);

if ($query->have_posts() ) {
  while ($query->have_posts() ) {
    $query->the_post();
    $featured_id = get_the_ID();
?>
  <div class="featured-item">
  <a href="<?php echo the_permalink(); ?>">
<?php echo the_post_thumbnail('large'); ?>
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
  $amount = 0;
  while ($query->have_posts() ) {
    ++$amount;
    if ($amount == 5) break;

    $query->the_post();

    if (get_the_ID() === $featured_id)
      continue;
?>
  <div class="six columns latest-article">
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
</section>
  <aside class="four columns home-aside-right">
    <?php get_template_part('templates/home', 'aside-right'); ?>
  </aside>
</div>

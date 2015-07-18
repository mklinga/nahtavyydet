<?php

/*
 *    Featured Post
 */

$query = new WP_Query(
  array(
    'post_type' => 'attraction',
    'posts_per_page' => 5,
    'order_by' => 'date',
    'order' => 'DESC'
  )
);

if ($query->have_posts() ) {

  $first = true;
  while ($query->have_posts() ) {
    $query->the_post();
    $featured_id = get_the_ID();

	if ($first) {
		$first = false;
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
	else { // not first, show smaller thumbs
?>
  <div class="six columns latest-article">
  <a href="<?php echo the_permalink(); ?>">
<?php echo the_post_thumbnail('low-thumbnail'); ?>

    <section class="featured-header">
      <h2><?php the_title(); ?></h2>
      <span class="post-date"><?php echo get_the_date(); ?></span>
    </section>

</a>
</div>
<?php
	}
  }
}

wp_reset_postdata();

?>

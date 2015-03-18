<?php
$query = new WP_Query('category_name=featured&posts_per_page=1');

if ($query->have_posts() ) {
  while ($query->have_posts() ) {
    $query->the_post();
?>
    <div class="featured-post">
<?php
    echo the_post_thumbnail('medium');
?>
    <h2 class="featured-header"><?php the_title(); ?></h2>
    </div>
<?php
  }
}

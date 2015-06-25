<?php

$args = array(
  'post_type' => 'diary',
  'posts_per_page' => 5,
  'orderby' => 'date',
  'order' => 'DESC'
);

$diaries = new WP_Query( $args );
if ($diaries->have_posts()) {

?>

<div>
  <h2 class="sidebar-header">Matkamuistoja</h2>
</div>

<ul class="diary-list">

<?php 
  while ($diaries->have_posts()) {
    $diaries->the_post();
?>
  <li>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <span class="diary-date"><?php the_modified_date('j.n.Y'); ?></span>
  </li>
<?php
  }
?>

</ul>

<?php

  wp_reset_postdata();
} // if have_posts

?>

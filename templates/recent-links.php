<?php

/* Artikkelit */

$args = array(
  'post_type' => 'post',
  'posts_per_page' => 5,
  'orderby' => 'date',
  'order' => 'DESC'
);

$links = new WP_Query( $args );
if ($links->have_posts()) {

?>

<div>
  <h2 class="sidebar-header">Artikkeleita</h2>
</div>

<ul class="sidebar-list">

<?php 
  while ($links->have_posts()) {
    $links->the_post();
?>
  <li>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <span class="sidebar-link-date"><?php the_modified_date('j.n.Y'); ?></span>
  </li>
<?php
  }
?>

</ul>

<?php
} // if have_posts
$args = array(
  'post_type' => 'attraction',
  'posts_per_page' => 5,
  'orderby' => 'date',
  'order' => 'DESC'
);

$links = new WP_Query( $args );
if ($links->have_posts()) {

?>

<div>
  <h2 class="sidebar-header">Uusia nähtävyyksiä</h2>
</div>

<ul class="sidebar-list">

<?php 
  while ($links->have_posts()) {
    $links->the_post();
?>
  <li>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <span class="sidebar-link-date"><?php the_modified_date('j.n.Y'); ?></span>
  </li>
<?php
  }
?>

</ul>

<?php
} // if have_posts

?>

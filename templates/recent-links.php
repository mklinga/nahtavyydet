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
  <h1 class="sidebar-header">Artikkeleita</h1>
</div>

<ul class="sidebar-list">

<?php 
  while ($links->have_posts()) {
    $links->the_post();
?>
  <li>
    <?php the_post_thumbnail('low-thumbnail'); ?>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
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
  <h1 class="sidebar-header">Uusia nähtävyyksiä</h1>
</div>

<ul class="sidebar-list">

<?php 
  while ($links->have_posts()) {
    $links->the_post();
?>
  <li>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
    <span class="sidebar-link-date"><?php the_modified_date(); ?></span>
  </li>
<?php
  }
?>

</ul>

<?php
} // if have_posts

?>

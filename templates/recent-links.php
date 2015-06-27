<?php

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
  <h2 class="sidebar-header">Nähtävyyksiä</h2>
</div>

<ul class="sidebar-list">

<?php 
  while ($links->have_posts()) {
    $links->the_post();
?>
  <li>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php

  $country = get_post_meta(get_the_ID(), 'attraction-country', true);
  $city = get_post_meta(get_the_ID(), 'attraction-city', true);

?>
    <span class="sidebar-subtext sidebar-link-location"><?php echo $city . ", " . $country ?></span>
  </li>
<?php
  }
?>

</ul>

<?php
} // if have_posts

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
  <h2 class="sidebar-header">Luettavaa</h2>
</div>

<ul class="sidebar-list">

<?php 
  while ($links->have_posts()) {
    $links->the_post();
?>
  <li>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <span class="sidebar-subtext sidebar-link-date"><?php echo get_the_date('j.n.Y'); ?></span>
  </li>
<?php
  }
?>

</ul>

<?php
} // if have_posts
?>

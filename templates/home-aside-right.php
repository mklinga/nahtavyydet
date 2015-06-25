<?php
// if ( function_exists('dynamic_sidebar')) {
//   dynamic_sidebar('frontpage-right');
// }
?>

<?php

$args = array(
  'post_type' => 'diary',
  'posts_per_page' => 5
);

$diaries = new WP_Query( $args );
if ($diaries->have_posts()) {

?>

<div>
  <h1 class="sidebar-header">Matkamuistoja</h1>
</div>

<ul class="diary-list">

<?php 
  while ($diaries->have_posts()) {
    $diaries->the_post();
?>
  <li>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
    <span class="diary-date"><?php the_modified_date(); ?></span>
  </li>
<?php
  }
?>

</ul>

<?php
} // if have_posts
?>

<?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    the_post_thumbnail('extra-large');
  }
?>

<?php
  $caption = get_post(get_post_thumbnail_id())->post_excerpt;
  if ($caption != '')
    echo '<span class="post-caption">' . $caption . '</span>';
?>
  <div class="image-title-box">
    <h1><?php the_title(); ?></h1>
    <h2><?php echo get_the_date(); ?></h2>
  </div>

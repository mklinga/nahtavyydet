  <div class="image-title-box">
    <section class="article-title">
      <h1><?php the_title(); ?></h1>
      <h2> <?php echo get_the_date('F Y'); ?> </h2>
    </section>
<?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    the_post_thumbnail('extra-large');
  }

  $caption = get_post(get_post_thumbnail_id())->post_excerpt;
  if ($caption != '')
    echo '<span class="post-caption">' . $caption . '</span>';
?>
  </div>

<section id="single-post-featured-image">
<?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    the_post_thumbnail('extra-large');
  }
?>

  <div class="image-title-box">
    <h1><?php the_title(); ?></h1>
    <h2><?php echo get_the_date(); ?></h2>
  </div>
<?php
  $caption = get_post(get_post_thumbnail_id())->post_excerpt;
  if ($caption != '')
    echo '<span class="post-caption">' . $caption . '</span>';
?>
</section>
<div id="single-post-content" class="container">
  <main class="content row main" role="main">

    <aside class="sidebar" role="complementary">
      &nbsp;
    </aside><!-- /.sidebar -->

    <article <?php post_class(); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>

  </main>
</div>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

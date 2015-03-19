<section id="single-post-featured-image">
<?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    the_post_thumbnail();
  }
?>
</section>

<div class="container">
  <main class="content row main" role="main">

    <aside class="sidebar" role="complementary">
      &nbsp;
    </aside><!-- /.sidebar -->

    <article <?php post_class(); ?>>
      <h1><?php the_title(); ?></h1>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>

  </main>
</div>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

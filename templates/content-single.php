<?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    the_post_thumbnail('medium');
  }
?>
<div class="container">
  <main class="content row main" role="main">

    <aside class="sidebar" role="complementary">
      Sidebar
    </aside><!-- /.sidebar -->

    <article <?php post_class(); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>

  </main>
</div>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

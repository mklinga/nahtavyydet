<?php while (have_posts()) : the_post(); ?>
    <header id="single-post-header">
<?php
    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
      the_post_thumbnail();
}
?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <?php if (roots_display_sidebar()) : ?>
      <aside class="sidebar" role="complementary">
        <?php include roots_sidebar_path(); ?>
      </aside><!-- /.sidebar -->
    <?php endif; ?>

    <article <?php post_class(); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <div class="attraction-list">
        <?php get_template_part('templates/content', 'attraction'); ?>
      </div>

      <footer>
        <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      </footer>
    </article>
<?php endwhile; ?>

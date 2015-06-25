<?php while (have_posts()) : the_post(); ?>

<div class="article-content container">
  <main class="content row main" role="main">

    <article <?php post_class('eight columns'); ?>>

      <section class="article-featured-image" id="single-post-featured-image">
        <?php get_template_part('templates/article', 'header'); ?>
      </section>

      <section class="entry-content">
        <?php the_content(); ?>
      </section>

      <section class="related-posts">
        <?php get_template_part('templates/attraction', 'related'); ?>
      </section>

    </article>

    <aside class="four columns sidebar" role="complementary">
      <?php get_template_part('templates/diary', 'links'); ?>
    </aside><!-- /.sidebar -->

  </main>
</div>
<?php endwhile; ?>

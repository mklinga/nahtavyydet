<?php while (have_posts()) : the_post(); ?>
<div class="article-content container">

  <div class="row">
      <section class="article-featured-image" id="single-attraction-featured-image">
        <?php get_template_part('templates/article', 'header'); ?>
      </section>
  </div>

  <main class="content row main" role="main">
    <aside class="four columns sidebar" role="complementary">
      &nbsp;
    </aside><!-- /.sidebar -->

    <article <?php post_class('eight columns'); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>

      <section class="related-articles">
        <?php get_template_part('templates/attraction', 'related'); ?>
      </section>
    </article>

  </main>
</div>
<?php endwhile; ?>

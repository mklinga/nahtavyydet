<?php while (have_posts()) : the_post(); ?>

<div class="article-content container">
  <main class="content row main" role="main">

    <article <?php post_class('eight columns'); ?>>

      <section class="article-featured-image" id="single-post-featured-image">
        <?php get_template_part('templates/article', 'header'); ?>
      </section>

<?php if (is_singular('attraction')) { ?>
      <section class="breadcrumbs">
        <?php get_template_part('templates/attraction', 'breadcrumbs'); ?>
      </section>
<?php } ?>

      <section class="entry-content">
        <?php
        if (is_singular('diary')) {
          get_template_part('templates/diary', 'content');
        }
        else {
          the_content();
        }
        ?>
      </section>

      <section class="related-articles">
        <?php get_template_part('templates/attraction', 'related'); ?>
      </section>

    </article>

    <aside class="four columns sidebar" role="complementary">
      <?php get_template_part('templates/sidebar', 'common'); ?>
    </aside><!-- /.sidebar -->

  </main>
</div>

<?php endwhile; ?>


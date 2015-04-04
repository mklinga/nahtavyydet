<section class="article-featured-image" id="single-attraction-featured-image">
  <?php get_template_part('templates/article', 'header'); ?>
</section>

<div class="article-content container">
  <main class="content row main" role="main">

    <aside class="sidebar" role="complementary">
      &nbsp;
    </aside><!-- /.sidebar -->

    <article <?php post_class(); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
      </div>
    </article>

  </main>
</div>


 
<section class="article-featured-image" id="single-post-featured-image">
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
      </div>
    </article>

  </main>
</div>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>

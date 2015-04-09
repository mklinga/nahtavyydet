<div class="row">
  <section class="article-featured-image" id="country-featured-image">
    <?php get_template_part('templates/article', 'header'); ?>
  </section>
</div>

<main class="container content main" role="main">

  <div class="row">
    <section class="twelve columns articles">
      <?php the_content(); ?>
    </section>
  </div>

  <div
  <?php get_template_part('templates/country', 'content'); ?>

</main><!-- /.main -->

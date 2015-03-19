<main class="container content main" role="main">
  <div class="row">

    <div <?php post_class(); ?>>

      <section class="featured-post">
          <?php get_template_part('templates/home', 'featured-article'); ?>
      </section>

      <aside class="home-aside-right">
        <?php get_template_part('templates/home', 'aside-right'); ?>
      </aside>
    </div>
    <div class="row">
      <section class="articles">
        <?php get_template_part('templates/home', 'main-content'); ?>
      </section>
    </div>

  </div><!-- /.content -->
</main><!-- /.main -->

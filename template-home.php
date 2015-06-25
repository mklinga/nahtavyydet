<?php
/*
Template Name: Home Template
*/
?>

<?php while (have_posts()) : the_post(); ?>
<main class="container content main" role="main">

  <div class="row">

    <section class="eight columns featured-post">
      <?php get_template_part('templates/home', 'featured-article'); ?>
    </section>

    <aside class="four columns sidebar home-aside-right">
      <?php get_template_part('templates/home', 'aside-right'); ?>
    </aside>

  </div>

  <div class="row">

    <section class="twelve columns articles">
      <?php get_template_part('templates/home', 'main-content'); ?>
    </section>

  </div>

  <div class="row">

    <section class="twelve columns cities">
      <?php get_template_part('templates/home', 'featured-city'); ?>
    </section>

  </div>

  <div class="row">
    
    <section class="twelve columns new-attractions">
      <?php get_template_part('templates/home', 'new-attractions'); ?>
    </section>
  </div>

</main><!-- /.main -->
<?php endwhile; ?>

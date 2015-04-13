<?php
/*
Template Name: Home Template
*/
?>

<?php while (have_posts()) : the_post(); ?>
<main class="container content main" role="main">

    <?php get_template_part('templates/home', 'featured-article'); ?>

  <div class="row">
    <section class="twelve columns articles">
      <?php get_template_part('templates/home', 'main-content'); ?>
    </section>
  </div>

</main><!-- /.main -->
<?php endwhile; ?>

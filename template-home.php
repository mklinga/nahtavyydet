<?php
/*
Template Name: Home Template
*/
?>

<header class="home-page-header">
  <div id="home-header-text">
    <h1>Nähtävyydet.fi</h1>
    <h2>&lt;Iskulause tähän&gt;</h2>
  </div>
</header>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'home'); ?>
<?php endwhile; ?>

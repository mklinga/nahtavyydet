<?php
/*
Template Name: Country Template
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/collection', 'country'); ?>
<?php endwhile; ?>

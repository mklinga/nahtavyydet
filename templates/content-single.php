<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>


    <div class="attraction-list">
      <?php

      // Get current taxonomies
      $term_list = wp_get_post_terms($post->ID, 'ct_location', array("fields" => "slugs"));

      if (count($term_list) != 0)
      {
        $location = $term_list[0];

        $args = array(
          'post_type' => 'pt_attraction',
          'tax_query' => array(
            array('taxonomy' => 'ct_location',
            'field' => 'slug',
            'terms' => $location
            )
            )
          );

        $attractions = new WP_Query( $args );
        if ($attractions->have_posts() ) {
          while ( $attractions->have_posts() ) {
            $attractions->the_post();
?>
        <h1><?php the_title(); ?></h1>
        <div class="content">
          <?php the_content(); ?>
        </div>
<?php
          }
        }
        else { echo "oh noes."; }
      }
      ?>
    </div>



    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>

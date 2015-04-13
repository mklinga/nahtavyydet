<?php while (have_posts()) : the_post(); ?>

<section class="article-featured-image" id="single-post-featured-image">

  <?php get_template_part('templates/article', 'header'); ?>

  <?php
    $country = get_post_meta( get_the_ID(), 'location-country', true );
    $city = get_post_meta( get_the_ID(), 'location-city', true );
    $pic = get_post_meta( get_the_ID(), 'location-picture-credit', true );
  ?>
<?php

    /*
     * TODO: Make top pages available!
     */
?>
  <a href="/<?php echo sanitize_title($country); ?>">
    <span class="subheader-country"><?php echo $country; ?></span>
  </a>
  &gt; 
  <a href="/<?php echo $city; ?>"><span class="subheader-city"><?php echo $city; ?></span></a>
  <span class="post-caption"><?php echo $pic; ?></span>
  
</section>
  <div class="article-content container">
    <main class="content row main" role="main">

      <aside class="four columns sidebar" role="complementary">
        &nbsp;
      </aside><!-- /.sidebar -->

      <article <?php post_class('eight columns'); ?>>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <div class="related-posts">
          <?php get_template_part('templates/page', 'related'); ?>
        </div>

        <footer>
          <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
        </footer>
      </article>
    </main><!-- /.main -->
  </div><!-- /.content -->
<?php endwhile; ?>

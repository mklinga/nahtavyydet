<?php while (have_posts()) : the_post(); ?>

<section class="article-featured-image" id="single-post-featured-image">

  <?php get_template_part('templates/article', 'header'); ?>

<?php
  $country = get_post_meta( get_the_ID(), 'location-country', true );
  $city = get_post_meta( get_the_ID(), 'location-city', true );
  $pic = get_post_meta( get_the_ID(), 'location-picture-credit', true );
?>
    <a href="/<?php echo $country; ?>"><span class="subheader-country"><?php echo $country; ?></span></a> &gt; 
    <a href="/<?php echo $city; ?>"><span class="subheader-city"><?php echo $city; ?></span></a>
    <span class="subheader-credit"><?php echo $pic; ?></span>
  
  </section>
    <div class="article-content container">
      <main class="content row main" role="main">
    <?php if (roots_display_sidebar()) : ?>
      <aside class="sidebar" role="complementary">
        <?php include roots_sidebar_path(); ?>
      </aside><!-- /.sidebar -->
    <?php endif; ?>

  <article <?php post_class(); ?>>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>

    <div class="attraction-list">
      <?php get_template_part('templates/content', 'attraction'); ?>
    </div>

    <div class="related-posts">
      <?php get_template_part('templates/content', 'related'); ?>
    </div>

    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
      </main><!-- /.main -->
    </div><!-- /.content -->
<?php endwhile; ?>

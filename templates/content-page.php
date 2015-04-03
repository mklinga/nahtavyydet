<?php while (have_posts()) : the_post(); ?>
  <header id="single-page-header">

<?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    the_post_thumbnail();
  }
?>
    <div class="image-title-box">
      <h1><?php the_title(); ?></h1>
      <h2>Suomi</h2>
    </div>

<?php
  $country = get_post_meta( get_the_ID(), 'location-country', true );
  $city = get_post_meta( get_the_ID(), 'location-city', true );
  $pic = get_post_meta( get_the_ID(), 'location-picture-credit', true );
?>
    <a href="/<?php echo $country; ?>"><span class="subheader-country"><?php echo $country; ?></span></a> &gt; 
    <a href="/<?php echo $city; ?>"><span class="subheader-city"><?php echo $city; ?></span></a>
    <span class="subheader-credit"><?php echo $pic; ?></span>
  
  </header>
    <div class="container">
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

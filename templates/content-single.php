<?php while (have_posts()) : the_post(); ?>
  <header id="single-post-header">
<?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    the_post_thumbnail();
  }
?>
    <h1 class="entry-title"><?php the_title(); ?></h1>

<?php
  $country = get_post_meta( get_the_ID(), 'location-country', true );
  $city = get_post_meta( get_the_ID(), 'location-city', true );
  $pic = get_post_meta( get_the_ID(), 'location-picture-credit', true );
?>
    <a href="/<?php echo $country; ?>"><span class="subheader-country"><?php echo $country; ?></span></a> &gt; 
    <a href="/<?php echo $city; ?>"><span class="subheader-city"><?php echo $city; ?></span></a>
    <span class="subheader-credit">Kuva: <?php echo $pic; ?></span>
  
  </header>
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

    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>

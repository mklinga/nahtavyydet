<?php while (have_posts()) : the_post(); ?>
  <header id="single-post-header">
<?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    the_post_thumbnail();
  }
?>
    <h1 class="entry-title"><?php the_title(); ?></h1>

<?php
  $country = get_post_meta( get_the_ID(), 'attraction-country', true );
  $city = get_post_meta( get_the_ID(), 'attraction-city', true );
  $url = get_post_meta( get_the_ID(), 'attraction-homepage', true );
?>
    <a href="/<?php echo $country; ?>"><span class="subheader-country"><?php echo $country; ?></span></a> &gt; 
    <a href="/<?php echo $city; ?>"><span class="subheader-city"><?php echo $city; ?></span></a>
    <a target="_blank" href="<?php echo $url ?>"><span class="subheader-wikipedia">Wikipedia</span></a>
  
  </header>
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

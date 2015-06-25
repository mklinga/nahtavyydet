<?php while (have_posts()) : the_post(); ?>

<div class="article-content container">
  <main class="content row main" role="main">

    <article <?php post_class('eight columns'); ?>>

      <section class="archive-diary-featured-image">
        <?php
          if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.

            echo '<a href="' . get_the_permalink() . '">';
            the_post_thumbnail('low-thumbnail');
            echo '</a>';
          }
        ?>

      </section>

      <section class="entry-content">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <?php echo '<p>' . wp_trim_words( get_the_content() , 80 ) . ' <a href="' . get_the_permalink() . '">Lue lisää...</a></p>'; ?>
      </section>

    </article>

  </main>
</div>
<?php endwhile; ?>

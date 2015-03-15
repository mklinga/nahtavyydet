<div class="container">
  <main class="content row main" role="main">

    <article <?php post_class(); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>

    <section>
      <h2>Uusimmat kirjoitukset</h2>
      <ul id="recent-posts">
      <?php
        $args = array( 
          'numberposts' => '3',
        );
        $recent_posts = wp_get_recent_posts( $args );
        foreach( $recent_posts as $recent ){
?>
        <li class="recent-post-item">
          <a href="<?php echo get_permalink($recent["ID"]); ?>">
            <?php echo get_the_post_thumbnail($recent["ID"], 'thumbnail'); ?>
            <span class="post-title"><?php echo $recent["post_title"]; ?></span>
          </a>
        </li>
<?php
        }
      ?>
      </ul>
    </section>

  </main><!-- /.main -->
</div><!-- /.content -->

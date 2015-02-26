<div class="container">
  <main class="content row main" role="main">

    <article <?php post_class(); ?>>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>

    <section class="newest-posts">
      <h2>Uusimmat artikkelit</h2>
      <ul>
      <?php
        $args = array( 
          'numberposts' => '3',
        );
        $recent_posts = wp_get_recent_posts( $args );
        foreach( $recent_posts as $recent ){
?>
        <li>
          <a href="<?php echo get_permalink($recent["ID"]); ?>">
            <?php echo $recent["post_title"]; ?>
          </a>
        </li>
<?php
        }
      ?>
      </ul>
    </section>

  </main><!-- /.main -->
</div><!-- /.content -->

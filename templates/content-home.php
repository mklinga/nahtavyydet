<main class="container content main" role="main">
  <div class="row">

    <div <?php post_class(); ?>>
      <aside class="home-aside-left">
        This is aside left
      </aside>
        <article>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
      <aside class="home-aside-right">
        This is aside right
      </aside>

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
    </div>

  </div><!-- /.content -->
</main><!-- /.main -->

<?php the_content(); ?>
<?php
/*
<h2>Uusimmat kirjoitukset</h2>
<ul id="recent-posts">
<?php
$args = array( 
  'numberposts' => '5',
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
 */?>

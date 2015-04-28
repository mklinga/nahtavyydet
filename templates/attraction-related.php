<?php

$tag = wp_get_post_tags(get_the_ID(), array('fields' => 'slugs'));
$tag[] = get_post_meta(get_the_ID(), 'attraction-city', true);

if (!empty($tag)) {

/*
 * Related posts
 */
  $lists = array(
    array('type' => 'post', 'header' => 'Lue myös:'),
    array('type' => 'attraction', 'header' => 'Aiheeseen liittyviä nähtävyyksiä')
  );

  foreach ($lists as $type) {
    $args = array(
      'post_type' => $type,
      'tag_slug__in' => $tag,
      'post__not_in' => array(get_the_ID())
    );

    $related = new WP_Query( $args );
    if ($related->have_posts()) {
?>
  <section class="related-<?php echo $type['type']; ?>s">
    <h2 id="related-articles-header"><?php echo $type['header'];?></h2>
    <ul class="related-links row">
<?php
      while ($related->have_posts()) {
        $related->the_post();
?>
        <li class="related-link"><a href="<?php the_permalink(); ?>">
<?php
        the_post_thumbnail('low-thumbnail');
        the_title();
?>
  </a></li>
<?php
      }
?>
  </ul>
  <span class="clear"></span>
</section>
<?php
    }

    wp_reset_query();

  }


} // if !empty($tag)
?>

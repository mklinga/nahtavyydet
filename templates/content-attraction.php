<?php

$location = get_post_meta( get_the_ID(), 'attraction-location', true);
if ($location != "")
{
  $args = array(
    'post_type' => 'pt_attraction',
    'meta_query' => array(
      array(
        'key' => 'attraction-location',
        'value' => $location
      ),
    ),
    'orderby' => 'title',
    'order' => 'ASC',
  );

  $attractions = new WP_Query( $args );
  if ($attractions->have_posts() ) {
    while ( $attractions->have_posts() ) {
      $attractions->the_post();

?>
      <h3><?php the_title(); ?></h3>

<?php
      $attraction_type = get_post_meta( get_the_ID(), 'attraction-type', true );
?>
      <span class="attraction-category"><?php echo $attraction_type; ?></span>
      <div class="content">
        <?php the_content(); ?>
      </div>
<?php
    }

  }
  else { echo "Jokin meni vikaan :("; }
}

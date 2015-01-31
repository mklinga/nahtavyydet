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

      /*
       *    Attraction code begins here
       */

      $attractions->the_post();

?>
      <h3><?php the_title(); ?></h3>

<?php
      $attraction_type = get_post_meta( get_the_ID(), 'attraction-type', true );
      $attraction_home = get_post_meta( get_the_ID(), 'attraction-homepage', true );
      $attraction_map = get_post_meta( get_the_ID(), 'attraction-map-location', true );
      $attraction_address = get_post_meta( get_the_ID(), 'attraction-address', true );

?>
      <div class="attraction-details">
<?php
      if ($attraction_address !== "")
        echo '<span class="attraction-address">'.$attraction_address.'</span><br>';
      if ($attraction_home !== "")
        echo '<a class="icon-home attraction-link" target="_blank" href="'.$attraction_home.'">Kotisivu</a><br>';
      if ($attraction_map !== "")
        echo '<a class="icon-map attraction-link" target="_blank" href="'.$attraction_map.'">Näytä kartalla</a>';
?>
      </div>
      <!-- <span class="attraction&#45;category"><?php echo $attraction_type; ?></span> -->
      <div class="content attraction-content">
        <?php the_content(); ?>
      </div>
      <div>
        <?php /* comments_template('/templates/comments.php'); */ ?>
      </div>
<?php

      /*
       *    Attraction code ends
       */
    }

  }
  else { echo "Jokin meni vikaan :("; }
}

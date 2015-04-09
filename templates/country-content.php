<?php
$country = get_post_meta( get_the_ID(), 'location-country', true);

if ($country != "")
{
  $args = array(
    'post_type' => 'page',
    'meta_query' => array(
      'relation' => 'AND',
      array(
        'key' => 'location-type',
        'value' => 'Kaupunki'
      ),
      array(
        'key' => 'location-country',
        'value' => $country
      )
    )
  );

  $cities = new WP_Query( $args );
  if ($cities->have_posts() ) {
?>

  <ul class="city-links">

<?php
    while ( $cities->have_posts() ) {
      $cities->the_post();
?>

    <li class="city-link">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    </li>

<?php
    }
?>

  </ul>

<?php
  }
  wp_reset_query();
}


<?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
    the_post_thumbnail('extra-large');
  }
?>

<?php
  $caption = get_post(get_post_thumbnail_id())->post_excerpt;
  if ($caption != '')
    echo '<span class="post-caption">' . $caption . '</span>';
?>
  <div class="image-title-box">
    <h1><?php the_title(); ?></h1>
    <h2>
<?php
    $post_type = get_post_meta(get_the_ID(), 'location-type', true);
    if ($post_type == "Valtio")
      echo get_post_meta(get_the_ID(), 'location-continent', true);
    else if ($post_type == "Kaupunki")
      echo get_post_meta(get_the_ID(), 'location-country', true);
    else if (get_post_meta(get_the_ID(), 'attraction-city') != "")
      echo get_post_meta(get_the_ID(), 'attraction-city', true);
    else if (($post_type == "Muu") || ($post_type == "Maanosa"))
      echo "";
    else
      echo the_modified_date('F Y');
?>
    </h2>
  </div>

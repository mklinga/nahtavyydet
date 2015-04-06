<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <nav class="collapse navbar-collapse" role="navigation">
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
      <?php get_search_form(true); ?>
    </nav>
  </div>
</header>

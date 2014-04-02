<header class="banner" role="banner">
  <div class="toprow">
    <div class="left-top">Stag weekends in Budapest &middot; Call us: <a href="tel:0036707705653">+36 70 774 6545</a> &middot; Email Us: <a href="mailto:szabogabi@gmail.com">hello@stagsandstuff.com</a></div>
    <a href="<?php echo get_permalink(104); ?>" class="btn topenq">Package builder</a>
  </div>
  <a class="brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
  <nav id="nav-main" class="nav-main" role="navigation">
    <a href="<?php echo home_url(); ?>/" class="logo-pengeto"></a>
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav1 nav nav-pills'));
      endif;
    ?>
  </nav>
</header>


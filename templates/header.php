<header class="banner<?php echo is_page_template('tmpl-home.php')?' fullscreen':''; ?>" role="banner" id="pagetop">
  <div class="toprow">
    <div class="left-top">Call us: <a href="tel:0036302767512">0036302767512</a> &middot; Email Us: <a href="mailto:info@stagsandstuff.com">info@stagsandstuff.com</a></div>
    <a href="?activity-category=all-activities" class="btn topenq"><i class="icon-027"></i> Build Your Own Package</a>
    <?php if (count($_SESSION['actList'])>0) :?>
    <span class="cart">Starred <a href="<?php echo get_permalink(104); ?>"><strong><?php echo count($_SESSION['actList']); ?></strong></a> activity. </span>
    <?php endif; ?>
  </div>
  <a class="brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
  <nav id="nav-main" class="nav-main" role="navigation">
    <a href="<?php echo home_url(); ?>/" class="logo-navbar"></a>
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav1 nav nav-pills'));
      endif;
    ?>
  </nav>
  <?php get_template_part( 'templates/home', 'banner' ); ?>
</header>


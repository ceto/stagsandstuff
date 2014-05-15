<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
  <!--[if lt IE 8]><div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
  </div><![endif]-->
  
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/hu_HU/sdk.js#xfbml=1&appId=394219134049326&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
  <div class="mindenmas">
    <header class="mobile-header" role="banner">
      <nav class="off-canvas-navigation">
        <a class="menu-button" href="#menu"><i class="icon-316"></i></a>
      </nav>
      <a class="mobile-logo" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
    </header>
    <?php get_template_part('templates/section','top'); ?>
    <div class="document" role="document">
      <?php get_template_part('templates/subnavigation'); ?>
      <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
     
      <?php /* if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; */?>
    </div><!-- /.wrap -->
    <?php get_template_part('templates/section','bottom'); ?>
    <?php get_template_part('templates/footer'); ?>
  </div><!-- /.mindenmas -->
</body>
</html>

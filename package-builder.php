<?php
/*
Template Name: Package Builder
*/
?>
<?php while (have_posts()) : the_post(); ?>

  <form class="form-horizontal builder-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
   <?php get_template_part( 'templates/builder', 'details' ); ?>
  </form>

    


<?php endwhile; ?>


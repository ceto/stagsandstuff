<?php
/*
Template Name: Galleries
*/
?>
<?php get_template_part('templates/page', 'header'); ?>

  <?php 
    $the_posts = new WP_Query(array(
      'post_type' => 'post',
      'posts_per_page' => -1,
       'tax_query' =>  array(
        	array(
              'taxonomy' => 'post_format',
              'field' => 'slug',
              'terms' => array( 'post-format-gallery' ),
              )
        ),
     ));
  ?>
  <?php while ($the_posts->have_posts()) : $the_posts->the_post(); ?>
    <?php get_template_part('templates/content','' ); ?>
  <?php endwhile; ?>






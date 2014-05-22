<?php
/*
Template Name: Home Template
*/
?>
<section class="hiw">
  <h2>How it works?</h2>
</section>

<section class="fresh-posts">
  <?php 
    $the_posts = new WP_Query(array(
      'post_type' => 'post',
      'posts_per_page' => 3
    ));
  ?>
  <?php while ($the_posts->have_posts()) : $the_posts->the_post(); ?>
    <?php get_template_part('templates/content','' ); ?>
  <?php endwhile; ?>


</section>

<?php
/*
Template Name: Accomodation List
*/
?>
<?php
  $the_acc = new WP_Query(array(
    'post_type' => array('accomodation'),
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => -1
  ));
?>
<div class="accomodation-list">
  <?php while ($the_acc->have_posts()) : $the_acc->the_post(); ?>
    <?php get_template_part('templates/item','accomodation' ); ?>
  <?php endwhile; ?>
</div>
<?php wp_reset_query(); ?>
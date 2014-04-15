<article id="square-<?php echo $post->ID; ?>" <?php post_class('square'); ?>>
  <figure class="square-thumb">
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('small34');  ?>
    </a>
  </figure>
  <div class="square-desc">
    <h3 class="square-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <!--a href="<?php the_permalink(); ?>" class="btn btn-light-line"><?php _e('Read more','root'); ?></a-->
  </div>
</article>
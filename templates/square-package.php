<?php
    $termik = array();

    $nagytermlist=array_merge(
      get_the_terms( $post->ID, 'package-category' ),
      get_the_terms($post->ID, 'package-tag')
    );
    foreach ( $nagytermlist as $term ) { $termik[] = $term->slug; }
  ?>
  <a id="package-<?php echo $post->ID; ?>" <?php post_class( join(" ", $termik ).' package-mini ize-mini' ); ?>
    href="<?php the_permalink(); ?>"
    data-url="<?php the_permalink(); ?>"
    data-name="<?php the_title(); ?>"
  >
    <figure class="package-thumb">
      <?php //the_post_thumbnail('tiny11');  ?>
      <?php $w=rand(480,490); $h=round($w/4*3); ?>
      <img src="http://lorempixel.com/<?php echo $w ?>/<?php echo $h ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" alt="" >
      
    </figure>
    <div class="package-desc">
      <h3 class="package-title"><?php the_title(); ?><small><?php echo get_post_meta($post->ID, '_meta_subtitle', true); ?></small></h3>
    </div>
  </a><!-- /#package-## -->

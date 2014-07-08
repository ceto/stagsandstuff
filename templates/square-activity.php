<?php
    $termik = array();

    $nagytermlist=array_merge(
      get_the_terms( $post->ID, 'activity-category' ),
      get_the_terms($post->ID, 'activity-tag')
    );
    foreach ( $nagytermlist as $term ) { $termik[] = $term->slug; }
  ?>
  <a id="activity-<?php echo $post->ID; ?>" <?php post_class( join(" ", $termik ).' activity-mini ize-mini' ); ?>
    href="<?php the_permalink(); ?>"
    data-url="<?php the_permalink(); ?>"
    data-name="<?php the_title(); ?>"
  >
    <figure class="activity-thumb">
      <?php if (has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail('tiny43');  ?>
      <?php else: ?>
        <?php $w=rand(320,330); $h=round($w/4*3); ?>
        <img src="http://lorempixel.com/<?php echo $w ?>/<?php echo $h ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" alt="" >
      <?php endif; ?>
    </figure>
    <div class="activity-desc">
      <h3 class="activity-title"><?php the_title(); ?><small><?php echo get_post_meta($post->ID, '_meta_subtitle', true); ?></small></h3>
      <?php get_template_part('templates/act','katt'); ?>
    </div>
  </a><!-- /#activity-## -->

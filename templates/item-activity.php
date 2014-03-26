<?php
    $termik = array();

    $nagytermlist=array_merge(
      get_the_terms( $post->ID, 'activity-category' ),
      get_the_terms($post->ID, 'activity-tag')
    );
    foreach ( $nagytermlist as $term ) { $termik[] = $term->slug; }
  ?>
  <article id="activity-<?php echo $post->ID; ?>" <?php post_class( join(" ", $termik ).' activity-item' ); ?>  >
    <figure class="activity-thumb">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php if (has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail('tiny43');  ?>
        <?php else: ?>
          <?php $w=rand(320,330); $h=round($w/4*3); ?>
          <img src="http://lorempixel.com/<?php echo $w ?>/<?php echo $h ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" alt="" >
        <?php endif; ?>
      </a>
    </figure>
    <div class="activity-details">
      <h3 class="activity-title">
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          <small><?php echo get_post_meta($post->ID, '_meta_subtitle', true); ?></small>
        </a>
      </h3>
      <div class="tag-list">
        <?php 
          $terms=get_the_terms($post->ID, 'activity-tag');
          $count = count($terms);
          if ($count > 0) {
            $term_list = '';
            foreach ($terms as $term) {
              $term_list .= '<a href="' . get_term_link( $term ) . '" title="' . sprintf(__('View all activity filed under %s', 'root'), $term->name) . '">' . $term->name . '</a>';
            }
            echo $term_list;
          }
        ?>
      </div>
      <div class="activity-desc">
        <?php //the_content( __('Details','root')); ?>
        <?php the_excerpt(); ?>
      </div>
    </div>
    <footer class="activity-footer">
    <a href="<?php the_permalink(); ?>" class="btn activity-detbtn">Details</a>
    </footer>
  </article><!-- /#activity-## -->

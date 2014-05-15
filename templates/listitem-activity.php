<?php
    $termik = array();
    $ures = array();
    $nagytermlist=array_merge(
      get_the_terms( $post->ID, 'activity-category' )?get_the_terms( $post->ID, 'activity-category' ):$ures,
      get_the_terms($post->ID, 'activity-tag')?get_the_terms($post->ID, 'activity-tag'):$ures
    );
    foreach ( $nagytermlist as $term ) { $termik[] = $term->slug; }
  ?>
  <div id="activity-<?php echo $post->ID; ?>" <?php post_class( join(" ", $termik ).' activity-listitem' ); ?>  >
      <div class="feje">
        <input type="checkbox" <?php echo in_array($post->ID, $_SESSION['actList'])?'checked="checked"':''; ?> value="<?php echo $post->ID; ?>">
        <h3 class="activity-title">
          <?php the_title(); ?>
          <small><?php echo get_post_meta($post->ID, '_meta_subtitle', true); ?></small>
        </h3>
        <a class="switcher" href="#adatai-<?php echo $post->ID; ?>" data-parent="#activity-chooser" data-toggle="collapse"><i class="ion-ios7-arrow-down"></i></a>
      </div>
      <div id="adatai-<?php echo $post->ID; ?>" class="adatai panel-collapse collapse">
        <figure class="activity-pic">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php if (has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('tiny43');  ?>
            <?php else: ?>
              <?php $w=rand(320,330); $h=round($w/4*3); ?>
              <img src="http://lorempixel.com/<?php echo $w ?>/<?php echo $h ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" alt="" >
            <?php endif; ?>
          </a>
        </figure>
        <div class="activity-desc">
          <?php the_excerpt(); ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="btn activity-detbtn">More details</a>
      </div><!-- /.adatai -->
  </div><!-- /#activity-## -->

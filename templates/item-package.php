<?php
    $termik = array();

    $nagytermlist=array_merge(
      get_the_terms( $post->ID, 'package-category' ),
      get_the_terms($post->ID, 'package-tag')
    );
    foreach ( $nagytermlist as $term ) { $termik[] = $term->slug; }
  ?>
  <article id="package-<?php echo $post->ID; ?>" <?php post_class( join(" ", $termik ).' package-item' ); ?>  >
    <figure class="package-thumb">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php //the_post_thumbnail('tiny11');  ?>
        <?php $w=rand(320,330); $h=round($w/16*9); ?>
        <img src="http://lorempixel.com/<?php echo $w ?>/<?php echo $h ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" alt="" >
      </a>
    </figure>
    <div class="package-details">
      <h3 class="package-title">
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          <small><?php echo get_post_meta($post->ID, '_meta_subtitle', true); ?></small>
        </a>
      </h3>
      <div class="package-desc"><?php the_content() ?></div>
    </div>
    <footer class="package-footer">
      <div class="package-tags">
        <div class="tag-list">
          <?php 
            $terms=get_the_terms($post->ID, 'package-tag');
            $count = count($terms);
            if ($count > 0) {
              $term_list = '';
              foreach ($terms as $term) {
                $term_list .= '<a href="' . get_term_link( $term ) . '" title="' . sprintf(__('View all package filed under %s', 'root'), $term->name) . '">' . $term->name . '</a>';
              }
              echo $term_list;
            }
          ?>
        </div>
      </div>
      <a href="<?php the_permalink(); ?>" class="btn package-detbtn">Details</a>
    </footer>
  </article><!-- /#package-## -->

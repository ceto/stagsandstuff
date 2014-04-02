<?php
    $termik = array();

    $nagytermlist=array_merge(
      get_the_terms( $post->ID, 'package-category' ),
      get_the_terms($post->ID, 'package-tag')
    );
    foreach ( $nagytermlist as $term ) { $termik[] = $term->slug; }
  ?>
  <article id="package-<?php echo $post->ID; ?>" <?php post_class( join(" ", $termik ).' package-item ize-mini' ); ?>  >
    <?php
      if (get_post_meta( $post->ID, '_meta_wallimg_id', true )){
        $ima = get_post_meta( $post->ID, '_meta_wallimg_id', true );
        //$imci = wp_get_attachment_image_src( $ima, 'wallimg');
        $imcismall = wp_get_attachment_image_src( $ima, 'wallsmall');
        $imcimedium = wp_get_attachment_image_src( $ima, 'wallmedium');
        //$imcigreat = wp_get_attachment_image_src( $ima, 'wallgreat');
      ?>
      <style type="text/css">
        #coverphoto-<?php echo $post->ID; ?> {
           background-image:url('<?php echo $imcismall['0']; ?>');
        }
        @media only screen and (min-width: 768px) {
          #coverphoto-<?php echo $post->ID; ?> {
            background-image:url('<?php echo $imcimedium['0']; ?>');
          }
        }
        </style>
      <?php } ?>

    <a href="<?php the_permalink(); ?>" id="coverphoto-<?php echo $post->ID; ?>" class="coverphoto"></a>
    <header class="package-head">
      <h3 class="package-title">
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          <small><?php echo get_post_meta($post->ID, '_meta_subtitle', true); ?></small>
        </a>
      </h3>
    </header>
    <div class="allother">
      <!--figure class="package-thumb">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php if (has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('tiny43');  ?>
          <?php else: ?>
            <?php $w=rand(320,330); $h=round($w/4*3); ?>
            <img src="http://lorempixel.com/<?php echo $w ?>/<?php echo $h ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" alt="" >
          <?php endif; ?>
        </a>
      </figure-->
      <div class="package-desc">
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
        <?php the_content() ?>
      </div>
      <footer class="package-footer">
        <a href="<?php the_permalink(); ?>" class="btn package-detbtn">Details</a>
      </footer>
    </div><!-- /.allother -->
  </article><!-- /#package-## -->

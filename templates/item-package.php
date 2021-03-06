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


    <header class="package-head">
      <a href="<?php the_permalink(); ?>" id="coverphoto-<?php echo $post->ID; ?>" class="coverphoto"></a>
      <h3 class="package-title">
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          <small><?php echo get_post_meta($post->ID, '_meta_subtitle', true); ?></small>
        </a>
      </h3>
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
    </header>
    <div class="allother">
      <div class="package-desc">
        <?php the_content('Show Details', FALSE) ?>
      </div>
      <footer class="package-footer">
        <a href="<?php the_permalink(); ?>" class="btn package-detbtn">Details</a>
      </footer>
    </div><!-- /.allother -->
  </article><!-- /#package-## -->

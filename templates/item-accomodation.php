  <article id="accomodation-<?php echo $post->ID; ?>" <?php post_class('accomodation-item' ); ?>  >

  <?php
    if (get_post_meta( $post->ID, '_meta_wallimg_id', true )){
      $ima = get_post_meta( $post->ID, '_meta_wallimg_id', true );
      $imci = wp_get_attachment_image_src( $ima, 'large41');
      $imcismall = wp_get_attachment_image_src( $ima, 'large41');
      $imcimedium = wp_get_attachment_image_src( $ima, 'large41');
      $imcigreat = wp_get_attachment_image_src( $ima, 'large41');
  ?>
  <style type="text/css">
    #accomodation-<?php echo $post->ID; ?> {
       background-image:url('<?php echo $imcismall['0']; ?>');
    }
    @media only screen and (min-width: 768px) {
      #accomodation-<?php echo $post->ID; ?> {
        background-image:url('<?php echo $imcimedium['0']; ?>');
      }
    }
    @media only screen and (min-width: 1280px) {
      #accomodation-<?php echo $post->ID; ?> {
        background-image:url('<?php echo $imcigreat['0']; ?>');
      }
    }
    @media only screen and (min-width: 1600px) {
      #accomodation-<?php echo $post->ID; ?> {
        background-image:url('<?php echo $imci['0']; ?>');
      }
    }
  </style>
  <?php } ?>

    <figure class="accomodation-thumb">
      <?php if (has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail('tiny43');  ?>
      <?php else: ?>
        <?php $w=rand(1280,1290); $h=round($w/4); ?>
        <img src="http://lorempixel.com/<?php echo $w ?>/<?php echo $h ?>" width="<?php echo $w ?>" height="<?php echo $h ?>" alt="" >
      <?php endif; ?>
    </figure>
    <div class="accomodation-details">
      <h3 class="accomodation-title">
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          <small><?php echo get_post_meta($post->ID, '_meta_subtitle', true); ?></small>
        </a>
      </h3>
      <div class="accomodation-desc">
        <?php the_content( __('Details','root')); ?>
        <?php //the_excerpt(); ?>
        <a href="<?php the_permalink(); /*echo  get_post_meta($post->ID, '_meta_siteurl', true);  */?>" class="btn accomodation-detbtn">See Gallery</a>
      </div>
    </div>
  </article><!-- /#accomodation-## -->

<?php while (have_posts()) : the_post(); ?>
<?php
  $termik = array();
  $ures = array();
  $termlist=array_merge(
    get_the_terms( $post->ID, 'package-category' )?get_the_terms( $post->ID, 'package-category' ):$ures,
    get_the_terms( $post->ID, 'package-tag' )?get_the_terms( $post->ID, 'package-tag' ):$ures
  );
  $termlinks='';
  foreach ( $termlist as $term ) { 
    $termik[] = $term->slug;
    $termlinks .= '<a href="' . get_term_link( $term ) . '" title="' . sprintf(__('View all package filed under %s', 'root'), $term->name) . '">' . $term->name . '</a>';
  }
  $termes = join(" ", $termik );
?>
  <?php
    if (get_post_meta( $post->ID, '_meta_wallimg_id', true )){
      $ima = get_post_meta( $post->ID, '_meta_wallimg_id', true );
      $imci = wp_get_attachment_image_src( $ima, 'wallimg');
      $imcismall = wp_get_attachment_image_src( $ima, 'wallsmall');
      $imcimedium = wp_get_attachment_image_src( $ima, 'wallmedium');
      $imcigreat = wp_get_attachment_image_src( $ima, 'wallgreat');
  ?>
  <style type="text/css">
    article.package {
       background-image:url('<?php echo $imcismall['0']; ?>');
    }
    @media only screen and (min-width: 768px) {
      article.package {
        background-image:url('<?php echo $imcimedium['0']; ?>');
      }
    }
    @media only screen and (min-width: 1280px) {
      article.package {
        background-image:url('<?php echo $imcigreat['0']; ?>');
      }
    }
    @media only screen and (min-width: 1600px) {
      article.package {
        background-image:url('<?php echo $imci['0']; ?>');
      }
    }
  </style>
  <?php } ?>
  <article id="package-<?php echo $post->ID  ?>" <?php post_class($termes); ?> >
    <header class="minihero" role="banner">
      <div class="minihero-content">
        <h1 class="minihero-title">
          <?php the_title();  ?><small><?php echo get_post_meta( $post->ID, '_meta_subtitle', true); ?></small>
        </h1>
        <div class="actblock">
          <a href="#" class="btn"><small>Party is starting here</small>Enquire</a>
        </div>
        <div class="tag-list"><?php echo $termlinks; ?></div>

        <div class="minihero-lead">
          <?php the_content(); ?>
        </div>  
      </div>
    </header>
    <div class="inner">
      <div class="package-content">
        <div class="package-links">
          <h3>Contains</h3>
          <ul class="linkblock">
            <?php 
              $banben=get_post_meta( $post->ID, '_meta_actlist', false );
              $the_activity=new WP_Query( array(
                'post_type' => array('activity' ),
                'post__in' => $banben,
                'posts_per_page' => -1
              ));
            ?>
            <?php while ( $the_activity->have_posts() ) : $the_activity->the_post(); ?>
              <li><a href="#activity-<?php echo get_the_id(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
          </ul>
        </div>

        <div class="gombsor">
          <a href="#" class="share-face"><i class="ion-social-facebook"></i><br /><span>Share</span></a>
          <a href="tel:+36209734344" class="call-phone"><i class="ion-iphone"></i><br /><span>+36.70.770.56.53</span></a>
          <a href="#" class="share-like"><i class="ion-thumbsup"></i><br /><span>Like It</span></a>
        </div>
      </div>
      <footer class="package-footer">
        <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      </footer>
      <nav class="package-pn">
        <ul>
          <li><?php previous_post_link( '%link', '<i class="ion-ios7-arrow-back"></i> %title', TRUE, ' ', 'package-category' ); ?> </li>
          <li><?php next_post_link( '%link', '%title <i class="ion-ios7-arrow-forward"></i>', TRUE, ' ', 'package-category' ); ?></li>
        </ul>
      </nav>
    </div> 
  </article>
  <section class="containing-activities">
    <div class="inner">
      <h2><?php _e('Detailed activities in package'); ?></h2>
      <?php $the_activity->rewind_posts(); ?>
      <?php while ( $the_activity->have_posts() ) : $the_activity->the_post(); ?>
        <?php get_template_part('templates/item','activity' ); ?>
      <?php endwhile; ?>
    </div>
  </section>
<?php endwhile; ?>

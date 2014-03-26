<?php if (is_page_template('tmpl-home.php')): ?>
<section class="hero" role="banner">
  <div class="hero-content">
    <span class="hero-text">
        <?php bloginfo('description' ); ?>
    </span>
  </div>
</section>
<?php elseif ( ( is_singular('post') &&  (get_post_format( $post->ID ) != 'gallery') )   ) :?>
  <?php
    $copt=get_option('cementlap_option_name');
    // $imci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wallimg' ); 
    // $imcismall = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wallsmall' ); 
    // $imcimedium = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wallmedium' ); 
    // $imcigreat = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wallgreat' ); 

    if (get_post_meta( $post->ID, '_meta_wallimg_id', true )){
      $ima = get_post_meta( $post->ID, '_meta_wallimg_id', true );
    } else {
      $ima =  48;
    }


    $imci = wp_get_attachment_image_src( $ima, 'wallimg');
    $imcismall = wp_get_attachment_image_src( $ima, 'wallsmall');
    $imcimedium = wp_get_attachment_image_src( $ima, 'wallmedium');
    $imcigreat = wp_get_attachment_image_src( $ima, 'wallgreat');
    
  ?>
  <style type="text/css">
    .hero {
      background-image:none;
    }
    @media only screen and (min-width: 768px) {
      .hero {
        background-image:url('<?php echo $imcimedium['0']; ?>');
      }
    }
    @media only screen and (min-width: 1280px) {
      .hero {
        background-image:url('<?php echo $imcigreat['0']; ?>');
      }
    }
    @media only screen and (min-width: 1600px) {
      .hero {
        background-image:url('<?php echo $imci['0']; ?>');
      }
    }
  </style>  
  <section class="hero" role="banner">
    <!--div class="hero-content">
      <h1 class="hero-text">
          <?php the_title();  ?>
      </h1>
    </div-->
  </section> 
<?php elseif ( ( is_page() || is_singular('activity') || is_singular('package') || is_archive('activity-category')  )   ) :?>
  <?php
    $copt=get_option('cementlap_option_name');

    // $imci = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wallimg' ); 
    // $imcismall = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wallsmall' ); 
    // $imcimedium = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wallmedium' ); 
    // $imcigreat = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'wallgreat' ); 
    
    if (get_post_meta( $post->ID, '_meta_wallimg_id', true )){
      $ima = get_post_meta( $post->ID, '_meta_wallimg_id', true );
    } else {
      $ima =  48;
    }
    

    $imci = wp_get_attachment_image_src( $ima, 'wallimg');
    $imcismall = wp_get_attachment_image_src( $ima, 'wallsmall');
    $imcimedium = wp_get_attachment_image_src( $ima, 'wallmedium');
    $imcigreat = wp_get_attachment_image_src( $ima, 'wallgreat');
  ?>
  <!--style type="text/css">
    .hero {
       background-image:url('<?php echo $imcismall['0']; ?>');
    }
    @media only screen and (min-width: 768px) {
      .hero {
        background-image:url('<?php echo $imcimedium['0']; ?>');
      }
    }
    @media only screen and (min-width: 1280px) {
      .hero {
        background-image:url('<?php echo $imcigreat['0']; ?>');
      }
    }
    @media only screen and (min-width: 1600px) {
      .hero {
        background-image:url('<?php echo $imci['0']; ?>');
      }
    }
  </style-->  
  <section class="hero feles" role="banner">
    <div class="hero-content">
        <?php if (!is_archive()): ?>
          <h1 class="hero-text">
            <?php the_title();  ?><small><?php echo get_post_meta( $post->ID, '_meta_subtitle', true); ?></small>
          </h1>
          <div class="tag-list">
            <?php
              if (is_singular('package')) {
                  $terms=get_the_terms($post->ID, 'package-tag');
               } elseif (is_singular('activity')) {
                  $terms=get_the_terms($post->ID, 'activity-tag');
               }              
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
          <figure class="topill">
            <?php if (has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('small43');  ?>
            <?php else: ?>
              <img src="http://lorempixel.com/480/320" alt="<?php the_title(); ?>">
            <?php endif; ?>
          </figure>
        <?php else: ?>

          <?php if (is_tax('activity-category')): ?>
            <h1 class="hero-text">
              Activities in Budapest<small>Browse recommended activities</small>
            </h1>
            <aside class="topwidget">
              <h3>Not sure what to choose?</h3>
              <p>We've already collected the best activities in the city</p>
              <a href="?package-category=all-packages" class="btn">See our packages</a>
            </aside>
          <?php elseif (is_tax('package-category')): ?>
            <h1 class="hero-text">
              Program Packages in Budapest<small>Browse our packages</small>
            </h1>
            <aside class="topwidget">
              <h3>Need more customized weekends?</h3>
              <p>Check our activity list and choose the programs for your unique needs</p>
              <a href="?activity-category=all-activities" class="btn">See our activities</a>
            </aside>
          <?php endif; ?>

        <?php endif; ?>

    </div>
  </section> 
<?php endif; ?>

<?php /* if (is_archive()) : ?>
  <aside class="sidebar sidebar-topad" role="complementary">
    <?php dynamic_sidebar('sidebar-topad'); ?>
  </aside><!-- /.sidebar -->
<?php endif; */ ?>



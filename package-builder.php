<?php
/*
Template Name: Package Builder
*/
?>
<?php while (have_posts()) : the_post(); ?>
  <?php
    // if (get_post_meta( $post->ID, '_meta_wallimg_id', true )){
    //   $ima = get_post_meta( $post->ID, '_meta_wallimg_id', true );
    // } else {
    //   $ima =  48;
    // }
    // $imci = wp_get_attachment_image_src( $ima, 'wallimg');
    // $imcismall = wp_get_attachment_image_src( $ima, 'wallsmall');
    // $imcimedium = wp_get_attachment_image_src( $ima, 'wallmedium');
    // $imcigreat = wp_get_attachment_image_src( $ima, 'wallgreat');
  ?>
  <!--style type="text/css">
    .minihero {
       background-image:url('<?php echo $imcismall['0']; ?>');
    }
    @media only screen and (min-width: 768px) {
      .minihero {
        background-image:url('<?php echo $imcimedium['0']; ?>');
      }
    }
    @media only screen and (min-width: 1280px) {
      .minihero {
        background-image:url('<?php echo $imcigreat['0']; ?>');
      }
    }
    @media only screen and (min-width: 1600px) {
      .minihero {
        background-image:url('<?php echo $imci['0']; ?>');
      }
    }
  </style--> 
  <header class="minihero" role="banner">
    <div class="minihero-content">
      <h1 class="minihero-title">
        <?php the_title();  ?><small><?php echo get_post_meta( $post->ID, '_meta_subtitle', true); ?></small>
      </h1>
      <!--figure class="topill">
        <?php if (has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail('small43');  ?>
        <?php else: ?>
          <img src="http://lorempixel.com/480/320" alt="<?php the_title(); ?>">
        <?php endif; ?>
      </figure-->
      <div class="minihero-lead"><?php the_content(); ?></div>
    </div>
  </header>
  <ul class="nav nav-tabs numbered glass">
    <li class="active"><a href="#firstpanel" data-toggle="tab"><?php _e('Select activities','root') ?></a></li>
    <li><a href="#secondpanel" data-toggle="tab"><?php _e('Choose a hostel','root'); ?></a></li>
    <li><a href="#thirdpanel" data-toggle="tab"><?php _e('Send form','root'); ?></a></li>
  </ul>
  <div class="tab-content glass">
    
    <div class="tab-pane active fade in" id="firstpanel">
      <h3>Choose your activities</h3>
      <div id="#activity-chooser" class="activity-chooser">
        <?php 
          $the_activity=new WP_Query( array(
            'post_type' => array('activity' ),
            'posts_per_page' => -1
          ));
          $nop=$the_activity->post_count;
          $fele=round($nop / 2);
          $i=0;
        ?>
        <div class="col col-first">
          <?php while ($i++ < $fele)  : $the_activity->the_post(); ?>
            <?php get_template_part('templates/listitem','activity' ); ?>
          <?php endwhile; ?>
        </div>
        <div class="col col-second">
          <?php while ( $the_activity->have_posts() ) : $the_activity->the_post(); ?>
            <?php get_template_part('templates/listitem','activity' ); ?>
          <?php endwhile; ?>
        </div>
      </div>
    </div><!-- /.tab-pane -->
    
    <div class="tab-pane fade" id="secondpanel">
      <p>        Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas sed diam eget risus varius blandit sit amet non magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum id ligula porta felis euismod semper. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Cras mattis consectetur purus sit amet fermentum. Nulla vitae elit libero, a pharetra augue.</p>
    </div><!-- /.tab-pane -->
    <div class="tab-pane fade" id="thirdpanel">
      <p>
      Donec id elit non mi porta gravida at eget metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.
      </p>
    </div><!-- /.tab-pane -->
<?php endwhile; ?>

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
    </div>
  </header>
  <ul class="nav nav-tabs numbered glass">
    <li class="active"><a href="#firstpanel" data-toggle="tab"><?php _e('Select activities','root') ?></a></li>
    <li><a href="#secondpanel" data-toggle="tab"><?php _e('Choose a hostel','root'); ?></a></li>
    <li><a href="#thirdpanel" data-toggle="tab"><?php _e('Send form','root'); ?></a></li>
  </ul>
  <form class="form-horizontal builder-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
  <div class="tab-content glass">
    
    <div class="tab-pane active fade in" id="firstpanel">
      <h2 class="ctitle">Choose activities</h2>
      <hr>
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
        <div class="col-half col-first">
          <?php while ($i++ < $fele)  : $the_activity->the_post(); ?>
            <?php get_template_part('templates/listitem','activity' ); ?>
          <?php endwhile; ?>
        </div>
        <div class="col-half col-second">
          <?php while ( $the_activity->have_posts() ) : $the_activity->the_post(); ?>
            <?php get_template_part('templates/listitem','activity' ); ?>
          <?php endwhile; ?>
        </div>
      </div>
      <button class="btn" data-toggle="tab" href="#secondpanel">Next step<small>Choose accomodation</small></button>
    </div><!-- /.tab-pane -->
    
    <div class="tab-pane fade" id="secondpanel">
      <h2 class="ctitle">Select preferred accomodation</h2>
      <hr>
      <div id="#acc-chooser" class="acc-chooser">
        <?php 
          $the_acc=new WP_Query( array(
            'post_type' => array('accomodation'),
            'posts_per_page' => -1
          ));
          $nop=$the_acc->post_count;
          $fele=round($nop / 2);
          $i=0;
        ?>
        <div class="col-half col-first">
          <?php while ($i++ < $fele)  : $the_acc->the_post(); ?>
            <?php get_template_part('templates/listitem','accomodation' ); ?>
          <?php endwhile; ?>
        </div>
        <div class="col-half col-second">
          <?php while ( $the_acc->have_posts() ) : $the_acc->the_post(); ?>
            <?php get_template_part('templates/listitem','accomodation' ); ?>
          <?php endwhile; ?>
        </div>
      </div>
      <button class="btn" data-toggle="tab" href="#thirdpanel">Next step<small>Send form</small></button>
    </div><!-- /.tab-pane -->
    <div class="tab-pane fade" id="thirdpanel">
      <h2 class="ctitle">Add your details to send</h2>
      <hr>
      <?php get_template_part( 'templates/builder', 'details' ); ?>
    </div><!-- /.tab-pane -->
<?php endwhile; ?>

</div><!-- /.tab-content -->
</form>

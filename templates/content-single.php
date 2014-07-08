<?php while (have_posts()) : the_post(); ?>
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
    body {
      background-image:none;
    }
    @media only screen and (min-width: 768px) {
      body, body:before {
        background-image:url('<?php echo $imcimedium['0']; ?>');
      }
    }
    @media only screen and (min-width: 1280px) {
      body, body:before {
        background-image:url('<?php echo $imcigreat['0']; ?>');
      }
    }
    @media only screen and (min-width: 1600px) {
      body, body:before {
        background-image:url('<?php echo $imci['0']; ?>');
      }
    }
  </style>  
  <article <?php post_class(); ?>>

      <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php get_template_part('templates/entry-meta'); ?>
      </header>
            <figure class="entry-figure">
        <?php the_post_thumbnail('medium169'); ?>
      </figure>

      <div class="entry-content">
        <?php the_content(); ?>
      </div>
      <footer class="entry-footer">
        <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
      </footer>
      <?php // comments_template('/templates/comments.php'); ?>
    </div>
    <aside class="addcont">
      <?php echo do_shortcode(get_post_meta( $post->ID, '_meta_addcont', true )); ?>
    </aside>
  </article>
<?php endwhile; ?>

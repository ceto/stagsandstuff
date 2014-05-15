<?php while (have_posts()) : the_post(); ?>
  <?php
    $reference_ID=$post->ID; 
    $termik = array();
    $ures = array();
    $termlist=array_merge(
      get_the_terms( $post->ID, 'activity-category' )?get_the_terms( $post->ID, 'activity-category' ):$ures,
      get_the_terms( $post->ID, 'activity-tag' )?get_the_terms( $post->ID, 'activity-tag' ):$ures
    );
    $termlinks='';
    foreach ( $termlist as $term ) { 
      $termik[] = $term->slug;
      $termlinks .= '<a href="' . get_term_link( $term ) . '" title="' . sprintf(__('View all package filed under %s', 'root'), $term->name) . '">' . $term->name . '</a>';
    }
    $termes = join(" ", $termik );
  ?>
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
        <div class="tag-list">
          <?php echo $termlinks; ?>
        </div>
        <figure class="topill">
          <?php if (has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail('small43');  ?>
          <?php else: ?>
            <img src="http://lorempixel.com/480/320" alt="<?php the_title(); ?>">
          <?php endif; ?>
        </figure>
        <nav class="activity-pn">
            <ul>
              <li><?php previous_post_link( '%link', '<i class="ion-ios7-arrow-back"></i>', TRUE, ' ', 'product-category' ); ?> </li>
              <li><?php next_post_link( '%link', '<i class="ion-ios7-arrow-forward"></i>', TRUE, ' ', 'product-category' ); ?></li>
            </ul>
        </nav> 
      </div>
    </header>
<?php
  $termik = array();
  $termlist=get_the_terms( $post->ID, 'activity-category' );
  foreach ( $termlist as $term ) { $termik[] = $term->slug; }
  $termlist=get_the_terms( $post->ID, 'activity-tag' );
  foreach ( $termlist as $term ) { $termik[] = $term->slug; }
  $termes = join(" ", $termik );
?>
  <ul class="nav nav-tabs glass">
    <li class="active"><a href="#actpanel" data-toggle="tab"><?php _e('What to except','root') ?></a></li>
    <li><a href="#packpanel" data-toggle="tab"><?php _e('Enquire in package','root'); ?></a></li>
    <li><a href="#similarpanel" data-toggle="tab"><?php _e('Browse similar','root'); ?></a></li>
  </ul>
  <div class="tab-content glass">
    <div class="tab-pane active fade in" id="actpanel">
      <article id="activity-<?php echo $post->ID  ?>" <?php post_class($termes); ?> >
        <div class="activity-content">
          <?php the_content(); ?>
          <div class="activity-gtk">
            <h2><i class="icon-271"></i> Good to know</h2>
            <?php echo get_post_meta( $post->ID, '_meta_gtk', TRUE ); ?>
          </div>
          <div class="gombsor">
            <h3>Share with your Friends</h3>
            <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
          </div>
        </div>
        <div class="activity-addfavour">
          <form action="<?php echo get_stylesheet_directory_uri(); ?>/session-helper.php" method="post">
            <button class="btn" type="submit" data-loading-text="Adding..." name="act-toggle" id="act-toggle" value="<?php echo $post->ID ?>">
              <small>Create your own package</small>Add to favourites
            </button>
            <script>
              $('#act-toggle').click(function () {
                var btn = $(this);
                btn.button('loading');
                $.post(
                  btn.parent().attr('action'),
                  { 'act-toggle' : <?php echo $post->ID; ?> }
                ).always(function () {
                  btn.button('reset')
                });
                return false;
              });
            </script>
          </form>
          or select a premade <a href="#packpanel" data-toggle="tab">package</a>
        </div>

        <footer class="activity-footer">
          <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
        </footer>
      </article>
    </div><!-- /.tab-pane -->
    <div class="tab-pane fade" id="packpanel">
      <div class="pack-lead">
        <h2>Activity is available in package only</h2>
        <p>Ide kellene egy ütős felszólítás leaddel. Miszerint az aktivitás a csomagban elérhető, és a kedves delikvens válassza ki a számára legmegfelelőbb csomagot a lenti listából</p>
      </div>
      <section class="containing-packages">
        <?php 
          $the_package=new WP_Query( array(
            'post_type' => array('package' ),
            'meta_key' => '_meta_actlist',
            //'orderby' => '_meta_value_num',
            //'order' => 'ASC',
            'meta_query' => array(
               array(
                   'key' => '_meta_actlist',
                   'value' => array(get_the_id()),
                   'compare' => 'IN',
               )
            )
          ));
        ?>
        <?php while ( $the_package->have_posts() ) : $the_package->the_post(); ?>
          <?php get_template_part('templates/item','package' ); ?>
        <?php endwhile; ?>
      </section>
    </div><!-- /.tab-pane -->
    <div class="tab-pane fade" id="similarpanel">

      <div class="related-activities">
      <?php
        yarpp_related(
          array(
            // Pool options: these determine the "pool" of entities which are considered
            'post_type' => array('activity' ),
            'show_pass_post' => false, // show password-protected posts
            'past_only' => false, // show only posts which were published before the reference post
            'exclude' => array(), // a list of term_taxonomy_ids. entities with any of these terms will be excluded from consideration.
            'recent' => false, // to limit to entries published recently, set to something like '15 day', '20 week', or '12 month'.
            // Relatedness options: these determine how "relatedness" is computed
            // Weights are used to construct the "match score" between candidates and the reference post
            'weight' => array(
                'body' => 2,
                'title' => 1, // larger weights mean this criteria will be weighted more heavily
                'tax' => array(
                    'activity-category' => 1,
                    'activity-tag' => 3 // put any taxonomies you want to consider here with their weights
                )
            ),
            // Specify taxonomies and a number here to require that a certain number be shared:
            'require_tax' => array(
                'activity-tag' => 1 // for example, this requires all results to have at least one 'post_tag' in common.
            ),  
            // The threshold which must be met by the "match score"
            'threshold' => 5,

            // Display options:
            'template' => 'yarpp-related-tiles.php', // either the name of a file in your active theme or the boolean false to use the builtin template
            'limit' => 8, // maximum number of results
            'order' => 'score DESC'
          ),
          $reference_ID, // second argument: (optional) the post ID. If not included, it will use the current post.
          true
        ); // third argument: (optional) true to echo the HTML block; false to return it
      ?>
      </div>
    </div><!-- /.tab-pane --> 
  </div><!-- /.tab-content-->
<?php endwhile; ?>

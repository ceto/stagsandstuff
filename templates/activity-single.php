<?php while (have_posts()) : the_post(); ?>
<?php
  $termik = array();
  $termlist=get_the_terms( $post->ID, 'activity-category' );
  foreach ( $termlist as $term ) { $termik[] = $term->slug; }
  $termlist=get_the_terms( $post->ID, 'activity-tag' );
  foreach ( $termlist as $term ) { $termik[] = $term->slug; }
  $termes = join(" ", $termik );
?>
  <ul class="nav nav-tabs numbered">
    <li class="active"><a href="#actpanel" data-toggle="tab"><?php _e('What to except','root') ?></a></li>
    <li><a href="#packpanel" data-toggle="tab"><?php _e('Pre made packages for','root'); ?> <strong><?php the_title() ?></strong></a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active fade in" id="actpanel">
      <article id="activity-<?php echo $post->ID  ?>" <?php post_class($termes); ?> >
        <div class="activity-content">
          <?php the_content(); ?>  
        </div>
        <div class="gombsor">
          <a href="#" class="share-face"><i class="ion-social-facebook"></i><br /><span>Share</span></a>
          <a href="tel:+36209734344" class="call-phone"><i class="ion-iphone"></i><br /><span>+36.70.770.56.53</span></a>
          <a href="#" class="share-like"><i class="ion-thumbsup"></i><br /><span>Like It</span></a>
        </div>
        <figure class="activity-figure">
          <?php the_post_thumbnail('medium169') ; ?>
        </figure>
        <footer class="activity-footer">
          <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
        </footer>
         <nav class="activity-pn">
              <ul>
                <li><?php previous_post_link( '%link', '<i class="ion-ios7-arrow-back"></i>', TRUE, ' ', 'product-category' ); ?> </li>
                <li><?php next_post_link( '%link', '<i class="ion-ios7-arrow-forward"></i>', TRUE, ' ', 'product-category' ); ?></li>
              </ul>
          </nav> 
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
  </div><!-- /.tab-content-->

<?php endwhile; ?>

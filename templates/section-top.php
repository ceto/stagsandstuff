<?php if ( ( is_singular('post') )   ) :?>

<?php elseif ( ( !is_page_template('package-builder.php') && !is_page_template('tmpl-home.php') && !is_page_template('tmpl-gallery.php') &&  (is_page() || is_archive('activity-category'))  )   ) :?>
  <section class="hero feles" role="banner">
    <div class="hero-content">
        <?php if (!is_archive() ): ?>
          <h1 class="hero-text">
            <?php the_title();  ?><small><?php echo get_post_meta( $post->ID, '_meta_subtitle', true); ?></small>
          </h1>
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
              Build Your Own Package<small>Select activities to organize a unique weekend in Budapest</small>
            </h1>
            <aside class="topwidget">
              <h3><i class="ion-android-information"></i> Collect your favourites</h3>
              <p>Mark the activity, at the bottom right corner to add it to custom built package. Click enquire when it's done</p>
              <a href="<?php echo get_permalink(104); ?>" class="btn">Enquire custom package</a>
            </aside>
          <?php elseif (is_tax('package-category') || is_tax('package-tag') ): ?>
              <h1 class="hero-text">
                Program Packages in Budapest<small>Browse our packages</small>
              </h1>
              <aside class="topwidget">
                <h3>Need more customized weekends?</h3>
                <p>Check out the best activities and choose the programs for your unique needs</p>
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



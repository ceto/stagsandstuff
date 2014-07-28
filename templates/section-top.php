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
              Activities in Budapest<small>Browse and mark your favourites</small>
            </h1>
            <aside class="topwidget">
              <h3>Build Your Own Package</h3>
              <p>We offer the best activities in the city.  Mark your favourites to create a custom built package</p>
              <a href="<?php echo get_permalink(104); ?>" class="btn">Enquire selected activities</a>
            </aside>
          <?php elseif (is_tax('package-category')): ?>
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



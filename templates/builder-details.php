<div class="details-wrap">
    <div id="startpanel" class="brokielso">
      <h2 class="ctitle">Enquire Wished Activities</h2>
   
      <hr>
         <h3 class="csubtitle">Add your details</h3>

    <div class="leftfields">
      <div class="items">
        <label for="message_name">Name *</label>
        <input type="text" required placeholder="John Doe" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
      </div>
      <div class="items">
        <label for="message_name">E-mail *</label>
        <input type="email" required placeholder="name@example.com" id="message_name" name="message_name" value="<?php echo $_POST['message_name']; ?>">
      </div>
      <div class="items">
        <label for="message_tel">Phone</label>
        <input type="tel" placeholder="003612345678" id="message_tel" name="message_tel" value="<?php echo $_POST['message_tel']; ?>">
      </div>
    </div>
    <div class="rightfields">
      <div class="items">
        <label for="message_date">Date *</label>
        <input type="date" required id="message_date" name="message_date" value="<?php echo $_POST['message_date']; ?>">
      </div>
      <div class="items">
          <label for="message_text">Message</label>
          <textarea placeholder="Add any question here ..." rows="4" id="message_text" name="message_text"><?php echo $_POST['message_text']; ?></textarea>
      </div>
    </div>

    </div>


      <div id="secondpanel" class="broki">
        <?php 
          $the_acc=new WP_Query( array(
            'post_type' => array('accomodation'),
            'posts_per_page' => -1
          ));
          $nop=$the_acc->post_count;
          $fele=round($nop / 2);
          $i=0;
        ?>
        <h3 class="csubtitle">Choose a hostel</h3>
        <div id="#acc-chooser" class="acc-chooser">
        
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
    </div><!-- /.tab-pane -->

    <div id="firstpanel" class="broki">
        <?php 
          global $itercsi; 
          $the_activity=new WP_Query( array(
            'post_type' => array('activity' ),
            'posts_per_page' => -1
          ));

          $nop=count($_SESSION['actList']);
          $fele=round($nop / 2);
          $itercsi=0;
        ?>
      <h3 class="csubtitle">You have selected <?php echo $nop ?> activities</h3>
      <?php if ($nop>0): ?>
        <div id="#activity-chooser" class="activity-chooser">
          <div class="col-half col-first">
            <?php while ($itercsi < $fele)  : $the_activity->the_post(); ?>
              <?php get_template_part('templates/listitem','activity' ); ?>
            <?php endwhile; ?>
          </div>
          <div class="col-half col-second">
            <?php while ( $the_activity->have_posts() ) : $the_activity->the_post(); ?>
              <?php get_template_part('templates/listitem','activity' ); ?>
            <?php endwhile; ?>
          </div>
        </div>
      <?php endif ?>
      <p class="broki-helper">
        Need more? <a href="?activity-category=all-activities"> Browse all activities</a>
      </p>


    </div><!-- /.tab-pane -->




    <div class="actions">
      <input type="hidden" name="message_human" value="2">
      <input type="hidden" name="submitted" value="1">
      <input type="submit" class="btn submitbtn" value="<?php _e('Send form','roots'); ?>">
      <div class="oki">*Fields are required</div>
    </div>
</div>



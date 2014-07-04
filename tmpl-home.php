<?php
/*
Template Name: Home Template
*/
?>
<section class="hiw">
  <h2>How it works?</h2>
  
  <h3>We have pre-made packages with all the best and famous <strong>activities in Budapest</strong></h3>
  <p>If you like one of <strong><a href="#" tilte="Browse packages">our packages</a></strong>,
  just click to the <em>enquire button</em> and fill in the filelds,
  <strong>add your details</strong> and we send you the offer in the <strong>next 24 hours.</strong></p>
  
  <h3>Would you like to create <strong>your own Budapest program</strong> package? You can do it!</h3>
  <ol>
    <li>Browse among <strong><a href="#" title="Browse activities">our activities</a></strong> and <strong>mark activities</strong> you want!</li>
    <li>After collecting whished activities, <strong>click</strong> to our <em>Build you own package</em> button on the right hand side and let your journey begin!</li>
    <li><strong>Check up on</strong> selected items, <strong>choose the hostel</strong> you’d like to be accomodated and <strong>send the form</strong> to us with all your datas.</li>
    <li>We send you <strong>our offer</strong> in the next 24 hours.</li>
  </ol>
  
  <hr>

  <h2>Why choose us</h2>
  <h3>Best value in town</h3>
  <ul>
    <li>with the <a href="#" title="See available hostels">accomodation</a>,
        <strong>programs and events</strong> what we provide we are sure there is <strong>no better value in Budapest</strong></li>
    <li>not just accomodation and party but <strong>fully organized stay</strong> from the landing to the boarding</li>
    <li>whole time assistance</li>
    <li>accomodation in a wild range of different style int he very centre of the city, near the nig metro stations</li>
    <li>unique atmosphere of all the <strong>organized weekends</strong></li>
    <li>face the facts: <em>we are as good as you think we are</em></li>
    <li>all the <strong>staff members</strong> are young, open minded, <strong>local citizens</strong> with excellent english knowledge</li>
  </ul>
  <h3>Unique atmosphere</h3>
  <ul>
    <li>we are able to give personal attention to each guest</li>
    <li>sensible to new trends,</li>
    <li>we have the ability to give the best personal services and programs year by year</li>
  </ul>


 <hr>


 </section>

<section class="fresh-posts">
  <?php 
    $the_posts = new WP_Query(array(
      'post_type' => 'post',
      'posts_per_page' => 3
    ));
  ?>
  <?php while ($the_posts->have_posts()) : $the_posts->the_post(); ?>
    <?php get_template_part('templates/content','' ); ?>
  <?php endwhile; ?>


</section>

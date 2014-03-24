<?php if ( is_singular('activity') ) : ?>

  <?php
    wp_reset_query();
    $reference_ID = $post->ID; 
  ?>
  <aside class="related-activities">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#egyes" data-toggle="tab"><?php _e('Activities in the same category','root') ?></a></li>
      <li><a href="#kettes" data-toggle="tab"><?php _e('Similar activities','root') ?></a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active fade in" id="egyes">
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
            // 'weight' => array(
            //     'body' => 1,
            //     'title' => 2, // larger weights mean this criteria will be weighted more heavily
            //     'tax' => array(
            //         'post_tag' => 1,
            //         ... // put any taxonomies you want to consider here with their weights
            //     )
            // ),
            // Specify taxonomies and a number here to require that a certain number be shared:
            'require_tax' => array(
                'activity-category' => 1 // for example, this requires all results to have at least one 'post_tag' in common.
            ),  
            // The threshold which must be met by the "match score"
            'threshold' => 2,

            // Display options:
            'template' => 'yarpp-related-tiles.php', // either the name of a file in your active theme or the boolean false to use the builtin template
            'limit' => 8, // maximum number of results
            'order' => 'score DESC'
          ),
          $reference_ID, // second argument: (optional) the post ID. If not included, it will use the current post.
          true
        ); // third argument: (optional) true to echo the HTML block; false to return it
        ?>
      </div><!-- /.tab-pane -->
      <div class="tab-pane fade" id="kettes">
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
            // 'weight' => array(
            //     'body' => 1,
            //     'title' => 2, // larger weights mean this criteria will be weighted more heavily
            //     'tax' => array(
            //         'post_tag' => 1,
            //         ... // put any taxonomies you want to consider here with their weights
            //     )
            // ),
            // Specify taxonomies and a number here to require that a certain number be shared:
            'require_tax' => array(
                'activity-tag' => 1,
            ),  
            // The threshold which must be met by the "match score"
            'threshold' => 2,

            // Display options:
            'template' => 'yarpp-related-tiles.php', // either the name of a file in your active theme or the boolean false to use the builtin template
            'limit' => 8, // maximum number of results
            'order' => 'score DESC'
          ),
          $reference_ID, // second argument: (optional) the post ID. If not included, it will use the current post.
          true
        ); // third argument: (optional) true to echo the HTML block; false to return it
        ?>
      </div><!-- /.tab-pane -->
      

      </div>
  </aside>
<?php endif; ?>
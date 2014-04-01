<?php
/*
Template Name: Package Category List
*/
?>


<?php
  //global $query_string;
  //query_posts( $query_string . '&orderby=date&order=ASC&posts_per_page=-1' );
  $aktermterm_id = term_exists( get_query_var( 'term' ) );
  $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
  //$ima = get_tax_meta( $term_id ,'_meta_image');
  //$imci = wp_get_attachment_image_src( $ima[id], 'banner169');
  //$actual_term = get_term( $term_id, 'object' );
  $parent_term = ($term->parent==0)?$term:get_term($term->parent, get_query_var('taxonomy') );
  $child_terms = get_term_children( $parent_term->term_id, 'package-category' );
  //$term_children = get_term_children( $parent_term->term_id, 'object' );
  $copt=get_option('cementlap_option_name');
?>

<ul class="nav nav-tabs filtro filt-item glass" ata-filter-group="package-category">
  <li id="filter-<?php echo $term->slug; ?>" class="active">
    <a href="#" data-filter-value="*" class="filt-item-input" id="<?php echo $term->slug; ?>" class="selected">
        All
    </a>
  </li>
  <?php $filtlist=get_terms('package-category'); ?>
  <?php foreach ( $filtlist as $term ) {  ?>
    <?php if (!in_array($term->slug, array('all-packages')  ) ): ?>
    <li id="filter-<?php echo $term->slug; ?>">
      <a href="#" data-filter-value=".<?php echo $term->slug; ?>" class="filt-item-input" id="<?php echo $term->slug; ?>">
        <?php echo $term->name; ?>
      </a>
    </li>
    <?php endif; ?>
  
  <?php } ?>
</ul>
<div class="package-list ize-list">
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/item','package' ); ?>
  <?php endwhile; ?>
</div>
<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: Gabor Szabó <szabogabi@gmail.com>
*/ ?>

<?php if (have_posts()):?>
<div class="product-list">
	<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/square','activity' ); ?>
	<?php endwhile; ?>
</div><!-- /.product-list -->
<?php else: ?>
<h4><?php _e('No Results','root') ?></h4>
<?php endif; ?>

<div class="act-katt">

<form action="<?php echo get_stylesheet_directory_uri(); ?>/session-helper.php" method="post">
  <?php if (!in_array(get_the_id(), $_SESSION['actList']) ) : ?>
    <button class="mini-btn mini-notin" type="submit" name="act-toggle" value="<?php echo get_the_id(); ?>"></button>
    <?php else: ?>
    <button class="mini-btn mini-in" type="submit" name="act-toggle" value="<?php echo get_the_id(); ?>"></button>
    <?php endif; ?>
</form>

</div>
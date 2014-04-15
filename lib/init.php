<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots'),
  ));

  register_nav_menus(array(
    'secondary_navigation' => __('Secondary Navigation', 'roots'),
  ));


  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');
  // set_post_thumbnail_size(150, 150, false);
  // add_image_size('category-thumb', 300, 9999); // 300px wide (and unlimited height)
  
  add_image_size('wallfree', 1920, 9999);
  add_image_size('wallgreat', 1600, 9999);
  add_image_size('wallmedium', 1280, 9999);
  add_image_size('wallsmall', 768, 9999);


  add_image_size('medium169', 768, 432, true);

  add_image_size('small43', 480, 360, true);
  add_image_size('small34', 480, 640, true);

  add_image_size('slidefree', 9999, 1000, false);
    
  
  add_image_size('tiny43', 320, 240, true);
  
  add_image_size('petit11', 120, 120, true);




  // Add post formats (http://codex.wordpress.org/Post_Formats)
  // add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
  
  add_theme_support('post-formats', array('aside', 'gallery'));


  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');

// Backwards compatibility for older than PHP 5.3.0
if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }

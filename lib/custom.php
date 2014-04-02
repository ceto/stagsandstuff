<?php
/**
 * Custom functions
 */

/********* Custom Post Types for Activity Management ****************/


/**
 * Activity Custom Post Type Definition
*/
function create_activity() {
  $labels = array(
    'name' => 'Activities',
    'singular_name' => 'Activity',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Activity',
    'edit_item' => 'Edit Activity',
    'new_item' => 'New Activity',
    'all_items' => 'All Activities',
    'view_item' => 'View Activity',
    'search_items' => 'Search Activitys',
    'not_found' =>  'No Activities found',
    'not_found_in_trash' => 'No Activities found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Activities'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'activity' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'yarpp_support' => true,
    'supports' => array( 'title', 'editor', 'thumbnail' )
  ); 

  register_post_type( 'activity', $args );
}
add_action( 'init', 'create_activity' ); 

/********* END OF Custom Post Types for Activity Management ****************/


/********* Custom MetaBoxes for Activity Management ****************/

/**
 * Activity Metaboxes
*/
add_filter( 'cmb_meta_boxes', 'cmb_activity' );
function cmb_activity( array $meta_boxes ) {
  $prefix = '_meta_';

  $meta_boxes[] = array(
    'id'         => 'ameta',
    'title'      => 'Additional activity details',
    'pages'      => array( 'activity'), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => __( 'Activity subtitle', 'root' ),
        'desc' => __( 'Subtitle folowing main act. title ', 'root' ),
        'id'   => $prefix . 'subtitle',
        'type' => 'text',
      ),
      array(
        'name'    => __( 'Good to know', 'root' ),
        'desc'    => __( 'Add your additional content', 'root' ),
        'id'      => $prefix . 'gtk',
        'type'    => 'wysiwyg',
        'options' => array( 'textarea_rows' => 15, 'wpautop' => true ),
      ),
      array(
        'name' => __( 'Time', 'root' ),
        'desc' => __( 'Period of time', 'root' ),
        'id'   => $prefix . 'time',
        'type' => 'text_medium',
        // 'repeatable' => true,
      ),
      array(
        'name' => __( 'Guide', 'root' ),
        'desc' => __( 'description of guide info', 'root' ),
        'id'   => $prefix . 'guide',
        'type' => 'text_medium',
        // 'repeatable' => true,
      ),
      array(
        'name' => __( 'Fullscreen banner wallpaper', 'root' ),
        'desc' => __( 'Upload an image or enter a URL. (min: 1920×1280px)', 'root' ),
        'id'   => $prefix . 'wallimg',
        'type' => 'file',
        'save_id' => true, // save ID using true
        'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
      ),
      // array(
      //   'name'    => __( 'Unit', 'root' ),
      //   'desc'    => __( 'Please select a unit', 'root' ),
      //   'id'      => $prefix . 'unit',
      //   'type'    => 'radio_inline',
      //   'options' => array(
      //     array( 'name' => __( 'm<sup>2</sup>', 'root' ), 'value' => 'm2', ),
      //     array( 'name' => __( 'kg', 'root' ), 'value' => 'kg', ),
      //     array( 'name' => __( 'db', 'root' ), 'value' => 'db', ),
      //   ),
      // ),

    ),
  );
  return $meta_boxes;
}

/********* End of Custom MetaBoxes for Activity Management ****************/

/************* Custom Category for Activity Management *********/

add_action( 'init', 'create_activity_category', 0 );

function create_activity_category() {
  $labels = array(
    'name'              => __('Activity Category', 'root'),
    'singular_name'     => __('Activity Category', 'root'),
    'menu_name'         => __('Activity Category', 'root'),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'activity-category' ),
  );

  register_taxonomy( 'activity-category', array( 'activity' ), $args );
}

/************* Custom Tags for Activity Management *********/

add_action( 'init', 'create_activity_tag', 0 );

function create_activity_tag() {
  $labels = array(
    'name'              => __('Activity Tags', 'root'),
    'singular_name'     => __('Activity Tags', 'root'),
    'menu_name'         => __('Activity Tags', 'root'),
  );

  $args = array(
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'activity-tag' ),
  );

  register_taxonomy( 'activity-tag', array( 'activity' ), $args );
}





/********* Custom Post Types for Package Management ****************/


/**
 * Package Custom Post Type Definition
*/
function create_package() {
  $labels = array(
    'name' => 'Package',
    'singular_name' => 'Package',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Package',
    'edit_item' => 'Edit Package',
    'new_item' => 'New Package',
    'all_items' => 'All Package',
    'view_item' => 'View Package',
    'search_items' => 'Search Packages',
    'not_found' =>  'No Package found',
    'not_found_in_trash' => 'No Package found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Packages'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'package' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'yarpp_support' => true,
    'supports' => array( 'title', 'editor', 'thumbnail' )
  ); 

  register_post_type( 'package', $args );
}
add_action( 'init', 'create_package' ); 

/********* END OF Custom Post Types for Package Management ****************/


/********* Custom MetaBoxes for Package Management ****************/

/**
 * Package Metaboxes
*/
add_filter( 'cmb_meta_boxes', 'cmb_package' );
function cmb_package( array $meta_boxes ) {

  $prefix = '_meta_';
  $meta_boxes[] = array(
    'id'         => 'pmeta',
    'title'      => 'Additional package details',
    'pages'      => array( 'package'), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => __( 'Package subtitle', 'root' ),
        'desc' => __( 'Subtitle folowing main pack. title ', 'root' ),
        'id'   => $prefix . 'subtitle',
        'type' => 'text',
      ),
      array(
        'name' => 'Activities in the package',
        'desc' => 'Select activities',
        'id' => $prefix . 'actlist',
        'type' => 'multicheck',
        'options' => ss_all_activity()
      ),
      array(
        'name' => __( 'Fullscreen banner wallpaper', 'root' ),
        'desc' => __( 'Upload an image or enter a URL. (min: 1920×1280px)', 'root' ),
        'id'   => $prefix . 'wallimg',
        'type' => 'file',
        'save_id' => true, // save ID using true
        'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
      ),
    ),
  );
  return $meta_boxes;
}

/********* End of Custom MetaBoxes for Package Management ****************/

/************* Custom Category for Package Management *********/

add_action( 'init', 'create_package_category', 0 );

function create_package_category() {
  $labels = array(
    'name'              => __('Package Category', 'root'),
    'singular_name'     => __('Package Category', 'root'),
    'menu_name'         => __('Package Category', 'root'),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'package-category' ),
  );

  register_taxonomy( 'package-category', array( 'package' ), $args );
}

/************* Custom Tags for Package Management *********/

add_action( 'init', 'create_package_tag', 0 );

function create_package_tag() {
  $labels = array(
    'name'              => __('Package Tags', 'root'),
    'singular_name'     => __('Package Tags', 'root'),
    'menu_name'         => __('Package Tags', 'root'),
  );

  $args = array(
    'hierarchical'      => false,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'package-tag' ),
  );

  register_taxonomy( 'package-tag', array( 'package' ), $args );
}


/********* Custom Post Types for Accomodation Management ****************/


/**
 * Accomodation Custom Post Type Definition
*/
function create_accomodation() {
  $labels = array(
    'name' => 'Accomodation',
    'singular_name' => 'Accomodation',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Accomodation',
    'edit_item' => 'Edit Accomodation',
    'new_item' => 'New Accomodation',
    'all_items' => 'All Accomodation',
    'view_item' => 'View Accomodation',
    'search_items' => 'Search Accomodations',
    'not_found' =>  'No Accomodation found',
    'not_found_in_trash' => 'No Accomodation found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Accomodation'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'accomodation' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'yarpp_support' => true,
    'supports' => array( 'title', 'editor', 'thumbnail' )
  ); 

  register_post_type( 'accomodation', $args );
}
add_action( 'init', 'create_accomodation' ); 

/********* END OF Custom Post Types for Accomodation Management ****************/


/********* Custom MetaBoxes for Accomodation Management ****************/

/**
 * Accomodation Metaboxes
*/
add_filter( 'cmb_meta_boxes', 'cmb_accomodation' );
function cmb_accomodation( array $meta_boxes ) {
  $prefix = '_meta_';

  $meta_boxes[] = array(
    'id'         => 'pmeta',
    'title'      => 'Additional accomodation details',
    'pages'      => array( 'accomodation'), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => __( 'Some meta name', 'root' ),
        'desc' => __( 'description of this meta', 'root' ),
        'id'   => $prefix . 'cucu',
        'type' => 'text_medium',
        // 'repeatable' => true,
      ),
      array(
        'name' => __( 'Fullscreen banner wallpaper', 'root' ),
        'desc' => __( 'Upload an image or enter a URL. (min: 1920×1280px)', 'root' ),
        'id'   => $prefix . 'wallimg',
        'type' => 'file',
        'save_id' => true, // save ID using true
        'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
      ),
    ),
  );
  return $meta_boxes;
}

/********* End of Custom MetaBoxes for Accomodation Management ****************/


/********* Custom MetaBoxes for Pages and Posts ****************/

/**
 * Accomodation Metaboxes
*/
add_filter( 'cmb_meta_boxes', 'cmb_pp' );
function cmb_pp( array $meta_boxes ) {
  $prefix = '_meta_';

  $meta_boxes[] = array(
    'id'         => 'ppmeta',
    'title'      => 'Additional page/post details',
    'pages'      => array( 'page', 'post'), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    'fields'     => array(
      array(
        'name' => __( 'Post/page subtitle', 'root' ),
        'desc' => __( 'Subtitle folowing main title ', 'root' ),
        'id'   => $prefix . 'subtitle',
        'type' => 'text',
      ),
      array(
        'name' => __( 'Fullscreen banner wallpaper', 'root' ),
        'desc' => __( 'Upload an image or enter a URL. (min: 1920×1280px)', 'root' ),
        'id'   => $prefix . 'wallimg',
        'type' => 'file',
        'save_id' => true, // save ID using true
        'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
      ),
    ),
  );
  return $meta_boxes;
}

/********* End of Custom MetaBoxes for Accomodation Management ****************/

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once 'cmb/init.php';

}


add_filter('the_content', 'ceto_fix_shortcodes');
// Intelligently remove extra P and BR tags around shortcodes that WordPress likes to add
function ceto_fix_shortcodes($content){   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
}


/******* WP OPtions ******/
class CementlapSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Stags & Stuff Settings', 
            'manage_options', 
            'cementlap-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'cementlap_option_name' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Stags & Stuff Settings</h2>           
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'cementlap_option_group' );   
                do_settings_sections( 'cementlap-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'cementlap_option_group', // Option group
            'cementlap_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Stags & Stuff Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'cementlap-setting-admin' // Page
        );  

        add_settings_field(
            'ntd', 
            'Next Transport Date', 
            array( $this, 'ntd_callback' ), 
            'cementlap-setting-admin', 
            'setting_section_id'
        );
        add_settings_field(
            'subtitle', 
            'Advert Sub Title', 
            array( $this, 'subtitle_callback' ), 
            'cementlap-setting-admin', 
            'setting_section_id'
        );    

        add_settings_field(
            'button_text', // ID
            'Advert button text', // Title 
            array( $this, 'button_text_callback' ), // Callback
            'cementlap-setting-admin', // Page
            'setting_section_id' // Section           
        );

        add_settings_field(
            'button_url', // ID
            'Button url', // Title 
            array( $this, 'button_url_callback' ), // Callback
            'cementlap-setting-admin', // Page
            'setting_section_id' // Section           
        );       

   
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['ntd'] ) ) $new_input['ntd'] = sanitize_text_field( $input['ntd'] );
        if( isset( $input['subtitle'] ) ) $new_input['subtitle'] = sanitize_text_field( $input['subtitle'] );
        if( isset( $input['button_text'] ) ) $new_input['button_text'] = sanitize_text_field( $input['button_text'] );
        if( isset( $input['button_url'] ) ) $new_input['button_url'] = sanitize_text_field( $input['button_url'] );
        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print "Don't use long sentences below!";
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function ntd_callback()
    {
        printf(
            '<input type="text" id="ntd" name="cementlap_option_name[ntd]" value="%s" />',
            isset( $this->options['ntd'] ) ? esc_attr( $this->options['ntd']) : ''
        );
    }

    public function subtitle_callback()
    {
        printf(
            '<input type="text" id="subtitle" name="cementlap_option_name[subtitle]" value="%s" />',
            isset( $this->options['subtitle'] ) ? esc_attr( $this->options['subtitle']) : ''
        );
    }

    public function button_text_callback()
    {
        printf(
            '<input type="text" id="button_text" name="cementlap_option_name[button_text]" value="%s" />',
            isset( $this->options['button_text'] ) ? esc_attr( $this->options['button_text']) : ''
        );
    }

    public function button_url_callback()
    {
        printf(
            '<input type="text" id="button_url" name="cementlap_option_name[button_url]" value="%s" />',
            isset( $this->options['button_url'] ) ? esc_attr( $this->options['button_url']) : ''
        );
    }
}

if( is_admin() ) $cementlap_settings_page = new CementlapSettingsPage();


function ss_all_activity(){
  $the_query=new WP_Query( array(
    'post_type' => array('activity' ),
    'orderby' => 'title',
    'posts_per_page' => -1
  ));
  $actlist=array();
  while ( $the_query->have_posts() ) {
    $the_query->the_post();
    $actlist[get_the_id()]=get_the_title();
  }
  return $actlist;

}


function ss_modify_num_activity($query)
{
    if ($query->is_main_query() && $query->is_tax('activity-category') && !is_admin())
      $query->set('posts_per_page', -1);
      $query->set('orderby', 'title');
      $query->set('order', 'ASC');

}
 
add_action('pre_get_posts', 'ss_modify_num_activity');

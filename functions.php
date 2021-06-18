<?php

/* Dependecies
-------------------------------------------------------- */

//nav walker bootstrap4
require_once('assets/bs4navwalker.php');

// content width
if ( ! isset( $content_width ) ) $content_width = 1400;

/* Setup Theme
-------------------------------------------------------- */

if(! function_exists('cyb_setup_theme') ) {

  function cyb_setup_theme(){

      // add support titles
      add_theme_support("title-tag");

      // add theme feed links
      add_theme_support( 'automatic-feed-links' );

      // enable featured image
      add_theme_support("post-thumbnails");

      // create custom size images
      add_image_size('cyb_big', 1400, 800, true);
      add_image_size('cyb_quad', 600, 600, true);
      add_image_size('cyb_single', 800, 500, true);

      // create custom menus
      register_nav_menus(array(
        'header' => esc_html__('Header','cyb'),
      ));

      //load theme languages
      load_theme_textdomain( 'cyb', get_template_directory().'/languages');

  }

}

add_action('after_setup_theme', 'cyb_setup_theme');


/* Register Sidebars
-------------------------------------------------------- */

if(! function_exists('cyb_sidebars') ) {

  function cyb_sidebars(){
    register_sidebar(array(
      'name' => esc_html__('Primary','cyb'),
      'id' => 'primary',
      'description' => esc_html__('Main Sidebar','cyb'),
      'before_title' => '<h3>' ,
      'after_title' => '</h3>',
      'before_widget' => '<div class="widget my-5 %2$s clearfix">',
      'after_widget' => '</div>',

      )
    );
  }

}

add_action('widgets_init','cyb_sidebars');


/* Include javascript files
-------------------------------------------------------- */

if(! function_exists('cyb_scripts') ) {

  function cyb_scripts(){

    wp_enqueue_script('cyb-popper-js', get_template_directory_uri() .'/js/popper.min.js', array('jquery'),null ,true );
    wp_enqueue_script('cyb-bootstrap-js', get_template_directory_uri() .'/js/bootstrap.min.js', array('jquery'),null ,true );
    wp_enqueue_script('cyb-animatedModal-js', get_template_directory_uri() .'/js/animatedModal.min.js', array('jquery'),null ,true );
    wp_enqueue_script('cyb-smoothscroll-js', get_template_directory_uri() .'/js/smooth-scroll.polyfills.min.js', array('jquery'),null ,true );
    wp_enqueue_script('cyb-scripts-js', get_template_directory_uri() .'/js/scripts.js', array('jquery'),null ,true );

    if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 

  }

}

add_action('wp_enqueue_scripts', 'cyb_scripts');


/* Include css files
-------------------------------------------------------- */

if(! function_exists('cyb_styles') ) {

  function cyb_styles(){

    wp_enqueue_style('cyb-bootstrap-css', get_template_directory_uri() .'/css/bootstrap.min.css');
    wp_enqueue_style('cyb-font-awesome', get_template_directory_uri() .'/css/fontawesome/css/all.css');
    wp_enqueue_style('cyb-google-fonts-css', '//fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans&display=swap');
    wp_enqueue_style('cyb-animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css');
    wp_enqueue_style('cyb-style-default-css', get_template_directory_uri() .'/style.css');

  }

}

add_action('wp_enqueue_scripts', 'cyb_styles');


/* Add class to button submit
-------------------------------------------------------- */

function wpdocs_comment_form_defaults( $defaults ) {
  $defaults['class_submit'] = 'btn btn-primary btn-lg';
  return $defaults;
}

add_filter( 'comment_form_defaults', 'wpdocs_comment_form_defaults' );




/* Custom post types
-------------------------------------------------------- */


function cptui_register_my_taxes() {

  /**
   * Taxonomy: Home Visibilities.
   */

  $labels = [
    "name" => __( "Home Visibilities", "cyb" ),
    "singular_name" => __( "Home Visibility", "cyb" ),
  ];

  
  $args = [
    "label" => __( "Home Visibilities", "cyb" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'home_visibility', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "home_visibility",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "home_visibility", [ "page" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );


function cptui_register_my_taxes_home_visibility() {

  /**
   * Taxonomy: Home Visibilities.
   */

  $labels = [
    "name" => __( "Home Visibilities", "cyb" ),
    "singular_name" => __( "Home Visibility", "cyb" ),
  ];

  
  $args = [
    "label" => __( "Home Visibilities", "cyb" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'home_visibility', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "home_visibility",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
  ];
  register_taxonomy( "home_visibility", [ "page" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_home_visibility' );




/* Advanced Custom fields
-------------------------------------------------------- */

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}



function my_acf_add_local_field_groups() {

acf_add_local_field_group(array(
  'key' => 'group_5d97736c1e0ee',
  'title' => 'HOME TOP INFO 1',
  'fields' => array(
    array(
      'key' => 'field_5d97739b3562f',
      'label' => 'Info 1 title',
      'name' => 'info_1',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5d9773be35630',
      'label' => 'Info 1 subtitle',
      'name' => 'info_1_subtitle',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5d9773cf35631',
      'label' => 'Info 1 text',
      'name' => 'info_1_text',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => '',
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'page_type',
        'operator' => '==',
        'value' => 'front_page',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'left',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
));

acf_add_local_field_group(array(
  'key' => 'group_5d9774a6425da',
  'title' => 'HOME TOP INFO 2',
  'fields' => array(
    array(
      'key' => 'field_5d9774a64598c',
      'label' => 'Info 2 title',
      'name' => 'info_2',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5d9774a6459c4',
      'label' => 'Info 2 subtitle',
      'name' => 'info_2_subtitle',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5d9774a6459ed',
      'label' => 'Info 2 text',
      'name' => 'info_2_text',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => '',
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'page_type',
        'operator' => '==',
        'value' => 'front_page',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'left',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
));

acf_add_local_field_group(array(
  'key' => 'group_5d97766eddd24',
  'title' => 'HOME TOP INFO 3',
  'fields' => array(
    array(
      'key' => 'field_5d97766edfb97',
      'label' => 'Info 3 title',
      'name' => 'info_3',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5d97766edfbae',
      'label' => 'Info 3 subtitle',
      'name' => 'info_3_subtitle',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array(
      'key' => 'field_5d97766edfccf',
      'label' => 'Info 3 text',
      'name' => 'info_3_text',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => '',
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'page_type',
        'operator' => '==',
        'value' => 'front_page',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'left',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
));


}

add_action('acf/init', 'my_acf_add_local_field_groups');



/* Add cusromizer settings
-------------------------------------------------------- */

function cyb_customize_register($wp_customize){

  $wp_customize->add_section('cyb_logo',array(
    'title'=> __('Logo','cyb'),
    'description'=> __('Add your logo','cyb'),
    'priority' => 20
    )
  );

/* logo image */
  $wp_customize->add_setting('cyb_logo_image', array(
        'default' => '',
    )
  );

  $wp_customize->add_control(new Wp_Customize_Image_Control( $wp_customize, 'cyb_logo_image', array(
        'section' => 'cyb_logo',
        'label' =>  __('Logo image  (420px*100px)','cyb'),
        'settings' => 'cyb_logo_image',
    )
  ));

  $wp_customize->add_setting('cyb_logo_image_scroll', array(
        'default' => '',
    )
  );

  $wp_customize->add_control(new Wp_Customize_Image_Control( $wp_customize, 'cyb_logo_image_scroll', array(
        'section' => 'cyb_logo',
        'label' =>  __('Logo image on scroll (420px*100px)','cyb'),
        'settings' => 'cyb_logo_image_scroll',
    )
  ));

/* logo ALT text */
  $wp_customize->add_setting('cyb_logoalt_text', array(
        'default' => 'logo',
    )
  );

  $wp_customize->add_control('cyb_logoalt_text', array(
        'section' => 'cyb_logo',
        'label' =>  __('Logo ALT text','cyb'),
        'type' => 'text',
    )
  );


}

add_action('customize_register','cyb_customize_register');
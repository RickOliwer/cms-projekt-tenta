<?php

// WooCommerce
//require get_template_directory() . '/woocommerce/woocommerce-functions.php';
// WooCommerce END
//require dirname( __FILE__ ) . '/woocommerce/woocommerce-functions.php';
require dirname( __FILE__ ) . '/inc/contact-content.php';
require dirname( __FILE__ ) . '/inc/about-content.php';
require dirname( __FILE__ ) . '/inc/gmap.php';
require_once dirname( __FILE__ ) . '/inc/ajax-auth-function.php';



// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  wp_enqueue_script('fonts', 'https://kit.fontawesome.com/597b6f103f.js', [], false, false);

  // Compiled Bootstrap
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/lib/bootstrap.min.css'));
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/lib/bootstrap.min.css', array('parent-style'), $modified_bootscoreChildCss);

  // custom.js
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
  wp_enqueue_script('my-google-map-js', get_stylesheet_directory_uri() . '/inc/gmap.js', false, '', true);
}

// WooCommerce
require get_template_directory() . '/woocommerce/woocommerce-functions.php';


// acf-pro
//require get_template_directory_uri() . '/inc/acf-loader.php';
require dirname( __FILE__ ) . '/inc/acf-loader.php';

function rc_setup() {

      // add theme support for custom logo
      add_theme_support('custom-logo', [
          'height' => 50,
          'width' => 200,

      ]);
}
//endif;
add_action( 'after_setup_theme', 'rc_setup' );

function rc_navbar_logo(){
  $logo_id = get_theme_mod('custom_logo');
  $logo = wp_get_attachment_image_src($logo_id, 'full');

  if($logo){
      echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="logo md">';
  } else {
      echo get_bloginfo('name');
  }
}

// // Start functions here..
// function redirect_login_page() {
//     $login_page  = home_url( '/' );
//     $page_viewed = basename($_SERVER['REQUEST_URI']);
//     $path = explode('.php', $page_viewed);
//     $page_viewed = $path[0] . ".php";
//     if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
//       wp_redirect($login_page);
//       exit;
//     }
// }
// add_action('init','redirect_login_page');

// Hide default login
add_action('init', 'hide_login');

function hide_login() {
  if ( ! is_user_logged_in() ) {
    // Get current URL
    $current_url = str_replace('/', '', $_SERVER['REQUEST_URI'] );
    // Add URL Endpoint for new admin url
    $hiddenWpAdmin = 'new-secret-url';

    // Check if current URL is correct admin URL
    if ( $current_url == $hiddenWpAdmin ) {
      // Redirect user to new login file
      wp_redirect( '/'.$hiddenWpAdmin.'.php');
      exit;
    }

    $notAccessable = [
      'wp-admin',
      'wp-login.php'
    ];

    if ( in_array( $current_url, $notAccessable) && $_GET['action'] !== "logout") {
      wp_redirect('/404');
      exit;
    }
  }
}



  function rc_widgets_init() {

    // Product-nav
    register_sidebar(array(
      'name'          => esc_html__('Product Nav', 'bootscore'),
      'id'            => 'product-nav',
      'description'   => esc_html__('Add widgets here.', 'bootscore'),
      'before_widget' => '<div class="mb-4">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="h4">',
      'after_title'   => '</h2>',
    ));
    // Product-nav End

  }
  add_action('widgets_init', 'rc_widgets_init');



// // disable for posts
// add_filter('use_block_editor_for_post', '__return_false', 10);

// // disable for post types
// add_filter('use_block_editor_for_post_type', '__return_false', 10);


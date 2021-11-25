<?php

require dirname( __FILE__ ) . '/inc/contact-content.php';

require dirname( __FILE__ ) . '/inc/about-content.php';

// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles() {

  // style.css
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

  // Compiled Bootstrap
  $modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/lib/bootstrap.min.css'));
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/lib/bootstrap.min.css', array('parent-style'), $modified_bootscoreChildCss);

  // custom.js
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
}

// WooCommerce
require get_template_directory() . '/woocommerce/woocommerce-functions.php';


// acf-pro
//require get_template_directory_uri() . '/inc/acf-loader.php';
require dirname( __FILE__ ) . '/inc/acf-loader.php';



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

// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);


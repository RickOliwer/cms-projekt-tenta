<?php

// Define path and URL to the ACF plugin.
define( 'CMSP_ACF_PATH', get_stylesheet_directory() . '/inc/acf-pro/' );
define( 'CMSP_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf-pro/' );

// Include the ACF plugin.
include_once( CMSP_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'cmsp_acf_settings_url');
function cmsp_acf_settings_url( $url ) {
    return CMSP_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
//add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}
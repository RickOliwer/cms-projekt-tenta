<?php
function ajax_auth_init() {
    wp_register_script('validate-script', get_stylesheet_directory_uri() . '/js/jquery.validate.js', array('jquery') );
    wp_enqueue_script('validate-script');

    wp_register_script('ajax-auth-script', get_stylesheet_directory_uri() . '/js/ajax-auth.js', array('jquery') );

    wp_enqueue_script('ajax-auth-script');

    wp_localize_script('ajax-auth-script', 'ajax_auth_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Logging in, pls wait...')
    ));

    // Let user with no privileges call ajaxlogin
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login');

    // Let user with no privileges call ajaxregister
    add_action( 'wp_ajax_nopriv_ajaxregister', 'ajax_register');

}

if (!is_user_logged_in()) {
    add_action('init', 'ajax_auth_init');
}

function ajax_login() {
    check_ajax_referer( 'ajax-login-nonce', 'security');

    auth_user_login($_POST['username'], $_POST['password'], 'login');

    die();
}

function ajax_register() {
    // Check wp_nonce
    check_ajax_referer( 'ajax-register-nonce', 'security');

    // Get POST data
    $data = array();
    $data['user_nicename'] = $data['display_name'] = $data['user_login'] = $data['first_name'] = $data['nickname'] = sanitize_user($_POST['username']) ;
    $data['user_pass'] = sanitize_text_field($_POST['password']);
    $data['user_email'] = sanitize_email($_POST['email']);

    // Register user with POST data
    $user_register = wp_insert_user( $data );
    if ( is_wp_error($user_register) ) {
        $error = $user_register->get_error_codes();

        if(in_array('empty_user_login', $error))
        echo json_encode(array('loggedin'=>false, 'message'=>__($user_register->get_error_message('empty_user_login'))));
        elseif(in_array('existing_user_login',$error))
        echo json_encode(array('loggedin'=>false, 'message'=>__('This username is already registered.')));
        elseif(in_array('existing_user_email',$error))
        echo json_encode(array('loggedin'=>false, 'message'=>__('This email address is already registered.')));
        } else {
        auth_user_login($data['nickname'], $data['user_pass'], 'Registration');
    }
    die();

}

function auth_user_login($user_login, $password, $login) {
    $data = array();
    $data['user_login'] = $user_login;
    $data['user_password'] = $password;
    $data['remember'] = true;


    $user_signon = wp_signon( $data, '');
    if ( is_wp_error($user_signon) ) {
        echo json_encode(array('loggedin'=>false, 'message'=>__('Something went wrong')));
    }  else {
        wp_set_current_user($user_signon->ID);
        wp_set_auth_cookie($user_signon->ID);
        echo json_encode(array('loggedin'=>true, 'message'=>__($login.' successful, redirecting')));
    }
    die();
}
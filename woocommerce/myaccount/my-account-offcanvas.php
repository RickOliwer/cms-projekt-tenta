<?php

/**
 * Offcanvas Login / Registration and User Dashboard
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

?>

<?php if (is_user_logged_in()) { ?>
                <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
              <?php } else { get_template_part('ajax', 'auth'); ?>
                <a id="show_login" href="">Login</a>
                <a id="show_signup" href="">Signup</a>
              <?php } ?>
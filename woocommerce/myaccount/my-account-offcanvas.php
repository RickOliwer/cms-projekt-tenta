<?php

/**
 * Offcanvas Login / Registration and User Dashboard
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

?>

<?php if (is_user_logged_in()) { ?>

  <div class="account-salution">
    <p class="h2">
      <?php esc_html_e('Hello', 'bootscore'); ?> <?php global $current_user;
                                                  wp_get_current_user();
                                                  echo '' . $current_user->display_name . "\n";
                                                  ?>
    </p>
    <p><?php esc_html_e('Here you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.', 'bootscore'); ?></p>
  </div>

  <div class="navigation">
    <nav class="woocommerce-MyAccount-navigation" role="navigation">
      <div class="list-group mb-4">
        <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
          <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" class="list-group-item list-group-item-action"><?php echo esc_html($label); ?></a>
        <?php endforeach; ?>
      </div>
    </nav>
  </div>

<?php } ?>
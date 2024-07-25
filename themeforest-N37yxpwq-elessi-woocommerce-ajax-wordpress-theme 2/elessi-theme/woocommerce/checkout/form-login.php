<?php
/**
 * Checkout login form
 * 
 * @author  NasaTheme
 * @package Elessi-theme/WooCommerce
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

if (is_user_logged_in() || 'no' === get_option('woocommerce_enable_checkout_login_reminder')) :
    return;
endif;

?>
<div class="woocommerce-form-login-toggle">
    <?php wc_print_notice(apply_filters('woocommerce_checkout_login_message', esc_html__('Returning customer?', 'elessi-theme')) . ' <a href="#" class="showlogin">' . esc_html__('Click here to login', 'woocommerce') . '<svg width="30" height="30" viewBox="0 0 32 32"><path d="M15.233 19.175l0.754 0.754 6.035-6.035-0.754-0.754-5.281 5.281-5.256-5.256-0.754 0.754 3.013 3.013z" fill="currentColor"></path></svg></a>', 'notice'); ?>
</div>
<?php

woocommerce_login_form(
    array(
        'message'  => esc_html__('If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.', 'elessi-theme'),
        'redirect' => wc_get_checkout_url(),
        'hidden'   => true,
    )
);

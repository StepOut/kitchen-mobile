<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
global $woocommerce;

wc_print_notices(); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/bueno-my-account.js"></script>
<div class="my-account-header row">
	<div class="page-title col-md-4">
    	<h2>My Account</h2>
    </div>
    <div class="col-md-8">
    	<ul class="pull-right" id="account-page-menu">
        	<li id="display-my-account"><a href="<?php echo get_home_url(); ?>/my-account" class="active">My Account</a></li>
            <li id="display-saved-menu"><a href="<?php echo get_home_url(); ?>/saved-menu">Saved Menus</a></li>
            <li id="display-order-history"><a href="<?php echo get_home_url(); ?>/order-history">Order History</a></li>
            <li id="display-favorites"><a href="<?php echo get_home_url(); ?>/favorites">Favorites</a></li>
            <li><a href="<?php echo wp_logout_url( get_home_url() ); ?>">Sign Out</a></li>
        </ul>
    </div>
</div>
<div class="row" id="my-account-display">
</div>

<?php do_action( 'woocommerce_before_my_account' ); ?>

<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

<?php //wc_get_template('myaccount/my-saved-orders.php'); ?>

<?php //wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php do_action( 'woocommerce_after_my_account' ); ?>

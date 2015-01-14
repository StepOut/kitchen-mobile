<?php
/**
 * My saved Orders
 *
 * Shows saved orders on the account page
 *
 * @author 		Aditya
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>
<?php
global $woocommerce;

if(isset($_POST['remove-saved-menu']) && $_POST['user_key'] && $_POST['saved_cart_key'] && $_POST['saved_cart_value']){		
	do_action('bueno_remove_saved_cart');
}

?>
<div class="saved-orders">
	<header class="row">
		<div class="col-md-3"><?php _e( 'Menu Name', 'woocommerce' ); ?></div>
		<!--<div class="col-md-3"><?php //_e( 'Items', 'woocommerce' ); ?></div>-->
		<!--<div class="col-md-3"><?php //_e( 'Saved on', 'woocommerce' ); ?></div>-->
		<div class="col-md-2"><?php _e( 'Details', 'woocommerce' ); ?></div>
		<div class="col-md-1"><?php _e( 'Remove', 'woocommerce' ); ?></div>
	</header>
	<?php do_action('bueno_display_saved_orders'); ?>
</div>
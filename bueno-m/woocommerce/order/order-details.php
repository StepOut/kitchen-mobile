<?php
/**
 * Order details
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$order = wc_get_order( $order_id );
?>

<h3>
  <?php _e( 'Order Details', 'woocommerce' ); ?>
</h3>
<div class="shop_table order_details row">
  <div class="col-md-8 shop_table cart">
    <?php
		if ( sizeof( $order->get_items() ) > 0 ) {

			foreach( $order->get_items() as $item ) {
				$_product     = apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item );
				$item_meta    = new WC_Order_Item_Meta( $item['item_meta'], $_product );

				?>
    <div class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?> cart_item">
      <div class="product-name">
        <?php
							if ( $_product && ! $_product->is_visible() )
								echo apply_filters( 'woocommerce_order_item_name', $item['name'], $item );
							else
								echo apply_filters( 'woocommerce_order_item_name', sprintf( '%s',  $item['name'] ), $item );

							echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong>' . sprintf( '&times; %s', $item['qty'] ) . '</strong>', $item );

							$item_meta->display();

							if ( $_product && $_product->exists() && $_product->is_downloadable() && $order->is_download_permitted() ) {

								$download_files = $order->get_item_downloads( $item );
								$i              = 0;
								$links          = array();

								foreach ( $download_files as $download_id => $file ) {
									$i++;

									$links[] = '<small><a href="' . esc_url( $file['download_url'] ) . '">' . sprintf( __( 'Download file%s', 'woocommerce' ), ( count( $download_files ) > 1 ? ' ' . $i . ': ' : ': ' ) ) . esc_html( $file['name'] ) . '</a></small>';
								}

								echo '<br/>' . implode( '<br/>', $links );
							}
						?>
      </div>
      <div class="product-total"> <?php echo $order->get_formatted_line_subtotal( $item ); ?> </div>
      <div class="product-spcl-cmnt">
	  <?php
	  	/*if (!isset($_SESSION)) { session_start();}
	  	$product_id = $item['product_id'];
	   	echo $_SESSION['spcl_cmnt'][$product_id];*/
		?>
      </div>
    </div>
    <?php

				if ( $order->has_status( array( 'completed', 'processing' ) ) && ( $purchase_note = get_post_meta( $_product->id, '_purchase_note', true ) ) ) {
					?>
    <div class="product-purchase-note">
      <div colspan="3"><?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); ?></div>
    </div>
    <?php
				}
			}
		}

		do_action( 'woocommerce_order_items_table', $order );
		?>
  </div>
  <div class="col-md-4" id="cart-page-calc" style="border-style:dashed; border-radius: 5px; padding: 5px 10px;">
    <div class="cart-collaterals user-details">
  <header class="title"> <span>Order Summary</span> </header>
      <?php
		if ( $totals = $order->get_order_item_totals() ) foreach ( $totals as $total ) :
			?>
      <div class="cart_totals">
        <div scope="row"><?php echo $total['label']; ?>
        <span><?php echo $total['value']; ?></span> </div></div>
      <?php
		endforeach;
	?>
    </div>
  </div>
</div>
<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>
<?php endif; ?>
<div class="col-md-4 user-details">
  <header class="title"> <span>Billing Address</span> </header>
  <address>
  <?php
				if ( ! $order->get_formatted_billing_address() ) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_billing_address();
			?>
  </address>
</div>
<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) : ?>
<div class="col-md-4 user-details">
  <header class="title"> <span>Shipping Address</span> </header>
  <address>
  <?php
				if ( ! $order->get_formatted_shipping_address() ) _e( 'N/A', 'woocommerce' ); else echo $order->get_formatted_shipping_address();
			?>
  </address>
</div>
<!-- /.col-2 -->

<?php endif; ?>
<div class="col-md-4 user-details">
  <header class="title"> <span>Contact Details</span> </header>
  <address>
  Phone : <?php if ( $order->billing_email ) echo $order->billing_email; ?><br />
  Email:  <?php if ( $order->billing_phone ) echo $order->billing_phone; ?>
  </address>
</div>
<div class="clear"></div>
<style>
ul.order_details {
margin-top: 40px;
margin-bottom: 50px;
border: 1px dotted #424041;
padding: 10px;
}
</style>

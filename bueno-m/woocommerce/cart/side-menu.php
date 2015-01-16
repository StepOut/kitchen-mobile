<?php
/**
 * Side menu(cart) to display the selected items
 *
 * @author 		Aditya
 */
echo "<p>testing</p>";
?>
<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' );
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
		?>
		<div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
			<div class="product-name">
			<?php
				if ( ! $_product->is_visible() )
					echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
				else
					echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );
				// Meta data
				echo WC()->cart->get_item_data( $cart_item );
				// Backorder notification
               	if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
               		echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
			?>
			</div>
			<div class="product-price">
			<?php
				echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
			?>
			</div>
			<div class="product-quantity">
			<?php
				if ( $_product->is_sold_individually() ) {
					$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
				} 
				else { ?>
                <input type="button" class="add_quantity" value="+" id="<?php echo $cart_item_key; ?>" name="inc[<?php echo $cart_item_key; ?>][qty]">
                <input type="button" class="remove_quantity" value="-" id="<?php echo $cart_item_key; ?>" name="dec[<?php echo $cart_item_key; ?>][qty]">
				<?php
					$product_quantity = woocommerce_quantity_input( array(
						'input_name'  => "cart[{$cart_item_key}][qty]",
						'input_value' => $cart_item['quantity'],
						'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
						'min_value'   => '0'
					), $_product, false );
				}
				echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
			?>
            	<input class="test_quantity">
			</div>
			<div class="product-subtotal">
			<?php
				echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
			?>
			</div>
            <div class="product-remove">
			<?php
				echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
			?>
			</div>
		</div>
        
		<?php
		}
	}
	?>
</form>
<div class="side-menu-total">
<h4> Total: </h4><?php wc_cart_totals_subtotal_html(); ?>
</div>
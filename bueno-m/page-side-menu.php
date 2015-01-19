<?php
/*Template Name: Side Menu*/
/**
 * Side menu(cart) to display the selected items
 *
 * @author 		Aditya
 */
?>
<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<?php
global $woo_options;
global $woocommerce;

if(isset($_POST['cart']) && is_array($_POST['cart'])){
	$side_cart = $_POST['cart'];
	foreach($side_cart as $item_key => $item_value){
		foreach( $item_value as $qty_key => $qty_value){
     		ob_start();
     		$woocommerce->cart->set_quantity($item_key,$qty_value);
     		ob_get_clean();
		}
	}
}
?>
<?php do_action( 'woocommerce_before_cart' ); ?>

<div class="minicart-header" id="minicart-header-fixed">My Menu<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-view-cart-orange.png" /></div>
<div class="minicart-header" id="minicart-header-floating" style="display:none;">My Menu<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-view-cart-orange.png" /></div>
<div class="content-loader"></div>
<form action="<?php echo get_home_url(); ?>/side-menu" method="post" id="form-side-menu">
  <div class="cart-items-list" style="max-height:300px; overflow-y:auto; overflow-x:hidden;">
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
					echo apply_filters( 'woocommerce_cart_item_name', sprintf( '%s', $_product->get_title() ), $cart_item, $cart_item_key );
				// Meta data
				echo WC()->cart->get_item_data( $cart_item );
				// Backorder notification
               	if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
               		echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
			?>
      </div>
      <div class="product-remove">
        <?php
				echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">X</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
			?>
      </div>
      <br clear="all"/>
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
        <div class="qty-add">
          <input type="button" class="add_quantity" value="+" id="<?php echo $cart_item_key; ?>" name="inc[<?php echo $cart_item_key; ?>][qty]">
        </div>
        <div class="qty-remove">
          <input type="button" class="remove_quantity" value="-" id="<?php echo $cart_item_key; ?>" name="dec[<?php echo $cart_item_key; ?>][qty]">
        </div>
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
      </div>
      <br clear="all"/>
      <div>
        <?php
				
				//function bueno_display_product_serves_cart(){
					global $product, $woocommerce_loop;
					$attr_values = get_taxonomy( 'pa_serves');
					$term_values = get_the_terms( $product_id, 'pa_serves');
					if($attr_values && $term_values){
						foreach ( $attr_values as $attr_value ) {
							echo $attr_value->name;
						}
						foreach ( $term_values as $term_value ) {
							echo ' : '.$term_value->name;
						}
					}
				//}
				//bueno_display_product_serves_cart();

			?>
      </div>
      <div>
        <?php
				
				//function bueno_display_product_serves_cart(){
					global $product, $woocommerce_loop;
					$attr_values = get_taxonomy( 'pa_package-note');
					$term_values = get_the_terms( $product_id, 'pa_package-note');
					if($attr_values && $term_values){
						/*foreach ( $attr_values as $attr_value ) {
							echo $attr_value->name;
						}*/
						foreach ( $term_values as $term_value ) {
							echo $term_value->name;
						}
					}
				//}
				//bueno_display_product_serves_cart();

			?>
      </div>
    </div>
    <div class="product-subtotal">
      <?php
				//echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
			?>
    </div>
    <?php
		}
	}
	?>
  </div>
  <?php if( sizeof( WC()->cart->get_cart() ) > 0 ){?>
  <div id="cart-footer-floating">
  <div class="side-menu-total">
    <p> Total:
      <?php wc_cart_totals_subtotal_html(); ?>
    </p>
  </div>
  <a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" style="float:right;">
  <div class="btn-checkout" id="side-menu-proceed">Proceed</div>
  <br class="all" />
  <div id="side-menu-error">
    <p></p>
  </div>
  </a>
  <!--div class="btn-checkout" id="side-menu-view-items" style="margin-right:10px; display:none; cursor:pointer;">View Items</div-->
  </div>
  <?php }
else{
echo "<div class='mini-cart-empty'>Menu items selected will be added here</div>";
} ?>
  <input type="submit" class="button" name="proceed-to-checkout" value="<?php _e( 'Update', 'woocommerce' ); ?>" style="visibility:hidden;" />
  <div class="cart-collaterals" style="visibility:hidden;">
    <?php //do_action( 'woocommerce_cart_collaterals' ); ?>
    <?php //woocommerce_cart_totals(); ?>
    <?php //woocommerce_shipping_calculator(); ?>
    <?php //echo wc_cart_totals_order_total_html(); ?>
  </div>
</form>
<div class="text-uppercase" style="margin-top: 26px; background: #f05a28; color: #fff; padding: 5px 10px; border-radius: 4px;"> <span class="min-order-notice">Min. order Rs. <del>5,000</del> 999. Please place your order min. 24 Hrs. in advance.</span> </div>
<script type="text/javascript">
jQuery(document).on("click", "#side-menu-proceed", function(){
	jQuery("#side-menu-error").html('<p></p>');
	var stopLoop;
	jQuery(".cart_item.bundle_table_item .product-quantity .quantity input.qty").each(function(index, element) {
        if(jQuery(this).val() < 10){
			jQuery("#side-menu-error p").append('Min quantity required for'+jQuery(this).parents().eq(1).siblings(".product-name").html()+'is 10<br>');
			jQuery(this).parents().eq(2).css("border","1px dotted #F15A29");
			//jQuery(this).parents().eq(1).hasClass(".product-name").val();
			stopLoop = 1;
		}
		
    });
	
	//alert('test');
	
		if(stopLoop){
			return false;
		}

});
</script>
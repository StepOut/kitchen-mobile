<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */ ?>
<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
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
<?php //include('save-order.php');
		wc_get_template('cart/save-order.php'); ?>
<?php wc_print_notices(); ?>
<?php do_action( 'woocommerce_before_cart' ); ?>


<style>
body {
	background:none;
}
#datetimepicker3 {
	display: block !important;
}

</style>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/jquery.datetimepicker.css"/>

<div class="row">
  <?php
		/**
		* woocommerce_sidebar hook
		*
		* @hooked woocommerce_get_sidebar - 10
		*/
		//do_action( 'woocommerce_sidebar' );
		//get_sidebar('content-top');
	?>
  <h1>My Menu</h1>
  <form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post" id="form-cart">
  <div class="col-md-8">
    <?php do_action( 'woocommerce_before_cart_table' ); ?>
    <?php do_action('bueno_add_scripts_for_custom_data'); ?>
    <div class="shop_table cart" cellspacing="0">
      <div>
        <?php do_action( 'woocommerce_before_cart_contents' ); ?>
        <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						?>
        <div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
          <div class="product-name">
            <?php if ( ! $_product->is_visible() )
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
          
          <!--<div class="product-price">
							<?php //echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
							</div>-->
          <div class="product-subtotal"> <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?> </div>
          <div class="cart-product-remove">
            <?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">X</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
							?>
          </div>
          <div class="product-quantity">
            <?php if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								  } 
								  else {
									?>
            <div class="qty-add">
              <input type="button" class="add_quantity" value="+" id="<?php echo $cart_item_key; ?>" name="inc[<?php echo $cart_item_key; ?>][qty]">
            </div>
            <div class="qty-remove">
              <input type="button" class="remove_quantity" value="-" id="<?php echo $cart_item_key; ?>" name="dec[<?php echo $cart_item_key; ?>][qty]">
            </div>
            <?php $product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
										'min_value'   => '0'
								  	), $_product, false );
								  }

								  echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
								  ?>
          </div>
          <br clear="all">
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
          <?php if (!isset($_SESSION)) { session_start();} ?>
          <?php if(!($_SESSION['spcl_cmnt'][$product_id] == null)){
			  		$request = $_SESSION['spcl_cmnt'][$product_id];
				}/*
				else{
					$request = "Any Special Request?";
				}*/
			?>
          <textarea class="product-spcl-cmnt" placeholder="Any Special Request?" name="spcl-cmnt-<?php echo $cart_item['product_id']; ?>" id="<?php echo $cart_item_key; ?>"><?php echo $_SESSION['spcl_cmnt'][$product_id]; ?></textarea>
          
          <input type="hidden" value="<?php echo admin_url('admin-ajax.php'); ?>" name="admin-ajax-file-path">
          <input type="hidden" value="<?php echo $cart_item['product_id']; ?>" name="product-id">
          <input type="hidden" value="<?php echo $cart_item_key; ?>" name="product-key">
        </div>
        <?php
					//echo "comment". $woocommerce->cart->cart_contents[ $cart_item_key ]['spcl-cmnt'];
					}
				}

				do_action( 'woocommerce_cart_contents' );
				?>
        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
      </div>
    </div>
    <?php //do_action( 'woocommerce_after_cart_table' ); ?>
    <input type="submit" class="button" name="update_cart" id="update-cart" value="<?php _e( 'Update Menu', 'woocommerce' ); ?>" />
  </div>
  <div class="col-md-4">
  <div id="cart-page-calc">
  <div colspan="6" class="actions">
  <div class="order-summary lato-black-italic"> <span>Add a Service (Charges Extra)*</span> </div>

<form role="form">
  <div id="add-service">
  	<?php if (!isset($_SESSION)) { session_start();} ?>
    <label class="service">
    	<div class="select-service" <?php if(!($_SESSION['service_rqst']['helper'] == null)){ echo 'style="display:none;"'; } ?>><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/unselect-mark.png" /></div>
        <div class="unselect-service" <?php if($_SESSION['service_rqst']['helper'] == null){ echo 'style="display:none;"'; } ?>><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/select-mark.png" /></div>
      	<input type="hidden" value="helper" name="service">Helpers
    </label><br />
    <label class="service">
    	<div class="select-service" <?php if(!($_SESSION['service_rqst']['crockery'] == null)){ echo 'style="display:none;"'; } ?>><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/unselect-mark.png" /></div>
        <div class="unselect-service" <?php if($_SESSION['service_rqst']['crockery'] == null){ echo 'style="display:none;"'; } ?>><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/select-mark.png" /></div>
      	<input type="hidden" value="crockery" name="service">Crockery & Cutlery
    </label><br />
    <label class="service">
    	<div class="select-service" <?php if(!($_SESSION['service_rqst']['waiter'] == null)){ echo 'style="display:none;"'; } ?>><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/unselect-mark.png" /></div>
        <div class="unselect-service" <?php if($_SESSION['service_rqst']['waiter'] == null){ echo 'style="display:none;"'; } ?>><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/select-mark.png" /></div>
      	<input type="hidden" value="waiter" name="service">Waiters 
    </label><br />
    <label class="service">
    	<div class="select-service" <?php if(!($_SESSION['service_rqst']['warming'] == null)){ echo 'style="display:none;"'; } ?>><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/unselect-mark.png" /></div>
        <div class="unselect-service" <?php if($_SESSION['service_rqst']['warming'] == null){ echo 'style="display:none;"'; } ?>><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/select-mark.png" /></div>
      	<input type="hidden" value="warming" name="service">Warming Dishes
    </label>
  </div><br />
  <p><strong>*Confirm on call</strong></p>
</form>


</div>
</div>
<?php
if (!isset($_SESSION)) { session_start();}
?>
<div id="cart-page-calc">
  <div colspan="6" class="actions">
    <?php
				 if ( WC()->cart->coupons_enabled() ) { ?>
    <div class="coupon">
      <label for="coupon_code">
      	<?php _e( 'Apply Coupon Code <span>(if applicable)</span>', 'woocommerce' ); ?>
      </label>
      <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" />
      <input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply', 'woocommerce' ); ?>" />
      <?php do_action('woocommerce_cart_coupon'); ?>
    </div>
    
    <p>Delivery Date: <input type="text" id="datetimepicker3" placeholder="Please Select Date and Time" disabled/> </p>
    <?php } ?>
  </div>
  <div class="cart-collaterals">
    <?php //do_action( 'woocommerce_cart_collaterals' ); ?>
    <?php woocommerce_cart_totals(); ?>
    <?php //woocommerce_shipping_calculator(); ?>
  </div>
  
  <input type="submit" id="cart-proceed" class="checkout-button button alt wc-forward" name="proceed" value="<?php _e( 'Proceed to Checkout', 'woocommerce' ); ?>" disabled />
  <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
  <?php wp_nonce_field( 'woocommerce-cart' ); ?>
  <?php do_action( 'woocommerce_after_cart' ); ?>
</div>
</div>
</form>
<div class="col-md-4 pull-right">
  <?php $path_to_cart = get_home_url().'/cart';
		  $path_to_login = get_home_url().'/login'; ?>
  <form action="<?php if(is_user_logged_in()) { echo $path_to_cart; } else { echo $path_to_login; } ?>" method="post">
    <!-- sends data to save-order.php -->
    <?php if(is_user_logged_in()){ ?>
    <div class="save-cart">
      <input type="hidden" value="">
      <input type="submit" value="Save for Later" name="save-for-later" />
    </div>
    
    <?php } ?>
    <?php if(!(is_user_logged_in())){ ?>
    <div class="save-cart">
      <input type="hidden" value="">
      <input type="button" value="Save for Later" name="save-for-later" id="save-for-logged-out" />
      
    </div>
    <?php } ?>
      <div class="add-service"><a href="<?php echo get_home_url().'/order'; ?>">Add more items</a></div><br clear="all">
      <div id="login-for-save" style="display:none;">You need to <input type="submit" value="Login" name="from-save-for-later"> first, then you can save your order.</div>
    
  </form>
  
</div>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.datetimepicker.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bueno_datetimepicker.js"></script>
</div>

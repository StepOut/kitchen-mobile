<?
/* contains values used for ajax response
*/


function bueno_get_cart_subtotal() {
	global $woocommerce;
	
    $subtotal = $woocommerce->cart->subtotal;
	return $subtotal;
    
}


function bueno_get_cart_subtotal() {
	global $woocommerce;
	
	$shipping = $woocommerce->cart->shipping_total;
    $orderTotal = $woocommerce->cart->total;
}
?>
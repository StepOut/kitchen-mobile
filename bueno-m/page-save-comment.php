<?php
/*Template Name: Save Comment */
?>
<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<?php
global $woo_options;
global $woocommerce;
/*foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	$id = $cart_item['product_id'];
	$spcl_cmnt = 'spcl-cmnt-'.$id;
	//echo $id;
	
}*/
if(isset($_POST['spcl_cmnt']) && isset($_POST['id'])){
		echo $_POST['id'];
		echo $_POST['spcl_cmnt'];
		echo $_POST['key'];
		$product_id = $_POST['id'];
      	$spcl_cmnt =  $_POST['spcl_cmnt']; //This is User custom value sent via AJAX
	  	$product_key = $_POST['key'];
		if (!isset($_SESSION)) { session_start();}
	  	do_action('bueno_add_user_custom_data_options');
		
		global $woocommerce;
	  	//$cart_content = $woocommerce->cart->get_cart();
	  	//$cart_item_data = $cart_content[$product_key];

		//print_r($woocommerce->cart->get_cart());
	}
if(isset($_POST['service'])){
	$service_rqst = $_POST['service'];
	if (!isset($_SESSION)) { session_start();}
	/*if(!($_SESSION['service_rqst']==null)){
		$add_seperator = ",";
	}*/
	
	if(!($_SESSION['service_rqst'][$service_rqst] == null)){	
		$_SESSION['service_rqst'][$service_rqst] = null;
	}
	else{
		$_SESSION['service_rqst'][$service_rqst] = $service_rqst;
	}
	
}

if(isset($_POST['date'])){
	$order_date = $_POST['date'];
	if (!isset($_SESSION)) { session_start();}
	$_SESSION['order_date'] = $order_date;
}/*
if(isset($_POST['hours'])){
	$order_hour = $_POST['hours'];
	if (!isset($_SESSION)) { session_start();}
	$_SESSION['order_hours'] = $order_hour;
}
if(isset($_POST['minutes'])){
	$order_minute = $_POST['minutes'];
	if (!isset($_SESSION)) { session_start();}
	$_SESSION['order_minutes'] = $order_minute;
}
if(isset($_POST['day_time'])){
	$order_am_pm = $_POST['day_time'];
	if (!isset($_SESSION)) { session_start();}
	$_SESSION['order_day_time'] = $order_am_pm;
}*/
	
?>
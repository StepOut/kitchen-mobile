<?php
/**
 * Save Order
 *
 * Saves order
 *
 * @author 		Aditya
 */
 ?>

<?php //if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php

if(isset($_POST['save-for-later'])){
	if (is_user_logged_in()){
		do_action('bueno_save_cart');
		echo "<div class=\"woocommerce-error pull-left\">Your menu has been saved successfully.</div>";
	}
}
?>
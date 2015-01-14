<?php
/**
 * My Addresses
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Addresses', 'woocommerce' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => __( 'Billing Address', 'woocommerce' ),
		'shipping' => __( 'Shipping Address', 'woocommerce' )
	), $customer_id );
} else {
	$page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Address', 'woocommerce' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' =>  __( 'Billing Address', 'woocommerce' )
	), $customer_id );
}

$col = 1;
?>
<?php global $current_user;
	get_currentuserinfo();
	$firstname = $current_user->user_firstname;
	$lastname = $current_user->user_lastname;
	$email = $current_user->user_email;
	$phone = $current_user->user_mobileno;
	//$phone = $current_user->
?>
<?php //if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '<div class="col2-set addresses">'; ?>

<div class="row" id="account-address-details">
<?php foreach ( $get_addresses as $name => $title ) : ?>
	<?php if($name=='billing'): ?>
	<div class="col-md-4 user-details">
    
		<header class="title">
        	<span>User Details</span>
			<a href="<?php echo get_home_url().'/profile'; ?>" class="edit"><?php _e( 'Edit', 'woocommerce' ); ?></a>
		</header>
		<address>
        	<div class="user-name detail">
            	<span><?php //echo get_user_meta( $customer_id, $name . '_first_name', true ).' '.get_user_meta( $customer_id, $name . '_last_name', true );
				echo $firstname." ".$lastname; ?></span>
            </div>
            <div class="user-email detail">
            	<span><?php //echo get_user_meta( $customer_id, $name . '_email', true );
				echo $email; ?></span>
            </div>
            <!--<div class="user-phone detail">
            	<span><?php //echo get_user_meta( $customer_id, $name . '_phone', true );
				//echo $phone; ?></span>
            </div>-->
		</address>
	</div>    
    <?php endif;  ?>
    <div class="col-md-4 <?php echo $name; ?>-details">
		<header class="title">
        	<span><?php echo $title; ?></span>
			<a href="<?php echo wc_get_endpoint_url( 'edit-address', $name ); ?>" class="edit"><?php _e( 'Edit', 'woocommerce' ); ?></a>
		</header>
		<address>
        	<div class="user-address1 detail">
            	<span><?php if(!(get_user_meta( $customer_id, $name . '_address_1', true ) == null)){ echo get_user_meta( $customer_id, $name . '_address_1', true ); } else{ echo 'address line 1';} ?></span>
            </div>
            <div class="user-address2 detail">
            	<span><?php if(!(get_user_meta( $customer_id, $name . '_address_2', true ) == null)){ echo get_user_meta( $customer_id, $name . '_address_2', true ); } else{ echo 'address line 2';} ?></span>
            </div>
            <div class="user-city detail">
            	<span><?php if(!(get_user_meta( $customer_id, $name . '_city', true ) == null)){ echo get_user_meta( $customer_id, $name . '_city', true ); } else{ echo 'City';} ?></span>
            </div>
            <div class="user-state detail">
            	<span><?php if(!(get_user_meta( $customer_id, $name . '_state', true ) == null)){ echo get_user_meta( $customer_id, $name . '_state', true ); } else{ echo 'State';} ?></span>
            </div>
            <div class="user-postcode detail">
            	<span><?php if(!(get_user_meta( $customer_id, $name . '_postcode', true ) == null)){ echo get_user_meta( $customer_id, $name . '_postcode', true ); } else{ echo 'Postcode';} ?></span>
            </div>
		</address>
	</div>

<?php endforeach; ?>
</div>

<?php //if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '</div>'; ?>

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
	//$page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Addresses', 'woocommerce' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => __( 'Billing Address', 'woocommerce' ),
		'shipping' => __( 'Shipping Address', 'woocommerce' )
	), $customer_id );
} else {
	//$page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Address', 'woocommerce' ) );
	$get_addresses    = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' =>  __( 'Billing Address', 'woocommerce' )
	), $customer_id );
}

$col = 1;
?>
<style>.with_frm_style input[type="text"], .with_frm_style input[type="password"], .with_frm_style input[type="email"], .with_frm_style input[type="number"], .with_frm_style input[type="url"], .with_frm_style input[type="tel"], .with_frm_style select, .with_frm_style textarea, .frm_form_fields_style, .with_frm_style .frm_scroll_box .frm_opt_container, .frm_form_fields_active_style, .frm_form_fields_error_style, .with_frm_style .chosen-container-multi .chosen-choices, .with_frm_style .chosen-container-single .chosen-single{border:1px dotted #000; padding:12px 8px}
.with_frm_style .form-field input:focus, .with_frm_style select:focus, .with_frm_style textarea:focus, .with_frm_style .frm_focus_field input[type="text"], .with_frm_style .frm_focus_field input[type="password"], .with_frm_style .frm_focus_field input[type="email"], .with_frm_style .frm_focus_field input[type="number"], .with_frm_style .frm_focus_field input[type="url"], .with_frm_style .frm_focus_field input[type="tel"], .frm_form_fields_active_style, .with_frm_style .chosen-container-active .chosen-choices{box-shadow:none}
.clear{display:none}
.title_align{line-height:30px}
.px_align{margin-left:18px}
#edit-address-billing input[type="submit"]{background: none repeat scroll 0% 0% #F05A29;
height: 54px;
font-size: 16px;
color: #FFF;
cursor: pointer;
border: medium none;
width: 48.6%;
margin-left: 2px;
font-family:lato-regular;
-webkit-border-radius:0px;
-moz-border-radius:0px}
.with_frm_style .form-field{margin-bottom:11px}
#edit-address-billing select{padding: 9px 0px;
background: transparent;
border: 1px dotted #000}
.woocommerce form .form-row-first, .woocommerce form .form-row-last{width:49.55%}
</style>

<?php global $current_user;
	global $woocommerce;
	global $woo_options;
	get_currentuserinfo();
	$firstname = $current_user->user_firstname;
	$lastname = $current_user->user_lastname;
	$email = $current_user->user_email;
	$phone = $current_user->user_mobileno;
	//$phone = $current_user->
?>
<?php //if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '<div class="col2-set addresses">'; ?>

<div class="row" id="account-address-details">
	<div class="col-md-4 user-details">
    
		<header class="title">
        	<span class="title_align">Account Details</span>
		</header><div style="height:3px"></div>
		<?php echo FrmFormsController::get_form_shortcode(array('id' => 7, 'title' => false, 'description' => false)); ?>
	</div>
<?php foreach ( $get_addresses as $name => $title ) : ?>
	<?php if($name == 'billing'): ?>
    <div class="col-md-8 <?php echo $name; ?>-details">
		<header class="title">
        	<span class="title_align px_align">Billing Details</span>
			
		</header>
		<address>
        	<script type="text/javascript">
				jQuery(".<?php echo $name; ?>-details address").load("<?php echo get_home_url(); ?>/my-account/edit-address/<?php echo $name; ?> #edit-address-<?php echo $name; ?>");
			</script>            
		</address>
	</div>
    <?php endif; ?>
    

<?php endforeach; ?>
</div>

<?php //wc_get_template( 'myaccount/form-edit-address.php' ); ?>

<?php //if ( ! wc_ship_to_billing_address_only() && get_option( 'woocommerce_calc_shipping' ) !== 'no' ) echo '</div>'; ?>

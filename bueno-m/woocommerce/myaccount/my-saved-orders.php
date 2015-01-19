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
    <?php
	global $woocommerce;

  	// get user details
  	global $current_user;
  	get_currentuserinfo();
	
	$user_id = $current_user->ID;
	$userData = get_user_meta($user_id);
	$iteration = '0';
	 
	if(isset($_POST['menu-key']) && isset($_POST['menu-name'])){
		
		$menu_key = $_POST['menu-key'];
		$menu_name = $_POST['menu-name'];
		update_user_meta( $user_id, $menu_key, $menu_name);
	}
	
	
    foreach ($userData as $key => $value) {
  		if (preg_match("/^savedCart-([0-9]*)/", $key)):
			$iteration++ ;
		endif;
	}
	if($iteration == '0'){?>
			<p>You haven't saved any menu yet.</p>
    	<?php
		//break;
	}
	else{
		?>
    	<div class="col-md-3"><?php _e( 'Menu Name', 'woocommerce' ); ?></div>
		<!--<div class="col-md-3"><?php //_e( 'Items', 'woocommerce' ); ?></div>-->
		<div class="col-md-3"><?php _e( 'Saved on', 'woocommerce' ); ?></div>
		<div class="col-md-2"><?php _e( 'Details', 'woocommerce' ); ?></div>
		<div class="col-md-1"><?php _e( 'Remove', 'woocommerce' ); ?></div>
    	<?php
		//break;
	}
	?>
    
		
	</header>
	<?php do_action('bueno_display_saved_orders'); ?>
    <script type="text/javascript">
		//jQuery(document).on("submit", "input[name='menu-name']", function(e) {
//				/*jQuery(this).parents().eq(0).submit(function(e) {
//                    
//                });*/
//				alert(jQuery(this).siblings("input[name='menu-name-key']").val());
//				$.ajax({
//					type: 'POST',
//          			url: '',
//          			data: {
//						menu_name: jQuery(this).val(),
//						menu_key: jQuery(this).siblings("input[name='menu-name-key']").val()
//					},
//          			success: function(response, textStatus, jqXHR){
//            		}
//				});
//				
//		});
	</script>
    
</div>
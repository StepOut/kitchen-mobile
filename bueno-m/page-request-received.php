<?php
/*Template Name: Request Received*/
?>
<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

<?php get_header(); ?>


<?php
if(isset($_POST['request-name'])):
$request_name = $_POST['request-name'];
$request_number = $_POST['request-number'];

// invoke sms api for customer
$xmlcontent='<?xml version="1.0" ?>
<NICKSMS version="1.0">
<request userid="buenoapi" password="buenoapi710" pin="ai99" type="push">
<publishData>
<fromAddress>BUENOK</fromAddress>
<messageTxt>Hi '.$request_name.', thank you for your interest in Bueno. We have received your request, our Chef will call you soon!</messageTxt>
<addressArray>
<address>'.$request_number.'</address>
</addressArray>
</publishData>
<scheduleTime></scheduleTime>
</request>
</NICKSMS>';
$ch = curl_init("http://www.keepsmsing.com/myhome/RequestListener");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xmlcontent");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

// invoke sms api for chef
$xmlcontent='<?xml version="1.0" ?>
<NICKSMS version="1.0">
<request userid="buenoapi" password="buenoapi710" pin="ai99" type="push">
<publishData>
<fromAddress>BUENOK</fromAddress>
<messageTxt>Hi, a call back request received from '.$request_name.' with No. '.$request_number.'</messageTxt>
<addressArray>
<address>8826381005</address>
</addressArray>
</publishData>
<scheduleTime></scheduleTime>
</request>
</NICKSMS>';
$ch = curl_init("http://www.keepsmsing.com/myhome/RequestListener");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xmlcontent");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

$email_admin = "no-reply@bueno.kitchen";
$email_chef = "agoyal@stepoutsolutions.com";
$email_subject = "Call Back Request from {$request_name}";
$email_message .= "Hi,";
$email_message .= " a call-back request is received from {$request_name}, with contact no. {$request_number}";
$email_message .= "<br />";
$email_message .= "<table>";
$email_message .= "<br />";
$email_message .= "<tr><td><strong>Item name</strong></td><td><strong>Item price</strong></td><td><strong>Item quantity</strong></td><td><strong>Serves for</strong></td></tr>";
do_action( 'woocommerce_before_cart_table' );
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$email_message .="<tr>";
		$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$email_message .= "<td>";
				if ( ! $_product->is_visible() )
					/*echo*/ $email_message .= apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
				else
					/*echo*/ $email_message .= apply_filters( 'woocommerce_cart_item_name', sprintf( '%s', $_product->get_title() ), $cart_item, $cart_item_key );
				// Meta data
				/*echo*/ $email_message .= WC()->cart->get_item_data( $cart_item );
				$email_message .= "</td>";
				// Backorder notification
               	if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
               		/*echo*/ $email_message .= '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
				$email_message .= "<td>";
			 /*echo*/ $email_message .= apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); 
			 	$email_message .= "</td>";
			 	$email_message .= "<td>";
				if ( $_product->is_sold_individually() ) {
					$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
				} 
				else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0'
								), $_product, false );
				}
				/*echo*/ $email_message .= apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
				$email_message .= "</td>";
				$email_message .= "<td>";
				//function bueno_display_product_serves_cart(){
					global $product, $woocommerce_loop;
					$attr_values = get_taxonomy( 'pa_serves');
					$term_values = get_the_terms( $product_id, 'pa_serves');
					if($attr_values && $term_values){
						foreach ( $attr_values as $attr_value ) {
							/*echo*/ $email_message .= $attr_value->name;
						}
						foreach ( $term_values as $term_value ) {
							/*echo*/ $email_message .= ' : '.$term_value->name;
						}
					}
				$email_message .= "</td>"; 
		}
		$email_message .="</tr>";
	}
$email_message .= "</table>";

$headers =  'From: '.$email_admin."\r\n". 
			'Reply-To: '.$email_admin."\r\n" . 
			'X-Mailer: PHP/' . phpversion().		
			"MIME-Version: 1.0\r\n".		
			"Content-Type: text/html; charset=ISO-8859-1\r\n".
			"CC: schaturvedi@stepoutsolutions.com, puneet@bueno.co.in, puneetjain238@gmail.com, vipul@bueno.co.in, vipularora86@gmail.com";
@mail($email_chef, $email_subject, $email_message, $headers);
endif;
?>
<style>
.wid{ padding:10px 35px}
.by_side{margin-left:10px;padding:10px 45px}
.page-wrapper{ background:#fff}</style>
   
    	<div class="main-container" id="page-container"><!-- contains the full width main content area -->
    		<div class="main-container"><!-- horizontal full width section in main content area -->
    			<div class="box-layout container-fluid"><!-- boxed layout of main content horizontal section -->
           			<div class="row">
               			<div class="col-md-12"><!-- Main content  -->
                        	<?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                			<article class="<?php post_class(); ?>" id="post-<?php the_ID(); ?>">
    						</article><!-- #01-->
                            <h2>Thank you!</h2>
                            <p class="intro">Your request for a call has been registered.<br />
							We’ll get in touch real soon!</p>
                            <div class="row">
                           <div class="col-md-8" style="border-top:1px dotted #424041;"><br/>
<a href="<?php echo get_home_url(); ?>/order" class="btn-orange wid">Continue Browsing</a>
<a href="<?php echo get_home_url(); ?>/cart" class="btn-orange by_side">Go to my Menu</a>
</div>
                            <?php endwhile; ?>
                		</div>
            		</div><!-- end of row -->
        		</div><!-- end of boxed layout main content horizontal section -->
    		</div><!-- end of horizontal full width section in main content area -->
    	</div><!-- end of full width main content area -->
        <!-- footer area of page -->
		<?php get_footer(); ?>
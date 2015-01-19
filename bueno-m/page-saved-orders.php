<?php
/**
 * Template Name: Saved Orders
 *
 * @author 	Aditya
 */
 ?>
<?php
global $woocommerce;

if(isset($_POST['view-saved-menu']) && $_POST['user_key'] && $_POST['saved_cart_key']){
	$cart_key = $_POST['saved_cart_key'];
	$user_key = $_POST['user_key'];
	
	do_action('bueno_restore_saved_cart');
	
	global $woocommerce; 
	//wp_redirect(home_url());
	header('Location: cart');
	exit;	
}

?>
<?php get_header(); ?> 
  
    	<div class="main-container" id="page-container"><!-- contains the full width main content area -->
    		<div class="main-container"><!-- horizontal full width section in main content area -->
    			<div class="box-layout container-fluid"><!-- boxed layout of main content horizontal section -->
           			<div class="row">
               			<div class="col-md-12 col-xs-12"><!-- Main content  -->
                        	<?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                			<article class="<?php post_class(); ?>" id="post-<?php the_ID(); ?>">
    						</article><!-- #01-->
                            <?php endwhile; ?>
                            <div class="my-account-header row">
								<div class="page-title col-md-4">
    								<h2>My Saved Menus</h2>
    							</div>
							</div>
                            <?php wc_get_template('myaccount/my-saved-orders.php'); ?>
                		</div>
            		</div><!-- end of row -->
        		</div><!-- end of boxed layout main content horizontal section -->
    		</div><!-- end of horizontal full width section in main content area -->
    	</div><!-- end of full width main content area -->
        <!-- footer area of page -->
		<?php get_footer(); ?>

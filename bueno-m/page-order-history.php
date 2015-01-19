<?php
/**
 * Template Name: Order History
 *
 * @author 	Aditya
 */
 ?>
<?php get_header(); ?>
<?php
global $woocommerce;
?>    
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
    								<h2>My Account</h2>
    							</div>
    							<div class="col-md-8">
    								<ul class="pull-right" id="account-page-menu">
        								<li id="display-my-account"><a href="<?php echo get_home_url(); ?>/my-account">My Account</a></li>
            							<li id="display-saved-menu"><a href="<?php echo get_home_url(); ?>/saved-menu">Saved Menus</a></li>
            							<li id="display-order-history"><a href="<?php echo get_home_url(); ?>/order-history" class="active">Order History</a></li>
                                    	<li id="display-favorites"><a href="<?php echo get_home_url(); ?>/favorites">Favorites</a></li>
            							<li><a href="<?php echo wp_logout_url( get_home_url() ); ?>">Sign Out</a></li>
        							</ul>
    							</div>
							</div>
                            <?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>
                		</div>
            		</div><!-- end of row -->
        		</div><!-- end of boxed layout main content horizontal section -->
    		</div><!-- end of horizontal full width section in main content area -->
    	</div><!-- end of full width main content area -->
        <!-- footer area of page -->
		<?php get_footer(); ?>

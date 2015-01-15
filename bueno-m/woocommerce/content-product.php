<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<?php if(is_shop() || is_product()){ ?>
<!-- product tile -->
<li <?php post_class( $classes ); ?> id="bueno-product-tiles">
  <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
  <div class="col-md-6">
    <div class="food-label">
      <?php
			$term_values = get_the_terms( $product->id, 'pa_preference');
			if($term_values){
				foreach ( $term_values as $term_value ) {
        			if($term_value->name == 'Veg'){
						echo '<div class="veg"></div>';
            		}
					else
						echo '<div class="non-veg"></div>';
				}
			}
		?>
    </div>
    <div class="product-image">
      <?php
			/**
			 * shows product image
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );
		?>
    </div>
    <div class="product-social-links">
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <h3>
        <?php the_title(); ?>
      </h3>
      <?php
			/**
			 * bueno_product_desc_after_title
			 * shows product description
			 */
			 
			do_action( 'bueno_product_desc_after_title' );
		?>
    </div>
    <!--<div class="content-loader"></div>-->
    <div class="row">
      <div class="other-product-details">
        <?php
				/**
			 	* bueno_product_preparation_time hook
				 *
			 	*/
				//echo '<span class="prep-time">Preperation Time';
				//do_action( 'bueno_product_prep_time' );
				//echo "</span>";
			?>
        <br />
        <!--<span class="view-recipe">View Recipe</span> <br />-->
        <?php
				/**
			 	* bueno_other_product-serves hook
				 *
			 	*/
				do_action( 'bueno_product_serves' );
			?>
        <br />
        <?php
				/**
			 	* woocommerce_after_shop_loop_item_title hook
			 	*
			 	* @hooked woocommerce_template_loop_rating - 5
			 	* @hooked woocommerce_template_loop_price - 10
			 	*/
				do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
             	
      </div>
      
      <div class="wrapper-add-to-cart">
      	
        <?php 
			/**
		 	* shows 'add to cart'
		 	*/
		 	do_action( 'woocommerce_after_shop_loop_item' );
		?>
      </div>
    </div>
  </div> 
</li>
<!-- end of product tile -->
<?php } ?>

<!-- package tile -->
<?php
	$term_values = get_the_terms( $product->id, 'pa_package-cuisine');
	if($term_values){
		foreach ( $term_values as $term_value ) {
        	if($term_value->name == 'American'){
				$color = 'green-tile';
			}
			elseif($term_value->name == 'European'){
				$color = 'blue-tile';
			}
			elseif($term_value->name == 'Middle Eastern'){
				$color = 'orange-tile';
			}
			elseif($term_value->name == 'Indian'){
				$color = 'pink-tile';
			}
			elseif($term_value->name == 'Asian'){
				$color = 'red-tile';
			}
		}
	}
	if($color){
		$classes[] = $color;
	}
?>
<?php if(is_product_category('package')){ ?>
<li <?php post_class( $classes ); ?> id="bueno-package-tiles">
	<div class="row" id="card">
  		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
  		<div class="col-md-12 front">
      		<h3>
        	<?php the_title(); ?>
      		</h3>
  
  			<div class="col-md-6">
    			<!--<div class="package-type">
      			<?php
				/*$term_values = get_the_terms( $product->id, 'pa_type-of-package');
				if($term_values){
					foreach ( $term_values as $term_value ) {
        				echo $term_value->name;
					}
				}*/
				?>
    			</div>-->
    			<?php
				/**
			 	* bueno_other_product-serves hook
				 *
			 	*/
				//do_action( 'bueno_product_serves' );
				?>
                <div class="package-price">
                <!--<span>Serves 10</span>
    			<span class="seperator">|</span>-->
    			<?php
				/**
			 	* woocommerce_after_shop_loop_item_title hook
			 	*
			 	* @hooked woocommerce_template_loop_rating - 5
			 	* @hooked woocommerce_template_loop_price - 10
			 	*/
				do_action( 'woocommerce_after_shop_loop_item_title' );
				?>
                <?php echo ' / pax'; ?><br />
                <?php echo 'Minimum 10 pax'; ?>
                </div>
    			<div class="product-social-links">
    			<?php
				if(is_user_logged_in()){
					echo do_shortcode('[yith_wcwl_add_to_wishlist]');
				}
				if(!(is_user_logged_in())){ ?>
					<form action="<?php echo get_home_url(); ?>/login" method="post">
                    	<a href="#" class="add_to_wishlist pull-left" id="add-fav-logged-out"><div class="pull-left">Add to Favorites</div></a><br clear="all">
                        <div id="login-for-fav" style="display:none;">You need to <input type="submit" name="from-add-fav-pax" value="Login"> to add to favorites</div>
                    </form>
				<?php } ?>
  				</div>
  			</div>
  			<div class="col-md-6">
            	<a href="<?php echo get_home_url(); ?>/favorites/">
      			</a>
     			<div class="wrapper-add-to-cart">
      			<?php 
				/**
		 		* shows 'add to cart'
		 		*/
		 		do_action( 'woocommerce_after_shop_loop_item' );
				?>
      			</div>
                <div class="view-package-back"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon-view-package.png" /></div>
  			</div>
  		</div>
        <div class="col-md-12 back">
        	<header class="package-title">
            	<?php the_title(); ?>
                <div class="food-label">
      			<?php
					$term_values = get_the_terms( $product->id, 'pa_preference');
					if($term_values){
						foreach ( $term_values as $term_value ) {
        					if($term_value->name == 'Veg'){
								echo '<div class="veg"></div>';
            				}
							else
								echo '<div class="non-veg"></div>';
						}
					}
				?>
    			</div>
            </header>
            <div class="package-detail">
            	<div class="col-md-12">
                	<?php
						/**
			 			* bueno_product_desc_after_title
			 			* shows product description
			 			*/
			 
						do_action( 'bueno_product_desc_after_title' );
					?>
                </div>
            	<div class="col-md-6">
    				<?php
					/**
			 		* bueno_other_product-serves hook
				 	*
			 		*/
					//do_action( 'bueno_product_serves' );
					?>
    				<div class="package-price">
                		<span>Serves 10</span>
    					<span class="seperator">|</span>
    					<?php
				/**
			 	* woocommerce_after_shop_loop_item_title hook
			 	*
			 	* @hooked woocommerce_template_loop_rating - 5
			 	* @hooked woocommerce_template_loop_price - 10
			 	*/
						do_action( 'woocommerce_after_shop_loop_item_title' );
						?>
                		</div>
    				<div class="product-social-links">
    				<?php
				if(is_user_logged_in()){
					echo do_shortcode('[yith_wcwl_add_to_wishlist]');
				}
				if(!(is_user_logged_in())){ ?>
					<form action="<?php echo get_home_url(); ?>/login" method="post">
                    	<a href="#" class="add_to_wishlist pull-left" id="add-fav-logged-out"><div class="pull-left">Add to Favorites</div></a><br clear="all">
                        <div id="login-for-fav" style="display:none;">You need to <input type="submit" name="from-add-fav-pax" value="Login"> to add to favorites</div>
                    </form>
				<?php } ?>
  					</div>
  				</div>
  				<div class="col-md-6">
                	<a href="<?php echo get_home_url(); ?>/favorites/">
      				</a>
     				<div class="wrapper-add-to-cart">
      				<?php 
					/**
		 			* shows 'add to cart'
		 			*/
		 			do_action( 'woocommerce_after_shop_loop_item' );
					?>
      				</div>
                    <div class="view-package-front"><img src="<?php echo get_stylesheet_directory_uri() ; ?>/images/icon-view-package-orange.png" /></div>
  				</div>
            </div>
        </div>
	</div>
</li>
<?php }?>
<!-- end of package tile -->
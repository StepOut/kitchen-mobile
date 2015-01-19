<?php
/*Template Name: My account*/
?>
<?php defined('ABSPATH') or die("No script kiddies please!"); ?>
<?php
global $woo_options;
global $woocommerce;
?>
		<?php get_header(); ?>
    
    	<div class="main-container" id="page-container"><!-- contains the full width main content area -->
    		<div class="main-container main-content-wrapper"><!-- horizontal full width section in main content area -->
    			<div class="box-layout container-fluid"><!-- boxed layout of main content horizontal section -->
           			<div class="row">
               			<div class="col-md-12 col-xs-12"><!-- Main content  -->
                        	<?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                			<article class="<?php post_class(); ?>" id="post-<?php the_ID(); ?>">
    						</article><!-- #01-->
                            <?php endwhile; ?>
                		</div>
            		</div><!-- end of row -->
        		</div><!-- end of boxed layout main content horizontal section -->
    		</div><!-- end of horizontal full width section in main content area -->
    	</div><!-- end of full width main content area -->
        <!-- footer area of page -->
		<?php get_footer(); ?>
<?php
/*Template Name: Call Back*/
?>
<style>
body{
	background-color:#fff !important;
	background-image:none !important;
}
.page-wrapper{ background:none repeat scroll 0% 0% #424041}
.h2{color:#fff}
#request_a_call{width:42%; padding:7px; border:1px solid rgba(248,244,244,1.00); outline:none; color:#fff}
.req_submit{ background:none repeat scroll 0% 0% #F05A28; width:42%; padding:10px; font-family:lato-bold-italic; font-size:16px; color:#fff}</style>
<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

		<?php get_header(); ?>
    
    	<div class="main-container" id="page-container"><!-- contains the full width main content area -->
    		<div class="main-container"><!-- horizontal full width section in main content area -->
    			<div class="box-layout container-fluid"><!-- boxed layout of main content horizontal section -->
           			<div class="row">
               			<div class="col-md-12"><!-- Main content  -->
                        	<?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                			<article class="<?php post_class(); ?>" id="post-<?php the_ID(); ?>">
    						</article><!-- #01-->
                            <h2 style="color:#fff">Request a Call</h2>
                            <form action="<?php echo get_home_url(); ?>/request-received" method="post">
                            	<input type="text" name="request-name" placeholder="Enter your name" id="request_a_call"><br/><br/>
                                <input type="tel" name="request-number" placeholder="Enter your number" id="request_a_call"><br/><br/>
                                <input type="submit" value="Request for a Call" name="submit-request" class="req_submit">
                            </form>
                            <?php endwhile; ?>
                		</div>
            		</div><!-- end of row -->
        		</div><!-- end of boxed layout main content horizontal section -->
    		</div><!-- end of horizontal full width section in main content area -->
    	</div><!-- end of full width main content area -->
        <!-- footer area of page -->
		<?php get_footer(); ?>
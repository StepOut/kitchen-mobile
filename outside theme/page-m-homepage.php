<?php
/*Template Name: Mobile Homepage*/
?>
<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/homepage-ui/flat-ui/images/favicon.ico">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/homepage-ui/flat-ui/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/homepage-ui/flat-ui/css/flat-ui.css">
        <!-- Using only with Flat-UI (free)-->
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/homepage-ui/common-files/css/icon-font.css">
        <!-- end -->
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/homepage-ui/css/style.css">


		<?php get_header(); ?>
    
    	<div class="page-wrapper">
            <!-- header-4 -->
            <header class="header-4 v-center bg-midnight-blue">
                <div class="background">
                    &nbsp;
                </div>
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="hero-unit">
                                	<!--img src="https://dl.dropboxusercontent.com/u/36260810/running-files/bueno/round-unit.png"-->
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/splash-01.png" class="img-responsive" style="margin:100px auto auto auto;" />	                        
                                </div>
                                <div class="btns">
                                    <a class="btn btn-large btn-primary" href="m/home/">Explore</a>
                                    <a class="btn btn-large btn-gray" href="order">Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div><!-- end of full width main content area -->
        <!-- footer area of page -->
		<?php get_footer(); ?>
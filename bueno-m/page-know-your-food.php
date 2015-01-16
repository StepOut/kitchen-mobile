<?php
/*Template Name: Know Your Food*/
?>
<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

		<?php get_header('1'); ?>
        <script type="text/javascript">
			$(document).ready(function(e) {
                $("body").css("background-image":"url(<?php echo get_stylesheet_directory_uri(); ?>/images/bg_know-your-food.jpg);");
            });
		</script>
        <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/bueno-food-facts.js"></script>
<style>
body {
	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/bg_know-your-food.jpg);
	background-size: contain;
}
.page-title {
	margin:0 auto;
}
.btn-orange {
	font-family:lato-bold;
}
#know-view-more .btn:hover {
	background:#fff;
	color:#424041;
}
.addthis-toolbox {
	display:block !important;
}
</style>    
    	<div class="main-container" id="page-container"><!-- contains the full width main content area -->
    			<div class="box-layout container-fluid"><!-- boxed layout of main content horizontal section -->
           			<div class="row">
               			<div class="col-md-12"><!-- Main content  -->
                        	<?php
							//while ( have_posts() ) : the_post(); ?>
                			<article class="<?php post_class(); ?>" id="post-<?php the_ID(); ?>">
                            	<section id="know-page-title" class="page-title"><!-- page title -->
                                	<h1 class="text-uppercase">Things About Food</h1><span class="text-lowercase subtitle pull-right">You Would Love To Find Out</span>
                                </section><!-- end of page title -->
                                <section id="know-main-fact" class="solid border-white text-center"><!-- main fact section -->
                                <span>Did you know that...</span>
                                	<div id="random-fact"></div>
                                    
                                </section><!-- end of main fact section -->
                                <section id="know-other-fact" class="text-center"><!-- other fact button -->
                                	<div>
                                		<button type="button" class="btn btn-facts text-uppercase" id="find-another-fact">Find Another Fact!</button>
                                    </div>
                                </section><!-- end of other fact section -->
                                <section id="know-social">
                                    <?php
										if (is_page(29)) {
  											echo "<ul id='parent-post'>";
  											$cat = array(
														'posts_per_page'   => 1,
														'category' => '139' 
													);
  											$posts = get_posts( $cat );
  											if ($posts) {
    											foreach ($posts as $post):
      												setup_postdata($post); ?>
      													<li><?php the_content(); ?></li>
    												<?php endforeach;
  												}
  											echo "</ul>";
										}
										?>
                                </section>
                                
                                <section id="know-view-more" class="text-center">
                                	<div>
                                		<button type="button" class="btn btn-orange text-uppercase" id="view-all-facts">View All</button>
                                    </div>
                                </section>
                                <section id="know-more-fact" class="" style="display:none;"><!-- more fact section -->
                                	<div class="" id="all-facts">
        								
                                        <?php //get_template_part( 'content', get_post_format() ); ?>
                                        
                                        <?php $latest = new WP_Query('showposts=-1'); ?>
                                        <ul>
                                        <?php
										if (is_page(29)) {
  											echo "<ul>";
  											$cat = array(
														'posts_per_page'   => -1,
														'category' => '136' 
													);
  											$posts = get_posts( $cat );
  											if ($posts) {
    											foreach ($posts as $post):
      												setup_postdata($post); ?>
      													<li><?php the_content(); ?></li>
    												<?php endforeach;
  												}
  											echo "</ul>";
										}
										?>
<?php //while( $latest->have_posts() ) : $latest->the_post(); ?>

<?php //the_content(); ?>
<?php //endwhile; ?>
</ul>
                                      
                                        
                                   </div>								
                                </section>
    						</article><!-- #01-->
                            <?php //endwhile; ?>
                		</div>
            		</div><!-- end of row -->
        		</div><!-- end of boxed layout main content horizontal section -->
    	</div><!-- end of full width main content area -->
        <script type="text/javascript">
        jQuery("#random-fact").load("http://www.bueno.kitchen/random-fact/");
		jQuery("#find-another-fact").click(function(){
   			jQuery("#random-fact").load("http://www.bueno.kitchen/random-fact/");
			jQuery("#share-random").data("title", "test" /*jQuery("#random-fact p").val()*/);
   			return false;
		});
		jQuery("#view-all-facts").click(function(e) {
            jQuery("#know-more-fact").show('slow');
        });
		</script>
        <style>
		#parent-post{
			padding-left: 0;
			margin-top: 20px;
		}
		#parent-post li{
			list-style:none;
		}
		#parent-post p{
			display:none;
		}
		#parent-post .at4-show{
			text-align:center;
		}
		#parent-post .at-svc-facebook span {
			background: url(http://www.bueno.kitchen/wp-content/themes/Bueno/images/know_fb_main.png) !important;
			width:51px !important;
			height:66px !important;
		}
		#parent-post .at-svc-twitter span {
			background: url(http://www.bueno.kitchen/wp-content/themes/Bueno/images/know_twitter_main.png) !important;
			width:51px !important;
			height:66px !important;
		}
		</style>
        <!-- footer area of page -->
		<?php get_footer(); ?>
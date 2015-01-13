<?php get_header(); ?>
	<div class="wmffcontainer">
    	<div class="post-padding"></div>
        <div class="wmffrow">
        	<div class="col-12 wmffcol-xs-12 wmffcol-sm-12 wmffcol-md-12 wmffcol-lg-12">
                <!-- section -->
                <section role="main">
                
                    <h3><?php echo sprintf( __( '%s Search Results for ', 'mobilit2d' ), $wp_query->found_posts ); echo get_search_query(); ?></h3>
                    
                    <?php get_template_part('loop'); ?>
                    
                    <?php get_template_part('pagination'); ?>
                
                </section>
                <!-- /section -->
	
		</div>
	</div>
</div>

<?php get_footer(); ?>
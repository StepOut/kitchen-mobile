<?php get_header(); ?>
	
	<div class="wmffcontainer">
    	<div class="post-padding"></div>
        <!-- section -->
        <section role="main">
             
            <?php get_template_part('loop'); ?>
            
            <?php get_template_part('pagination'); ?>
        
        </section>
        <!-- /section -->
           
	</div>
    
<?php get_footer(); ?>
<?php get_header(); ?>
       	
        <?php if(is_woocommerce){?>
		<div style="height:20px;display:block;width:100%"></div><div class="wmffcontainer">
		<div class="wmffrow">
		<div class="col-12 wmffcol-xs-12 wmffcol-sm-12 wmffcol-md-12 wmffcol-lg-12"> 
		<?php }?>
        <!-- section -->
        <section role="main">
        
        <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        
            <!-- article -->
            <?php if(!is_woocommerce){?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php }else{?>
            <div class="woocommercemobili">
            <?php }?>
                
                <?php the_content(); ?>
                
                <br class="clear">
                
                <?php // edit_post_link(); ?>
            <?php if(!is_woocommerce){?>  
            </article>
            <?php }else{?>
            </div>
            <?php }?>
            <!-- /article -->
            
        <?php endwhile; ?>
        
        <?php else: ?>
        
            <!-- article -->
            <article>
                
                <h2><?php _e( 'Sorry, nothing to display.', 'mobilit2d' ); ?></h2>
                
            </article>
            <!-- /article -->
        
        <?php endif; ?>
        
        </section>
        <!-- /section -->
        <?php if(is_woocommerce){?>
		</div></div></div>
		<?php }?>

<?php get_footer(); ?>
<?php get_header(); ?>
<div class="wmffcontainer">
    <div class="post-padding"></div>
	<div class="wmffrow">
        	<div class="col-12 wmffcol-xs-12 wmffcol-sm-12 wmffcol-md-12 wmffcol-lg-12">
                <!-- section -->
                <section role="main">
                
                <?php if (have_posts()): while (have_posts()) : the_post(); ?>
                	<?php wp_link_pages()?>
                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    	<div class="wmfbacklink">
                        	<div class="wmfsingleback">
                            	<a href="<?php echo wp_get_referer() ?>"><i class="icon-chevron-sign-left"></i> <?php echo __('Back', 'mobilit2d')?></a>
                            </div>
                        </div>
                        <div class="post-mtitle"><?php the_title(); ?></div>
                        <div class="post-mimage"><?php the_post_thumbnail('large'); ?></div>
                        <div class="post-content">
                        <?php the_content();?>
                        </div>
                        <div class="post-minfo"><?php the_time('F j, Y'); ?> / <?php comments_popup_link( '', __( '1 Comment /', 'mobilit2d' ), __( '% Comments /', 'mobilit2d' )); ?><?php _e( 'by', 'mobilit2d' ); ?> <?php the_author_posts_link(); ?></div>
           
                        
                        <?php comments_template(); ?>
                        
                    </article>
                    <!-- /article -->
                    
                <?php endwhile; ?>
                
                <?php else: ?>
                
                    <!-- article -->
                    <article>
                        
                        <h1><?php _e( 'Sorry, nothing to display.', 'mobilit2d' ); ?></h1>
                        
                    </article>
                    <!-- /article -->
                
                <?php endif; ?>
                
                </section>
                <!-- /section -->
		</div>
	</div>
</div>
<?php get_footer(); ?>
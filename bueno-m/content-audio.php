<div class="post-mtitle"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
<div class="post-content">
<?php mobiliwp_excerpt();?>
</div>
<div class="post-minfo"><?php the_time('F j, Y'); ?> / <?php comments_popup_link( '', __( '1 Comment / ', 'mobilit2d' ), __( '% Comments / ', 'mobilit2d' )); ?><?php _e( 'by', 'mobilit2d' ); ?> <?php the_author_posts_link(); ?> <?php echo "/  "; the_tags(); ?></div>
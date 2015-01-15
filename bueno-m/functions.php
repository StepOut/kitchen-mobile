<?php

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/
require_once( get_template_directory().'/admin/tgm/plugins.php' );
require_once( get_template_directory().'/option-tree/lfbefore.php');
require_once(get_template_directory().'/admin/custom-widgets.php');
require_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // For check plugin active
require_once(get_template_directory().'/admin/breadcrumbs.php');

/*------------------------------------*\
	Options Panel
\*------------------------------------*/

load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
load_template( trailingslashit( get_template_directory() ) . 'option-tree/theme-options.php' );

add_filter( 'ot_show_pages', '__return_true' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );

//Google Font Filter
if(is_admin() && $pagenow == 'themes.php'){
	function filter_ot_recognized_font_families( $array, $field_id ) {
		
		$array = array(
		  "Helvetica|font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;"  => 'Helvetica',
		);
		
		include 'admin/fonts.php';
		
		
		if ( ! empty( $wmf_google_fonts_array  ) ) {
			foreach( $wmf_google_fonts_array  as $googlefont ) {
				$array[''.$googlefont['css-name'].'|'.$googlefont['font-family'].''] = ''.$googlefont['font-name'].'';
			}
		}
		
	  return $array;
	  
	}
	add_filter( 'ot_recognized_font_families', 'filter_ot_recognized_font_families', 10, 2 );
}

require_once(get_template_directory().'/admin/themecustomizer.php');

/*------------------------------------*\
	Auto Update
\*------------------------------------*/
require_once(get_template_directory().'/admin/update/class-pixelentity-theme-update.php');

$autoupdate_username = ot_get_option( 'autoupdate_username');
$autoupdate_apikey2 = ot_get_option( 'autoupdate_apikey2');

if($autoupdate_username != "" && $autoupdate_apikey2 != ""){PixelentityThemeUpdate::init($autoupdate_username,$autoupdate_apikey2,'Webbu');}


/*------------------------------------*\
	Woocommerce
\*------------------------------------*/
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div style="height:20px;display:block;width:100%"></div><div class="wmffcontainer">
        <div class="wmffrow">
        <div class="col-12 wmffcol-xs-12 wmffcol-sm-12 wmffcol-md-12 wmffcol-lg-12">';
}

function my_theme_wrapper_end() {
  echo '</div>
		</div>
		</div>';
}

// Change number of products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
function loop_columns() {
return 3; // 3 products per row
}
}

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');
    
    //Woocommerce
    add_theme_support( 'woocommerce' );
	
	// Post Formats
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    //add_image_size('custom-size', 600, 450, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('mobilit2d', get_template_directory() . '/languages');
	
}

/*add_action( 'admin_enqueue_scripts', 'editor_style_admin_script' );
function editor_style_admin_script( $hook ) {
    if ( 'post-new.php' == $hook || 'post.php' == $hook )
        wp_enqueue_script( 'editor_styles_post_format_js', get_template_directory_uri() . '/js/editor-styles-post-format.js', true, array( 'jquery' ), '1.0.0' );
}
*/
/*------------------------------------*\
	Functions
\*------------------------------------*/

function mobili_header_scripts()
{
    if (!is_admin()) {
    
    	wp_enqueue_script('jquery'); 
    	
    	wp_register_script('conditionizr', get_template_directory_uri() .'/js/conditionizr.min.js', array('jquery'), '2.2.0',true); 
        wp_enqueue_script('conditionizr'); 
        
        wp_register_script('modernizr', get_template_directory_uri() .'/js/modernizr.min.js', array('jquery'), '2.6.2',true); 
        wp_enqueue_script('modernizr'); 
        
		$general_ioswebapp = ot_get_option( 'general_ioswebapp', '1' );
		
		if( $general_ioswebapp == 1 ){
			wp_register_script('wmf-webapp', get_template_directory_uri() . '/js/webapp.js', array('jquery'), '1.0.0',true); 
       		wp_enqueue_script('wmf-webapp');
		}
		
		$general_doubletap = ot_get_option( 'general_doubletap', '1' );
		
		if( $general_doubletap == 1 ){
			wp_register_script('wmf-hammertap', get_template_directory_uri() . '/js/hammertap.js', array('jquery'), '1.0.0',true); 
       		wp_enqueue_script('wmf-hammertap');
		}
		
		$menusettings_left = ot_get_option( 'menusettings_left', '1');
		$menusettings_rightmenu = ot_get_option( 'menusettings_rightmenu', '0');
		
		if($menusettings_left == 1 || $menusettings_rightmenu == 1){
			wp_register_script('snapjs', get_template_directory_uri() . '/js/snap.min.js', array('jquery'), '1.0.0',true); 
			wp_enqueue_script('snapjs');
		}
		
		wp_register_script('theme-scripts', get_template_directory_uri() . '/js/theme-scripts.php', array('jquery'), '1.0.0',true); 
        wp_enqueue_script('theme-scripts'); 
		
		wp_register_script('wmf-menuac', get_template_directory_uri() . '/js/menuac.js', array('jquery'), '1.0.0'); 
       	wp_enqueue_script('wmf-menuac');
		
    }
}


/*------------------------------------*\
	Add2Home
\*------------------------------------*/
$iossettings_add2home = ot_get_option( 'iossettings_add2home', '1' );

if($iossettings_add2home == 1){
	
	function add_add2home_config () {
		if (!is_admin()) {
			if(is_front_page() || is_home()){
			wp_register_script('add2home', get_template_directory_uri() . '/js/add2home.js', array('jquery'), '1.0.0', true); 
       		wp_enqueue_script('add2home'); 
			wp_register_style('add2homec', get_template_directory_uri() . '/css/add2home.css', array(), '1.0', 'all');
    		wp_enqueue_style('add2homec'); 
			echo '
			<script type="text/javascript">
			var addToHomeConfig = {
				returningVisitor: '.ot_get_option( 'iossettings_returningvisitor', 'false' ).',
				touchIcon: '.ot_get_option( 'iossettings_touchicon', 'true' ).',
				startDelay: '.ot_get_option( 'iossettings_startdelay', '2000' ).',			
				lifespan: '.ot_get_option( 'iossettings_lifespan', '5000' ).',					
			};
			</script>
			';
			}
		}
	}
	add_action('wp_footer', 'add_add2home_config',0);
}

/*------------------------------------*\
	Google Analytic
\*------------------------------------*/
$googleanalytics_code = ot_get_option( 'googleanalytics_code', '' );

if( $googleanalytics_code != "" ){
	// Add Analytic code
	function add_analytic_code () {
		if (!is_admin()) {
			echo ot_get_option( 'googleanalytics_code', '' );
		}
	}
	add_action('wp_footer', 'add_analytic_code',80);
}


/*------------------------------------*\
	Modernizr Hook
\*------------------------------------*/
$general_loading = ot_get_option( 'general_loading', '1');

if($general_loading == 1){
	function add_modernizrhook_code () {
		if (!is_admin()) {
			echo '
			<script>
			!function(){
				// configure legacy, retina, touch requirements @ conditionizr.com
				conditionizr()
			}()
			</script>';
		}
	}
	add_action('wp_footer', 'add_modernizrhook_code',100);
}
/*------------------------------------*\
	Loading Hook
\*------------------------------------*/
function add_loadinghook_code () {
	if (!is_admin()) {
		echo '
		<script>
		(function($) {
		  "use strict";

			$(document).ready(function() {
				setTimeout(function() {
					  $(".wmfloadingani").css("display","none");
				}, 1000);
			});
			
		})(jQuery);
		</script>';
	}
}
add_action('wp_footer', 'add_loadinghook_code',200);


//Import - Export icon for admin wp3.8
function mobilit2d_admin_styles(){
	
	wp_register_style('mobilitheme-admin-icons', get_template_directory_uri() . '/css/adminicons.css', array(), '1.0', 'all');
    wp_enqueue_style('mobilitheme-admin-icons'); 
	
}
add_action('admin_init', 'mobilit2d_admin_styles'); // Add Theme admin Stylesheet


function mobilit2d_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); 
    
    wp_register_style('theme-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('theme-style');
		
	wp_register_style('theme-settings', get_template_directory_uri() . '/css/theme-css.php', array(), '1.0', 'all');
    wp_enqueue_style('theme-settings'); 
	
	wp_register_style('theme-typography', get_template_directory_uri() . '/css/typography.php', array(), '1.0', 'all');
    wp_enqueue_style('theme-typography'); 
	
	if(!is_plugin_active('wmfshortcodes/index.php')) {
      //If not plugin active
	  wp_register_style('fontawsesome_css', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '3.2.1', 'all');
	  wp_enqueue_style('fontawsesome_css'); 
    }
	
	if(!is_plugin_active('wmfshortcodes/index.php') && !is_plugin_active('wmfframework/index.php')) {
      //If not plugin active
	  wp_register_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.0', 'all');
	  wp_enqueue_style('bootstrap_css'); 
    }
		  
}

if(!is_plugin_active('wmfshortcodes/index.php')) {
	// Font awesome IE7 fix
	function mobili_add_fontawesome_fix () {
		if (!is_admin()) {
			echo '<!--[if lt IE 7]>';
			echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/font-awesome-ie7.min.css">';
			echo '<![endif]-->';
		}
	}
	add_action('wp_head', 'mobili_add_fontawesome_fix');
}

// Mobili ie8 fix
function mobili_add_ie8_fix () {
	if (!is_admin()) {
		echo '<!--[if IE 7]>';
		echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/ie8.css">';
		echo '<script src="'.get_template_directory_uri().'/js/ie8fix.js"></script>';
		echo '<![endif]-->';
		echo '<!--[if lte IE 8]>';
		echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/ie8.css">';
		echo '<script src="'.get_template_directory_uri().'/js/ie8fix.js"></script>';
		echo '<script src="'.get_template_directory_uri().'/js/ie9fix.js"></script>';
		echo '<![endif]-->';
		echo '<!--[if IE 9]>';
		echo '<script src="'.get_template_directory_uri().'/js/ie9fix.js"></script>';
		echo '<![endif]-->';
	}
}
add_action('wp_head', 'mobili_add_ie8_fix');
	
//Mobili Menus
function register_mobili_menu_theme()
{
    register_nav_menus(array( 
        'mobili-left-menu' => __('Mobili Left Menu', 'mobilit2d'),
        'mobili-right-menu' => __('Mobili Right Menu', 'mobilit2d'), 
    ));
}

//Replace icon name selected
add_filter('walker_nav_menu_start_el', 'description_in_nav_el', 10, 4);
function description_in_nav_el($item_output, $item, $depth, $args)
{ 
	$menusettings_icontypeleft = ot_get_option( 'menusettings_icontypeleft', 'tt3');
	$mytext = '';
	if($menusettings_icontypeleft == 'tt3'){
		$mytext = 'r3wmf ';
	}elseif($menusettings_icontypeleft == 'tt0'){
		$mytext = '';
	}elseif($menusettings_icontypeleft == 'tt1'){
		$mytext = 'r1wmf ';
	}elseif($menusettings_icontypeleft == 'tt2'){
		$mytext = 'r2wmf ';
	}
	
	if($item->attr_title != ''){
		return preg_replace('/(<a.*?>)/', '$0'."<i class='item-icon medium circlewmf ".$mytext."icon-{$item->attr_title}'></i> ", $item_output);
	}else{
		return preg_replace('/(<a.*?>)/', '$0'."", $item_output);
	}
}

// Mobit Main Navigation
function mobili_left_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'mobili-left-menu',
		'menu'            => '', 
		'container'       => '', 
		'container_class' => 'menu-{menu slug}-container', 
		'container_id'    => '',
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="accordion">%3$s</ul>',
		'depth'           => 2,
		'walker'          => ''
		)
	);
}

// Mobit Main 2 Navigation
function mobili_right_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'mobili-right-menu',
		'menu'            => '', 
		'container'       => '', 
		'container_class' => 'menu-{menu slug}-container', 
		'container_id'    => '',
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="accordion2">%3$s</ul>',
		'depth'           => 2,
		'walker'          => ''
		)
	);
}

function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('MOBILI Right Widget Area', 'mobilit2d'),
        'description' => __('MOBILI Right Widget Area', 'mobilit2d'),
        'id' => 'mobili-widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3><div class="widgetheader">',
        'after_title' => '</div></h3>'
    ));
	
	// Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('MOBILI Left Widget Area', 'mobilit2d'),
        'description' => __('MOBILI Left Widget Area', 'mobilit2d'),
        'id' => 'mobili-widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3><div class="widgetheader">',
        'after_title' => '</div></h3>'
    ));

}

// Display the product short description (excerpt)
add_action('bueno_product_desc_after_title','bueno_display_product_short_desc');
function bueno_display_product_short_desc(){
		global $product, $woocommerce_loop;
		$short_desc = strip_shortcodes( $product->post->post_excerpt );
		$short_desc = strip_tags( $short_desc );
		echo '<div class=prod-excerpt><p>'. $short_desc . '</p></div>';
}

// Display product serves
add_action('bueno_product_serves','bueno_display_product_serves');
function bueno_display_product_serves(){
		global $product, $woocommerce_loop;
		$attr_values = get_taxonomy( 'pa_serves');
		$term_values = get_the_terms( $product->id, 'pa_serves');
		if($attr_values && $term_values){
			foreach ( $attr_values as $attr_value ) {
				echo $attr_value->name;
			}
			foreach ( $term_values as $term_value ) {
				echo ' : '.$term_value->name;
			}
		}
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function mobiliwp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
		'type' => 'list',
    ));
}


// Create the Custom Excerpts callback
function mobiliwp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    $output = do_shortcode(get_the_content('' . __('Read more', 'mobilit2d') . ''));
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
	
}


function mobili_blank_view_article($more)
{
    global $post;
    $output = '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'mobilit2d') . '</a>';
	return $output;
}
add_filter('excerpt_more', 'mobili_blank_view_article');

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function mobili_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function mobilit2dgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function mobilit2dcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard"><i class='icon icon-user'></i> 
	<?php //if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'webbu') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><i class='icon icon-calendar'></i> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			/* translators: 1: date, 2: time */
			printf( __('%1$s at %2$s', 'webbu'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'webbu'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply wmfbtn wmfbtn-default wmfbtn-xs">
    
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

// restrict a category over shop page
add_action( 'pre_get_posts', 'bueno_custom_pre_get_posts_query' );
function bueno_custom_pre_get_posts_query( $q ) {
	//global $woocommerce;
	//global $wp_query;
	if ( ! $q->is_main_query() ) return;
	if ( ! $q->is_post_type_archive() ) return;
	
	if ( ! is_admin() && is_shop() ) {

		$q->set( 'tax_query', array(array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => array( 'package', 'service' ),
			'operator' => 'NOT IN'
		)));
	
	}
	remove_action( 'pre_get_posts', 'bueno_custom_pre_get_posts_query' );

}



/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'mobili_header_scripts'); // Add Custom Scripts to wp_head
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'mobilit2d_styles'); // Add Theme Stylesheet
add_action('init', 'register_mobili_menu_theme');
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'mobiliwp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'mobilit2dgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'mobili_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

?>

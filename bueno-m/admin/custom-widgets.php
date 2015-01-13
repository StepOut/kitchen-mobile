<?php
// Social Buttons ------------------------------------------------------------------------------------------------------------- */
class WebbuSocialButtons extends WP_Widget
{
  function WebbuSocialButtons()
  {
    $widget_ops = array('classname' => 'widget_WebbuSocialButtons', 'description' => 'Displays social profile' );
    $this->WP_Widget('WebbuSocialButtons', 'MOBILI | Social Icons', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
	$facebook = empty($instance['facebook']) ? '' : $instance['facebook'];
	$twitter = empty($instance['twitter']) ? '' : $instance['twitter'];
	$gplus = empty($instance['gplus']) ? '' : $instance['gplus'];
	$pinterest = empty($instance['pinterest']) ? '' : $instance['pinterest'];
	$dribbble = empty($instance['dribbble']) ? '' : $instance['dribbble'];
	$skype = empty($instance['skype']) ? '' : $instance['skype'];
	$linkedin = empty($instance['linkedin']) ? '' : $instance['linkedin'];
	$vimeo = empty($instance['vimeo']) ? '' : $instance['vimeo'];
	$yahoo = empty($instance['yahoo']) ? '' : $instance['yahoo'];
	$apple = empty($instance['apple']) ? '' : $instance['apple'];
	$windows = empty($instance['windows']) ? '' : $instance['windows'];
	$youtube = empty($instance['youtube']) ? '' : $instance['youtube'];
	$delicious = empty($instance['delicious']) ? '' : $instance['delicious'];
	$supon = empty($instance['supon']) ? '' : $instance['supon'];
	$blogger = empty($instance['blogger']) ? '' : $instance['blogger'];
	$wordpress = empty($instance['wordpress']) ? '' : $instance['wordpress'];
	$amazon = empty($instance['amazon']) ? '' : $instance['amazon'];
	$paypal = empty($instance['paypal']) ? '' : $instance['paypal'];
	$rss = empty($instance['rss']) ? '' : $instance['rss'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook','remap'); ?><br /><input id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter','remap'); ?><br /><input id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('gplus'); ?>"><?php _e('Google Plus','remap'); ?><br /><input id="<?php echo $this->get_field_id('gplus'); ?>" name="<?php echo $this->get_field_name('gplus'); ?>" type="text" value="<?php echo esc_attr($gplus); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest','remap'); ?><br /><input id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribbble','remap'); ?><br /><input id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo esc_attr($dribbble); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('Skype','remap'); ?><br /><input id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo esc_attr($skype); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linked In','remap'); ?><br /><input id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo','remap'); ?><br /><input id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo esc_attr($vimeo); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('yahoo'); ?>"><?php _e('Yahoo','remap'); ?><br /><input id="<?php echo $this->get_field_id('yahoo'); ?>" name="<?php echo $this->get_field_name('yahoo'); ?>" type="text" value="<?php echo esc_attr($yahoo); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('apple'); ?>"><?php _e('Apple','remap'); ?><br /><input id="<?php echo $this->get_field_id('apple'); ?>" name="<?php echo $this->get_field_name('apple'); ?>" type="text" value="<?php echo esc_attr($apple); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('windows'); ?>"><?php _e('Windows','remap'); ?><br /><input id="<?php echo $this->get_field_id('windows'); ?>" name="<?php echo $this->get_field_name('windows'); ?>" type="text" value="<?php echo esc_attr($windows); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youttube','remap'); ?><br /><input id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('delicious'); ?>"><?php _e('Delicious','remap'); ?><br /><input id="<?php echo $this->get_field_id('delicious'); ?>" name="<?php echo $this->get_field_name('delicious'); ?>" type="text" value="<?php echo esc_attr($delicious); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('supon'); ?>"><?php _e('Stumble Upon','remap'); ?><br /><input id="<?php echo $this->get_field_id('supon'); ?>" name="<?php echo $this->get_field_name('supon'); ?>" type="text" value="<?php echo esc_attr($supon); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('blogger'); ?>"><?php _e('Blogger','remap'); ?><br /><input id="<?php echo $this->get_field_id('blogger'); ?>" name="<?php echo $this->get_field_name('blogger'); ?>" type="text" value="<?php echo esc_attr($blogger); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('wordpress'); ?>"><?php _e('Wordpress','remap'); ?><br /><input id="<?php echo $this->get_field_id('wordpress'); ?>" name="<?php echo $this->get_field_name('wordpress'); ?>" type="text" value="<?php echo esc_attr($wordpress); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('amazon'); ?>"><?php _e('Amazon','remap'); ?><br /><input id="<?php echo $this->get_field_id('amazon'); ?>" name="<?php echo $this->get_field_name('amazon'); ?>" type="text" value="<?php echo esc_attr($amazon); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('paypal'); ?>"><?php _e('Paypal','remap'); ?><br /><input id="<?php echo $this->get_field_id('paypal'); ?>" name="<?php echo $this->get_field_name('paypal'); ?>" type="text" value="<?php echo esc_attr($paypal); ?>" size="35" /></label></p>
  
  <p><label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS','remap'); ?><br /><input id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" type="text" value="<?php echo esc_attr($rss); ?>" size="35" /></label></p>
  
  
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	$instance['facebook'] = $new_instance['facebook'];
	$instance['twitter'] = $new_instance['twitter'];
	$instance['gplus'] = $new_instance['gplus'];
	$instance['pinterest'] = $new_instance['pinterest'];
	$instance['dribbble'] = $new_instance['dribbble'];
	$instance['skype'] = $new_instance['skype'];
	$instance['linkedin'] = $new_instance['linkedin'];
	$instance['vimeo'] = $new_instance['vimeo'];
	$instance['yahoo'] = $new_instance['yahoo'];
	$instance['apple'] = $new_instance['apple'];
	$instance['windows'] = $new_instance['windows'];
	$instance['youtube'] = $new_instance['youtube'];
	$instance['delicious'] = $new_instance['delicious'];
	$instance['supon'] = $new_instance['supon'];
	$instance['blogger'] = $new_instance['blogger'];
	$instance['wordpress'] = $new_instance['wordpress'];
	$instance['amazon'] = $new_instance['amazon'];
	$instance['paypal'] = $new_instance['paypal'];
	$instance['rss'] = $new_instance['rss'];
	
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$facebook = $instance['facebook'];
	$twitter = $instance['twitter'];
	$gplus = $instance['gplus'];
	$pinterest = $instance['pinterest'];
	$dribbble = $instance['dribbble'];
	$skype = $instance['skype'];
	$linkedin = $instance['linkedin'];
	$vimeo = $instance['vimeo'];
	$yahoo = $instance['yahoo'];
	$apple = $instance['apple'];
	$windows = $instance['windows'];
	$youtube = $instance['youtube'];
	$delicious = $instance['delicious'];
	$supon = $instance['supon'];
	$blogger = $instance['blogger'];
	$wordpress = $instance['wordpress'];
	$amazon = $instance['amazon'];
	$paypal = $instance['paypal'];
	$rss = $instance['rss'];
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
	$output = "";
    $output .= '<div class="social-container">';
    $output .= '<ul id="sm">';
	if($facebook !=""){$output .= '        <li><a class="facebook" href="'.$facebook.'" target="_blank"></a></li>';}
    if($twitter !=""){$output .= '        <li><a class="twitter" href="'.$twitter.'" target="_blank"></a></li>';}
    if($gplus !=""){$output .= '        <li><a class="gplus" href="'.$gplus.'" target="_blank"></a></li>';}
    if($pinterest !=""){$output .= '        <li><a class="pinterest" href="'.$pinterest.'" target="_blank"></a></li>';}
    if($dribbble !=""){$output .= '        <li><a class="dribbble" href="'.$dribbble.'" target="_blank"></a></li>';}
    if($skype !=""){$output .= '        <li><a class="skype" href="'.$skype.'" target="_blank"></a></li>';}
    if($linkedin !=""){$output .= '        <li><a class="linkedin" href="'.$linkedin.'" target="_blank"></a></li>';}
    if($vimeo !=""){$output .= '        <li><a class="vimeo" href="'.$vimeo.'" target="_blank"></a></li>';}
    if($yahoo !=""){$output .= '        <li><a class="yahoo" href="'.$yahoo.'" target="_blank"></a></li>';}
    if($apple !=""){$output .= '        <li><a class="apple" href="'.$apple.'" target="_blank"></a></li>';}
    if($windows !=""){$output .= '        <li><a class="windows" href="'.$windows.'" target="_blank"></a></li>';}
    if($youtube !=""){$output .= '        <li><a class="youtube" href="'.$youtube.'" target="_blank"></a></li>';}
    if($delicious !=""){$output .= '        <li><a class="delicious" href="'.$delicious.'" target="_blank"></a></li>';}
    if($supon !=""){$output .= '        <li><a class="supon" href="'.$supon.'" target="_blank"></a></li>';}
    if($blogger !=""){$output .= '        <li><a class="blogger" href="'.$blogger.'" target="_blank"></a></li>';}
    if($wordpress !=""){$output .= '        <li><a class="wordpress" href="'.$wordpress.'" target="_blank"></a></li>';}
    if($amazon !=""){$output .= '        <li><a class="amazon" href="'.$amazon.'" target="_blank"></a></li>';}
    if($paypal !=""){$output .= '        <li><a class="paypal" href="'.$paypal.'" target="_blank"></a></li>';}
    if($rss !=""){$output .= '        <li><a class="rss" href="'.$rss.'" target="_blank"></a></li>';}
    $output .= '</ul>';
    $output .= '</div>';
	echo $output;
	
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("WebbuSocialButtons");') );

?>
<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => __('General','mobilit2d')
      ),
      array(
        'id'          => 'logo_settings',
        'title'       => __('Logo Settings','mobilit2d')
      ),
      array(
        'id'          => 'themecustomizer',
        'title'       => __('Theme Customizer','mobilit2d')
      ),
      array(
        'id'          => 'menusettings',
        'title'       => __('Top Bar Settings','mobilit2d')
      ),
      array(
        'id'          => 'menulayout',
        'title'       => __('Menu Layout','mobilit2d')
      ),
      array(
        'id'          => 'menusettinsconf',
        'title'       => __('Menu Settings','mobilit2d')
      ),
      array(
        'id'          => 'headerbarsettings1',
        'title'       => __('Menu Header Bar','mobilit2d')
      ),
      array(
        'id'          => 'maincontentsettings',
        'title'       => __('Content Settings','mobilit2d')
      ),
      array(
        'id'          => 'general_typography',
        'title'       => __('Typography','mobilit2d')
      ),
      array(
        'id'          => 'splashscreen',
        'title'       => __('iOS Splash Screens','mobilit2d')
      ),
      array(
        'id'          => 'iossettings',
        'title'       => __('iOS Add Home Bubble','mobilit2d')
      ),
      array(
        'id'          => 'iostouchicon',
        'title'       => __('iOS Touch Icons','mobilit2d')
      ),
      array(
        'id'          => 'autoupdatemobili',
        'title'       => __('Auto Update','mobilit2d')
      )
    ),
    'settings'        => array( 
	array(
        'id'          => 'mhelpbox_help14',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('You can find Envato Username and API key in to the Envato Control Panel > My Settings > API Key. <a href="http://www.webbudesign.com/envato/apikey.png" target="_blank">For more detail click here to see help photo.</a>','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'autoupdatemobili',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'general_brcm',
        'label'       => __('Breadcrumbs','mobilit2d'),
        'desc'        => __('This option will enable / disable Breadcrumbs feature.','mobilit2d'),
        'std'         => '0',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'general_ioswebapp',
        'label'       => __('iOS Web App','mobilit2d'),
        'desc'        => __('This option will enable / disable iOS iWeb App feature.','mobilit2d'),
        'std'         => '1',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'general_doubletap',
        'label'       => __('Double Tap: Move top bar function','mobilit2d'),
        'desc'        => __('If enable this feature. Top header menu can change position on double tap.','mobilit2d'),
        'std'         => '1',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'general_disabledragf',
        'label'       => __('Drag Content: Drag left & right menu with swipe function','mobilit2d'),
        'desc'        => __('If disable this feature. You can stop drag feature.','mobilit2d'),
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'general_tapclose',
        'label'       => __('Tap Content: Tap to close menu function','mobilit2d'),
        'desc'        => __('If disable this feature. You can stop tap close feature.','mobilit2d'),
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'general_loading',
        'label'       => __('Loading Animation','mobilit2d'),
        'desc'        => __('You can stop loading animation by disable this.','mobilit2d'),
        'std'         => '1',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'general_loadingcolor',
        'label'       => __('Loading Window BG Color','mobilit2d'),
        'desc'        => __('You can change loading animation background color. Default: Black','aurat2d'),
        'std'         => 'black',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'white',
            'label'       => __('White','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => 'black',
            'label'       => __('Black','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'general_customcss',
        'label'       => __('Custom CSS Code','mobilit2d'),
        'desc'        => __('You can copy &amp; paste your custom css codes in this area. (Optional)','mobilit2d'),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'googleanalytics_code',
        'label'       => __('Google Analytics Code','mobilit2d'),
        'desc'        => __('Please copy &amp; paste your google analytic code with  ...  tags.','mobilit2d'),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'logosettings_topmargin',
        'label'       => __('Logo Top Margin','mobilit2d'),
        'desc'        => __('Top margin for logo.','mobilit2d'),
        'std'         => '10',
        'type'        => 'numeric-slider',
        'section'     => 'logo_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,100,1',
        'class'       => ''
      ),
      array(
        'id'          => 'logosettings_logotext',
        'label'       => __('Logo Text','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'logo_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_typographyhead',
        'label'       => __('Logo Text Typography','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'logo_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'logosettings_image',
        'label'       => __('Logo Image','mobilit2d'),
        'desc'        => __('You can upload your custom logo image and disable text logo. If leave empty text logo will be displayed.','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'logo_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'mhelpbox_help12',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('If choose to use theme customizer, not need to use custom configurations. This customizer will change Header, Menu Layout, Menu Settings and Content Settings. You need to click "Accept Change" after select your theme.<br><br><strong>Warning :</strong> After "Apply Changes" your old settings will erase. Please backup your existing setting with Import/Export manager before change.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'themecustomizer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'wmfthemecustomizer_apply',
        'label'       => __('Apply Theme Settings','mobilit2d'),
        'desc'        => '',
        'std'         => '0',
        'type'        => 'radio',
        'section'     => 'themecustomizer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Accept Change','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Decline Change','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'wmfthemecustomizer',
        'label'       => __('Select Theme','mobilit2d'),
        'desc'        => '',
        'std'         => '0',
        'type'        => 'radio-image',
        'section'     => 'themecustomizer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Style 1','mobilit2d'),
            'src'         => 'assets/images/tcustomizer/s1.png'
          ),
          array(
            'value'       => '2',
            'label'       => __('Style 2','mobilit2d'),
            'src'         => 'assets/images/tcustomizer/s2.png'
          ),
		  array(
            'value'       => '3',
            'label'       => __('Style 3','mobilit2d'),
            'src'         => 'assets/images/tcustomizer/s3.png'
          ),
		  array(
            'value'       => '4',
            'label'       => __('Style 4','mobilit2d'),
            'src'         => 'assets/images/tcustomizer/s4.png'
          ),
		  array(
            'value'       => '5',
            'label'       => __('Style 5','mobilit2d'),
            'src'         => 'assets/images/tcustomizer/s5.png'
          ),
		  array(
            'value'       => '6',
            'label'       => __('Style 6','mobilit2d'),
            'src'         => 'assets/images/tcustomizer/s6.png'
          ),
		  array(
            'value'       => '7',
            'label'       => __('Style 7','mobilit2d'),
            'src'         => 'assets/images/tcustomizer/s7.png'
          ),
		  array(
            'value'       => '8',
            'label'       => __('Style 8','mobilit2d'),
            'src'         => 'assets/images/tcustomizer/s8.png'
          )
        ),
      ),
      array(
        'id'          => 'mhelpbox_help1',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('Below settings will effect top bar area. You can leave blank for load default settings.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'menusettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_topheaderbackground',
        'label'       => __('Top Bar Background','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'menusettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_topheaderbackground2',
        'label'       => __('Top Bar Background Gradient Color','mobilit2d'),
        'desc'        => __('Please select second color for gradient, after select "Top Bar Background" &gt; Color. (Optional)','mobilit2d'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'menusettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_topheaderheight',
        'label'       => __('Top Bar Height (px)','mobilit2d'),
        'desc'        => __('Change top bar height value. Default:40px;','mobilit2d'),
        'std'         => '40',
        'type'        => 'numeric-slider',
        'section'     => 'menusettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '40,586,1',
        'class'       => ''
      ),
	  array(
        'id'          => 'topbar_opacity',
        'label'       => __('Top Bar Opacity','mobilit2d'),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'numeric-slider',
        'section'     => 'menusettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,1,0.1',
        'class'       => ''
      ),
      array(
        'id'          => 'mhelpbox_help2',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('Below settings will effect header left menu button icon, text and type. You can leave blank for load default settings.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'menusettings_left',
        'label'       => __('Left Sidebar Area','mobilit2d'),
        'desc'        => __('Enable / Disable left sidebar area.','mobilit2d'),
        'std'         => '1',
        'type'        => 'radio-image',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Enable','mobilit2d'),
            'src'         => 'assets/images/layout/left-sidebar-enable.png'
          ),
          array(
            'value'       => '0',
            'label'       => __('Disable','mobilit2d'),
            'src'         => 'assets/images/layout/left-sidebar-disable.png'
          )
        ),
      ),
	  array(
        'id'          => 'menusettings_leftmenuarea',
        'label'       => __('Left Menu Area','mobilit2d'),
        'desc'        => __('Enable / Disable left side menu. Left Sidebar Area must be enabled.','mobilit2d'),
        'std'         => '1',
        'type'        => 'radio',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'menusettings_leftsidebararea',
        'label'       => __('Left Widget Area','mobilit2d'),
        'desc'        => __('Enable / Disable left widget area. Left Sidebar Area must be enabled.','mobilit2d'),
        'std'         => '0',
        'type'        => 'radio',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'menusettings_lefticontype',
        'label'       => __('Left Menu Button Icon Type','mobilit2d'),
        'desc'        => __('Change icon type of left menu','mobilit2d'),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Only Icon','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => __('Icon & Text','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '3',
            'label'       => __('Only Text','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'menusettings_lefttext',
        'label'       => __('Left Menu Button Text','mobilit2d'),
        'desc'        => __('This setting only active if left menu type selected text. (Optional)','mobilit2d'),
        'std'         => 'LEFT',
        'type'        => 'text',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'menusettings_customlefticon',
        'label'       => __('Custom Left Menu Button Icon','mobilit2d'),
        'desc'        => __('Please upload your custom icon if have one. You can find a sample icon in downloaded content &gt; sources &gt; custom-icon folder (Optional) <br>Note: Icon size must be 36x24px','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'mhelpbox_help3',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('Below settings will effect header right menu button icon, text and type. You can leave blank for load default settings.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'menusettings_rightmenu',
        'label'       => __('Right Sidebar Area','mobilit2d'),
        'desc'        => __('Enable / Disable right sidebar area.','mobilit2d'),
        'std'         => '1',
        'type'        => 'radio-image',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Enable','mobilit2d'),
            'src'         => 'assets/images/layout/right-sidebar-enable.png'
          ),
          array(
            'value'       => '0',
            'label'       => __('Disable','mobilit2d'),
            'src'         => 'assets/images/layout/right-sidebar-disable.png'
          )
        ),
      ),
	  array(
        'id'          => 'menusettings_rightmenuarea',
        'label'       => __('Right Menu Area','mobilit2d'),
        'desc'        => __('Enable / Disable right side menu. Right Sidebar Area must be enabled.','mobilit2d'),
        'std'         => '0',
        'type'        => 'radio',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'menusettings_rightsidebararea',
        'label'       => __('Right Widget Area','mobilit2d'),
        'desc'        => __('Enable / Disable right widget area. Right Sidebar Area must be enabled.','mobilit2d'),
        'std'         => '1',
        'type'        => 'radio',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'menusettings_righticontype',
        'label'       => __('Right Menu Button Icon Type','mobilit2d'),
        'desc'        => __('Change icon type of right menu','mobilit2d'),
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Only Icon','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => __('Icon & Text','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '3',
            'label'       => __('Only Text','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'menusettings_righttext',
        'label'       => __('Right Menu Button Text','mobilit2d'),
        'desc'        => __('This setting only active if right menu type selected text. (Optional)','mobilit2d'),
        'std'         => __('RIGHT','mobilit2d'),
        'type'        => 'text',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'menusettings_customrighticon',
        'label'       => __('Custom Right Menu Button Icon','mobilit2d'),
        'desc'        => __('Please upload your custom icon if have one. You can find a sample icon in downloaded content &gt; sources &gt; custom-icon folder (Optional) <br>Note: Icon size must be 36x24px','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'menulayout',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'mhelpbox_help4',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('Below settings will effect left &amp; right menu. You can leave blank for load default settings.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_menu_bg',
        'label'       => __('Menu Area Background','mobilit2d'),
        'desc'        => __('This settings will effect the left &amp; right menu background. Default background color: #31394a','mobilit2d'),
        'std'         => '',
        'type'        => 'background',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'menusettings_opacity',
        'label'       => __('Menu Button & Header Opacity','mobilit2d'),
        'desc'        => __('Opacity for menu &amp; sub menu button background color.','mobilit2d'),
        'std'         => '0.6',
        'type'        => 'numeric-slider',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,1,0.1',
        'class'       => ''
      ),
      array(
        'id'          => 'menusettings_buttonbg',
        'label'       => __('Menu Button Background Color','mobilit2d'),
        'desc'        => __('Left &amp; Right Menu button background color. Please leave blank for default settings. Default: #31394a','mobilit2d'),
        'std'         => '#31394a',
        'type'        => 'colorpicker',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_menu_fonthover',
        'label'       => __('Menu Button Background Hover Color','mobilit2d'),
        'desc'        => __('This settings will effect the left &amp; right menu hover. Please leave blank for default settings. Default:#242731','mobilit2d'),
        'std'         => '#242731',
        'type'        => 'colorpicker',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_menu_border_color',
        'label'       => __('Menu Separator Border Color','mobilit2d'),
        'desc'        => __('Please select a color for menu separator border. (Default: #242a37)','mobilit2d'),
        'std'         => '#242a37',
        'type'        => 'colorpicker',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_menu_font',
        'label'       => __('Menu Font Typography','mobilit2d'),
        'desc'        => __('This settings will effect the left &amp; right menu text. Please leave blank for default settings.','mobilit2d'),
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'menucustomizer_width',
        'label'       => __('Menu Width(Left &amp; Right)','mobilit2d'),
        'desc'        => '',
        'std'         => '245',
        'type'        => 'numeric-slider',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '100,300,1',
        'class'       => ''
      ),
      array(
        'id'          => 'menusettings_icontypeleft',
        'label'       => __('Menu Left Icon Type','mobilit2d'),
        'desc'        => '',
        'std'         => 'tt1',
        'type'        => 'radio-image',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
		  array(
            'value'       => 'tt0',
            'label'       => __('Type0','mobilit2d'),
            'src'         => 'assets/images/icons/tt0.png'
          ),
          array(
            'value'       => 'tt1',
            'label'       => __('Type1','mobilit2d'),
            'src'         => 'assets/images/icons/tt1.png'
          ),
          array(
            'value'       => 'tt2',
            'label'       => __('Type 2','mobilit2d'),
            'src'         => 'assets/images/icons/tt2.png'
          ),
          array(
            'value'       => 'tt3',
            'label'       => __('Type 3','mobilit2d'),
            'src'         => 'assets/images/icons/tt3.png'
          )
        ),
      ),      
      array(
        'id'          => 'menusettings_icontype',
        'label'       => __('Menu Right Icon Type','mobilit2d'),
        'desc'        => '',
        'std'         => 't1',
        'type'        => 'radio-image',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 't1',
            'label'       => __('Type1','mobilit2d'),
            'src'         => 'assets/images/icons/t1.png'
          ),
          array(
            'value'       => 't2',
            'label'       => __('Type 2','mobilit2d'),
            'src'         => 'assets/images/icons/t2.png'
          ),
          array(
            'value'       => 't3',
            'label'       => __('Type 3','mobilit2d'),
            'src'         => 'assets/images/icons/t3.png'
          ),
          array(
            'value'       => 't4',
            'label'       => __('Type 4','mobilit2d'),
            'src'         => 'assets/images/icons/t4.png'
          ),
          array(
            'value'       => 't5',
            'label'       => __('Type 5','mobilit2d'),
            'src'         => 'assets/images/icons/t5.png'
          ),
          array(
            'value'       => 't6',
            'label'       => __('Type 6','mobilit2d'),
            'src'         => 'assets/images/icons/t6.png'
          ),
          array(
            'value'       => 't7',
            'label'       => __('Type 7','mobilit2d'),
            'src'         => 'assets/images/icons/t7.png'
          )
        ),
      ),
      array(
        'id'          => 'menusettings_riconsize',
        'label'       => __('Menu Right Icon Size','mobilit2d'),
        'desc'        => '',
        'std'         => '11',
        'type'        => 'numeric-slider',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '8,24,1',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_menu_search_hide_left',
        'label'       => __('Search Option in Menu','mobilit2d'),
        'desc'        => '',
        'std'         => '1',
        'type'        => 'select',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Show on left menu','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Show on right menu','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '2',
            'label'       => __('Don\'t show','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'mhelpbox_help5',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('Settings below will effect sub menu in left &amp; right menu area.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'submenubutton_bgcolor',
        'label'       => __('Sub Menu Button Background Color','mobilit2d'),
        'desc'        => __('Sub menu button background color. Default: #292f3d','mobilit2d'),
        'std'         => '#292f3d',
        'type'        => 'colorpicker',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'submenubutton_bghover',
        'label'       => __('Sub Menu Button Background Hover Color','mobilit2d'),
        'desc'        => __('Sub menu button background hover button. Default: #20242f','mobilit2d'),
        'std'         => '#20242f',
        'type'        => 'colorpicker',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'submenu_borderseperatorcolor',
        'label'       => __('Sub Menu Separator Border Color','mobilit2d'),
        'desc'        => __('Sub menu separator border color. Default:#000000','mobilit2d'),
        'std'         => '#000000',
        'type'        => 'colorpicker',
        'section'     => 'menusettinsconf',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'mhelpbox_help6',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('This settings will effect menu header, widget header &amp; search header. You can change font, color and bar size etc..','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'headerbarsettings1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hcustomizer_headerbackground',
        'label'       => __('Header Bar Background','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'headerbarsettings1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hcustomizer_headerbackground2',
        'label'       => __('Header Bar Background Gradient Color','mobilit2d'),
        'desc'        => __('Please select second color for gradient, after select "Header Bar Background" &gt; Color. (Optional)','mobilit2d'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'headerbarsettings1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hcustomizer_headertext',
        'label'       => __('Header Bar Typography','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'headerbarsettings1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hcustomizer_headerheight',
        'label'       => __('Header Bar Height (px)','mobilit2d'),
        'desc'        => __('Change header bar height value. Default:40px;','mobilit2d'),
        'std'         => '40',
        'type'        => 'numeric-slider',
        'section'     => 'headerbarsettings1',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '40,50,1',
        'class'       => ''
      ),
      array(
        'id'          => 'mhelpbox_help7',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('Below settings will effect content area. You can leave blank for load default settings.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_contentbackground',
        'label'       => __('Content Background','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_typography',
        'label'       => __('Content Typography','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'tcustomizer_contentelementcolor1',
        'label'       => __('Content Elements Color 1','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'tcustomizer_contentelementcolor2',
        'label'       => __('Content Elements Color 2','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'tcustomizer_linktexttypo',
        'label'       => __('Link Text Color','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  
	  array(
        'id'          => 'tcustomizer_linktexthovertypo',
        'label'       => __('Link Text Hover Color','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'blogbgcolor',
        'label'       => __('Blog Box Background Color','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'mhelpbox_help13',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('Below settings will effect widget content area. You can leave blank for load default settings.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hcustomizer_contentbg1',
        'label'       => __('Widget Content Background Color','mobilit2d'),
        'desc'        => __('Widget content background color. Default: #31394a','mobilit2d'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'widgetset_opacity',
        'label'       => __('Widget Background Opacity','mobilit2d'),
        'desc'        => __('Opacity for widgets background color.','mobilit2d'),
        'std'         => '0.6',
        'type'        => 'numeric-slider',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,1,0.1',
        'class'       => ''
      ),
      array(
        'id'          => 'hcustomizer_seperatorcolor1',
        'label'       => __('Widget Separator Color','mobilit2d'),
        'desc'        => __('Please select a color for header bar separator border. (Default: #000000)','mobilit2d'),
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'hcustomizer_typography1',
        'label'       => __('Widget Content Typography','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'maincontentsettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'mhelpbox_help8',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('Below settings will effect typography of site. Leave all settings blank for load default typography.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'general_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_subst',
        'label'       => __('Sub String For Google Font','mobilit2d'),
        'desc'        => __('Sub string for Google Font.(Optional) <br>Ex:subset=latin,cyrillic-ext,greek-ext,vietnamese,greek,cyrillic,latin-ext','mobilit2d'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  
      array(
        'id'          => 'tcustomizer_typographyh1',
        'label'       => __('H1 Typography','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'general_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_typographyh2',
        'label'       => __('H2 Typography','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'general_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_typographyh3',
        'label'       => __('H3 Typography','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'general_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_typographyh4',
        'label'       => __('H4 Typography','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'general_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_typographyh5',
        'label'       => __('H5 Typography','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'general_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'tcustomizer_typographyh6',
        'label'       => __('H6 Typography','mobilit2d'),
        'desc'        => '',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'general_typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'mhelpbox_help9',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('This feature only work in iOS devices. You will see different sized images below this instruction. These images are designed for device position &amp; type. Please upload all images. You can find sample images in Downloaded content &gt; Sources &gt; splash-screens folder.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'splashscreen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'splashscreen_iphone3',
        'label'       => __('Splash Screen iPhone 3','mobilit2d'),
        'desc'        => __('You can upload your own splash screen image. Check sources folder for sample.(Sources &gt; splash-screens &gt; apple-touch-startup-image-320x460.png)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'splashscreen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'splashscreen_iphone4',
        'label'       => __('Splash Screen iPhone4','mobilit2d'),
        'desc'        => __('You can upload your own splash screen image. Check sources folder for sample.(Sources &gt; splash-screens &gt; apple-touch-startup-image-640x920.png)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'splashscreen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'splashscreen_iphone5',
        'label'       => __('Splash Screen iPhone 5','mobilit2d'),
        'desc'        => __('You can upload your own splash screen image. Check sources folder for sample.(Sources &gt; splash-screens &gt; apple-touch-startup-image-640x1096.png)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'splashscreen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'splashscreen_porttablet',
        'label'       => __('Splash Screen Portrait Tablets','mobilit2d'),
        'desc'        => __('You can upload your own splash screen image. Check sources folder for sample.(Sources &gt; splash-screens &gt; apple-touch-startup-image-768x1004.png)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'splashscreen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'splashscreen_landtablet',
        'label'       => __('Splash Screen Landscape Tablets','mobilit2d'),
        'desc'        => __('You can upload your own splash screen image. Check sources folder for sample.(Sources &gt; splash-screens &gt; apple-touch-startup-image-748x1024.png)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'splashscreen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'splashscreen_porttabletret',
        'label'       => __('Splash Screen Portrait Retina Tablets','mobilit2d'),
        'desc'        => __('You can upload your own splash screen image. Check sources folder for sample.(Sources &gt; splash-screens &gt; apple-touch-startup-image-1536x2008.png)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'splashscreen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'splashscreen_landtabletret',
        'label'       => __('Splash Screen Landscape Retina Tablets','mobilit2d'),
        'desc'        => __('You can upload your own splash screen image. Check sources folder for sample.(Sources &gt; splash-screens &gt; apple-touch-startup-image-1496x2048.png)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'splashscreen',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'mhelpbox_help10',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('This feature only work on iOS devices &amp; only work in Front Page. You need to select your static front page from Settings &gt; Reading page.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'iossettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'iossettings_add2home',
        'label'       => __('IOS Add Home Bubble','mobilit2d'),
        'desc'        => __('<br>Show/Hide Add to Home Bubble on IOS devices.(Default: Show)','mobilit2d'),
        'std'         => '1',
        'type'        => 'radio',
        'section'     => 'iossettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => __('Show','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => '0',
            'label'       => __('Hide','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'iossettings_startdelay',
        'label'       => __('Start Delay','mobilit2d'),
        'desc'        => __('Start delay for message. (ms) 2000 for 2 sec.','mobilit2d'),
        'std'         => '2000',
        'type'        => 'numeric-slider',
        'section'     => 'iossettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,10000,1000',
        'class'       => ''
      ),
      array(
        'id'          => 'iossettings_lifespan',
        'label'       => __('Lifespan','mobilit2d'),
        'desc'        => __('Time before it is automatically destroyed. (ms) 5000 for 5 sec.','mobilit2d'),
        'std'         => '5000',
        'type'        => 'numeric-slider',
        'section'     => 'iossettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '0,30000,1000',
        'class'       => ''
      ),
      array(
        'id'          => 'iossettings_returningvisitor',
        'label'       => __('Returning Visitor','mobilit2d'),
        'desc'        => __('Show the message only to returning visitors. (ie: don\'t show it the first time)','mobilit2d'),
        'std'         => 'false',
        'type'        => 'radio',
        'section'     => 'iossettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'mhelpbox_help11',
        'label'       => __('Info','mobilit2d'),
        'desc'        => __('Touch icons will help to iOS users while adding your site to the home screen. The sizes are different because retina &amp; non-retina devices using different size icons. For find sample icons only check downloaded content &gt; sources &gt; touch-icons folder. You can change these images &amp; re upload here easily.','mobilit2d'),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'iostouchicon',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'iossettings_touchicon',
        'label'       => __('Touch Icon','mobilit2d'),
        'desc'        => __('This option will show an icon in to the add home balloon. If you enable touch icon you need to upload touch icons from touch icon section on the left menu.','mobilit2d'),
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'iossettings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => __('Enable','mobilit2d'),
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => __('Disable','mobilit2d'),
            'src'         => ''
          )
        ),
        
      ),
      array(
        'id'          => 'iostouchicon_1',
        'label'       => __('Touch Icon 57x57','mobilit2d'),
        'desc'        => __('You need to upload 57x57 px touch icon here. Check sources folder for sample.(touch-icons &gt; apple-touch-icon-57x57.png)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'iostouchicon',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'iostouchicon_2',
        'label'       => __('Touch Icon 72x72','mobilit2d'),
        'desc'        => __('You need to upload 72x72 px touch icon here. Check sources folder for sample.(touch-icons &gt; apple-touch-icon-72x72.png)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'iostouchicon',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'iostouchicon_3',
        'label'       => __('Touch Icon 114x114','mobilit2d'),
        'desc'        => __('You need to upload 114x114 px touch icon here. Check sources folder for sample.(touch-icons &gt; apple-touch-icon-114x114.png)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'iostouchicon',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'iostouchicon_4',
        'label'       => __('Touch Icon 144x144','mobilit2d'),
        'desc'        => __('Please select a color for header bar separator border. (Default: #000000)','mobilit2d'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'iostouchicon',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
      array(
        'id'          => 'autoupdate_username',
        'label'       => __('Envato Username','mobilit2d'),
        'desc'        => __('Please enter Themeforest Username','mobilit2d'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'autoupdatemobili',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      ),
	  array(
        'id'          => 'autoupdate_apikey2',
        'label'       => __('Envato API Key','mobilit2d'),
        'desc'        => __('Please enter Themeforest API Key','mobilit2d'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'autoupdatemobili',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}
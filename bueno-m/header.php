<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="<?php bloginfo('description'); ?>">
        
        
        <?php 
		$general_ioswebapp = ot_get_option( 'general_ioswebapp', '1');
		if( $general_ioswebapp == 1 ){
		?>
        <!-- web app -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <?php
		}
		?>
        
        <!-- mobile Features -->
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        
        <!-- iOS touch icons -->
        <?php 
		$iostouchicon_1 = ot_get_option( 'iostouchicon_1', '');
		$iostouchicon_2 = ot_get_option( 'iostouchicon_2', '');
		$iostouchicon_3 = ot_get_option( 'iostouchicon_3', '');
		$iostouchicon_4 = ot_get_option( 'iostouchicon_4', '');
		?>
        <link rel="shortcut icon" href="<?php echo $iostouchicon_1; ?>">
        <link rel="apple-touch-icon" href="<?php echo $iostouchicon_1;?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $iostouchicon_2;?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $iostouchicon_3;?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $iostouchicon_4;?>">
        <!-- iOS Splash screens -->
        
       
        <?php 
		$splashscreen_iphone3 = ot_get_option( 'splashscreen_iphone3', '');
		$splashscreen_iphone4 = ot_get_option( 'splashscreen_iphone4', '');
		$splashscreen_iphone5 = ot_get_option( 'splashscreen_iphone5', '');
		$splashscreen_porttablet = ot_get_option( 'splashscreen_porttablet', '');
		$splashscreen_landtablet = ot_get_option( 'splashscreen_landtablet', '');
		$splashscreen_porttabletret = ot_get_option( 'splashscreen_porttabletret', '');
		$splashscreen_landtabletret = ot_get_option( 'splashscreen_landtabletret', '');
		?>
		<!-- iPhone 320x460 -->
		<link href="<?php echo $splashscreen_iphone3;?>" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
		<!-- iPhone (Retina) 640x920 -->
		<link href="<?php echo $splashscreen_iphone4;?>" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
		<!-- iPhone 5 640x1096-->
		<link href="<?php echo $splashscreen_iphone5;?>" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
		<!-- iPad 768x1004 / 748x1024-->
		<link href="<?php echo $splashscreen_porttablet;?>" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
		<link href="<?php echo $splashscreen_landtablet;?>" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
		<!-- iPad (Retina) 1536x2008 / 1496x2048 -->
		<link href="<?php echo $splashscreen_porttabletret;?>" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
		<link href="<?php echo $splashscreen_landtabletret;?>" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
		<!-- / Splash Screens -->
 
		
		<!-- css + javascript -->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
    
		<!--Instruction Layer-->
        <div class="instructionlayer"><div class="instructionimg"></div></div>
        <!--/Instruction Layer-->
        
        <?php
		$general_loading = ot_get_option( 'general_loading', '1');
		
		if($general_loading == 1){
		
			$general_loadingcolor = ot_get_option( 'general_loadingcolor', 'black');
		?>
        <!--Loading Ani-->
        <div class="wmfloadingani wthemeloading<?php echo $general_loadingcolor;?>">
            <div class="wthemeloadingimage wthemeloadingimg<?php echo $general_loadingcolor;?>"></div>
        </div>
        <!--/Loading Ani-->
        <?php }?>
        
            <!-- Right / Left Menus -->
            <?php 
			$menusettings_lefttext = ot_get_option( 'menusettings_lefttext', 'LEFT');
			$menusettings_righttext = ot_get_option( 'menusettings_righttext', 'RIGHT');
			$logosettings_logotext = ot_get_option( 'logosettings_logotext');
			$logosettings_image = ot_get_option( 'logosettings_image');
			$custom_menu_search_hide_left = ot_get_option( 'custom_menu_search_hide_left', '1');
			
			$menusettings_leftmenuarea = ot_get_option( 'menusettings_leftmenuarea', '1');
			$menusettings_leftsidebararea = ot_get_option( 'menusettings_leftsidebararea', '0');
			$menusettings_rightmenuarea = ot_get_option( 'menusettings_rightmenuarea', '0');
			$menusettings_rightsidebararea = ot_get_option( 'menusettings_rightsidebararea', '1');
			?>
            <div class="snap-drawers">
            	
                <div class="snap-drawer snap-drawer-left" id="left-drawer">
                   
                        <div class="left-menu">
                            
							<?php
                            if($custom_menu_search_hide_left == 1){
                            ?>
                            <div class="menu-search"><?php get_search_form(); ?></div>
                            <?php }?>
                            
                            <?php if($menusettings_leftsidebararea == 1){get_sidebar('left');} ?>
                            <?php if($menusettings_leftmenuarea == 1){?>
                            <nav id="nav-main" class="mobili-nav" role="navigation">
                            <h4 style="color:#fff; margin-left:14px;">Navigation</h4>
                                <?php mobili_left_nav(); ?>
                            </nav>
                            <?php }?>
                          
                        </div>
                   
                </div>
                <div class="snap-drawer snap-drawer-right" id="right-drawer">
                    <div class="right-menu">
                    	
						<?php
                        if($custom_menu_search_hide_left == 0){
                        ?>
                        <div class="menu-search"><?php get_search_form(); ?></div>
                        <?php }?>
                        <?php if($menusettings_rightmenuarea == 1){?>
                        <nav id="nav-main2" class="mobili-nav" role="navigation">
                            <?php mobili_right_nav(); ?>
                        </nav>
                        <?php }?>
                            
                        <?php if($menusettings_rightsidebararea == 1){get_sidebar();} ?>
                        
                    </div>
                </div>
            </div>
            <!-- /Right / Left Menus -->
            
            <!-- Content -->
            <div id="mobilicontent" class="snap-content">
            
            	<!-- Header Top Bar -->
                <div id="toolbar">
                        <a href="#" id="toggle-left"></a>
                        <span id="toggle-left-text" class="left-menu-text"><?php echo $menusettings_lefttext;?></span>
                    	<h1><img src="http://stepoutsolutions.org/projects/bueno/wp-content/themes/Bueno/images/header-logo.png" style="width: 124px;"></h1>
                        <span id="toggle-right-text" class="right-menu-text"><?php echo $menusettings_righttext;?></span> 
                    	<a href="#" id="toggle-right"></a>
                </div>
                <!-- /Header Top Bar -->
                
                <div id="maincontent">
                <?php 
				$general_brcm = ot_get_option( 'general_brcm', '0');
				if($general_brcm != 0){
					if (function_exists('wmf_mobile_breadcrumbs')) wmf_mobile_breadcrumbs(); 
				}
				?>
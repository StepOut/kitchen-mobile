<?php header('Content-type: text/css'); ?>
<?php //Setup location of WordPress
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0]; 

//Access WordPress
require_once( $path_to_wp.'/wp-load.php' );

$tcustomizer_contentelementcolor1 = ot_get_option( 'tcustomizer_contentelementcolor1');
$tcustomizer_contentelementcolor2 = ot_get_option( 'tcustomizer_contentelementcolor2');

$general_customcss = ot_get_option( 'general_customcss');
$topbar_opacity = ot_get_option( 'topbar_opacity','1');

$menusettings_left = ot_get_option( 'menusettings_left', '1');
$menusettings_rightmenu = ot_get_option( 'menusettings_rightmenu', '1');

$menusettings_lefticontype = ot_get_option( 'menusettings_lefticontype', '1');
$menusettings_righticontype = ot_get_option( 'menusettings_righticontype', '1');
$widgetset_opacity = ot_get_option( 'widgetset_opacity', '0.6');

$menusettings_customlefticon = ot_get_option( 'menusettings_customlefticon');
$menusettings_customrighticon = ot_get_option( 'menusettings_customrighticon');

$tcustomizer_topheaderbackground = ot_get_option( 'tcustomizer_topheaderbackground');
$tcustomizer_topheaderbackground2 = ot_get_option( 'tcustomizer_topheaderbackground2');
$tcustomizer_contentbackground = ot_get_option( 'tcustomizer_contentbackground');
$tcustomizer_topheadercustombgimage = ot_get_option( 'tcustomizer_topheadercustombgimage', '');
$tcustomizer_topheaderheight = ot_get_option( 'tcustomizer_topheaderheight', '40');

$tcustomizer_typography = ot_get_option( 'tcustomizer_typography');
$custom_menu_bg = ot_get_option( 'custom_menu_bg');
$custom_menu_fonthover = ot_get_option( 'custom_menu_fonthover', '#242731');

$hcustomizer_headerbackground = ot_get_option( 'hcustomizer_headerbackground');
$hcustomizer_headerbackground2 = ot_get_option( 'hcustomizer_headerbackground2');
$hcustomizer_headerheight = ot_get_option( 'hcustomizer_headerheight', '40');

$menusettings_riconsize = ot_get_option( 'menusettings_riconsize', '11');
$menusettings_icontype = ot_get_option( 'menusettings_icontype', 't1');
$blogbgcolor = ot_get_option( 'blogbgcolor', '#f4f4f4');
switch ($menusettings_icontype) {
	case 't1':
		$menuiconnormal = "f138";
		$menuicondown = "f13a";
		break;
	case 't2':
		$menuiconnormal = "f0da";
		$menuicondown = "f0d7";
		break;
	case 't3':
		$menuiconnormal = "f054";
		$menuicondown = "f078";
		break;
	case 't4':
		$menuiconnormal = "f114";
		$menuicondown = "f07b";
		break;
	case 't5':
		$menuiconnormal = "f101";
		$menuicondown = "f103";
		break;
	case 't6':
		$menuiconnormal = "f111";
		$menuicondown = "f10c";
		break;
	case 't7':
		$menuiconnormal = "";
		$menuicondown = "f13a";
		break;
}

function wmf_background_map($key,$value){
	
	if($key !=''){
		if($value == 'background-image'){
			echo $value.':url("'.$key.'");';
		}else{
			echo $value.':'.$key.';';
		}
	}

}

function backgroundgradient($color1, $color2){	
	$output = '';
	$output .= 'background: -webkit-gradient(linear, center top, center bottom, from('.$color1 .'), to('.$color2 .'));
				background: -webkit-linear-gradient('.$color1 .', '.$color2 .');
				background: -moz-gradient(linear, center top, center bottom, from('.$color1 .'), to('.$color2 .'));
				background: -moz-linear-gradient('.$color1 .', '.$color2 .');
				background: -ms-gradient(linear, center top, center bottom, from('.$color1 .'), to('.$color2 .'));
				background: -ms-linear-gradient('.$color1 .', '.$color2 .');
				background: -o-gradient(linear, center top, center bottom, from('.$color1 .'), to('.$color2 .'));
				background: -o-linear-gradient('.$color1 .', '.$color2 .');
				background: gradient(linear, center top, center bottom, from('.$color1 .'), to('.$color2 .'));
				background: linear-gradient('.$color1 .', '.$color2 .');';
	echo $output;
}


function mobilihex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }

   return $r.','.$g.','.$b;
}
$logosettings_image = ot_get_option( 'logosettings_image');
if(!empty($logosettings_image)){
$logodata = getimagesize($logosettings_image);
$limgwidth = $logodata[0];
$limgheight = $logodata[1];
}else{
$limgwidth = 0;
$limgheight = 0;
}


global $wmf_mobiledetect;
if(empty($wmf_mobiledetect)){
	require_once('../admin/mobile-detect.php');
	$mobili_mobiledetect = new Mobile_Detect();
}else{$mobili_mobiledetect = $wmf_mobiledetect;}
if( ! $mobili_mobiledetect->isMobile() && ! $mobili_mobiledetect->isTablet() ){	
?>
html, body, .snap-content, #maincontent {height:100%!important; }
<?php 
}else{ 
if( $mobili_mobiledetect->isAndroidOS() && $mobili_mobiledetect->is('Chrome')){
?>
html, body{height:100%!important;overflow:auto!important;overflow-x:hidden!important; }
<?php }}?>
#maincontent {height:100%!important; }



/*------------------------------------*\
    CUSTOM CSS CODE
\*------------------------------------*/
<?php echo $general_customcss;?>
.wmffcontainer .wmffrow article{background: <?php echo $blogbgcolor?>;}

/* Logo settings*/
.mobililogoimg{
display: block;
background-image: url(http://stepoutsolutions.org/projects/bueno/wp-content/themes/Bueno/images/header-logo.png);
background-repeat: no-repeat;
background-size: <?php echo ($limgwidth/2);?>px <?php echo ($limgheight/2);?>px;
margin-right:auto;
margin-left:auto;
width: <?php echo ($limgwidth/2);?>px;
height: <?php echo ($limgheight/2);?>px;	
}

/*------------------------------------*\
    NAVIGATION SYSTEM
\*------------------------------------*/
<?php 
// Menu Settings
$menucustomizer_width = ot_get_option( 'menucustomizer_width', '245');
$custom_menu_border_color = ot_get_option( 'custom_menu_border_color', '#242a37');
$custom_menu_border_color2 = ot_get_option( 'custom_menu_border_color2', '#ffffff');
$menusettings_buttonbg = ot_get_option( 'menusettings_buttonbg','#31394a');
$menusettings_opacity = ot_get_option( 'menusettings_opacity','0.6');
?>

/* Menu Defaults -------------------------------------------------------------------------------------*/
.left-menu{ width:<?php echo $menucustomizer_width + 15?>px;  overflow-y:auto!important;  overflow-x:hidden!important;  -webkit-overflow-scroll:touch!important;  height:100%}
#nav-main, #nav-main2, .left-menu .menu-search{ width:<?php echo $menucustomizer_width?>px;}
.mobili-nav{overflow:hidden;}
.right-menu{ width:<?php echo $menucustomizer_width?>px;  overflow-y:auto!important;  overflow-x:hidden!important;  -webkit-overflow-scroll:touch!important;  height:100%}
#nav-main ul.sub-menu,#nav-main2 ul.sub-menu{display:none}
#nav-main ul,#nav-main2 ul{list-style:none; margin:0; padding:0; text-align:left}
#nav-main ul a,#nav-main2 ul a{ display:block;  text-decoration:none;}
#nav-main ul li,#nav-main2 ul li{display:inline-block; width:100%; border-bottom:1px solid <?php echo $custom_menu_border_color?>; border-top: 1px solid rgba(255, 255, 255, .08);}
ul li.current-menu-item a{font-weight:bold!important; }	
/* Menu Defaults Finish ------------------------------------------------------------------------------*/


/* Menu Icon -----------------------------------------------------------------------------------------*/
#nav-main ul li a i,#nav-main2 ul li a i{margin-right: 6px;}
/* Menu Icon Finish ----------------------------------------------------------------------------------*/


/* Menu Link -----------------------------------------------------------------------------------------*/
#nav-main ul li a,#nav-main2 ul li a{
display:block; padding:12px 0px 14px 15px;
margin:0px 0px;
background-color: rgb(<?php echo mobilihex2rgb($menusettings_buttonbg)?>);
background-color: rgba(<?php echo mobilihex2rgb($menusettings_buttonbg)?>, <?php echo $menusettings_opacity?>);
}
#nav-main ul li a:hover,#nav-main2 ul li a:hover{
background-color:<?php echo $custom_menu_fonthover;?>;
background-color: rgb(<?php echo mobilihex2rgb($custom_menu_fonthover)?>);
background-color: rgba(<?php echo mobilihex2rgb($custom_menu_fonthover)?>, <?php echo $menusettings_opacity?>);
}
/* Menu Link Finish ----------------------------------------------------------------------------------*/

<?php
$hcustomizer_seperatorcolor1 = ot_get_option( 'hcustomizer_seperatorcolor1');
$hcustomizer_contentbg1 = ot_get_option( 'hcustomizer_contentbg1');
?>
/* Menu Header ---------------------------------------------------------------------------------------*/
#nav-main ul li.subhead a,#nav-main2 ul li.subhead a {padding-top: 9px; padding-left:15px;background: none;text-align: left;}
#nav-main ul li.subhead a:hover,#nav-main2 ul li.subhead a:hover {background:none;}
.sidebar-widget{margin-top: -14px; background-color:<?php echo $hcustomizer_contentbg1;?>; background-color: rgba(<?php echo mobilihex2rgb($hcustomizer_contentbg1)?>, <?php echo $widgetset_opacity?>);background-color: rgb(<?php echo mobilihex2rgb($hcustomizer_contentbg1)?>, <?php echo $widgetset_opacity?>)}
.sidebar-widget .subhead .input .fa-input, .sidebar-widget select{width: 90%;text-align: center;margin-left: 15px;margin-right:auto;margin-top: 9px;border: 1px solid <?php echo $hcustomizer_seperatorcolor1;?>;}
.subhead{
<?php array_walk($hcustomizer_headerbackground,'wmf_background_map')?>
height: <?php echo $hcustomizer_headerheight;?>px;
<?php
if($hcustomizer_headerbackground != '' && $hcustomizer_headerbackground2 != ''){
	backgroundgradient('rgba('.mobilihex2rgb($hcustomizer_headerbackground['background-color']).', '.$menusettings_opacity.')','rgba('.mobilihex2rgb($hcustomizer_headerbackground2).', '.$menusettings_opacity.')');
}
?>
border-bottom: 1px solid <?php echo $hcustomizer_seperatorcolor1;?>;border-top: 1px solid <?php echo $hcustomizer_seperatorcolor1;?>;width: 100%!important;display: block!important;overflow:hidden!important;}
.sidebar-widget h3{
<?php array_walk($hcustomizer_headerbackground,'wmf_background_map')?>
height: <?php echo $hcustomizer_headerheight;?>px;
<?php
if($widgetset_opacity == 1){
	if($hcustomizer_headerbackground != '' && $hcustomizer_headerbackground2 != ''){
		backgroundgradient('rgba('.mobilihex2rgb($hcustomizer_headerbackground['background-color']).', '.$menusettings_opacity.')','rgba('.mobilihex2rgb($hcustomizer_headerbackground2).', '.$menusettings_opacity.')');
	}
}else{
	$mmm3 = 0;
	if($hcustomizer_headerbackground != '' && $hcustomizer_headerbackground2 != ''){
		backgroundgradient('rgba('.mobilihex2rgb($hcustomizer_headerbackground['background-color']).', '.$mmm3.')','rgba('.mobilihex2rgb($hcustomizer_headerbackground2).', '.$mmm3.')');
	}

}
?>
border-bottom: 1px solid <?php echo $hcustomizer_seperatorcolor1;?>;border-top: 1px solid <?php echo $hcustomizer_seperatorcolor1;?>;width: 100%!important;display: block!important;overflow:hidden!important;}
.sidebar-widget [class*="widget_"] h3:first-child {border-top: 1px solid <?php echo $hcustomizer_seperatorcolor1;?>}
<?php
$menusettings_leftmenuarea = ot_get_option( 'menusettings_leftmenuarea', '1');
$menusettings_leftsidebararea = ot_get_option( 'menusettings_leftsidebararea', '0');
$menusettings_rightmenuarea = ot_get_option( 'menusettings_rightmenuarea', '0');
$menusettings_rightsidebararea = ot_get_option( 'menusettings_rightsidebararea', '1');

if($menusettings_leftmenuarea == 1 && $menusettings_leftsidebararea == 1){
?>
#nav-main ul li:last-child{border-bottom:none;}
<?php
}
if($menusettings_rightmenuarea == 1 && $menusettings_rightsidebararea == 1){
?>
#nav-main2 ul li:last-child{border-bottom:none;}
<?php }?>
/* Menu Header Finish --------------------------------------------------------------------------------*/


/* Menu After Icon  ----------------------------------------------------------------------------------*/
#nav-main ul li.mobili-menu-parent a:after,#nav-main2 ul li.mobili-menu-parent a:after{content:"\<?php echo $menuicondown?>";font-size: <?php echo $menusettings_riconsize?>px; font-family:FontAwesome; font-weight:normal; font-style:normal; text-decoration:inherit; display:inline; -webkit-font-smoothing:antialiased; float:right; margin-right:20px; opacity:0.6; filter:alpha(opacity=60)}
<?php 
if($menuiconnormal != ''){
?>#nav-main ul li.mobili-menu-item a:after,#nav-main2 ul li.mobili-menu-item a:after{content:"\<?php echo $menuiconnormal?>";font-size: <?php echo $menusettings_riconsize?>px; font-family:FontAwesome; font-weight:normal; font-style:normal; text-decoration:inherit; display:inline; -webkit-font-smoothing:antialiased; float:right; margin-right:20px; opacity:0.6; filter:alpha(opacity=60)}
<?php }?>
#nav-main ul li.subhead a:after,#nav-main2 ul li.subhead a:after{content:""!important;}
<?php if($menuiconnormal != ''){?>
#nav-main ul li ul li a:after,#nav-main2 ul li ul li a:after{content:"\<?php echo $menuiconnormal?>"; font-family:FontAwesome; font-weight:normal; font-style:normal; text-decoration:inherit; display:inline; -webkit-font-smoothing:antialiased; float:right; margin-right:20px; opacity:0.6; filter:alpha(opacity=60); font-size:<?php echo ($menusettings_riconsize - 1)?>px} 
<?php }?>


/* Menu After Icon Finish ----------------------------------------------------------------------------*/
<?php
$submenubutton_bgcolor = ot_get_option( 'submenubutton_bgcolor', '#292f3d');
$submenubutton_bghover = ot_get_option( 'submenubutton_bghover', '#20242f');
$submenu_borderseperatorcolor = ot_get_option( 'submenu_borderseperatorcolor', '#000000');
?>

/* Sub Menu -----------------------------------------------------------------------------------------*/
#nav-main ul li ul li,#nav-main2 ul li ul li{border-bottom:1px solid <?php echo $submenu_borderseperatorcolor?>; border-top: 1px solid rgba(255, 255, 255, .08);}
#nav-main ul li ul li,#nav-main2 ul li ul li{background-color: rgb(<?php echo mobilihex2rgb($submenubutton_bgcolor)?>); background-color: rgba(<?php echo mobilihex2rgb($submenubutton_bgcolor)?>, <?php echo $menusettings_opacity?>);}
#nav-main ul li ul li:hover,#nav-main2 ul li ul li:hover{background-color: rgb(<?php echo mobilihex2rgb($submenubutton_bghover)?>); background-color: rgba(<?php echo mobilihex2rgb($submenubutton_bghover)?>, <?php echo $menusettings_opacity?>);}
#nav-main ul li ul li a,#nav-main2 ul li ul li a{background:none; padding:13px 0px 14px 15px}
#nav-main ul li ul li a:hover,#nav-main2 ul li ul li a:hover{background:none;}
#nav-main ul li ul,#nav-main2 ul li ul{position:relative; top:-2px}
#nav-main ul.sub-menu li:last-child,#nav-main2 ul.sub-menu li:last-child{border-bottom:none!important;}
#nav-main ul li ul li:first-child,#nav-main2 ul li ul li:first-child{border-top:1px solid <?php echo $submenu_borderseperatorcolor?>}
/* Sub Menu Finished ---------------------------------------------------------------------------------*/

/* Sub Menu 2 ----------------------------------------------------------------------------------------*/
#nav-main ul ul li a,#nav-main2 ul ul li a { background: none; border: none; padding: 2px 0px 2px 0px; margin: 0 0 0 27px; }
#nav-main ul ul li ul,#nav-main2 ul ul li ul { margin: 0 0 0 8px; }
/* Sub Menu 2 Finished -------------------------------------------------------------------------------*/


/*------------------------------------*\
    MENU SYSTEM & CONTENT
\*------------------------------------*/

#mobilicontent {<?php array_walk($tcustomizer_contentbackground,'wmf_background_map')?>
-webkit-box-shadow:  0px 0px 5px 4px rgba(0, 0, 0, 0.3);
-moz-box-shadow:  0px 0px 5px 4px rgba(0, 0, 0, 0.3);
-ms-box-shadow:  0px 0px 5px 4px rgba(0, 0, 0, 0.3);
-o-box-shadow:  0px 0px 5px 4px rgba(0, 0, 0, 0.3);
box-shadow:  0px 0px 5px 4px rgba(0, 0, 0, 0.3);
}
#toolbar{
	background:rgba(255, 255, 255, 0.75);
    border-bottom:3px solid #f05a28;
}

<?php if($custom_menu_bg['background-color'] != '' || $custom_menu_bg['background-image'] != ''){ ?>
.snap-drawers{<?php array_walk($custom_menu_bg,'wmf_background_map')?>}
<?php }else{?>
.snap-drawers{background-color:#31394a}
<?php }?>
.snap-drawer{width: <?php echo $menucustomizer_width?>px;}

<?php 
if($menusettings_left == 1){//Left disable
	if(!($menusettings_lefticontype == 1 || $menusettings_lefticontype == 2)){
		echo '#toggle-left{display:none!important;}';
	}
    
	if(!($menusettings_lefticontype == 2 || $menusettings_lefticontype == 3)){
		echo '#toggle-left-text{display:none!important;}';
	}
}else{
	echo '#toggle-left, #left-drawer, #toggle-left-text{display:none!important;}';
} 

if($menusettings_rightmenu == 1){//right disable
	if(!($menusettings_righticontype == 1 || $menusettings_righticontype == 2)){
		echo '#toggle-right{display:none!important;}';
	}
    
	if(!($menusettings_righticontype == 2 || $menusettings_righticontype == 3)){
		echo '#toggle-right-text{display:none!important;}';
	}
}else{
	echo '#toggle-right, #toggle-right-text, #right-drawer{display:none!important;}';
} 
?>

<?php 
if($menusettings_customlefticon != ''){
	echo '#toggle-left{background:url('.$menusettings_customlefticon.') center center no-repeat!important;}';
}

if($menusettings_customrighticon != ''){
	echo '#toggle-right{background:url('.$menusettings_customrighticon.') center center no-repeat!important;}';
}
?>


#toggle-left{  background:url(../images/open.png) center center no-repeat;  background-size:18px 12px;  display:block;  width:44px;  height:60px; }

<?php if($menusettings_left == 1){//Left Active?>
#toggle-right{  background:url(../images/open.png) center center no-repeat;  background-size:18px 12px;  display:block;  width:44px;  height:44px;  float:right;  margin-top:-50px}
<?php }else{?>
#toggle-right{  background:url(../images/open.png) center center no-repeat;  background-size:18px 12px;  display:block;  width:44px;  height:44px;  float:right}
<?php }?>
    
<?php if($menusettings_lefticontype == 3){//Only Icon?>
.left-menu-text{position:absolute; margin-left:15px; margin-top:13px; color:#fff; font-weight:bold; font-size:14px; vertical-align:middle; cursor:pointer}
<?php }else{?>
.left-menu-text{position:absolute; margin-left:37px; margin-top:-31px; color:#fff; font-weight:bold; font-size:14px; vertical-align:middle; cursor:pointer}
<?php }?>

<?php if($menusettings_left == 1){//Left Active?>
	<?php if($menusettings_lefticontype == 3){//Only Icon?>
	.right-menu-text{position:absolute; margin-right:15px; margin-top:13px; color:#fff; font-weight:bold; font-size:14px; vertical-align:middle; cursor:pointer; right:0px}
	<?php }else{?>
	.right-menu-text{position:absolute; margin-right:37px; margin-top:-31px; color:#fff; font-weight:bold; font-size:14px; vertical-align:middle; cursor:pointer; right:0px}
	<?php }?>
<?php }else{?>
	<?php if($menusettings_lefticontype == 3){//Only Icon?>
	.right-menu-text{position:absolute; margin-right:15px; margin-top:13px; color:#fff; font-weight:bold; font-size:14px; vertical-align:middle; cursor:pointer; right:0px}
	<?php }else{?>
	.right-menu-text{position:absolute; margin-right:37px; margin-top:13px; color:#fff; font-weight:bold; font-size:14px; vertical-align:middle; cursor:pointer; right:0px}
	<?php }?>
<?php }?>

/*------------------------------------*\
    CONTENT ELEMENTS
\*------------------------------------*/
.wmf_services_class .wmf_icon_class{background:<?php echo $tcustomizer_contentelementcolor1?>!important;}
.wmf_services_class:hover .wmf_icon_class{background:<?php echo $tcustomizer_contentelementcolor2?>!important;}
.wmf_services_class:hover .wmf_icon_class i{color:<?php echo $tcustomizer_contentelementcolor1?>!important;}
.wmf_services_class .wmf_icon_class:hover:after{border-top:9px solid <?php echo $tcustomizer_contentelementcolor1?>!important;}
.wmfaccordion-heading{border-bottom: 1px solid <?php echo $tcustomizer_contentelementcolor1?>!important;}
a.wmfaccordion-toggle:hover:before{ color: <?php echo $tcustomizer_contentelementcolor1?>!important; }
a.wmfaccordion-toggle:before{ color: <?php echo $tcustomizer_contentelementcolor1?>!important; }
.wmfnav-tabs>li.active>a,.wmfnav-tabs>li.active>a:hover,.wmfnav-tabs>li.active>a:focus{ border-top: 1px solid <?php echo $tcustomizer_contentelementcolor1?>!important; }
.wmfaccordion-heading{border-bottom:1px solid <?php echo $tcustomizer_contentelementcolor1?>!important;}
.wmfaccordion-heading{border-bottom:1px solid <?php echo $tcustomizer_contentelementcolor1?>!important;}
.wmfnav-tabs>li.active>a, .wmfnav-tabs>li.active>a:hover, .wmfnav-tabs>li.active>a:focus{border-top:1px solid <?php echo $tcustomizer_contentelementcolor1?>!important;}
.wmfnav-tabs>li.active>a, .wmfnav-tabs>li.active>a:hover, .wmfnav-tabs>li.active>a:focus{border-top:1px solid <?php echo $tcustomizer_contentelementcolor1?>!important;}
.wmftab-content>.wmftab-pane, .pill-content>.pill-pane{background-color:<?php echo $blogbgcolor?>!important;}
.wmfnav-tabs>li.active>a, .wmfnav-tabs>li.active>a:hover, .wmfnav-tabs>li.active>a:focus, .wmfnav-tabs>li>a{background-color: <?php echo $blogbgcolor?>!important;}
.wmfnav-tabs > li.active > a, .wmfnav-tabs > li.active > a:hover, .wmfnav-tabs > li.active > a:focus {color: <?php echo $tcustomizer_contentelementcolor1?>!important;}
.wmfaccordion-heading {background-color: <?php echo $blogbgcolor?>!important;}
.wmf_separator div {background-color: <?php echo $tcustomizer_contentbackground['background-color']?>!important;}
.wmfaccordion-inner {background-color: <?php echo $blogbgcolor?>!important;}

<?php header('Content-type: text/css'); ?>
<?php //Setup location of WordPress
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0]; 

//Access WordPress
require_once( $path_to_wp.'/wp-load.php' );

/*------------------------------------*\
	TYPOGRAPHY
\*------------------------------------*/
function wmf_fixempty_awd($key,$arr){
	switch ($key) {
    case 'font-family':
		$output = "Helvetica|font-family:'Helvetica Neue', Helvetica, Arial, sans-serif";
		break;
	case 'font-color':
		if($arr == 'custom_menu_font'){
			$output = '#efefef';
			break;
		}elseif($arr == 'hcustomizer_headertext' or $arr == 'hcustomizer_typography1'){
			$output = '#ffffff';
			break;
		}else{
			$output = '#444444';
			break;
		}
	case 'font-style':
		$output = 'normal';
		break;
	case 'font-variant':
	case 'font-weight':
		$output = 'normal';
		break;
	case 'letter-spacing':
		$output = '0em';
		break;
	case 'text-decoration':
	case 'text-transform':
		$output = 'none';
		break;
	case 'font-size':
		if($arr == 'tcustomizer_typography'){
			$output = '12px';
			break;
		}elseif($arr == 'tcustomizer_typographyh1'){
			$output = '24px';
			break;
		}elseif($arr == 'tcustomizer_typographyh2'){
			$output = '22px';
			break;
		}elseif($arr == 'tcustomizer_typographyh3'){
			$output = '18px';
			break;
		}elseif($arr == 'tcustomizer_typographyh5'){
			$output = '12px';
			break;
		}elseif($arr == 'tcustomizer_typographyh6'){
			$output = '10px';
			break;
		}elseif($arr == 'custom_menu_font' or $arr == 'hcustomizer_headertext' or $arr == 'hcustomizer_typography1' or $arr == 'tcustomizer_typographyh4'){
			$output = '14px';
			break;
		}
	case 'line-height':
		if($arr == 'tcustomizer_typographyh1'){
			$output = '24px';
			break;
		}elseif($arr == 'tcustomizer_typographyh2'){
			$output = '20px';
			break;
		}elseif($arr == 'tcustomizer_typographyh3' or $arr == 'tcustomizer_typographyh4' or $arr == 'tcustomizer_typographyh5' or $arr == 'tcustomizer_typographyh6'){
			$output = '16px';
			break;
		}elseif($arr == 'custom_menu_font' or $arr == 'hcustomizer_typography1' or $arr == 'hcustomizer_headertext' or $arr == 'tcustomizer_typography'){
			$output = '17px';
			break;
		}
		
	};
	return $output;
}

function wmf_fix_awd($arr){
	
  $options = get_option( 'option_tree' );
  
  if(is_array($options[$arr])){ 
      foreach($options[$arr] as $key => $value){
          if(empty($value) || $value == NULL || $value == ""){
              $options[$arr][$key] = wmf_fixempty_awd($key,$arr);
          }
      } 
	  return $options[$arr];
  }
}

  
function wmf_getfontstring($fontname){
 
  $tcustomizer_subst = ot_get_option( 'tcustomizer_subst', '');
  if($tcustomizer_subst != '' || ! empty($tcustomizer_subst) || $tcustomizer_subst != NULL){$addtext = '&'.$tcustomizer_subst;}else{$addtext = '';}
  $output = '';
  if ( $fontname != '' ) {
	  
	$myexplode = explode("|", $fontname);
	if($myexplode[0] != 'Helvetica'){
	$output .= '@import url(http://fonts.googleapis.com/css?family='.$myexplode[0].':400,700,600,300,200'.$addtext.');';
	}
	$output .=' ';
	
  }
  
  echo $output;
}

$hcustomizer_headertext = wmf_fix_awd('hcustomizer_headertext');
$hcustomizer_typography1 = wmf_fix_awd('hcustomizer_typography1');
$custom_menu_font = wmf_fix_awd('custom_menu_font');
$tcustomizer_typography = wmf_fix_awd('tcustomizer_typography');
$tcustomizer_typographyhead = wmf_fix_awd('tcustomizer_typographyhead');
$tcustomizer_typographyh1 = wmf_fix_awd('tcustomizer_typographyh1');
$tcustomizer_typographyh2 = wmf_fix_awd('tcustomizer_typographyh2');
$tcustomizer_typographyh3 = wmf_fix_awd('tcustomizer_typographyh3');
$tcustomizer_typographyh4 = wmf_fix_awd('tcustomizer_typographyh4');
$tcustomizer_typographyh5 = wmf_fix_awd('tcustomizer_typographyh5');
$tcustomizer_typographyh6 = wmf_fix_awd('tcustomizer_typographyh6');


function wmf_typography_map($key,$value){
	
	if($value == 'font-family'){
		if($key != ''){
			$myexplode = explode("|", $key);
			if(count($myexplode) == 2){
				if($myexplode[0] == 'Helvetica'){
					echo "font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;";	
				}else{
					echo $myexplode[1];
				}
			}else{
				echo "font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;";	
			}
		}else{
			echo "font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;";
		}
	}else{
	echo str_replace('font-color', 'color', $value).':'.$key.';';
	}
}

wmf_getfontstring($custom_menu_font['font-family']);
wmf_getfontstring($hcustomizer_typography1['font-family']);
wmf_getfontstring($hcustomizer_headertext['font-family']);
wmf_getfontstring($tcustomizer_typography['font-family']);
wmf_getfontstring($tcustomizer_typographyhead['font-family']);
wmf_getfontstring($tcustomizer_typographyh1['font-family']);
wmf_getfontstring($tcustomizer_typographyh2['font-family']);
wmf_getfontstring($tcustomizer_typographyh3['font-family']);
wmf_getfontstring($tcustomizer_typographyh4['font-family']);
wmf_getfontstring($tcustomizer_typographyh5['font-family']);
wmf_getfontstring($tcustomizer_typographyh6['font-family']);


$logosettings_topmargin = ot_get_option( 'logosettings_topmargin');

$tcustomizer_linktexttypo = ot_get_option( 'tcustomizer_linktexttypo');
$tcustomizer_linktexthovertypo = ot_get_option( 'tcustomizer_linktexthovertypo');
?>


/*------------------------------------*\
    TYPOGRAPHY
\*------------------------------------*/
body{<?php array_walk($tcustomizer_typography,'wmf_typography_map')?>}
a {
	color:<?php echo $tcustomizer_linktexttypo?>;
	text-decoration:none;
}
a:hover {
	color:<?php echo $tcustomizer_linktexthovertypo?>;
}
h1{<?php array_walk($tcustomizer_typographyh1,'wmf_typography_map')?>}
h2{<?php array_walk($tcustomizer_typographyh2,'wmf_typography_map')?>}
h3{<?php array_walk($tcustomizer_typographyh3,'wmf_typography_map')?>}
h4{<?php array_walk($tcustomizer_typographyh4,'wmf_typography_map')?>}
h5{<?php array_walk($tcustomizer_typographyh5,'wmf_typography_map')?>}
h6{<?php array_walk($tcustomizer_typographyh6,'wmf_typography_map')?>}
#toolbar h1{<?php array_walk($tcustomizer_typographyhead,'wmf_typography_map')?>text-align:center;position:absolute;top:0;right:44px;left:44px;width:auto;height:46px;margin: 0;margin-top: <?php echo $logosettings_topmargin?>px;}
#nav-main ul li a,#nav-main2 ul li a{<?php array_walk($custom_menu_font,'wmf_typography_map')?>}
#nav-main ul li.subhead a,#nav-main2 ul li.subhead a, .subhead .input .search-query, .sidebar-widget h3{<?php array_walk($hcustomizer_headertext,'wmf_typography_map')?>}
.sidebar-widget, .sidebar-widget li, .sidebar-widget a,.sidebar-widget p, .sidebar-widget #jstwitter, .sidebar-widget #jstwitter .tweet a, .sidebar-widget #jstwitter .tweet .time, .sidebar-widget select{<?php array_walk($hcustomizer_typography1,'wmf_typography_map')?>} .item-icon.circlewmf {border-color:<?php echo $custom_menu_font['font-color'];?>!important;} .item-icon.circlewmf{color:<?php echo $custom_menu_font['font-color'];?>!important;}
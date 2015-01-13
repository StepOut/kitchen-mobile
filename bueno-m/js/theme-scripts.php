<?php header('Content-type: text/javascript');?>
<?php //Setup location of WordPress
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

//Access WordPress
require_once( $path_to_wp.'/wp-load.php' );

$menusettings_left = ot_get_option( 'menusettings_left', '1');
$menusettings_rightmenu = ot_get_option( 'menusettings_rightmenu', '1');

$menusettings_lefticontype = ot_get_option( 'menusettings_lefticontype', '1');
$menusettings_righticontype = ot_get_option( 'menusettings_righticontype', '1');

$menucustomizer_width = ot_get_option( 'menucustomizer_width', '265');

$tcustomizer_topheaderheight = ot_get_option( 'tcustomizer_topheaderheight', '40');
$general_tapclose = ot_get_option( 'general_tapclose', 'true');
$general_disabledragf = ot_get_option( 'general_disabledragf', 'true');
?>
(function($) {
  "use strict";
	$('.rev_slider_wrapper').attr('data-snap-ignore', 'true');
    
    function mobili_setminheight() {
        var height = $(window).height() - <?php echo $tcustomizer_topheaderheight;?>;
        $("#maincontent").css('min-height',height);
    }
    
    $(document).ready(function() {
        mobili_setminheight();
    });
    
    $(".wmfloadingani").click(function(){
    	$(".wmfloadingani").css("display","none");
    });
    
    $('.instruction').click(function(e) {
        $('.instructionlayer').css('display','block');
    });
	
	$('.instructionimg').click(function(e) {
        $('.instructionlayer').css('display','none');
    });
	
	$('.instructionlayer').click(function(e) {
        $('.instructionlayer').css('display','none');
    });
    
})(jQuery);

// SVG fallback
	// toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script#update
function ModernizrStart()
{
	"use strict";
	if (!Modernizr.svg) {
		var imgs = document.getElementsByTagName('img');
		var dotSVG = /.*\.svg$/;
		for (var i = 0; i != imgs.length; ++i) {
			if(imgs[i].src.match(dotSVG)) {
				imgs[i].src = imgs[i].src.slice(0, -3) + "png";
			}
		}
	}
}
ModernizrStart();

<?php if($menusettings_left == 1 || $menusettings_rightmenu == 1){?>
// Snap Menu
function snapmenu(){
   
   "use strict";
    
	var 
	// Helper
	$ = function(id){
		return document.getElementById(id);
	},
	
	// Instance
	snapper = new Snap({
		element: document.getElementById('mobilicontent')
	}),
    

	UpdateDrawers = function(){
		var state = snapper.state(),
			towards = state.info.towards,
			opening = state.info.opening;
        <?php if($menusettings_left == 1 && $menusettings_rightmenu == 1){?>
		if(opening=='right' && towards=='left'){
			$('right-drawer').classList.add('active-drawer');
			$('left-drawer').classList.remove('active-drawer');
		} else if(opening=='left' && towards=='right') {
			$('right-drawer').classList.remove('active-drawer');
			$('left-drawer').classList.add('active-drawer');
		}
        <?php }?>
        <?php if($menusettings_left == 1 && $menusettings_rightmenu == 0){?>
        if(opening=='right' && towards=='left'){
			$('right-drawer').classList.add('active-drawer');
			$('left-drawer').classList.remove('active-drawer');
		}
        <?php }?>
        <?php if($menusettings_rightmenu == 1 && $menusettings_left == 0){?>
        if(opening=='left' && towards=='right') {
			$('right-drawer').classList.remove('active-drawer');
			$('left-drawer').classList.add('active-drawer');
		}
        <?php }?>
        
        var settingss = {
        <?php
		if($menusettings_left != 1){
			echo 'disable:\'left\','."\r\n";
		}elseif($menusettings_rightmenu != 1){
			echo 'disable:\'right\','."\r\n";
		}
		?>
            transitionSpeed: 0.3,
            easing: 'ease',
            maxPosition: <?php echo $menucustomizer_width?>,
            minPosition: -<?php echo $menucustomizer_width?>,
            tapToClose: <?php echo $general_tapclose?>,
            touchToDrag: <?php echo $general_disabledragf?>
        };
    
        snapper.settings(settingss);
            
        };
	
    
	snapper.on('drag', UpdateDrawers);
	snapper.on('animating', UpdateDrawers);
	snapper.on('animated', UpdateDrawers);
    
	var settingss = {
        <?php
		if($menusettings_left != 1){
			echo 'disable:\'left\','."\r\n";
		}elseif($menusettings_rightmenu != 1){
			echo 'disable:\'right\','."\r\n";
		}
		?>
            transitionSpeed: 0.3,
            easing: 'ease',
            maxPosition: <?php echo $menucustomizer_width?>,
            minPosition: -<?php echo $menucustomizer_width?>,
            tapToClose: true,
            touchToDrag: true
        };
    <?php if($menusettings_left == 1){?>
    
		<?php if($menusettings_lefticontype == 1 || $menusettings_lefticontype == 2){?>
        $('toggle-left').addEventListener('click', function(){
            snapper.settings(settingss);
            snapper.open('left');
        });
        <?php }?>
        
		<?php if($menusettings_lefticontype == 2 || $menusettings_lefticontype == 3){?>
        $('toggle-left-text').addEventListener('click', function(){
        	snapper.settings(settingss);
            snapper.open('left');
        });
        <?php }?>
        
    <?php }?>
	
	<?php if($menusettings_rightmenu == 1){?>
    
		<?php if($menusettings_righticontype == 1 || $menusettings_righticontype == 2){?>
        $('toggle-right').addEventListener('click', function(){
            snapper.settings(settingss);
            snapper.open('right');
            
        });
        <?php }?>
     
		<?php if($menusettings_righticontype == 2 || $menusettings_righticontype == 3){?>
        $('toggle-right-text').addEventListener('click', function(){
            snapper.settings(settingss);
            snapper.open('right');
        });
        <?php }?>
        
    <?php }?>
  
}
snapmenu();
<?php }?>

//Hide Address Bar
function hideAddressBar()
{
  if(!window.location.hash) 
  {
	  if(document.height < window.outerHeight)
	  {
		  document.body.style.height = (window.outerHeight + 50) + 'px'; 
	  }

	  setTimeout( function(){ window.scrollTo(0, 1); }, 50 );
  }
}
window.addEventListener("load", function(){ if(!window.pageYOffset){ hideAddressBar(); } } );
window.addEventListener("orientationchange", hideAddressBar ); 


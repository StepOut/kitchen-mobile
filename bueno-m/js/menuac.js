(function($) {
	"use strict";
	//Has submenu
	  $(window).load(
	  function() {
		  var checkElement = $('#nav-main ul li');
		  checkElement.has('ul').addClass('mobili-menu-parent');
		  checkElement.has(':not(ul)').addClass('mobili-menu-item');
		  checkElement.has('ul').removeClass('mobili-menu-item');
		  var checkElement2 = $('#nav-main2 ul li');
		  checkElement2.has('ul').addClass('mobili-menu-parent');
		  checkElement2.has(':not(ul)').addClass('mobili-menu-item');
		  checkElement2.has('ul').removeClass('mobili-menu-item');
	  });
	$(document).ready( function($) {
	
	  
		
	  $('#nav-main ul li a').click(
		function() {
		  var checkElement = $(this).next();
		  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			$(this).parent().siblings("li:has(ul)").find("ul").slideUp('normal');      	      	
			$('#nav-main ul ul li ul:hidden').slideUp('normal');
			checkElement.slideUp('normal');
			/*$('#nav-main li.mobili-menu-parent').removeClass('bbfix');*/
			return false;
			}
		  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$(this).parent().siblings("li:has(ul)").find("ul").slideUp('normal');      	      	
			$('#nav-main ul ul li ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
			/*$('#nav-main li.mobili-menu-parent').addClass('bbfix');*/
			return false;
			}
		  }
		);
	  $('#nav-main2 ul li a').click(
		function() {
		  var checkElement = $(this).next();
		  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			$(this).parent().siblings("li:has(ul)").find("ul").slideUp('normal');      	      	
			$('#nav-main2 ul ul li ul:hidden').slideUp('normal');
			checkElement.slideUp('normal');
			/*$('#nav-main li.mobili-menu-parent').removeClass('bbfix');*/
			return false;
			}
		  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$(this).parent().siblings("li:has(ul)").find("ul").slideUp('normal');      	      	
			$('#nav-main2 ul ul li ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
			/*$('#nav-main li.mobili-menu-parent').addClass('bbfix');*/
			return false;
			}
		  }
		);
	  //Third Level
	  /*$('#nav-main ul ul li a').click(
		function() {
		  var checkElement = $(this).next();
		  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			$('#nav-main ul ul').slideUp('normal');    
			$('#nav-main ul ul li ul:hidden').slideUp('normal');
			checkElement.slideUp('normal');
			
			return false;
			}
		  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$('#nav-main ul ul').slideUp('normal');    
			$('#nav-main ul ul li ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
			return false;
			}
		  }
		);	
	 */
	});
	
})(jQuery);
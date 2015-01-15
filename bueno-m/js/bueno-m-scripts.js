// JavaScript Document

jQuery(document).ready(function(e) {
    jQuery("#content ul.products li.product-cat-package#bueno-product-tiles").css("display","none"); //for package tile loading
	jQuery("#content ul.products li.product-cat-package#bueno-package-tiles").css("display","block");
});

jQuery(".view-package-back").click(function(e) {
	jQuery(this).parents(".front").hide('slow');
    jQuery(this).parents(".front").siblings(".back").show('fast');
});
jQuery(".view-package-front").click(function(e) {		
    jQuery(this).parents(".back").hide('slow');
    jQuery(this).parents(".back").siblings(".front").show('fast');
});
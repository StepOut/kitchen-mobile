// JavaScript Document

jQuery(document).on("click", ".add_quantity", function(){
	jQuery(this).hide();
});

jQuery(document).on("click", "#add-service label.service", function() { //saves selected service in session
	jQuery(this).children(".select-service").toggle();
	jQuery(this).children(".unselect-service").toggle();
    jQuery.ajax({
		type: 'POST',
    	url: '../save-comment',
    	data: {
			service: jQuery(this).children("input[type=hidden]").val()
		},
       	success: function(response, textStatus, jqXHR){
        }
	});
});

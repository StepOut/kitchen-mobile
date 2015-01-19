// JavaScript Document

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

jQuery(document).on("focusout", ".product-spcl-cmnt", function() {
	//alert(jQuery(this).val()+jQuery(this).siblings("input[name=product-id]").val()+jQuery(this).siblings("input[name=product-key]").val());
    jQuery.ajax({
		type: 'POST',
       	url: '../save-comment',
       	data: {
			spcl_cmnt: jQuery(this).val(),
			id: jQuery(this).siblings("input[name=product-id]").val(),
			key: jQuery(this).siblings("input[name=product-key]").val()
		},
       	success: function(response, textStatus, jqXHR){
			//alert(response);
        }
	});
});

jQuery(document).on("click", "input.add_quantity", function(e) { // increments the item quantity in cart by 1
	e.preventDefault();
	var input_field_name = "cart[" + this.id + "][qty]";
	var value = jQuery("input[name='"+input_field_name+"']").val( );
	value = parseInt(value,10);
    jQuery("input[name='"+input_field_name+"']").val(value+1);
	update_quantity_sideMenu();	
});

jQuery(document).on("click", "input.remove_quantity", function(e) { // decrements the item quantity in cart by 1
	var input_field_name = "cart[" + this.id + "][qty]";
	var value = jQuery("input[name='"+input_field_name+"']").val( );
	value = parseInt(value,10);
	if(value>1){
        jQuery("input[name='"+input_field_name+"']").val(value-1);
		//update_quantity_sideMenu();
	}
	return;
});
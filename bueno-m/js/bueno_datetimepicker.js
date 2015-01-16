// JavaScript Document

var bueno_date1 = new Date();
var bueno_date1 = bueno_date1.getDate()+1;
var bueno_month1 = new Date();
var bueno_month1 = bueno_month1.getMonth();
var bueno_hours1 = new Date();
var bueno_hours1 = bueno_hours1.getHours();
var bueno_year1 = new Date();
var bueno_year1 = bueno_year1.getYear();

var logic = function( currentDateTime ){
	if( currentDateTime.getDate()==bueno_date1 && currentDateTime.getMonth()==bueno_month1 ){
		this.setOptions({
			minTime: bueno_hours1+':00'
		});
	}else
		this.setOptions({
			minTime:'0:00'
		});
	
};
var logic2 = function( currentDateTime ){
	if( currentDateTime.getDate()==bueno_date1){
		
		for(var i = 1; i<23; i++){
			if(i <= bueno_hours1){
				jQuery(".xdsoft_time_box .xdsoft_time").eq(i-1).hide();
			}
		}
	}
};
var logic4 = function( currentDateTime ){
	jQuery("#datetimepicker3").val(null);	
}

jQuery('#datetimepicker3').datetimepicker({
	inline: true,
	minDate: '-1969/12/31',
	startDate: '2015/01/'+bueno_date1,
	onGenerate: logic2,
	onChangeDateTime:logic,
	onShow: logic,
	onSelectDate: logic4	
});

jQuery(document).on("click", ".xdsoft_calendar",
	function(e){
		alert("hi");
	}
);

jQuery("#btn1").click(function(e) {
	var val1 = jQuery("#datetimepicker3").val();
    alert(val1);
});

// date time picker validation

/*jQuery(document).on("click", "#cart-proceed", function(e){
	if(jQuery("#datetimepicker3").val() !=null){
		jQuery("#cart-proceed").hide();
		jQuery("#cart-proceed-disable").show();
	}
});
jQuery(document).on("click", "#cart-proceed-disable", function(e){
	//alert(jQuery("#datetimepicker3").val());
	if(!(jQuery("#datetimepicker3").val())){
		jQuery("#cart-proceed-disable").hide();
		jQuery("#cart-proceed").show();
	}
});*/
jQuery(document).on("change", "#datetimepicker3", function(e){
	//alert(jQuery("#datetimepicker3").val());
	jQuery.ajax({
			type: 'POST',
          	url: 'http://stepoutsolutions.org/projects/bueno/save-comment',
          	data: {
				date: jQuery("#datetimepicker3").val()
			},
          	success: function(response, textStatus, jqXHR){
						
						
            }
	});
	if(jQuery("#datetimepicker3").val() == ""){
		jQuery("#cart-proceed").attr('disabled','disabled');
	}
	else{
		jQuery("#cart-proceed").removeAttr('disabled');
		
	}
});

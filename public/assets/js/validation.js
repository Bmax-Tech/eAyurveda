// JavaScript Document

/* ******************* Global Functions ********************* */

// Constant Variables
var ALPH_PATTERN = /^[A-Za-z]+$/;//Use to check alphabetical pattern
var NUM_PATTERN = /[0-9]|\./;//Use to check numerical pattern
var EMAIL_PATTERN = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;//Use to check email`s pattern
var PHONE_PATTERN = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[ ]?([0-9]{4})$/;//Use to check phone number pattern
var NIC_PATTERN = /^\(?([0-9]{9})\)?[Vv]$/;//Use to check phone number pattern

// function checks for input text is empty or not
function valid_length_input(para_1){
	if($("input[name="+para_1+"]").val().length == 0){
		//return true when input field is empty
		return true;
	}else{
		//return false when input field has some value
		return false;
	}
};

// function check whether input field contain only letter
function check_input_no_num(para_1){
	if(ALPH_PATTERN.test($("input[name="+para_1+"]").val())){
		// if all are letters return true
		return false;
	}else{
		// if some numbers found return false
		return true;
	}
};

// function checks for Key Events is not a number
function only_alph(evt){
	var theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;
	key = String.fromCharCode( key );
	if(NUM_PATTERN.test(key)) {
		//if number is found in keypress event ignore that value
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	}
};

//function validate email address
function valid_email(para_1){
	return EMAIL_PATTERN.test($("input[name="+para_1+"]").val());
}

//function validate phone number
function valid_phone_no(para_1){
	return PHONE_PATTERN.test($("input[name="+para_1+"]").val());
};

//function validate NIC
function valid_nic_no(para_1){
	return NIC_PATTERN.test($("input[name="+para_1+"]").val());
};

//function validate password and confirm password matches
function valid_confirm_password(para_1,para_2){
	if($("input[name="+para_1+"]").val() == $("input[name="+para_2+"]").val()){
		return true;
	}else{
		return false;
	}
};

/* ********************************************************** */

// This is for advanced search drop down
var ad_s=false;
$("#c_advance_search_drop").click(function(){
	if(ad_s){
		$("#c_advance_search_box").fadeOut();
		ad_s = false;
	}else{
		$("#c_advance_search_box").fadeIn();
		ad_s = true;
	}
});

$("#sign_in_up_btn").click(function(){
	$(".c_pop_up_box_1").fadeIn(200);	
});
$(".c_close_btn").click(function(){
	$(".c_pop_up_box_1").fadeOut(100);	
});

$(document).ready(function(e) {
	$(window).resize(function(){
		if($(window).width() < 1183){
			$("#c_search_filter_box").removeClass("c_search_filter_box_fixed");
		}
	});

	// This Scroll used in search result page
	$(window).scroll(function () {
		if($(window).scrollTop()>198 && $(window).width() >= 1183){
			$("#c_search_filter_box").addClass("c_search_filter_box_fixed");
		}else{
			$("#c_search_filter_box").removeClass("c_search_filter_box_fixed");
		}
	});

	// This Scroll is used in home page
	$(window).scroll(function () {
		if($(window).scrollTop() > 640 && $(window).scrollTop() < 1071 && $(window).width() >= 1183){
			$(".c_side_bar_ul").removeClass("c_side_nav_active");
			$("#featured_sd_btn").addClass("c_side_nav_active");
		}else if($(window).scrollTop() > 1071 && $(window).scrollTop() < 1482 && $(window).width() >= 1183){
			$(".c_side_bar_ul").removeClass("c_side_nav_active");
			$("#top_sd_btn").addClass("c_side_nav_active");
		}else if($(window).scrollTop()>1482 && $(window).scrollTop() < 1776 && $(window).width() >= 1183){
			$(".c_side_bar_ul").removeClass("c_side_nav_active");
			$("#com_sd_btn").addClass("c_side_nav_active");
		}else if($(window).scrollTop()>1776 && $(window).width() >= 1183){
			$(".c_side_bar_ul").removeClass("c_side_nav_active");
			$("#loc_sd_btn").addClass("c_side_nav_active");
		}

	});
});


/* --- Registration form validation start --- */

// This functions is to view inline warnings
function show_warning(para_1){
	//display the relevant span warning message
	$("#wrn_"+para_1).show(0);
};

// This function is to hide warnings
function remove_wrn(para_1){
	//hide the relevant span warning message
	$("#wrn_"+para_1).hide(0);
};

function valid_registration(){
	if(valid_length_input('first_name') || check_input_no_num('first_name') || valid_length_input('last_name')  || check_input_no_num('last_name') || $("#reg_gender").val() == 'select' || valid_length_input('dob') || valid_length_input('nic') || !valid_nic_no('nic') || valid_length_input('contact_number') || !valid_phone_no('contact_number') || valid_length_input('email') || !valid_email('email') || valid_length_input('username') || valid_length_input('password') || valid_length_input('confirm_password') || !valid_confirm_password('password','confirm_password')){

		if(valid_length_input('first_name') || check_input_no_num('first_name')){
			show_warning('first_name');
		}
		if(valid_length_input('last_name')  || check_input_no_num('last_name')){
			show_warning('last_name');
		}
		if($("#reg_gender").val() == 'select'){
			show_warning('gender');
		}
		if(valid_length_input('dob')){
			show_warning('dob');
		}
		if(valid_length_input('nic') || !valid_nic_no('nic')){
			show_warning('nic');
		}
		if(valid_length_input('contact_number') || !valid_phone_no('contact_number')){
			show_warning('contact_number');
		}
		if(valid_length_input('email') || !valid_email('email')){
			show_warning('email');
		}
		if(valid_length_input('username')){
			show_warning('username');
		}
		if(valid_length_input('password')){
			show_warning('password');
		}
		if(valid_length_input('confirm_password')){
			show_warning('confirm_password');
		}
		if(!valid_confirm_password('password','confirm_password')){
			show_warning('confirm_password');
		}
		return false;
	}else{
		//alert("Success");
		return true;
	}

};

/* --- Registration form validation end --- */

// JavaScript Document
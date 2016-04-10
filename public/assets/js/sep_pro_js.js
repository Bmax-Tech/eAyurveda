// JavaScript Document

/*
 * ~~~~~~~~~~~~~~~~~~~~~
 * Global Variables >>>>
 * ~~~~~~~~~~~~~~~~~~~~~
 */

var URL='/ajax';// Default Ajax Posting URL
var ALPH_PATTERN = /^[A-Za-z]+$/;//Use to check alphabetical pattern
var NUM_PATTERN = /[0-9]|\./;//Use to check numerical pattern
var EMAIL_PATTERN = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;//Use to check email`s pattern
var PHONE_PATTERN = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[ ]?([0-9]{4})$/;//Use to check phone number pattern
var NIC_PATTERN = /^\(?([0-9]{9})\)?[Vv]$/;//Use to check phone number pattern
var AJAX_CHECK_EMAIL = true; // Status after checking email
var AJAX_CHECK_USERNAME = true; // Status after checking username
var PASSWORD_PATTERN = false;// Status of password pattern
var CAPTCHA_VERIFY = false;// Status of the captcha verification

/*
 * ~~~~~~~~~~~~~~~~~~~~~
 * Global Variables <<<<
 * ~~~~~~~~~~~~~~~~~~~~~
 */


/*
 * ~~~~~~~~~~~~~~~~~~~~~
 * Global Functions >>>>
 * ~~~~~~~~~~~~~~~~~~~~~
 */
/*
 * function checks for input text is empty or not
 */
function valid_length_input(para_1){
	if($("input[name="+para_1+"]").val().length == 0){
		/* return true when input field is empty */
		return true;
	}else{
		/* return false when input field has some value */
		return false;
	}
};

/*
 *  function check whether input field contain only letter
 */
function check_input_no_num(para_1){
	if(ALPH_PATTERN.test($("input[name="+para_1+"]").val())){
		/* if all are letters return true */
		return false;
	}else{
		/* if some numbers found return false */
		return true;
	}
};

/*
 * function checks for Key Events is not a number
 */
function only_alph(evt){
	var theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;
	key = String.fromCharCode( key );
	if(NUM_PATTERN.test(key) || evt.which == 32 || (evt.keyCode >= 96 && evt.keyCode <= 111)) {
		/* if number is found in keypress event ignore that value */
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	}
};

/*
 * function validate email address
 */
function valid_email(para_1){
	return EMAIL_PATTERN.test($("input[name="+para_1+"]").val());
}

/*
 * function validate phone number
 */
function valid_phone_no(para_1){
	return PHONE_PATTERN.test($("input[name="+para_1+"]").val());
};

/*
 * function validate NIC
 */
function valid_nic_no(para_1){
	return NIC_PATTERN.test($("input[name="+para_1+"]").val());
};

/*
 * function validate password and confirm password matches
 */
function valid_confirm_password(para_1,para_2){
	if($("input[name="+para_1+"]").val() == $("input[name="+para_2+"]").val()){
		return true;
	}else{
		return false;
	}
};

/*
 * function validate password field entered characters pattern
 */
$(".password_regx").on('keyup',function(){

	if($(".password_regx").val().length  == 0){
		$(".c_password_inputs").fadeOut();
	}else{
		$(".c_password_inputs").fadeIn();
	}

	/* ~~~~~~~~~~~~~~~~~~
	 * All regex patterns
	 */
	var lower_case = /^(?=.*[a-z]).+$/;
	var user_case = /^(?=.*[A-Z]).+$/;
	var nums = /^(?=.*[0-9]).+$/;
	var special_chars = /^(?=.*[^\w\s]).+$/;
	/*
	 * All regex patterns
	 * ~~~~~~~~~~~~~~~~~~
	 */

	if($(".password_regx").val().length > 7){
		$("#in_ps_ch_1").css('color','#FFF700');
		$("#in_ps_ch_1").html('<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must be at least 8 characters long.');
	}else{
		$("#in_ps_ch_1").css('color','#FFF');
		$("#in_ps_ch_1").html('<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must be at least 8 characters long.');
	}

	var value_ps = $(".password_regx").val();

	if(lower_case.test(value_ps)){
		$("#in_ps_ch_2").css('color','#FFF700');
		$("#in_ps_ch_2").html('<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain a lowercase letter.');
	}else{
		$("#in_ps_ch_2").css('color','#FFF');
		$("#in_ps_ch_2").html('<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain a lowercase letter.');
	}
	if(user_case.test(value_ps)){
		$("#in_ps_ch_3").css('color','#FFF700');
		$("#in_ps_ch_3").html('<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain an uppercase letter.');
	}else{
		$("#in_ps_ch_3").css('color','#FFF');
		$("#in_ps_ch_3").html('<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain an uppercase letter.');
	}
	if(nums.test(value_ps) || special_chars.test(value_ps)){
		$("#in_ps_ch_4").css('color','#FFF700');
		$("#in_ps_ch_4").html('<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain a number or special character.');
	}else{
		$("#in_ps_ch_4").css('color','#FFF');
		$("#in_ps_ch_4").html('<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Must contain a number or special character.');
	}

	/*
	 * this will check all patterns are matching with entered password
	 */
	if($(".password_regx").val().length > 7 && lower_case.test(value_ps) && user_case.test(value_ps) && (nums.test(value_ps) || special_chars.test(value_ps))){
		PASSWORD_PATTERN = true;
	}else{
		PASSWORD_PATTERN = false;
	}

});

/*
 * Close Regx Warning Message
 */
$(".password_regx").on('focusout',function() {
	$(".c_password_inputs").fadeOut();
});

/*
 * ~~~~~~~~~~~~~~~~~~~~~
 * Global Functions <<<<
 * ~~~~~~~~~~~~~~~~~~~~~
 */

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

/*
 * Home Page Sliders
 */
$(document).ready(function() {

	$("#featured_doc_slider").owlCarousel({
		autoPlay: 5000, //Set AutoPlay to 3 seconds
		items : 4,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3]
	});

	$("#home_slider").owlCarousel({
		autoPlay: 7000,
		//navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		paginationSpeed : 700,
		singleItem:true
	});

});

/*
 * This is for advanced search drop down
 */
var ad_s=false;
$("#c_advance_search_drop").click(function(){
	if(ad_s){
		$("#c_advance_drop_span").removeClass('glyphicon glyphicon-triangle-top');
		$("#c_advance_drop_span").addClass('glyphicon glyphicon-triangle-bottom');
		$("#c_advance_search_box").fadeOut();
		ad_s = false;
	}else{
		$("#c_advance_drop_span").removeClass('glyphicon glyphicon-triangle-bottom');
		$("#c_advance_drop_span").addClass('glyphicon glyphicon-triangle-top');
		$("#c_advance_search_box").fadeIn();
		ad_s = true;
	}
});

$("#c_forgotten_pass_link").click(function(){
	$("#c_sign_in_box").hide();
	$("#c_forgotten_pass_box").fadeIn();
});

$("#sign_in_up_btn").click(function(){
	$(".c_pop_up_box_1").fadeIn(200);	
});
$(".c_close_btn").click(function(){
	$(".c_pop_up_box_1").fadeOut(100,function(){
		$("#c_sign_in_box").show();
		$("#c_forgotten_pass_box").hide();
		$("#c_fog_reset_loading").hide();
		$("#c_access_code_box").hide();
		$("#c_change_pass_box").hide();
		$("#c_change_pass_suc_box").hide();
	});
});

$(document).ready(function(e) {
	if($("#home_hidden_check").val() == 'YES'){
		$(".c_side_nav_bar").fadeIn();
	}

	$(window).resize(function(){
		if($(window).width() < 1183){
			$("#c_search_filter_box").removeClass("c_search_filter_box_fixed");
		}
	});

	/* This Scroll used in search result page */
	$(window).scroll(function () {
		if($(window).scrollTop()>198 && $(window).width() >= 1183){
			$("#c_search_filter_box").addClass("c_search_filter_box_fixed");
		}else{
			$("#c_search_filter_box").removeClass("c_search_filter_box_fixed");
		}
	});

	/* This Scroll is used in home page */
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


/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 * Registration form validation
 */

/* This functions is to view inline warnings */
function show_warning(para_1){
	//display the relevant span warning message
	$("#wrn_"+para_1).show(0);
};

/* This function is to hide warnings */
function remove_wrn(para_1){
	//hide the relevant span warning message
	$("#wrn_"+para_1).hide(0);
};

function valid_registration(){
	if(valid_length_input('first_name') || check_input_no_num('first_name') || valid_length_input('last_name')  || check_input_no_num('last_name') || valid_length_input('dob') || valid_length_input('nic') || !valid_nic_no('nic') || valid_length_input('contact_number') || !valid_phone_no('contact_number') || valid_length_input('email') || !valid_email('email') || valid_length_input('username') || valid_length_input('password') || valid_length_input('confirm_password') || !valid_confirm_password('password','confirm_password') || !PASSWORD_PATTERN){

		if(valid_length_input('first_name') || check_input_no_num('first_name')){
			show_warning('first_name');
		}
		if(valid_length_input('last_name')  || check_input_no_num('last_name')){
			show_warning('last_name');
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
			$('#wrn_email').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter email address');
			show_warning('email');
		}
		if(valid_length_input('username')){
			$('#wrn_username').html('enter username');
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
		if(!PASSWORD_PATTERN){
			$(".c_password_inputs").fadeIn();
		}

		return false;
	}else {
		check_reg_existing('email',$('input[name=email]').val());
		check_reg_existing('username',$('input[name=username]').val());

		if (!AJAX_CHECK_EMAIL || !AJAX_CHECK_USERNAME) {
			if (!AJAX_CHECK_EMAIL) {
				$('#wrn_email').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> already taken');
				show_warning('email');
			}
			if (!AJAX_CHECK_USERNAME) {
				$('#wrn_username').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> already taken');
				show_warning('username');
			}

			return false;
		} else if (!CAPTCHA_VERIFY) {
			$(".c_captcha_pop_up").fadeToggle();

			return false;
		} else {
			return true;
		}
	}

};

/* Registration form validation
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 */

/*
 * This removes highlighted textbox color
 */
function remove_highlight(para_1,para_2){
	$("#"+para_1).removeClass(para_2);
}

/*
 * This removes highlighted textbox color
 */
function add_input_box_wrn(para_1){
	$("#"+para_1).addClass('c_error_input_field_highlight');
};

/*
 * ~~~~~~~~~~~~~~~~~~~~~~~
 * Forgotten Password Form
 */
function check_forgotten_password_form(){
	$("#reset_ps_username").removeClass('c_error_input_field_highlight');
	$("#reset_ps_email").removeClass('c_error_input_field_highlight');

	if(valid_length_input('reset_ps_username') || valid_length_input('reset_ps_email')){
		if(valid_length_input('reset_ps_username')){
			add_input_box_wrn('reset_ps_username');
		}
		if(valid_length_input('reset_ps_email') || !valid_email('reset_ps_email')){
			add_input_box_wrn('reset_ps_email');
		}

		return false;
	}else{
		check_username_email();
		return true;
	}
};

/* Check username and email */
function check_username_email(){
	var new_url = '/forgotten_password_check';
	var dataString = $("#ps_reset_form_1").serialize();
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: new_url,
		data: dataString,
		cache: false,
		success: function (data) {
			//console.log(data);
			// Some Error caught
			if(data.CHECK == "NO"){
				if(data.ERROR == "USERNAME"){
					$("#reset_ps_username").addClass('c_error_input_field_highlight');
				}else{
					$("#reset_ps_email").addClass('c_error_input_field_highlight');
				}
			}else{
				// No errors
				send_reset_email();
			}

		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
}

function go_back_state(){
	$("#c_access_code_box").hide();
	$("#c_forgotten_pass_box").fadeIn();
}

var ps_reset_access_code = '';// this holds password reset access code return from Ajax request
// Send Password Reset Email to User
function send_reset_email(){
	$("#c_fog_reset_loading").fadeIn();

	var new_url = '/forgotten_password_email';
	var dataString = $("#ps_reset_form_1").serialize();
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: new_url,
		data: dataString,
		cache: false,
		success: function (data) {
			$("#c_fog_reset_loading").hide();
			//console.log(data);
			if(data.CHECK == "YES"){
				ps_reset_access_code = data.ACCESS_KEY;
				$("#ac_email").html(data.EMAIL);
				$("#c_forgotten_pass_box").hide();
				$("#c_access_code_box").fadeIn();
			}
		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
}

function password_acc_check(){
	var access_code = $("#reset_ps_access_code").val();
	if(access_code == ps_reset_access_code){
		// if user entered access code matches
		$("#c_access_code_box").hide();
		$("#c_change_pass_box").fadeIn();
	}else{
		// not matching access code
		$("#reset_ps_access_code").addClass('c_error_input_field_highlight');
	}
}

function check_change_password_form(){
	if(!valid_email('reset_ps_email') || valid_length_input('reset_ps_password') || valid_length_input('reset_ps_confirm_password') || !valid_confirm_password('reset_ps_password','reset_ps_confirm_password') || !PASSWORD_PATTERN){
		if(valid_length_input('reset_ps_password')){
			add_input_box_wrn('reset_ps_password');
		}
		if(valid_length_input('reset_ps_confirm_password')){
			add_input_box_wrn('reset_ps_confirm_password');
		}
		if(!valid_confirm_password('reset_ps_password','reset_ps_confirm_password')){
			add_input_box_wrn('reset_ps_confirm_password');
		}
		if(!PASSWORD_PATTERN){
			$(".c_password_inputs").fadeIn();
		}

		return false;
	}else{
		$("#hidden_username_rs").val($("#reset_ps_username").val());
		$("#hidden_email_rs").val($("#reset_ps_email").val());

		submit_password_change();
		return true;
	}
}

/* this function will submit password change details */
function submit_password_change(){
	var new_url = '/save_change_password';
	var dataString = $("#ps_reset_form_3").serialize();

	$.ajax({
		type: 'POST',
		dataType: "json",
		url: new_url,
		data: dataString,
		cache: false,
		success: function (data) {
			console.log(data);
			if(data.CHECK == "Changed"){
				$(".c_close_btn").hide();
				$("#c_change_pass_box").hide();
				$("#c_change_pass_suc_box").fadeIn();
				$("#c_change_pass_suc_box").delay(1500).fadeOut(100,function(){
					$("#c_sign_in_box").fadeIn();
					$(".c_close_btn").show();
				});
			}
		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
}

/*
 * Forgotten Password Form
 * ~~~~~~~~~~~~~~~~~~~~~~~
 */



/* ~~~~~~~~~~~~~
 * Ajax Requests
 */

function check_reg_existing(para_1,para_2){
	var dataString = 'type='+para_1+'&data='+para_2;
	var new_url = URL+'/'+para_1+'/'+para_2;
	if(para_1 == "email" && !valid_email('email')){
		$('#wrn_' + para_1).html('enter ' + para_1);
		$('#wrn_' + para_1).hide();
		$('#wrn_' + para_1).html('<span class="glyphicon glyphicon-remove" aria-hidden="true"  style="color:red"></span>');
		show_warning(para_1);
	}else if(para_1 == "username" && para_2.length == 0){
		$('#wrn_' + para_1).html('enter ' + para_1);
		$('#wrn_' + para_1).hide();
		$('#wrn_' + para_1).html('<span class="glyphicon glyphicon-remove" aria-hidden="true"  style="color:red"></span>');
	}else if(para_2.length>0) {
		$.ajax({
			type: 'POST',
			dataType: "json",
			url: new_url,
			data: dataString,
			cache: false,
			success: function (data) {
				//console.log(data);
				if (data.msg == 'USING') {
					if(para_1 == 'username'){
						AJAX_CHECK_USERNAME = false;
					}else{
						AJAX_CHECK_EMAIL = false;
					}

					$('#wrn_' + para_1).html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> already taken');
					show_warning(para_1);
				} else {

					if(para_1 == 'username'){
						AJAX_CHECK_USERNAME = true;
					}else{
						AJAX_CHECK_EMAIL = true;
					}

					if (para_2 == '') {
						// This hides the warning
						$('#wrn_' + para_1).html('enter ' + para_1);
						$('#wrn_' + para_1).hide();
					} else {
						// This display right mark when the field is not duplicated
						$('#wrn_' + para_1).html('<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green"></span>');
						show_warning(para_1);
					}
				}
			},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	}
};

/*
 * This function use to load doctors in search result page via Ajax
 */
function doc_load_ajax(){
	$("#c_loading_msg").fadeIn();
	var dataString = $("#filter_selections").serialize();// this serialize the form in search results page
	var method_type='POST';

	$.ajax({
		type: method_type,
		dataType: "json",
		url:URL,
		data:dataString,
		cache: false,
		success: function (data) {
			//console.log(data);
			$("#c_doctor_result_ajax_box").html(data.page);

			/* >>>>>>>>>>
			 * Pagination
			 * >>>>>>>>>>
			 */

			var txt='';
			if(data.pagination.total > 0) {
				if (data.pagination.total > data.pagination.per_page) {
					var pre_page_no = 1;
					var next_page_no = 1;
					if (data.pagination.current_page > 1) {
						pre_page_no = data.pagination.current_page - 1;
					}
					if (data.pagination.current_page < data.pagination.last_page) {
						next_page_no = data.pagination.current_page + 1;
					} else {
						next_page_no = data.pagination.current_page;
					}

					txt = txt + '<ul class="pagination"><li><a href="#page_pre=' + pre_page_no + '" onclick="pagination(' + pre_page_no + ')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
					for (var i = 1; i <= data.pagination.last_page; i++) {
						txt = txt + '<li ';
						if (data.pagination.current_page == i) {
							txt = txt + 'class="active"';
						}
						txt = txt + '><a href="#page=' + i + '" onclick="pagination(' + i + ')">' + i + ' <span class="sr-only">(current)</span></a></li>';
					}
					txt = txt + '<li><a href="#page_next=' + next_page_no + '" onclick="pagination(' + next_page_no + ')" aria-label="Next"><span aria-hidden="true">»</span></a></li></ul>';
				}

				$("#c_show_page_no").html('Showing <span id="c_page_no"></span> results');
				$("#search_doc_pagination_panel").html(txt);
				var from_no = data.pagination.per_page*(data.pagination.current_page-1)+1;
				var to_no = 1;
				if(data.pagination.total > (data.pagination.per_page*data.pagination.current_page)){
					to_no = data.pagination.per_page*data.pagination.current_page;
				}else{
					to_no = data.pagination.total;
				}

				txt = from_no+' - '+to_no+' of '+data.pagination.total;
				$("#c_page_no").html(txt);
				$("#c_tot_doc_filter").html(data.pagination.total);
			}else{
				// No results
				$("#search_doc_pagination_panel").html('');
				$("#c_show_page_no").html('No Results Found');
			}

			/* <<<<<<<<<<
			 * Pagination
			 * <<<<<<<<<<
			 */

			$("#c_loading_msg").fadeOut();
		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
};

$(document).ready(function(e){
	/* Check whether current page is Search results page or not */
	if($("#doc_search_page").val()=='YES') {
		doc_load_ajax(1);
	}
});

/* This handles pagination links requests via calling ajax method */
function pagination(para_1){
	$("#page_number_hidden").val(para_1);
	doc_load_ajax();
};



// This function use to load doctors in advanced search result page via Ajax
function user_load_ajax1(){

	$("#c_loading_msg1").fadeIn();
	var dataString = $("#filter_selections").serialize();// this serialize page the form in search results
	var method_type='GET';
	var skip= $("#start1").val();//get starting result number
	var end= $("#end1").val();//get the last result number
	var curr=$("#page_number_hidden1").val();//get the current page number
	var res_starts=parseInt($("#start1").val())+parseInt(1)

	$.ajax({


		type: method_type,
		dataType: "json",
		url:'/ajax/advanced/'+skip+'/'+end,
		cache: false,
		data: dataString,
		success: function (data) {

			$("#c_doctor_result_ajax_box1").html(data.page);

			/////////////////////////////////////////////////
			// Pagination ///////////////////////////////////



			var txt = '';
			if (data["count"][0]["count"] > end) {

				var last = Math.ceil(data["count"][0]["count"] / end);
				var pre_page_no = 1;
				var next_page_no = 1;
				if (curr > 1) {
					pre_page_no = curr - 1;
				}
				if (curr < last) {
					next_page_no = parseInt(curr) + parseInt(1);
				} else {
					next_page_no = curr;
				}

				txt = txt + '<ul class="pagination" style="margin-top: 30px"><li><a href="#page_pre=' + pre_page_no + '" onclick="pagination1(' + pre_page_no + ')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
				for (var i = 1; i <= last; i++) {
					txt = txt + '<li ';
					if (curr == i) {
						txt = txt + 'class="active"';
					}
					txt = txt + '><a href="#page=' + i + '" onclick="pagination1(' + i + ')">' + i + ' <span class="sr-only">(current)</span></a></li>';
				}
				txt = txt + '<li><a href="#page_next=' + next_page_no + '" onclick="pagination1(' + next_page_no + ')" aria-label="Next"><span aria-hidden="true">»</span></a></li></ul>';


			}

			if (data["count"][0]["count"] > end) {
			    var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panel1").html(txt);
				txt = +res_starts + ' - ' + tot + ' of ' + data["count"][0]["count"];
				$("#c_page_no1").html(txt);
		    }
			else if(data["count"][0]["count"] <= end && data["count"][0]["count"] > 0){

				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panel1").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"][0]["count"];
				$("#c_page_no1").html(txt);
			}
			else{
				$("#search_doc_pagination_panel1").html(txt);
				txt = '0';
				$("#c_page_no1").html(txt);
			}



			// Pagination ///////////////////////////////////
			/////////////////////////////////////////////////

			$("#c_loading_msg1").fadeOut();
		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
};



function pagination1(para_1){

	$("#start1").val(parseInt(para_1)*parseInt($("#end1").val())- parseInt($("#end1").val()));
	$("#page_number_hidden1").val(para_1);

	user_load_ajax1();
};

$(document).ready(function(e){
	// Check whether current page is Search results page or not
	if($("#doc_search_page1").val()=='YES') {
		user_load_ajax1();
	}
});


function filter_by_star_rating(para_1){
	$("#page_number_hidden").val(1);// Reset Page number into 1
	$(".c_filter_star").removeClass("c_filter_star_active");
	$(".star_"+para_1).addClass('c_filter_star_active');
	$("#filter_star_rating").val(para_1);
	doc_load_ajax();
};

function filter_result_btn(){
	$("#page_number_hidden").val(1);// Reset Page number into 1
	$("#filter_star_rating").val(0);// Reset Star rating into 0
	$(".c_filter_star").removeClass("c_filter_star_active");
	// If district is clicked
	if($('input[name=district]:checked', '#filter_selections').val() != null) {
		$("#filter_loc_hidden").val($('input[name=district]:checked', '#filter_selections').val());
	}
	// If specialization is clicked
	if($('input[name=specialization]:checked', '#filter_selections').val() != null) {
		$("#filter_spec_hidden").val($('input[name=specialization]:checked', '#filter_selections').val());
	}

	if($('input[name=district]:checked', '#filter_selections').val() == null && $('input[name=specialization]:checked', '#filter_selections').val() == null){
		$("#c_filter_no_select_wrn").fadeIn();
		$("#c_filter_no_select_wrn").delay(600).fadeOut();
	}else {
		doc_load_ajax();
	}
}

function filter_reset(){
	$("#page_number_hidden").val(1);// Reset Page number into 1
	$("#filter_star_rating").val(0);// Reset Star rating into 0
	$(".c_filter_star").removeClass("c_filter_star_active");
	$("#filter_loc_hidden").val('-');
	$("#filter_spec_hidden").val('-');
	$("#filter_selections").trigger('reset');
	doc_load_ajax();
};

/*
 * Ajax Requests
 * ~~~~~~~~~~~~~
 */

/*
 * ~~~~~~~~~~~~~~~~~
 * Profile View Page
 */

function comment_rate_star(para_1){
	remove_wrn('star_rating');
	var star = $("#hidden_star_url").html();
	var green_star = $("#hidden_green_star_url").html();
	$('.c_rate').attr('src',star);
	for(var i=0;i<=para_1;i++){
		$("#c_comment_star_" + i).attr('src', green_star);
	}
	$("#star_rating").val(para_1);
};

function clear_comment_post(){
	var star = $("#hidden_star_url").html();
	$("#star_rating").val(0);
	$('.c_rate').attr('src',star);
	$('#comment_description').val('');
};

var com_tabs=1;// Holds comments tab count
function get_comments(){
	var base_url = $('#base_url').val();
	var star = $("#hidden_star_url").html();
	var green_star = $("#hidden_green_star_url").html();

	var doc_id = $("#hidden_doc_id").val();
	var new_url = URL+'/'+doc_id;
	$.ajax({
		type: 'POST',
		dataType: "json",
		url:new_url,
		//data:dataString,
		cache: false,
		success: function (data) {
			if(data['COMMENT'] == "NO"){
				$("#comments_loading").fadeOut(function(){
					$("#no_comments_div").fadeIn();
				});
			}else {
				data=data['DATA'];


				var txt = '<div class="col-lg-12 c_no_padding" id="com_tab_1">';/*this will add comments tabs*/
				for (var i = 1; i <= Object.keys(data).length; i++) {

					txt = txt + '<div class="col-lg-12 c_no_padding" style="padding: 20px"><div class="col-lg-1" style="padding: 5px"><div class="c_comment_profile_icon" style="background-image:url(' + base_url + data["comment_" + i]["user_img"]["image_path"] + ')"></div></div><div class="col-lg-11"><div class="c_comment_body"><ul class="c_ul_1" style="margin-bottom: 0px"><li style="height: 25px">';
					txt = txt + '<div class="col-lg-4 c_no_padding">';
					for (var s = 1; s <= 5; s++) {
						if (s <= data['comment_' + i]['comment']['rating']) {
							txt = txt + '<img src="' + green_star + '" class="c_sm_star">';
						} else {
							txt = txt + '<img src="' + star + '" class="c_sm_star">';
						}
					}
					txt = txt + '</div>';
					txt = txt + '</li><li style="padding-top: 5px">' + data["comment_" + i]["comment"]["description"] + '</li><li style="padding-top: 10px;font-size: 13px;color: rgb(0, 109, 22)"><ul class="c_top_ul"><li>by : ' + data["comment_" + i]["user"]["first_name"] + '&nbsp;' + data["comment_" + i]["user"]["last_name"] + '</li><li style="margin-left: 40px">Posted Date - ' + data["comment_" + i]["comment"]["posted_date_time"] + '</li></ul></li></ul></div></div></div>';

					/*this will add comments tabs*/
					if(i%4 == 0) {
						txt = txt + '</div>';
						if(Object.keys(data).length != i) {
							com_tabs++;
							txt = txt + '<div class="col-lg-12 c_no_padding" id="com_tab_'+com_tabs+'" style="display:none">';
						}
					}
				}

				/*this will add comments tabs*/
				if(Object.keys(data).length%4 != 0) {
					txt = txt + '</div>';
				}

				$("#comments_load_div").html(txt);
				$("#comments_loading").delay(1500).fadeOut(function () {
					$("#no_comments_div").hide();
					$("#c_comments_count_span").html(Object.keys(data).length);
					$("#comments_load_div").fadeIn();
					if(Object.keys(data).length > 4){
						$("#com_tab_back").show();
						$("#com_tab_next").show();
					}
				});
			}
		}
	});
};

$(document).ready(function(e) {
	if(($("#profile_view_page").val()) == "YES"){
		get_comments();
	}
});

/* comments tab change */
var current_tab=1;
function change_com_tab(para_1){
	if(para_1 == "-"){
		if(current_tab > 1){
			current_tab--;
		}
	}else{
		if(current_tab < com_tabs){
			current_tab++;
		}
	}
	for(var i=1;i<=com_tabs;i++){
		if(i != current_tab){
			$("#com_tab_"+i).slideUp();
		}else{
			$("#com_tab_"+current_tab).slideDown();
		}
	}
}

function check_valid_comment(){
	var user_id = $('#hidden_user_id').val();
	if(user_id == 0) {
		//alert('Please Log In');
		$("#c_warning_msg").fadeIn(100);
		$("#c_warning_msg").delay(800).fadeOut();
	}else{
		if($('#star_rating').val() == 0){
			show_warning('star_rating');
		}else{
			submit_comment();
		}
	}
};

function submit_comment(){
	com_tabs=1;
	var new_url = '/post_comment';
	var dataString = $("#doctor_comment").serialize();
	$.ajax({
		type: 'POST',
		dataType: "json",
		url:new_url,
		data:dataString,
		cache: false,
		success: function (data) {
			clear_comment_post();
			get_comments();
			$("#c_thanking_msg").fadeIn();
			$("#c_thanking_msg").delay(1200).fadeOut();
		}
	});
};

/*
 * Profile View Page
 * ~~~~~~~~~~~~~~~~~
 */

/*
 * ~~~~~~~~~~~~~~~~~~~
 * Suggest Doctor Page
 */


/*
 * Side Percentage Bar
 */

var com_am=0; // Completed Amount
// this is to keep states of each fields
var add_doc_fields = {
	1:0,
	2:0,
	3:0,
	4:0,
	5:0,
	6:0,
	7:0,
	8:0,
	9:0,
	10:0,
	11:0
};
var getProperty = function (index) {
	return add_doc_fields[index];
};

/* All on Change events will handle to get completed percentage amount */
$(".add_doc").on('change',function(){
	var f_id = $(this).attr('data-id');
	// First check for add treatments or specializations
	if(f_id < 10) {
		if (getProperty(f_id) == 0) {
			if ($(this).val().length > 0) {
				check_com_am(f_id, '+');
				add_doc_fields[f_id] = 1;// Set to lock sate
			} else {
				if (com_am > 0) {
					check_com_am(f_id, '-');
					add_doc_fields[f_id] = 0;// Set to default state
				}
			}
		}
		else if (getProperty(f_id) == 1 && $(this).val().length == 0) {
			if (com_am > 0) {
				check_com_am(f_id, '-');
				add_doc_fields[f_id] = 0;// Set to default state
			}
		}
	}else{
		// if specializations
		if(f_id == 10){
			var status = check_s_and_t('spec');
			if (getProperty(f_id) == 0) {
				if(status){
					check_com_am(f_id, '+');
					add_doc_fields[f_id] = 1;// Set to lock sate
				}
			}else{
				if(!status){
					check_com_am(f_id, '-');
					add_doc_fields[f_id] = 0;// Set to lock sate
				}
			}
		}else{
			// if treatments
			var status = check_s_and_t('treat');
			if (getProperty(f_id) == 0) {
				if(status){
					check_com_am(f_id, '+');
					add_doc_fields[f_id] = 1;// Set to lock sate
				}
			}else{
				if(!status){
					check_com_am(f_id, '-');
					add_doc_fields[f_id] = 0;// Set to lock sate
				}
			}
		}
	}
	change_com_percentage();
});

$("#district").on('change',function(){
	var f_id = $("#district").attr('data-id');
	if(getProperty(f_id) == 0) {
		if($("#district").val() != "select"){
			check_com_am(f_id,'+');
			add_doc_fields[f_id] = 1;// Set to lock sate
		}else{
			if(com_am > 0) {
				check_com_am(f_id,'-');
				add_doc_fields[f_id] = 0;// Set to default state
			}
		}
	}else if(getProperty(f_id) == 1 && $(this).val() == "select"){
		if(com_am > 0) {
			check_com_am(f_id,'-');
			add_doc_fields[f_id] = 0;// Set to default state
		}
	}
	change_com_percentage();
});

function change_com_percentage(){
	$("#c_completed_cir").removeAttr('class');
	$("#c_completed_cir").addClass('c100');
	$("#c_completed_cir").addClass('p'+com_am);
	$("#c_completed_cir").addClass('big');
	$("#c_completed_cir_am").html(com_am+"%");
}

function check_com_am(id,op){
	if(id < 7){
		if(op == '+'){
			com_am=com_am+7;
		}else{
			com_am=com_am-7;
		}
	}else if(id < 9){
		if(op == '+'){
			com_am=com_am+12;
		}else{
			com_am=com_am-12;
		}
	}else if(id == 9){
		if(op == '+'){
			com_am=com_am+14;
		}else{
			com_am=com_am-14;
		}
	}else if(id > 9){
		if(op == '+'){
			com_am=com_am+10;
		}else{
			com_am=com_am-10;
		}
	}
}

function check_s_and_t(para_1){

	if(para_1 == "spec"){
		var skip=false;
		var spec_count = $("#spec_count").val();
		for(var i=1;i<=spec_count;i++){
			if($("#spec_doc_"+i).val() == ""){
				skip=true;
			}
		}

		if(skip){
			return false;
		}else{
			return true;
		}
	}else if(para_1 == "treat"){
		var skip=false;
		var treat_count = $("#treat_count").val();
		for(var i=1;i<=treat_count;i++){
			if($("#treat_doc_"+i).val() == ""){
				skip=true;
			}
		}

		if(skip){
			return false;
		}else{
			return true;
		}
	}
}

/*
 * Side Percentage Bar
 */

function change_sug_tab(para_1){
	if(para_1 == 1){
		$(".c_sug_doc_tabs").removeClass('c_sug_doc_tabs_active');
		$("#c_sug_"+para_1+"_tab").addClass('c_sug_doc_tabs_active');

		$("#c_doc_sug_tab_1_div").show();
		$("#c_doc_sug_tab_2_div").hide();
		$("#c_doc_sug_tab_3_div").hide();
	}else if(para_1 == 2){
		if(validate_tab_change(1)) {
			$(".c_sug_doc_tabs").removeClass('c_sug_doc_tabs_active');
			$("#c_sug_"+para_1+"_tab").addClass('c_sug_doc_tabs_active');

			$("#c_doc_sug_tab_2_div").show();
			$("#c_doc_sug_tab_1_div").hide();
			$("#c_doc_sug_tab_3_div").hide();
		}
	}else if(para_1 == 3){
		if(validate_tab_change(1) && validate_tab_change(2)) {
			$(".c_sug_doc_tabs").removeClass('c_sug_doc_tabs_active');
			$("#c_sug_" + para_1 + "_tab").addClass('c_sug_doc_tabs_active');

			$("#c_doc_sug_tab_3_div").show();
			$("#c_doc_sug_tab_1_div").hide();
			$("#c_doc_sug_tab_2_div").hide();
		}
	}else if(para_1 == 4){
		if(validate_tab_change(1) && validate_tab_change(2) && validate_tab_change(3)) {
			show_profile_preview();
		}
	}
};


function check_spec_and_treat(para_1){

	if(para_1 == "spec"){
		var skip=false;
		var spec_count = $("#spec_count").val();
		for(var i=1;i<=spec_count;i++){
			if($("#spec_doc_"+i).val() == ""){
				skip=true;
			}
		}

		if(skip){
			show_warning('spec');
			return false;
		}else{
			return true;
		}
	}else if(para_1 == "treat"){
		var skip=false;
		var treat_count = $("#treat_count").val();
		for(var i=1;i<=treat_count;i++){
			if($("#treat_doc_"+i).val() == ""){
				skip=true;
			}
		}

		if(skip){
			show_warning('treat');
			return false;
		}else{
			return true;
		}
	}
}

var status_spec=true; // status of specializations
var status_treat=true; // status of treatments
function validate_tab_change(para_1){
	if(para_1 == 1){
		if(valid_length_input('first_name')  || check_input_no_num('first_name') || valid_length_input('last_name')  || check_input_no_num('last_name') || valid_length_input('address_1') || valid_length_input('address_2') || valid_length_input('city') || $("#district").val() == 'select') {
			if (valid_length_input('first_name')  || check_input_no_num('first_name')) {
				show_warning('first_name');
			}
			if (valid_length_input('last_name') || check_input_no_num('last_name')) {
				show_warning('last_name');
			}
			if (valid_length_input('address_1')) {
				show_warning('address_1');
			}
			if (valid_length_input('address_2')) {
				show_warning('address_2');
			}
			if (valid_length_input('city')) {
				show_warning('city');
			}
			if($("#district").val() == 'select'){
				show_warning('district');
			}

			return false;
		}else{
			return true;
		}
	}else if(para_1 == 2){
		if(valid_length_input('contact_number') || !valid_phone_no('contact_number') || valid_length_input('email') || !valid_email('email') || $('#doc_description').val() == '') {
			if(valid_length_input('contact_number') || !valid_phone_no('contact_number')){
				show_warning('contact_number');
			}
			if(valid_length_input('email') || !valid_email('email')){
				$('#wrn_email').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid email');
				show_warning('email');
			}
			if ($('#doc_description').val() == '') {
				show_warning('doc_description');
			}

			return false;
		}else if(!AJAX_CHECK_EMAIL) {
			if (!AJAX_CHECK_EMAIL) {
				$('#wrn_email').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> already taken');
				show_warning('email');
			}
			return false;
		}else{
			return true;
		}
	}else if(para_1 == 3){
		if(check_spec_and_treat('spec')){
			status_spec=true;
		}else{
			status_spec=false;
		}
		if(check_spec_and_treat('treat')){
			status_treat=true;
		}else{
			status_treat=false;
		}

		if(status_spec && status_treat){
			return true;
		}else{
			return false;
		}
	}
};

/* This will show profile preview */
function show_profile_preview(){
	if(status_spec && status_treat){

		// Set up preview panel
		$("#c_pre_name").html($("input[name=first_name]").val()+" "+$("input[name=last_name]").val());
		$("#c_pre_gender").html($("input[name=gender]").val());
		$("#c_pre_address_1").html($("input[name=address_1]").val());
		$("#c_pre_address_2").html($("input[name=address_2]").val());
		$("#c_pre_city").html($("input[name=city]").val());
		$("#c_pre_district").html($("#district").val());
		$("#c_pre_contact_no").html($("input[name=contact_number]").val());
		$("#c_pre_email").html($("input[name=email]").val());
		$("#c_pre_description").html($("#doc_description").val());

		var txt="";
		var spec_count = $("#spec_count").val();
		for(var i=1;i<=spec_count;i++){
			txt=txt+'<div class="c_pre_spec"><span style="background: #000;color: #FFF;;padding: 1px 7px;border-radius: 20px;margin-right: 10px">'+i+'</span>'+$("#spec_doc_"+i).val()+'</div>';
		}
		$("#c_pre_spec_div").html(txt);

		txt="";
		var treat_count = $("#treat_count").val();
		for(var i=1;i<=treat_count;i++){
			txt=txt+'<div class="c_pre_spec"><span style="background: #000;color: #FFF;;padding: 1px 7px;border-radius: 20px;margin-right: 10px">'+i+'</span>'+$("#treat_doc_"+i).val()+'</div>';
		}
		$("#c_pre_treat_div").html(txt);


		// Set up preview panel End

		$("#c_preview_pop_up").fadeIn(function(){
			$("#c_preview_pop_up_inner").slideDown();
		});
	}
}

var sep_op=1;
function add_more_op(){
	if(sep_op < 5) {
		sep_op++;
		$("#spec_count").val(sep_op);
		for (var i = 1; i <= 5; i++) {
			if (i <= sep_op) {
				$("#spec_doc_" + i).fadeIn(300);
			} else {
				$("#spec_doc_" + i).fadeOut(1);
				$("#spec_doc_" + i).val("");
			}
		}
	}
}

function rem_more_op(){
	if(sep_op > 1) {
		sep_op--;
		$("#spec_count").val(sep_op);
		for (var i = 1; i <= 5; i++) {
			if (i <= sep_op) {
				$("#spec_doc_" + i).fadeIn(300);
			} else {
				$("#spec_doc_" + i).fadeOut(1);
				$("#spec_doc_" + i).val("");
			}
		}
	}
}

var treat_op=1;
function add_more_t_op(){
	if(treat_op < 5) {
		treat_op++;
		$("#treat_count").val(treat_op);
		for (var i = 1; i <= 5; i++) {
			if (i <= treat_op) {
				$("#treat_doc_" + i).fadeIn(300);
			} else {
				$("#treat_doc_" + i).fadeOut(1);
				$("#treat_doc_" + i).val("");
			}
		}
	}
}

function rem_more_t_op(){
	if(treat_op > 1) {
		treat_op--;
		$("#treat_count").val(treat_op);
		for (var i = 1; i <= 5; i++) {
			if (i <= treat_op) {
				$("#treat_doc_" + i).fadeIn(300);
			} else {
				$("#treat_doc_" + i).fadeOut(1);
				$("#treat_doc_" + i).val("");
			}
		}
	}
}

function preview_close(){
	$("#c_preview_pop_up_inner").slideUp(function(){
		$("#c_preview_pop_up").fadeOut();
	});
};

function preview_submit(){
	$("#c_add_doc_sub_btn").trigger('click');
};

/*
 * Suggest Doctor Page
 * ~~~~~~~~~~~~~~~~~~~
 */

/*
 * ~~~~~~~~~~~~~~~
 * My Account Page
 */

function show_tabs(para_1){
	if(para_1 == "SET") {
		$("#c_user_ac_home").hide();
		$("#c_user_ac_update").fadeIn(200,function(){
			$(".c_my_ac_pic").slideUp();
			$("#c_side_my_ac_panel").css("margin-top","0px");
		});
	}
	if(para_1 == "HOME") {
		$("#c_user_ac_update").hide();
		$("#c_user_ac_home").fadeIn(200,function(){
			$(".c_my_ac_pic").slideDown();
			$("#c_side_my_ac_panel").css("margin-top","35px");
		});
	}
};


function get_user_comments_my_profile(){
	var base_url = $("#base_url").val();
	var star = $("#hidden_star_url").html();
	var green_star = $("#hidden_green_star_url").html();

	var new_url = '/get_comments_by_user';
	//var dataString = $("#doctor_comment").serialize();
	$.ajax({
		type: 'POST',
		dataType: "json",
		url:new_url,
		//data:dataString,
		cache: false,
		success: function (data) {
			//console.log(data);
			var txt='';
			for(var i=0;i<Object(data).length;i++){
				txt=txt+'<div class="col-lg-12 c_no_padding" style="padding: 20px"><div class="c_comment_body" style="padding: 5px">';
				txt=txt+'<div class="c_my_ac_doc_img" style="background-image:url('+base_url+data[i]["doc_img"]+')"></div>';
				txt=txt+'<ul class="c_ul_1" style="margin-bottom: 0px;margin-left: 50px"><li style="height: 25px"><div class="col-lg-4 c_no_padding">';
				for (var s = 1; s <= 5; s++) {
					if (s <= data[i]['com_data']['rating']) {
						txt = txt + '<img src="' + green_star + '" class="c_sm_star">';
					} else {
						txt = txt + '<img src="' + star + '" class="c_sm_star">';
					}
				}
				txt=txt+'</div></li>';
				txt=txt+'<li style="padding-top: 5px">'+data[i]["com_data"]["description"]+'</li><li style="padding-top: 10px;font-size: 13px;color: rgb(0, 109, 22)"><ul class="c_top_ul">';
				txt=txt+'<li>Doctor : '+data[i]["doc_first_name"]+'&nbsp;'+data[i]["doc_last_name"]+'</li><li style="margin-left: 40px">Posted Date - '+data[i]["com_data"]["posted_date_time"]+'</li></ul></li></ul></div></div>';
			}
			$("#c_user_comments_load").html(txt);
		}
	});
}

$(document).ready(function(){
	if($("#user_account_page").val() == "YES"){
		get_user_comments_my_profile();
	}
});


function get_image(para_1,para_2){
	$("#"+para_2).trigger('click');
};


$(document).ready(function(){
	$('.file_input').on('change', function(){ //on file input change
		var div_id = $(this).attr("data-id");
		var base_url = $(this).attr("data-icon");

		if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
		{
			//$('#thumb_output_'+id).html(''); //clear html of output element
			var data = $(this)[0].files; //this file data
			$.each(data, function(index, file){ //loop though each file
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
					var fRead = new FileReader(); //new filereader
					fRead.onload = (function(file){ //trigger function on successful read
						return function(e) {
							//var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element
							$('#'+div_id).css("background-image",'url("'+e.target.result+'")'); //append image to output element
						};
					})(file);
					fRead.readAsDataURL(file); //URL representing the file's data.
				}
			});

		}else{
			alert("Your browser doesn't support File API!"); //if File API is absent
		}
	});


});

var up_AJAX_USERNAME=true;
var up_AJAX_EMAIL=true;
function check_update_existing(para_1,para_2){
	var dataString = 'type='+para_1+'&data='+para_2;
	var new_url = URL+'/'+para_1+'/'+para_2;
	if(para_2.length>0) {
		$.ajax({
			type: 'POST',
			dataType: "json",
			url: new_url,
			data: dataString,
			cache: false,
			success: function (data) {
				//console.log(data);
				var cr_username = $("#hidden_username").val();
				var cr_email = $("#hidden_email").val();

				if($("input[name=username]").val() != cr_username || $("input[name=email]").val() != cr_email) {
					if (data.msg == 'USING') {
						if (para_1 == 'username') {
							up_AJAX_USERNAME = false;
						} else {
							up_AJAX_EMAIL = false;
						}

						$('#wrn_' + para_1).html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> already taken');
						show_warning(para_1);
					} else {

						if (para_1 == 'username') {
							up_AJAX_USERNAME = true;
						} else {
							up_AJAX_EMAIL = true;
						}

						if (para_2 == '') {
							// This hides the warning
							$('#wrn_' + para_1).html('enter ' + para_1);
							$('#wrn_' + para_1).hide();
						} else {
							// This display right mark when the field is not duplicated
							$('#wrn_' + para_1).html('<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color:green"></span>');
							show_warning(para_1);
						}
					}
				}
			},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	}
};



function check_update_account(){
	if(valid_length_input('username') || valid_length_input('first_name')  || check_input_no_num('first_name') || valid_length_input('last_name')  || check_input_no_num('last_name') || valid_length_input('contact_no') || !valid_phone_no('contact_no') || valid_length_input('email') || !valid_email('email')){
		if(valid_length_input('username')){
			$('#wrn_username').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid username');
			show_warning('username');
		}
		if(valid_length_input('first_name')  || check_input_no_num('first_name')){
			show_warning('first_name');
		}
		if(valid_length_input('last_name')  || check_input_no_num('last_name')){
			show_warning('last_name');
		}
		if(valid_length_input('contact_no') || !valid_phone_no('contact_no')){
			show_warning('contact_no');
		}
		if(valid_length_input('email') || !valid_email('email')){
			$('#wrn_email').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid email');
			show_warning('email');
		}

		return false;
	}else if(!AJAX_CHECK_EMAIL || !AJAX_CHECK_USERNAME) {
		if (!AJAX_CHECK_EMAIL) {
			$('#wrn_email').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> already taken');
			show_warning('email');
		}
		if (!AJAX_CHECK_USERNAME) {
			$('#wrn_username').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> already taken');
			show_warning('username');
		}

		return false;
	}else{
		return true;
	}
};

/*
 * My Account Page
 * ~~~~~~~~~~~~~~~
 */

/*
 * Image Map Item Pick
 */
function pick_location(para_1){
	$("#location_txt").val(para_1);
};

/*
 * ~~~~~~~~~~~
 * Side Helper
 */

var click_help=false;
function side_helper(){
	var user_id = $('#hidden_user_id').val();
	if(user_id == 0) {
		$("#c_warning_msg").fadeIn(100);
		$("#c_warning_msg").delay(800).fadeOut();
	}else {
		$(".c_side_helper").fadeOut();
		$(".c_in_helper").show(function () {
			$(".c_in_helper_1").fadeIn(200);
			// Auto typing Section
			$(".c_in_helper_2").typed({
				strings: ["Hi.. I`m Dr. Jarvis</br>Do you want any help ?"],
				typeSpeed: 40
			});
			$("#c_try_chat_btn").delay(3500).fadeIn();
			$(".typed-cursor").hide();
		});
		click_help = true;
	}
};
$(".c_in_helper").mouseenter(function(){
	$("#c_in_help_close_btn").fadeIn();
});
$(".c_in_helper").mouseleave(function(){
	$("#c_in_help_close_btn").fadeOut();
});
$("#c_in_help_close_btn").click(function(){
	click_help=false;
	$(".c_in_helper").hide();
	$(".c_side_helper").fadeIn();
});

$("#c_try_chat_btn").click(function(){
	$(".c_side_helper").fadeOut();
	$(".c_in_helper").fadeOut();
	$(".c_helper_chat").fadeIn();

	// this will start chat session
	get_chat_messages();
	tid = setInterval(get_chat_messages, 5000);
});
$("#c_chat_close_btn").click(function(){
	$(".c_helper_chat").fadeOut();
	$(".c_side_helper").fadeIn();

	// this will abort the timer
	abortTimer();
});

/*
 * Chat Form >>>>>
 */

$("#chat_send").click(function(){
	send_chat();
});

$("#chat_form").submit(function(e){
	send_chat();
	e.preventDefault();
});

/* send chat message */
function send_chat(){
	var new_url = '/send_chat_message';
	var dataString = $("#chat_form").serialize();
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: new_url,
		data: dataString,
		cache: false,
		success: function (data) {
			$("#chat_message_txt").val('');
			get_chat_messages();
			$('.c_chat_box').animate({scrollTop: $('.c_chat_box')[0].scrollHeight}, 1000);
		}
	});
};

/* get chat messages */
function get_chat_messages(){
	var base_url = $("#home_base_url").val();
	var new_url = '/get_chat_message';
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: new_url,
		cache: false,
		success: function (data) {
			var txt='<table style="width: 100%">';
			for(var i=0;i<Object(data.chat_data).length;i++){
				if(data.chat_data[i]["sender_id"] == 0) {
					txt = txt + '<tr><td><div class="c_chat_msg_row"><table style="width: 100%"><tr><td style="width: 90%;"><div class="c_chat_msg_text_1">'+data.chat_data[i]["message"]+'</div></td>';
					txt = txt + '<td style="width: 10%"><img src="'+base_url+'/oparator_icon.jpg" class="c_chat_icon_1"></td></tr><tr><td style="height: 17px"></td></tr></table></div></td></tr>';
				}else{
					txt = txt + '<tr><td><div class="c_chat_msg_row"><table style="width: 100%"><tr><td style="width: 10%"><img src="'+base_url+'/user_chat.png" class="c_chat_icon_2"></td>';
					txt = txt + '<td style="width: 90%;"><div class="c_chat_msg_text_2">'+data.chat_data[i]["message"]+'</div></td></tr><tr><td style="height: 17px"></td></tr></table></div></td></tr>';
				}
			}

			$(".c_chat_box").html(txt);
		}
	});
};

/*
 * Chat Form >>>>>
 */

/* set interval */
var tid='';// holds timer id
function abortTimer() { // to be called when you want to stop the timer
	clearInterval(tid);
}

/*
 * Side Helper
 * ~~~~~~~~~~~
 */

/*
 * ~~~~~~~
 * Captcha
 */

/* Initialize Captcha Image Themes */

var captcha_themes = [];
captcha_themes.push(['dog','leaf']);
captcha_themes.push(['parrot','bus']);
captcha_themes.push(['ball','bicycle']);
captcha_themes.push(['car','fish']);
captcha_themes.push(['frog','spider']);
captcha_themes.push(['lotus','book']);
captcha_themes.push(['pen','ring']);
var second_cap_op = '';

/* Initialize Captcha Image Themes */

$(document).ready(function(){
	if($("#register_page").val() == "YES") {
		add_captcha_thumbs();
	}
});

var captcha_images = [];// used to store captcha images
var captcha_type = [];// used to store images types
var count=0;//count index no for captcha
var call_count=0;
function get_api_images(para_1){
	var apiKey = 'zcpen8bk54rtz7tw6kzbmhxq'; // my getty Api Key
	$.ajax({
			type:'GET',
			url:"https://api.gettyimages.com/v3/search/images/creative?phrase="+para_1,
			beforeSend: function (request)
			{
				request.setRequestHeader("Api-Key", apiKey);
			}
		}).done(function(data){
			/*console.log(data);*/
			for(var i = 0;i<3;i++)
		 	{
			 	var index = Math.floor(Math.random() * ( 1 + 29 - 0 ) ) + 0;// get random index
			 	captcha_images[count] = data.images[index].display_sizes[0].uri;

				if(call_count == 0){
					captcha_type[count] = 'DOG';
				}else{
					captcha_type[count] = 'LEAF';
				}

				count++;
		 	}
			call_count++;

			// Asynchronously Call Second API Call
			if(call_count == 1){
				get_api_images(second_cap_op);
			}

			// if second ajax call finish only
			if(call_count == 2){
				//console.log(captcha_type);
				shuffle(captcha_images,captcha_type);
				//console.log(captcha_type);
				for(var i=0;i<6;i++){
					$("#cap_img_"+(i+1)).attr('src',captcha_images[i]); // add images
				}
				$(".captcha_loading").fadeOut();// remove captcha loading
			}
		}).fail(function(data){
				console.log(JSON.stringify(data,2));
			}
		);
};

function add_captcha_thumbs(){
	$(".captcha_loading").fadeIn(); // add captcha loading

	var index = Math.floor(Math.random() * ( 1 + (captcha_themes.length-1) - 0 ) ) + 0;// get random index
	$("#c_select_name").html(captcha_themes[index][0]);// Set Selecting Theme
	second_cap_op = captcha_themes[index][1];// set second loop theme value
	get_api_images(captcha_themes[index][0]);// Selecting Theme

}

function refresh_captcha(){
	// *** Reset to Default *********
	captcha_images = [];// used to store captcha images
	captcha_type = [];// used to store images types
	count=0;//count index no for captcha
	call_count=0;
	$(".captcha_img_select").fadeOut();
	$(".img_h").val(0);
	CAPTCHA_VERIFY = false;
	$(".c_captcha_box").css('background','rgba(255, 201, 66, 0.44)');
	$(".cap_v_2").hide(1);
	$(".cap_v_1").show(1);
	// *** Reset to Default *********

	add_captcha_thumbs();
}

/*
 * This function will shuffle array Items
 */
function shuffle(array_1,array_2) {
	var currentIndex = array_1.length, temporaryValue, randomIndex;

	// While there remain elements to shuffle
	while (0 !== currentIndex) {

		// Pick a remaining element
		randomIndex = Math.floor(Math.random() * currentIndex);
		currentIndex -= 1;

		// And swap it with the current element
		temporaryValue = array_1[currentIndex];
		array_1[currentIndex] = array_1[randomIndex];
		array_1[randomIndex] = temporaryValue;

		// this switches the images types
		temporaryValue = array_2[currentIndex];
		array_2[currentIndex] = array_2[randomIndex];
		array_2[randomIndex] = temporaryValue;
	}
}

$(".c_captcha_box").click(function(){
	$(".c_captcha_pop_up").fadeToggle();
});

/* This function handles captcha image click */
function click_captcha(para_1){
	$("#cap_over_"+para_1).fadeIn();
	$("#img_"+para_1).val('1');
};

/* This function removes cpatcha overflow */
function remove_captcha(para_1){
	$("#cap_over_"+para_1).fadeOut();
	$("#img_"+para_1).val('0');
}

/* Do Captcha Verification */
$("#cpa_verify_btn").click(function(){
	CAPTCHA_VERIFY = false;
	var status=true;
	var count=1;
	for(var i=0;i<6;i++){
		//console.log(captcha_type[i]);
		var clicked_val = $("#img_"+count).val();
		if(captcha_type[i] == "DOG") {
			if (clicked_val == 0) {
				status = false;
			}
		}else if(captcha_type[i] == "LEAF") {
			if (clicked_val == 1) {
				status = false;
			}
		}
		count++;
	}

	if(status){
		CAPTCHA_VERIFY = true;
		$(".c_captcha_pop_up").fadeToggle();
		$(".c_captcha_box").css('background','rgba(61, 180, 61, 0.51)');
		$(".cap_v_1").hide(1);
		$(".cap_v_2").fadeIn();
	}else{
		CAPTCHA_VERIFY = false;
		$(".c_captcha_box").css('background','rgba(255, 201, 66, 0.44)');
		$(".cap_v_2").hide(1);
		$(".cap_v_1").show(1);
	}
});

/*
 * Captcha
 * ~~~~~~~
 */


/*
 * Navigation Bar Hover Change
 */
function sub_nav_pick(para_1){
	var url_path = $("#home_base_url").val();
	$(".nav_list_sub").removeClass('highlight_sub');
	$(".sub_"+para_1).addClass('highlight_sub');
	$(".c_sub_nav_icon").css('background-image','url('+url_path+'/service_icon_'+para_1+'.jpg)');
};


/*
 * Ayurvedic Therapies
 */
$("#background_video").on('ended',function(){
	this.load();
	this.play();
});


/*
 * Make Reservation on Doctor Profile Page
 */
$(".res_btn_close").click(function(){
	$(".c_pop_up_box_reservation").fadeOut(100);
});

$("#c_booking_btn").click(function(){
	var user_id = $('#hidden_user_id').val();
	if(user_id == 0) {
		$("#c_warning_msg").fadeIn(100);
		$("#c_warning_msg").delay(800).fadeOut();
	}else{
		$.ajax({
			type: 'POST',
			url: '/get_user_appointment_fill',
			dataType: 'json',
			cache: false,
			success: function(data){
				//console.log(data);
				$("#res_name").val(data.first_name+" "+data.last_name);
				$("#res_contact").val(data.contact_number);
				$(".c_pop_up_box_reservation").fadeIn(100);
			}
		});
	}
});

$(".c_button_res_1").click(function(){
	if($("#res_name").val() == "" || $("#res_contact").val() == "" || !valid_phone_no('res_contact') || $("#res_district").val() == "select" || $("#res_time_slot").val() == "select"){
		if($("#res_name").val() == ""){
			$('#res_name').addClass('c_error_input_field_highlight');
		}
		if($("#res_contact").val() == "" || !valid_phone_no('res_contact')){
			$('#res_contact').addClass('c_error_input_field_highlight');
		}
		if($("#res_district").val() == "select"){
			$('#res_district').addClass('c_error_input_field_highlight');
		}
		if($("#res_time_slot").val() == "select"){
			$('#res_time_slot').addClass('c_error_input_field_highlight');
		}

	}else{
		$("#res_box_1").fadeOut(100,function(){
			$("#res_box_2").fadeIn(100);
		});
		var dataString = $("#c_reservation_form").serialize();
		$.ajax({
			type: 'POST',
			url: '/make_appointment',
			data: dataString,
			dataType: 'json',
			cache: false,
			success: function(data){
				console.log(data);
				$("#c_res_pending").fadeOut(100);
				$("#c_res_suc_box").fadeIn(100);
				$(".c_pop_up_box_reservation").delay(1200).fadeOut(100,function(){
					$("#res_box_1").show();
					$("#res_box_2").hide();
				});
			}
		});
	}
});

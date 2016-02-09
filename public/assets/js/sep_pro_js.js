// JavaScript Document

/* ******************* Global Functions ********************* */

// Constant Variables
var URL='/ajax';// Default Ajax Posting URL
var ALPH_PATTERN = /^[A-Za-z]+$/;//Use to check alphabetical pattern
var NUM_PATTERN = /[0-9]|\./;//Use to check numerical pattern
var EMAIL_PATTERN = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;//Use to check email`s pattern
var PHONE_PATTERN = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[ ]?([0-9]{4})$/;//Use to check phone number pattern
var NIC_PATTERN = /^\(?([0-9]{9})\)?[Vv]$/;//Use to check phone number pattern
var AJAX_CHECK_EMAIL = true; // Status after checking email
var AJAX_CHECK_USERNAME = true; // Status after checking username

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


//function validate dob with nic
function valid_nic_with_dob(para_1,para_2){
	var dob = $('input[name='+para_1+']').val();
	var nic = $('input[name='+para_2+']').val();

	//if(dob.substr(6,))
}



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

/* ******************  Home Page Sliders  ******************* */
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
/* ********************************************************** */


// This is for advanced search drop down
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
	}else if(!AJAX_CHECK_EMAIL || !AJAX_CHECK_USERNAME){
		if(!AJAX_CHECK_EMAIL){
			$('#wrn_email').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> already taken');
			show_warning('email');
		}
		if(!AJAX_CHECK_USERNAME){
			$('#wrn_username').html('<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> already taken');
			show_warning('username');
		}

		return false;
	}else{
		return true;
	}

};

/* --- Registration form validation end --- */

/* ---  This removes highlighted textbox color ---*/
function remove_highlight(para_1,para_2){
	$("#"+para_1).removeClass(para_2);
}
/* ---  This removes highlighted textbox color ---*/

function add_input_box_wrn(para_1){
	$("#"+para_1).addClass('c_error_input_field_highlight');
};

/* --- Forgotten Password Form ---*/

function check_forgotten_password_form(){
	if(valid_length_input('reset_ps_username') || valid_length_input('reset_ps_email') || !valid_email('reset_ps_email') || valid_length_input('reset_ps_password') || valid_length_input('reset_ps_confirm_password') || !valid_confirm_password('reset_ps_password','reset_ps_confirm_password')){
		if(valid_length_input('reset_ps_username')){
			add_input_box_wrn('reset_ps_username');
		}
		if(valid_length_input('reset_ps_email') || !valid_email('reset_ps_email')){
			add_input_box_wrn('reset_ps_email');
		}
		if(valid_length_input('reset_ps_password')){
			add_input_box_wrn('reset_ps_password');
		}
		if(valid_length_input('reset_ps_confirm_password')){
			add_input_box_wrn('reset_ps_confirm_password');
		}
		if(!valid_confirm_password('reset_ps_password','reset_ps_confirm_password')){
			add_input_box_wrn('reset_ps_confirm_password');
		}
		return false;
	}else{
		return true;
	}
};

/* --- Forgotten Password Form ---*/



/* --- Ajax Requests ---*/

function check_reg_existing(para_1,para_2){
	var dataString = 'type='+para_1+'&data='+para_2;
	var new_url = URL+'/'+para_1+'/'+para_2;
	if(para_1 == "email" && !valid_email('email')){
		$('#wrn_' + para_1).html('enter ' + para_1);
		$('#wrn_' + para_1).hide();
		$('#wrn_' + para_1).html('<span class="glyphicon glyphicon-remove" aria-hidden="true"  style="color:red"></span>');
		show_warning(para_1);
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

// This function use to load doctors in search result page via Ajax
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

			/////////////////////////////////////////////////
			// Pagination ///////////////////////////////////

			var txt='';
			if(data.pagination.total > data.pagination.per_page)
			{
				var pre_page_no=1;
				var next_page_no=1;
				if(data.pagination.current_page>1){
					pre_page_no = data.pagination.current_page-1;
				}
				if(data.pagination.current_page<data.pagination.last_page){
					next_page_no = data.pagination.current_page + 1;
				}else{
					next_page_no = data.pagination.current_page;
				}

				txt=txt+'<ul class="pagination"><li><a href="#page_pre='+pre_page_no+'" onclick="pagination('+pre_page_no+')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
				for(var i=1;i<=data.pagination.last_page;i++)
				{
					txt=txt+'<li ';
						if(data.pagination.current_page==i)
						{
							txt=txt+'class="active"';
						}
					txt=txt+'><a href="#page='+i+'" onclick="pagination('+i+')">'+i+' <span class="sr-only">(current)</span></a></li>';
				}
				txt=txt+'<li><a href="#page_next='+next_page_no+'" onclick="pagination('+next_page_no+')" aria-label="Next"><span aria-hidden="true">»</span></a></li></ul>';
			}


			$("#search_doc_pagination_panel").html(txt);
			txt = data.pagination.from+' - '+data.pagination.to+' of '+data.pagination.total;
			$("#c_page_no").html(txt);
			$("#c_tot_doc_filter").html(data.pagination.total);

			// Pagination ///////////////////////////////////
			/////////////////////////////////////////////////

			$("#c_loading_msg").fadeOut();
		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
};

$(document).ready(function(e){
	// Check whether current page is Search results page or not
	if($("#doc_search_page").val()=='YES') {
		doc_load_ajax(1);
	}
});

// This handles pagination links requests via calling ajax method
function pagination(para_1){
	$("#page_number_hidden").val(para_1);
	doc_load_ajax();
};

function filter_by_star_rating(para_1){
	$("#page_number_hidden").val(1);// Reset Page number into 1
	$(".c_filter_star").removeClass("c_filter_star_active");
	$(".star_"+para_1).addClass('c_filter_star_active');
	$("#filter_star_rating").val(para_1);
	doc_load_ajax();
};

function filter_reset(){
	$("#page_number_hidden").val(1);// Reset Page number into 1
	$("#filter_star_rating").val(0);// Reset Star rating into 0
	$(".c_filter_star").removeClass("c_filter_star_active");
	$("#filter_selections").trigger('reset');
	doc_load_ajax();
};

/* --- Ajax Requests ---*/

///////////////////////////////////////////////////
/////////  Profile View Page  /////////////////////

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
				var txt = '';
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
				}

				$("#comments_load_div").html(txt);
				$("#comments_loading").delay(1500).fadeOut(function () {
					$("#no_comments_div").hide();
					$("#c_comments_count_span").html(Object.keys(data).length);
					$("#comments_load_div").fadeIn();
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

///////////////////////////////////////////////////
/////////  Profile View Page  /////////////////////


//////////////////////////////////////////////////
/////////  Suggest Doctor Page ///////////////////

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
			/*$(".c_sug_doc_tabs").removeClass('c_sug_doc_tabs_active');
			 $("#c_sug_" + para_1 + "_tab").addClass('c_sug_doc_tabs_active');

			 $("#c_doc_sug_tab_3_div").show();
			 $("#c_doc_sug_tab_1_div").hide();
			 $("#c_doc_sug_tab_2_div").hide();*/
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

function validate_tab_change(para_1){
	if(para_1 == 1){
		if(valid_length_input('first_name')  || check_input_no_num('first_name') || valid_length_input('last_name')  || check_input_no_num('last_name') || valid_length_input('address_1') || valid_length_input('address_2') || valid_length_input('city')) {
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
		var status='OK';
		if(check_spec_and_treat('spec')){
			status="OK";
		}else{
			status="NO";
		}
		if(check_spec_and_treat('treat')){
			status="OK";
		}else{
			status="NO";
		}

		if(status=="OK"){

			// Set up preview panel
			$("#c_pre_name").html($("input[name=first_name]").val()+" "+$("input[name=last_name]").val());
			$("#c_pre_gender").html($("input[name=gender]").val());
			$("#c_pre_address_1").html($("input[name=address_1]").val());
			$("#c_pre_address_2").html($("input[name=address_2]").val());
			$("#c_pre_city").html($("input[name=city]").val());
			$("#c_pre_contact_no").html($("input[name=contact_no]").val());
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
};

var sep_op=1;
function add_more_op(){
	if(sep_op < 10) {
		sep_op++;
		$("#spec_count").val(sep_op);
		for (var i = 1; i <= 10; i++) {
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
		for (var i = 1; i <= 10; i++) {
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
	if(treat_op < 10) {
		treat_op++;
		$("#treat_count").val(treat_op);
		for (var i = 1; i <= 10; i++) {
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
		for (var i = 1; i <= 10; i++) {
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

//////////////////////////////////////////////////


/////////////////////////////////////////////////
///////////  My Account Page  ///////////////////

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

/////////////////////////////////////////////////
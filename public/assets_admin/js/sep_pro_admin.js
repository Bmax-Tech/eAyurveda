// JavaScript Document

$(document).ready(function(e) {
	var win_height = $(window).height();
	$("#admin_home_div").css("height",(win_height-104)+"px");
});
var doc_s=false;var pat_s=false;
$("#admin_left_nav_doc_btn").click(function(){
	if(doc_s==false){
		$("#admin_left_nav_pat").slideUp(100);
		$("#admin_left_nav_doc").slideDown(100);
		$("#c_admin_span_1").addClass("glyphicon-menu-down");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");		
		doc_s=true;
	}
	else{
		$("#admin_left_nav_doc").slideUp(100);
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		doc_s=false;
	}
});
$("#admin_left_nav_pat_btn").click(function(){
	if(pat_s==false){
		$("#admin_left_nav_doc").slideUp(100);
		$("#admin_left_nav_pat").slideDown(100);
		$("#c_admin_span_2").addClass("glyphicon-menu-down");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		pat_s=true;
	}
	else{
		$("#admin_left_nav_pat").slideUp(100);
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		pat_s=false;
	}
});

$(".c_admin_ul_li").click(function(){
	$(".c_admin_ul_li").removeClass('c_admin_li_sel');
	$(this).addClass('c_admin_li_sel');
});

$(document).ready(function(e) {
	load_doc_page(1);
});

//Doctor Home pages
function load_doc_page(para_1){
	$.ajax({
		type:'GET',
		url:'doc_admin/home_'+para_1,
		dataType:"json",
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page);
		}
	});
};

//Patient Home pages
function load_pat_page(para_1){
	$.ajax({
		type:'GET',
		url:'pat_admin/home_'+para_1,
		dataType:"json",
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data.page);
		}
	});
};

function change_tab(para_1){
	$(".c_admin_tabs").removeClass("active");
	$(this).addClass("active");

	if(para_1 == 1){
		$("#register_div").show();
		$("#comment_div").hide();
		$("#medical_div").hide();
	}else if(para_1 == 2){
		$("#medical_div").show();
		$("#register_div").hide();
		$("#comment_div").hide();

	}else if(para_1 == 3){
		$("#comment_div").show();
		$("#register_div").hide();
		$("#medical_div").hide();

	}
};
/* admin */
function change_tab_doc(para_1){

	$(".cc1").removeClass("active");

	if(para_1 == 7){
		$(".doc_admin_menu_1").addClass("active");
		$("#register_div_doc").show();
		$("#personal_div_doc").hide();
		$("#medical_div_doc").hide();
	}else if(para_1 == 8){
		if(valid_registration_first()==false){
				$("#validation_error").show();
		}else {
			$(".doc_admin_menu_2").addClass("active");
			$("#personal_div_doc").show();
			$("#register_div_doc").hide();
			$("#medical_div_doc").hide();
		}

	}else if(para_1 == 9){
		if(valid_registration_second()==false ){
			$("#validation_error").show();
		}else {
			$(".doc_admin_menu_3").addClass("active");
			$("#medical_div_doc").show();
			$("#register_div_doc").hide();
			$("#personal_div_doc").hide();
		}

	}
};
//foreign doc
function change_tab_doc_fo(para_1){

	$(".cc1").removeClass("active");

	if(para_1 == 10){
			$(".doc_admin_menu_1_fo").addClass("active");
			$("#foreign_doc_div_add").show();
			$("#foreign_doc_div_han").hide();
			$("#foreign_doc_div_ads").hide();
	}else if(para_1 == 11){
			$(".doc_admin_menu_2_fo").addClass("active");
			$("#foreign_doc_div_han").show();
			$("#foreign_doc_div_add").hide();
			$("#foreign_doc_div_ads").hide();


	}else if(para_1 == 12){
			$(".doc_admin_menu_3_fo").addClass("active");
			$("#foreign_doc_div_ads").show();
			$("#foreign_doc_div_add").hide();
			$("#foreign_doc_div_han").hide();


	}
};
// Unreg
function change_tab_undoc(para_1){
	$(".cc2").removeClass("active");


	if(para_1 == 10){

		$(".doc_admin_menu_1").addClass("active");
		$("#register_undiv_doc").show();
		$("#personal_undiv_doc").hide();
		$("#medical_undiv_doc").hide();

	}else if(para_1 == 11){
		if(valid_unregister_doc()==false){
			$("#validation_error").show();
		}else {
			$(".doc_admin_menu_2").addClass("active");
			$("#personal_undiv_doc").show();
			$("#register_undiv_doc").hide();
			$("#medical_undiv_doc").hide();
		}

	}else if(para_1 == 12){
		$(".doc_admin_menu_3").addClass("active");
		$("#medical_undiv_doc").show();
		$("#register_undiv_doc").hide();
		$("#personal_undiv_doc").hide();

	}
};
function change_doc_type(para_1){
	if(para_1 == 1){
		$(".doc_admin_tab_1").removeClass('doc_admin_tab_active');
		$("#doc_type_btn_1").addClass('doc_admin_tab_active');
		$("#doc_reg_div").show();
		$("#doc_un_reg_div").hide();
	}else {
		$(".doc_admin_tab_1").removeClass('doc_admin_tab_active');
		$("#doc_type_btn_2").addClass('doc_admin_tab_active');
		$("#doc_un_reg_div").show();
		$("#doc_reg_div").hide();
	}
};
//validation
var regsaid = /[a-zA-Z]{2}[0-9]{7}/;

// Constant Variables
var ALPH_PATTERN = /^[A-Za-z]+$/;//Use to check alphabetical pattern
var NUM_PATTERN = /[0-9]|\./;//Use to check numerical pattern
var EMAIL_PATTERN = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;//Use to check email`s pattern
var PHONE_PATTERN = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[ ]?([0-9]{4})$/;//Use to check phone number pattern
var PHONE_PATTERN_FOREIGN = /^\(?([+][1-9]{4})\)?[-. ]?([0-9]{3})[ ]?([0-9]{4})$/;//Use to check foreign phone number pattern
var PASSPORT_PATTERN = /[a-zA-Z]{2}[0-9]{7}/;//Use to check passport number pattern
var NIC_PATTERN = /^\(?([0-9]{9})\)?[Vv]$/;//Use to check phone number pattern

function isNumberKey(evt)
{
	var theEvent = evt || window.event;
	var key = theEvent.keyCode || theEvent.which;
	key = String.fromCharCode( key );
	if(ALPH_PATTERN.test(key)) {
		//if number is found in keypress event ignore that value
		theEvent.returnValue = false;
		if(theEvent.preventDefault) theEvent.preventDefault();
	}
};
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
function valid_regid_input(para_1){
	//alert("ggg");
	if($("input[name="+para_1+"]").val().length == 5){
		//return true when input field is empty
		//alert("ggg");
		return false;
	}else{
		//return false when input field has some value
		return true;
	}
};
function check_input_no_num(para_1){
	if(ALPH_PATTERN.test($("input[name="+para_1+"]").val())){
		// if all are letters return true
		return false;
	}else{
		// if some numbers found return false
		return true;
	}
};
// check passport number
function check_passport_num(para_1){
	return PASSPORT_PATTERN.test($("input[name="+para_1+"]").val());
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
//function validate foreign phone number
function valid_phone_no_fo(para_1){
	return PHONE_PATTERN_FOREIGN.test($("input[name="+para_1+"]").val());
};
function valid_nic_no(para_1){
	return NIC_PATTERN.test($("input[name="+para_1+"]").val());
};
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

	if(valid_length_input('reg_id') || valid_regid_input('reg_id') || valid_length_input('first_name') || check_input_no_num('first_name') || valid_length_input('last_name') || check_input_no_num('last_name') || valid_length_input('reg_field') || check_input_no_num('reg_field') || $("#reg_gender").val() == 'select' || valid_length_input('nic')  || !valid_nic_no('nic') || valid_length_input('address') || valid_length_input('contact_number') || !valid_phone_no('contact_number')  || valid_length_input('email') || !valid_email('email')){
		if(valid_length_input('reg_id') || valid_regid_input('reg_id')){
			show_warning('reg_id');
		}
		if(valid_length_input('first_name') || check_input_no_num('first_name')){
			show_warning('first_name');
		}
		if(valid_length_input('last_name') || check_input_no_num('last_name')){
			show_warning('last_name');
		}
		if(valid_length_input('reg_field') || check_input_no_num('reg_field')){
			show_warning('reg_field');
		}
		if($("#reg_gender").val() == 'select'){
			show_warning('gender');
		}
		if(valid_length_input('nic') || !valid_nic_no('nic')){
			show_warning('nic');
		}
		if(valid_length_input('address')){
			show_warning('address');
		}
		if(valid_length_input('contact_number') || !valid_phone_no('contact_number')){
			show_warning('contact_number');
		}
		if(valid_length_input('email') || !valid_email('email')){
			show_warning('email');
		}

		return false;

	}else{

		return true;
	}

};

function valid_registration_first(){

	if(valid_length_input('reg_id') || valid_regid_input('reg_id') || valid_length_input('first_name') || check_input_no_num('first_name') || valid_length_input('last_name') || check_input_no_num('last_name') || valid_length_input('reg_field') || check_input_no_num('reg_field') ||valid_length_input('reg_date')){
		if(valid_length_input('reg_id') || valid_regid_input('reg_id')){
			show_warning('reg_id');
		}


		if(valid_length_input('first_name') || check_input_no_num('first_name')){
			show_warning('first_name');
		}
		if(valid_length_input('last_name') || check_input_no_num('last_name')){
			show_warning('last_name');
		}
		if(valid_length_input('reg_field') || check_input_no_num('reg_field')){
			show_warning('reg_field');
		}
		if(valid_length_input('reg_date')){
			show_warning('reg_date');
		}

		//$("#validation_error").show();
		return false;

	}else{
		return true;
	}

};
function valid_registration_second(){

	if(valid_length_input('dob') || valid_length_input('nic') || !valid_nic_no('nic')||valid_length_input('address1') || valid_length_input('city') || valid_length_input('contact_number') || !valid_phone_no('contact_number')||valid_length_input('email') || !valid_email('email') || check_input_no_num('last_name')  ){
		if(valid_length_input('dob') ){
			show_warning('dob');
		}
		if(valid_length_input('nic') || !valid_nic_no('nic')){
			show_warning('nic');
		}
		if(valid_length_input('address1')){
			show_warning('address1');
		}
		if(valid_length_input('city') ){
			show_warning('city');
		}
		if(valid_length_input('contact_number') || !valid_phone_no('contact_number')){
			show_warning('contact_number');
		}
		if(valid_length_input('email') || !valid_email('email')){
			show_warning('email');
		}



		//$("#validation_error").show();
		return false;

	}else{
		return true;
	}

};
/* --- Registration form validation end --- */
/* ------Unregistered Doctor Validation start---- */

function valid_unregister_doc(){
	if(valid_length_input('un_first_name') ||
		check_input_no_num('un_first_name')|| valid_length_input('un_last_name') || check_input_no_num('un_last_name') ||
		valid_length_input('un_dob')||	valid_length_input('un_nic')  || !valid_nic_no('un_nic')||
		valid_length_input('un_address_1') ||valid_length_input('un_address_2') ||valid_length_input('un_city') ||
		valid_length_input('un_contact_number') || !valid_phone_no('un_contact_number')  || valid_length_input('un_email') || !valid_email('un_email') ){

		if(valid_length_input('un_first_name') || check_input_no_num('un_first_name')){
			show_warning('un_first_name');
		}
		if(valid_length_input('un_last_name') || check_input_no_num('un_last_name')){
			show_warning('un_last_name');
		}
		if(valid_length_input('un_dob') ){
			show_warning('un_dob');
		}
		if(valid_length_input('un_nic') || !valid_nic_no('un_nic')){
			show_warning('un_nic');
		}
		if(valid_length_input('un_address_1')){
			show_warning('un_address_1');
		}
		if(valid_length_input('un_address_2')){
			show_warning('un_address_2');
		}
		if(valid_length_input('un_city')){
			show_warning('un_city');
		}
		if(valid_length_input('un_contact_number') || !valid_phone_no('un_contact_number')){
			show_warning('un_contact_number');
		}
		if(valid_length_input('un_email') || !valid_email('un_email')){
			show_warning('un_email');
		}
		return false;
	}else{
		//alert("Success");
		return true;
	}

};
/* ------Unregistered Doctor Validation end---- */
// -----------Login--------------------------------
function remove_highlight(para_1,para_2){
	$("#"+para_1).removeClass(para_2);
}
// -------------Login end -------------------------
function load_doc_update(para_1){
	$.ajax({
		type:'GET',
		url:'/load_doc_update',
		dataType:"json",
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page);
		}
	});
}
function load_doc_remove(para_1){

	$.ajax({
		type:'GET',
		url:'/load_doc_remove',
		dataType:"json",
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page_r);
		}
	});
}
function load_doc_confirm(){

	$.ajax({
		type:'GET',
		url:'/load_doc_confirm',
		dataType:"json",
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page_r);
		}
	});
}
function load_doc_foreign(){

	$.ajax({
		type:'GET',
		url:'/load_doc_foreign',
		dataType:"json",
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page_r);
		}
	});
}
function load_doc_foreign_search(){

	var dataString=$("#filter_doc_rm").serialize();

	$.ajax({
		type:'POST',
		url:"/load_doc_foreign_search",
		dataType:"json",
		data:dataString,
		cache:false,
		success:function(data) {
			console.log(data);

			var t='';
			for (var i = 0; i < Object(data["com_data_f"]).length; i++) {
				t=t+'<div class="col-lg-2" style="width:100px;height:100px;background-color:rgba(0, 255, 21, 0.37);margin-bottom:5px">';
				t=t+'<img src="assets_admin/img/dd.png" style="width:80px;height:100px">';
				t=t+'</div>';
			 	t=t+'<div class="col-lg-4" style="width:618px;height:100px;background-color:rgba(42, 171, 210, 0.12);margin-bottom:5px">';
				t=t+'<p style="font-size:20px;font-weight:600">Dr.&nbsp;' + data["com_data_f"][i]["first_name"] + '&nbsp;&nbsp;' + data["com_data_f"][i]["last_name"] + '</p>';
				t=t+'<p style="font-size:15px"> From ' + data["com_data_f"][i]["country"] + ' can be contacted on ' + data["com_data_f"][i]["contact_number"] + '</p>';
				t=t+'<p style="font-size:12px"> Will Come to ' + data["com_data_f"][i]["place"] + ' on  ' + data["com_data_f"][i]["comming_date"] + ' at ' + data["com_data_f"][i]["time"] + '</p>';
				t=t+'</div>';
				t=t+'<div class="col-lg-4" style="width:150px;height:100px;background-color:rgba(27, 109, 133, 0.25);margin-bottom:5px">';
				t=t+'<button type="button" class="btn_sub_but" style="background:#4dddff;border: 1px solid #4dddff;"><img src="assets_admin/img/user_logo.png" style="width: 18px;margin-right: 12px;margin-top: -5px">View&nbsp;&nbsp;&nbsp;&nbsp;</button>';

				t=t+'<button type="button" class="btn_sub_but" style="background:#5ce872;border: 1px solid #5ce872"><img src="assets_admin/img/user_logo.png" style="width: 18px;margin-right: 12px;margin-top: -5px">Update</button>';

				t=t+'<button type="button" class="btn_sub_but" style="background:#f37a90;border: 1px solid #f37a90;"><img src="assets_admin/img/user_logo.png" style="width: 18px;margin-right: 12px;margin-top: -5px">Remove</button>';


				t=t+'</div>';


				}


			$("#se").html(t);

		}
		});




		}
function load_view_doc(){
	$.ajax({
		type:'GET',
		url:'/load_doc_remove',
		dataType:"json",
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page_r);
		}
	});
}
function load_view_doc_details(){
	$.ajax({
		type:'GET',
		url:'/doc_view',
		dataType:"json",
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page_r);
		}
	});
}
function change_view(para_1){
	var dataString="$reg_id="+para_1;
	var new_url='/admin_doc_views/home_2'+para_1;
	$.ajax({
		type:'GET',
		url:new_url,
		data:dataString,
		cache: false,
		success: function(data){
			//console.log(data);
			$("#doc_view_profile").html(data.page_view);
		}
	});
}
// View doctor Profile /////////////////
//var doc_id = $("#doc_fil_id").val();
var dc;
function search_data(){

	var dataString=$("#filter_doc").serialize();

	$.ajax({
		type:'POST',
		url:"/admin_doc/search_data",
		dataType:"json",
		data:dataString,
		cache:false,
		success:function(data){
			//console.log(Object(data["com_data"]));
		var	txt = '<table class="table table-striped" id="table_pop_1">';
			txt=txt+'<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>City</td><td>Gender</td></tr>';
			for(var i=0;i<Object(data["com_data"]).length;i++) {
				 dc=data["com_data"][i]["id"];

				txt = txt + '<tr><td>' + data["com_data"][i]["id"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["first_name"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["last_name"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["city"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["gender"] + '</td>';
				txt = txt + '<td align="left" style="width: 100px"> <button type="button" style="width:100px;background-color:rgba(102, 102, 102, 0.31)" onClick="view_doctor_profile(dc)">view</button></td>';
				txt = txt + '<td align="left" style="width: 100px"> <button type="button" style="width:100%;background-color:rgba(162, 46, 46, 0.36)" onClick="change_to_edit_mode(dc)">Update</button></td></tr>';
			}
			txt = txt+'</table>';

			$("#t_body").html(txt);
			$("#doc_p").hide();


		}
	});
};
var dc;
function search_data_r(){

	var dataString=$("#filter_doc_rm").serialize();

	$.ajax({
		type:'POST',
		url:"/admin_doc/search_data_r",
		dataType:"json",
		data:dataString,
		cache:false,
		success:function(data){
			//console.log(Object(data["com_data"]));
			var	txt = '<table class="table table-striped" id="table_pop_2">';
			txt=txt+'<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>City</td><td>Gender</td></tr>';
			for(var i=0;i<Object(data["com_data"]).length;i++) {
				dc=data["com_data"][i]["id"];

				txt = txt + '<tr><td>' + data["com_data"][i]["id"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["first_name"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["last_name"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["city"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["gender"] + '</td>';
				txt = txt + '<td align="left" style="width: 100px"> <button type="button" style="width:100px;background-color:rgba(102, 102, 102, 0.31)" onClick="view_doctor_profile(dc)">view</button></td>';
				txt = txt + '<td align="left" style="width: 100px"> <button type="button" style="width:100%;background-color:rgba(162, 46, 46, 0.36)" onClick="change_to_edit_mode(dc)">Update</button></td></tr>';
			}
			txt = txt+'</table>';

			$("#t_body_remove").html(txt);
			$("#doc_p").hide();


		}
	});
};
function search_data_up(){
	var dataString=$("#search_doc_up").serialize();

	$.ajax({
		type:'POST',
		url:"/admin_doc/search_data_up",
		dataType:"json",
		data:dataString,
		cache:false,
		success:function(data){
			//console.log(Object(data["com_data"]));
			var	txt = '<table class="table table-striped" id="table_pop_1">';
			txt=txt+'<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>City</td><td>Gender</td></tr>';
			for(var i=0;i<Object(data["com_data"]).length;i++) {
				dc=data["com_data"][i]["id"];

				txt = txt + '<tr><td>' + data["com_data"][i]["id"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["first_name"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["last_name"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["city"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["gender"] + '</td>';
				txt = txt + '<td align="left" style="width: 100px"> <button type="button" style="width:100px;background-color:rgba(102, 102, 102, 0.31)" onClick="view_doctor_profile(dc)">view</button></td>';
				txt = txt + '<td align="left" style="width: 100px"> <button type="button" style="width:100%;background-color:rgba(162, 46, 46, 0.36)" onClick="change_to_edit_mode(dc)">Update</button></td></tr>';
			}
			txt = txt+'</table>';

			$("#t_body").html(txt);
			$("#doc_p").hide();


		}
	});
};
function search_data_remove(){

	var dataString=$("#search_doc_remove").serialize();

	$.ajax({
		type:'POST',
		url:"/admin_doc/search_data_remove",
		dataType:"json",
		data:dataString,
		cache:false,
		success:function(data){
			//console.log(Object(data["com_data"]));
			var	txt = '<table class="table table-striped" id="table_pop_2">';
			txt=txt+'<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>City</td><td>Gender</td></tr>';
			for(var i=0;i<Object(data["com_data"]).length;i++) {
				dc=data["com_data"][i]["id"];

				txt = txt + '<tr><td>' + data["com_data"][i]["id"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["first_name"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["last_name"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["city"] + '</td>';
				txt = txt + '<td>' + data["com_data"][i]["gender"] + '</td>';
				txt = txt + '<td align="left" style="width: 100px"> <button type="button" style="width:100px;background-color:rgba(102, 102, 102, 0.31)" onClick="view_doctor_profile(dc)">view</button></td>';
				txt = txt + '<td align="left" style="width: 100px"> <button type="button" style="width:100%;background-color:rgba(162, 46, 46, 0.36)" onClick="re(dc)">Remove</button></td></tr>';
			}
			txt = txt+'</table>';

			$("#t_body_remove").html(txt);
			$("#doc_p").hide();


		}
	});

}
function view_doctor_profile(para_1){
	var new_url = '/admin_doc/profile_view/'+para_1;
	$.ajax({
		type:'GET',
		url:new_url,
		dataType:"json",
		cache:false,
		success:function(data){
			//console.log(data);
			if((data['doctor_data']['doc_type'])=="FORMAL") {

				txt = '<table class="table_doc_pop" id="table_pop_1">';
				txt = txt+'<tr><td style="height:30px; width:200px">ID</td><td>'+data['doctor_data']['id']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">ayurvedic</td><td>'+data['formal_data']['ayurvedic_id']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">First name</td><td>'+data['doctor_data']['first_name']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">First name</td><td>'+data['doctor_data']['last_name']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">Registered date</td><td>'+data['formal_data']['ayurvedic_reg_date']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">Registered field</td><td>'+data['formal_data']['registered_field']+'</td><tr>';

				//----------------------------------------------------------------------------------------------------------------------------
				txt1 = '<table class="table_doc_pop" id="table_pop_1">';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">First name</td><td>'+data['doctor_data']['dob']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Date of birth</td><td>'+data['doctor_data']['nic']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">NIC </td><td>'+data['doctor_data']['address_1']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Address </td><td>'+data['doctor_data']['address_2']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">NIC </td><td>'+data['doctor_data']['city']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Address </td><td>'+data['doctor_data']['contact_number']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Email Address</td><td>'+data['doctor_data']['email']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Email Address</td><td>'+data['doctor_data']['description']+'</td><tr>';
				txt1 = txt1+'</table>';
				//-----------------------------------------------------------------------------------------------------------------------------
				txt2 = '<table class="table_doc_pop" id="table_pop_1">';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Specialization 1</td><td>'+data['spec_data']['spec_1']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Specialization 2</td><td>'+data['spec_data']['spec_2']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Specialization 3</td><td>'+data['spec_data']['spec_3']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Specialization 4</td><td>'+data['spec_data']['spec_4']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Specialization 5</td><td>'+data['spec_data']['spec_5']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Specialization 6</td><td>'+data['spec_data']['spec_6']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Specialization 7</td><td>'+data['spec_data']['spec_7']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Specialization 8</td><td>'+data['spec_data']['spec_8']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Specialization 9</td><td>'+data['spec_data']['spec_9']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Specialization 10</td><td>'+data['spec_data']['spec_10']+'</td><tr>';
				txt2 = txt2+'</table>';
				//------------------------------------------------------------------------------------------------------------------------------
				txt3 = '<table class="table_doc_pop" id="table_pop_1">';
				txt3 = txt3+'<tr><td style="height:30px; width:200px">Specialization 1</td><td>'+data['treat_data']['treat_1']+'</td><tr>';
				txt3 = txt3+'<tr><td style="height:30px; width:200px">Specialization 2</td><td>'+data['treat_data']['treat_2']+'</td><tr>';
				txt3 = txt3+'<tr><td style="height:30px; width:200px">Specialization 3</td><td>'+data['treat_data']['treat_3']+'</td><tr>';
				txt3 = txt3+'<tr><td style="height:30px; width:200px">Specialization 4</td><td>'+data['treat_data']['treat_4']+'</td><tr>';
				txt3 = txt3+'<tr><td style="height:30px; width:200px">Specialization 5</td><td>'+data['treat_data']['treat_5']+'</td><tr>';
				txt3 = txt3+'<tr><td style="height:30px; width:200px">Specialization 6</td><td>'+data['treat_data']['treat_6']+'</td><tr>';
				txt3 = txt3+'<tr><td style="height:30px; width:200px">Specialization 7</td><td>'+data['treat_data']['treat_7']+'</td><tr>';
				txt3 = txt3+'<tr><td style="height:30px; width:200px">Specialization 8</td><td>'+data['treat_data']['treat_8']+'</td><tr>';
				txt3 = txt3+'<tr><td style="height:30px; width:200px">Specialization 9</td><td>'+data['treat_data']['treat_9']+'</td><tr>';
				txt3 = txt3+'<tr><td style="height:30px; width:200px">Specialization 10</td><td>'+data['treat_data']['treat_10']+'</td><tr>';
				txt3 = txt3+'</table>';
				$("#pop_view_2").html(txt);
				$("#pop_view_3").html(txt1);
				$("#pop_view_4").html(txt2);
				$("#pop_view_4").html(txt3);
				$("#doc_view_profile").show();
				$("#pop1").show();
				$("#pop_tab_1").show();
			}else{
				txt = '<table class="table_doc_pop" id="table_pop_1">';
				txt = txt+'<tr><td style="height:30px; width:200px">ID</td><td>'+data['doctor_data']['id']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">First name</td><td>'+data['doctor_data']['first_name']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">Last name</td><td>'+data['doctor_data']['last_name']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">Date of birth</td><td>'+data['doctor_data']['dob']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">NIC</td><td>'+data['doctor_data']['nic']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">Address 1 </td><td>'+data['doctor_data']['address_1']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">Address 2</td><td>'+data['doctor_data']['address_2']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">City </td><td>'+data['doctor_data']['city']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">Contact Number </td><td>'+data['doctor_data']['contact_number']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">Email Address</td><td>'+data['doctor_data']['email']+'</td><tr>';
				txt = txt+'<tr><td style="height:30px; width:200px">Description</td><td>'+data['doctor_data']['description']+'</td><tr>';

				//----------------------------------------------------------------------------------------------------------------------------
				txt1 = '<table class="table_doc_pop" id="table_pop_1">';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Specialization 1</td><td>'+data['spec_data']['spec_1']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Specialization 2</td><td>'+data['spec_data']['spec_2']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Specialization 3</td><td>'+data['spec_data']['spec_3']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Specialization 4</td><td>'+data['spec_data']['spec_4']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Specialization 5</td><td>'+data['spec_data']['spec_5']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Specialization 6</td><td>'+data['spec_data']['spec_6']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Specialization 7</td><td>'+data['spec_data']['spec_7']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Specialization 8</td><td>'+data['spec_data']['spec_8']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Specialization 9</td><td>'+data['spec_data']['spec_9']+'</td><tr>';
				txt1 = txt1+'<tr><td style="height:30px; width:200px">Specialization 10</td><td>'+data['spec_data']['spec_10']+'</td><tr>';
				txt1 = txt1+'</table>';
				//-----------------------------------------------------------------------------------------------------------------------------
				txt2 = '<table class="table_doc_pop" id="table_pop_1">';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Treatment 1</td><td>'+data['treat_data']['treat_1']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Treatment 2</td><td>'+data['treat_data']['treat_2']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Treatment 3</td><td>'+data['treat_data']['treat_3']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Treatment 4</td><td>'+data['treat_data']['treat_4']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Treatment 5</td><td>'+data['treat_data']['treat_5']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Treatment 6</td><td>'+data['treat_data']['treat_6']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Treatment 7</td><td>'+data['treat_data']['treat_7']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Treatment 8</td><td>'+data['treat_data']['treat_8']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Treatment 9</td><td>'+data['treat_data']['treat_9']+'</td><tr>';
				txt2 = txt2+'<tr><td style="height:30px; width:200px">Treatment 10</td><td>'+data['treat_data']['treat_10']+'</td><tr>';
				txt2 = txt2+'</table>';

				$("#pop_view_2").html(txt);
				$("#pop_view_3").html(txt1);
				$("#pop_view_4").html(txt2);

				$("#doc_view_profile").show();
				$("#pop1").show();
				$("#pop_tab_1").show();
			}

		}
	});

};
//----------------------------------------------------------------------------------------------
function change_doc_view_inpop(para_1){
	$(".bb1").removeClass("pop_but_active");
	if(para_1 == 17){
		$(".pop_but_1").addClass("pop_but_active");
		$("#pop_view_2").show();
		$("#pop_view_3").hide();
		$("#pop_view_4").hide();
	}
	if(para_1 == 18){
		$(".pop_but_2").addClass("pop_but_active");
		$("#pop_view_3").show();
		$("#pop_view_2").hide();
		$("#pop_view_4").hide();
	}
	if(para_1 == 19){
		$(".pop_but_3").addClass("pop_but_active");
		$("#pop_view_4").show();
		$("#pop_view_2").hide();
		$("#pop_view_3").hide();
	}
};
// edit mode
function change_to_edit_mode(para_1){
	//console.log(data);
	var new_url = '/admin_doc/update_view/'+para_1;
	$.ajax({
		type:'GET',
		url:new_url,
		dataType:"json",
		cache:false,
		success:function(data){
			if((data['doctor_data']['doc_type'])=="FORMAL"){
				alert("Formal")

			//console.log(data);
			txtu = '<table class="table_doc_pop" id="table_pop_1"><input type="hidden" name="doctor_hidden_id" value="'+data['doctor_data']['id']+'">';
			txtu = txtu+'<tr><td style="height:50px; width:200px">Aurvedi ID</td><td><input class="c_text_box_1" type="text" name="ayurvedic_id" autocomplete="off" spellcheck="false" value="'+data['formal_data']['ayurvedic_id']+'"/></td><tr>';
			txtu = txtu+'<tr><td style="height:50px; width:200px">First name</td><td><input class="c_text_box_1" type="text" name="first_name" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['first_name']+'"/></td><tr>';
			txtu = txtu+'<tr><td style="height:50px; width:200px">Last name</td><td><input class="c_text_box_1" type="text" name="last_name" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['last_name']+'"/></td><tr>';
			txtu = txtu+'<tr><td style="height:50px; width:200px">Ayrvedic Register Date</td><td><input class="c_text_box_1" type="text" name="ayurvedic_reg_date" autocomplete="off" spellcheck="false" value="'+data['formal_data']['ayurvedic_reg_date']+'"/></td><tr>';
			txtu = txtu+'<tr><td style="height:50px; width:200px">Registered Field</td><td><input class="c_text_box_1" type="text" name="reg_field" autocomplete="off" spellcheck="false" value="'+data['formal_data']['registered_field']+'"/></td><tr>';

			txtu = txtu+'</table>';
//-------------------------------------------------------------------------------------------------------------------------------
			txt1u = '<table class="table_doc_pop" id="table_pop_1">';
			txt1u = txt1u+'<tr><td style="height:45px; width:200px">Date of Birth</td><td><input class="c_text_box_1" type="text" name="dob" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['dob']+'"/></td><tr>';
			txt1u = txt1u+'<tr><td style="height:45px; width:200px">NIC</td><td><input class="c_text_box_1" type="text" name="nic" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['nic']+'"/></td><tr>';
			txt1u = txt1u+'<tr><td style="height:45px; width:200px">Address 1</td><td><input class="c_text_box_1" type="text" name="address_1" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['address_1']+'"/></td><tr>';
			txt1u = txt1u+'<tr><td style="height:45px; width:200px">Address 2</td><td><input class="c_text_box_1" type="text" name="address_2" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['address_2']+'"/></td><tr>';
			txt1u = txt1u+'<tr><td style="height:45px; width:200px">Contact Number</td><td><input class="c_text_box_1" type="text" name="contact_number" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['contact_number']+'"/></td><tr>';
			txt1u = txt1u+'<tr><td style="height:45px; width:200px">City</td><td><input class="c_text_box_1" type="text" name="city" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['city']+'"/></td><tr>';
			txt1u = txt1u+'<tr><td style="height:45px; width:200px">Email</td><td><input class="c_text_box_1" type="text" name="email" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['email']+'"/></td><tr>';
			txt1u = txt1u+'<tr><td style="height:45px; width:200px">Description</td><td><input class="c_text_box_1" type="text" name="description" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['description']+'"/></td><tr>';
			txt1u = txt1u+'</table>';
//-------------------------------------------------------------------------------------------------------------------------------
			txt2u = '<table class="table_doc_pop" id="table_pop_1">';
			txt2u = txt2u+'<tr><td style="height:35px; width:200px">Specialization 1</td><td><input class="c_text_box_1up" type="text" name="fspec1" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_1']+'"/></td><tr>';
			txt2u = txt2u+'<tr><td style="height:35px; width:200px">Specialization 2</td><td><input class="c_text_box_1up" type="text" name="fspec2" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_2']+'"/></td><tr>';
			txt2u = txt2u+'<tr><td style="height:35px; width:200px">Specialization 3</td><td><input class="c_text_box_1up" type="text" name="fspec3" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_3']+'"/></td><tr>';
			txt2u = txt2u+'<tr><td style="height:35px; width:200px">Specialization 4</td><td><input class="c_text_box_1up" type="text" name="fspec4" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_4']+'"/></td><tr>';
			txt2u = txt2u+'<tr><td style="height:35px; width:200px">Specialization 5</td><td><input class="c_text_box_1up" type="text" name="fspec5" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_5']+'"/></td><tr>';
			txt2u = txt2u+'<tr><td style="height:35px; width:200px">Specialization 6</td><td><input class="c_text_box_1up" type="text" name="fspec6" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_6']+'"/></td><tr>';
			txt2u = txt2u+'<tr><td style="height:35px; width:200px">Specialization 7</td><td><input class="c_text_box_1up" type="text" name="fspec7" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_7']+'"/></td><tr>';
			txt2u = txt2u+'<tr><td style="height:35px; width:200px">Specialization 8</td><td><input class="c_text_box_1up" type="text" name="fspec8" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_8']+'"/></td><tr>';
			txt2u = txt2u+'<tr><td style="height:35px; width:200px">Specialization 9</td><td><input class="c_text_box_1up" type="text" name="fspec9" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_9']+'"/></td><tr>';
			txt2u = txt2u+'<tr><td style="height:35px; width:200px">Specialization 10</td><td><input class="c_text_box_1up" type="text" name="fspec10" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_10']+'"/></td><tr>';
			txt2u = txt2u+'</table>';

//-------------------------------------------------------------------------------------------------------------------------------
			txt3u = '<table class="table_doc_pop" id="table_pop_1">';
			txt3u = txt3u+'<tr><td style="height:35px; width:200px">Treatment 1</td><td><input class="c_text_box_1up" type="text" name="ftreat1" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_1']+'"/></td><tr>';
			txt3u = txt3u+'<tr><td style="height:35px; width:200px">Treatment 2</td><td><input class="c_text_box_1up" type="text" name="ftreat2" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_2']+'"/></td><tr>';
			txt3u = txt3u+'<tr><td style="height:35px; width:200px">Treatment 3</td><td><input class="c_text_box_1up" type="text" name="ftreat3" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_3']+'"/></td><tr>';
			txt3u = txt3u+'<tr><td style="height:35px; width:200px">Treatment 4</td><td><input class="c_text_box_1up" type="text" name="ftreat4" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_4']+'"/></td><tr>';
			txt3u = txt3u+'<tr><td style="height:35px; width:200px">Treatment 5</td><td><input class="c_text_box_1up" type="text" name="ftreat5" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_5']+'"/></td><tr>';
			txt3u = txt3u+'<tr><td style="height:35px; width:200px">Treatment 6</td><td><input class="c_text_box_1up" type="text" name="ftreat6" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_6']+'"/></td><tr>';
			txt3u = txt3u+'<tr><td style="height:35px; width:200px">Treatment 7</td><td><input class="c_text_box_1up" type="text" name="ftreat7" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_7']+'"/></td><tr>';
			txt3u = txt3u+'<tr><td style="height:35px; width:200px">Treatment 8</td><td><input class="c_text_box_1up" type="text" name="ftreat8" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_8']+'"/></td><tr>';
			txt3u = txt3u+'<tr><td style="height:35px; width:200px">Treatment 9</td><td><input class="c_text_box_1up" type="text" name="ftreat9" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_9']+'"/></td><tr>';
			txt3u = txt3u+'<tr><td style="height:35px; width:200px">Treatment 10</td><td><input class="c_text_box_1up" type="text" name="ftreat10" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_10']+'"/></td><tr>';
			txt3u = txt3u+'<tr><td></td><td "><button type="button" style="width:200px;height:50px;background-color:rgba(119, 202, 108, 0.98);margin-left:28px;margin-top:10px" onclick="upp_pop()" id="up_bt">Update</button></td><tr>';
			txt3u = txt3u+'</table>';

			$("#pop_update_2").html(txtu);
		    $("#pop_update_3").html(txt1u);
			$("#pop_update_4").html(txt2u);
			$("#pop_update_5").html(txt3u);



			$("#doc_update_view").show();
			$("#pop_update_vi_1").show();
			$("#pop_tab_update_1").show();
			$("#pop_header_u").show();

			}else{
				//console.log(data);
				txtun = '<table class="table_doc_pop" id="table_pop_1"><input type="hidden" name="doctor_hidden_id" value="'+data['doctor_data']['id']+'">';
				txtun = txtun+'<tr><td style="height:40px; width:200px">First name</td><td><input class="c_text_box_1" type="text" name="first_name" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['first_name']+'"/></td><tr>';
				txtun = txtun+'<tr><td style="height:40px; width:200px">Last name</td><td><input class="c_text_box_1" type="text" name="last_name" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['last_name']+'"/></td><tr>';
				txtun = txtun+'<tr><td style="height:40px; width:200px">Date of Birth</td><td><input class="c_text_box_1" type="text" name="dob" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['dob']+'"/></td><tr>';
				txtun = txtun+'<tr><td style="height:40px; width:200px">NIC</td><td><input class="c_text_box_1" type="text" name="nic" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['nic']+'"/></td><tr>';
				txtun = txtun+'<tr><td style="height:40px; width:200px">Address 1</td><td><input class="c_text_box_1" type="text" name="address_1" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['address_1']+'"/></td><tr>';
				txtun = txtun+'<tr><td style="height:40px; width:200px">Address 2</td><td><input class="c_text_box_1" type="text" name="address_2" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['address_2']+'"/></td><tr>';
				txtun = txtun+'<tr><td style="height:40px; width:200px">Contact Number</td><td><input class="c_text_box_1" type="text" name="contact_number" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['contact_number']+'"/></td><tr>';
				txtun = txtun+'<tr><td style="height:40px; width:200px">City</td><td><input class="c_text_box_1" type="text" name="city" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['city']+'"/></td><tr>';
				txtun = txtun+'<tr><td style="height:40px; width:200px">Email</td><td><input class="c_text_box_1" type="text" name="email" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['email']+'"/></td><tr>';
				txtun = txtun+'<tr><td style="height:40px; width:200px">Description</td><td><input class="c_text_box_1" type="text" name="description" autocomplete="off" spellcheck="false" value="'+data['doctor_data']['description']+'"/></td><tr>';

				txtun = txtun+'</table>';
//-------------------------------------------------------------------------------------------------------------------------------
				txt1un = '<table class="table_doc_pop" id="table_pop_1">';
				txt1un = txt1un+'</table>';
//-------------------------------------------------------------------------------------------------------------------------------
				txt2un = '<table class="table_doc_pop" id="table_pop_1">';
				txt2un = txt2un+'<tr><td style="height:35px; width:200px">Specialization 1</td><td><input class="c_text_box_1up" type="text" name="nspec1" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_1']+'"/></td><tr>';
				txt2un = txt2un+'<tr><td style="height:35px; width:200px">Specialization 2</td><td><input class="c_text_box_1up" type="text" name="nspec2" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_2']+'"/></td><tr>';
				txt2un = txt2un+'<tr><td style="height:35px; width:200px">Specialization 3</td><td><input class="c_text_box_1up" type="text" name="nspec3" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_3']+'"/></td><tr>';
				txt2un = txt2un+'<tr><td style="height:35px; width:200px">Specialization 4</td><td><input class="c_text_box_1up" type="text" name="nspec4" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_4']+'"/></td><tr>';
				txt2un = txt2un+'<tr><td style="height:35px; width:200px">Specialization 5</td><td><input class="c_text_box_1up" type="text" name="nspec5" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_5']+'"/></td><tr>';
				txt2un = txt2un+'<tr><td style="height:35px; width:200px">Specialization 6</td><td><input class="c_text_box_1up" type="text" name="nspec6" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_6']+'"/></td><tr>';
				txt2un = txt2un+'<tr><td style="height:35px; width:200px">Specialization 7</td><td><input class="c_text_box_1up" type="text" name="nspec7" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_7']+'"/></td><tr>';
				txt2un = txt2un+'<tr><td style="height:35px; width:200px">Specialization 8</td><td><input class="c_text_box_1up" type="text" name="nspec8" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_8']+'"/></td><tr>';
				txt2un = txt2un+'<tr><td style="height:35px; width:200px">Specialization 9</td><td><input class="c_text_box_1up" type="text" name="nspec9" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_9']+'"/></td><tr>';
				txt2un = txt2un+'<tr><td style="height:35px; width:200px">Specialization 10</td><td><input class="c_text_box_1up" type="text" name="nspec10" autocomplete="off" spellcheck="false" value="'+data['spec_data']['spec_10']+'"/></td><tr>';

				txt2un = txt2un+'</table>';

//-------------------------------------------------------------------------------------------------------------------------------
				txt3un = '<table class="table_doc_pop" id="table_pop_1">';
				txt3un = txt3un+'<tr><td style="height:35px; width:200px">Treatment 1</td><td><input class="c_text_box_1up" type="text" name="ntreat1" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_1']+'"/></td><tr>';
				txt3un = txt3un+'<tr><td style="height:35px; width:200px">Treatment 2</td><td><input class="c_text_box_1up" type="text" name="ntreat2" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_2']+'"/></td><tr>';
				txt3un = txt3un+'<tr><td style="height:35px; width:200px">Treatment 3</td><td><input class="c_text_box_1up" type="text" name="ntreat3" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_3']+'"/></td><tr>';
				txt3un = txt3un+'<tr><td style="height:35px; width:200px">Treatment 4</td><td><input class="c_text_box_1up" type="text" name="ntreat4" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_4']+'"/></td><tr>';
				txt3un = txt3un+'<tr><td style="height:35px; width:200px">Treatment 5</td><td><input class="c_text_box_1up" type="text" name="ntreat5" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_5']+'"/></td><tr>';
				txt3un = txt3un+'<tr><td style="height:35px; width:200px">Treatment 6</td><td><input class="c_text_box_1up" type="text" name="ntreat6" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_6']+'"/></td><tr>';
				txt3un = txt3un+'<tr><td style="height:35px; width:200px">Treatment 7</td><td><input class="c_text_box_1up" type="text" name="ntreat7" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_7']+'"/></td><tr>';
				txt3un = txt3un+'<tr><td style="height:35px; width:200px">Treatment 8</td><td><input class="c_text_box_1up" type="text" name="ntreat8" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_8']+'"/></td><tr>';
				txt3un = txt3un+'<tr><td style="height:35px; width:200px">Treatment 9</td><td><input class="c_text_box_1up" type="text" name="ntreat9" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_9']+'"/></td><tr>';
				txt3un = txt3un+'<tr><td style="height:35px; width:200px">Treatment 10</td><td><input class="c_text_box_1up" type="text" name="ntreat10" autocomplete="off" spellcheck="false" value="'+data['treat_data']['treat_10']+'"/></td><tr>';
				txt3un = txt3un+'<tr><td></td><td "><button type="button" style="width:200px;height:50px;background-color:rgba(119, 202, 108, 0.98);margin-left:28px;margin-top:10px" onclick="upp_pop()" id="up_bt">Update</button></td><tr>';

				txt3un = txt3un+'</table>';
//---------------------------------------------------------------------------------------------------------------------------------
				$("#pop_update_2").html(txtun);
				$("#pop_update_3").html(txt1un);
				$("#pop_update_4").html(txt2un);
				$("#pop_update_5").html(txt3un);

				$("#doc_update_view").show();
				$("#pop_update_vi_1").show();
				$("#pop_tab_update_1").show();
				$("#pop_header_u").show();

			}


		}
	});
};

function update_doc_t(){
	var  dataString = $("#update_doc_profile_pop_up").serialize();
	//alert(dataString);
	//console.log(dataString);
	$.ajax({
		type:'POST',
		dataType:"json",
		url:'/update_doc',
		data:dataString,
		cache:false,
		success: function(data){
			//alert(data.results);
			$("#doc_pop_up_date").hide();
		}
	});
};


function change_doc_update_inpop(para_1){
	$(".xx1").removeClass("pop_but_active");
	if(para_1 == 25){
		$(".pop_but_1").addClass("pop_but_active");
		$("#pop_update_2").show();
		$("#pop_update_3").hide();
		$("#pop_update_4").hide();
		$("#pop_update_5").hide();
	}
	if(para_1 == 26){
		$(".pop_but_2").addClass("pop_but_active");
		$("#pop_update_3").show();
		$("#pop_update_2").hide();
		$("#pop_update_4").hide();
		$("#pop_update_5").hide();
	}
	if(para_1 == 27){
		$(".pop_but_3").addClass("pop_but_active");
		$("#pop_update_4").show();
		$("#pop_update_2").hide();
		$("#pop_update_3").hide();
		$("#pop_update_5").hide();
	}
	if(para_1 == 28){
		$(".pop_but_4").addClass("pop_but_active");
		$("#pop_update_5").show();
		$("#pop_update_2").hide();
		$("#pop_update_3").hide();
	    $("#pop_update_4").hide();
	}
};

$(".close_bt").click(function(){
	$("#doc_view_profile").hide();
	$("#pop1").hide();
	$("#pop_tab_1").hide();

});
$(".close_bt_up").click(function(){
	$("#doc_update_view").hide();
	$("#pop_update_vi_1").hide();
	$("#pop_tab_update_1").hide();
	$("#pop_header_u").hide();


});

function re(para_1){
	$("#doc_remove_id").val(para_1);
	$("#doc_remove_view").show();
};


function close_save_details(){
	$("#doc_save_details_view").hide();
};
function close_pop_remove(){
	$("#doc_remove_view").hide();
};
$(".no_b").click(function(){
	$("#doc_remove_view").hide();
});
function remove_doc(){
	var doc_id = $("#doc_remove_id").val();
	var dataString="id"+doc_id;
	var new_url='/admin_doc/remove_doc_view/'+doc_id;
	$.ajax({
		type:'GET',
		url:new_url,
		data:dataString,
		cache:false,
		success: function(data){
			$("#doc_remove_view").html(data.page);
			$("#doc_remove_view").hide();
		}

	});
};
function upp_pop(){
//	$("#doc_remove_id").val(para_1);
	$("#doc_pop_up_date").show();
};
function close_pop_update_alert(){
//	$("#doc_remove_id").val(para_1);
	$("#doc_pop_up_date").hide();
};
function close_validation_error(){
//	$("#doc_remove_id").val(para_1);
	$("#validation_error").hide();
};
$(".no_b_up").click(function(){
	$("#doc_pop_up_date").hide();
});
function search_doc(){
	ser_doc_id = $("#search_id").val();
	var dataString="id"+ser_doc_id;
	var new_url='/admin_doc/search_view/'+ser_doc_id;
	$.ajax({
		type:'GET',
		url:new_url,
		data:dataString,
		dataType:"json",
		cache:false,
		success: function(data){
			$("#doc_remove_view").html(data.page);

		}

	});
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
			}
		}
	}
}
//------------------------------------unreg--spec--treatment-------plus-------------------
var sep_op=1;
function add_more_op_un(){
	if(sep_op < 10) {
		sep_op++;
		$("#spec_count").val(sep_op);
		for (var i = 1; i <= 10; i++) {
			if (i <= sep_op) {
				$("#un_spec_doc_" + i).fadeIn(300);
			} else {
				$("#un_spec_doc_" + i).fadeOut(1);
			}
		}
	}
}

function rem_more_op_un(){
	if(sep_op > 1) {
		sep_op--;
		$("#spec_count").val(sep_op);
		for (var i = 1; i <= 10; i++) {
			if (i <= sep_op) {
				$("#un_spec_doc_" + i).fadeIn(300);
			} else {
				$("#un_spec_doc_" + i).fadeOut(1);
			}
		}
	}
}

var treat_op=1;
function add_more_t_op_un(){
	if(treat_op < 10) {
		treat_op++;
		$("#treat_count").val(treat_op);
		for (var i = 1; i <= 10; i++) {
			if (i <= treat_op) {
				$("#un_treat_doc_" + i).fadeIn(300);
			} else {
				$("#un_treat_doc_" + i).fadeOut(1);
			}
		}
	}
}

function rem_more_t_op_un(){
	if(treat_op > 1) {
		treat_op--;
		$("#treat_count").val(treat_op);
		for (var i = 1; i <= 10; i++) {
			if (i <= treat_op) {
				$("#un_treat_doc_" + i).fadeIn(300);
			} else {
				$("#un_treat_doc_" + i).fadeOut(1);
			}
		}
	}
}
function pop_view_details(){
	txtu='<div style="color:#F8FFF7 ">'+ $("input[name='first_name']").val()+' </div>';

	//txtu='<table><tr><td>First Name :</td></td><td>'+$("input[name='first_name']").val()+'</td></tr></table>';
	txt='<table><tr><td style="font-size:medium;font-weight: 500;margin-left:20px;">'+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Registered Details"+'</td></tr>';
	txt=txt+'<table><tr><td style="height:30px; width:200px">Aryuvedic Register ID:</td></td><td style="height:30px; width:200px">'+$("input[name='reg_id']").val()+'</td></tr>';
	txt=txt+'<table><tr><td style="height:30px; width:200px">Doctor Type :</td></td><td style="height:30px; width:200px">'+$("input[name='doctor_type']").val()+'</td></tr>';
	txt=txt+'<table><tr><td style="height:30px; width:200px">First Name :</td></td><td style="height:30px; width:200px">'+$("input[name='first_name']").val()+'</td></tr>';
	txt=txt+'<table><tr><td style="height:30px; width:200px">Last Name :</td></td><td style="height:30px; width:200px">'+$("input[name='last_name']").val()+'</td></tr>';
	txt=txt+'<table><tr><td style="height:30px; width:200px">Register Feild :</td></td><td style="height:30px; width:200px">'+$("input[name='reg_field']").val()+'</td></tr>';
	txt=txt+'<table><tr><td style="height:30px; width:200px">Register Date :</td></td><td style="height:30px; width:200px">'+$("input[name='reg_date']").val()+'</td></tr></table>';

	txt1='<table><tr><td style="font-size:medium;font-weight: 500;margin-left:20px">'+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Details"+'</td></tr>';
	txt1=txt1+'<table><tr><td style="height:30px; width:200px">Date of birth:</td></td><td style="height:30px; width:200px">'+$("input[name='dob']").val()+'</td></tr>';
	txt1=txt1+'<table><tr><td style="height:30px; width:200px">Doctor Type :</td></td><td style="height:30px; width:200px">'+$("input[name='male']").val()+'</td></tr>';
	tx1t=txt1+'<table><tr><td style="height:30px; width:200px">NIC:</td></td><td style="height:30px; width:200px">'+$("input[name='nic']").val()+'</td></tr>';
	txt1=txt1+'<table><tr><td style="height:30px; width:200px">Address 1 :</td></td><td style="height:30px; width:200px">'+$("input[name='address1']").val()+'</td></tr>';
	txt1=txt1+'<table><tr><td style="height:30px; width:200px">Address 2 :</td></td><td style="height:30px; width:200px">'+$("input[name='address2']").val()+'</td></tr>';
	txt1=txt1+'<table><tr><td style="height:30px; width:200px">City :</td></td><td style="height:30px; width:200px">'+$("input[name='city']").val()+'</td></tr>';
	txt1=txt1+'<table><tr><td style="height:30px; width:200px">Contact Number :</td></td><td style="height:30px; width:200px">'+$("input[name='contact_number']").val()+'</td></tr></table>';

	txt2='<table><tr><td style="font-size:medium;font-weight: 500;margin-left:20px">'+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Medical Details"+'</td></tr>';
	txt2=txt2+'<table><tr><td style="height:30px; width:200px">Charges:</td></td><td style="height:30px; width:200px">'+$("input[name='charges']").val()+'</td></tr>';
	txt2=txt2+'<table><tr><td style="height:30px; width:200px">Treatment times :</td></td><td style="height:30px; width:200px">'+$("input[name='treatment_times']").val()+'</td></tr></table>';

	txt3='<table><tr><td style="font-size:medium;font-weight:800;margin-left:20px;">'+"&nbsp;&nbsp;&nbsp;"+$("input[name='first_name']").val()+'</td></tr>';
	txt3=txt3+'<tr></td><td style="height:30px;;font-weight: 300; width:200px">'+$("input[name='description']").val()+'</td></tr></table>';

	$("#doc_name_save").html(txtu);
	$("#sr_1_data").html(txt);
	$("#sr_2_data").html(txt1);
	$("#sr_3_data").html(txt2);
	$("#fr_2_data").html(txt3);
	$("#doc_save_details_view").show();

};

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//change the user types tabs
function change_pat_type(para_1){
	if(para_1 == 1){
		$(".pat_admin_tab_1").removeClass('pat_admin_tab_active');
		$("#pat_type_btn_1").addClass('pat_admin_tab_active');
		$("#pat_all_user_div").show();
		$("#pat_new_user_div").hide();
	}else{
		$(".pat_admin_tab_1").removeClass('pat_admin_tab_active');
		$("#pat_type_btn_2").addClass('pat_admin_tab_active');
		$("#pat_new_user_div").show();
		$("#pat_all_user_div").hide();

	}
};




$("#doc_cus_home").on('click',function(){
	$.ajax({
		url:'/admin_panel/customize',
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data);
		}
	});	
});





//display and hide chang icon from the featured doctor change divs
 function load_cos_page12(para_1){
	$("."+para_1).show();
};
function load_cos_page123(para_1){
	$("."+para_1).hide();
};

//remove user from database
function user_rem(id){
	var dataString="user_id="+id;
	var new_url = '/admin_panel/removeusers/'+id;
	$.ajax({
		type:'GET',
		url:new_url,
		data: dataString,
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page);
		}
	});
};


//remove comments from the data base
function rem_com(id){

	var dataString="user_id="+id;
	var new_url = '/admin_panel/rem_com/'+id;
	$.ajax({
		type:'GET',
		url:new_url,
		data: dataString,
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page);
		}
	});

};


//view users according to their id
function user_view(id){
	var dataString="user_id="+id;
	var new_url = '/admin_panel/user_view/'+id;
	$.ajax({
		type:'GET',
		url:new_url,
		data: dataString,
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page);
		}
	});
};

//get the doctor id from the table in order to add that doctor to featured doctor table
function getdocid(id){
	var dataString="user_id="+id;
	var new_url = '/testUrl/'+id;
	$.ajax({
		type:'GET',
		url:new_url,
		data: dataString,
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.com_data);


		}
	});


};


function updatefet(id11,id){
	if(id11==0){
		}
	else{

	var dataString="count="+id+"doc_id="+id11;
	var new_url = '/admin_panel/updatefet/'+id+'/'+id11;
	$.ajax({
		type:'GET',
		url:new_url,
		data: dataString,
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.com_data);

		}
	});
	}

};

//load edit featured dotors page to the customize panel
function load_cos_page1_via_ajax(){


	$.ajax({
		type:'GET',
		dataType:"json",
		url: '/admin_panel/customize/featured',
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.com_data);
		}
	});
};







function filvis(){

	$("#tabdiv").fadeOut(1000,function(){
		$("#fdiv").fadeOut(1);
		$("#filviv").fadeIn(1);
	});

};





//load view comment page to the admin panel
function load_comments_via_ajax(){
	$.ajax({
		type:'GET',
		dataType:"json",
		url: '/admin_panel/user_comments',		
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.com_data);
		}	
	});


};






//load users page to the admin panel
function load_users_via_ajax(){

	$.ajax({
		type:'GET',
		dataType:"json",
		url: '/admin_panel/users',
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.com_data);
		}
	});
};



function load_test_via_ajax(){

	$.ajax({
		url:'/admin_panel/test',
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data);
		}
	});


};




function close_win(){
    $("#close_win").hide();
	$("#user_det").show();
};




function rem_box(){
	$("#close_win").show();
	$("#user_det").hide();

};


function getrate(){

	id=$( "#spec option:selected" ).val();
	id1=$( "#city option:selected" ).val();
	id2=$( "#add option:selected" ).val();


	var dataString="user_id="+id+"user_id1="+id1+"user_id2="+id2;
	var new_url = '/admin_panel/filterdoc/'+id+'/'+id1+'/'+id2;
	$.ajax({
		type:'GET',
		url:new_url,
		data: dataString,
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.com_data);
		}
	});

	/*$("#filviv").fadeOut(1000,function() {
		$("#tabdiv").fadeIn(1);
		$("#fdiv").fadeIn(1);
	});*/

};

function passadd(){

	id1=$( "#city" ).val();
	id2=$( "#add" ).val();

	if(id1=='' && id2==''){
		id3='null';
		id4='null';
	}
	else if(id1!='' && id2==''){
		id3=id1;
		id4='null';
	}
	else if(id1=='' && id2 != ''){
		id3='null';
		id4=id2;
	}
	else if(id1 !='' && id2 != ''){
		id3=id1;
		id4=id2;
	}
	var dataString="user_id="+id3+"location="+id4;
	var new_url = '/advancedsearch/'+id3+"/"+id4;
	$.ajax({
		type:'GET',
		url:new_url,
		data: dataString,
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.com_data);
		}
	});

};


var ad_s=false;
function l(){
	if(ad_s){
		$("#c_adva").removeClass('glyphicon glyphicon-triangle-top');
		$("#c_adva").addClass('glyphicon glyphicon-triangle-bottom');
		$("#doc_p").fadeOut();
		ad_s = false;
	}else{
		$("#c_adva").removeClass('glyphicon glyphicon-triangle-bottom');
		$("#c_adva").addClass('glyphicon glyphicon-triangle-top');
		$("#doc_p").fadeIn();
		ad_s = true;
	}
};
var ad_s=false;
function lr(){
	if(ad_s){
		$("#c_adva_r").removeClass('glyphicon glyphicon-triangle-top');
		$("#c_adva_r").addClass('glyphicon glyphicon-triangle-bottom');
		$("#doc_pr").fadeOut();
		ad_s = false;
	}else{
		$("#c_adva_r").removeClass('glyphicon glyphicon-triangle-bottom');
		$("#c_adva_r").addClass('glyphicon glyphicon-triangle-top');
		$("#doc_pr").fadeIn();
		ad_s = true;
	}
};
$(".filter_ar").click(function(){

	alert("sds");
});
//--------------foreign doc-------------------

function valid_registration_foreign_doc(){
	if(valid_length_input('fo_first_name') ||check_input_no_num('fo_first_name')||
		valid_length_input('fo_last_name') || check_input_no_num('fo_last_name') ||
		valid_length_input('fo_dob')||valid_length_input('fo_language_1') ||valid_length_input('fo_country') ||
		valid_length_input('fo_passport') || !check_passport_num('fo_passport')||
		valid_length_input('fo_place')||valid_length_input('fo_comming_date') ||valid_length_input('fo_time') ||
		valid_length_input('fo_charges')||valid_length_input('fo_days')||
		valid_length_input('fo_contact_number') || !valid_phone_no_fo('fo_contact_number')||
		valid_length_input('fo_charges')||valid_length_input('fo_days')||
		valid_length_input('fo_username') || !valid_email('fo_password')){

		if(valid_length_input('fo_first_name') || check_input_no_num('fo_first_name')){
			show_warning('fo_first_name');
		}
		if(valid_length_input('fo_last_name') || check_input_no_num('fo_last_name')){
			show_warning('fo_last_name');
		}
		if(valid_length_input('fo_dob') ){
			show_warning('fo_dob');
		}
		if(valid_length_input('fo_language_1')){
			show_warning('fo_language_1');
		}
		if(valid_length_input('fo_passport') || !check_passport_num('fo_passport')){
			show_warning('fo_passport');
		}
		if(valid_length_input('fo_country')){
			show_warning('fo_country');
		}
		if(valid_length_input('fo_contact_number') || !valid_phone_no_fo('fo_contact_number')){
			show_warning('fo_contact_number');
		}
		if(valid_length_input('fo_email') || !valid_email('fo_email')){
			show_warning('fo_email');
		}
		if(valid_length_input('fo_place')){
			show_warning('fo_place');
		}
		if(valid_length_input('fo_comming_date')){
			show_warning('fo_comming_date');
		}
		if(valid_length_input('fo_time')){
			show_warning('fo_time');
		}
		if(valid_length_input('fo_charges')){
			show_warning('fo_charges');
		}
		if(valid_length_input('fo_days')){
			show_warning('fo_days');
		}
		if(valid_length_input('fo_username')){
			show_warning('fo_username');
		}
		if(valid_length_input('fo_password')){
			show_warning('fo_password');
		}
		return false;
	}else{
		//alert("Success");
		return true;
	}

};
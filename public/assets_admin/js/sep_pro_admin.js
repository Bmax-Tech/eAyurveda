// Constant Variables

var ALPH_PATTERN = /^[A-Za-z]+$/;//Use to check alphabetical pattern
var NUM_PATTERN = /[0-9]|\./;//Use to check numerical pattern
var EMAIL_PATTERN = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;//Use to check email`s pattern
var PHONE_PATTERN = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[ ]?([0-9]{4})$/;//Use to check phone number pattern
var NIC_PATTERN = /^\(?([0-9]{9})\)?[Vv]$/;//Use to check phone number pattern
var AJAX_CHECK_EMAIL = true; // Status after checking email
var AJAX_CHECK_USERNAME = true; // Status after checking username

// JavaScript Document
$(document).ready(function(e) {
    var win_height = $(window).height();
	$("#admin_home_div").css("height",(win_height-104)+"px");
});

var doc_s=false; var pat_s=false; var cus_s=false;
var for_s=false; var dash_s=false;

$("#admin_left_nav_doc_btn").click(function(){
	if(doc_s==false){
		$("#admin_left_nav_pat").slideUp(100);
		$("#admin_left_nav_for").slideUp(100);
		$("#admin_left_nav_doc").slideDown(100);
		$("#admin_left_nav_cus").slideUp(100);
		$("#admin_left_nav_dash").slideUp(100);
		$("#c_admin_span_1").addClass("glyphicon-menu-down");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		$("#c_admin_span_4").removeClass("glyphicon-menu-down");
		$("#c_admin_span_4").addClass("glyphicon-menu-right");
		$("#c_admin_span_0").removeClass("glyphicon-menu-down");
		$("#c_admin_span_0").addClass("glyphicon-menu-right");
		doc_s=true;for_s=false; pat_s=false; cus_s=false; dash_s=false;

	}
	else{
		$("#admin_left_nav_doc").slideUp(100);
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		$("#c_admin_span_4").removeClass("glyphicon-menu-down");
		$("#c_admin_span_4").addClass("glyphicon-menu-right");
		$("#c_admin_span_0").removeClass("glyphicon-menu-down");
		$("#c_admin_span_0").addClass("glyphicon-menu-right");
		doc_s=false; for_s=false; pat_s=false; cus_s=false; dash_s=false;

	}
});

$("#admin_left_nav_dash_btn").click(function(){
	if(dash_s==false){
		$("#admin_left_nav_doc").slideUp(100);
		$("#admin_left_nav_pat").slideUp(100);
		$("#admin_left_nav_for").slideUp(100);
		$("#admin_left_nav_cus").slideUp(100);
		$("#admin_left_nav_dash").slideDown(100);
		$("#c_admin_span_0").addClass("glyphicon-menu-down");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		$("#c_admin_span_4").removeClass("glyphicon-menu-down");
		$("#c_admin_span_4").addClass("glyphicon-menu-right");
		dash_s=true;for_s=false; pat_s=false; doc_s=false; cus_s=false;
	}
	else{
		$("#admin_left_nav_dash").slideUp(100);
		$("#c_admin_span_0").removeClass("glyphicon-menu-down");
		$("#c_admin_span_0").addClass("glyphicon-menu-right");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		$("#c_admin_span_4").removeClass("glyphicon-menu-down");
		$("#c_admin_span_4").addClass("glyphicon-menu-right");
		for_s=false;cus_s=false; pat_s=false; doc_s=false; dash_s=false;

	}
});

$("#admin_left_nav_pat_btn").click(function(){
	if(pat_s==false){
		$("#admin_left_nav_doc").slideUp(100);
		$("#admin_left_nav_for").slideUp(100);
		$("#admin_left_nav_pat").slideDown(100);
		$("#admin_left_nav_cus").slideUp(100);
		$("#admin_left_nav_dash").slideUp(100);
		$("#c_admin_span_2").addClass("glyphicon-menu-down");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		$("#c_admin_span_4").removeClass("glyphicon-menu-down");
		$("#c_admin_span_4").addClass("glyphicon-menu-right");
		$("#c_admin_span_0").removeClass("glyphicon-menu-down");
		$("#c_admin_span_0").addClass("glyphicon-menu-right");
		pat_s=true; for_s=false;doc_s=false; cus_s=false; dash_s=false;
	}
	else{
		$("#admin_left_nav_pat").slideUp(100);
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		$("#c_admin_span_4").removeClass("glyphicon-menu-down");
		$("#c_admin_span_4").addClass("glyphicon-menu-right");
		$("#c_admin_span_0").removeClass("glyphicon-menu-down");
		$("#c_admin_span_0").addClass("glyphicon-menu-right");

		for_s=false;pat_s=false; doc_s=false; cus_s=false; dash_s=false;
	}
});

$("#admin_left_nav_cus_btn").click(function(){
	if(cus_s==false){
		$("#admin_left_nav_doc").slideUp(100);
		$("#admin_left_nav_pat").slideUp(100);
		$("#admin_left_nav_for").slideUp(100);
		$("#admin_left_nav_cus").slideDown(100);
		$("#admin_left_nav_dash").slideUp(100);
		$("#c_admin_span_4").addClass("glyphicon-menu-down");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		$("#c_admin_span_0").removeClass("glyphicon-menu-down");
		$("#c_admin_span_0").addClass("glyphicon-menu-right");
		cus_s=true;for_s=false; pat_s=false; doc_s=false; dash_s=false;
	}
	else{
		$("#admin_left_nav_cus").slideUp(100);
		$("#c_admin_span_4").removeClass("glyphicon-menu-down");
		$("#c_admin_span_4").addClass("glyphicon-menu-right");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		$("#c_admin_span_0").removeClass("glyphicon-menu-down");
		$("#c_admin_span_0").addClass("glyphicon-menu-right");
		for_s=false;cus_s=false; pat_s=false; doc_s=false; dash_s=false;

	}
});

$("#admin_left_nav_for_btn").click(function(){
	if(for_s==false){
		$("#admin_left_nav_doc").slideUp(100);
		$("#admin_left_nav_pat").slideUp(100);
		$("#admin_left_nav_cus").slideUp(100);
		$("#admin_left_nav_for").slideDown(100);
		$("#admin_left_nav_dash").slideUp(100);
		$("#c_admin_span_3").addClass("glyphicon-menu-down");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_4").removeClass("glyphicon-menu-down");
		$("#c_admin_span_4").addClass("glyphicon-menu-right");
		$("#c_admin_span_0").removeClass("glyphicon-menu-down");
		$("#c_admin_span_0").addClass("glyphicon-menu-right");
		for_s=true;cus_s=false; pat_s=false; doc_s=false; dash_s=false;
	}
	else{
		$("#admin_left_nav_for").slideUp(100);
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_4").removeClass("glyphicon-menu-down");
		$("#c_admin_span_4").addClass("glyphicon-menu-right");
		$("#c_admin_span_0").removeClass("glyphicon-menu-down");
		$("#c_admin_span_0").addClass("glyphicon-menu-right");
		for_s=false;cus_s=false; pat_s=false; doc_s=false; dash_s=false;
	}
});




$(".c_admin_ul_li").click(function(){
	$(".c_admin_ul_li").removeClass('c_admin_li_sel');
	$(this).addClass('c_admin_li_sel');
});

$(document).ready(function(e) {
	load_dash_board();
});



//Doctor Home pages
function load_dash_board(){
	$.ajax({
		url:'/dash_board_view',
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data);
		}
	});
};


//Doctor Home pages
function load_doc_page(para_1){
	$.ajax({
		url:'doc_admin/home_'+para_1+'.php',
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data);
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

//Forum Home pages
function load_for_page(para_1){
	$.ajax({
		type:'GET',
		url:'for_admin/home_'+para_1+'.php',
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data);
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

function change_doc_type(para_1){
	if(para_1 == 1){
		$(".doc_admin_tab_1").removeClass('doc_admin_tab_active');
		$("#doc_type_btn_1").addClass('doc_admin_tab_active');
		$("#doc_reg_div").show();
		$("#doc_un_reg_div").hide();
	}else{
		$(".doc_admin_tab_1").removeClass('doc_admin_tab_active');
		$("#doc_type_btn_2").addClass('doc_admin_tab_active');
		$("#doc_un_reg_div").show();
		$("#doc_reg_div").hide();
	}
};

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




function tip_update_via_ajax(){

	$.ajax({
		type:'GET',
		dataType:"json",
		url: '/admin_panel/customize',
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page);
		}
	});

}





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
			load_users_via_ajax();
		}
	});
};


//add id of the comment to the hidden variable inorder to remove
function comment_pass_remove(id){
	$("#hidden_click_com_id").val(id);
	$("#featuredpoup").show();

}

//remove comments from the data base
function rem_com(){
    var id=	$("#hidden_click_com_id").val();
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
	//$('#c_loading_msg').show();

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

//view inapropriate users according to their id
function inapuser_view(id){
	var dataString="user_id="+id;
	var new_url = '/admin_panel/inapuser_view/'+id;
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
	$("#hidden_click_id").val(id);

	$(".common").removeClass('colortable');
	$(".trid_"+id).addClass('colortable');


};

//get the selected health tip and display them in a text boxes
function get_tip_id(id,tip,des1,des2){
	$("#hidden_click_tip_id").val(id);
	$("#hidden_click_tip_up_status").val("true");


	$(".common").removeClass('colortable');
	$(".tipid_"+id).addClass('colortable');

	$("#des1").val(des1);
	$("#des2").val(des2);
	$("#tiptip").val(tip);
};



//show pop up button to delete a health tip
function del_tip(id){
	$("#hidden_click_tip_del_id").val(id);
	$("#hidden_click_tip_up_status").val("false");

	$(".common").removeClass('colortable');
	$(".tipid_"+id).addClass('colortable');

	$(".pat_close_btn").show();
	$("#featuredpoup1").show();

}

//get the selected featured box value and store in hidden variable
function feat_addno(count){
	$("#hidden_click_count").val(count);
	$("#featuredpoup").show();
}

//update the featured dotor table
function updatefet(){
	var id11 = $("#hidden_click_id").val();
	var count1= $("#hidden_click_count").val();

	if(id11==0){
		alert("Please select a raw");
		}
	else{

	var dataString="count="+count1+"doc_id="+id11;
	var new_url = '/admin_panel/updatefet/'+count1+'/'+id11;
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










function close_win(){
    $("#close_win").hide();
	$("#user_det").show();};



function rem_box(){
	$("#close_win").show();
	$("#user_det").hide();

};

function getrate(){

	rate=$( "#rate option:selected" ).val();
	spec=$( "#spec1 option:selected" ).val();
	treat=$( "#treat1 option:selected" ).val();


	var dataString="rate="+rate+"spec="+spec+"treat="+treat;
	var new_url = '/admin_panel/filterdoc/'+rate+'/'+spec+'/'+treat;
	$.ajax({
		type:'GET',
		url:new_url,
		data: dataString,
		cache: false,
		success: function(data){

		var txt = '<table id="kawa" class="col-lg-12 tabledesign1"  >';
			for(var i=0;i<Object(data.page).length;i++) {

				txt = txt+'<tr class="trid_'+data["page"][i]["id"]+' common"	style = "background-color:#fff;height:35px;border:1px solid #ddd;"	onclick = "getdocid('+data["page"][i]["id"]+')" >';
				txt = txt+'<td class = "col-lg-4" >'+data["page"][i]["first_name"]+'</td >';
				txt = txt+'<td class	= "col-lg-4"  style="border-left: 1px solid #ddd;">'+data["page"][i]["last_name"]+'</td >';
				txt = txt+'<td	class = "col-lg-4"  style="border-left: 1px solid #ddd;">'+data["page"][i]["contact_number"]+'</td ></tr>';
			}

			txt=txt+'</table>';

			//console.log(txt);
			$("#maybe").html(txt);


		}
	});
	document.getElementById("rate").value = "all";
	document.getElementById("spec1").value = "all";
	document.getElementById("treat1").value = "all";
	$("#hidden_click_id").val(0);
};

//add health tip
function addtip(){
	var des1=$("#des1").val();
	var des2=$("#des2").val();
	var tip=$("#tiptip").val();

	var cmp =$("#hidden_click_tip_up_status").val();

	if(cmp =="true"){


      var id= $("#hidden_click_tip_id").val()
		var dataString = "des1=" + des1 + "des2=" + des2 + "tip=" + tip +"hid=" +id;
		var new_url = '/admin/tip/' + des1 + '/' + des2 + "/" + tip +"/" +id;

		$.ajax({
			type: 'GET',
			dataType: "json",
			url: new_url,
			data: dataString,
			cache: false,
			success: function (data) {
				//console.log(data);
				$("#admin_home_div").html(data.page);


			}

		});
	}
    else {
		var dataString = "des1=" + des1 + "des2=" + des2 + "tip=" + tip;
		var new_url = '/admin/tip/' + des1 + '/' + des2 + "/" + tip;

		$.ajax({
			type: 'GET',
			dataType: "json",
			url: new_url,
			data: dataString,
			cache: false,
			success: function (data) {
				//console.log(data);
				$("#admin_home_div").html(data.page);


			}

		});
	}
};

function del_tip_1(){
	var del_id = $("#hidden_click_tip_del_id").val();


	var dataString="id="+del_id;
	var new_url = '/admin/tipdel/'+del_id;

   $.ajax({
		type:'GET',
		dataType:"json",
		url:new_url,
		data: dataString,
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page);

		}
	});

}



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

function onChange()
{
	if(id2  =$('#des1').val()==""){
		id2="Hint 1";
	}
   else
	{
		id2  =$('#des1').val();
	}
	$("#head1").text(id2);

};

function onChange1()
{
	if(id2  =$('#des2').val()==""){
		id2="Hint 2";
	}
	else
	{
		id2  =$('#des2').val();
	}
	$("#head2").text(id2);

};


function onChangetip()
{
	if(id2  =$('#tiptip').val()==""){
		id2="Health Tip Loads Here";
	}
	else
	{
		id2  =$('#tiptip').val();
	}
	$("#tip1").text(id2);

};

//close the popup
function feature_pop_close(){
	$("#featuredpoup").hide();
	$(".pat_close_btn").hide();

};

function feature_pop_close1(){
	$("#featuredpoup").hide();
	$(".pat_close_btn").hide();
	$("#featuredpoup1").hide();

};

function success_pop_close(){
	$("#success_popup").hide();
	$(".pat_close_btn").hide();

};

function admin_pop_close(){
	$("#adminpoup").hide();
	$(".pat_close_btn").hide();

};

function admin_pop_close1(){
	$("#adminpoup").hide();
	$(".pat_close_btn").hide();
	$("#adminpopup1").hide();

};


function confirm_addtip() {


	if (valid_length_input('header1') || valid_length_input('header2') || ($("#tiptip").val().length==0)) {

		if (valid_length_input('header1')) {
			show_warning('header1');
		}
		if (valid_length_input('header2')) {
			show_warning('header2');
		}

		if ($("#tiptip").val().length==0) {
			show_warning('tip');
		}
	}
	else {

	$("#featuredpoup").show();
	$(".pat_close_btn").show();
    }

};

function adminregpoup_close(){
	$("#adminregpoup").hide();
	$(".pat_close_btn").hide();

};


function display_priv(){

	$("#tabdiv").slideUp();
	$("#preview").slideDown();
	$("#prebut").hide();
	$("#tipbut").show();



}



function display_all_tip(){
	$("#tabdiv").slideDown();
	$("#preview").slideUp();
	$("#prebut").show();
	$("#tipbut").hide();
}






function admin_reg_via_ajax(){
	$.ajax({
		url:'reg_admin.php',
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data);
		}
	});
};









function blockedUsers(){
	$.ajax({
		url:'inap_users',
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data);
			doc_load_ajax(1);
		}
	});


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

/* --- Ajax Requests ---*/

function check_reg_existing(para_1,para_2){
	var dataString = 'type='+para_1+'&data='+para_2;
	var new_url = '/ajax/admin/'+para_1+'/'+para_2;
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


function valid_registration(){
	if(valid_length_input('first_name') || check_input_no_num('first_name') || valid_length_input('last_name')  || check_input_no_num('last_name') || valid_length_input('email') || !valid_email('email') || valid_length_input('username') || valid_length_input('password') || valid_length_input('confirm_password') || !valid_confirm_password('password','confirm_password')){

		if(valid_length_input('first_name') || check_input_no_num('first_name')){
			show_warning('first_name');
		}
		if(valid_length_input('last_name')  || check_input_no_num('last_name')){
			show_warning('last_name');
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
               $("#adminregpoup").show();
               $(".pat_close_btn").show();
	}

};

function addadmin(){
	var fname = $( "#first_name" ).val();
	var lname =$( "#last_name" ).val();
	var email =$( "#email" ).val();
	var uname =$( "#user_name" ).val();
	var pwrd =$( "#password" ).val();

	var dataString="fname="+fname+"lname="+lname+"uname="+uname+"email="+email+"pwrd11="+pwrd;
	var new_url = '/admin_panel_home/'+fname+"/"+lname+"/"+uname+"/"+email+"/"+pwrd;
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

}


//load edit featured dotors page to the customize panel
function admin_load_via_ajax(){


	$.ajax({
		type:'GET',
		dataType:"json",
		url: '/admin_panel/customize/adminload',
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.com_data);
		}
	});
};


function admin_color(id){

	$(".common").removeClass('colortable');
	$(".admin_id_"+id).addClass('colortable');
};

function get_admin_id(id,name,email){
	$("#hidden_click_admin_id").val(id);
	$("#hidden_click_admin_up_status").val("true");


	$(".common").removeClass('colortable');
	$(".admin_id_"+id).addClass('colortable');

	$("#unameA").val(name);
	$("#email").val(email);
	$("#updateAdmin").show();

};


// admin details will update
function confirm_admin_update() {


	if (valid_length_input('unameA') || valid_length_input('con_pwrd') || valid_length_input('pwrd') || valid_length_input('email') || !valid_email('email') || !valid_confirm_password('pwrd','con_pwrd')) {

		if (valid_length_input('unameA')) {
			show_warning('unameA');
		}
		if(valid_length_input('email') || !valid_email('email')){
			show_warning('email');
		}
		if(valid_length_input('pwrd')){
			show_warning('pwrd');
		}
		if(valid_length_input('con_pwrd')){
			show_warning('con_pwrd');
		}
		if(!valid_confirm_password('pwrd','con_pwrd')){
			show_warning('con_pwrd');
		}
	}
	else {

		$("#adminpoup").show();
		$(".pat_close_btn").show();
	}

};


//display pop up to delete admin
function del_admin(id){
	$("#hidden_click_admin_del_id").val(id);
	$("#hidden_click_admin_up_status").val("false");

	$(".common").removeClass('colortable');
	$(".admin_id_"+id).addClass('colortable');

	$(".pat_close_btn").show();
	$("#adminpopup1").show();



}


//block admins
function del_admin_1(){
	var del_id = $("#hidden_click_admin_del_id").val();


	var dataString="id="+del_id;
	var new_url = '/admin/admindel/'+del_id;

	$.ajax({
		type:'GET',
		dataType:"json",
		url:new_url,
		data: dataString,
		cache: false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page);

		}
	});

}


//add health tip
function updateAdmin(){

	var cmp =$("#hidden_click_admin_up_status").val();

	if(cmp =="true"){


		var username=$("#unameA").val();
		var email=$("#email").val();
		var password=$("#pwrd").val();
		var adminid =$("#hidden_click_admin_id").val();
		var dataString = "id=" + adminid + "username=" + username + "email=" + email +"password=" +password;
		var new_url = '/admin/update/' + adminid + '/' + username + "/" + email +"/" +password;

		$.ajax({
			type: 'GET',
			dataType: "json",
			url: new_url,
			data: dataString,
			cache: false,
			success: function (data) {
				//console.log(data);
				$("#admin_home_div").html(data.page);


			}

		});
	}
	else {

	}
};




// This function use to load doctors in search result page via Ajax
function doc_load_ajax(){


	var method_type='GET';
        var skip= $("#startqq").val();
        var end= $("#endqq").val();
	     var curr=$("#page_number_hiddenqq").val();
	     var res_starts=parseInt($("#startqq").val())+parseInt(1)
	var dataString = 'skip='+skip+'end='+end;
	$.ajax({


		type: method_type,
		dataType: "json",
		url:'/admin_panel/inapusers/test/'+skip+'/'+end,
		cache: false,
		data: dataString,
		success: function (data) {

			$("#c_doctor_result_ajax_boxqq").html(data.page);

			/////////////////////////////////////////////////
			// Pagination ///////////////////////////////////



			var txt='';
			if(data["count"][0]["count"] > end)
			{

				var last=Math.ceil(data["count"][0]["count"]/end);
				var pre_page_no=1;
				var next_page_no=1;
				if(curr>1){
					pre_page_no = curr-1;
				}
				if(curr<last){
					next_page_no = parseInt(curr)+parseInt(1);
				}else{
					next_page_no = curr;
				}

				txt=txt+'<ul class="pagination" style="margin-top: 30px"><li><a href="#page_pre='+pre_page_no+'" onclick="pagination('+pre_page_no+')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
				for(var i=1;i<=last;i++)
				{
					txt=txt+'<li ';
					if(curr==i)
					{
						txt=txt+'class="active"';
					}
					txt=txt+'><a href="#page='+i+'" onclick="pagination('+i+')">'+i+' <span class="sr-only">(current)</span></a></li>';
				}
				txt=txt+'<li><a href="#page_next='+next_page_no+'" onclick="pagination('+next_page_no+')" aria-label="Next"><span aria-hidden="true">»</span></a></li></ul>';

			}


			if (data["count"][0]["count"] > end) {
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panelqq").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"][0]["count"];
				$("#c_page_noqq").html(txt);
			}
			else if(data["count"][0]["count"] <= end && data["count"][0]["count"] > 0 ){
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panelqq").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"][0]["count"];
				$("#c_page_noqq").html(txt);
			}
			else{
				$("#search_doc_pagination_panelqq").html(txt);
				txt = '0';
				$("#c_page_noqq").html(txt);
			}
			// Pagination ///////////////////////////////////
			/////////////////////////////////////////////////


		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
};



function pagination(para_1){


	$("#startqq").val(parseInt(para_1)*parseInt($("#endqq").val())- parseInt($("#endqq").val())); //put the next starting point
	$("#page_number_hiddenqq").val(para_1);
	doc_load_ajax();
};









//load the user view page
function load_users_via_ajax(){
	$.ajax({
		url:'/user_view',
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data);
			user_load_ajax1(1);
			user_load_ajax2(1);
		}
	});


};





// This function use to load doctors in search result page via Ajax
function user_load_ajax1(){


	var method_type='GET';
	var skip= $("#start1").val();
	var end= $("#end1").val();
	var curr=$("#page_number_hidden1").val();
	var res_starts=parseInt($("#start1").val())+parseInt(1)
	var dataString = 'skip='+skip+'end='+end;
	$.ajax({


		type: method_type,
		dataType: "json",
		url:'/admin_panel/users/'+skip+'/'+end,
		cache: false,
		data: dataString,
		success: function (data) {

			$("#user1").html(data.page);

			/////////////////////////////////////////////////
			// Pagination ///////////////////////////////////



			var txt='';
			if(data["count"][0]["count"] > end)
			{

				var last=Math.ceil(data["count"][0]["count"]/end);
				var pre_page_no=1;
				var next_page_no=1;
				if(curr>1){
					pre_page_no = curr-1;
				}
				if(curr<last){
					next_page_no = parseInt(curr)+parseInt(1);
				}else{
					next_page_no = curr;
				}

				txt=txt+'<ul class="pagination" style="margin-top: 30px"><li><a href="#page_pre='+pre_page_no+'" onclick="pagination1('+pre_page_no+')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
				for(var i=1;i<=last;i++)
				{
					txt=txt+'<li ';
					if(curr==i)
					{
						txt=txt+'class="active"';
					}
					txt=txt+'><a href="#page='+i+'" onclick="pagination1('+i+')">'+i+' <span class="sr-only">(current)</span></a></li>';
				}
				txt=txt+'<li><a href="#page_next='+next_page_no+'" onclick="pagination1('+next_page_no+')" aria-label="Next"><span aria-hidden="true">»</span></a></li></ul>';

			}


			if (data["count"][0]["count"] > end) {
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panel1").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"][0]["count"];
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



// This function use to load doctors in search result page via Ajax
function user_load_ajax2(){




	var method_type='GET';
	var skip= $("#start2").val();
	var end= $("#end2").val();
	var curr=$("#page_number_hidden2").val();
	var res_starts=parseInt($("#start2").val())+parseInt(1)
	var dataString = 'skip='+skip+'end='+end;
	$.ajax({


		type: method_type,
		dataType: "json",
		url:'/admin_panel/users2/'+skip+'/'+end,
		cache: false,
		data: dataString,
		success: function (data) {

			$("#user2").html(data.page);

			/////////////////////////////////////////////////
			// Pagination ///////////////////////////////////

			var txt='';
			if(data["count"] > end)
			{

				var last=Math.ceil(data["count"]/end);
				var pre_page_no=1;
				var next_page_no=1;
				if(curr>1){
					pre_page_no = curr-1;
				}
				if(curr<last){
					next_page_no = parseInt(curr)+parseInt(1);
				}else{
					next_page_no = curr;
				}

				txt=txt+'<ul class="pagination" style="margin-top: 30px"><li><a href="#page_pre='+pre_page_no+'" onclick="pagination2('+pre_page_no+')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
				for(var i=1;i<=last;i++)
				{
					txt=txt+'<li ';
					if(curr==i)
					{
						txt=txt+'class="active"';
					}
					txt=txt+'><a href="#page='+i+'" onclick="pagination2('+i+')">'+i+' <span class="sr-only">(current)</span></a></li>';
				}
				txt=txt+'<li><a href="#page_next='+next_page_no+'" onclick="pagination2('+next_page_no+')" aria-label="Next"><span aria-hidden="true">»</span></a></li></ul>';

			}

			if (data["count"] > end) {
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panel2").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"];
				$("#c_page_no2").html(txt);
			}
			else if(data["count"][0]["count"] <= end && data["count"] > 0){
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panel2").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"];
				$("#c_page_no2").html(txt);
			}
			else{
				$("#search_doc_pagination_panel2").html(txt);
				txt = '0';
				$("#c_page_no2").html(txt);
			}

			// Pagination ///////////////////////////////////
			/////////////////////////////////////////////////


		},
		error: function (data) {
			console.log('Error:', data);
		}
	});
};



function pagination2(para_1){

	$("#start2").val(parseInt(para_1)*parseInt($("#end2").val())- parseInt($("#end2").val()));
	$("#page_number_hidden2").val(para_1);
	user_load_ajax2();
};




// This function use to load doctors in search result page via Ajax
function user_load_ajaxcom(){

	var method_type='GET';
	$.ajax({


		type: method_type,
		dataType: "json",
		url:'/admin_panel/user_comments',
		cache: false,
		success: function (data) {

			$("#admin_home_div").html(data.page);

		}
	});
};




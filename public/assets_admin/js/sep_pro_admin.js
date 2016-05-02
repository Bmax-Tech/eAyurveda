// Constant Variables

var ALPH_PATTERN = /^[A-Za-z]+$/;//Use to check alphabetical pattern
var NUM_PATTERN = /[0-9]|\./;//Use to check numerical pattern
var EMAIL_PATTERN = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;//Use to check email`s pattern
var PHONE_PATTERN = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[ ]?([0-9]{4})$/;//Use to check phone number pattern
var NIC_PATTERN = /^\(?([0-9]{9})\)?[Vv]$/;//Use to check phone number pattern
var AJAX_CHECK_EMAIL = true; // Status after checking email
var AJAX_CHECK_USERNAME = true; // Status after checking username
var PASSWORD_PATTERN = false;// Status of password pattern

// JavaScript Document
$(document).ready(function(e) {
    var win_height = $(window).height();
	$("#admin_home_div").css("height",(win_height-104)+"px");
});

var doc_s=false; var pat_s=false; var cus_s=false;
var for_s=false; var dash_s=false;

$("#admin_left_nav_dashboard_btn").click(function(){
	$("#admin_left_nav_pat").slideUp(100);
	$("#admin_left_nav_for").slideUp(100);
	$("#admin_left_nav_doc").slideUp(100);
	$("#admin_left_nav_cus").slideUp(100);
	$("#c_admin_span_1").removeClass("glyphicon-menu-down");
	$("#c_admin_span_1").addClass("glyphicon-menu-right");
	$("#c_admin_span_2").removeClass("glyphicon-menu-down");
	$("#c_admin_span_2").addClass("glyphicon-menu-right");
	$("#c_admin_span_3").removeClass("glyphicon-menu-down");
	$("#c_admin_span_3").addClass("glyphicon-menu-right");
	$("#c_admin_span_4").removeClass("glyphicon-menu-down");
	$("#c_admin_span_4").addClass("glyphicon-menu-right");
	doc_s=false; for_s=false; pat_s=false; cus_s=false; dash_s=false;
});

$("#admin_left_nav_chat_btn").click(function(){
	$("#admin_left_nav_pat").slideUp(100);
	$("#admin_left_nav_for").slideUp(100);
	$("#admin_left_nav_doc").slideUp(100);
	$("#admin_left_nav_cus").slideUp(100);
	$("#c_admin_span_1").removeClass("glyphicon-menu-down");
	$("#c_admin_span_1").addClass("glyphicon-menu-right");
	$("#c_admin_span_2").removeClass("glyphicon-menu-down");
	$("#c_admin_span_2").addClass("glyphicon-menu-right");
	$("#c_admin_span_3").removeClass("glyphicon-menu-down");
	$("#c_admin_span_3").addClass("glyphicon-menu-right");
	$("#c_admin_span_4").removeClass("glyphicon-menu-down");
	$("#c_admin_span_4").addClass("glyphicon-menu-right");
	doc_s=false; for_s=false; pat_s=false; cus_s=false; dash_s=false;
});

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
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		$("#c_admin_span_4").removeClass("glyphicon-menu-down");
		$("#c_admin_span_4").addClass("glyphicon-menu-right");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
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
	load_admin_dashboard_via_ajax();

});

// Admin DashBoard page
function load_admin_dashboard_via_ajax(){
	//location.reload();
	load_dashboard();

};

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
		type:'GET',
		url:'doc_admin/home_'+para_1,
		dataType:'json',
		cache: false,
		success: function(data){
			if(para_1 == 4){
				$("#admin_home_div").html(data.page);
				LoadDoctorList();
			}
		}
	});
};

/**
 * Doctor Confirm Submit Event
 */
function DoctorConfirmSubmit(){
	LoadDoctorList();
	return false;
};

/**
 * Load Doctor Confirm List
 */
function LoadDoctorList(){
	var newUrl = "/LoadDoctorList";
	var dataString = "search_text="+$("#searc_con_text").val();
	$.ajax({
		type:'POST',
		url:newUrl,
		dataType:'json',
		data:dataString,
		cache:false,
		success:function(data){
			//console.log(data);
			var txt = '<table style="width: 100%;font-weight: 400;background: #FFF">';
			for(var i=0;i<data.length;i++){
				txt = txt + '<tr class="doc_con_tr" onclick="ViewDoctorPro('+data[i]['doc_id']+')">' +
						'<td style="width: 5%" class="doc_com_first_td">'+(i+1)+'</td>' +
						'<td style="width: 25%" class="doc_con_com_td">'+data[i]['doc_name']+'</td>' +
						'<td style="width: 15%" class="doc_con_com_td">'+data[i]['doc_ayurvedic_id']+'</td>' +
						'<td style="width: 15%" class="doc_con_com_td">'+data[i]['doc_type']+'</td>' +
						'<td style="width: 25%" class="doc_con_com_td">'+data[i]['doc_email']+'</td>' +
						'<td style="width: 15%" class="doc_con_com_td">'+data[i]['doc_contact_no']+'</td>' +
						'</tr>';
			}
			txt = txt + '</table>';
			$("#doctor_result").html(txt);
		}
	});
};

/**
 * ViewDoctorPro Pop Up
 * Details from Ajax request
 */
function ViewDoctorPro(para_1){
	var baseUrl = $("#base_url_admin").val();
	var newUrl = "/GetDoctorProfileAdmin";
	var dataString = "doctor_id="+para_1;
	$.ajax({
		type:'POST',
		url:newUrl,
		data:dataString,
		dataType:'json',
		case:false,
		success:function(data){
			console.log(data);
			$("#doctor_id_con").val(data['doc_id']);
			$("#doctor_user_id_con").val(data['doc_user_id']);

			$("#doc_con_load_img").css("background-image",'url('+baseUrl+''+data['doc_image']+')');
			$("#doc_con_load_aid").html(data['doc_ayurvedic_id']);
			$("#doc_con_load_name").html('Dr. '+data['doc_name']);
			$("#doc_con_load_type").html(data['doc_type']);
			$("#doc_con_load_username").val("");
			$("#doc_con_load_password").val("");

			$("#doc_confirm_pop_up").fadeIn();
		}
	});
}

/**
 * Close Doctor Confirm Pop Up
 * @param para_1
 */
function CloseDocConfirmPopup(){
	$("#doc_confirm_pop_up").fadeOut();
}

/**
 * Save Doctor Confirmation Details
 * @param para_1
 */
function SaveDocConfirm(){
	if($("#doc_con_load_username").val() == "" || $("#doc_con_load_password").val() == ""){
		if($("#doc_con_load_username").val() == ""){
			alert("Enter Username");
		}else{
			alert("Enter Password");
		}
	}else{
		var doctor_id = $('#doctor_id_con').val();
		var user_id = $('#doctor_user_id_con').val();
		var newUrl = '/SaveDoctorConfirm';
		var dataString = "doctor_id="+doctor_id+'&user_id='+user_id+'&username='+$("#doc_con_load_username").val()+'&password='+$("#doc_con_load_password").val();

		$.ajax({
			type:'POST',
			url:newUrl,
			data:dataString,
			dataType:'json',
			case:false,
			success:function(data){
				console.log(data);
				$("#doc_confirm_form").hide();
				$(".confirm_success").fadeIn();
				$("#doc_confirm_pop_up").delay(1500).fadeOut(100,function(){
					$(".confirm_success").fadeOut();
					$("#doc_confirm_form").fadeIn();
				});
			}
		});
	}
}

/**
 * Save Doctor Confirmation Details
 * @param para_1
 */
function SaveAndSendMailDocConfirm(){
	if($("#doc_con_load_username").val() == "" || $("#doc_con_load_password").val() == ""){
		if($("#doc_con_load_username").val() == ""){
			alert("Enter Username");
		}else{
			alert("Enter Password");
		}
	}else{
		var doctor_id = $('#doctor_id_con').val();
		var user_id = $('#doctor_user_id_con').val();
		var newUrl = '/SaveSendEmailDoctorConfirm';
		var dataString = "doctor_id="+doctor_id+'&user_id='+user_id+'&username='+$("#doc_con_load_username").val()+'&password='+$("#doc_con_load_password").val();

		$("#doc_confirm_form").hide();
		$(".waiting_confirm").fadeIn();
		$.ajax({
			type:'POST',
			url:newUrl,
			data:dataString,
			dataType:'json',
			case:false,
			success:function(data){
				console.log(data);
				if(data.CHECK == "Changed"){
					$(".waiting_confirm").hide();
					$(".confirm_success").fadeIn();
					$("#doc_confirm_pop_up").delay(1500).fadeOut(100,function(){
						$(".confirm_success").fadeOut();
						$("#doc_confirm_form").fadeIn();
					});
				}else{
					alert("Some thing went wrong !!...");
					$(".waiting_confirm").hide();
					$("#doc_confirm_pop_up").delay(1500).fadeOut(100,function(){
						$("#doc_confirm_form").fadeIn();
					});
				}
			}
		});
	}
}

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

function remove_highlight(id,cls){
	$("#"+id).removeClass(cls)

}

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

function therapyLoad(){

	$.ajax({
		type:'GET',
		dataType:"json",
		url: '/admin_panel/customize/therapyLoad',
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
function user_rem(id) {


	var reason = $('#reason').val();

	if ($("#reason").val().length == 0) {

		show_warning('reason');
	} else{

	  var dataString = "user_id=" + id+"&reason="+reason;
	  var new_url = '/admin_panel/removeusers/' + id;

	$("#blockConfirmPopup").hide();
	$("#c_blocking_msg").show();

	$.ajax({
		type: 'GET',
		url: new_url,
		data: dataString,
		cache: false,
		success: function (data) {
			if (data["error"] == true) {
				$("#admin_home_div").html(data.page);
			} else {

				load_users_via_ajax();
			}
		}
	});
}
};


//add id of the comment to the hidden variable inorder to remove
function comment_pass_remove(id){
	$("#hidden_click_com_id").val(id);
	$("#commentRemovePopup").show();
}

function commentRemovePopupClose(){
	$("#hidden_click_com_id").val("");
	$("#commentRemovePopup").hide();
}




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
	$("#des2").text(des2);
	$("#tiptip").val(tip);
	remove_wrn('header1');
	remove_wrn('tip');
	remove_wrn('header2');
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
	$('#docChoosePopup').show();
	$("#hidden_click_count").val(count);

}

//Add a new featured doctor
function featuredAddNew(){
	//show the doctor selection poup
	$('#docChoosePopup').show();

	$("#hidden_click_count").val("new");

}

//featured doctor update confirm popup show
function feturedDoctorUpdatePopUp(){
	var id = $("#hidden_click_id").val();


	if(id==0){
		$('#featuredRowpoup').show();
	}
	else {
		$('#featureddocpoup').show();
	}
}

//featured doctor select warning popup close
function featuredRowPopupClose(){

	$('#featuredRowpoup').hide();

}

//featured doctor update confirm popup hide
function feturedDoctorUpdatePopUpClose(){

	$('#featureddocpoup').hide();

}

//featured doctor field remove confirm popup show
function feturedDoctorRemovePopUp(){

	$('#featureddocRemovepoup').show();
	//$('#hidden_click_remove').val(id);

	//window.feat_addno=function(id){return true;};
}


//featured doctor field remove confirm popup hide
function feturedDoctorRemovePopUpClose(){
	$('#featureddocRemovepoup').hide();


}

//Remove field from featured doctors
function removeFet(){


	var count1= $('#hidden_click_count').val();

		var dataString = "idfet=" + count1;
		var new_url = '/admin_panel/removefet';
		$.ajax({
			type: 'POST',
			url: new_url,
			data: dataString,
			cache: false,
			success: function (data) {
				//console.log(data);
				if(data['error']==true){
					$("#admin_home_div").html(data.page);
				}
				else {
					$('#featureddocRemovepoup').hide();
					//$("#admin_home_div").html(data.com_data);
					load_cos_page1_via_ajax();
				}

			}
		});

};



//update the featured dotor table
function updatefet(){
	var id = $("#hidden_click_id").val();
	var count= $("#hidden_click_count").val();


	var dataString = "count=" + count +"&doc_id="+id;
		var new_url = '/admin_panel/updatefet';
		$.ajax({
			type: 'POST',
			url: new_url,
			data: dataString,
			cache: false,
			success: function (data) {
				//console.log(data);
				$("#admin_home_div").html(data.com_data);

			}
		});



};

//load edit featured dotors page to the customize panel
function load_cos_page1_via_ajax(){


	$.ajax({
		type:'GET',
		dataType:"json",
		url: '/admin_panel/customize/featured',
		cache:false,
		success: function(data){

			$("#admin_home_div").html(data.com_data);
		}
	});
};

//load edit featured dotors page to the customize panel
function load_dashboard(){


	$.ajax({
		type:'GET',
		dataType:"json",
		url: '/admin_panel/dashboard',
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page);
			loadCharts();
		}
	});
};


//load edit featured dotors page to the customize panel
function load_chat(){
	$.ajax({
		type:'GET',
		dataType:"json",
		url: '/admin_panel/chat',
		cache:false,
		success: function(data){
			//console.log(data);
			$("#admin_home_div").html(data.page);
			GetChatUsers();
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
		success: function(data) {
			if (data["error"] == true) {
				$("#admin_home_div").html(data.page);

			} else{

				var txt = '<table id="kawa" class="col-lg-12 tabledesign1"  >';
			for (var i = 0; i < Object(data.page).length; i++) {

				txt = txt + '<tr class="trid_' + data["page"][i]["id"] + ' common"	style = "background-color:#fff;height:35px;border:1px solid #ddd;"	onclick = "getdocid(' + data["page"][i]["id"] + ')" >';
				txt = txt + '<td class = "col-lg-5" >' + data["page"][i]["first_name"] + '&nbsp&nbsp' + data["page"][i]["last_name"] + '</td >';
				txt = txt + '<td class	= "col-lg-2"  style="border-left: 1px solid #ddd;">' + data["page"][i]["rating"] + '</td >';
				txt = txt + '<td	class = "col-lg-5"  style="border-left: 1px solid #ddd;">' + data["page"][i]["city"] + '</td ></tr>';
			}

			txt = txt + '</table>';

			//console.log(txt);
			$("#featuredDocTable").html(txt);

		}
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
		var dataString = "des1="+des1+"des2="+des2+"tip="+tip;
		var new_url = '/admin/tip/'+des1+"/"+des2+"/"+tip;

		$.ajax({
			type: 'POST',
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








//popup close
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
	$("#adminpoup1").hide();
	$("#adminpoup2").hide();


};

function admin_pop_close1(){
	$("#adminpoup").hide();
	$(".pat_close_btn").hide();
	$("#adminpopup1").hide();
	$("#adminpopup2").hide();

};

function admin_pop_close2(){
	$("#adminpopup2").hide();
	$("#adminpoup1").hide();
	$("#adminpoup").hide();


};

function tipAddPopupClose(){
	$("#tipAddPopup").hide();
}

function adminregpoup_close(){
	$("#adminregpoup").hide();
	$(".pat_close_btn").hide();

};


function therapySaveClose(){
	$("#therapySavePopup").hide();

}


//feature doctor choose popup close
function docChooseClose(){
	//doctor select popup
	$("#docChoosePopup").hide();

    //renove highlight of selected field
	$(".common").removeClass('colortable');

	//selected doctor id to 0
	$("#hidden_click_id").val(0);

	//selected featured doctor id to 0
	$("#hidden_click_count").val(0);

}



//Add health tips
function confirm_addtip() {


	if (valid_length_input('header1') || valid_length_input('tip') || ($("#des2").val().length==0)) {

		if (valid_length_input('header1')) {
			show_warning('header1');
		}
		if (valid_length_input('tip')) {
			show_warning('tip');
		}

		if ($("#des2").val().length==0) {
			show_warning('header2');
		}
	}
	else {

	$("#tipAddPopup").show();
	$(".pat_close_btn").show();
    }

};




function display_priv(){

	$("#tabdiv").slideUp();
	$("#preview").slideDown();
	$("#prebut").hide();
	$("#tipbut").show();



}


//display health tip table div
function display_all_tip(){
	$("#tabdiv").slideDown();
	$("#preview").slideUp();
	$("#prebut").show();
	$("#tipbut").hide();
}

//add therapy
function addTherapy(){
	//$(".pat_close_btn").show();
	if (valid_length_input('tname1') ||  ($("#tdes1").val().length==0 || $('#profile_thumb').attr('src')=="")) {

		if (valid_length_input('tname1')) {
			show_warning('tname1');
		}
		if (($("#tdes1").val().length==0)) {
			show_warning('tdes1');

		}
		if ($('#profile_thumb').attr('src')=="") {

			show_warning('profile_thumb');
		}

	}else {
		$("#therapySavePopup").show();
	}
}





//add a new ayurvedic thrapy or update existing one
function confirm_addTherapy() {

      if($('#hidden_click_therapy_up_status').val()=="true"){
		  //update existing therapy

		   var updateId=$('#hidden_click_therapy_id').val();
		   var formData = new FormData($('#therapies_form')[0]);
		   var new_url = '/admin_panel_home/updatetherapy/'+updateId;
		   $.ajax({
			   method: 'POST',
			   url: new_url,
			   data: formData,
			   // THIS MUST BE DONE FOR FILE UPLOADING
			   contentType: false,
			   processData: false,
			   success: function (data) {

				   if (data['error'] == true) {
					   $("#admin_home_div").html(data.page);
				   }
				    else{
					   therapyLoad();
			      }
			   }
			   // ... Other options like success and etc
		   })
	   }
       else
		{
			//Add new thrapy

			var formData = new FormData($('#therapies_form')[0]);
			var new_url = '/admin_panel_home/addtherapy';
			$.ajax({
				method: 'POST',
				url: new_url,
				data: formData,
				// THIS MUST BE DONE FOR FILE UPLOADING
				contentType: false,
				processData: false,
				success: function (data) {

					if (data['error'] == true) {
						$("#admin_home_div").html(data.page);
					}
					else{
						therapyLoad();
					}
				}
				// ... Other options like success and etc
			})
		}


};

/*
*   select item from therapy table to update
*/
function updateTherapy(id,name,description,image_path){
	$(".commonT").removeClass('colortable'); //remove highlight from all the rows
	$(".therapyid_"+id).addClass('colortable'); //highlight the given row

	$('#tname1').val(name);            //set the value of the topic text box
	$('#tdes1').val(description);      //set the value of the Description text field
	$("#profile_thumb").attr("src", image_path);  //set the image path
	$('#hidden_click_therapy_id').val(id);        //set the hidden text which holds therapy id
	$('#hidden_click_therapy_up_status').val("true");  //set the hidden text  which holds therapy update status
	remove_wrn('tname1'); //remove topic warning
	remove_wrn('tdes1');  //remove description warning
	remove_wrn('profile_thumb');  //remove image warning

}



function delTherapy(id){
   $('#hidden_click_therapy_del_id').val(id);
	$(".commonT").removeClass('colortable'); //remove highlight from all the rows
	$(".therapyid_"+id).addClass('colortable'); //highlight the given row
	$("#therapyDeletePopup").show();


}

function therapyDeleteClose(){
	$("#therapyDeletePopup").hide();

}

function projectqqclose(){
	$("#projectqq").hide();
	goBack();

}
function showpop(){

	$("#projectqq").show();
}


function viewpassword(){

	$("#passwordset").show();
	$("#pwrdbtn").hide();

}


function enableEdit(){


	$("#editbtn").hide();
	$("#op2").show();
	$("#op1").hide();
}

function goBack(){

	$("#editbtn").show();
	$("#op2").hide();
	$("#op1").show();

	$("#pwrd").val("");
	$("#acpwrd").val("");



}
function confirmDeleteTherapy() {
	var del_id = $('#hidden_click_therapy_del_id').val();


	var dataString = "tid=" + del_id;
	var new_url = '/admin/therapyDelete';

	$.ajax({
		method: 'POST',
		url: new_url,
		data: dataString,
		cache: false,
		success: function (data) {
			if (data['error'] == true) {

				$("#admin_home_div").html(data.page);

			} else
			{
				therapyLoad();
		    }
		}
	});
}





function get_image(para_1,para_2){
	remove_wrn('profile_thumb')
	$("#"+para_2).trigger('click');

		changeImage();
};

function changeImage(){
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
							//$('#'+div_id).css("background-image",'url("'+e.target.result+'")'); //append image to output element
							$("#profile_thumb").attr("src", e.target.result);
						};
					})(file);
					fRead.readAsDataURL(file); //URL representing the file's data.
				}
			});

		}else{
			alert("Your browser doesn't support File API!"); //if File API is absent
		}
	});


}
function admin_reg_via_ajax(){
	$.ajax({
		url:'/reg_admin.php',
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data);
		}
	});
};







//load blocked user page

function blockedUsers(){
	$.ajax({
		url:'/inap_users',
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

	if(valid_length_input('first_name') || check_input_no_num('first_name') || valid_length_input('last_name')  || check_input_no_num('last_name') || valid_length_input('email') || !valid_email('email') || valid_length_input('username') || valid_length_input('password') || valid_length_input('confirm_password') || !valid_confirm_password('password','confirm_password') || !PASSWORD_PATTERN){

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
		if(!PASSWORD_PATTERN){
			$(".a_password_inputs").fadeIn();
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
	$('#adminregpoup').hide();
	$('#c_thanking_msg').show();

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

	$("#adminpopup1").hide();
	$("#c_admin_block_msg").show();

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





//access admins
function access_admin_1(){
	var del_id = $("#hidden_click_admin_del_id").val();

	$("#adminpopup2").hide();
	$("#c_admin_activate_msg").show();

	var dataString="id="+del_id;
	var new_url = '/admin/adminAccess/'+del_id;

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
//display pop up to delete admin
function access_admin(id){
	$("#hidden_click_admin_del_id").val(id);
	$("#hidden_click_admin_up_status").val("false");

	$(".common").removeClass('colortable');
	$(".admin_id_"+id).addClass('colortable');

	$(".pat_close_btn").show();
	$("#adminpopup2").show();

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
           if(data["count"] != null){
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



			if (data["count"] > end) {
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panelqq").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"];
				$("#c_page_noqq").html(txt);
			}
			else if(data["count"] <= end && data["count"] > 0 ){
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panelqq").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"];
				$("#c_page_noqq").html(txt);
			}
			else{
				$("#search_doc_pagination_panelqq").html(txt);
				txt = '0';
				$("#c_page_noqq").html(txt);
				$("#resultNoInap").show();
			}






			// Pagination ///////////////////////////////////
			/////////////////////////////////////////////////


		}},
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

//load the user view page
function load_comments_via_ajax(){
	$.ajax({
		url:'/comments_view',
		cache: false,
		success: function(data){
			$("#admin_home_div").html(data);
			comments_load_via_ajax(1);
		}
	});
};


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

			if(data["error"]== true){
				$("#admin_home_div").html(data.page);

			}else {

				load_comments_via_ajax();
			}
		}
	});


};


// load user comments to the admin panel
function comments_load_via_ajax(){

	var method_type='GET';
	var skip= $("#start_com").val();
	var end= $("#end_com").val();
	var curr=$("#page_number_hidden_com").val();
	var res_starts=parseInt($("#start_com").val())+parseInt(1)
	var dataString = 'skip='+skip+'end='+end;
	$.ajax({

		type: method_type,
		dataType: "json",
		url:'/admin_panel/user_comments/'+skip+'/'+end,
		cache: false,
		data: dataString,
		success: function (data){
			$("#c_comment_result_ajax_box").html(data.page);
			if(data["count"] != null){



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

				txt=txt+'<ul class="pagination" style="margin-top: 30px"><li><a href="#page_pre='+pre_page_no+'" onclick="paginationCom('+pre_page_no+')" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
				for(var i=1;i<=last;i++)
				{
					txt=txt+'<li ';
					if(curr==i)
					{
						txt=txt+'class="active"';
					}
					txt=txt+'><a href="#page='+i+'" onclick="paginationCom('+i+')">'+i+' <span class="sr-only">(current)</span></a></li>';
				}
				txt=txt+'<li><a href="#page_next='+next_page_no+'" onclick="paginationCom('+next_page_no+')" aria-label="Next"><span aria-hidden="true">»</span></a></li></ul>';

			}


			if (data["count"] > end) {
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_comment_pagination_panel").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"];
				$("#com_page_no").html(txt);
			}
			else if(data["count"] <= end && data["count"] > 0){
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_comment_pagination_panel").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"];
				$("#com_page_no").html(txt);
			}
			else{
				$("#search_comment_pagination_panel").html(txt);
				txt = '0';
				$("#com_page_no").html(txt);
				$("#resultNoComment").show();
			}

			// Pagination ///////////////////////////////////
			/////////////////////////////////////////////////


		}},
		error: function (data) {
			console.log('Error:', data);
		}
	});
};



function paginationCom(para_1){

	$("#start_com").val(parseInt(para_1)*parseInt($("#end_com").val())- parseInt($("#end_com").val()));
	$("#page_number_hidden_com").val(para_1);
	comments_load_via_ajax();
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


			if(data["count"] != null){

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


			if (data["count"] > end) {
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panel1").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"];
				$("#c_page_no1").html(txt);

			}
			else if(data["count"] <= end && data["count"] > 0){
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panel1").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"];
				$("#c_page_no1").html(txt);

			}
			else{
				$("#search_doc_pagination_panel1").html(txt);
				txt = '0';

				$("#c_page_no1").html(txt);
				$("#resultNo").show();

			}

			// Pagination ///////////////////////////////////
			/////////////////////////////////////////////////


		}},
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
			if(data["count"] != null){




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
			else if(data["count"] <= end && data["count"]  > 0){
				var tot = parseInt(skip) + parseInt(data["count1"]);
				$("#search_doc_pagination_panel2").html(txt);
				txt = res_starts + ' - ' + tot + ' of ' + data["count"] ;
				$("#c_page_no2").html(txt);

			}
			else{
				$("#search_doc_pagination_panel2").html(txt);
				txt = '0';
				$("#c_page_no2").html(txt);
				$("#resultNonew").show();
			}

			// Pagination ///////////////////////////////////
			/////////////////////////////////////////////////


		}},
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







var Graph_array1 = [];
var Graph_array2 = [];
var Graph_array3 = [];
var Graph_array4 = [];

Graph_array4[0]=4;
Graph_array4[1]=5;
Graph_array4[2]=6;

var bb="DFDF";
function loadCharts() {


	$.ajax({
		method: 'get',
		type: 'json',
		url: '/Charts',
		cache: false,
		success: function (data) {

			for (var i = 0; i < Object(data.graph_1).length; i++) {
				Graph_array1.push(data.graph_1[i]);
			}
			for (var x = 0; x < Object(data.graph_2).length; x++) {
				Graph_array2.push(data.graph_2[x]);
			}
			for (var y = 0; y < Object(data.graph_3).length; y++) {

				Graph_array3.push(data.graph_3[y]);
			}
			Graph_array4[0]=data.graph_41;
			Graph_array4[1]=data.graph_42;
			Graph_array4[2]=data.graph_43;

			Char_load();
		}

	});
};

function Char_load(){


		$(function () {
			"use strict";

			// AREA CHART
			var area = new Morris.Area({
				element: 'revenue-chart',
				resize: true,
				data:Graph_array1,
				xkey: 'y',
				ykeys: ['item1'],
				labels: ['Users'],
				lineColors: ['#7DEAB8'],
				hideHover: 'auto'
			});
			// LINE CHART
			var line = new Morris.Line({
				element: 'line-chart',
				resize: true,
				data:Graph_array2,
				xkey: 'y',
				ykeys: ['item1'],
				labels: ['Doctors'],
				lineColors: ['#3c8dbc'],
				hideHover: 'auto'
			});

			//DONUT CHART
			var donut = new Morris.Donut({
				element: 'sales-chart',
				resize: true,
				colors: ["#3c8dbc", "#f56954", "#00a65a"],
				data: [
					{label: "Users", value:Graph_array4[0]},
					{label: "Formal Doctors", value: Graph_array4[1]},
					{label: "Non Formal Doctors", value: Graph_array4[2]}
				],
				hideHover: 'auto'
			});
			//BAR CHART
			var bar = new Morris.Bar({
				element: 'bar-chart',
				resize: true,
				data:Graph_array3,
				barColors: ['#00a65a', '#f56954'],
				xkey: 'y',
				ykeys: ['item1', 'item2'],
				labels: ['Formal Doctors', 'Non Formal Doctors'],
				hideHover: 'auto'
			});
		});

	 Graph_array1 = [];
	 Graph_array2 = [];
	 Graph_array3 = [];

	//}
};

/*
 * function validate password field entered characters pattern
 */
function passwordValidate(){

	if($(".password_regx").val().length  == 0){
		$(".a_password_inputs").fadeOut();
	}else{
		$(".a_password_inputs").fadeIn();
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

}

/*
 * Close Regx Warning Message
 */
function leaveValidate() {
	$(".a_password_inputs").fadeOut();

}

/*
 * function validate password field entered characters pattern
 */
function passwordValidateAdmin(){

	if($(".password_regx").val().length  == 0){
		$(".a_password_inputs1").fadeOut();
	}else{
		$(".a_password_inputs1").fadeIn();
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

}

/*
 * Close Regx Warning Message
 */
$(".password_regx").on('focusout',function() {
	$(".a_password_inputs1").fadeOut();


});


//make visible user block confirm popup
function blockConfirmPopupshow(){

	$('#blockConfirmPopup').show();
}

//Hide user block confirm popup
function blockConfirmPopupClose(){

	$('#blockConfirmPopup').hide();

}

 /*
 * Admin Side Chat View Page
 */

/*
 * Get Available Chat Users
 */
function GetChatUsers(){
	var base_url = $("#base_url_admin").val();
	var new_url = '/Admin_get_chat_users';
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: new_url,
		cache: false,
		success: function (data) {
			var txt="";
			for(var i=0;i<Object(data).length;i++) {
				var image = "";
				if(data[i]['user_type'] == "DOCTOR"){
					image = base_url+"profile_images/doctor_images/doc_profile_img_"+data[i]['user_id']+".png";
				}else{
					image = base_url+"profile_images/user_images/user_profile_img_"+data[i]['user_id']+".png";
				}
				var txt = txt+'<div class="col-lg-4 c_no_padding"><div class="chat_active_div" width="100%" style="height: 250px;';
				if(i%3 < 2) {
					txt = txt + 'margin-right: 10px;';
				}
				txt = txt +	'margin-bottom:10px"><div class="chat_user_icon" style="background-image: url('+image+')"></div>' +
						'<div class="col-lg-12" style="margin-top: 8px">' +
						'<p class="chat_fonr_1" style="font-weight: 500">'+data[i]['user_data'][0]['first_name']+" "+data[i]['user_data'][0]['last_name']+'</p>' +
						'<p class="chat_fonr_1" style="font-size: 13px !important">'+data[i]['user_data'][0]['email']+'</p></div><div class="col-lg-12"><div class="col-lg-4"></div>' +
						'<div class="col-lg-4 chat_start_btn" onclick="OpenChat('+data[i]['user_id']+',\''+data[i]['user_data'][0]['first_name']+' '+data[i]['user_data'][0]['last_name']+'\')"><img src="'+base_url+'assets_admin/img/start_chat.png">&nbsp;&nbsp;Chat</div>' +
						'<div class="col-lg-4"></div></div></div></div>';
			}
		 	$("#av_users_list").html(txt);
		}
	});
};

/* set interval */
var tid='';// holds timer id
function abortTimer() { // to be called when you want to stop the timer
	clearInterval(tid);
}

// Chat Pop up Close
function CloseAdminChat(){
	abortTimer();
	$("#chat_pop_up_container").fadeOut();
};

/*
 *	Open Chat Pop up
 * 	@para-> User ID
 */
function OpenChat(para_1,para_2){
	$("#user_name_chat_pop_up").html(para_2);
	$("#chat_pop_up_container").fadeIn();
	$("#current_user_id").val(para_1);
	LoadChat();
	// this will start chat session
	tid = setInterval(LoadChat, 5000);
};

/*
 * LoadChat Details From DB
 * Via Ajax
 * @para -> User ID
 */
function LoadChat(){
	var para_1 = $("#current_user_id").val();

	var base_url = $("#home_base_url").val();
	var new_url = '/Admin_get_chat_message';
	var dataString  = "user_id="+para_1;
	$.ajax({
		type: 'POST',
		data: dataString,
		dataType: "json",
		url: new_url,
		cache: false,
		success: function (data) {
			//console.log(data);
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
 * This function used to send messages to users
 * on Livechat App
 */
function SendMessage(){
	var new_url = '/Admin_send_chat_message';
	var dataString  = "user_id="+$("#current_user_id").val()+"&message="+$("#chat_message_txt").val();
	$.ajax({
		type: 'POST',
		data: dataString,
		dataType: "json",
		url: new_url,
		cache: false,
		success: function (data) {
			$("#chat_message_txt").val("");
			LoadChat($("#current_user_id").val());
			$('.c_chat_box').animate({scrollTop: $('.c_chat_box')[0].scrollHeight}, 1000);
		}
	});
};


/**
 * Chat Send Message Submit event
 */
function ChatSubmitCLick(){
	//e.preventDefault();
	SendMessage();
	return false;
	//SendMessage();
};

//admin profil edit hover show
function showhover(){
	$('#edithover').show();

}


//admin hidehover edit hover hide
function hidehover(){
	$('#edithover').hide();

}


function setEditable(type){


	if(type == "fname1"){
		$("#fname1").prop("disabled", false);
		$("#changeFN").show();
		$("#editFN").hide()
	}
	else if(type == "lname1"){
		$("#lname1").prop("disabled", false);
		$("#changeLN").show();
		$("#editLN").hide()
	}
	else if(type == "email1"){
		$("#email1").prop("disabled", false);
		$("#changeEM").show();
		$("#editEM").hide()
	}
	else if(type == "uname1"){
		$("#uname1").prop("disabled", false);
		$("#changeUN").show();
		$("#editUN").hide()
	}

}



function cancelEdit(type,text){


	if(type == "fname1"){
		$("#fname1").prop("disabled", true);
		$("#changeFN").hide();
		$("#editFN").show();
		$("#fname1").val(text);
	}
	else if(type == "lname1"){
		$("#lname1").prop("disabled", true);
		$("#changeLN").hide();
		$("#editLN").show();
		$("#lname1").val(text);

	}
	else if(type == "email1"){
		$("#email1").prop("disabled", true);
		$("#changeEM").hide();
		$("#editEM").show();
		$("#email1").val(text);
	}
	else if(type == "uname1"){
		$("#uname1").prop("disabled", true);
		$("#changeUN").hide();
		$("#editUN").show();
		$("#uname1").val(text);
		remove_wrn('username');
	}

}

//save first name
function saveFName(){
	if (($("#fname1").val().length == 0)) {

		show_warning('fname1');

	}else {
		$("#adminFNPopup").show();

	}
}


function confirmChangeFName(){

	var name = $("#fname1").val();
	var dataString = "fname=" + name;
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: 'admin/update/profile/fname',
		data: dataString,
		cache: false,
		success: function (data) {
			//console.log(data);
			$("#fname1").html(data.page);
			$("#fname1").prop("disabled", true);
			$("#changeFN").hide();
			$("#editFN").show()
			adminFNPopupClose();
		}

	});

}


//save last name
function saveLName() {
	if(($("#lname1").val().length == 0)) {

		show_warning('lname1');

	}else{

		$("#adminLNPopup").show();
    }
}

function confirmChangeLName(){

	var name = $("#lname1").val();
	var dataString = "lname=" + name;
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: 'admin/update/profile/lname',
		data: dataString,
		cache: false,
		success: function (data) {

			$("#lname1").html(data.page);
			$("#lname1").prop("disabled", true);
			$("#changeLN").hide();
			$("#editLN").show()
			adminLNPopupClose()
		}

	});

}




//save email
function saveEmail() {
	if(($("#email1").val().length == 0)) {

		show_warning('email1');

	}else{

		$("#adminEmailPopup").show();
    }
}

function confirmChangeEmail(){

	var name = $("#email1").val();
	var dataString = "email=" + name;
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: 'admin/update/profile/email',
		data: dataString,
		cache: false,
		success: function (data) {
			//console.log(data);
			$("#email1").html(data.page);
			$("#email1").prop("disabled", true);
			$("#changeEM").hide();
			$("#editEM").show()
			adminEmailPopupClose()
		}

	});
}




//Change user name
function saveUName() {
	if(($("#uname1").val().length == 0)) {

		show_warning('username');
	}else{
		$("#adminUNPopup").show();

   }
}

function confirmChangeUName(){

	var name = $("#uname1").val();
	var dataString = "uname=" + name;
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: 'admin/update/profile/uname',
		data: dataString,
		cache: false,
		success: function (data) {
			//console.log(data);
			$("#uname1").html(data.page);
			$("#uname1").prop("disabled", true);
			$("#changeUN").hide();
			$("#editUN").show()
			adminUNPopupClose()
		}

	});
}



//save password
function savePassword() {

	if((($("#pwrd").val().length!=0)&&($("#acpwrd").val().length==0)) ||(($("#pwrd").val().length==0)&&($("#acpwrd").val().length!=0))||(($("#pwrd").val())!=($("#acpwrd").val())) || !PASSWORD_PATTERN) {

		if(($("#pwrd").val().length!=0)&&($("#acpwrd").val().length==0)){

			show_warning('acpwrd');
		}
		if(($("#pwrd").val().length==0)&&($("#acpwrd").val().length!=0)){

			show_warning('pwrd');
			show_warning('acpwrd');
		}
		if((($("#pwrd").val())!=($("#acpwrd").val()))){
			show_warning('pwrd');
			show_warning('acpwrd');
		}
		if(!PASSWORD_PATTERN){
			$(".a_password_inputs1").fadeIn();
		}
	}else{
		$("#adminPWDPopup").show();

	}
}


function confirmChangePwrd(){

	var password = $("#pwrd").val();
	var dataString = "password=" + password;
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: 'admin/update/profile/password',
		data: dataString,
		cache: false,
		success: function (data) {
			//console.log(data);
			goBack();
			adminPWDPopupClose()
		}

	});
}


// close first name upadte confirm popup
function adminFNPopupClose(){
	$("#adminFNPopup").hide();
}


// close last name upadte confirm popup
function adminLNPopupClose(){
	$("#adminLNPopup").hide();
}


// close email upadte confirm popup
function adminEmailPopupClose(){
	$("#adminEmailPopup").hide();
}


// close user name upadte confirm popup
function adminUNPopupClose(){
	$("#adminUNPopup").hide();
}


// close password upadte confirm popup
function adminPWDPopupClose(){
	$("#adminPWDPopup").hide();
}
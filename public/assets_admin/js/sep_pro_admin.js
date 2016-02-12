// JavaScript Document
$(document).ready(function(e) {
    var win_height = $(window).height();
	$("#admin_home_div").css("height",(win_height-104)+"px");
});

var doc_s=false;var pat_s=false; var cus_s=false;
$("#admin_left_nav_doc_btn").click(function(){
	if(doc_s==false){
		$("#admin_left_nav_pat").slideUp(100);
		$("#admin_left_nav_doc").slideDown(100);
		$("#admin_left_nav_cus").slideUp(100);
		$("#c_admin_span_1").addClass("glyphicon-menu-down");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		doc_s=true; pat_s=false; cus_s=false;
	}
	else{
		$("#admin_left_nav_doc").slideUp(100);
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		doc_s=false;  pat_s=false; cus_s=false;
	}
});
$("#admin_left_nav_pat_btn").click(function(){
	if(pat_s==false){
		$("#admin_left_nav_doc").slideUp(100);
		$("#admin_left_nav_pat").slideDown(100);
		$("#admin_left_nav_cus").slideUp(100);
		$("#c_admin_span_2").addClass("glyphicon-menu-down");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		pat_s=true; doc_s=false; cus_s=false;
	}
	else{
		$("#admin_left_nav_pat").slideUp(100);
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		pat_s=false; doc_s=false; cus_s=false;
	}
});

$("#admin_left_nav_cus_btn").click(function(){
	if(cus_s==false){
		$("#admin_left_nav_doc").slideUp(100);
		$("#admin_left_nav_pat").slideUp(100);
		$("#admin_left_nav_cus").slideDown(100);
		$("#c_admin_span_3").addClass("glyphicon-menu-down");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		cus_s=true; pat_s=false; doc_s=false;
	}
	else{
		$("#admin_left_nav_cus").slideUp(100);
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		cus_s=false; pat_s=false; doc_s=false;
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
			//console.log(data);
			$("#admin_home_div").html(data.page);
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

function get_tip_id(id,tip,des1,des2){
	$("#hidden_click_tip_id").val(id);
	$("#hidden_click_tip_up_status").val("true");


	$(".common").removeClass('colortable');
	$(".tipid_"+id).addClass('colortable');

	$("#des1").val(des1);
	$("#des2").val(des2);
	$("#tiptip").val(tip);
};


function tip_color(id){

	$(".common").removeClass('colortable');
	$(".tipid_"+id).addClass('colortable');
};

function del_tip(id){
	$("#hidden_click_tip_del_id").val(id);
	$("#hidden_click_tip_up_status").val("false");
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

function load_inapuser_via_ajax(){

	$.ajax({
		type:'GET',
		dataType:"json",
		url: '/admin_panel/inapusers',
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
	$("#user_det").show();};



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

		var txt = '<table id="kawa" class="col-lg-12" style="border:2px solid rgb( 0, 0, 0 )">';
			for(var i=0;i<Object(data.salika).length;i++) {

				txt = txt+'<tr class="trid_'+data["salika"][i]["id"]+' common"	style = "border:2px solid rgb( 0, 0, 0 )"	onclick = "getdocid('+data["salika"][i]["id"]+')" >';
				txt = txt+'<td class = "col-lg-4" >'+data["salika"][i]["first_name"]+'</td >';
				txt = txt+'<td class	= "col-lg-4" >'+data["salika"][i]["last_name"]+'</td >';
				txt = txt+'<td	class = "col-lg-4" > '+data["salika"][i]["contact_number"]+'</td ></tr>';
			}

			txt=txt+'</table>';

			//console.log(txt);
			$("#maybe").html(txt);
			$("#filviv").fadeOut(1000,function() {
				$("#tabdiv").fadeIn(1);
				$("#fdiv").fadeIn(1);
			});

		}
	});
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
				/*var txt = '<div class="center-block pat_success1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">';

				 txt = txt+'		<div style="background: #4CBC5B;height: 145px;padding-top: 32px">';
				 txt = txt+'         <div class="container c_no_padding col-lg-12">';
				 txt = txt+'	          <div class="col-lg-10 c_no_padding" style="margin-left: 30px">';
				 txt = txt+'		         <ul class="c_ul_1">';
				 txt = txt+'		           <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Successfull ! </span></li>';
				 txt = txt+'                    <li> ';
				 txt = txt+'                     <div style="padding-top: 30px">';
				 txt = txt+'                      <div class="col-lg-3" style="margin-left: 100px">';
				 txt = txt+'		                 <button class="pat_view_btn_1" onclick="success_pop_close()" >Ok.</button>';
				 txt = txt+'		              </div>';
				 txt = txt+'		             </div>';
				 txt = txt+'		            </li>';
				 txt = txt+'		          </ul>';
				 txt = txt+'		     </div>';
				 txt = txt+'		    </div>';
				 txt = txt+'        </div>';
				 txt = txt+' </div>';
				 $("#success_popup").html(txt);
				 $("#success_popup").show();
				 $("#featuredpoup").hide();
				 $(".pat_close_btn").hide();
				 $("#des1").val("");
				 $("#des2").val("");
				 $("#tiptip").val("");*/

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

$(document).ready(function(e){
	// Check whether current page is Search results page or not

});

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
		id2="Header 1";
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
		id2="Header 2";
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


function confirm_addtip(){
	$("#featuredpoup").show();
	$(".pat_close_btn").show();

};
/*$(document).ready(function(e) {

	var val=$("#tip_text_hidden").val();
	if(val=="true"){
		alert(val);
	}
	else if(val=="false"){
		alert(val);
	}
	else{
		alert(val);
	}
});*/


function display_priv(){
	$("#tabdiv").hide();
	$("#privbut").hide();
	$("#preview").show();

}
// JavaScript Document
$(document).ready(function(e) {
    var win_height = $(window).height();
	$("#admin_home_div").css("height",(win_height-104)+"px");
});

var doc_s=false;var pat_s=false; var for_s=false;
$("#admin_left_nav_doc_btn").click(function(){
	if(doc_s==false){
		$("#admin_left_nav_pat").slideUp(100);
		$("#admin_left_nav_for").slideUp(100);
		$("#admin_left_nav_doc").slideDown(100);
		$("#c_admin_span_1").addClass("glyphicon-menu-down");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		doc_s=true;
	}
	else{
		$("#admin_left_nav_doc").slideUp(100);
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		doc_s=false;
	}
});
$("#admin_left_nav_pat_btn").click(function(){
	if(pat_s==false){
		$("#admin_left_nav_doc").slideUp(100);
		$("#admin_left_nav_for").slideUp(100);
		$("#admin_left_nav_pat").slideDown(100);
		$("#c_admin_span_2").addClass("glyphicon-menu-down");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		pat_s=true;
	}
	else{
		$("#admin_left_nav_pat").slideUp(100);
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		pat_s=false;
	}
});

$("#admin_left_nav_for_btn").click(function(){
	if(for_s==false){
		$("#admin_left_nav_doc").slideUp(100);
		$("#admin_left_nav_pat").slideUp(100);
		$("#admin_left_nav_for").slideDown(100);
		$("#c_admin_span_3").addClass("glyphicon-menu-down");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		for_s=true;
	}
	else{
		$("#admin_left_nav_for").slideUp(100);
		$("#c_admin_span_2").removeClass("glyphicon-menu-down");
		$("#c_admin_span_2").addClass("glyphicon-menu-right");
		$("#c_admin_span_1").removeClass("glyphicon-menu-down");
		$("#c_admin_span_1").addClass("glyphicon-menu-right");
		$("#c_admin_span_3").removeClass("glyphicon-menu-down");
		$("#c_admin_span_3").addClass("glyphicon-menu-right");
		for_s=false;
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

//Forum Home pages
function load_for_page(para_1){
	$.ajax({
		url:'pat_admin/home_'+para_1+'.php',
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
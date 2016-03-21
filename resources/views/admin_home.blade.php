<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Native Phyisician Rating System</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/logo_ico.png"/>
    <!-- Style Sheets -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets_admin/css/spe_pro_admin_css.css" rel="stylesheet">
    <!-- Style Sheets End -->
</head>

<body class="c_body">

<!-- Admin Top Nav -->
<div class="container c_container c_no_padding" style="border-bottom:2px solid #0F7400">

    <div class="col-lg-12 c_no_padding">
        <div class="col-lg-9">
            <img src="assets_admin/img/logo.png" class="c_logo">
            <span style="color:#01A200;font-size:18px">Admin Panel</span>
        </div>
        <?php
            $admin_user = json_decode($_COOKIE['admin_user'],true);
        ?>
        <div class="col-lg-3 c_no_padding">
            <div class="c_admin_top_user">
                <ul class="c_top_ul">
                    <li style="margin-right:25px">
                        <a class="c_href" href="#">
                            <img class="c_user_top_logo" src="assets_admin/img/user_logo.png">
                            <span><?php echo $admin_user[0]['first_name']; ?></span>
                        </a>
                    </li>
                    <li>
                        <img class="c_user_top_logo" src="assets_admin/img/signout.png" style="width:33px">
                        <span style="color:#FFFFFF"><a class="c_href" href="admin_logout" id="sign_in_up_btn">Sign Out</a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<div class="container c_container c_no_padding">
    <div class="col-lg-3 c_no_padding c_admin_left_nav">
        <ul class="c_ul_1 c_admin_ul">
            <li ><ul class="c_top_ul" ><li><img src="assets_admin/img/dashboard.png" style="width:20px"></li><li style="margin-left:10px">
                        Dashboard
                    </li></ul>
            </li>
            <li id="admin_left_nav_doc_btn"><ul class="c_top_ul"><li><img src="assets_admin/img/doc_user.png" style="width:20px"></li><li style="margin-left:10px">
                        <span class="glyphicon glyphicon-menu-right c_right_gly" id="c_admin_span_1" aria-hidden="true"></span>
                        Doctor
                    </li></ul></li>
            <li id="admin_left_nav_doc" style="display:none;padding:0px">
                <ul class="c_admin_ul_in">
                    <li class="c_admin_ul_li c_admin_li_sel" onClick="load_doc_page('1')" style="padding-top: 20px"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Add Physician</li>
                    <li class="c_admin_ul_li" onClick="load_doc_page('2')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Update Physician</li>
                    <li class="c_admin_ul_li" onClick="load_doc_page('3')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Remove Physician</li>
                    <li class="c_admin_ul_li" onClick="load_doc_page('4')" style="padding-bottom: 20px"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Confirm Physician</li>
                </ul>
            </li>
            <li id="admin_left_nav_pat_btn"><ul class="c_top_ul"><li><img src="assets_admin/img/community_sm.png" style="width:20px"></li><li style="margin-left:10px">
                        <span class="glyphicon glyphicon-menu-right c_right_gly" id="c_admin_span_2" aria-hidden="true"></span>
                        Patient
                    </li></ul>
			</li>
            <li id="admin_left_nav_pat" style="display:none;padding:0px">
                <ul class="c_admin_ul_in">
                    <li class="c_admin_ul_li" onClick="load_users_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>View Users</li>
                    <li class="c_admin_ul_li" onClick="load_comments_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>User Comments</li>
                    <li class="c_admin_ul_li" onClick="load_inapuser_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Inapropriate Users</li>
                    <li class="c_admin_ul_li" onClick=""><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Report</li>
                </ul>
            </li>
            <li id="admin_left_nav_for_btn"><ul class="c_top_ul"><li><img src="assets_admin/img/forum_admin_icon.png" style="width:20px"></li><li style="margin-left:10px">
                        <span class="glyphicon glyphicon-menu-right c_right_gly" id="c_admin_span_3" aria-hidden="true"></span>
                        Forum
                    </li></ul></li>
            <li id="admin_left_nav_for" style="display:none;padding:0px">
                <ul class="c_admin_ul_in">
                    <li class="c_admin_ul_li" onClick="load_for_page('10.blade')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Questions</li>
                    <li class="c_admin_ul_li" onClick="load_for_page('11.blade')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Categories</li>
                    <li class="c_admin_ul_li" onClick="load_for_page('12.blade')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Flagged Answers</li>
                    <li class="c_admin_ul_li" onClick="load_for_page('14.blade')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Flagged Questions</li>
                    <li class="c_admin_ul_li" onClick="load_for_page('13.blade')"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Newsletter</li>
                </ul>
            </li>
			<li id="admin_left_nav_cus_btn"><ul class="c_top_ul"><li><img src="assets_admin/img/customize.png" style="width:20px"></li><li style="margin-left:10px">
                        <span class="glyphicon glyphicon-menu-right c_right_gly1" id="c_admin_span_3" aria-hidden="true"></span>
                       Customize Home
                    </li></ul></li>
            <li id="admin_left_nav_cus" style="display:none;padding:0px">
                <ul class="c_admin_ul_in">
                    <li class="c_admin_ul_li" onClick="load_cos_page1_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Manage Featured Doctors</li>
                    <li class="c_admin_ul_li" onClick="tip_update_via_ajax()"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> Manage Health tips</li>
                    <li class="c_admin_ul_li" onClick=""><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>custom_1</li>
                    <li class="c_admin_ul_li" onClick=""><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>custom_2</li>
                </ul>
            
      
            </li>
			
        </ul>
    </div>
    <div class="col-lg-9 c_no_padding" id="admin_home_div">
        <!-- Ajax Home Load Here -->
    </div>
</div>

<!-- Admin Top Nav -->

<!-- Admin Footer -->
<div class="container c_no_padding" style="border-top:2px solid #0F7400">
    <div class="col-lg-12 c_no_padding" id="c_footer">
        <div class="col-lg-2 c_no_padding">
            <img src="assets/img/logo.png" width="50px">
        </div>
        <div class="col-lg-8" style="color:#FFFFFF;font-size:12px;margin-top:9px;"><span style="margin-left:280px">&copy;&nbsp;Copyright 2016 eAyurveda.lk</span></div>
    </div>
</div>
<!-- Admin Footer -->


<!-- JavaScripts -->
<script src="assets/js/jquery-1.12.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets_admin/js/sep_pro_admin.js"></script>
<script>
    new WOW().init();
</script>
<!-- JavaScripts End -->

</body>
</html>
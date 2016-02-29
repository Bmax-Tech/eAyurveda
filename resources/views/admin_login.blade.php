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

<!-- Pop Up Boxes -->
<div class="container c_pop_up_box_1">
    <div class="center-block c_pop_box_1_wrapper">
        <form action="{{URL::to('admin_login_auth')}}" method="post">
            <div id="c_sign_in_box" >
                <ul class="c_ul_1">
                    <li class="c_add_margin_20">
                        <span class="c_font_2">Admin Sign In</span>
                    </li>
                    <li class="c_add_margin_20">
                        <input type="text" class="c_text_box_1 <?php if(isset($username_error)){ echo 'c_error_input_field_highlight'; }?>"  <?php if(isset($password_error)){?>value="<?php echo $pre_username; ?>" <?php } ?>  id="login_username" onkeypress="remove_highlight('login_username','c_error_input_field_highlight')" placeholder="username" name="username" autocomplete="off" spellcheck="false"/>
                    </li>
                    <li>
                        <input type="password" class="c_text_box_1 <?php if(isset($password_error)){ echo 'c_error_input_field_highlight'; } ?>" id="login_password" onkeypress="remove_highlight('login_password','c_error_input_field_highlight')" placeholder="password" name="password" autocomplete="off" spellcheck="false"/>
                    </li>
                    <li style="padding:0px 8px;margin-top:55px">
                        <button type="submit" class="c_button_1">Sign In</button>
                    </li>
                    <li style="text-align:center;margin-top:20px">
                        <span class="c_font_3" style="font-size:11px;color:#FFFFFF">&copy;&nbsp;Copyright 2016 e-Ayurveda.lk</span>
                    </li><strong></strong>
                </ul>
            </div>
        </form>
    </div>
</div>
<!-- Pop Up Boxes -->

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
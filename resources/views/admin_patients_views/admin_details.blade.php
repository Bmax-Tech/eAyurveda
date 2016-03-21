<div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
    Manage Admin
</div>


<div id="tabdiv" Style="height:200px">

    <div class="col-lg-12" style="padding:0px 32px 0px 15px">

        <div class="col-lg-3 customizeTableHead1" style=" border-top-left-radius:13px;">
            <b>Name</b>
        </div>
        <div class="col-lg-4 customizeTableHead1" >
            <b>Email</b>
        </div>

        <div class="col-lg-5 customizeTableHead1" style="border-top-right-radius:13px;">
            <b>Quick Actions </b>
        </div>
    </div>
    <div id="" class="col-lg-12" Style="height:284px;overflow-y: scroll">
        <table id="" class="col-lg-12 over tabledesign2" >
            <?php foreach($user as $admin) {?>
            <tr  class="admin_id_<?php echo $admin->id; ?> common" style="background-color:#fff;height:35px;border:1px solid #ddd;" >
                <td class="col-lg-3 "> <div style="width:110px; overflow:hidden;"><?php echo $admin->email; ?></div></td>
                <td class="col-lg-4" style="border-left: 1px solid #ddd;"> <div style="width:180px; overflow:hidden;"><?php echo $admin->aemail; ?></div></td>

                <td class="col-lg-1" style="border-left: 1px solid #ddd;"><button type="button" name="update"  class="c_pat_view_btn_tip" onClick="get_admin_id('<?php echo $admin->id;?>','<?php echo $admin->email; ?>' ,'<?php echo $admin->aemail;?>' )"><img src="assets_admin\img\Edit-52.png" height="20px">&nbsp&nbsp Update</button></td>

               <?php if($admin->mode == 1) {?>
                <td ><button type="button" name="delete"  class="c_pat_view_btn_tip" onclick="del_admin('<?php echo $admin->id;?>')" ><img src="assets_admin\img\Delete-52.png" height="20px">&nbsp&nbsp Block</button></td>
              <?php } else if($admin->mode == 0) {?>
                <td ><button type="button" name="delete"  class="c_pat_view_btn_tip" onclick="del_admin('<?php echo $admin->id;?>')" ><img src="assets_admin\img\Delete-52.png" height="20px">&nbsp&nbsp Access</button></td>

            <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </div>

    <input type="hidden" id="hidden_click_admin_id" value="0"/>
    <input type="hidden" id="hidden_click_admin_del_id" value="0"/>
    <input type="hidden" id="hidden_click_admin_up_status" value="false"/>
</div>



<div id="updateAdmin" class="container col-lg-12" style="display: none">


    <div class="col-lg-6" style="margin-left: -14px;">
        <div class="col-lg-6" style="margin-top: 7px">
            Username
        </div><span class="c_warning_admin_reg "style="margin-top: 7px" id="wrn_unameA"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Empty Username</span>
        <div id="ii" class="col-lg-12" style="margin-top: 5px">
            <input  onkeypress="remove_wrn('unameA')" onchange="remove_wrn('unameA')" id="unameA" class="c_text_box_1" name="unameA" type="text" autocomplete="off" spellcheck="false" readonly>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="col-lg-6" style="margin-top: 7px">
            Email
        </div><span class="c_warning_admin_reg" style="margin-top: 7px" id="wrn_email"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Invalid email</span>
        <div class="col-lg-12" style="margin-top: 5px">
            <input onkeyup="check_reg_existing('email',this.value)" onkeypress="remove_wrn('email')" onchange="remove_wrn('email')" id="email" class="c_text_box_1"  name="email" type="text" autocomplete="off" spellcheck="false">
        </div>
    </div>

    <div class="col-lg-6" style="margin-left: -14px;">
    <div class="col-lg-6" style="margin-top: 12px">
        Password
    </div><span class="c_warning_admin_reg"  id="wrn_pwrd" style="margin-top: 12px"><span class="glyphicon glyphicon-asterisk" aria-hidden="true" ></span> Invalid password</span>
    <div class="col-lg-12" style="margin-top: 5px">
        <input  onkeypress="remove_wrn('pwrd')" onchange="remove_wrn('pwrd')" id="pwrd" class="c_text_box_1"  name="pwrd" type="password" autocomplete="off" spellcheck="false">
    </div>
    </div>

    <div class="col-lg-6">
        <div class="col-lg-6" style="margin-top: 12px">
            Confirm Password
        </div><span class="c_warning_admin_reg" style="margin-top: 12px" id="wrn_con_pwrd"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Invalid Confirm password</span>
        <div class="col-lg-12" style="margin-top: 5px">
            <input  onkeypress="remove_wrn('con_pwrd')" onchange="remove_wrn('con_pwrd')" id="con_pwrd" class="c_text_box_1"  name="con_pwrd" type="password" autocomplete="off" spellcheck="false">
        </div>
    </div>
    <div class="col-lg-12" style="margin-top: 20px">
        <div  style="margin-left: 523px">
            
            <button type="button" onclick="admin_load_via_ajax()" class="c_pat_view_btn" style="width:100px"><img src="assets_admin\img\Refresh-52.png" height="15px"> Refresh</button>
            <button type="button" onclick="confirm_admin_update()" class="c_pat_view_btn" ><img src="assets_admin\img\Add-48.png" height="15px">Add</button>
        </div>
    </div>

</div>



<div id="adminpoup" class="container pat_success1_box" >

    <div class="center-block pat_success1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
        <button  class="pat_close_btn" onclick="admin_pop_close()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
        <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

            <div class="container c_no_padding col-lg-12">
                {{--  <div class="col-lg-4 c_no_padding" style="float: left;margin-left: 27px"><h1>Confirm</h1></div>--}}
                <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                    <ul class="c_ul_1">
                        <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Update </span></li>

                        <li> <div style="padding-top: 30px">
                                <div class="col-lg-3 ">
                                    <button class="pat_view_btn_1" onclick="updateAdmin()" >Confirm</button>
                                </div>
                                <div class="col-lg-3" style="margin-left: 100px">
                                    <button class="pat_view_btn_1" onclick="admin_pop_close()" >Cancel</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>



<div id="adminpopup1" class="container pat_success1_box" >

    <div class="center-block pat_success1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
        <button  class="pat_close_btn" onclick="admin_pop_close1()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
        <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

            <div class="container c_no_padding col-lg-12">
                {{--  <div class="col-lg-4 c_no_padding" style="float: left;margin-left: 27px"><h1>Confirm</h1></div>--}}
                <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                    <ul class="c_ul_1">
                        <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Delete </span></li>

                        <li> <div style="padding-top: 30px">
                                <div class="col-lg-3 ">
                                    <button class="pat_view_btn_1" onclick="del_admin_1()" >Confirm</button>
                                </div>
                                <div class="col-lg-3" style="margin-left: 100px">
                                    <button class="pat_view_btn_1" onclick="admin_pop_close1()" >Cancel</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
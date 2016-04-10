<div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
    Therapies
</div>


<div class=" col-lg-12 c_no_padding" style="width:920px;margin-left:10px">
</div>



<div id="tabdiv" Style="height:200px">

    <div class="col-lg-12" style="padding:0px 32px 0px 15px">

        <div class="col-lg-2 customizeTableHead1" style=" border-top-left-radius:13px;">
            <b>Name</b>
        </div>
        <div class="col-lg-6 customizeTableHead1" >
            <b>Description</b>
        </div>
        <div class="col-lg-4 customizeTableHead1" style="border-top-right-radius:13px;">
            <b>Quick Actions </b>
        </div>
    </div>
    <div id="" class="col-lg-12" Style="height:184px;overflow-y: scroll">
        <table id="" class="col-lg-12 over tabledesign2" >
            <?php for($i=1;$i<5;$i++) {?>
            <tr  class="tipid_<?php echo "sdfadf"; ?> common" style="background-color:#fff;height:35px;border:1px solid #ddd;" >
                <td class="col-lg-2 "> <div style="height:25px;max-height:25px;width:110px; overflow:hidden;"><?php echo "sdfadf"; ?></div></td>
                <td class="col-lg-6 " style="border-left: 1px solid #ddd;"> <div style="height:25px;max-height:25px;width:180px; overflow:hidden;"><?php echo "sdfadf"; ?></div></td>
                <td class="col-lg-1" style="border-left: 1px solid #ddd;"><button type="button" name="update" onclick="get_tip_id('<?php echo "sdfadf";?>','<?php echo "sdfadf"; ?>' ,'<?php echo "sdfadf";?>','<?php echo "sdfadf"; ?>' )" class="c_pat_view_btn_tip" ><img src="assets_admin\img\Edit-52.png" height="20px">&nbsp&nbsp Update</button></td>
                <td ><button type="button" name="delete" onclick="del_tip('<?php echo "sdfadf";?>')" class="c_pat_view_btn_tip" ><img src="assets_admin\img\Delete-52.png" height="20px">&nbsp&nbsp Delete</button></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <input type="hidden" id="hidden_click_tip_id" value="0"/>
    <input type="hidden" id="hidden_click_tip_del_id" value="0"/>
    <input type="hidden" id="hidden_click_tip_up_status" value="false"/>
</div>

<div class="container col-lg-12" style="margin-top:30px">


    <div class="col-lg-6" style="margin-left: -14px;">
        <div class="col-lg-6" style="margin-top: 7px">
            Name
        </div><span class="c_warning_tips_reg " id="wrn_tname1"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Empty Therapy Name</span>
        <div id="ii" class="col-lg-12" style="margin-top: 5px">
            <input  onkeypress="remove_wrn('tname1')" onchange="remove_wrn('tname1')" id="tname1" class="c_text_box_1" name="tname1" type="text" maxlength="100"autocomplete="off" spellcheck="false">
        </div>
    </div>
    <div class="col-lg-2 col-lg-offset-4">
        <div style="padding: 10px;padding-left: 20px">
            <div id="profile_thumb" style="background-image: url({{ URL::asset('profile_images/user_images/user_profile_img_16.png') }});height: 40px;width: 100%;background-size: 100%;background-position: center;background-repeat: no-repeat;background-color: rgba(42, 167, 0, 0.36)">
            </div>
            <input class="file_input" type="file" data-id="profile_thumb" data-icon="{{ URL::asset('') }}" id="h_profile_thumb" name="profile_img[]" style="display:none"/>
            <div><button class="c_img_upload_btn_admin" onclick="get_image('profile_thumb','h_profile_thumb')" type="button" style="font-size: 8px">Change Image</button></div>
        </div>
    </div>
    <div class="col-lg-12" style="margin-top: 12px">
        Description
    <span class="c_warning_tips_reg" id="wrn_tdes1" style="margin-top: 12px;margin-left: 600px"><span class="glyphicon glyphicon-asterisk" aria-hidden="true" ></span> Empty Description</span>
    </div>
    <div class="col-lg-12" style="margin-top: 5px">
        <textarea   id="tdes1" class="pat_admin_text_area1" name="tdes1"  style="width:830px;" maxlength="280"  onkeypress="remove_wrn('tdes1')" onchange="remove_wrn('tdes1')"></textarea>
    </div>

    <div class="col-lg-12" style="margin-top: 20px">
        <div  style="margin-left: 420px">
            <button type="button" onclick="therapyLoad()" class="c_pat_view_btn" style="width:100px"><img src="assets_admin\img\Refresh-52.png" height="15px">&nbsp&nbsp Refresh</button>
            <button type="button" onclick="confirm_addTherapy()" class="c_pat_view_btn" ><img src="assets_admin\img\Add-48.png" height="15px">&nbsp&nbsp Add</button>

        </div>
    </div>

</div>


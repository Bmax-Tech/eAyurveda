<div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
    Therapies
</div>


<div class=" col-lg-12 c_no_padding" style="width:920px;margin-left:10px">
</div>



<div id="tabdiv" Style="height:200px">

    <div class="col-lg-12" style="padding:0px 32px 0px 15px">

        <div class="col-lg-2 customizeTableHead1" style=" border-top-left-radius:13px;">
            <b>Topic</b>
        </div>
        <div class="col-lg-5 customizeTableHead1" >
            <b>Description</b>
        </div>
        <div class="col-lg-1 customizeTableHead1" >
            <b>Image</b>
        </div>
        <div class="col-lg-4 customizeTableHead1" style="border-top-right-radius:13px;">
            <b>Quick Actions </b>
        </div>
    </div>
    <div id="" class="col-lg-12" Style="height:184px;overflow-y: scroll">
        <table id="" class="col-lg-12 over tabledesign2" >
            <?php foreach($therapy as $ob) {?>
            <?php $img = $ob->image_path; ?>
            <tr  class="therapyid_<?php echo $ob->id; ?> commonT" style="background-color:#fff;height:35px;border:1px solid #ddd;" >
                <td class="col-lg-2 "> <div style="height:25px;max-height:25px;width:109px; overflow:hidden;"><?php echo $ob->name; ?></div></td>
                <td class="col-lg-5 " style="border-left: 1px solid #ddd;"> <div style="max-height:25px;width:330px; overflow:hidden;"><?php echo $ob->description; ?></div></td>
                <td class="col-lg-1 " style="border-left: 1px solid #ddd;"> <div style="max-height:25px; overflow:hidden;"> <img style="height: 30px;width:42px;" src="{{ URL::asset($img) }}" ></div></td>
                <td class="col-lg-1" style="border-left: 1px solid #ddd;"><button type="button" name="update" onclick="updateTherapy('<?php echo $ob->id;?>','<?php echo $ob->name;; ?>' ,'<?php echo $ob->description;?>','<?php echo $ob->image_path; ?>' )" class="c_pat_view_btn_tip" ><img src="assets_admin\img\Edit-52.png" height="20px">&nbsp&nbsp Update</button></td>
                <td ><button type="button" name="delete" onclick="delTherapy('<?php echo $ob->id;;?>')" class="c_pat_view_btn_tip" ><img src="assets_admin\img\Delete-52.png" height="20px">&nbsp&nbsp Remove</button></td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <input type="hidden" id="hidden_click_therapy_id" name="hidden_click_therapy_id" value="0"/>
    <input type="hidden" id="hidden_click_therapy_del_id" name="hidden_click_therapy_del_id" value="0"/>
    <input type="hidden" id="hidden_click_therapy_up_status" name="hidden_click_therapy_up_status" value="false"/>


</div>

<div class="container col-lg-12" style="margin-top:20px">

<form action="" enctype="multipart/form-data" id="therapies_form">
   <div class="col-lg-7">
            <div class="col-lg-12" style="margin-left: -14px;">
                <div class="col-lg-12" style="margin-top: 7px">
                   Topic
               <span class="c_warning_tips_reg " id="wrn_tname1" style="margin-left: 200px"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Empty Therapy Name</span>
                </div>
                    <div id="ii" class="col-lg-12" style="margin-top: 5px">
                    <input  onkeypress="remove_wrn('tname1')" onchange="remove_wrn('tname1')" id="tname1" class="c_text_box_1" name="tname1" type="text" maxlength="100"autocomplete="off" spellcheck="false">
                </div>
            </div>

            <div class="col-lg-12" style="margin-top: 12px">
                Description
            <span class="c_warning_tips_reg" id="wrn_tdes1" style="margin-top: 12px;margin-left: 168px"><span class="glyphicon glyphicon-asterisk" aria-hidden="true" ></span> Empty Description</span>
            </div>
            <div class="col-lg-12" style="margin-top: 5px;clear:both">
                <textarea   id="tdes1" class="pat_admin_text_area1" name="tdes1"  style="width:830px;height:120px " maxlength="280"  onkeypress="remove_wrn('tdes1')" onchange="remove_wrn('tdes1')"></textarea>
            </div>
   </div>
    <div class="col-lg-3 col-lg-offset-2" style="margin-top: 5px">
        <span class="c_warning_tips_reg" id="wrn_profile_thumb" style="margin-top: 12px;margin-left: 3px"><span class="glyphicon glyphicon-asterisk" aria-hidden="true" ></span> Select Image</span>

        <div style="padding: 10px;padding-left: 20px">


            <div  style="height: 100px;width: 100%;background-color: rgba(42, 167, 0, 0.36)">
                <img src="" id="profile_thumb" style="height: 98%;width: 98%;" />
            </div>
            <input class="file_input" type="file" data-id="profile_thumb" data-icon="{{ URL::asset('') }}" id="h_profile_thumb" name="profile_img[]" style="display:none"/>
            <div><button class="c_img_upload_btn_admin" onclick="get_image('profile_thumb','h_profile_thumb')" type="button" style="font-size: 8px">Change Image</button></div>
        </div>


    </div>
    <div class="col-lg-12" style="margin-top: 20px">
        <div  style="margin-left: 540px">
            <button type="button" onclick="therapyLoad()" class="c_pat_view_btn" style="width:100px"><img src="assets_admin\img\Refresh-52.png" height="15px">&nbsp&nbsp Refresh</button>
            <button type="button" onclick="addTherapy()" class="c_pat_view_btn" ><img src="assets_admin\img\Add-48.png" height="15px">&nbsp&nbsp Save</button>

        </div>
    </div>
</form>
</div>


<div id="therapySavePopup" class="container pat_confirm1_box" >
    <div class="center-block pat_success1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
        <button  class="pat_close_btn" onclick="therapySaveClose()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
        <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

            <div class="container c_no_padding col-lg-12">
                <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                    <ul class="c_ul_1">
                        <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Save </span></li>

                        <li> <div style="padding-top: 30px">
                                <div class="col-lg-3 ">
                                    <button class="pat_view_btn_1" onclick="confirm_addTherapy()" >Confirm</button>
                                </div>
                                <div class="col-lg-3" style="margin-left: 100px">
                                    <button class="pat_view_btn_1" onclick="therapySaveClose()" >Cancel</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="therapyDeletePopup" class="container pat_confirm1_box" >
    <div class="center-block pat_success1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
        <button  class="pat_close_btn" onclick="therapyDeleteClose()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
        <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

            <div class="container c_no_padding col-lg-12">
                <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                    <ul class="c_ul_1">
                        <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Remove </span></li>

                        <li> <div style="padding-top: 30px">
                                <div class="col-lg-3 ">
                                    <button class="pat_view_btn_1" onclick="confirmDeleteTherapy()" >Confirm</button>
                                </div>
                                <div class="col-lg-3" style="margin-left: 100px">
                                    <button class="pat_view_btn_1" onclick="therapyDeleteClose()" >Cancel</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
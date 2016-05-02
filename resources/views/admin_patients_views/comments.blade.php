<?php

foreach($comment as $com) {
?>
<div class=" c_pat_result_div" style="float:left;margin-left: 10px;width:420px ">
            <div class="col-lg-12 c_no_padding"  style="padding-left: 5px">
                    <div  style="float:left;height:61px;width:61px;border-radius: 40px;background-color: white;margin-left:-7px;margin-top:-11px">
                           <img style="height:55px;width:55px;border-radius: 40px;margin-left:3px;margin-top:3px" src="{{ URL::asset($com->image_path1) }}" >
                    </div>
                    <div style="float:left;margin-left: 5px">
                        <div style="color: #0F7400;font-size: 13px;padding:5px 0px;font-weight: 500">
                            <?php echo $com->pfirst_name." ".$com->plast_name; ?>
                        </div>
                        <div style="padding: 2px 0px;font-size: 10px;color: #3c3c3c">
                            Commented Profile :&nbsp;&nbsp;&nbsp; <?php echo $com->dfirst_name." ".$com->dlast_name; ?>
                        </div>
                    </div>
                    <div style="padding: 8px 0px;clear:both">
                        <hr class="c_hr_1"/>
                    </div>

            </div>

            <div style="clear:both">
                <div style="color: #075325;font-size: 10px;height:55px;overflow-y: scroll;max-width:390px;margin-left: 5px ">
                    <?php echo $com->comment; ?>
                </div>
            </div>
            <div class="col-lg-12"style="clear:both;margin-top: 10px;padding: 2px 0px;">
                    <div class="col-lg-6 ">
                        <button  class="c_pat_view_btn_com" onclick="user_view('<?php echo $com->puser_id; ?>')">View Profile</button>
                    </div>
                    <div style="float:left;margin-left: 5px">
                        <button class="c_pat_view_btn_com" style="width:150px" onclick="comment_pass_remove('<?php echo $com->cid; ?>')">Remove Comment</button>
                    </div>
             </div>
</div>
<?php } ?>
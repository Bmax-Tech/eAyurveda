<div id="coments12" class="container" style="background-color:#CCC;width:920px">
    <ul class="c_ul_1">

        <li>
            <div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">

                User Comments
            </div>

        </li>
        <li >
<?php

                foreach($comment as $com) {
                
              ?> <div class="col-lg-12 c_pat_result_div">
              <div class="col-lg-10 c_no_padding"  style="padding-left: 10px">
                        <div style="color: #0F7400;font-size: 18px;padding:5px 0px;font-weight: 500">
                           <?php echo $com->pfirst_name." ".$com->plast_name; ?>
                        </div>
                        <div style="padding: 5px 0px;font-size: 13px;color: #3c3c3c">
                            Commented Profile :&nbsp;&nbsp;&nbsp; <?php echo $com->dfirst_name." ".$com->dlast_name; ?>
                        </div>
                        <div style="padding: 10px 0px">
                            <hr class="c_hr_1"/>
                        </div>
                        <div style="color: #075325;font-size: 13px">
                            <?php echo $com->comment; ?>
                        </div>
                    </div>
                    <div class="col-lg-2" style="padding-left: 25px">
                        
                        <div style="padding-top: 2px">
                            
                        </div>
                        <div  class="col-lg-6">
                            <div  style="float:left;height:81px;width:81px;border-radius: 40px;background-color: white;margin-left:-7px;margin-top:-6px">
                                <img style="height:75px;width:75px;border-radius: 40px;margin-left:3px;margin-top:3px" src="{{ URL::asset($com->image_path1) }}" >
                            </div>

                        </div>
                        
                        
                    </div>
                    <div style="clear:both">
                    </div>
                    <div class="col-lg-offset-2"style="clear:both;margin-top: 10px">
                         <div class="col-lg-4 col-lg-offset-4">
                           <button class="c_pat_view_btn" onclick="user_view('<?php echo $com->puser_id; ?>')">View Profile</button>
                        </div>
                        <div class="col-lg-4">
                            <button class="c_pat_view_btn" onclick="comment_pass_remove('<?php echo $com->cid; ?>')">Remove Comment</button>
                        </div>


                   </div>
                </div><?php
                
            
                }?>
        </li>

    </ul>




    <input type="hidden" id="hidden_click_com_id" value="0"/>

</div>


<div id="featuredpoup" class="container pat_confirm1_box" >

    <div class="center-block pat_confirm1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
        <button  class="pat_close_btn" onclick="feature_pop_close()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
        <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

            <div class="container c_no_padding col-lg-12">
                <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                    <ul class="c_ul_1">
                        <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Remove </span></li>

                        <li> <div style="padding-top: 30px">
                                <div class="col-lg-3 ">
                                    <button class="pat_view_btn_1" onclick="rem_com()" >Confirm</button>
                                </div>
                                <div class="col-lg-3" style="margin-left: 100px">
                                    <button class="pat_view_btn_1" onclick="feature_pop_close()" >Cancel</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>


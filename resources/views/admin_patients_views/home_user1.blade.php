




 <div id="user_det"class="container" style="background-color:#CCC;width:920px">
        <ul class="c_ul_1">
            <li>
               <div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
                
                    Profile             
                </div>
              
            </li>
            <li style="padding: 20px">
                <div class="col-lg-12 c_pat_result_div" >
                   
                    <div class="col-lg-12 c_no_padding" style="padding-left: 10px">
                        
                        <div style="padding:15px 0px;margin-left: 30px;font-size:16px;">
                           <div style="margin-left: 10px">
                              <div  style="float:left;height:71px;width:71px;border-radius: 50px;background-color: white;margin-left:-14px;margin-top:2px">
                                  <?php

                                  if($patient->image_path == ""){
                                      $img = "profile_images/default_user_icon.png";
                                  }else{
                                      $img = $patient->image_path;
                                  }
                                  ?>
                                  <div >
                                      <img style="height:65px;width:65px;border-radius: 50px;margin-left:3px;margin-top:3px" src="{{ URL::asset($img) }}"  >
                                  </div>
                              </div>
                            </div>
                            <div style="margin-left: 100px">
                              <ul class="c_ul_1">
                                <li style="color: #0F7400;font-weight: 500;font-size: 30px;"><?php echo $patient->first_name." ".$patient->last_name;?></li>
                                 <li>Email &nbsp:&nbsp  <?php echo $patient->email;?></li>
                              </ul>
                            </div>
                         </div>
                        
                         <div style="padding: 10px 0px">
                            <hr class="c_hr_1"/>
                         </div>

                         <div class="col-lg-12 " style="margin-top:20px;padding-left: 100px">
                           <div class="col-lg-4  " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                               <ul>
                                   <li>
                                        User Name
                                   </li>
                               </ul>
                         </div>
                         <div class="col-lg-6 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             : &nbsp <?php echo $patient->username;?>
                         </div>
                          <div class="col-lg-4 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <ul><li>
                                     Birthday
                             </li></ul> 
                         </div>
                          <div class="col-lg-6 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                              : &nbsp <?php echo $patient->dob;?>
                         </div>
                          <div class="col-lg-4 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <ul><li>
                                   Gender
                             </li></ul> 
                         </div>
                         <div class="col-lg-6  " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             : &nbsp <?php echo $patient->gender;?>
                         </div>
                          <div class="col-lg-4 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <ul><li>
                                   NIC
                             </li></ul> 
                         </div>
                         <div class="col-lg-6 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             : &nbsp <?php echo $patient->nic;?>
                         </div>
                          <div class="col-lg-4 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <ul>
                                 <li>
                                   Contact Number
                                 </li>
                             </ul>
                         </div>
                         <div class="col-lg-6 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             : &nbsp <?php echo $patient->contact_number;?>
                         </div>

                          <div class="col-lg-4 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <ul><li>
                                     Register Date
                             </li></ul> 
                         </div>
                         <div class="col-lg-6 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             : &nbsp <?php echo date('Y:m:d', strtotime($patient->reg_date));?>
                         </div>
                        </div>
                    </div>
                    <div class="col-lg-2" style="padding-left: 25px">
                        
                        <div style="padding-top: 2px">
                            
                        </div>


                        
                        
                    </div>
                    <div style="clear:both">
                    </div>
                    <div class=""style="clear:both;margin-top: 50px;margin-left: 530px;height: 60px;">
                         <div class="col-lg-5">
                             <input onclick="blockConfirmPopupshow()" style="background-color: #B0BAB2;vertical-align:bottom;overflow:visible; font-size:16px; display:inline;  margin:0; padding:0; border:0; border-bottom:1px solid #3C3C3C; color:#3C3C3C; cursor:pointer;" name="Block User" type="button" value="Deactivate Account">

                        </div>
                        
                   </div>
                </div>
            </li>
            
        </ul>



        
 
    </div>
 {{--confirm pop up massage--}}
 <div id="blockConfirmPopup" class="container pat_success1_box" >

     <div class="center-block pat_success1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px;height: 250px">
         <button  class="pat_close_btn" onclick="blockConfirmPopupClose()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
         <div style="background: #4CBC5B;height: 230px;padding-top: 32px">

             <div class="container c_no_padding col-lg-12">
                 <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                     <ul class="c_ul_1">
                         <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Deactivate </span></li>
                         <li style=" margin-top: 20px;">
                             <span style="font-size:16px;font-weight:bold;color: black">Reason to Deactivate </span><span class="c_warning_tips_reg" id="wrn_reason">Fill Reason</span></li>
                          <li><input type="password" class="c_text_box_1 " spellcheck="false" name="reason" id="reason" onkeypress="remove_wrn('reason')" onchange="remove_wrn('reason')" autocomplete="off"/></li>
                         <li> <div style="padding-top: 30px">
                                 <div class="col-lg-3 ">
                                     <button class="pat_view_btn_1" onclick=" user_rem( <?php echo $patient->user_id;?>)" >Confirm</button>
                                 </div>
                                 <div class="col-lg-3" style="margin-left: 100px">
                                     <button class="pat_view_btn_1" onclick="blockConfirmPopupClose()" >Cancel</button>
                                 </div>
                             </div>
                         </li>
                     </ul>
                 </div>
             </div>

         </div>
     </div>
 </div>

 <!-- Thanking Messages -->
 <div class="container c_pop_up_box_thank1" id="c_blocking_msg" style="display: none">
     <div class="center-block c_pop_box_1_wrapper" style="margin-right:55%;margin-top: 20%;width: 412px">
         <div style="background: #DAA100;height: 145px;padding-top: 32px">

             <div class="container c_no_padding col-lg-12">
                 <div class="col-lg-4 c_no_padding" style="float: left;margin-left: 27px"><img src="{{ URL::asset('assets/img/thanking.png') }}" style="width: 80px"></div>
                 <div class="col-lg-8 c_no_padding" style="margin-top: -75px;margin-left: 114px">
                     <ul class="c_ul_1">
                         <li><span style="font-size: 27px;font-weight: 100;margin-left: 30px;color: #FFF">successfully</span></li>
                         <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Deactivated</span></li>
                     </ul>
                 </div>
             </div>

         </div>
     </div>
 </div>




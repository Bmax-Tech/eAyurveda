




 <div id="user_det"class="container" style="background-color:#CCC;width:920px">
        <ul class="c_ul_1">
            <li>
               <div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
                
                    Profile             
                </div>
              
            </li>
            <li><div class="col-lg-12 c_pat_result_div">
                   
                    <div class="col-lg-10 c_no_padding" style="padding-left: 10px">
                        
                        <div style="padding:5px 0px">
                          <ul class="c_ul_1">
                            <li style="color: #0F7400;font-weight: 500;font-size: 30px;"><?php echo $patient->first_name." ".$patient->last_name;?></li>
                              <li>Email &nbsp:&nbsp  <?php echo $patient->email;?></li>
                           </ul>
                        </div>
                        
                         <div style="padding: 10px 0px">
                            <hr class="c_hr_1"/>
                        </div>
                        <div class="col-lg-12 " style="margin-top:20px">
                          <div class="col-lg-3  " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">               <ul><li>
                             User Name
                   </li></ul>   
                         </div>
                         <div class="col-lg-6 col-lg-offset-1" style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <?php echo $patient->username;?>
                         </div>
                          <div class="col-lg-3 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <ul><li>
                             Birthday
                             </li></ul> 
                         </div>
                         <div class="col-lg-6 col-lg-offset-1" style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <?php echo $patient->dob;?>
                         </div>
                          <div class="col-lg-3 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <ul><li>
                             Gender
                             </li></ul> 
                         </div>
                         <div class="col-lg-6   col-lg-offset-1" style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                              <?php echo $patient->gender;?>
                         </div>
                          <div class="col-lg-3 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <ul><li>
                             NIC
                             </li></ul> 
                         </div>
                         <div class="col-lg-6 col-lg-offset-1" style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <?php echo $patient->nic;?>
                         </div>
                          <div class="col-lg-3 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <ul><li>
                             Contact NO
                             </li></ul> 
                         </div>
                         <div class="col-lg-6 col-lg-offset-1" style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <?php echo $patient->contact_number;?>
                         </div>

                          <div class="col-lg-3 " style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <ul><li>
                             Register Date
                             </li></ul> 
                         </div>
                         <div class="col-lg-6 col-lg-offset-1" style="padding: 5px 0px;font-size: 20px;color: #3c3c3c;font-weight: 500">
                             <?php echo date('Y:m:d', strtotime($patient->reg_date));?>
                         </div>
                        </div>
                    </div>
                    <div class="col-lg-2" style="padding-left: 25px">
                        
                        <div style="padding-top: 2px">
                            
                        </div>
                        <div  style="float:left;height:81px;width:81px;border-radius: 60px;background-color: white;margin-left:-14px;margin-top:2px">
                              <?php

                            if($patient->image_path == ""){
                                 $img = "profile_images/default_user_icon.png";
                             }else{
                                 $img = $patient->image_path;
                             }
                             ?>
                                  <div >
                                      <img style="height:75px;width:75px;border-radius: 60px;margin-left:3px;margin-top:2px" src="{{ URL::asset($img) }}"  >
                                  </div>
                            </div>

                        
                        
                    </div>
                    <div style="clear:both">
                    </div>
                    <div class="col-lg-offset-8"style="clear:both;margin-top: 10px">
                         <div class="col-lg-4">
                           <button class="c_pat_view_btn" onclick="user_rem( <?php echo $patient->user_id;?>)">Block User</button>
                        </div>
                        
                   </div>
                </div> </li>
            
        </ul>
        
        
        
 
    </div>




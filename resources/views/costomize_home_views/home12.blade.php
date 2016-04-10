



<div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
    Featured Doctors
</div>
                       <div width="100%" style="padding: 5px" >



                           <div id="filviv"  style="width:100%">
                            <table class="col-lg-12"><tr><td style="width:300px">
                               <div class="" style="width:250px" >
                                   <div  >
                                       <ul>
                                           <li>
                                                Rating
                                           </li>
                                       </ul>
                                   </div>
                                   <div class="col-lg-8 col-lg-offset-1">
                                       <select class="c_select_box_1"  id="rate">
                                           <option value="all">Select</option>
                                           <option value="1">1</option>
                                           <option value="2">2</option>
                                           <option value="3">3</option>
                                           <option value="4">4</option>
                                           <option value="5">5</option>
                                       </select>
                                   </div>
                               </div>
                                    </td>
                                    <td style="width:300px">
                               <div class="" style="width:250px">
                                   <div  style="">
                                       <ul>
                                           <li>
                                               Spcialization
                                           </li>
                                       </ul>
                                   </div>
                                   <div class="col-lg-8 col-lg-offset-1" >
                                       <select class="c_select_box_1" id="spec1" >
                                           <option value="all">Select</option>
                                           <?php
                                           foreach($filter_spec as $spec){?>
                                           <option value="<?php echo $spec->spec_1; ?>"><?php echo $spec->spec_1; ?></option>
                                           <?php  }

                                           ?>
                                       </select>
                                   </div>
                               </div>
                                    </td>
                                    <td style="width:300px">
                               <div class="" style="width:250px">
                                   <div  style="margin-left:10px">
                                       <ul>
                                           <li>
                                               treatments
                                           </li>
                                       </ul>
                                   </div>
                                   <div class="col-lg-8 col-lg-offset-1">
                                       <select class="c_select_box_1" id="treat1">
                                           <option value="all">Select</option>
                                           <?php
                                           foreach($filter_treat as $treat){?>
                                           <option value="<?php echo $treat->treat_1; ?>"><?php echo $treat->treat_1; ?></option>
                                           <?php  }

                                           ?>
                                       </select>
                                   </div>
                               </div>

                                    </td>
                                    <td class="col-lg-2">
                               <div class="" style="margin-top:28px">

                                   <div class="col-lg-1 col-lg-offset-1">
                                       <button class="c_pat_view_btn3"  onclick="getrate()">Filter</button>
                                   </div>
                               </div>
                                </tr>
                            </table>
                           </div>


                           <div id="tabdiv" Style="height:250px;margin-top:20px">
                               <div class="col-lg-12"  style="padding:20px 32px 0px 15px;">
                                   <div class="col-lg-4 customizeTableHead"  style=" border-top-left-radius:13px;border-left: 1px solid #ddd">
                                       <b>Doctor Name</b>
                                   </div>
                                   <div class="col-lg-4 customizeTableHead">
                                       <b>Rating</b>
                                   </div>
                                   <div class="col-lg-4 customizeTableHead" style="border-top-right-radius:13px;">
                                       <b> City</b>
                                   </div>
                               </div>
                               <div id="maybe" class="col-lg-12" Style="height:200px;overflow-y: scroll">
                               <table id="kawa" class="col-lg-12  tabledesign1">



                                   <?php foreach($reg_doctor as $reg) {?>

                                   <tr  class="trid_<?php echo $reg->user_id; ?> common" style="background-color:#fff;height:35px;border:1px solid #ddd;" onclick="getdocid('<?php echo $reg->user_id; ?>')">
                                       <td class="col-lg-4"><?php echo $reg->first_name; ?></td>
                                       <td class="col-lg-4" style="border-left: 1px solid #ddd;"><?php echo $reg->rating; ?></td>
                                       <td class="col-lg-4" style="border-left: 1px solid #ddd;"><?php echo $reg->city; ?></td>
                                   </tr>
                                   <?php } ?>
                               </table>
                               </div>
                           </div>
                            <input type="hidden" id="hidden_click_id" value="0"/>





                       <div class=" col-lg-12 c_no_padding" style="width:880px;margin-left:10px;margin-top:50px">
                        <ul class="c_top_ul">
                            <?php

                                $count=1;
                                foreach($featured_doc1 as $f_ob)
                                {
                                $check = $count%2;
                            ?>
                              <li class="col-lg-3" style="margin-top:10px " onmouseover="load_cos_page12('change_<?php echo $count; ?>')" onmouseout="load_cos_page123('change_<?php echo $count; ?>')">
							   <div class="pat_doc_box col-lg-12 " onclick="feat_addno('<?php echo $count;?>')"  >
								   <ul class="c_ul_1 " style="width:180px" >
								   <li style="width:100%"><div align="center"><img src="assets/img/community.png" width="70px"></div></li>
								   <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center">User ID    :<?php echo $f_ob->did; ?></div></li>
								   <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center">First Name : <?php echo $f_ob->first_name; ?></div></li>
								   <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px">email  :<?php echo $f_ob->email; ?></div></li>

								   </ul>
                                    <div class="change_<?php echo $count; ?>"  style="width:100%;display:none;margin-top:15px;"><div class="c_font_5" style="text-align:center;font-size:13px;background-color:green;">change</div></div>
								</div>
                              </li>
                            <?php
                                    $count++;
                                }
                            ?>
                          {{--      <li class="col-lg-3" style="margin-top:10px  ">
                                    <div class="pat_doc_box col-lg-12 "   >
                                        <ul class="c_ul_1 " style="width:180px;height:100px" >

                                        </ul>

                                    </div>
                                </li>--}}

                       </ul>
                      </div>

                           <input type="hidden" id="hidden_click_count" value="0"/>
                           <input type="hidden" id="hidden_click_id11" value="0"/>

                          <div id="featuredpoup" class="container pat_confirm1_box" >

                              <div class="center-block pat_confirm1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
                                  <button  class="pat_close_btn" onclick="feature_pop_close()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
                                  <div style="background: #4CBC5B;height: 145px;padding-top: 32px">
                                      <div class="container c_no_padding col-lg-12">
                                          <div class="col-lg-10 c_no_padding" style="margin-left: 30px">
                                              <ul class="c_ul_1">
                                                  <li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm The Update </span></li>

                                                  <li> <div style="padding-top: 30px">
                                                          <div class="col-lg-3 ">
                                                               <button class="pat_view_btn_1" onclick="updatefet()" >Confirm</button>
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


                      

                      

</div>

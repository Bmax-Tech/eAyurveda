



<div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
    Featured Doctors
</div>
                       <div width="100%" style="padding: 5px" >

                           <div class="col-lg-12" id="fdiv">
                               <button class="c_pat_view_btn " onclick="filvis()" >Filter</button>
                           </div>




                           <div id="tabdiv" Style="height:250px;margin-top:20px">
                               <div class="col-lg-12"  style="padding:20px 32px 0px 15px;">
                                   <div class="col-lg-4 customizeTableHead"  style=" border-top-left-radius:3px;border-top: 1px solid #ddd;box-shadow:  0 2px 0 rgba(0, 0, 0, .1), 0 2px 3px rgba(0, 0, 0, .25);border-left: 1px solid #ddd;border-right:1px solid #ddd;text-align:center">
                                       <b>Doctor Name</b>
                                   </div>
                                   <div class="col-lg-4 customizeTableHead" style="border-top: 1px solid #ddd; border-right:1px solid #ddd;box-shadow:  0 2px 0 rgba(0, 0, 0, .1), 0 2px 3px rgba(0, 0, 0, .25);text-align:center">
                                       <b>Speciality</b>
                                   </div>
                                   <div class="col-lg-4 customizeTableHead" style="border-top-right-radius:3px;border-top:1px solid #ddd;box-shadow:  0 2px 0 rgba(0, 0, 0, .1), 0 2px 3px rgba(0, 0, 0, .25);border-right: 1px solid #ddd;text-align:center">
                                       <b> Rating</b>
                                   </div>
                               </div>
                               <div id="maybe" class="col-lg-12" Style="height:200px;overflow-y: scroll">
                               <table id="kawa" class="col-lg-12  " style="border-bottom-left-radius:3px; border-bottom-right-radius:3px;border:1px solid #ddd;box-shadow:  0 2px 0 rgba(0, 0, 0, .1), 0 2px 3px rgba(0, 0, 0, .25);">



                                   <?php foreach($reg_doctor as $reg) {?>

                                   <tr  class="trid_<?php echo $reg->id; ?> common" style="background-color:#fff;height:35px;border:1px solid #ddd;" onclick="getdocid('<?php echo $reg->id; ?>')">
                                       <td class="col-lg-4"><?php echo $reg->first_name; ?></td>
                                       <td class="col-lg-4" style="border-left: 1px solid #ddd;"><?php echo $reg->last_name; ?></td>
                                       <td class="col-lg-4"  style="border-left: 1px solid #ddd;"><?php echo $reg->contact_number; ?></td>
                                   </tr>
                                   <?php } ?>
                               </table>
                               </div>
                           </div>
                            <input type="hidden" id="hidden_click_id" value="0"/>



                           <div id="filviv"  style="display:none;width:100%">

                               <div class="col-lg-6">
                                   <div  style="margin-left:10px">
                                       <ul>
                                           <li>
                                               Filter by Rating
                                           </li>
                                       </ul>
                                   </div>
                                   <div class="col-lg-8 col-lg-offset-1">
                                       <select class="c_select_box_1"  id="spec">
                                           <option value="all">Select</option>
                                           <option value="4575">4575</option>
                                           <option value="4576">4576</option>
                                           <option value="4577">4577</option>
                                           <option value="4578">4578</option>
                                       </select>
                                   </div>
                               </div>

                               <div class="col-lg-6">
                                   <div  style="margin-left:10px">
                                       <ul>
                                           <li>
                                               Filter by City
                                           </li>
                                       </ul>
                                   </div>
                                   <div class="col-lg-8 col-lg-offset-1" >
                                       <select class="c_select_box_1" id="city">
                                           <option value="all">Select</option>
                                           <option value="a">a</option>
                                           <option value="b">b</option>
                                           <option value="c">c</option>
                                           <option value="s">s</option>
                                       </select>
                                   </div>
                               </div>

                               <div class="col-lg-6" style="margin-top:15px">
                                   <div  style="margin-left:10px">
                                       <ul>
                                           <li>
                                               Filter by Location
                                           </li>
                                       </ul>
                                   </div>
                                   <div class="col-lg-8 col-lg-offset-1">
                                       <select class="c_select_box_1" id="add">
                                           <option value="all">Select</option>
                                           <option value="kalubowila">kalubowila</option>
                                           <option value="dehiwala">dehiwala</option>
                                           <option value="kohuwala">kohuwala</option>
                                           <option value="nawala">nawala</option>
                                       </select>
                                   </div>
                               </div>


                               <div class="col-lg-6" style="margin-top:15px">
                                   <div  style="margin-left:10px ;height:25px">

                                   </div>
                                   <div class="col-lg-8 col-lg-offset-1">
                                       <button class="c_pat_view_btn" onclick="getrate()">Filter</button>
                                   </div>
                               </div>

                           </div>

                       <div class=" col-lg-12 c_no_padding" style="width:880px;margin-left:10px;margin-top:50px">
                        <ul class="c_top_ul">
                            <?php

                                $count=1;
                                foreach($featured_doc1 as $f_ob)
                                {
                            ?>
                              <li class="col-lg-3"  onmouseover="load_cos_page12('change_<?php echo $count; ?>')" onmouseout="load_cos_page123('change_<?php echo $count; ?>')">
							   <div class="pat_doc_box col-lg-12 " onclick="feat_addno('<?php echo $count;?>')"  >
								   <ul class="c_ul_1 " style="width:180px" >
								   <li style="width:100%"><div align="center"><img src="assets/img/community.png" width="70px"></div></li>
								   <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center"><?php echo $f_ob->did; ?></div></li>
								   <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center"><?php echo $f_ob->first_name; ?></div></li>
								   <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px"><?php echo $f_ob->contact_number; ?></div></li>

								   </ul>
                                    <div class="change_<?php echo $count; ?>"  style="width:100%;display:none;margin-top:15px;"><div class="c_font_5" style="text-align:center;font-size:13px;background-color:green;">change</div></div>
								</div>
                              </li>
                            <?php
                                    $count++;
                                }
                            ?>

                       </ul>
                      </div>

                           <input type="hidden" id="hidden_click_count" value="0"/>
                           <input type="hidden" id="hidden_click_id11" value="0"/>

                          <div id="featuredpoup" class="container pat_confirm1_box" >

                              <div class="center-block pat_confirm1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
                                  <button  class="pat_close_btn" onclick="feature_pop_close()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
                                  <div style="background: #4CBC5B;height: 145px;padding-top: 32px">

                                      <div class="container c_no_padding col-lg-12">
                                        {{--  <div class="col-lg-4 c_no_padding" style="float: left;margin-left: 27px"><h1>Confirm</h1></div>--}}
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

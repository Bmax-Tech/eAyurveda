

      
				        
			         
                       <div width="100%" style="padding: 5px" >
                        <div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
                
                   Featured Doctors
                        </div>
                           <div class="col-lg-12" id="fdiv">
                               <button class="c_pat_view_btn " onclick="filvis()" >Filter</button>
                           </div>




                           <div id="tabdiv" Style="height:250px;margin-top:20px">
                               <div class="col-lg-12" style="padding:0px 32px 0px 15px;">
                                   <div class="col-lg-4" style="border-top: 2px solid rgb( 0, 0, 0 );border-left: 2px solid rgb( 0, 0, 0 );border-right:2px solid rgb( 0, 0, 0 );text-align:center">
                                       <b>Doctor Name</b>
                                   </div>
                                   <div class="col-lg-4" style="border-top: 2px solid rgb( 0, 0, 0 ); border-right:2px solid rgb( 0, 0, 0 );text-align:center">
                                       <b>Speciality</b>
                                   </div>
                                   <div class="col-lg-4" style="border-top:2px solid rgb( 0, 0, 0 );border-right: 2px solid rgb( 0, 0, 0 );text-align:center">
                                       <b> Rating</b>
                                   </div>
                               </div>
                               <div id="maybe" class="col-lg-12" Style="height:200px;overflow-y: scroll">
                               <table class="col-lg-12" style="border:2px solid rgb( 0, 0, 0 )">



                                   <?php foreach($reg_doctor as $reg) {?>

                                   <tr  style="border:2px solid rgb( 0, 0, 0 );" onclick="getdocid('<?php echo $reg->id; ?>')">
                                       <td class="col-lg-4"><?php echo $reg->first_name; ?></td>
                                       <td class="col-lg-4"><?php echo $reg->last_name; ?></td>
                                       <td class="col-lg-4"><?php echo $reg->contact_number; ?></td>
                                   </tr>
                                   <?php } ?>
                               </table>
                               </div>
                           </div>




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
<div>
    <?php  $si=0;    if(empty($id11)){}else{
       global $si;
        $si=$id11;
	

    }

    ?>

 </div>


                       <div class=" col-lg-12 c_no_padding" style="width:880px;margin-left:10px;margin-top:50px">
                        <ul class="c_top_ul">
                            <?php

                                $count=1;
                                foreach($featured_doc1 as $f_ob)
                                {
                            ?>
                              <li class="col-lg-3"  onmouseover="load_cos_page12('change_<?php echo $count; ?>')" onmouseout="load_cos_page123('change_<?php echo $count; ?>')">
							   <div class="c_doc_box col-lg-12 " onclick="updatefet('<?php echo $si;?>','<?php echo $count;?>')"  >
								   <ul class="c_ul_1 " style="width:180px" >
								   <li style="width:100%"><div align="center"><img src="assets/img/community.png" width="70px"></div></li>
								   <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center"><?php echo $f_ob->did; ?></div></li>
								   <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center">Katugasthota, Kandy</div></li>
								   <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px">Specialized in neurology</div></li>

								   </ul>
                                    <div class="change_<?php echo $count; ?>"  style="width:100%;display:none;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px;background-color:green">change</div></div>
								</div>
                              </li>
                            <?php
                                    $count++;
                                }
                            ?>

                       </ul>
                      </div>
                      
                      
                      

                      

                      

</div>

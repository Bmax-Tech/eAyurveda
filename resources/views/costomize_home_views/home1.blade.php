<div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
	Manage Health Tips
</div>
 <div class=" col-lg-12 c_no_padding" style="width:920px;margin-left:10px">


     </div>
<div id="preview" style="display:none">
	<div style="width: 920px;background: #006d16;border:1px solid #006d16;border-radius: 3px;color: #FFF;" >
		<p id="tip1" style="padding-top: 4px">
			preview
		</p>

	</div>
	     <div  class="" style="margin-left:130px ">

 				<div id="pat_imgload_1" class=" col-lg-12 " style="margin-top:10px;width: 600px;height:210px;background-color: #9acfea" onclick="load_cos_page1_via_ajax()">
                    <div  style="margin-top: 15px;">
						<table style="width:170px;margin-left: -15px;">
							<tr>
								<td >
									<p id="head1" style=" background:rgba(85,85,85,0.87);font-size:10px;color:rgba(255,255,255,1.00);display:inline-block;padding:5px 5px;padding-left:15px;padding-right:15px">
										Header 1
									</p>
								</td>

							</tr>
						</table>
						<table style="width:150px;margin-top: 15px;margin-left: -15px;margin-top:-5px">
							<tr>
								<td >
									<p id="head2" style=" background:rgba(0,0,0,0.87);font-size:12px;color:rgba(255,255,255,1.00);display:inline-block;padding:5px 5px;padding-left:15px;padding-right:15px">
										Header 2
									</p>
								</td>

							</tr>
						</table>
					</div>
					<span class="pat_health_head">Health Tip !</span>
					<div class="pat_sub_banner container" >
                         <p id="tip1">
							 Health Tip Loads Here
						 </p>

					</div>
		        </div>
		  </div>
</div>


			  <div id="tabdiv" Style="height:200px">
				  <div style="width: 920px;background: #006d16;border:1px solid #006d16;border-radius: 3px;color: #FFF;" >
					  <p id="tip1" style="padding-top: 4px;">
						  table
					  </p>

				  </div>
				  <div class="col-lg-12" style="padding:0px 32px 0px 15px">
					  <div class="col-lg-2" style="border-top: 2px solid rgb( 0, 0, 0 );border-left: 2px solid rgb( 0, 0, 0 );border-right:2px solid rgb( 0, 0, 0 );text-align:center;background-color: #C1BDBD">
						  <b>Health tip</b>
					  </div>
					  <div class="col-lg-3" style="border-top: 2px solid rgb( 0, 0, 0 ); border-right:2px solid rgb( 0, 0, 0 );text-align:center;background-color: #C1BDBD">
						  <b>Header 1</b>
					  </div>
					  <div class="col-lg-3" style="border-top:2px solid rgb( 0, 0, 0 );border-right: 2px solid rgb( 0, 0, 0 );text-align:center;background-color: #C1BDBD">
						  <b> Header 2</b>
					  </div>
					  <div class="col-lg-4" style="border-top:2px solid rgb( 0, 0, 0 );border-right: 2px solid rgb( 0, 0, 0 );text-align:center;background-color: #C1BDBD">
						  <b>Quick Actions </b>
					  </div>
				  </div>
				 <div id="" class="col-lg-12" Style="height:150px;overflow-y: scroll">
					  <table id="" class="col-lg-12 over" style="border:2px solid rgb( 0, 0, 0 );background-color: #C1BDBD">



						  <?php foreach($tipload as $tipset) {?>

						  <tr  class="tipid_<?php echo $tipset->hid; ?> common" style="border:2px solid rgb( 0, 0, 0 );" onclick="tip_color('<?php echo $tipset->hid;?>')">
							  <td class="col-lg-2 "><?php echo $tipset->tip; ?></td>
							  <td class="col-lg-3 "><?php echo $tipset->discription_1; ?></td>
							  <td class="col-lg-3 "><?php echo $tipset->discription_2; ?></td>
							  <td class="col-lg-2 "><button type="button" name="update" onclick="get_tip_id('<?php echo $tipset->hid;?>','<?php echo $tipset->tip; ?>' ,'<?php echo $tipset->discription_1;?>','<?php echo $tipset->discription_2; ?>' )" class="c_pat_view_btn_tip" >Update</button></td>
							  <td class="col-lg-2"><button type="button" name="delete" onclick="del_tip('<?php echo $tipset->hid;?>')" class="c_pat_view_btn_tip" >Delete</button></td>

						  </tr>
                          <?php } ?>
					  </table>
				  </div>

				  <input type="hidden" id="hidden_click_tip_id" value="0"/>
				  <input type="hidden" id="hidden_click_tip_del_id" value="0"/>
				  <input type="hidden" id="hidden_click_tip_up_status" value="false"/>
				  </div>


     <button type="button" id="privbut" onclick="display_priv()" class="c_pat_view_btn12" >Preview</button>
     <button type="button" id="privbut" onclick="display_priv()" class="c_pat_view_btn12" >Health tips</button>
	 <div class="container col-lg-12" style="margin-top: 20px">

		<div class="col-lg-6" style="margin-left: -14px;">
		   <div class="col-lg-12" style="margin-top: 7px">
			   Header 1
		   </div>
		   <div id="ii" class="col-lg-12" style="margin-top: 5px">
			   <input onkeyup="onChange();" id="des1" class="c_text_box_1" name="header1" type="text" autocomplete="off" spellcheck="false">
		   </div>
        </div>
		<div class="col-lg-6">
		   <div class="col-lg-12" style="margin-top: 7px">
		     	 Header 2
	    	</div>
		   <div class="col-lg-12" style="margin-top: 5px">
			   <input onkeyup="onChange1();" id="des2" class="c_text_box_1"  name="header2" type="text" autocomplete="off" spellcheck="false">
		   </div>
		</div>

		 <div class="col-lg-8" style="margin-top: 12px">
			 Health Tip
		 </div>
		 <div class="col-lg-12" style="margin-top: 5px">
			 <textarea  onkeyup="onChangetip();" id="tiptip" class="pat_admin_text_area1" name="tip"  style="width:830px;"></textarea>
		 </div>
         <div class="col-lg-12" style="margin-top: 20px">
			 <div  style="margin-left: 410px">
				 <button type="button" onclick="tip_update_via_ajax()" class="c_pat_view_btn" >Refresh</button>
			     <button type="button" onclick="confirm_addtip()" class="c_pat_view_btn" >Add</button>
			 </div>
		 </div>

     </div>

 </div>

<div id="featuredpoup" class="container pat_success1_box" >

	<div class="center-block pat_success1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
		<button  class="pat_close_btn" onclick="feature_pop_close()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
		<div style="background: #4CBC5B;height: 145px;padding-top: 32px">

			<div class="container c_no_padding col-lg-12">
				{{--  <div class="col-lg-4 c_no_padding" style="float: left;margin-left: 27px"><h1>Confirm</h1></div>--}}
				<div class="col-lg-10 c_no_padding" style="margin-left: 30px">
					<ul class="c_ul_1">
						<li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Update </span></li>

						<li> <div style="padding-top: 30px">
								<div class="col-lg-3 ">
									<button class="pat_view_btn_1" onclick="addtip()" >Confirm</button>
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

<div id="success_popup" class="container pat_confirm1_box" >

	<div class="center-block pat_confirm1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">

		<div style="background: #4CBC5B;height: 145px;padding-top: 32px">

			<div class="container c_no_padding col-lg-12">
				{{--  <div class="col-lg-4 c_no_padding" style="float: left;margin-left: 27px"><h1>Confirm</h1></div>--}}
				<div class="col-lg-10 c_no_padding" style="margin-left: 30px">
					<ul class="c_ul_1">
						<li><span style="font-size: 20px;font-weight: 100;margin-left: 60px;color: #FFF">Successfull ! </span></li>

						<li> <div style="padding-top: 30px">

								<div class="col-lg-3" style="margin-left: 100px">
									<button class="pat_view_btn_1" onclick="success_pop_close()" >Ok.</button>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>

<div id="featuredpoup1" class="container pat_success1_box" >

	<div class="center-block pat_success1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
		<button  class="pat_close_btn" onclick="feature_pop_close1()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
		<div style="background: #4CBC5B;height: 145px;padding-top: 32px">

			<div class="container c_no_padding col-lg-12">
				{{--  <div class="col-lg-4 c_no_padding" style="float: left;margin-left: 27px"><h1>Confirm</h1></div>--}}
				<div class="col-lg-10 c_no_padding" style="margin-left: 30px">
					<ul class="c_ul_1">
						<li><span style="font-size: 20px;font-weight: 100;margin-left: 30px;color: #FFF">Please Confirm To Delete </span></li>

						<li> <div style="padding-top: 30px">
								<div class="col-lg-3 ">
									<button class="pat_view_btn_1" onclick="del_tip_1()" >Confirm</button>
								</div>
								<div class="col-lg-3" style="margin-left: 100px">
									<button class="pat_view_btn_1" onclick="feature_pop_close1()" >Cancel</button>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>
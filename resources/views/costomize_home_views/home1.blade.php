<div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
	Manage Health Tips
</div>


<div class=" col-lg-12 c_no_padding" style="width:920px;margin-left:10px">
</div>



<div id="preview" style="display:none">

	<div  class="" style="margin-left:130px ">
         <div id="pat_imgload_1" class=" col-lg-12 " style="margin-top:10px;width: 600px;height:210px;background-color: #9acfea" >
                <div  style="margin-top: 15px;">
						<table style="width:540px;margin-left: -15px;">
							<tr>
								<td >
									<p id="head1" style=" background:rgba(85,85,85,0.87);font-size:10px;color:rgba(255,255,255,1.00);display:inline-block;padding:5px 5px;padding-left:15px;padding-right:15px">
										Hint 1
									</p>
								</td>

							</tr>
						</table>
						<table style="width:540px;margin-top: 15px;margin-left: -15px;margin-top:-5px">
							<tr>
								<td >
									<p id="head2" style=" background:rgba(0,0,0,0.87);font-size:12px;color:rgba(255,255,255,1.00);display:inline-block;padding:5px 5px;padding-left:15px;padding-right:15px">
										Hint 2
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

				  <div class="col-lg-12" style="padding:0px 32px 0px 15px">

					  <div class="col-lg-2 customizeTableHead1" style=" border-top-left-radius:13px;">
						  <b>Health tip</b>
					  </div>
					  <div class="col-lg-3 customizeTableHead1" >
						  <b>Hint 1</b>
					  </div>
					  <div class="col-lg-3 customizeTableHead1" >
						  <b> Hint 2</b>
					  </div>
					  <div class="col-lg-4 customizeTableHead1" style="border-top-right-radius:13px;">
						  <b>Quick Actions </b>
					  </div>
				  </div>
				  <div id="" class="col-lg-12" Style="height:184px;overflow-y: scroll">
					  <table id="" class="col-lg-12 over tabledesign2" >
                         <?php foreach($tipload as $tipset) {?>
						  <tr  class="tipid_<?php echo $tipset->hid; ?> common" style="background-color:#fff;height:35px;border:1px solid #ddd;" >
							  <td class="col-lg-2 "> <div style="height:25px;max-height:25px;width:110px; overflow:hidden;"><?php echo $tipset->tip; ?></div></td>
							  <td class="col-lg-3 " style="border-left: 1px solid #ddd;"> <div style="height:25px;max-height:25px;width:180px; overflow:hidden;"><?php echo $tipset->discription_1; ?></div></td>
							  <td class="col-lg-3" style="border-left: 1px solid #ddd;"> <div style="height:25px;max-height:25px;width:180px; overflow:hidden;"><?php echo $tipset->discription_2; ?></div></td>
                              <td class="col-lg-1" style="border-left: 1px solid #ddd;"><button type="button" name="update" onclick="get_tip_id('<?php echo $tipset->hid;?>','<?php echo $tipset->tip; ?>' ,'<?php echo $tipset->discription_1;?>','<?php echo $tipset->discription_2; ?>' )" class="c_pat_view_btn_tip" ><img src="assets_admin\img\Edit-52.png" height="20px">&nbsp&nbsp Update</button></td>
							  <td ><button type="button" name="delete" onclick="del_tip('<?php echo $tipset->hid;?>')" class="c_pat_view_btn_tip" ><img src="assets_admin\img\Delete-52.png" height="20px">&nbsp&nbsp Delete</button></td>
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
			   Hint 1
		   </div><span class="c_warning_tips_reg " id="wrn_header1"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Empty Hint</span>
		   <div id="ii" class="col-lg-12" style="margin-top: 5px">
			   <input onkeyup="onChange();" onkeypress="remove_wrn('header1')" onchange="remove_wrn('header1')" id="des1" class="c_text_box_1" name="header1" type="text" maxlength="100"autocomplete="off" spellcheck="false">
		   </div>
        </div>
		<div class="col-lg-6">
		   <div class="col-lg-6" style="margin-top: 7px">
		     	 Hint 2
	    	</div><span class="c_warning_tips_reg" id="wrn_header2"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Empty Hint</span>
		   <div class="col-lg-12" style="margin-top: 5px">
			   <input onkeyup="onChange1();" onkeypress="remove_wrn('header2')" onchange="remove_wrn('header2')" id="des2" class="c_text_box_1" maxlength="80" name="header2" type="text" autocomplete="off" spellcheck="false">
		   </div>
		</div>

		 <div class="col-lg-3" style="margin-top: 12px">
			 Health Tip
		 </div><span class="c_warning_tips_reg" id="wrn_tip" style="margin-top: 12px"><span class="glyphicon glyphicon-asterisk" aria-hidden="true" ></span> Empty Tip</span>
		 <div class="col-lg-12" style="margin-top: 5px">
			 <textarea  onkeyup="onChangetip();" id="tiptip" class="pat_admin_text_area1" name="tip"  style="width:830px;" maxlength="280"  onkeypress="remove_wrn('tip')" onchange="remove_wrn('tip')" spellcheck="false"></textarea>
		 </div>
         <div class="col-lg-12" style="margin-top: 20px">
			 <div  style="margin-left: 420px">
				 <button type="button" id="prebut" onclick="display_priv()" class="c_pat_view_btn " style="width:100px"><img src="assets_admin\img\View-50.png" height="15px">&nbsp&nbsp Preview</button>
				 <button type="button" id="tipbut" onclick="display_all_tip()" class="c_pat_view_btn " style="width:100px;display:none"><img src="assets_admin\img\View-50.png" height="15px">&nbsp&nbsp Tips</button>
				 <button type="button" onclick="tip_update_via_ajax()" class="c_pat_view_btn" style="width:100px"><img src="assets_admin\img\Refresh-52.png" height="15px">&nbsp&nbsp Refresh</button>
			     <button type="button" onclick="confirm_addtip()" class="c_pat_view_btn" ><img src="assets_admin\img\Add-48.png" height="15px">&nbsp&nbsp Add</button>

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

{{--pop up massege say to successfull--}}

<div id="success_popup" class="container pat_confirm1_box" >

	<div class="center-block pat_confirm1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">

		<div style="background: #4CBC5B;height: 145px;padding-top: 32px">

			<div class="container c_no_padding col-lg-12">
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

{{--confirm pop up massage--}}
<div id="featuredpoup1" class="container pat_success1_box" >

	<div class="center-block pat_success1_box_wrapper" style="margin-right: 55%;margin-top: 15%;width: 375px">
		<button  class="pat_close_btn" onclick="feature_pop_close1()"><img src="{{ URL::asset('assets/img/close_btn.png') }}"></button>
		<div style="background: #4CBC5B;height: 145px;padding-top: 32px">

			<div class="container c_no_padding col-lg-12">
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
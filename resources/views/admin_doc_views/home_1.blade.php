<div width="100%" style="padding: 5px">
	<div class="col-lg-6 doc_admin_tab_1 doc_admin_tab_active" id="doc_type_btn_1" onclick="change_doc_type('1')">
		<p>Registered Physician</p>
	</div>
	<div class="col-lg-6 doc_admin_tab_1" id="doc_type_btn_2"  onclick="change_doc_type('2')">
		<p>Unregistered Physician</p>
	</div>
	<div class="col-lg-12 doc_admin_tab_2 c_no_padding" id="doc_reg_div">
		<div class="col-lg-2 doc_admin_menu_1 active cc1"  onclick="change_tab_doc('7')" style="margin-top:10px">
			<p style="color:rgba(255,255,255,1);margin-left:20px">Registered Details</p>
		</div>
		<div class="col-lg-2 doc_admin_menu_2 cc1"   onclick="change_tab_doc('8')" style="margin-top:10px">
			<p style="color:rgba(255,255,255,1);margin-left:20px">Personal&nbsp; Details&nbsp;&nbsp;</p>
		</div>
		<div class="col-lg-2 doc_admin_menu_3 cc1" onclick="change_tab_doc('9')" style="margin-top:10px">
			<p style="color:rgba(255,255,255,1);margin-left:20px">&nbsp;Medical &nbsp;&nbsp;&nbsp;  Details </p>
		</div>

		<!-- register div -->
		<form action="admin_add_doc/register" method="post" onsubmit="return valid_registration_first()" name="registration">
			<div class="col-lg-8" id="register_div_doc" >
				<p class="doc_admin_hd_1" style="margin-bottom: 25px">Registered Details</p>
				<div class="doc_form_group">
					<span>Aurvedic Register ID</span> <span class="c_warning_tips_reg" id="wrn_reg_id" ><span class=" glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter registration ID</span>
					<input type="text" class="c_text_box_1" spellcheck="false" onkeypress="remove_wrn('reg_id')" name="reg_id"  onchange="remove_wrn('reg_id')" autocomplete="off"/>
				</div>



				<div class="doc_form_group">
					<span>First Name</span> <span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter first name</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event.value)' onkeypress="remove_wrn('first_name')"  onchange="remove_wrn('first_name')" autocomplete="off"/>
				</div>

				<div class="doc_form_group">
					<span>Last name</span> <span class="c_warning_tips_reg" id="wrn_last_name" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter last name</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="last_name" onkeydown='only_alph(event.value)' onkeypress="remove_wrn('last_name')"  onchange="remove_wrn('last_name')" autocomplete="off"/>
				</div>

				<div class="doc_form_group">
					<span>Registered Field</span> <span class="c_warning_tips_reg" id="wrn_reg_field" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter registered field</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="reg_field" onkeydown='only_alph(event.value)' onkeypress="remove_wrn('reg_field')"  onchange="remove_wrn('reg_field')" autocomplete="off"/>
				</div>

				<div>
					<div class="col-lg-12 doc_form_group c_no_padding doc_form_left">
						<span>Registered Date</span><span class="c_warning_tips_reg" id="wrn_reg_date" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter registered field</span>

						<input class="c_text_box_1" type="date" name="reg_date" onkeypress="remove_wrn('reg_date')"  onchange="remove_wrn('reg_date')"autocomplete="off" spellcheck="false"/>
					</div>

				</div>
				<div class="col-lg-12">
					<button type="button" class="c_sug_form_next_btn" onclick="change_tab_doc('8')">Next <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
				</div>

			</div>


			<!-- personal div..................................................................... -->
			<div class="col-lg-12" id="personal_div_doc" style="display:none">

				<div class="col-lg-8">
					<p class="doc_admin_hd_1" style="margin-bottom: 25px">Personal Details</p>
					<div>
						<div class="col-lg-6 doc_form_group c_no_padding doc_form_left">
							<span>Date of Birth</span>
							<input class="c_text_box_1" type="date" name="dob" autocomplete="off" spellcheck="false" />
						</div>
						<div class="col-lg-6 doc_form_group c_no_padding doc_form_right">
							<span>Gender</span><span class="c_warning_tips_reg" id="wrn_gender" style="color:red">
                    select gender</span>
							<ul style="margin-left: 30px;margin-top: 20px"><li>
									<input type="radio" name="gender" value="male" class="c_radio_btn" checked><span style="margin-left:10px;margin-top:-5px">Male</span></li>

									<li><input type="radio" name="gender" value="female" class="c_radio_btn"><span style="margin-left: 10px;margin-top: -5px">Female</span>


								</li></ul>

						</div>
					</div>

					<div class="doc_form_group">
						<span>National Identy Card (NIC)</span> <span class="c_warning_tips_reg" id="wrn_nic" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter NIC number</span>
						<input type="text" class="c_text_box_1" spellcheck="false" name="nic" onkeypress="remove_wrn('nic')" onchange="remove_wrn('nic')" placeholder="Eg:- XXXXXXXXXV"/>
					</div>

					<div class="doc_form_group">
						<span>Address 1</span> <span class="c_warning_tips_reg" id="wrn_address1" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter  Address</span>
						<input type="text" class="c_text_box_1" spellcheck="false" name="address1"  onkeypress="remove_wrn('address1')"  onchange="remove_wrn('address1')" autocomplete="off"/>
					</div>
					<div class="doc_form_group">
						<span>Address 2</span> <span class="c_warning_tips_reg" id="wrn_address2" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter Address</span>
						<input type="text" class="c_text_box_1" spellcheck="false" name="address2"  onkeypress="remove_wrn('address2')"  onchange="remove_wrn('address2')" autocomplete="off"/>
					</div>
					<div class="doc_form_group">
						<span>City</span> <span class="c_warning_tips_reg" id="wrn_city" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter City</span>
						<input type="text" class="c_text_box_1" spellcheck="false" name="city" onkeydown='only_alph(event)' onkeypress="remove_wrn('city')"  onchange="remove_wrn('city')" autocomplete="off"/>
					</div>

					<div class="doc_form_group">
						<span>Contact Number</span> <span class="c_warning_tips_reg" id="wrn_contact_number" style="color:red"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Enter valid contact number</span>
						<input type="text" class="c_text_box_1" spellcheck="false" name="contact_number" onkeypress="remove_wrn('contact_number')" onchange="remove_wrn('contact_number')" placeholder="Eg:- 07X XXX XXXX"/>
					</div>


					<div class="doc_form_group">
						<span>Email Address</span> <span class="c_warning_tips_reg" id="wrn_email" style="color:red"><span class="glyphicon glyphicon-asterisk " aria-hidden="true"></span> Enter valid Email address</span>
						<input type="text" class="c_text_box_1" spellcheck="false" name="email" onkeypress="remove_wrn('email')" onchange="remove_wrn('email')" placeholder="Eg:- eayurveda@gmail.com"/>
					</div>

					<div class="doc_form_group">
						<span>Description</span>
						<textarea class="c_text_box_1" name="description" cols="3" rows="3"></textarea>
					</div>


					<div class="col-lg-12"><button type="button" class="c_sug_form_next_btn" style="float: left" onclick="change_tab_doc('7')"><img src="{{ URL::asset('assets/img/back.png') }}" style="width: 24px;margin-top: -3px;"> Previous</button>

						<button type="button" class="c_sug_form_next_btn" onclick="change_tab_doc('9')">Next <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
					</div>

				</div>
				<div class="col-lg-4">
					<p class="doc_admin_hd_1" style="margin-bottom: 25px">Profile Image</p>
					<div class="doc_form_group" style="padding: 10px 10px 0px 10px">
						<div class="doc_profile_thumb"><img src="assets_admin/img/profile_image.png" width="30%" style="margin-left: 35%;margin-top: 29%"></div>
						<button class="doc_thumb_select_btn">+ image</button>
					</div>
				</div>


			</div>
			<!-- End of personal div -->
			<!-- worki-->
			<div class="col-lg-8" id="medical_div_doc" style="display:none">
				<p class="doc_admin_hd_1" style="margin-bottom: 25px">Medical Details</p>

				<div class="doc_form_group">
					<span>Charges</span>
					<input class="c_text_box_1" type="text" name="charges" onkeydown='isNumberKey(event)' autocomplete="off" spellcheck="false"/>
				</div>

				<div class="doc_form_group">
					<span>Treatment times</span>
					<input class="c_text_box_1" type="text" name="treatment_times" autocomplete="off" spellcheck="false"/>
				</div>

				<li style="margin-top: 20px">
					<span>Specialized on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:10)</span></span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
				</li>
				<li class="c_add_margin_20 c_form_margin_10">
					<div class="col-lg-12 c_no_padding">
						<div class="col-lg-9 c_no_padding">
							<?php for($i=1;$i<=10;$i++){ ?>
							<input type="text" class="c_text_box_1 c_spec_txt" id="spec_doc_<?php echo $i; ?>" <?php if($i>1){ echo 'style="display:none"'; } ?> spellcheck="false" name="specialized[]" autocomplete="off" placeholder="Specialization <?php echo $i; ?>"/>
							<?php } ?>
						</div>
						<div class="col-lg-3 c_no_padding" style="padding-left: 40px"><button type="button" onclick="add_more_op()" class="add_op_btn">+</button><input type="text" value="1" name="spec_count" id="spec_count" disabled class="op_count_txt"/><button type="button" onclick="rem_more_op()" class="rem_op_btn">-</button></div>
					</div>
				</li>
				<li style="margin-top: 20px">
					<span>Treatment types on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:10)</span></span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
				</li>
				<li class="c_add_margin_20 c_form_margin_10">
					<div class="col-lg-12 c_no_padding">
						<div class="col-lg-9 c_no_padding">
							<?php for($i=1;$i<=10;$i++){ ?>
							<input type="text" class="c_text_box_1 c_spec_txt" id="treat_doc_<?php echo $i; ?>" <?php if($i>1){ echo 'style="display:none"'; } ?> spellcheck="false" name="treatments[]" autocomplete="off" placeholder="Treatment <?php echo $i; ?>"/>
							<?php } ?>
						</div>
						<div class="col-lg-3 c_no_padding" style="padding-left: 40px"><button type="button" onclick="add_more_t_op()" class="add_op_btn">+</button><input type="text" value="1" name="treat_count" id="treat_count" disabled class="op_count_txt"/><button type="button" onclick="rem_more_t_op()" class="rem_op_btn">-</button></div>
					</div>
				</li>

				<div class="col-lg-12">
					<button type="button" class="c_sug_form_next_btn" style="float: left" onclick="change_tab_doc('8')"><img src="{{ URL::asset('assets/img/back.png') }}" style="width: 24px;margin-top: -3px;"> Previous</button>
				</div>

				<button type="button" class="doc_thumb_select_btn"onclick="pop_view_details()">view data</button>
				<div><button type="submit" class="doc_thumb_select_btn">Save</button></div>

			</div>
		</form>
	</div>

	<!-- ..................................Unregisterd doctors ................................................ -->


	<div class="col-lg-12 doc_admin_tab_2 c_no_padding" id="doc_un_reg_div" style="display:none">

		<div class="col-lg-2 doc_admin_menu_1 active cc2"  onclick="change_tab_undoc('10')" style="margin-top:10px">
			<p style="color:rgba(255,255,255,1);margin-left:20px">Personal  &nbsp;&nbsp;  Details </p>
		</div>
		<div class="col-lg-2 doc_admin_menu_2 cc2"   onclick="change_tab_undoc('11')" style="margin-top:10px">
			<p style="color:rgba(255,255,255,1);margin-left:20px">Medical &nbsp; &nbsp; Details &nbsp;&nbsp;</p>
		</div>
		<div class="col-lg-2 doc_admin_menu_3 cc2" onclick="change_tab_undoc('12')" style="margin-top:10px">
			<p style="color:rgba(255,255,255,1);margin-left:20px">&nbsp; Users &nbsp;&nbsp; Comments &nbsp;&nbsp;&nbsp;</p>
		</div>

		<!-- register div -->
		<form action="/admin_add_doc/unregister" method="post" onsubmit="return  valid_unregister_doc()" name="unregdoctors">
			<div class="col-lg-8" id="register_undiv_doc" >
				<p class="doc_admin_hd_1" style="margin-bottom: 25px">Personal</p>

				<div class="doc_form_group">
					<span>First Name</span> <span class="c_warning_tips_reg" id="wrn_un_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="false"></span> Enter valid first name</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="un_first_name" onkeydown='only_alph(event.value)' onkeypress="remove_wrn('un_first_name')"  onchange="remove_wrn('un_first_name')" autocomplete="off"/>
				</div>

				<div class="doc_form_group">
					<span>Last name</span> <span class="c_warning_tips_reg" id="wrn_un_last_name" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid last name</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="un_last_name" onkeydown='only_alph(event.value)' onkeypress="remove_wrn('un_last_name')"  onchange="remove_wrn('un_last_name')" autocomplete="off                 "/>
				</div>

				<div>
					<div class="col-lg-6 doc_form_group c_no_padding doc_form_left">
						<span>Date of Birth</span>
						<input class="c_text_box_1" type="text" id="un_doc_dob" name="un_dob" autocomplete="off" spellcheck="false" placeholder="MM/DD/YYYY"/>

					</div>
					<div class="col-lg-6 doc_form_group c_no_padding doc_form_right">
						<span>Gender</span><span class="c_warning_tips_reg" id="wrn_un_gender" style="color:red">
                    select gender</span>
						<ul style="margin-left: 30px;margin-top: 20px"><li>
								<input type="radio" name="un_gender" value="male" class="c_radio_btn" checked><span style="margin-left:10px;margin-top:-5px">Male</span></li>

							<li><input type="radio" name="un_gender" value="female" class="c_radio_btn"><span style="margin-left: 10px;margin-top: -5px">Female</span>


							</li></ul>

					</div>
				</div>
				<div class="doc_form_group">
					<span>NIC</span> <span class="c_warning_tips_reg" id="wrn_un_nic" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid NIC number</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="un_nic" onkeypress="remove_wrn('un_nic')" onchange="remove_wrn('un_nic')" placeholder="Eg:- XXXXXXXXXV"/>
				</div>

				<div class="doc_form_group">
					<span>Address 1</span> <span class="c_warning_tips_reg" id="wrn_un_address_1" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid address</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="un_address_1"  onkeypress="remove_wrn('un_address_1')"  onchange="remove_wrn('un_address_1')" autocomplete="off"/>
				</div>

				<div class="doc_form_group">
					<span>Address 2</span> <span class="c_warning_tips_reg" id="wrn_un_address_2" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid address</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="un_address_2"  onkeypress="remove_wrn('un_address_2')"  onchange="remove_wrn('un_address_2')" autocomplete="off"/>
				</div>
				<div class="doc_form_group">
					<span>City</span> <span class="c_warning_tips_reg" id="wrn_un_city" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid city</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="un_city" onkeydown='only_alph(event)' onkeypress="remove_wrn('un_city')"  onchange="remove_wrn('un_city')" autocomplete="off"/>
				</div>

				<div class="doc_form_group">
					<span>Contact Number</span> <span class="c_warning_tips_reg" id="wrn_un_contact_number" style="color:red"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Enter valid contact number</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="un_contact_number" onkeypress="remove_wrn('un_contact_number')" onchange="remove_wrn('un_contact_number')" placeholder="Eg:- 07X XXX XXXX"/>
				</div>

				<div class="doc_form_group">
					<span>Email Address</span> <span class="c_warning_tips_reg" id="wrn_un_email" style="color:red"><span class="glyphicon glyphicon-asterisk " aria-hidden="true"></span> Enter valid Email address</span>
					<input type="text" class="c_text_box_1" spellcheck="false" name="un_email" onkeypress="remove_wrn('un_email')" onchange="remove_wrn('un_email')" placeholder="Eg:- eayurveda@gmail.com"/>
				</div>

				<div class="doc_form_group">
					<span>Description</span>
					<textarea class="c_text_box_1" name="un_description" cols="3" rows="3"></textarea>
				</div>
				<div class="col-lg-12">
					<button type="button" class="c_sug_form_next_btn" onclick="change_tab_undoc('11')">Next <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
				</div>

			</div>
			<!-- register div -->
			<div class="col-lg-8" id="personal_undiv_doc" style="display:none">
				<p class="doc_admin_hd_1" style="margin-bottom: 25px">Medical Details</p>

				<div class="doc_form_group">
					<span>Charges</span>
					<input class="c_text_box_1" type="text" name="un_medical_procedure" onkeydown='isNumberKey(event)' autocomplete="off" spellcheck="false"/>
				</div>
				<div class="doc_form_group">
					<span>Treatments</span>
					<input class="c_text_box_1" type="text" name="un_treatment_period" autocomplete="off" spellcheck="false"/>
				</div>

				<li style="margin-top: 20px">
					<span>Specialized on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:10)</span></span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
				</li>
				<li class="c_add_margin_20 c_form_margin_10">
					<div class="col-lg-12 c_no_padding">
						<div class="col-lg-9 c_no_padding">
							<?php for($i=1;$i<=10;$i++){ ?>
							<input type="text" class="c_text_box_1 c_spec_txt" id="un_spec_doc_<?php echo $i; ?>" <?php if($i>1){ echo 'style="display:none"'; } ?> spellcheck="false" name="un_specialized[]" autocomplete="off" placeholder="Specialization <?php echo $i; ?>"/>
							<?php } ?>
						</div>
						<div class="col-lg-3 c_no_padding" style="padding-left: 40px"><button type="button" onclick="add_more_op_un()" class="add_op_btn">+</button><input type="text" value="1" name="spec_count" id="un_spec_count" disabled class="op_count_txt"/><button type="button" onclick="rem_more_op_un()" class="rem_op_btn">-</button></div>
					</div>
				</li>
				<li style="margin-top: 20px">
					<span>Treatment types on&nbsp;&nbsp;&nbsp;<span style="font-size: 11px">(Max:10)</span></span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> enter valid first name</span>
				</li>
				<li class="c_add_margin_20 c_form_margin_10">
					<div class="col-lg-12 c_no_padding">
						<div class="col-lg-9 c_no_padding">
							<?php for($i=1;$i<=10;$i++){ ?>
							<input type="text" class="c_text_box_1 c_spec_txt" id="un_treat_doc_<?php echo $i; ?>" <?php if($i>1){ echo 'style="display:none"'; } ?> spellcheck="false" name="un_treatments[]" autocomplete="off" placeholder="Treatment <?php echo $i; ?>"/>
							<?php } ?>
						</div>
						<div class="col-lg-3 c_no_padding" style="padding-left: 40px"><button type="button" onclick="add_more_t_op_un()" class="add_op_btn">+</button><input type="text" value="1" name="treat_count" id="un_treat_count" disabled class="op_count_txt"/><button type="button" onclick="rem_more_t_op_un()" class="rem_op_btn">-</button></div>
					</div>
				</li>


				<div class="col-lg-12"><button type="button" class="c_sug_form_next_btn" style="float: left" onclick="change_tab_undoc('10')"><img src="{{ URL::asset('assets/img/back.png') }}" style="width: 24px;margin-top: -3px;"> Previous</button>

					<button type="button" class="c_sug_form_next_btn" onclick="change_tab_undoc('12')">Next <img src="{{ URL::asset('assets/img/next.png') }}" style="width: 24px;margin-top: -3px;"></button>
				</div>


			</div>

			<!-- worki-->
			<div class="col-lg-8" id="medical_undiv_doc" style="display:none">
				<p class="doc_admin_hd_1" style="margin-bottom: 25px">Comments</p>

				<div class="doc_form_group">
					<span>Cooment 1</span>
					<textarea class="c_text_box_2" name="un_comment1" cols="5" rows="3"></textarea>
				</div>
				<div class="doc_form_group">
					<span>Cooment 2</span>
					<textarea class="c_text_box_2" name="un_comment2" cols="5" rows="3"></textarea>
				</div>
				<div class="doc_form_group">
					<span>Cooment 3</span>
					<textarea class="c_text_box_2" name="un_comment3" cols="5" rows="3"></textarea>
				</div>
				<div class="col-lg-12">
					<button type="button" class="c_sug_form_next_btn" style="float: left" onclick="change_tab_undoc('11')"><img src="{{ URL::asset('assets/img/back.png') }}" style="width: 24px;margin-top: -3px;"> Previous</button>
				</div>

				<div><button type="submit" class="doc_thumb_select_btn">Save</button></div>
			</div>




		</form>
	</div>


</div>

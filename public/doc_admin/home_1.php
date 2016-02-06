<div width="100%" style="padding: 5px">
	<div class="col-lg-6 doc_admin_tab_1 doc_admin_tab_active" id="doc_type_btn_1" onclick="change_doc_type('1')">
		<p>Registered Physician</p>
	</div>
	<div class="col-lg-6 doc_admin_tab_1" id="doc_type_btn_2"  onclick="change_doc_type('2')">
		<p>Unregistered Physician</p>
	</div>
	<div class="col-lg-12 doc_admin_tab_2 c_no_padding" id="doc_reg_div">
		<div class="col-lg-8">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">General Information</p>
			<div class="doc_form_group">
				<span>Name</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Address</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>NIC</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div>
				<div class="col-lg-6 doc_form_group c_no_padding doc_form_left">
					<span>Date of Birth</span>
					<input class="c_text_box_1" type="date" autocomplete="off" spellcheck="false"/>
				</div>
				<div class="col-lg-6 doc_form_group c_no_padding doc_form_right">
					<span>Gender</span>
					<select class="c_select_box_1">
						<option value="select">Select</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Profile Image</p>
			<div class="doc_form_group" style="padding: 10px 10px 0px 10px">
				<div class="doc_profile_thumb"><img src="assets_admin/img/profile_image.png" width="30%" style="margin-left: 35%;margin-top: 29%"></div>
				<button class="doc_thumb_select_btn">+ image</button>
			</div>
		</div>


		<div class="col-lg-12">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Qualifications Information</p>
			<div class="doc_form_group">
				<span>Field of Study</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Subjects</span>
				<textarea class="doc_admin_text_area"></textarea>
			</div>
			<div class="doc_form_group">
				<span>NIC</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Date of Birth</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
		</div>


		<div class="col-lg-12">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Social Details</p>
			<div class="doc_form_group">
				<span>Name</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Address</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>NIC</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Date of Birth</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
		</div>

		<button type="button" class="c_button_1" style="margin: 20px 0px 40px 0px">Submit form</button>
	</div>


	<div class="col-lg-12 doc_admin_tab_2 c_no_padding" id="doc_un_reg_div" style="display: none">
		<div class="col-lg-12">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">General Information</p>
			<div class="doc_form_group">
				<span>Name</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Address</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>NIC</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div>
				<div class="col-lg-6 doc_form_group c_no_padding doc_form_left">
					<span>Date of Birth</span>
					<input class="c_text_box_1" type="date" autocomplete="off" spellcheck="false"/>
				</div>
				<div class="col-lg-6 doc_form_group c_no_padding doc_form_right">
					<span>Gender</span>
					<select class="c_select_box_1">
						<option value="select">Select</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
			</div>
		</div>


		<div class="col-lg-12">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Qualifications Information</p>
			<div class="doc_form_group">
				<span>Field of Study</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Subjects</span>
				<textarea class="doc_admin_text_area"></textarea>
			</div>
			<div class="doc_form_group">
				<span>NIC</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Date of Birth</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
		</div>


		<div class="col-lg-12">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Social Details</p>
			<div class="doc_form_group">
				<span>Name</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Address</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>NIC</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Date of Birth</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
		</div>

		<button type="button" class="c_button_1" style="margin: 20px 0px 40px 0px">Submit form</button>
	</div>
</div>
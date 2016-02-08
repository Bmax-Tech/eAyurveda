<div width="100%" style="padding: 5px">
	<div class="col-lg-6 doc_admin_tab_1 doc_admin_tab_active" id="doc_type_btn_1" onclick="change_doc_type('1')">
		<p>Registered Physician</p>
	</div>
	<div class="col-lg-6 doc_admin_tab_1" id="doc_type_btn_2"  onclick="change_doc_type('2')">
		<p>Unregistered Physician</p>
	</div>
    <div class="col-lg-12 doc_admin_tab_2 c_no_padding" id="doc_reg_div">
            <div class="col-lg-2 doc_admin_menu_1 active cc1"  onclick="change_tab_doc('7')" style="margin-top:10px">
                <p style="color:rgba(255,255,255,1)">Registered Details</p>
            </div>
            <div class="col-lg-2 doc_admin_menu_2 cc1"   onclick="change_tab_doc('8')" style="margin-top:10px">
                <p style="color:rgba(255,255,255,1)">Personal&nbsp; Details&nbsp;&nbsp;</p>
            </div>
            <div class="col-lg-2 doc_admin_menu_3 cc1" onclick="change_tab_doc('9')"" style="margin-top:10px">
                <p style="color:rgba(255,255,255,1)">&nbsp;Working &nbsp;&nbsp;Details &nbsp;&nbsp;&nbsp;</p>
            </div>
     
<!-- register div -->
    <div class="col-lg-8" id="register_div_doc" >
     <form action="#" method="post" onsubmit="return valid_registration()" name="registration">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Registered Details</p>
            <div class="doc_form_group">
				<span>Registered ID</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>First Name</span><span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon                      glyphicon-asterisk" aria-hidden="false"></span> enter valid first name</span>
				<input type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event)'    	                      onkeypress="remove_wrn('first_name')"  onchange="remove_wrn('first_name')" autocomplete="off"/>
			</div>
            <div class="doc_form_group">
				<span>Last Name</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Registed Feild</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div>
				<div class="col-lg-6 doc_form_group c_no_padding doc_form_left">
					<span>Registered Date</span>
					<input class="c_text_box_1" type="date" autocomplete="off" spellcheck="false"/>
				</div>
				
			</div>
    </div>
    
 <!-- register div -->    
   		 <div class="col-lg-8" id="personal_div_doc" style="display:none">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Personal Details</p>
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
			<div class="doc_form_group">
				<span>NIC</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Address</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Contact Number</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Email</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Current working place</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Working experience</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			
		
    </div>
            
     <!-- worki-->
     <div class="col-lg-8" id="medical_div_doc" style="display:none">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Medical Details</p>
            
            <div class="doc_form_group">
				<span>Current working place</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Medical Procedure</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Treatment Period</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Requirment</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Charges</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Type of medicine</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Treatment times</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Carrier period</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Doctor experince</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Special diseases can be meditate</span>
				<input class="c_text_box_1" type="text" autocomplete="off" spellcheck="false"/>
			</div>
			
    </div>
           
            
            
            
            
   </div>         
</div>
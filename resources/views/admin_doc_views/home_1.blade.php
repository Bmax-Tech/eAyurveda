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
	<form action="admin_add_doc/register" method="post" onsubmit="return valid_registration()" name="registration">
    <div class="col-lg-8" id="register_div_doc" >     
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Registered Details</p>
            <div class="doc_form_group">
				<span>Register ID</span> <span class="c_warning_tips_reg" id="wrn_reg_id" ><span class=" glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid registration ID</span>
				<input type="text" class="c_text_box_1" spellcheck="false" onkeypress="remove_wrn('reg_id')" name="reg_id"  onchange="remove_wrn('reg_id')" autocomplete="off"/>
			</div>
            
			<div class="doc_form_group">
				<span>First Name</span> <span class="c_warning_tips_reg" id="wrn_first_name"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid first name</span>
				<input type="text" class="c_text_box_1" spellcheck="false" name="first_name" onkeydown='only_alph(event.value)' onkeypress="remove_wrn('first_name')"  onchange="remove_wrn('first_name')" autocomplete="off"/>
			</div>
            
           <div class="doc_form_group">
				<span>Last name</span> <span class="c_warning_tips_reg" id="wrn_last_name" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid last name</span>
				<input type="text" class="c_text_box_1" spellcheck="false" name="last_name" onkeydown='only_alph(event.value)' onkeypress="remove_wrn('last_name')"  onchange="remove_wrn('last_name')" autocomplete="off"/>
			</div>
            
            <div class="doc_form_group">
				<span>Registered Field</span> <span class="c_warning_tips_reg" id="wrn_reg_field" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid registered field</span>
				<input type="text" class="c_text_box_1" spellcheck="false" name="reg_field" onkeydown='only_alph(event.value)' onkeypress="remove_wrn('reg_field')"  onchange="remove_wrn('reg_field')" autocomplete="off"/>
			</div>
            
			<div>
				<div class="col-lg-12 doc_form_group c_no_padding doc_form_left">
					<span>Registered Date</span>
					<input class="c_text_box_1" type="date" name="reg_date" autocomplete="off" spellcheck="false"/>
				</div>
				
			</div>
    </div>
 <!-- personal div..................................................................... -->    
 <div class="col-lg-12" id="personal_div_doc" style="display:none">
 		
   		 <div class="col-lg-8">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Personal Details</p>
            <div>
				<div class="col-lg-6 doc_form_group c_no_padding doc_form_left">
					<span>Date of Birth</span>
					<input class="c_text_box_1" type="date" name="dob" autocomplete="off" spellcheck="false"/>
				</div>
				<div class="col-lg-6 doc_form_group c_no_padding doc_form_right">
					<span>Gender</span><span class="c_warning_tips_reg" id="wrn_gender" style="color:red">
                    select gender</span>
					<select class="c_select_box_1"  name="gender" id="reg_gender" onchange="remove_wrn('gender')">
						<option value="select">Select</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
			</div>
			
             <div class="doc_form_group">
				<span>NIC</span> <span class="c_warning_tips_reg" id="wrn_nic" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid NIC number</span>
				<input type="text" class="c_text_box_1" spellcheck="false" name="nic" onkeypress="remove_wrn('nic')" onchange="remove_wrn('nic')" placeholder="Eg:- XXXXXXXXXV"/>
			</div>
            
            <div class="doc_form_group">
				<span>Address</span> <span class="c_warning_tips_reg" id="wrn_address" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid address</span>
				<input type="text" class="c_text_box_1" spellcheck="false" name="address" onkeydown='only_alph(event)' onkeypress="remove_wrn('address')"  onchange="remove_wrn('address')" autocomplete="off                 "/>
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
				<span>Current working place</span>
				<input class="c_text_box_1" type="text" name="current_working_place" autocomplete="off" spellcheck="false"/>
			</div>
			<div class="doc_form_group">
				<span>Working experience</span>
				<input class="c_text_box_1" type="text" name="working_experince" autocomplete="off" spellcheck="false"/>
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
				<span>Medical Procedure</span>
				<input class="c_text_box_1" type="text" name="medical_procedure" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Treatment Period</span>
				<input class="c_text_box_1" type="text" name="treatment_period" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Requirment</span>
				<input class="c_text_box_1" type="text" name="requirment" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Charges</span>
				<input class="c_text_box_1" type="text" name="charges" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Type of medicine</span>
				<input class="c_text_box_1" type="text" name="medicine_type" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Treatment times</span>
				<input class="c_text_box_1" type="text" name="treatment_times" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Carrier period</span>
				<input class="c_text_box_1" type="text" name="carrier_period" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Doctor experince</span>
				<input class="c_text_box_1" type="text" name="doctor_experience" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Special diseases can be meditate</span>
				<input class="c_text_box_1" type="text" name="special_meditate" autocomplete="off" spellcheck="false"/>
			</div>
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
<form action="/admin_add_doc/unreg_register" method="post" onsubmit="return  valid_unregister_doc()" name="unregdoctors">
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
					<input class="c_text_box_1" type="date" name="undob" autocomplete="off" spellcheck="false"/>
				</div>
				<div class="col-lg-6 doc_form_group c_no_padding doc_form_right">
					<span>Gender</span><span class="c_warning_tips_reg" id="wrn_un_gender" style="color:red">
                    Select gender</span>
					<select class="c_select_box_1"  name="un_gender" id="unreg_gender" onchange="remove_wrn('un_gender')">
						<option value="select">Select</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
			</div>
			
              <div class="doc_form_group">
				<span>Address</span> <span class="c_warning_tips_reg" id="wrn_un_address" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid address</span>
				<input type="text" class="c_text_box_1" spellcheck="false" name="un_address" onkeydown='only_alph(event)' onkeypress="remove_wrn('un_address')"  onchange="remove_wrn('un_address')" autocomplete="off"/>
			</div>
            
                <div class="doc_form_group">
				<span>NIC</span> <span class="c_warning_tips_reg" id="wrn_un_nic" style="color:red"><span class="glyphicon  glyphicon-asterisk" aria-hidden="false"></span> Enter valid NIC number</span>
				<input type="text" class="c_text_box_1" spellcheck="false" name="un_nic" onkeypress="remove_wrn('un_nic')" onchange="remove_wrn(un_'nic')" placeholder="Eg:- XXXXXXXXXV"/>
			</div>
            
            <div class="doc_form_group">
				<span>Contact Number</span> <span class="c_warning_tips_reg" id="wrn_un_contact_number" style="color:red"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Enter valid contact number</span>
				<input type="text" class="c_text_box_1" spellcheck="false" name="un_contact_number" onkeypress="remove_wrn('un_contact_number')" onchange="remove_wrn('un_contact_number')" placeholder="Eg:- 07X XXX XXXX"/>
			</div>
            
		            <div class="doc_form_group">
				<span>Email Address</span> <span class="c_warning_tips_reg" id="wrn_un_email" style="color:red"><span class="glyphicon glyphicon-asterisk " aria-hidden="true"></span> Enter valid Email address</span>
				<input type="text" class="c_text_box_1" spellcheck="false" name="un_email" onkeypress="remove_wrn('un_email')" onchange="remove_wrn('un_email')" placeholder="Eg:- eayurveda@gmail.com"/>
			</div>
			
    </div>
 <!-- register div -->    
   		 <div class="col-lg-8" id="personal_undiv_doc" style="display:none">
			<p class="doc_admin_hd_1" style="margin-bottom: 25px">Medical Details</p>
            
			  <div class="doc_form_group">
				<span>Medical Procedure</span>
				<input class="c_text_box_1" type="text" name="un_medical_procedure" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Treatment Period</span>
				<input class="c_text_box_1" type="text" name="un_treatment_period" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Requirment</span>
				<input class="c_text_box_1" type="text" name="un_requirment" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Charges</span>
				<input class="c_text_box_1" type="text" name="un_charges" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Type of medicine</span>
				<input class="c_text_box_1" type="text" name="un_type_of_medicine" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Treatment times</span>
				<input class="c_text_box_1" type="text" name="un_treatment_times" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Carrier period</span>
				<input class="c_text_box_1" type="text" name="un_carrier_priod" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Doctor experince</span>
				<input class="c_text_box_1" type="text" name="un_doctor_experience" autocomplete="off" spellcheck="false"/>
			</div>
            <div class="doc_form_group">
				<span>Special diseases can be meditate</span>
				<input class="c_text_box_1" type="text" name="un_special_meditate" autocomplete="off" spellcheck="false"/>
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
            
			<div><button type="submit" class="doc_thumb_select_btn">Save</button></div>
    </div>
           
            
            
            
     </form>        
   </div>   
  
          
</div>
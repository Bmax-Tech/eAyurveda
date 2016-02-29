<div width="100%" style="padding: 5px" xmlns="http://www.w3.org/1999/html">
<!--Search-->
	          
           
    
	<div class="col-lg-12 doc_admin_tab_2 c_no_padding" id="doc_update_div">
    <p class="doc_admin_hd_1" style="margin-bottom: 5px">UPDATE DOCTORS</p>
        <div class="filter_ar" id="filter_area_head">
        <div class="update_search_header">
           <form  method="get" id="search_doc_up">
              <input type="text" class="c_search_text_box" name="search_text_up" autocomplete="off" spellcheck="false" placeholder="Search name">
              <button type="button" id="update_filter_header" onclick="l()"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true" id="c_adva"></span></button>
              <button type="button" id="c_search_icon" onclick="search_data_up()"><img src="{{ URL::asset('assets/img/search.png') }}" width="27px"></button>
           </form>
        </div>
        </div>
		<div class="col-lg-12" id="t_body">
                 
                    
                    <table class="table table-striped">
                    <tr><td>ID</td><td>First Name</td><td>Last Name</td><td>City</td><td>Gender</td></tr>
                        <input type="hidden" id="doc_fil_id" value="0"/>
                    <?php
                    	foreach($doctors as $doc){
					?>
                    <tr><td><?php echo $doc->id; ?></td><td><?php echo $doc->first_name; ?></td><td><?php echo $doc->last_name; ?></td><td><?php echo $doc->city;?></td><td><?php echo $doc->gender; ?></td><td align="left" style="width: 100px">
                    <button type="button" style="width:100px;background-color:rgba(102, 102, 102, 0.31)" onClick="view_doctor_profile('<?php echo $doc->id; ?>')">
                    View &nbsp;&nbsp;
                    </button></td><td align="left" style="width: 100px">
                    <button type="button" onClick="change_to_edit_mode('<?php echo $doc->id; ?>')" style="width:100px;background-color:rgba(162, 46, 46, 0.36)">
                    Update</button></td></tr>
                    
                    <?php
						}
					?>
                    </table>
                               
                  
		</div><!--End table -->
        <div id="tttt"></div>
	</div>	
    

   
</div>
		

	



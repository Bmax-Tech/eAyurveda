
<div width="100%" style="padding: 5px">
<!--Search-->
	          
           
    
	<div class="col-lg-12 doc_admin_tab_2 c_no_padding" id="doc_remove_div">
      <p class="doc_admin_hd_1" style="margin-bottom: 5px">REMOVE DOCTORS</p>

        <div class="filter_ar" id="filter_area_head_r">
            <div class="update_search_header">
                <form  method="get" id="search_doc_remove">
                    <input type="text" class="c_search_text_box" name="search_text_rem" autocomplete="off" spellcheck="false" placeholder="Search name">
                    <button type="button" id="update_filter_header_r" onclick="lr()"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true" id="c_adva_r"></span></button>
                    <button type="button" id="c_search_icon" onclick="search_data_remove()"><img src="{{ URL::asset('assets/img/search.png') }}" width="27px"></button>
                </form>
            </div>
        </div>
            
            <div class="col-lg-12" id="t_body_remove">
            <table class="table table-striped">
                <tr><td>ID</td><td>First Name</td><td>Last Name</td><td>City</td><td>Gender</td></tr>
                    <input type="hidden" id="doc_remove_id" value="0"/>
              	<?php 
					foreach($doctors_r as $rd){
				?>
				<tr><td><?php echo $rd->id; ?></td><td><?php echo $rd->first_name; ?></td><td><?php echo $rd->last_name; ?></td><td><?php echo $rd->city;?></td><td><?php echo $rd->gender; ?></td><td align="left" style="width:100px"><button type="button"  style="width:100px;background-color:rgba(102, 102, 102, 0.31)" onClick="view_doctor_profile('<?php echo $rd->id; ?>')">
                    View &nbsp;&nbsp;
                    </button></td><td align="left" style="width:100px"><button type="button" onClick="re('<?php echo $rd->id; ?>')"  style="width:100px;background-color:rgba(162, 46, 46, 0.36)">Remove</button></td></tr>
                <?php
						}
				?>
                    </table>
	</div>	
</div>
		

</div>



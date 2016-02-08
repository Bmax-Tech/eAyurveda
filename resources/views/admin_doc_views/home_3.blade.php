
<div width="100%" style="padding: 5px">
<!--Search-->
	          
           
    
	<div class="col-lg-12 doc_admin_tab_2 c_no_padding" id="doc_remove_div">
      <p class="doc_admin_hd_1" style="margin-bottom: 5px">REMOVE DOCTORS</p>
    
    		 <ul class="nav navbar-nav navbar-right" style="margin-right:30px">
                <li>
                    <form action="" method="get">
                        <input type="text" class="c_search_text_box" name="search_text" autocomplete="off" spellcheck="false">
                        <button type="submit" id="c_search_icon"><img src="assets/img/search.png" width="27px"></button>
                    </form>
                </li>
            </ul>
            
            <div class="col-lg-12" id="t_body_remove">
            <table border="1" class="table_doc_1" id="t02">
                    <tr><td>ID</td><td>Name</td><td>NIC</td><td>gender</td><td>View</td><td>Update</td></tr>
                    <input type="hidden" id="doc_remove_id" value="0"/>
              	<?php 
					foreach($doctors_r as $rd){
				?>
				<tr><td><?php echo $rd->register_id; ?></td><td><?php echo $rd->first_name; ?></td><td><?php echo $rd->nic;                ?></td><td><?php echo $rd->gender; ?></td><td align="center"><button type="button" style="width:100%;background-color:rgba(102, 102, 102, 0.31)" onClick="view_doc_profile('<?php echo $rd->register_id; ?>')">
                    View &nbsp;&nbsp;
                    </button></td><td align='center'><button type="button" onClick="re('<?php echo $rd->register_id; ?>')" style="width:100%;background-color:rgba(162, 46, 46, 0.36)">Remove</button></td></tr>
                <?php
						}
				?>
                    </table>
	</div>	
</div>
		

	




<div width="100%" style="padding: 5px" >

          <div class="col-lg-6 pat_admin_tab_1 pat_admin_tab_active" id="pat_type_btn_1" onclick="change_pat_type(1)">
           <p>All Users</p>
        </div>
      <div class="col-lg-6 pat_admin_tab_1" id="pat_type_btn_2"  onclick="change_pat_type(2)">
            <p>New Users</p>
       </div>

<div class="col-lg-12 pat_admin_tab_2 c_no_padding" id="pat_all_user_div">
                 <div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">

             All Users
         </div>

                <div class=" col-lg-12 c_no_padding" style="width:920px;margin-left:10px">
                <ul class="c_top_ul">
<?php


foreach($comment as $pa) {



?><li>
							   <div class="c_doc_box col-lg-12 "  onclick="user_view('<?php echo $pa->id; ?>')">
								   <ul class="c_ul_1" style="width:252px">
								   <li style="width:100%"><div align="center"><img src="assets/img/community.png" width="70px"></div></li>
								   <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center"><?php echo $pa->first_name; ?></div></li>
								   <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center"><?php echo $pa->contact_number; ?></div></li>
								   <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px"><?php echo $pa->nic; ?></div></li>
								   </ul>
								</div>
							</li>
<?php
}
?>
 </ul>
</div><ul>
  <li>
<div class="col-lg-6 c_no_padding">
<nav>
  <ul class="pagination">
      <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
      <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
      <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
      <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
      <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
      <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
      <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
  </ul>
</nav>
</div>
<div class="col-lg-6">
<div style="float: right;padding: 20px 0px">
  <span>Showing 1-10 of 20 results</span>
</div>
</div>
</li></ul>
</div>


<div class="col-lg-12 pat_admin_tab_2 c_no_padding" id="pat_new_user_div" style="display: none">
<div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">

New Users
</div>

 <div class=" col-lg-12 c_no_padding" style="width:920px;margin-left:10px">
 <ul class="c_top_ul">
<?php


foreach($comment1 as $pa) {



?><li>
        <div class="c_doc_box col-lg-12 "   onclick="user_view('<?php echo $pa->id; ?>')" >
            <ul class="c_ul_1" style="width:252px">
                <li style="width:100%"><div align="center"><img src="assets/img/community.png" width="70px"></div></li>
                <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center"><?php echo $pa->first_name; ?></div></li>
                <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center"><?php echo $pa->contact_number; ?></div></li>
                <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px"><?php echo $pa->nic; ?></div></li>
            </ul>
        </div>
    </li>
<?php
}
?>

</ul>
</div>
<ul>
 <li>
<div class="col-lg-6 c_no_padding">
<nav>
 <ul class="pagination">
     <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
     <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
     <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
     <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
     <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
     <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
     <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
 </ul>
</nav>
</div>
<div class="col-lg-6">
<div style="float: right;padding: 20px 0px">
 <span>Showing 1-10 of 20 results</span>
</div>
</div>
</li></ul>

</div>
</div>

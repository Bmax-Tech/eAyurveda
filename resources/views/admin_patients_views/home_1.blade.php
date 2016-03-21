
<div width="100%" style="padding: 5px" >
    <input type="hidden" name="page" id="page_number_hidden1" value="1">
    <input type="hidden" name="page" id="start1" value="0">
    <input type="hidden" name="page" id="end1" value="2">

    <input type="hidden" name="page" id="page_number_hidden2" value="1">
    <input type="hidden" name="page" id="start2" value="0">
    <input type="hidden" name="page" id="end2" value="2">

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

                <div class=" col-lg-12 c_no_padding" id="user1" style="height:370px;width:920px;margin-left:10px">
                    <!-- Users Load Here -->

                </div>
               <div class="col-lg-6 c_no_padding">
                   <nav id="search_doc_pagination_panel1">
                       <!-- Pagination Load Here -->
                   </nav>
               </div>
               <div class="col-lg-6">
                   <div style="float: right;padding: 20px 0px">
                       <span>Showing <span id="c_page_no1"></span> results</span>
                   </div>
               </div>
           </div>


           <div class="col-lg-12 pat_admin_tab_2 c_no_padding" id="pat_new_user_div" style="display: none">
                 <div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
                     New Users
                 </div>

                 <div class=" col-lg-12 c_no_padding" id="user2" style="height:370px;width:920px;margin-left:10px">
                     <!-- New users Load Here -->
                 </div>
               <div class="col-lg-6 c_no_padding">
                   <nav id="search_doc_pagination_panel2">
                       <!-- Pagination Load Here -->
                   </nav>
               </div>

               <div class="col-lg-6">
                   <div style="float: right;padding: 20px 0px">
                       <span>Showing <span id="c_page_no2"></span> results</span>
                   </div>
               </div>



           </div>
</div>

   <?php

  $txt='       <div class="col-lg-12" style="background-color:#CCC;width:920px" >   
                 <div class=""  > 
                    <ul class="nav nav-pills ">
						  <li role="presentation" class="active" ><a href="#">All Users</a></li>
						  <li role="presentation"><a href="#">New users</a></li>
						  <li role="presentation"><a href="#">Comments</a></li>
					</ul>
				    <div class=" col-lg-offset-2">
				      
		             <h1 style="color:green">Users</h1>
		             </div> 
			         <div class="col-lg-12 "  style="margin-left:20px">   
			           <hr>
                       <div class=" col-lg-12 c_no_padding" style="width:920px;margin-left:50px">
                       <ul class="c_top_ul">        	
                        ';  
                        for($i=1;$i<20;$i++){
                           $x=$i/4;
				            $txt=$txt.'<li>
							   <div class="c_doc_box col-lg-12 " <'; if($x!=0){ $txt=$txt.'style="px;margin-right:10px"'; } $txt=$txt.'>
								   <ul class="c_ul_1" style="width:252px">
								   <li style="width:100%"><div align="center"><img src="assets/img/community.png" width="70px"></div></li>
								   <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center"> Ananada Godagama</div></li>
								   <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center">atugasthota, Kandy</div></li>
								   <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px">15 Comments</div></li>
								   </ul>
								</div>
							</li>
						  ';
					    }
                       $txt=$txt.'
                       </ul>
                      </div>
				    </div>
				  </div>
				</div>
  ';
  
		echo $txt;
		?>
<?php

$txt='
<div class="container" style="background-color:#CCC;width:920px" >
   <div class="col-lg-12 ">     
	     <div class="col-lg-offset-1">
		   <h1 style="color:green">User Comments</h1>
		  
		</div> 
	        <hr>
	        <div class="col-lg-12 " style="margin-top:10px;margin-bottom:10px">';
                  	
  
                for($i=1;$i<5;$i++){            
                
               $txt=$txt.' <div class="container col-lg-12 col-md-12 col-sm-12" style="margin-top:20px;background-color:#32A041;border-radius:6px"> 
                               <div style="height:10px">
			                   </div>  
                               <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom:20px">
					   
					            <div class="c_font_5 col-lg-12">
                                       <div  class=" col-lg-3 " style="margin-top:20px "><b>User Name</b></div> 
						               <div  class=" col-lg-8 col-lg-offset-1 " style="margin-top:20px">Salika IRushan</div>
					            </div>
								<div class="c_font_5 col-lg-12" >
									  <div class=" col-lg-3 " style="margin-top:20px">  <b>Comment</b></div>
                                      <div class=" col-lg-8 col-lg-offset-1" style="margin-top:20px">A certification by the Board of Dermatology. Practitioners treat pediatric and adult patients with disorders of the skin, mouth, hair, and nails as well as a number of sexually transmitted diseases. They also have expertise in the care of normal skin, the prevention of skin diseases and cancers, and in the management of cosmetic disorders of the skin such as hair loss and scars.</div>
					            </div>
					            <div class="c_font_5 col-lg-12">
                                      <div class=" col-lg-3"  style="margin-top:20px">  <b>Commented Profile</b></div>
                                      <div class=" col-lg-8 col-lg-offset-1" style="margin-top:20px">Dr Aberathne</div>
					            </div>
					            <div class="c_font_5 col-lg-12">
                                      <div class=" col-lg-3 " style="margin-top:20px">  <b>Date</b></div>
                                      <div class=" col-lg-8 col-lg-offset-1" style="margin-top:20px">2015/01/17 10:54 a.m</div>
					            </div>
					         </div>
				             <div class=" col-lg-5 col-lg-offset-6  col-md-6 col-md-offset-2 col-xs-12 " style="margin-bottom:5px">
					            <div class="col-lg-7 col-md-4  col-sm-4  col-xs-12 ">
						            <input class="col-xs-12 btn btn-default " btn btn-success type="button" name="removecomment" value="Remove Comment" style="float:right" >
						        </div>
						        <div class="col-lg-4 col-lg-offset-1 col-md-4  col-sm-4  col-xs-12 ">
						            <input type="button" class="btn btn-default" name="removeuser" value="Remove User"style="float:right">
						        </div>
					         </div>
                           </div>';
                
            
                }
                        
$txt=$txt.' </div>
        
		
	    </div>	
</div>';

	echo $txt;

?>
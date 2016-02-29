<div width="100%" style="padding: 5px">
    <!--Search-->



    <div class="col-lg-12 doc_admin_tab_2 c_no_padding" id="t_bodycon">
        <p class="doc_admin_hd_1" style="margin-bottom: 5px">CONFIRM DOCTORS</p>



        <div class="col-lg-12" id="t_bodycon">

            <table class="table" style="background-color:rgba(43, 84, 44, 0.34);">

                <tr><td>ID</td><td>First Name</td><td>Last Name</td><td>City</td><td>Gender</td></tr>
                <input type="hidden" id="doc_remove_id" value="0"/>
                <?php
                foreach($doctors_r as $rd){
                ?>

                <tr ><td><?php echo $rd->id; ?></td><td><?php echo $rd->first_name; ?></td><td><?php echo $rd->last_name; ?></td><td><?php echo $rd->city;?></td><td><?php echo $rd->gender; ?></td><td align="left" style="width:100px"><button type="button"  style="width:100px;background-color:rgba(102, 102, 102, 0.31)" onClick="view_doctor_profile('<?php echo $rd->id; ?>')">
                            View &nbsp;&nbsp;
                        </button></td><td align="left" style="width:100px"><button type="button" onClick="re('<?php echo $rd->id; ?>')"  style="width:100px;background-color:rgba(162, 46, 46, 0.36)">Reject</button></td></tr>

                <?php
                }
                ?>

            </table>

        </div>
    </div>


</div>




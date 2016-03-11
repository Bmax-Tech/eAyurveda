
<div>
    <div class=" col-lg-12 c_no_padding" style="width:880px;margin-left:10px;margin-top:50px">
        <ul class="c_top_ul">
            <?php

            $count=1;
            foreach($comment as $f_ob)
            {
            ?>
            <li class="col-lg-3" >
                <div class="pat_doc_box col-lg-12 "  >
                    <ul class="c_ul_1 " style="width:180px" >
                        <li style="width:100%"><div align="center"><img src="assets/img/community.png" width="70px"></div></li>
                        <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center"><?php echo $f_ob->did; ?></div></li>
                        <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center">Katugasthota, Kandy</div></li>
                        <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px">Specialized in neurology</div></li>

                    </ul>
                    <div class="change_<?php echo $count; ?>"  style="width:100%;display:none;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px;background-color:green">change</div></div>
                </div>
            </li>
            <?php
            $count++;
            }
            ?>

        </ul>
    </div>
</div>


<div class="col-lg-12 pat_admin_tab_2 c_no_padding" id="pat_all_user_div">
    <div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
        All Users
    </div>

    <div class=" col-lg-12 c_no_padding" style="width:920px;margin-left:10px">
        <ul class="c_top_ul">
            <?php
            foreach($comment as $pa) {
            ?><li>
                <div class="pat_doc_box col-lg-12 "  onclick="inapuser_view('<?php echo $pa->id; ?>')">
                    <ul class="c_ul_1" style="width:252px">
                        <li style="width:100%"><div align="center"><img src="assets/img/community.png" width="70px"></div></li>
                        <li style="width:100%;margin-top:20px"><div class="c_font_5" style="text-align:center"><?php echo $pa->first_name; ?></div></li>
                        <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center"><?php echo $pa->nic; ?></div></li>
                        <li style="width:100%;margin-top:15px"><div class="c_font_5" style="text-align:center;font-size:13px"><?php echo $pa->spam_count; ?></div></li>
                    </ul>
                </div>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
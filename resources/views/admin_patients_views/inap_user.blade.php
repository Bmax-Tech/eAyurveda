<div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
    Blocked Users
</div>

<div class=" col-lg-12 c_no_padding" style="width:920px;margin-left:10px">
    <ul class="c_top_ul">
        <?php
        foreach($comment as $pa) {
        ?>
        <li>

            <div class="c_inap_user_view_box container" style="cursor:pointer" onclick="inapuser_view('<?php echo $pa->user_id; ?>')" style="">

                <div  style="float:left;height:51px;width:51px;border-radius: 30px;background-color: white;margin-left:-14px;margin-top:2px">
                    <?php

                    if($pa->image_path == ""){
                        $img = "profile_images/default_user_icon.png";
                    }else{
                        $img = $pa->image_path;
                    }
                    ?>
                    <img style="height:45px;width:45px;border-radius: 30px;margin-left:3px;margin-top:3px" src="{{ URL::asset($img) }}" >
                </div>

                <div class="c_font_5" style="float:left;margin-left:15px;width:190px"><?php echo $pa->first_name; ?>&nbsp<?php echo $pa->last_name; ?></div>
                <div class="c_font_5" style="margin-left:52px;"><?php echo $pa->email; ?></div>
                <div class="c_font_5" style="color: yellow;margin-left:52px;">Blocked comments &nbsp&nbsp&nbsp<?php echo $pa->spam_count; ?></div>
            </div>
        </li>

        <?php
        }
        ?>
            <div id="resultNoInap" style="display: none;padding-top: 150px">
                <span style="font-size: 32px;margin-left: 300px">No Result Found ! </span>
            </div>
    </ul>
</div>
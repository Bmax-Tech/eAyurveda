<div style="background: rgb(113, 125, 97);color: #FFF;font-size: 15px;padding: 7px 10px;border-bottom: 3px solid #035600;margin-bottom: 10px">
    All Users
</div>

<div class=" col-lg-12 c_no_padding" style="width:920px;margin-left:10px">
    <ul class="c_top_ul">
        <?php
        foreach($comment as $pa) {
        ?>
        <li>

            <div class=" container" onclick="inapuser_view('<?php echo $pa->user_id; ?>')" style="margin-left:10px;width:280px;background-color: #349641; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.58);border-radius:13px;margin-top:10px">

                <div  style="float:left;height:51px;width:51px;border-radius: 30px;background-color: white;margin-left:-14px;margin-top:2px">
                    <img style="height:45px;width:45px;border-radius: 30px;margin-left:3px;margin-top:3px" src="{{ URL::asset($pa->image_path) }}" >
                </div>
                <div class="c_font_5" style="float:left;margin-left:15px;width:190px"><?php echo $pa->first_name; ?></div>
                <div class="c_font_5" style="margin-left:52px;"><?php echo $pa->contact_number; ?></div>
                <div class="c_font_5" style="margin-left:52px;">Comments &nbsp&nbsp&nbsp<?php echo $pa->spam_count; ?></div>
            </div>
        </li>

        <?php
        }
        ?>
    </ul>
</div>
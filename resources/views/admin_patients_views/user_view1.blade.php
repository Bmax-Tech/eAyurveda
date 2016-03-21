<ul class="c_top_ul">
    <?php
    foreach($patients1 as $pa) {
    ?><li>
        <div class=" container" onclick="user_view('<?php echo $pa->user_id; ?>')" style="margin-left:10px;width:280px;background-color: #349641; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.58);border-radius:13px;margin-top:10px">

            <div  style="float:left;height:51px;width:51px;border-radius: 30px;background-color: white;margin-left:-14px;margin-top:2px">
                <img style="height:45px;width:45px;border-radius: 30px;margin-left:3px;margin-top:3px" src="{{ URL::asset($pa->image_path) }}" >
            </div>
            <div class="c_font_5" style="float:left;margin-left:15px;width:150px;margin-top:5px"><?php echo $pa->first_name; ?></div>
            <div class="c_font_5" style="margin-left:52px;"><?php echo $pa->email; ?></div>
        </div>

    </li>
    <?php
    }
    ?>

</ul>
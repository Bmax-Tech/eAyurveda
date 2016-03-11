<?php
    foreach($doctors as $doc){

        if($doc->doc_type == "NON_FORMAL"){
            $img = URL::asset('profile_images/default_user_icon.png');
        }else{
            $img = URL::asset('profile_images/doctor_images/doc_profile_img_'.$doc->user_id.'.png');
        }
?>
<div class="col-lg-12 c_doc_result_div">
    <div class="col-lg-2 c_no_padding">
       <img src="<?php echo $img; ?>" width="100%">
    </div>
    <div class="col-lg-7 c_no_padding" style="padding-left: 10px">
        <div style="color: #0F7400;font-size: 18px;padding:5px 0px;font-weight: 500">
            Dr. {{$doc->first_name}} {{$doc->last_name}}
        </div>
        <div style="padding: 5px 0px;font-size: 13px;color: #3c3c3c">
            <span style="padding-right: 5px">Location </span>:&nbsp;&nbsp;&nbsp;{{$doc->address_1}}, {{$doc->address_2}}, {{$doc->city}}, {{$doc->district}}
        </div>
        <div style="padding: 0px 0px;font-size: 13px;color: #3c3c3c">
            <span style="padding-right: 13px">District </span>:&nbsp;&nbsp;&nbsp;{{$doc->district}}
        </div>
        <div style="padding: 10px 0px">
            <hr class="c_hr_1"/>
        </div>
        <div style="color: #075325;font-size: 13px">
            {{ substr($doc->description,0,300) }}<?php if(strlen($doc->description) > 300){ ?>....<?php } ?>
        </div>
    </div>
    <div class="col-lg-3" style="padding-left: 25px">
        <div>
            Rating
        </div>
        <div>
            <?php
            for($i=1;$i<=5;$i++){
                if($i<=$doc->rating){
                ?>
                    <img src="{{ URL::asset('assets/img/star_2.png') }}" class="c_sm_star">
                <?php
                }else{
                ?>
                    <img src="{{ URL::asset('assets/img/star.png') }}" class="c_sm_star">
                <?php
                }
            }
            ?>
        </div>
        <div style="padding-top: 7px">
            Specialized on
        </div>
        <div style="margin-top: 10px">
            <ul style="color: #000;padding-left: 18px;font-size: 12px;list-style: disc">
                <?php if(($doc->spec_1) != ""){ ?><li>{{ $doc->spec_1 }}</li><?php } ?>
                <?php if(($doc->spec_2) != ""){ ?><li>{{ $doc->spec_2 }}</li><?php } ?>
                <?php if(($doc->spec_3) != ""){ ?><li>{{ $doc->spec_3 }}</li><?php } ?>
                <?php if(($doc->spec_4) != ""){ ?><li>{{ $doc->spec_4 }}</li><?php } ?>
                <?php if(($doc->spec_5) != ""){ ?><li>{{ $doc->spec_5 }}</li><?php } ?>
            </ul>
        </div>
        <div>
            <a href="/profile/Dr.{{$doc->first_name}}{{$doc->last_name}}/{{$doc->doc_id}}" style="text-decoration: none;color: #FFF;"><button class="c_doc_view_btn">View Profile</button></a>
        </div>
    </div>
</div>
<?php
    }
    if(count($doctors) == 0){
?>
    <div style="margin: 30px">
        <div style="font-size: 30px;color:#ff9715 ">Oops! No results were found.</div>
        <div style="font-size: 14px;color: #828282;">We`re sorry, It`s seems as though we were not able to locate exactly what you were looking for. Please try to search again or contact our customer service</div>
    </div>
<?php
    }
?>

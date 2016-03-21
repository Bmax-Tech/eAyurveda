<?php
    foreach($doctors as $doc){
?>
<div class="col-lg-12 c_doc_result_div">
    <div class="col-lg-2 c_no_padding">
       <img src="assets/img/doc_user.png" width="100%">
    </div>
    <div class="col-lg-7 c_no_padding" style="padding-left: 10px">
        <div style="color: #0F7400;font-size: 18px;padding:5px 0px;font-weight: 500">
            Dr. {{$doc->first_name}} {{$doc->last_name}}
        </div>
        <div style="padding: 5px 0px;font-size: 13px;color: #3c3c3c">
            Location :&nbsp;&nbsp;&nbsp;{{$doc->address_1}}, {{$doc->address_2}}, {{$doc->city}}
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
                <li>{{$doc->spec_1}}</li>
                <li>{{$doc->spec_2}}</li>
                <li>{{$doc->spec_3}}</li>
                <li>{{$doc->spec_4}}</li>
                <li>{{$doc->spec_5}}</li>
            </ul>
        </div>
        <div>
            <a href="/profile/Dr.{{$doc->first_name}}{{$doc->last_name}}/{{$doc->id}}" style="text-decoration: none;color: #FFF;"><button class="c_doc_view_btn">View Profile</button></a>
        </div>
    </div>
</div>
<?php
    }
?>

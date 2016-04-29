<?php
    foreach($doctors as $doc){

        if($doc->doc_type == "NON_FORMAL"){
            $img = URL::asset('profile_images/default_user_icon.png');
        }else{
            $img = URL::asset('profile_images/doctor_images/doc_profile_img_'.$doc->user_id.'.png');
        }
        $link_to_profile = '/profile/Dr.'.$doc->first_name.''.$doc->last_name.'/'.$doc->id;
?>

<div class="col-lg-4 wow slideInUp">
    <div class="c_phy_doc_cards" onclick="location.href='<?php echo $link_to_profile; ?>';">
<?php
        if($doc->doc_type != "NON_FORMAL"){
?>
        <img src="{{ URL::asset('assets/img/recommended.png') }}" class="c_phy_rec_icon">
<?php
        }
?>
        <div style="background-image: url({{ $img }})" class="c_phy_doc_icon"></div>
        <p class="c_phy_doc_heading">Dr. {{$doc->first_name}} {{$doc->last_name}}</p>
        <p style="text-align: center;margin-top: 5px;margin-bottom: 5px">
            <?php
            for($i=1;$i<=5;$i++){
            if($i<=$doc->rating){
            ?>
            <img src="{{ URL::asset('assets/img/star_phy.png') }}" class="c_sm_star">
            <?php
            }else{
            ?>
            <img src="{{ URL::asset('assets/img/star.png') }}" class="c_sm_star">
            <?php
            }
            }
            ?>
        </p>
        <p class="c_phy_doc_des">{{ substr($doc->description,0,300) }}<?php if(strlen($doc->description) > 300){ ?>....<?php } ?></p>
    </div>
</div>

<?php
    }
    if(count($doctors) == 0){
?>
    <div style="margin: 30px">
        <div style="font-size: 30px;color:#ff9715 ">Oops! No physicians were found.</div>
        {{--<div style="font-size: 14px;color: #828282;">We`re sorry, It`s seems as though we were not able to locate exactly what you were looking for. Please try to search again or contact our customer service</div>--}}
    </div>
<?php
    }
?>

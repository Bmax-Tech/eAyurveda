<?php

$servername = "localhost";
$username = "root";
$password = "kitkat";
$dbname = "ayurvedalk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT catName, catDescription, imageURL FROM forumCategory";
$result = $conn->query($sql);


?>
<script src="{{ URL::asset('assets_social/js/bootbox.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/jquery-1.12.0.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    function deleteCategory(catName) {
        var cat = catName.toString();
        $.ajax({
            type:'GET',
            url:'forum/category/delete/'+cat+'/',
            cache: true,
            success: function(data){
                $("#availableForumCatList").html(data.page);
            }
        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#forumCatImageDiv").attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<div>
    <div class="forumAdminHead">
        Add New Category
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
    </div>
    <div id="addCategory">
        <div style="">
            {!! Form::open(array('url' => 'forum/addcategory', 'enctype' => 'multipart/form-data')) !!}
            <div class="forumLeftCol">
                <div class="forumTxtLabel">
                    Category Name
                </div>
                <div>

                    {!! Form::text('catName','',array(
                        'placeholder' => 'Category (eg: Medicine)',
                        'class' => 'forumCatNameTxt'
                    )) !!}
                </div>
                <div class="forumTxtLabel" style="margin-top: 20px;">
                    Category Description
                </div>
                <div>
                    {!! Form::textarea('catDescription','',array(
                        'placeholder' => 'Describe the category',
                        'class' => 'forumCatDescriptionTxt'
                    )) !!}
                </div>
            </div>
            <div class="forumRightCol">
                <div class="forumTxtLabel" style="margin-bottom: 3px !important">
                    Select Image
                </div>
                <img id="forumCatImageDiv" src="assets_social/img/upload_image.png">
                <div>
                    <button id="forumCatImgUploadBtn" type="button" onclick="$('#forumCatImgFileChooser').trigger('click');">Browse</button>
                    {{--<input type="file" name="forumCatImgFileChooser" id="forumCatImgFileChooser" style="display: none;">--}}
                    {!! Form::file('catImage', array(
                        'id' => 'forumCatImgFileChooser',
                        'style' => 'display: none;',
                        'onchange' => 'readURL(this);'
                    )) !!}
                </div>
            </div>

            <div style="padding-top: 310px;">

                {!! Form::submit('Add Category', array(
                    'id' => 'forumCatSaveBtn'
                )) !!}
                {{ Form::hidden('hidden', 'home_11') }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="forumAdminHead">
        Categories Available
        <div style="height: 1px; background-color: #aaa; width: 100%; margin-top: 5px;"></div>
    </div>
    <div id="availableForumCatList">

        <?php if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?>

                <div class="catCard">
                    <div class="catImageViewFrame" style="background-image: url('assets_social/img/forum_categories/<?= $row["imageURL"] ?>');">
                        <div class="catImageView">
                            <?= $row["catName"] ?>
                            <div class="catImageBtnDiv">
                                <button id="forumButton1" class="btnForumCard btnForumRed" onclick="bootbox.confirm('Are you sure you want to delete this category? All questions assigned to category will get removed.', function(result) {if (result) {deleteCategory('<?= $row["catName"] ?>')}});"></button>
                                {{--<button id="forumButton1" class="btnForumCard btnForumOrange"></button>--}}
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            } else {
                echo "0 results";
            }
            $conn->close(); ?>



        <div class="spacer" style="clear: both;"></div>
    </div>
</div>

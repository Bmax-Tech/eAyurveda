/**
 * Created by NuttLoose on 2/9/2016.
 */
$(document).ready(function () {
    var keyword = $("#txtSearchItem").val();
    $.ajax({
        type:'GET',
        url:'forum/getcategories/',
        cache: true,
        success: function(data){
            $("#availableForumCatList").html(data.page);
        }
    });


    $("#txtSearchItem").focusin(function () {
        $("#btnSearchItem").addClass("btnSearchItemHovered");
    });
    $("#txtSearchItem").focusout(function () {
        $("#btnSearchItem").removeClass("btnSearchItemHovered");
    });
    $("#txtSearchItem").focus();
    var url = window.location.href;
    var qvariable1 = url.substring(url.indexOf("?") + 1, url.indexOf("="));
    var qvalue1 = url.substring(url.indexOf("=") + 1);
    if (qvariable1 == "search") {
        document.getElementById('txtSearchItem').value = qvalue1;
    }

    $(function() {
        $("#txtSearchItem").keypress(function (e) {
            if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
                $('#btnSearchItem').click();
                return false;
            } else {
                return true;
            }
        });
    });
});

function displayResults(){
    var keyword = $("#txtSearchItem").val();
    $.ajax({
        type:'GET',
        url:'forum/search/'+keyword+'/',
        cache: true,
        success: function(data){
            $("#resultList").html(data.page);
        }
    });
};

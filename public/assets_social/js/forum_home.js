/**
 * Created by NuttLoose on 2/9/2016.
 */
$(document).ready(function () {
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

    function displayResults(){
        var keyword = $("#txtSearchItem").val();
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: "{{ URL::route('forum/search/" + keyword + "') }}",
            data:dataString,
            cache: false,
            success: function (data) {
                $("#resultList").html="<h1>Fuck yeah!</h1>"
            }
        });
    };

});
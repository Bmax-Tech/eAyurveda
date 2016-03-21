/**
 * Created by NuttLoose on 3/10/2016.
 */

$(document).ready(function(e) {
    var urlParameter = ""
    urlParameter = getUrlParameter('display');
    if(urlParameter === undefined) {
        load_profile_page('1');
        if (window.history.replaceState) {
            window.history.pushState("", "Forum Profile - eAyurveda", "?display=profile");
        }
    }
    if(urlParameter == "profile") {
        load_profile_page('1');
    }
    if(urlParameter == "activity") {
        load_profile_page('2');
    }
    if(urlParameter == "stats") {
        load_profile_page('3');

        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Category', 'Number of Answers'],
                ['General',     11],
                ['Treatment',      4],
                ['Medicine',  3],
                ['Products', 2],
                ['Other',    7]
            ]);

            var options = {
                title: '',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);

            var chart2 = new google.visualization.PieChart(document.getElementById('donutchart2'));
            chart2.draw(data, options);
        }

    }
    if(urlParameter == "messages") {
        load_profile_page('4');
    }
});

function load_profile_page(para_1){
    $.ajax({
        type:'GET',
        url:'profilepage/profile_'+para_1+'.blade.php',
        cache: false,
        success: function(data){
            $("#ContentDiv").html(data);

            $("#tab1").removeClass("tabActive tabActive1");
            $("#tab2").removeClass("tabActive tabActive2");
            $("#tab3").removeClass("tabActive tabActive3");
            $("#tab4").removeClass("tabActive tabActive4");

            $("#tab"+para_1).addClass("tabActive");
            $("#tab"+para_1).addClass("tabActive"+para_1);

            if(para_1 == 1) {
                if (window.history.replaceState) {
                    window.history.pushState("", "Forum Profile - eAyurveda", "?display=profile");
                }
            } else if(para_1 == 2) {
                if (window.history.replaceState) {
                    window.history.pushState("", "Forum Profile - eAyurveda", "?display=activity");
                }
            } else if(para_1 == 3) {
                if (window.history.replaceState) {
                    window.history.pushState("", "Forum Profile - eAyurveda", "?display=stats");

                    google.charts.setOnLoadCallback(drawChart);
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Category', 'Number of Answers'],
                            ['General',     11],
                            ['Treatment',      4],
                            ['Medicine',  5],
                            ['Products', 3],
                            ['Other',    7]
                        ]);

                        var options = {
                            title: '',
                            pieHole: 0.4,
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                        chart.draw(data, options);

                        var chart2 = new google.visualization.PieChart(document.getElementById('donutchart2'));
                        chart2.draw(data, options);
                    }

                }
            } else if(para_1 == 4) {
                if (window.history.replaceState) {
                    window.history.pushState("", "Forum Profile - eAyurveda", "?display=messages");
                }
            }

        }
    });
};

function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};


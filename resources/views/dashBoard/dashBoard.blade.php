<div style=" height:300px">

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([

                ['use (day)',  'usage'],
                ['1st March', 8.4,        ],
                ['1st March',     6.9,        ],
                ['1st March',        6.5,        ],
                ['1st March',      4.4,         ],
            ]);

            var options = {
                title: 'Monthly usage',
                vAxis: {title: 'usage'},
                isStacked: true
            };

            var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>

    <!--Div that will hold the dashboard-->
    <div id="chart_div" style="width: 900px; height: 500px;"></div>

</div>

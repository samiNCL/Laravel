

<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style type="text/css">
        .box{
            width:800px;
            margin:0 auto;
        }
        *{style="background-color: whitesmoke"}

    </style>
    <script type="text/javascript">
        let analytics = <?php echo $word; ?>

        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
            var data = google.visualization.arrayToDataTable(analytics);
            var options = {
                title : 'Top 5 words frequency',
                pieSliceText: 'label',
                slices: {
                    0: {offset: 0.0},
                    0: {offset: 0.1},
                    0: {offset: 0.1},
                    0: {offset: 0.1},
                },



                };
            var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body style="background-color: whitesmoke">
<br />
<div class="container">

        </div>
        <div class="panel-body" align="center">
            <div id="pie_chart" style="width:600px; height:300px;border-style: inset;">

            </div>
        </div>
</body>
</html>



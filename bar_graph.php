<?php
// Include your database configuration file
include "config.php";

// Query to retrieve payment data
$sql = "SELECT MONTH(date) as month, COUNT(*) as count, SUM(total_price) as total_sum FROM `order` GROUP BY MONTH(date)";

$result = $link->query($sql);

// Fetch data
$data = array();
while ($row = $result->fetch_assoc()) {
    // Convert numerical month to string representation
    $month_string = date("F", mktime(0, 0, 0, $row['month'], 1));
    $row['month'] = $month_string;
    $data[] = $row;
}

// Close the database connection
$link->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Method Distribution</title>
	
	<script src="bootstrap.min.js"> </script>
	<link rel="stylesheet" href="bootstrap.min.css">
	
    <!-- Load Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Month');
            data.addColumn('number', 'Total Payments');
            data.addColumn('number', 'Total Sum');
            data.addRows([
                <?php foreach ($data as $row): ?>
                    ['<?php echo $row['month']; ?>', <?php echo $row['count']; ?>, <?php echo $row['total_sum']; ?>],
                <?php endforeach; ?>
            ]);

            var options = {
                title: 'Payment Report on Month Wise',
                legend: { position: 'bottom' },
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
	<style>
        #chart_div {
            width: 900px;
            height: 500px;
            margin: 0 auto; /* Center align the chart */
        }
    </style>
</head>
<body>
    <div id="chart_div" style="width: 900px; height: 500px  ;"></div>
	
	<div> 
	<center> <a href='navigation.php'  class = 'btn btn-info'  width='100%'> BACK </a>
  </center>
	</div>
	
</body>
</html>

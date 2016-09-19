<?php
  $userdata = $db->all();
  $years = [
    "1600's" => [],
    "1700's" => [],
    "1800's" => [],
    "1900's" => [],
    "2000's" => []
  ];

  foreach ($userdata as $data) {
      $bornDate = $data['born'];
      $lastPart = explode('-', $bornDate);
      $year = intval(end($lastPart));

      switch ($year) {
        case $year >= 1600 && $year < 1700:
            array_push($years["1600's"], $year);
          break;

        case $year >= 1700 && $year < 1800:
          array_push($years["1700's"], $year);
          break;

        case $year >= 1800 && $year < 1900:
          array_push($years["1800's"], $year);
          break;
        case $year >= 1900 && $year < 2000:
          array_push($years["1900's"], $year);
          break;
        case $year >= 2000:
          array_push($years["2000's"], $year);
          break;
        default:
          break;
      }
  }
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

  // Load the Visualization API and the corechart package.
  google.charts.load('current', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(drawChart);

  // Callback that creates and populates a data table,
  // instantiates the pie chart, passes in the data and
  // draws it.
  function drawChart() {

    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Years');
    data.addColumn('number', 'Men');
    data.addRows([
          ["1600's", <?= count($years["1600's"]) ?>],
          ["1700's", <?= count($years["1700's"]) ?>],
          ["1800's", <?= count($years["1800's"]) ?>],
          ["1900's", <?= count($years["1900's"]) ?>],
          ["2000's", <?= count($years["2000's"]) ?>]
        ]);

    // Set chart options
    var options = {'title':'Birth rates',
                   'width':700,
                   'height':500};

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>
<div class="container">
  <div class="row">
    <div id="chart_div"></div>
  </div>
</div>

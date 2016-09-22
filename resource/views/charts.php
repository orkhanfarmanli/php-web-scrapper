<?php
  $userdata = $db->all();
  $years = [
    "1600's" => [],
    "1700's" => [],
    "1800's" => [],
    "1900's" => [],
    "2000's" => [],
  ];

  // getting months in 3 char format and pushing them to an array
    $months = [];
    for ($m = 1; $m <= 12; ++$m) {
        $month = date('M', mktime(0, 0, 0, $m, 1, date('Y')));
        $months[] = [$month];
    }

  foreach ($userdata as $data) {

      // cutting years out of born date
      $bornDate = $data['born'];
      $lastPart = explode('-', $bornDate);
      $year = intval(end($lastPart));

      // cutting months out of born date
      if (!ctype_digit($bornDate)) {
          $monthName = substr($bornDate, 3, 3);
          for ($i = 0; $i < count($months); ++$i) {
              if ($monthName == $months[$i][0]) {
                  array_push($months[$i], $monthName);
              }
          }
      }

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

// first chart
  google.charts.load('current', {'packages':['corechart']});

  google.charts.setOnLoadCallback(drawChart);

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

    var options = {'title':'Birth rates',
                   'width':550,
                   'height':400,
                  colors: ['#00796B']
                };

    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }




    google.charts.setOnLoadCallback(drawSecondChart);

    function drawSecondChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Months');
      data.addColumn('number', 'Men');
      data.addRows([
        // as there was too much data in months I decided to put them into a foreach loop to visualize the chart
        <?php
          foreach ($months as $month) {
              echo '["'.$month[0].'", '.(count($month) - 1).'],';
          }
         ?>
]);

      // Set chart options
      var options = {'title':'Birth rates',
                     'width':1000,
                     'height':400,
                     colors:['#607D8B']};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ColumnChart(document.getElementById('second_chart_div'));
      chart.draw(data, options);
    }



</script>
<div class="container">
  <div class="row">
    <div id="chart_div" class="pull-left"></div>
    <div id="second_chart_div" class="pull-left"></div>
  </div>
</div>

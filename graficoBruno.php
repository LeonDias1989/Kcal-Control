<?php
    include "classeBD.php";
    $acoes = new funcoesBD;
    if($acoes){
      $teste = $acoes->conectar();
      $sql = "SELECT *,STR_TO_DATE(data_pesagem, '%d/%m/%y') FROM histrico_peso ORDER BY data_pesagem DESC"; 
      $result = mysqli_query($teste, $sql); 
    }
?>
<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
        <?php
        while($row = mysqli_fetch_array($result)) {
          echo "['".$row['data_pesagem'] ."',".$row['peso'] ."],";

        }
        ?>

        ]);

        // Set chart options
        var options = {'title':'Historico peso:',
                       'width':800,
                        curveType: 'function',
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>
<?php include 'actions/logged.php';
if (@$_SESSION['acesso'] == 1){
    } else {
        header("location:../index.php");
    } ?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Fontus | Gráfico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/login.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.0', {'packages':['corechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Data');
        data.addColumn('number', 'Volume');
        data.addRows([
        <?php
          include 'config.php';
          $sql = "SELECT hora, fluxo, nivel FROM log_caixa where cod_caixa = '".$_SESSION['cod_caixa']."' LIMIT ".$_POST['limite'];
          $result = mysqli_query($con, $sql);

          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "['" . $row["hora"]. "'," . $row["nivel"] . "],";
              }
          }
          mysqli_close($con);
        ?>]);
        var options = {'title':'Volume em determinado momento',
                       'width':800,
                       'height':600};

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <?php include 'header.php'; ?>
    <div class="row">
      <div class="small-12 columns">
        <div id="chart_div"></div>
      </div>
    </div>
  </body>
</html>

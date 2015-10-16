<!doctype html>
<html class="no-js" lang="en">
  <?php include 'actions/logged.php';
  if (@$_SESSION['acesso'] == 1){
    } else {
        header("location:../index.php");
    }?>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fontus | Log</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/tabela.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
  <?php include 'header.php'; ?>
  <br>
    <div class="row">
      <div class="small-6 small-centered columns">
      <h1>Gerar Gráfico</h1>
      <form action="grafico.php" method="post">
      <div class="row collapse postfix-round">
        <div class="small-9 columns">
          <input type="text" name="limite" placeholder="Quatidade de registros:">
        </div>
        <div class="small-3 columns">
          <input type="submit" class="button postfix" value="Gerar">
        </div>
      </div>
    </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <table>
              <thead>
                <tr>
                  <td>
                    data
                  </td>
                  <td>
                    fluxo
                  </td>
                  <td>
                    nivel
                  </td>
                </tr>
              </thead>
              <tbody>
                <?php
                  include 'config.php';
                  $sql = "SELECT hora, fluxo, nivel FROM log_caixa where cod_caixa = ".$_SESSION['cod_caixa'];
                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr><td>" . $row["hora"]. "</td><td>" . $row["fluxo"]. "</td><td>" . $row["nivel"]. "</td></tr>";
                      }
                  } else {
                    echo "<tr><td>nenhum</td><td>registro</td><td>encontrado</td></tr>";
                  }
                  mysqli_close($con);
                ?>
              </tbody>
            </table>
        </div>
    </div>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>

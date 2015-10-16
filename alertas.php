<?php include 'actions/logged.php';
if (@$_SESSION['acesso'] == 1){
    } else {
        header("location:../index.php");
    }?>
<!doctype html>
<html class="no-js" lang="en">
  <?php include 'actions/logged.php'; ?>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fontus | Alertas</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/tabela.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
  <?php include 'header.php'; ?>
  <br>
    <div class="row">
        <div class="small-12 columns">
            <table>
              <thead>
                <tr>
                  <td>
                    data
                  </td>
                  <td>
                    alerta
                  </td>
                </tr>
              </thead>
              <tbody>
                <?php
                  include 'config.php';
                  $sql = "SELECT hora, alerta FROM alertas where cod_caixa = ".$_SESSION['cod_caixa']." order by hora desc limit 10";
                  $result = mysqli_query($con, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr><td>" . $row["hora"]. "</td><td>" . $row["alerta"]. "</td></tr>";
                      }
                  } else {
                      echo "<tr><td>sem</td><td>alertas</td></tr>";
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

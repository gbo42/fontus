<?php include 'actions/logged.php';
if (@$_SESSION['acesso'] == 1){
    } else {
        header("location:../home.php");
    }?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fontus | Configuração</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/config.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
  <?php
    include 'header.php';
    include 'config.php';
    $sql = "SELECT nivel_min, fluxo_max, volume FROM info_caixa where cod_caixa = ".$_SESSION['cod_caixa']." order by data desc limit 1";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['config'] = $row;
      }
    mysqli_close($con);
  ?>

    <div class="row">
      <div class="small-12 columns text-center">
        <h2>Volume: <?php echo $_SESSION['config']['volume']; ?> L</h2>
      </div>
      <form method="post" action="actions/confcaixa.php">
        <div class="small-12 medium-6 columns">
          <h2>Fluxo máximo:</h2>
          <p>(em litros por hora)</p>
          <input type="number" name="fluxo" value="<?php echo $_SESSION['config']['fluxo_max']; ?>">
        </div>
        <div class="small-12 medium-6 columns">
          <h2>Nivel minimo:</h2>
          <p>(em porcentagem)</p>
          <input type="number" name="nivel" value="<?php echo $_SESSION['config']['nivel_min']; ?>">
        </div>
        <div class="small-12 columns text-center">
          <input type="submit" value="alterar" class="button success">
        </div>
      </form>
    </div>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>

<?php
    include 'actions/logged.php';
    if (@$_SESSION['acesso'] == 2 or @$_SESSION['acesso'] == 3){
    } else {
        header("location:../home.php");
    }?>
<!doctype html>
<html class="no-js" lang="en">
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
          <h1> Dados sobre o sistema serão mostrados aqui: </h1>
          <p> Quantidade de registros </p>
          <p> Quantidade de usuários registrados </p>
        </div>
    </div>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
 </body>

</html>

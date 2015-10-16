<!doctype html>

<?php
  session_start();
  if (@$_SESSION['logged'] == True){   header("location:home.php");
  } else {  }?>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fontus | Login</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/login.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body class="texto_centro">
    <?php include 'header.php'; ?>
    <div class="row">
      <br>
      <div class="small-12 medium-8 columns small-centered panel">
        <h1> Login </h1>
        <form method="post" action="actions/logincheck.php">
          <input type="text" placeholder="Login:" id="input" name="cod_usu"> <br>
          <input type="password" placeholder="Senha:" id="input" name="senha">
          <?php $erro = $_GET['erro']; if($erro == "uos"){echo '<small class="error">Usuário ou Senha incorreto.</small>';} ?>
          <div class="row">
            <div class="small-12 columns small-centered">
                <input class="button" type="submit" value="Entrar" id="submit">
            </div>
          </div>
        </form>
          <div class="small-12 columns small-centered">
            <a href="fontus.pe.hu" class="button secondary">
              ir para o site
            </a>
          </div>
      </div>
    </div>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>

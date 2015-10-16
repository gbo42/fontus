<?php include 'actions/logged.php'; ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fontus | Nova Senha</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/troca_senha.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="row">
        <div class="small-12 medium-6 medium-centered columns">
          <label>senha
            <input type="password" placeholder="sua senha atual" name="senha">
            <?php $erro = $_GET['erro']; if($erro == "senha"){echo '<small class="error">Senha incorreta.</small>';} ?>
          </label>
      </div>
    </div>
    <div class="row">
      <form method="post" action="actions/trocasenha.php">
        <div class="small-12 medium-6 medium-centered columns">
          <label>nova senha
            <input type="password" placeholder="sua nova senha" name="senhanova">
          </label>
        </div>
        <div class="small-12 columns" id="submit">
          <input type="submit" class="button" value="trocar senha">
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
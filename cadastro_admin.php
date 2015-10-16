<?php include 'actions/logged.php'; ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fontus | Cadastro</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/cadastro.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php include 'header.php'; ?> 
    <form method="post" action="actions/cadastro.php">
        <div class="row">
        <fieldset>
                <legend>Administrador</legend>
                <div class="small-12 medium-6 columns">
                    <label>login
                        <input type="text" name="cod_usu">
                    </label>
                </div>
                <div class="small-12 medium-6 columns">
                    <label>senha
                        <input type="password" name="senha">
                    </label>
                </div>
                <div class="small-12 medium-6 columns">
                    <label>nome
                        <input type="text" name="nome">
                    </label>
                </div>
                <div class="small-12 medium-6 columns">
                    <label>cpf
                        <input type="text" name="cpf">
                    </label>
                </div>
                <div class="small-12 columns">
                    <label>endereço
                        <input type="text" name="end">
                    </label>
                </div>   
            </fieldset>
        </div>
        <div class="small-12 columns centrado">
            <input type="submit" class="button">
        </div>
    </form>

    
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
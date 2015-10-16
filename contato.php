<?php include 'actions/logged.php'; ?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fontus | Contato</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/contato.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
  <?php include 'header.php'; ?>
    <div class="row">
      <form method="post" action="actions/email.php">
        <div class="small-12 columns">
            <label>Assunto
                <input type="text" placeholder="insira o assunto da mensagem aqui" name="assunto">
            </label>
        </div>
        <div class="large-12 columns">
          <label>Mensagem
            <textarea placeholder="insira sua mensagem aqui" id="mensagem" name="mensagem"></textarea>
          </label>
        </div>
        <div class="small-8 columns">
            <label>Senha
                <input type="password" placeholder="digite sua senha" name="senha">
            </label>
        </div>
        <div class="small-4 columns">
            <input type="submit" class="button" id="submit">
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
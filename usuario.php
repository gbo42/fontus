<?php include 'actions/logged.php'; ?>
<!doctype html>
<html class="no-js" lang="en">  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fontus | Usuario</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php include 'header.php'; ?>
    <div class="row">
        <div class="large-12 columns">
            <?php 
		include 'config.php';
                $sql="SELECT * FROM usuario WHERE cod_usu='".$_SESSION['cod_usu']."'";
		$result=mysqli_query($con, $sql);
                $dados = mysqli_fetch_assoc($result);
                echo "<h1>".$dados['nome']."&nbsp - &nbsp".$dados['cod_usu']."</h1>
                    </div>
                    <div class='small-12 columns'>";
                echo "<p>Código de Usuário: ".$dados['cod_usu']."</p>";
                echo "<p>Nome: ".$dados['nome']."</p>";
                echo "<p> Endereço: ".$dados['end']."</p>";
                echo "<p> CPF: ".$dados['cpf']."</p>";
                echo "<p> Código da caixa: ".$dados['cod_caixa']."</p>";
                echo "<p>".$dados['']."</p>";
            ?>
            <a href="troca_senha.php">trocar senha</a>
        </div>
    </div>

    
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
 </body>

</html>
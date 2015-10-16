<?php
	include '../config.php';
	$cod_usu = $_POST['cod_usu'];
	$senha = $_POST['senha'];
	$nome = $_POST['nome'];
	$end = $_POST['end'];
	$cpf = $_POST['cpf'];
	$cod_caixa = $_POST['cod_caixa'];

	$nome_img = $_FILES['foto']['name'];
	$formato_img = $_FILES['foto']['type'];

	$volume = $_POST['volume'];
	$nivel_min = $_POST['nivel'];
	$fluxo_max = $_POST['fluxo'];

	$cadastra = "INSERT into usuario (cod_usu, nome, cpf, end, senha, cod_caixa) VALUES ('$cod_usu', '$nome', '$cpf', '$end', '$senha', '$cod_caixa')";
	$cadastra_caixa = "INSERT into info_caixa (cod_caixa, nivel_min, fluxo_max, volume) VALUES ('$cod_caixa', '$nivel_min', '$fluxo_max', '$volume')";

	$nome_img = str_replace(" ", "_", $nome_img);
	$nome_img = strtolower($nome_img);

	if($formato_img != "image/png"){
		echo "<script type='text/javascript'> alert('Formato Invalido')</script>";
	} else {
		if(file_exists("../arquivos/$nome_img")){
			$a = 1;
			while(file_exists("arquivos/[$a]$nome_img")){
				$a++;
			}
			$nome_img = "[".$a."]".$nome_img;
		}
		if(move_uploaded_file($_FILES['arquivo']['tmp_name'], "../arquivos/".$nome_img)){
			echo "<script type='text/javascript'> alert('Upload Ok')</script>";
			$sql = "INSERT INTO fotos(cod_usu, imagem) VALUES('$cod_usu','$nome_img')";
			mysqli_query($con, $sql);
		} else {
			echo "<script type='text/javascript'> alert('Falha Upload')</script>";
		}
	}

	if(mysqli_query($con, $cadastra)){
		if(mysqli_query($con, $cadastra_caixa)){
			header('location:../sucesso_cadastro.php');
		} else {
			header('location:../erro.php');
		}
	} else {
		header('location:../erro.php');
	}

?>

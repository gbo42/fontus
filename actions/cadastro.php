<?php
	include '../config.php';
	$cod_usu = $_POST['cod_usu'];
	$senha = $_POST['senha'];
	$nome = $_POST['nome'];
	$end = $_POST['end'];
	$cpf = $_POST['cpf'];
	$cod_caixa = $_POST['cod_caixa'];


	$volume = $_POST['volume'];
	$nivel_min = $_POST['nivel'];
	$fluxo_max = $_POST['fluxo'];
	$email = $_POST['email'];

	$cadastra = "INSERT into usuario (cod_usu, nome, cpf, end, senha, cod_caixa) VALUES ('$cod_usu', '$nome', '$cpf', '$end', '$senha', '$cod_caixa')";
	$cadastra_caixa = "INSERT into info_caixa (cod_caixa, email, nivel_min, fluxo_max, volume) VALUES ('$cod_caixa', '$email', '$nivel_min', '$fluxo_max', '$volume')";

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

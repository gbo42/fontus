<?php
	include 'config.php';
	$cod = $_POST['cod'];
	$fluxo = $_POST['fluxo'];
	$nivel = $_POST['nivel'];
	$msg = "";

	$cadastra = "INSERT into log_caixa (cod_caixa, fluxo, nivel) VALUES ('$cod', '$fluxo', '$nivel')";
	mysqli_query($con, $cadastra);

	//Alerta
	$seleciona = "SELECT * FROM info_caixa WHERE cod_caixa = '$cod'";
	$query = mysqli_query($con, $seleciona);
	$dados = mysqli_fetch_assoc($query);

	if(($fluxo > $dados['fluxo_max']) && ($nivel < $dados['nivel_min'])){
		 $msg = "Fluxo passou do máximo e nível está abaixo do mínimo";
	}elseif($fluxo > $dados['fluxo_max']){
		 $msg = "Fluxo passou do máximo";
	}elseif($nivel < $dados['nivel_min']){
		 $msg = "Nível está abaixo do mínimo";
	}

	if($msg){
		$cadastra = "INSERT into alertas (cod_caixa, alerta) VALUES ('$cod', '$msg')";
		mysqli_query($con, $cadastra);
		echo $dados[email];
		mail($dados[email] , "Alerta - Fontus", $msg);
	}
?>

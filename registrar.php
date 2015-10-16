<?php
	include 'config.php';
	/*$cod = $_POST['cod'];
	$fluxo = $_POST['fluxo'];
	$nivel = $_POST['nivel'];*/
	$cod = 2;
	$fluxo = 200;
	$nivel = 98;

	$cadastra = "INSERT into log_caixa (cod_caixa, fluxo, nivel) VALUES ('$cod', '$fluxo', '$nivel')";
	mysqli_query($con, $cadastra);

	//para o alerta
	$seleciona = "SELECT * FROM info_caixa WHERE cod_caixa = '$cod'";
	$query = mysqli_query($con, $seleciona);
	$dados = mysqli_fetch_assoc($query);
	echo $dados['fluxo_max'];
	echo "<br>";
	echo $dados['nivel_min'];
	if(($fluxo > $dados['fluxo_max']) && ($nivel < $dados['nivel_min'])){
			// fluxo e nivel
			echo "<br> fluxo e nivel";
			$cadastra = "INSERT into alertas (cod_caixa, alerta) VALUES ('$cod', 'Fluxo passou do máximo e nível está abaixo do mínimo')";
			mysqli_query($con, $cadastra);
	}elseif($fluxo > $dados['fluxo_max']){
		 //fluxo
		 echo "<br> fluxo";
		 $cadastra = "INSERT into alertas (cod_caixa, alerta) VALUES ('$cod', 'Fluxo passou do máximo')";
		 mysqli_query($con, $cadastra);
	}elseif($nivel < $dados['nivel_min']){
	 	 //nivel
		 echo "<br>nivel";
		 $cadastra = "INSERT into alertas (cod_caixa, alerta) VALUES ('$cod', 'Nível está abaixo do mínimo')";
		 mysqli_query($con, $cadastra);
	}
?>

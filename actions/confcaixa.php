<?php
	include '../config.php';

	$nivel_min = $_POST['nivel'];
	$fluxo_max = $_POST['fluxo'];
	$cod_caixa = $_SESSION['cod_caixa'];
	$sql = "UPDATE info_caixa SET nivel_min = $nivel_min, fluxo_max = $fluxo_max WHERE  cod_caixa = $cod_caixa";
	mysqli_query($con, $sql);
	header('location:../conf_caixa.php');	
?>
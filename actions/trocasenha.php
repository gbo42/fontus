<?php
	include '../config.php';
	$senha = $_POST['senha'];
	$senhanova = $_POST['senhanova'];
	$cod_usu = $_SESSION['cod_usu'];
	
	if ($_SESSION['senha'] == $senha){
		$sql = "UPDATE usuario SET senha = $senhanova WHERE  cod_usu = $cod_usu";
		echo $sql;
		mysqli_query($con, $sql);	
	} else {
		header('location:../troca_senha.php?erro=senha');
	}
?>
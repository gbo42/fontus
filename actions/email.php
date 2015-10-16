<?php
	include '../config.php';

	$assunto = $_POST['assunto'];
	$mensagem = $_POST['mensagem'];
	$senha = $_POST['senha'];

	$to = 'guigbo@hotmail.com';
	$subject = "Assunto: ".$assunto;
	$message = $mensagem;
	
	if ($_SESSION['senha'] == $senha){
		if (mail($to , $subject, $message)) {
			header('location:../sucesso.php');	
		} else {
			header('location:../erro.php');
		}
	} else {
		header('location:../contato.php?erro=senha');
	}
?>
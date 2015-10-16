<?php
	$cod_usu=$_POST['cod_usu'];
	$senha=$_POST['senha'];

	//funções
	function logar($cod, $s){
		include '../config.php';
		$sql="SELECT * FROM usuario WHERE cod_usu='$cod' and senha='$s'";
		$result=mysqli_query($con, $sql);
		$count=mysqli_num_rows($result);
		if($count == 1){
			session_start();
			$_SESSION['logged'] = True;
			$_SESSION['senha'] = $s;
			$_SESSION['cod_usu'] = $cod;
			$dados = mysqli_fetch_assoc($result);
			$_SESSION['cod_caixa'] = $dados['cod_caixa'];
			$_SESSION['acesso'] = $dados['acesso'];
			return True;
		} else {
			return False;
		}
	}
	
	if(logar($cod_usu, $senha)){
		header("location:../index.php");
	} else {
		header('location:../login.php?erro=uos');
	}
?>
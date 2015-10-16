<?php
	session_start();
	if ($_SESSION['logged'] == True){
	} else {
		header("location:../login.php");
	}

?>

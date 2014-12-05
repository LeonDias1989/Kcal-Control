<?php

	session_start();
	if(!isset($_SESSION["id"])){
		header("Location: index.php");
	}
	$idUsuario = $_SESSION['idUsuarios'];
	//include "includes/headerLogout.inc.php";
	//return $_SESSION['userID'];
	
	//if(!isset($_SESSION["id"])){

 ?>
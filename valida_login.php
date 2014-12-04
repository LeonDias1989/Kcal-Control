	<?php

	session_start();
	include "includes/headerLogout.inc.php";
	return $_SESSION['userID'];
	
	//if(!isset($_SESSION["id"])){
	if(!isset($_SESSION["ID_USUARIO"])){
		header("Location: index.php");
	}
 ?>
	<?php

	session_start();
	include "includes/headerLogout.inc.php";
	
	//if(!isset($_SESSION["id"])){
	if(!isset($_SESSION["ID_USUARIO"])){
		header("Location: index.php");
	}
 ?>
	<?php

	session_start();
	include "includes/headerLogout.inc.php";
	
	if(!isset($_SESSION["id"])){
	header("Location: index.php");
}
 ?>
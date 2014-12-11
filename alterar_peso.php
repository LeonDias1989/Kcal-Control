<?php 

		require "valida_login.php";
		include "classeBD.php";


		
		$peso = $_POST['peso'];

		$idUser = $_SESSION["idUsuarios"];

		$bd = new funcoesBD();
		$bd->conectar();
		$bd->alterarPesoUsuario($idUser, $peso);
		$bd->fecharConexao();
		

 ?>
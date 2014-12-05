<?php 

	include "classeBD.php";
		$id_usuario = $_GET['id'];
		
		$bd = new funcoesBD();
		$bd->conectar();
		$bd->listaFavoritos($id_usuario);
		$bd->fecharConexao();

	
?>
<?php 

	include "classeBD.php";
	if (isset($_GET["txtdata"])) { 
		$data = $_GET["txtdata"]? $_GET['txtdata'] : '';
		$id_usuario = $_GET['idUsuario'];
		
		$bd = new funcoesBD();
		$bd->conectar();
		$bd->selecionarRefeicao($data, $id_usuario);
		$bd->fecharConexao();

	}
?>
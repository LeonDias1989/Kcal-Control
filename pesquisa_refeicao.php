<?php 

	include "classeBD.php";
	if (isset($_GET["txtdata"])) { 
		$data = $_GET["txtdata"]? $_GET['txtdata'] : '';
		
		$bd = new funcoesBD();
		$bd->conectar();
		$bd->selecionarRefeicao($data);
		$bd->fecharConexao();

	}
?>
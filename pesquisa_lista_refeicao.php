<?php 

	include "classeBD.php";
	if (isset($_GET["txtidRefeicao"])) { 
		$idRefeicao = $_GET["txtidRefeicao"]? $_GET['txtidRefeicao'] : '';
		
		$bd = new funcoesBD();
		$bd->conectar();
		$bd->selecionarListaRefeicao($idRefeicao);
		$bd->fecharConexao();

	}
?>
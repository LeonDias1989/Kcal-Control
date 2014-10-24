<?php 

	include "classeBD.php";

		$banco = new funcoesBD();
		
		
		//Esta função já está abrindo e fechando a conexão como o banco de dados
		$selecao = $banco->selecionarRefeicao();


?>
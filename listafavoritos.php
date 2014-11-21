<?php 

	include "classeBD.php";
		
		$bd = new funcoesBD();
		$bd->conectar();
		$bd->listaFavoritos();
		$bd->fecharConexao();

	
?>
<?php 
include 'classeBD.php';
// Verifica se existe a variável txtnome 
if (isset($_GET["txtnome"])) { $nome = $_GET["txtnome"]? $_GET['txtnome'] : '';
	// Conexao com o banco de dados 
	$bd = new funcoesBD();
	$bd->conectar();
	$bd->selecionarAlimento($nome);
	$bd->fecharConexao();
}
?>

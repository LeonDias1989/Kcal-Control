<?php 

		include "classeBD.php";


		$email = $_POST['email'];
		$peso = $_POST['peso'];


		$bd = new funcoesBD();
		$bd->conectar();
		$bd->alterarPesoUsuario($email, $peso);
		$bd->fecharConexao();
		

 ?>
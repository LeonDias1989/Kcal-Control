<?php
	
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$confirmaSenha = $_POST['confirmaSenha'];
		$idade = $_POST['idade'];
		$sexo = $_POST['sexo'];
		$peso = $_POST['peso'];
		$altura = $_POST['altura'];
		$objetivo = $_POST['objetivo'];

		

		if($senha == $confirmaSenha){

			include "classeBD.php";

			$bd = new funcoesBD();
			$bd->conectar();
			$bd->incluirUsuario($nome, $email, md5($senha), md5($confirmaSenha), $idade,  $sexo, $peso, $altura, $objetivo);
			$bd->fecharConexao();
			
		}else{
			echo "Insira as senhas iguais";
		}
	
?>
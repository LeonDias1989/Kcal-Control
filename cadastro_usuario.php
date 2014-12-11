<?php
	
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$sexo = $_POST['sexo'];
		$senha = $_POST['senha'];
		$confirmaSenha = $_POST['confirmaSenha'];
		$altura = $_POST['altura'];
		$peso = $_POST['peso'];
		$idade = $_POST['idade'];
		$objetivo = $_POST['objetivo'];
		

		

		if($senha == $confirmaSenha){

			include "classeBD.php";

			$bd = new funcoesBD();
			$bd->conectar();
			$ultimoIdUsuario = $bd->incluirUsuario($nome, $email, $sexo, md5($senha), md5($confirmaSenha), $altura, $peso, $idade , $objetivo);
			$bd->incluirUsuariopeso($ultimoIdUsuario, $peso);
			$bd->fecharConexao();
			
		}else{
			echo "Insira as senhas iguais";
		}
	
?>
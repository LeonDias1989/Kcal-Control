<?php
	
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$confirmaSenha = $_POST['confirmasenha'];
		$idade = $_POST['idade'];
		$sexo = $_POST['sexo'];
		$peso = $_POST['peso'];
		$altura = $_POST['altura'];
		$bf = $_POST['bf'];
		$hobby = $_POST['hobby'];
		$objetivo = $_POST['objetivo'];
		$esporte = $_POST['esporte'];

		if($senha == $confirmaSenha){
			include "classeBD.php";

			$bd = new funcoesBD();
			$bd->conectar();
			$bd->incluirUsuario($nome, $email, $senha, $idade, $sexo, $peso, $altura, $bf, $hobby, $objetivo, $esporte);
			$bd->fecharConexao();
			
		}else{
			echo "Insira as senhas iguais";
		}
	
?>
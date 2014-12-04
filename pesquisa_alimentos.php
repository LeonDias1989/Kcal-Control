<?php
include 'classeBD.php';
	
	$nome = $_POST['nome'];
    $vetor =  json_decode($_POST['alimentos']);

	
	 if (isset($_POST['nome'])) {
			$bd = new funcoesBD();
			$bd->conectar();
			$idUser = $_SESSION['userID'];
			$ultimoIdInserido = $bd->incluirRefeicao($nome);
			foreach ($vetor as $v) { 
				$bd->incluirRefeicaoAlimento($idUser, $ultimoIdInserido, $v->id ,$v->qtd);
			}
			$bd->fecharConexao();
			echo "Refeição cadastrada com sucesso !";
			
	}else{
			echo "Insira o Nome da refeição";
		}
 ?>
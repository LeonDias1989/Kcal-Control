<?php
    
   include 'classeBD.php';
	
	$nome = $_POST['nome'];
    $vetor =  json_decode($_POST['alimentos']);
	
	 if (isset($_POST['nome'])) {
			$bd = new funcoesBD();
			$bd->conectar();
			$ultimoIdInserido = $bd->incluirRefeicao($nome);
			foreach ($vetor as $v) { 
				$bd->incluirRefeicaoAlimento($ultimoIdInserido, $v->id ,$v->qtd);
			}
			$bd->fecharConexao();
			echo "Refeição cadastrada com sucesso !";
			
	}else{
			echo "Insira o Nome da refeição";
		}
	
	
	
	
	// INSERIR NA TABELA REFEICAO O REGISTRO DA REFEICAO ATUAL
	// ID AUTO INCRMENT - NOME - DATA - USUARIO
	// http://php.net/manual/pt_BR/function.mysql-insert-id.php
	
	// laço de repetiçao para inserir na tabela REFEICAO_ALIMENTOS o id da refeicao, id do alimento e qtd
	
	
	
	
	//print_r($vetor);
    
	
	// $calorias = $_POST['total_calorias'];
    //$idCliente = $_POST['id_cliente'];
    //$idAlimento = $_POST['id_alimento'];

      //$bd = new funcoesBD();
      //$bd->conectar();
      //$bd->incluirRefeicao($nome, $calorias, $idCliente, $idAlimento);
      //$bd->fecharConexao();



 ?>
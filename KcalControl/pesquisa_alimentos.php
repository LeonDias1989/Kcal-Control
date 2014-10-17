<?php
    
    include 'classeBD.php';
	
	echo "oiiiiiii = ";
	$nome = $_POST['nome'];
    $vetor =  json_decode($_POST['alimentos']);
	
	
	echo "Nome da refeiçao: ".$nome;
	
	
	
	foreach ($vetor as $v) { 
		echo "=> ".$v->id." - ".$v->qtd." <br>";	
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
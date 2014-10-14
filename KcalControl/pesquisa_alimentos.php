<?php
    
    include 'classeBD.php';

    $nome = $_POST['nome'];
    $calorias = $_POST['total_calorias'];
    $idCliente = $_POST['id_cliente'];
    $idAlimento = $_POST['id_alimento'];

      $bd = new funcoesBD();
      $bd->conectar();
      $bd->incluirRefeicao($nome, $calorias, $idCliente, $idAlimento);
      $bd->fecharConexao();



 ?>
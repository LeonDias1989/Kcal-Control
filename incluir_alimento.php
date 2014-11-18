<?php
    
    include 'classeBD.php';

    $nome = $_POST['nome'];
    $peso = $_POST['peso'];
    $porcao = $_POST['porcao'];
    $calorias = $_POST['calorias'];

      $bd = new funcoesBD();
      $bd->conectar();
      $bd->incluirAlimento($nome, $peso, $porcao, $calorias);
      $bd->fecharConexao();



 ?>
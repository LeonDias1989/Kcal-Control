<?php 
// Verifica se existe a variável txtnome 
if (isset($_GET["txtnome"])) { $nome = $_GET["txtnome"]? $_GET['txtnome'] : '';

// Conexao com o banco de dados 
$server = "localhost"; 
$user = "root"; 
$senha = ""; 
$base = "kcal"; 
$conexao = mysql_connect($server, $user, $senha) or die("Erro na conexão!"); 
mysql_select_db($base);

// Verifica se a variável está vazia 
if (empty($nome)) { $sql = "SELECT * FROM alimentos"; } 
else { $nome .= "%"; $sql = "SELECT * FROM alimentos WHERE nome like '$nome'"; } 
sleep(1); $result = mysql_query($sql); 
$cont = mysql_affected_rows($conexao); 

// Verifica se a consulta retornou linhas 
if ($cont > 0) { 

// Atribui o código HTML para montar uma tabela 
$tabela = "<ul>
			"; 
$return = "$tabela"; 

// Captura os dados da consulta e inseri na tabela HTML 
  while ($linha = mysql_fetch_array($result)) { 
  $return.= "<li onclick=getLinha(". $linha["ID"] ."); class=" . $linha["ID"] . ">";
  $return.= "<span id=nome-alimento >" . utf8_encode($linha["Nome"]) . "</span>"; 
  $return.= "<div><strong>Peso:</strong><span id=peso>" . utf8_encode($linha["Peso"]) . "g</span></div>"; 
  $return.= "<div id=porcao><strong></strong><span>" . utf8_encode($linha["Porcao"]) . "</span></div>";
  $return.= "<div id=qtd><strong>Qtd:</strong><span id=quantidade class=qtd>1</span></div>"; 
  $return.= "<div><strong>Kcal:</strong><span id=calorias class=calorias>" . utf8_encode($linha["Calorias"]) . "</span></div>"; 
  $return.= "<p class=hover_add>Adicionar</p>"; 
  $return.= "</li>"; } 
  echo $return.="</ul>"; } 
  else { 
  
// Se a consulta não retornar nenhum valor, exibi mensagem para o usuário 
echo "Não foram encontrados registros!"; } }
 ?>

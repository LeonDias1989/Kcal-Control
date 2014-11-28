<?php 
include 'classeBD.php';

// session_start inicia a sessão 

// as variáveis login e senha recebem os dados digitados na página anterior
$email = $_POST['email']; 
$senha = $_POST['senha'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
$bd = new funcoesBD();
$bd->conectar();
/*$con = mysql_connect("127.0.0.1", "root", "") or die ("Sem conexão com o servidor");
$select = mysql_select_db("kcal") or die("Sem acesso ao DB"); */

// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysqli_query($bd->conectar(), "SELECT * FROM USUARIO WHERE EMAIL = '$email' AND SENHA = '$senha'"); 
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
if(mysqli_num_rows ($result) > 0 ) { 

	$_SESSION['email'] = $email;
 	$_SESSION['senha'] = $senha; 
 	session_start();
 	header('location:page_pesquisa_alimentos.php');

 }
       else{ 

       	unset ($_SESSION['email']);
       	unset ($_SESSION['senha']);
        header('location:page_cadastro_usuario.php');
          } 

?>


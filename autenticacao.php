<?php
<<<<<<< HEAD
include "classeBD.php";


	$email = $_POST['email'];
	$senha = $_POST['senha'];
 	$entrar = $_POST['entrar'];
	if(isset($_POST['entrar'])){
		$bd = new funcoesBD();
		if(isset($_POST['senha'])){
 	$bd = new funcoesBD();
 	$conecta = $bd->conectar();
 	$senha2 = md5($senha);
 	$sql = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha2'";
 	//$result = mysqli_query($bd->conectar(), "SELECT * FROM usuario WHERE email = '$email' AND senha = 'md5($senha)'"); !!!!!!!!
 	$result = mysqli_query($bd->conectar(), "SELECT * FROM usuario WHERE email='".$email."' AND senha='".md5($senha)."'");
 	$result = mysqli_query($conecta, $sql);
	/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
 		if(mysqli_num_rows ($result) < 0 ) {

 			echo "Email " . $email ."<br/>";
 			echo "Senha " . $senha ."<br/>";
 			echo "MD5 Senha " . md5($senha) ."<br/>";
 			if(mysqli_num_rows($result) == 0) {
				echo "Dados inválidos!";
 				header('location:index.php');
			}else{
				session_start();
				$_SESSION["id"] = session_id(); // foda-se isso...
 				date_default_timezone_set("America/Sao_Paulo");
 				$_SESSION["datahora"] = date("d/m/Y H:i:s");
 				while ($line = mysqli_fetch_object($result)) {
 					$_SESSION["userID"] = $line->id;
 				}
 				//print_r($_SESSION);
				$registro=mysqli_fetch_array($result);
 				$_SESSION['idUsuarios'] = $registro['id'];
				header('location:page_pesquisa_alimentos.php');
			}
		}
=======
	
	include "classeBD.php";
	$email = $_POST['email'];
	$senha = $_POST['senha'];


if(isset($_POST['senha'])){

	$bd = new funcoesBD();
	$conecta = $bd->conectar();
	$senha2 = md5($senha);
	$sql = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha2'";

	$result = mysqli_query($conecta, $sql); 
	/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
	if(mysqli_num_rows($result) == 0) { 
		echo "Dados inválidos!";
		header('location:index.php');
		
	}else{
		session_start();
		$_SESSION["id"] = session_id(); // foda-se isso...
		$registro=mysqli_fetch_array($result);
		$_SESSION['idUsuarios'] = $registro['id'];
		header('location:page_pesquisa_alimentos.php');

>>>>>>> 2d15de4308d02fb9c30209fe687389543f216115
	}
}
// ele nao chama a funcao dentro de uma string... "$variavel" se tu precisar chamar uma funcao tem que ser ".funcao($variavel)." bla bla bla...

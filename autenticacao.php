<?php
	
	include "classeBD.php";


	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$entrar = $_POST['entrar'];

if(isset($_POST['entrar'])){

	$bd = new funcoesBD();


	$result = mysqli_query($bd->conectar(), "SELECT * FROM usuario WHERE email = '$email' AND senha = 'md5($senha)'"); 
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
	
	if(mysqli_num_rows ($result) < 0 ) { 

		echo "Email " . $email ."<br/>";
		echo "Senha " . $senha ."<br/>";
		echo "MD5 Senha " . md5($senha) ."<br/>";
		echo "Dados inválidos!";
		
	}else{
		session_start();
		$_SESSION["id"] = session_id();
		date_default_timezone_set("America/Sao_Paulo");
		$_SESSION["datahora"] = date("d/m/Y H:i:s");

 
		header('location:page_pesquisa_alimentos.php');

	}

}
	

?>
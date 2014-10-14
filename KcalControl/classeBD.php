<?php



/*

$conect = mysql_connect("localhost", "root", "");

if (!$conect) die ("<h1>Falha na coneco com o Banco de Dados!</h1>");


$db = mysql_select_db("alimentos");
 
*/
	class funcoesBD {

		private $conexao;

		function conectar(){

			$this->conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($this->conexao, "kcal") or die("Banco não encontrado");

			mysqli_set_charset($this->conexao, "utf8");
		}

		function fecharConexao(){
			mysqli_close($this->conexao);
		}	

		
		function incluirUsuario($nome, $email, $senha, $confirmaSenha, $idade, $sexo, $peso, $altura, $bf, $hobby, $objetivo, $esporte){
			$consulta = "SELECT email FROM usuario WHERE email='$email'";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possivel verificar o e-mail");

			if(mysqli_num_rows($resultado) !=0){
				echo "E-mail já cadastrado";
			}else if($senha != $confirmaSenha){
				echo "As senhas não conferem";
			}else{			
				$inserir = "INSERT INTO usuario (nome, email, senha, idade, sexo, peso, altura, bf, hobby, objetivo, esporte) 
				VALUES ('$nome', '$email', '$senha', '$idade', '$sexo', '$peso', '$altura', '$bf', '$hobby', '$objetivo', '$esporte')";
				$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir o usuário");
				//echo"Cadastro efetuado com sucesso !";
				echo "usuário cadastrado!";
			}
		}

		function incluirRefeicao($nome, $calorias, $idCliente, $idAlimento){
			$consulta = "SELECT nome FROM refeicao WHERE nome='nome'";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possivel verificar a refeição");

			if(mysqli_num_rows($resultado) !=0){
				echo "Refeição já cadastrada";
			}else{			
				$inserir = "INSERT INTO refeicao (nome, calorias, id_cliente, id_alimento) 
				VALUES ('$nome', '$calorias', '$id_cliente', '$id_alimento')";
				$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir a refeiçãp");
				//echo"Cadastro efetuado com sucesso !";
				echo "refeição cadastrada!";
			}
		}
        
        function incluirAlimento($nome, $peso, $porcao, $calorias){
			$consulta = "SELECT nome FROM alimentos WHERE nome='nome'";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possivel verificar o alimento");

			if(mysqli_num_rows($resultado) !=0){
				echo "alimento já cadastrado";
			}else{			
				$inserir = "INSERT INTO alimentos (nome, peso, porcao, calorias) 
				VALUES ('$nome', '$peso', '$porcao', '$calorias')";
				$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir o alimento");
				//echo"Cadastro efetuado com sucesso !";
				echo "alimento cadastrado!";
			}
		}
	}
?>
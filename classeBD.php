<?php
	class funcoesBD {

		private $conexao;

		function conectar(){

			$this->conexao = mysqli_connect("localhost", "root", "") or die ("Falha na conexão com o Banco de Dados");
			mysqli_select_db($this->conexao, "kcal") or die("Banco não encontrado");
			mysqli_set_charset($this->conexao, "utf8");
			return $this->conexao;
		}

		function fecharConexao(){
			mysqli_close($this->conexao);
		}	
			
	
		function incluirUsuario($nome, $email, $sexo, $senha, $confirmaSenha, $altura, $peso, $idade , $objetivo){
			$consulta = "SELECT email FROM usuario WHERE email='$email'";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possivel verificar o e-mail");

			if(mysqli_num_rows($resultado) !=0){
				echo "E-mail já cadastrado";
			}else if($senha != $confirmaSenha){
				echo "As senhas não conferem";
			}else{			
				$inserir = "INSERT INTO usuario (nome, email, sexo, senha, altura, peso, idade, objetivo) 
				VALUES ('$nome', '$email', '$sexo', '$senha', '$altura', '$peso', '$idade', '$objetivo')";
				$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir o usuário");
				//echo"Cadastro efetuado com sucesso !";
				header('location:page_pesquisa_alimentos.php');
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
		
		function incluirRefeicao($nome, $id_usuario){
			 	$hoje = date("Y-m-d");
				$inserir = "INSERT INTO refeicao (nome, data, id_usuario) 
				VALUES ('$nome', '$hoje', '$id_usuario')";
				$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir a Refeição");
				$ultimoIdRefeicao = $this->conexao->insert_id;
				return $ultimoIdRefeicao;
			}
			
		function incluirRefeicaoAlimento($ultimoIdInserido, $idAlimento, $quantidade){
				$inserir = "INSERT INTO refeicao_alimento (id_refeicao ,id_alimento, quantidade) 
				VALUES ('$ultimoIdInserido', '$idAlimento', '$quantidade')";
				$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir a Refeição");
			}
		function favoritar($idRefeicao){
				$alterar = "UPDATE refeicao SET favorito = 1 WHERE id = $idRefeicao";
				$resultado = mysqli_query($this->conexao, $alterar) or die ("Não foi possível inserir a Refeição");
				echo "Adicionado ao favoritos";
			}
			
		function selecionarAlimento($nome){
				$conexao = $this->conexao;
				// Verifica se a variável está vazia 
				if (empty($nome)) { 
					$sql = "SELECT * FROM alimentos"; 
					} 
				else { 
					$nome .= "%"; $sql = "SELECT * FROM alimentos WHERE nome like '$nome'"; 
					} 
				sleep(1); $result = mysqli_query($conexao, $sql); 
				$cont = mysqli_affected_rows($conexao);
				
				// Verifica se a consulta retornou linhas 
				if ($cont > 0) { 
				
				// Atribui o código HTML para montar uma tabela 
				$tabela = "<ul>
							"; 
				$return = "$tabela"; 
				
				// Captura os dados da consulta e inseri na tabela HTML 
				  while ($linha = mysqli_fetch_array($result)) { 
				  $return.= "<li onclick=getLinha(". $linha["ID"] ."); class=" . $linha["ID"] . ">";
				  $return.= "<span id=nome-alimento >" . utf8_encode($linha["Nome"]) . "</span>"; 
				  $return.= "<div><strong>Peso:</strong><span id=peso>" . utf8_encode($linha["Peso"]) . "g</span></div>"; 
				  $return.= "<div id=porcao><strong></strong><span>" . utf8_encode($linha["Porcao"]) . "</span></div>";
				  $return.= "<div id=qtd><strong>Qtd:</strong><span id=quantidade class=qtd>1</span></div>"; 
				  $return.= "<div><strong>Kcal:</strong><span id=calorias class=calorias>" . utf8_encode($linha["Calorias"]) . "			</span></div>"; 
				  $return.= "<p class=hover_add>Adicionar</p>"; 
				  $return.= "</li>"; } 
				  echo $return.="</ul>"; } 
				  else { 
				  
				// Se a consulta não retornar nenhum valor, exibi mensagem para o usuário 
				echo "Não foram encontrados registros!"; }
			}
		function selecionarListaRefeicao($idRefeicao){
				$sql = "SELECT id_alimento, quantidade, nome, peso, porcao,calorias FROM refeicao_alimento 
						INNER JOIN alimentos ON refeicao_alimento.id_alimento = alimentos.id
						WHERE id_refeicao = '$idRefeicao'"; 
				
				sleep(1); $result = mysqli_query($this->conexao, $sql); 
				
				$rs = mysqli_query($this->conexao, $sql);
				// Atribui o código HTML para montar uma tabela 
				$tabela = "<h1>Refeição</h1><ul class='resultado content1'>"; 
				$return = "$tabela"; 
				$total = 0;
				while($row = mysqli_fetch_array($rs)) {
						$qtd = $row["quantidade"];
						$cal = $row["calorias"];
						$total_cal = $qtd * $cal;
						$total += $total_cal;
						
						$return.=	"<li class=" . $row["id_alimento"] . "><span id=nome-alimento >" . utf8_encode($row["nome"]) . "</span>";
						$return.=	"<div><strong>Peso:</strong><span id=peso>" . utf8_encode($row["peso"]) . "g</span></div>";
						$return.=	"<div id=porcao><strong></strong><span>" . utf8_encode($row["porcao"]) . "</span></div>";
						$return.=	"<div id=qtd><strong>Qtd:</strong><span id=quantidade class=qtd>". utf8_encode($row["quantidade"]) ."</span></div>";
						$return.=	"<div><strong>Kcal:</strong><span id=calorias class=calorias>" . $total_cal . "</span></div>";
						$return.=   "<p class=hover_add>Adicionar</p></li>";
						}
						  
						 echo $return.="</ul><span onclick=addlistafavoritos() class=addlista>Utilizar lista</span><span onclick=getfavoritar(". $idRefeicao .") class=star>Favoritar</span><span class= total_kcal>" . $total . "Kcal</span>"; 
		
					
			}
		function listaFavoritos(){
				$sql = "SELECT * FROM refeicao WHERE favorito = 1"; 
				$rs = mysqli_query($this->conexao, $sql);
				 $tabela = "<div class=lista_favoritos>
			  				<h1>Lista de Favoritos</h1>"; 
				$return = "$tabela";
				while($row = mysqli_fetch_array($rs)) {
			   // Escreve o valor da coluna FirstName (que está no array $row)
			  $return.="<div class=box_agenda onclick=getListaRefeicao(".$row['id'].");>
			  			<ul>
							<li>
								<span>".$row['nome'] ."<span>
							</li>
							<li>
								" .$row['data'] ."
							</li>
						</ul>
					</div>";
			  }		
			  $return.= "</div>"; 
			  echo  $return;
			
			}
		function selecionarRefeicao($data, $idUsuario){
			//query SQL
			if (empty($data)) { 
					$sql = "SELECT * FROM refeicao WHERE id_usuario = '$idUsuario'"; 
					} 
				else { 
					$data .= "%"; 
					$sql = "SELECT * FROM refeicao WHERE data like '$data'"; 
					} 
				sleep(1); $result = mysqli_query($this->conexao, $sql); 

			$rs = mysqli_query($this->conexao, $sql);
			while($row = mysqli_fetch_array($rs)) {

			   // Escreve o valor da coluna FirstName (que está no array $row)
			  echo "<div class=box_agenda onclick=getListaRefeicao(".$row['id'].");>
			  			<ul>
							<li>
								<span>".$row['nome'] ."<span>
							</li>
							<li>
								" .$row['data'] ."
							</li>
						</ul>
					</div>";
			  }		
		}

		function grafico(){
			$sql = "SELECT id_usuario, data_pesagem, peso FROM historico_peso where id_usuario =". $_SESSION["userID"];
			////$sql = "SELECT id_usuario, data_pesagem, peso FROM historico_peso where id_usuario = '$_SESSION[id]'";
			$result = mysqli_query($this->conexao, $sql); // !!!! testa  la



			if ($result->num_rows != 0) {
			    echo "<table><tr><th> ID </th><th> Data </th><th> Peso </th></tr>";
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "<tr><td>" .$row["id_usuario"]."</td><td>".$row["data_pesagem"]."</td><td>".$row["peso"]. "</td></tr>";
			    }
			} else {
			    echo "0 results";
			}
			$this->fecharConexao();
		}

/*
		function alterarPesoUsuario($email, $peso){

			$agora = date("Y-m-d");

			//esta consulta faz o update no peso do usuário
			$consultaUpdateUsuario = "UPDATE usuario set peso =	'$peso'	where email= '$email'";
			mysqli_query($this->conexao, $consultaUpdateUsuario);
		
			//Esta consulta insere na tabela historico_peso a pesagem realizada no momento
			//A ID depois será dinâmica e será obtida através da sessão do usuário
			$inserirHistoricoPeso = "INSERT INTO historico_peso (data_pesagem, id_usuario, peso) VALUES ('$agora', 2, $peso)";

			mysqli_query($this->conexao, $inserirHistoricoPeso);

			echo "Peso Alterado com Sucesso";

 		}
 				function buscaPeso($data){
			//query SQL
			if (empty($data)) { 
					$sql = "SELECT peso FROM historico_peso"; 
					} 
				else { 
					$data .= "%"; 
					$sql = "SELECT peso FROM historico_peso WHERE data like '$data'"; 
					} 
				sleep(1); $result = mysqli_query($this->conexao, $sql); 

			$rs = mysqli_query($this->conexao, $sql);

			  	
		}
*/
		function alterarPesoUsuario($email, $peso){

			$agora = date("Y-m-d");

			//esta consulta faz o update no peso do usuário
			$consultaUpdateUsuario = "UPDATE usuario set peso =	'$peso'	where email= '$email'";
			mysqli_query($this->conexao, $consultaUpdateUsuario);
		
			// --> 
			$sql = "SELECT id FROM usuario WHERE email='$email'";
			$result = mysqli_query($this->conexao, $sql);
			$id_usuario = 0;
			while ($result && $line = mysqli_fetch_object($result)) {
				$id_usuario = $line->id;
			}
			
			$sql = "INSERT INTO historico_peso (data_pesagem, id_usuario, peso) VALUES ('$agora', $id_usuario, $peso)";
			mysqli_query($this->conexao, $sql);

			

			echo "Peso Alterado com Sucesso";

 		}

	}
?>
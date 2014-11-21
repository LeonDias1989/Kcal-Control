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

		
		function incluirUsuario($nome, $email, $senha, $confirmaSenha, $idade, $sexo, $peso, $altura, $objetivo){
				
			$consulta = "SELECT email FROM usuario WHERE email='$email'";
			$resultado = mysqli_query($this->conexao, $consulta) or die ("Não foi possivel verificar o e-mail");

			if(mysqli_num_rows($resultado) !=0){
				echo "E-mail já cadastrado";
			}else if($senha != $confirmaSenha){
				echo "As senhas não conferem";
			}else{			
				$inserir = "INSERT INTO usuario (nome, email, senha, idade, sexo, peso, altura, objetivo) 
				VALUES ('$nome', '$email', '$senha', '$idade', '$sexo', '$peso', '$altura','$objetivo')";
				$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir o usuário");

				//echo"Cadastro efetuado com sucesso !";
				echo "usuário cadastrado!";
			}
		}

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
		
		function incluirRefeicao($nome){
			 	$hoje = date("Y-m-d");
				$inserir = "INSERT INTO refeicao (nome, data, id_usuario) 
				VALUES ('$nome', '$hoje', '2')";
				$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir a Refeição");
				$ultimoIdRefeicao = $this->conexao->insert_id;
				return $ultimoIdRefeicao;
			}
			
		function incluirRefeicaoAlimento($ultimoIdInserido, $idAlimento, $quantidade){
				$inserir = "INSERT INTO refeicao_alimento (id_refeicao ,id_alimento, quantidade) 
				VALUES ('$ultimoIdInserido', '$idAlimento', '$quantidade')";
				$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir a Refeição");
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
				$tabela = "<h1>Refeição</h1><ul class=resultado>"; 
				$return = "$tabela"; 
				$total = 0;
				while($row = mysqli_fetch_array($rs)) {
						$qtd = $row["quantidade"];
						$cal = $row["calorias"];
						$total_cal = $qtd * $cal;
						$total += $total_cal;
						
						$return.=	"<li><span id=nome-alimento >" . utf8_encode($row["nome"]) . "</span>";
						$return.=	"<div><strong>Peso:</strong><span id=peso>" . utf8_encode($row["peso"]) . "g</span></div>";
						$return.=	"<div id=porcao><strong></strong><span>" . utf8_encode($row["porcao"]) . "</span></div>";
						$return.=	"<div id=qtd><strong>Qtd:</strong><span id=quantidade class=qtd>". utf8_encode($row["quantidade"]) ."</span></div>";
						$return.=	"<div><strong>Kcal:</strong><span id=calorias class=calorias>" . $total_cal . "</li>";}
						 echo $return.="</ul><span class= total_kcal>" . $total . "Kcal</span>"; 
		//echo "ID alimento:".$row['id_alimento']."</BR> ID alimento:".$row['quantidade']."</BR> ID alimento:".$row['nome']."</BR>";
					
			}
		function selecionarRefeicao($data){
			//query SQL
			if (empty($data)) { 
					$sql = "SELECT * FROM refeicao"; 
					} 
				else { 
					$data .= "%"; 
					$sql = "SELECT * FROM refeicao WHERE data like '$data'"; 
					} 
				sleep(1); $result = mysqli_query($this->conexao, $sql); 
			
			//$strSQL = "SELECT refeicao.nome, refeicao.data, refeicao_alimento.quantidade, 
			//(select alimentos.nome from alimentos where refeicao_alimento.id_alimento = alimentos.id ) as alimento_nome 
			//FROM `refeicao` inner join refeicao_alimento where refeicao.id = refeicao_alimento.id_refeicao";

			// Executa a query (o recordset $rs contém o resultado da query)
			$rs = mysqli_query($this->conexao, $sql);
			
			// Loop pelo recordset $rs
			// Cada linha vai para um array ($row) usando mysql_fetch_array
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
	}
?>
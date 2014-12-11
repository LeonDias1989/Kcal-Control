<html>
<head>
	<title>Kcal Control</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style_pesquisa.css" rel="stylesheet" type="text/css">

	<?php 
		include "classeBD.php";
		require "valida_login.php";
		$bdDAO = new funcoesBD();
		$bdDAO->conectar();
		$usuarioView = $bdDAO->getUser($_SESSION["idUsuarios"]);
		$bdDAO->fecharConexao();

    $acoes = new funcoesBD;
    if($acoes){
      $teste = $acoes->conectar();
      //$sql = "SELECT * FROM historico_peso WHERE id_usuario = '$idUsuario'"; 
	  $sql = "SELECT *,DATE_FORMAT(data_pesagem, '%d/%m/%y')as novaData FROM historico_peso ORDER BY data_pesagem ASC"; 
      $result = mysqli_query($teste, $sql); 
    }
?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Peso');
        data.addRows([
        <?php
        while($row = mysqli_fetch_array($result)) {
          echo "['".$row['novaData'] ."',".$row['peso'] ."],";

        }
        ?>

        ]);

        // Set chart options
        var options = {'title':'Historico peso:',
                       'width':1000,
                        curveType: 'function',
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
<?php if(!isset($_SESSION["id"])){include 'includes/header.inc.php';}else{include 'includes/headerLogout.inc.php';} ?>

<div class="content_center">

		   <h2>Gerenciamento da Conta</h2> 
		   
	<div class="box-home" id="box-esq">
		<div class="box-info">
		<ul>
			<li>
				<label>Nome: </label>
				<?php 

					echo $usuarioView->__get("nome");

				 ?>
			</li>
			<li>
				<label>Idade: </label>
				<?php 

					echo $usuarioView->__get("idade");

				 ?>
			</li>
			<li>
				<label>Peso: </label>
				<?php 

					echo $usuarioView->__get("peso");

				 ?>
			</li>
			<li>
				<label>Objetivo: </label>
				<?php 

					echo $usuarioView->__get("objetivo") ." Peso";

				 ?>
			</li>
		</ul>
		</div>
	</div>

	<div class="box-center" id="box-central">
		<div class="box_input">
       		
       		<ul>
				<li>
					<input type="button" value="Atualizar Peso" id="btn_atualizarPeso" id="atualizarPeso" name="atualizarPeso" onClick="location.href='page_atualizacao_peso.php'">
				</li>
				<li>
					<input type="button" value="Pesquisar Refeicao" id="btn_pesquisarRef" id="pesquisarRef" name="pesquisarRef" onClick="location.href='page_pesquisa_alimentos.php'">
				</li>
				<li>
					<input type="button" value="Selecionar Refeicao" id="btn_alterarRef" id="alterarRef" name="alterarRef" onClick="location.href='selecionarRefeicao.php'">
				</li>
			</ul>
        </div>
    </div>
    <div id="chart_div"></div>
</div>
<?php include 'includes/footer.inc.php'; ?>


</body>
</html>
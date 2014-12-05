<html>
<head>
	<title>Kcal Control</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style_pesquisa.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include 'includes/header.inc.php'; ?>

<div class="content_center">

		   <h2>Gerenciamento da Conta</h2> 
		   
	<div class="box-home" id="box-esq">
		<div class="box-info">
		<ul>
			<li>
				<label>Nome: </label>
			</li>
			<li>
				<label>Idade: </label>
			</li>
			<li>
				<label>Peso: </label>
			</li>
			<li>
				<label>Objetivo: </label>
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
</div>
<?php include 'includes/footer.inc.php'; ?>


</body>
</html>
<!DOCTYPE html/>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style_pesquisa.css" rel="stylesheet" type="text/css">
	<?php require "valida_login.php"; ?>
	<?php include "classeBD.php";?>
	
</head>
<body>
	<?php include 'includes/header.inc.php'; ?>


<div class="content_center">
	<div class="box-center" id="box-peso">
		<div id="" class="tabela-peso">

			<h2>Tabela de Peso</h2>
	
			<?php
				$bd = new FuncoesBD();
				$bd->conectar();
				$bd->grafico();
			?>

		</div>
	</div>
</div>



</body>
</html>
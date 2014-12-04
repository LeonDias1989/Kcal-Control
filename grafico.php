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
	<div class="box-center">
		<div class="box_input">
	
		<?php
			$bd = new FuncoesBD();
			$bd->conectar();
			$bd->grafico();
		?>


	</div>
	</div>
	</div>


<?php include 'includes/footer.inc.php'; ?>
</body>
</html>
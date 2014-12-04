<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style_pesquisa.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include 'includes/header.inc.php'; ?>




<div class="content_center">
	<div class="box-center" id="box-peso">
		<div class="box_input">
       		<h2>Alterar peso</h2>
		    <form method="POST" action="teste_peso.php">
		        <input method="POST" type="text" placeholder="Email" id="email" name="email"/>   
		        <br/> 
		        <input method="POST" type="peso" placeholder="Peso" id="peso" name="peso"</input> 
		        <br/>
		        <input type="submit" value="Alterar" id="btn_alterar" id="alterar" name="alterar"/> 
		        
		    </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.inc.php'; ?>

</body>
</html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/style_pesquisa.css" rel="stylesheet" type="text/css">

<?php 

	require "valida_login.php";

 ?>

</head>
<body>
<?php 
	

	
	if(!isset($_SESSION["id"])){include 'includes/header.inc.php';}else{include 'includes/headerLogout.inc.php';} 


?>




<div class="content_center">
	<div class="box-center" id="box-peso">
		<div class="box_input">
       		<h2>Alterar peso</h2>
		    <form method="POST" action="alterar_peso.php">
		        
		        <input method="POST" type="text" placeholder="Peso" id="peso" name="peso"</input> 
		        <br/>
		        <input type="submit" value="Alterar" id="btn_alterar" id="alterar" name="alterar"/> 
		        
		    </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.inc.php'; ?>

</body>
</html>
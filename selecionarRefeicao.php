<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Consulta Refeição Console</title>
    <link href="css/style_pesquisa.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="ajax.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script language="JavaScript">


</script>
</head>
<body id="refeicao">
 <?php include 'includes/header.inc.php'; ?>
	<div id="Container">
       <div id="Pesquisar"> 
           <h1 class="titulo">Agenda de refeições</h1>
           <input type="text"  name="txtdata" id="txtdata" placeholder="O que você comeu hoje ?">
           <input type="button" name="btnPesquisar" id="btn-busca" value="Pesquisar" onclick="getRefeicao();"/> 
           <input type="button" value="add" id="btn-add" onclick="addalimento('addalimento');">
   		</div> 
        <div id="Resultado" class="content"></div> 
    </div>
     <?php include 'popup/msg.pop.php'; ?>
 <?php include 'includes/footer.inc.php'; ?>
</body>
</html>


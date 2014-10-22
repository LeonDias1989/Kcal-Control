<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/style_pesquisa.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="ajax.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="JavaScript">
function addalimento(aux){
  		$("."+aux).show(500);
		$(".TB_overlay").show(500);
}
	function getLinha(id) {
		var a = 0;
		var calorias = $("#Resultado "+'.'+id+' .calorias').html();
		var total = $("#total").html();
		var resultado 	= parseInt(calorias) + parseInt(total);
		$("#total").text(resultado);
		$("#tabela "+"."+id).each(function(i) {
            var idUnico = $(this).attr("class");
			if(idUnico == id){
				a++;
				}
        });
		if(a>0){
			var qtd = $("#tabela "+"."+id+" .qtd").html();
			var qtdAdd = parseInt(qtd) + 1;
			$("#tabela "+"."+id+" .qtd").text(qtdAdd);
			
			var caloriasTabela = $("#tabela "+"."+id+" .calorias").html();
			var caloriasTabelaAdd = parseInt(caloriasTabela) + parseInt(calorias);
			$("#tabela "+"."+id+" .calorias").text(caloriasTabelaAdd);
			//preenchimentos dos input hidden para enviar para o PHP.
			$("#total_calorias").val(resultado);
			}else{
			$("#tabela").css("display","block");
			$("#Resultado "+'.'+id).clone().appendTo("#nova_tabela");
			setTimeout(function(){$("#nova_tabela "+"."+id).attr("onclick","getExcluir("+id+");")}, 30);
			$("#nova_tabela .hover_add").text("Remover");
			//preenchimentos dos input hidden para enviar para o PHP.
			$("#total_calorias").val(resultado);
			}
	};
	function getExcluir(id) {
		var calorias = $("#tabela "+'.'+id+' .calorias').html();
		var total = $("#total").html();
		var resultado 	= parseInt(total) - parseInt(calorias);
		$("#total").text(resultado);
		$("#tabela "+"."+id).remove();
		//preenchimentos dos input hidden para enviar para o PHP.
			$("#total_calorias").val(resultado);
		
	};

	function addRefeicao(){
			var nomeRefeicao = $("#nome").attr("value");
			var ali;
			var vetor = new Array();
			
		$("#nova_tabela li").each(function(i) {
			
			var idAlimento = $(this).attr("class");
			var qtdAlimento = $("."+idAlimento +" "+".qtd").html();
			ali = {id:idAlimento, qtd:qtdAlimento};
			vetor[i] = ali;
        });
		
		var myJSONText = JSON.stringify(vetor);
		ajaxAlimento(nomeRefeicao, myJSONText);
		
		
	}




	function ajaxAlimento(nomeRefeicao, myJSONText){
		$.ajax({        
		   type: "POST",
		   url: "pesquisa_alimentos.php",
		   data: { nome: nomeRefeicao, alimentos: myJSONText },
		   success: function(data) {
			   //alert("aaa" + data);
				$("#msg_pop").html(data);
				$(".pop").show(500);        
		   },
		   error: function (xhr, ajaxOptions, thrownError) {
        		alert(thrownError);
      		}
		}); 
		
  
  
    };
</script>

</head>

<body>
 <?php include 'includes/header.inc.php'; ?>
   <div id="Container"> 
   <div id="Pesquisar"> 
   <h1 class="titulo"> Pesquisa de Alimentos</h1>
   <input type="text"  name="txtnome" id="txtnome" placeholder="O que você comeu hoje ?">
   <input type="button" name="btnPesquisar" id="btn-busca" value="Pesquisar" onclick="getDados();"/> 
   <input type="button" value="add" id="btn-add" onclick="addalimento('addalimento');">
   </div> 
   <div id="tabela">
   <h1 class="titulo"> Refeição</h1>
   <div class="salvar_refeicao">
   <div class="salvar_alimentos">
   	<span id="total" >0</span>
    <span id="txt_total">Kcal</span>
   </div>
   <div>
   	<form method="POST" action="pesquisa_alimentos.php">
        <label for="nome">Nome da Refeição:</label>
        <input type="text" name="nome" value="refeicao" id="nome" />
        
        <input type="button" name="acao" id="acaos" value="SALVAR" onclick="addRefeicao();"/> 
    </form>

   </div>
   </div>
   
			<ul id="nova_tabela" class="resultado content"> 
     		</ul>
   </div> 
   <div id="Resultado" class="resultado content"></div> 
   </div> 
 <?php include 'includes/footer.inc.php'; ?>   
   <div class="addalimento tb" id="tb2" >
        <div id="janela_add" class="box_input">
        	<span id="btn-fechar" onclick="$('.tb').fadeOut()" class="bt_excluir3"></span>
            <h2>Cadastro de Alimentos</h2>
            
            <form method="POST" action="incluir_alimento.php">
            
                
            <input type="text" name="nome" value="" id="nome_alimento" placeholder="Nome do Alimento"/>    
                         <input type="number" name="peso" value="" id="Peso" placeholder="Peso"> 
            <input type="number" name="porcao" value="" id="Porcao" placeholder="Porção">   

            <input type="number" name="calorias" id="Calorias" placeholder="Quantidade de Calorias"/>
            
            <input type="submit" value="Cadastrar" id="btn-salvar"/>
            
            </form>
        </div>
    </div>
    <div id="td1" class="TB_overlay tb" style="position:fixed;z-index:10000;top:0px;left:0px;height:100%;width:100%" onclick="$('.tb').fadeOut()">  	</div>
 <?php include 'popup/msg.pop.php'; ?>
</body>
</html>
	  // JavaScript Document
/** * Função para criar um objeto XMLHTTPRequest */ 
function CriaRequest() { 
	try{ 
		request = new XMLHttpRequest(); 
	}catch (IEAtual){ 
		try{ 
			request = new ActiveXObject("Msxml2.XMLHTTP"); 
		}catch(IEAntigo){ 
			try{ 
				request = new ActiveXObject("Microsoft.XMLHTTP"); 
			}catch(falha){ 
				request = false; 
			} 
		} 
	} 
	if (!request) 
		alert("Seu Navegador não suporta Ajax!"); 
	else return request; } 

/** * Função para enviar os dados */ 
function getDados() { 
	// Declaração de Variáveis 
	var nome = document.getElementById("txtnome").value; 
	var result = document.getElementById("Resultado"); 
	var xmlreq = CriaRequest(); 

	// Exibi a imagem de progresso 
	result.innerHTML = '<img src="Progresso1.gif"/>'; 

	// Iniciar uma requisição 
	xmlreq.open("GET", "alimentos.php?txtnome=" + nome, true); 
	
	// Atribui uma função para ser executada sempre que houver uma mudança de ado 
	xmlreq.onreadystatechange = function(){ 

	// Verifica se foi concluído com sucesso e a conexão fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 

		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
		result.innerHTML = xmlreq.responseText; 
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
			} 
	} 
}; xmlreq.send(null); }


/** * Função para enviar os dados */ 
function getRefeicao() { 
	// Declaração de Variáveis 
	var data = document.getElementById("txtdata").value; 
	var result = document.getElementById("Resultado"); 
	var xmlreq = CriaRequest(); 

	// Exibi a imagem de progresso 
	result.innerHTML = '<img src="Progresso1.gif"/>'; 

	// Iniciar uma requisição 
	xmlreq.open("GET", "pesquisa_refeicao.php?txtdata=" + data + "&idUsuario=" + idUsuario, true); 
	
	// Atribui uma função para ser executada sempre que houver uma mudança de ado 
	xmlreq.onreadystatechange = function(){ 

	// Verifica se foi concluído com sucesso e a conexão fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 

		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
		result.innerHTML = xmlreq.responseText; 
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
			} 
	} 
}; xmlreq.send(null); }

/** * Função para enviar os dados */ 
function getListaRefeicao(idRefeicao) { 
	// Declaração de Variáveis 
	var result = document.getElementById("msg_pop"); 
	var xmlreq = CriaRequest(); 

	// Exibi a imagem de progresso 
	result.innerHTML = '<img src="Progresso1.gif"/>'; 

	// Iniciar uma requisição 
	xmlreq.open("GET", "pesquisa_lista_refeicao.php?txtidRefeicao=" + idRefeicao, true);
	// Atribui uma função para ser executada sempre que houver uma mudança de ado 
	xmlreq.onreadystatechange = function(){ 

	// Verifica se foi concluído com sucesso e a conexão fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 

		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
		result.innerHTML = xmlreq.responseText; 
		$(".pop").show(500);
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
			} 
	} 
}; xmlreq.send(null); }

/** * Função para enviar os dados */ 
function getfavoritar(idRefeicao) { 
	// Declaração de Variáveis 
	var result = document.getElementById("msg_pop"); 
	var xmlreq = CriaRequest(); 

	// Exibi a imagem de progresso 
	result.innerHTML = '<img src="Progresso1.gif"/>'; 

	// Iniciar uma requisição 
	xmlreq.open("GET", "favoritar.php?txtidRefeicao=" + idRefeicao, true);
	// Atribui uma função para ser executada sempre que houver uma mudança de ado 
	xmlreq.onreadystatechange = function(){ 

	// Verifica se foi concluído com sucesso e a conexão fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 

		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
		result.innerHTML = xmlreq.responseText; 
		$(".pop").show(500);
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
			} 
	} 
}; xmlreq.send(null); }

/** * Função para enviar os dados */ 
function getListafavorito() { 
	// Declaração de Variáveis 
	var result = document.getElementById("msg_pop"); 
	var xmlreq = CriaRequest(); 

	// Exibi a imagem de progresso 
	result.innerHTML = '<img src="Progresso1.gif"/>'; 

	// Iniciar uma requisição 
	xmlreq.open("GET", "listafavoritos.php?id=" + idUsuario, true);
	// Atribui uma função para ser executada sempre que houver uma mudança de ado 
	xmlreq.onreadystatechange = function(){ 

	// Verifica se foi concluído com sucesso e a conexão fechada (readyState=4) 
	if (xmlreq.readyState == 4) { 

		// Verifica se o arquivo foi encontrado com sucesso 
		if (xmlreq.status == 200) { 
		result.innerHTML = xmlreq.responseText; 
		$(".pop").show(500);
		}else{ 
			result.innerHTML = "Erro: " + xmlreq.statusText; 
			} 
	} 
}; xmlreq.send(null); }
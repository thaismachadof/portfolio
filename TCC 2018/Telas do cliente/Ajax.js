/** * Função para criar um objeto XMLHTTPRequest */ 
function CriaRequest() 
{ 
	try
	{ 
		request = new XMLHttpRequest(); 
	}
	catch (IEAtual)
	{ 
		try
		{ 
			request = new ActiveXObject("Msxml2.XMLHTTP"); 
		}
		catch(IEAntigo)
		{ 
			try
			{ 
				request = new ActiveXObject("Microsoft.XMLHTTP"); 
			}
			catch(falha)
			{ 
				request = false; 
			} 
		} 
	} 
	if (!request) 
		alert("Seu Navegador não suporta Ajax!"); 
	else 
		return request; 
} 

function alterarDados() {
  			var xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
     		document.getElementById("corpo").innerHTML = this.responseText;
   				 }
  			};
  			xhttp.open("POST", "alterarDados.php", true);
  			xhttp.send();
}

function logar() {
  			var xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
     		document.getElementById("login").innerHTML = this.responseText;
   				 }
  			};
  			xhttp.open("POST", "login.php", true);
  			xhttp.send();
}

function pedido(preco) {
  			var xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
     		document.getElementById("corpo").innerHTML = this.responseText;
   				 }
  			};
  			xhttp.open("GET", "finalizarPedido.php?preco=" + preco, true);
  			xhttp.send();
}

function limpar(pedido) {
  			var xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
     		
   				 }
  			};
  			xhttp.open("GET", "limparCarrinho.php?pedido=" + pedido, true);
  			xhttp.send();
}

/** * Função para enviar os dados */ 
function adicionar(cod_produto) 
{ 
	// Declaração de Variáveis
        var id = "produto_" + cod_produto;
	var quantidade = document.getElementById(id).value; 
     
	var xmlreq = CriaRequest(); // recebe um objeto XMLHTTPRequest retornado pela função CriaRequest()

        var endereco = "ADDcarrinho.php?id_produto=" + cod_produto + "&quantidade=" + quantidade;
        
	// Iniciar uma requisição 
	xmlreq.open("GET", endereco , true); 

	// Atribui uma função para ser executada sempre que houver uma mudança de ado 
	xmlreq.onreadystatechange = function()
	{ 
		// Verifica se foi concluído com sucesso e a conexão fechada (readyState=4) 
		if (xmlreq.readyState == 4) 
		{ 
			// Verifica se o arquivo foi encontrado com sucesso 
			if (xmlreq.status == 200) 
			{ 
				result.innerHTML = xmlreq.responseText; 
			}
			else
			{ 
				result.innerHTML = "Erro: " + xmlreq.statusText;
			} 
		} 
	};
	xmlreq.send(null); 
}

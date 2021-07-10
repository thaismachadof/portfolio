<?php
if (isset($_POST['name']))
{
	// recebendo as variáveis do formulário
	
	$nome=$_POST["name"];
	$sobnome=$_POST["sobnome"];
	$email=$_POST["email"];
	$senha=$_POST["password"];
	$situacao=$_POST["sit"];
	$imagem = $_FILES['imagem'];
	
	if($imagem != NULL) { 
		$nomeFinal = time().'.jpg';
		if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
			$tamanhoImg = filesize($nomeFinal); 
 
			$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
	
			// criando a conexão com o banco de dados
	
			$con=mysqli_connect("localhost","root","","projetomct");
	
			// Verificando a conexão
	
			if (mysqli_connect_errno())
			{
				echo "Falha na conexão com MySQL: " . mysqli_connect_error();
			}

			$sql="INSERT INTO cliente (nome, sobrenome, email, senha, situacao, fotocli)
			VALUES ('$nome','$sobnome','$email','$senha','$situacao','$mysqlImg')";

			if (!mysqli_query($con,$sql))
			{
				die('Error: ' . mysqli_error($con));
			}

			unlink($nomeFinal);
			mysqli_close($con);
			
			header("location:index.php"); 
		}
	}
}
?>

<!DOCTYPE HTML>


<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Primeira tela do JohnCleythom</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive"/>
		<meta name="author" content="GetTemplates.co" />

		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Themify Icons-->
		<link rel="stylesheet" href="css/themify-icons.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="css/magnific-popup.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
		<!-- Owl Carousel  -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<!-- Theme style  -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		
		<script type="text/javascript">
			function validarEmail() {
				if(frm.email.value.indexOf("@") == -1 || frm.email.valueOf.indexOf(".") == -1 || frm.email.value == "" || frm.email.value == null) {
					alert("Por favor, indique um e-mail válido.");
					frm.email.focus();
					return false; }
			}
			
			function validarSenha() {
				if(frm.password.value == ""){
					alert("Favor preencher a Senha");
					frm.password.focus();
					return false; 
				}
				else if(frm.password.value.length < 6){
					alert("Favor preencher a Senha com o mínimo de 6 caracteres");
					frm.password.focus();
					return false;
				}
			}
		</script>
	</head>
	
	<body>

		
<div class="gtco-loader"></div>

	
	<div id="page">

	
<!-- a tag gtco nav agrupa blocos de link de um mesmo assunto ou links internos do site.
          ele indica que 1 blc é um blc de navegação-->
	
			<nav class="gtco-nav" role="navigation">
	
	<!-- a tag gtco container server para agrupar as colunas, sempre tem que ter antes do row-->
					<div class="gtco-container">
			
			<!-- </DIV DA PARTE SUPERIOR 1, COMECA AQUI> -->
			
					<!-- a tag row serve para a criaçao de uma coluna-->
	<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">MCT <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="cardapio.php">Cardapio</a></li>
						<li><a href="perfil.php">Perfil</a></li>
						<li><a href="carrinho.php">Carrinho</a></li>
						<li><a href="historico.php">Histórico</a></li>
					</ul>	
				</div>
	<!-- Fim da div coluna/row-->
		</div>
	
	</nav>
	<!-- DIV DA PARTE SUPERIOR 1, TERMINA AQUI-->
			
<!-- DIV DA PARTE SUPERIOR 2, COMECA AQUI-->
	
<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_1.jpg)">
		

	<div class="overlay"></div>
		<div class="gtco-container">
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br>
		

	<div class="row">
					<div class="col-md-8 col-md-offset-0,20">
					<div class="row row-mt-5em">

						<div class="col-md-10 mt-text animate-box" data-animate-effect="fadeInUp">
							<span class="intro-text-small">Realize seu</span>
							<h1>CADASTRO</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
		<!-- </DIV DA PARTE SUPERIO 2 TERMINA AQUI> -->
	
	    <!-- </DIV DAS CAIXAS, COMECA AQUI> -->
	<div class="gtco-section border-bottom" style="background-color: white;">
		<div class="gtco-container">
			<div class="row">
		
				<div class="col-md-12">
				
				<div class="col-md-5 animate-box ">
					
					<!-- Normalmente especifica o arquivo/pag para qual o form é submetido. o # indica que o form
					      permanecera na mesma pag. é o mesmo que <a href=#"></a>-->
					<form name="frm" method="POST" enctype="multipart/form-data">
						
						<div class="row form-group">
							
							<div class="col-md-10">
								<label for="name"><b>Nome:</b></label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Digite seu nome" required="required">
							</div>
							
						</div>

						<div class="row form-group">
							<div class="col-md-10">
								<label for="sobnome"><b> Sobrenome: </b></label>
								<input type="text" id="sobnome" name="sobnome" class="form-control" placeholder="Digite o seu sobrenome" required="required">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-10">
								<label for="email"><b> Email: </b></label>
								<input type="text" id="email" name="email" class="form-control" placeholder="Digite seu Email" onblur="validarEmail()" required="required">
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-md-10">
								<label for="password"><b> Senha: </b></label>
								<input type="password" id="password" name="password" class="form-control" placeholder="Digite sua senha" onblur="validarSenha()" required="required">
							</div>
						</div>
						
						<div class="col-md-10">
								<br><label for="fotocli"><b> Imagem: </b></label>
								<input enctype="multipart/form-data" name="imagem" id="imagem" type ="file" value="Insira uma imagem" required="required">
						</div>
						<!-- </DIV DAS CAIXAS, TERMINAM AQUI> -->
						
						<!-- </DIV DAS OPCOES, COMECAM AQUI> -->
						
						<div class="row form-group">
							<div class="col-md-10">
								<label for="subject"><b> Situação: </b></label>
								<br>
								<input required="required" type="radio" name="sit" value="aluno"/> Aluno<br>
								<input type="radio" name="sit" value="professor"/> Professor<br>
								<input type="radio" name="sit" value="servidor"/> Servidor<br>
								<input type="radio" name="sit" value="outros"/> Outros<br>
								
							</div>
						</div>
						<!-- </DIV DAS OPCOES, TERMINAM AQUI> -->
						
						<!-- </BUTOES, COMECAM AQUI> -->

						<div class="form-group">
						
							<input type="submit" value="Concluir cadastro" class="btn btn-primary">
						</div>
						
						
						<div class="col-md-10 left-side">
							<input type="reset" value="Limpar" class="btn btn-primary">
						</div>	
						

					</form>		
				 

				 </div>
			</div>
		</div>
	</div>
</div>


	
	<!-- </BUTOES, TERMINAM AQUI> -->
	
	<!-- </TUDO TERMINA AQUI, NAO MEXER DAQUI PRA BAIXO, ANIMAL!!!!!!!> -->

	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>
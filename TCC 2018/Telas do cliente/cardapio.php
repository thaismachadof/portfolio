<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> Cardapio </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by GetTemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="GetTemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
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
	<script src="js/jquery.tabify.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	</head>
	<body>
		<script src="js/jquery.tabify.js"></script>
		<script type="text/javascript" src="Ajax.js"></script>
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
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
						<li><a href="historico.php">Hist??rico</a></li>
						<li><a href="sair.php"> Sair </a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(images/img_1.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					<div class="row row-mt-15em">

						<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1> CARD??PIO </h1>	<p><font color=#09C6AB> Aqui est??o listados todos os nossos produtos! </font></p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</header>
	<form name="form" method="GET">
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
			</div>
				<ul id="tabify_menu" class="menu_tab" style="margin: 0;">
					<li><a href="#salgados"> SALGADOS</a></li>
					<li><a href="#bebidas">BEBIDAS</a></li>
					<li><a href="#doces">DOCES</a></li>
					<li><a href="#combos">COMBOS</a></li>
				</ul>
				<div id="salgados" class="tab_content">
						
						<!-- C??digo servidor para criar as divs -->
						<?php 
						session_start();  
						if(isset($_SESSION['email']))  
						{  
						// Conexao com banco de dados
							require_once('dbConnect.php');

							$sql = "SELECT * FROM produto WHERE tipo = 'salgado'";
	
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
	
							foreach($stmt as $row) {
								echo '<div class="col-lg-4 col-md-4 col-sm-6">
								<div class="fh5co-card-item">
								<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" alighn=left alt="Image" class="img-responsive">
								</figure>
								</a>
								<div class="fh5co-text">
								<h2>' . $row["nome"] . '</h2>
								<p>' . $row["descricao"] . ' <br> R$ ' . $row["preco"] . '</p>
                                                                    
								<p>
                                                                    <input type="button" class="btn btn-primary" onClick=adicionar("' . $row['id_produto'] .'") value="Add ao carrinho">
                                                                </p>
								<p>
                                                                    Quantidade: 
                                                                    <br> 
                                                                    <input id="produto_' . $row['id_produto'] . '" type="number" value="1" name="qtd" style="width: 50px; height: 35px;">
                                                                </p>
								</div>
								</div>
								</div>';
							}
						}
						?>  
				</div>
					<div id="bebidas" class="tab_content">
						
						<!-- C??digo servidor para criar as divs -->
						<?php 
						if(isset($_SESSION['email']))  
						{  
						// Conexao com banco de dados
							require_once('dbConnect.php');

							$sql = "SELECT * FROM produto WHERE tipo = 'bebida'";
	
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
	
							foreach($stmt as $row) {
								echo '<div class="col-lg-4 col-md-4 col-sm-6">
								<div class="fh5co-card-item">
								<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" alighn=left alt="Image" class="img-responsive">
								</figure>
								</a>
								<div class="fh5co-text">
								<h2>' . $row["nome"] . '</h2>
								<p>' . $row["descricao"] . ' <br> R$ ' . $row["preco"] . '</p>
                                                                    
								<p>
                                                                    <input type="button" class="btn btn-primary" onClick=adicionar("' . $row['id_produto'] .'") value="Add ao carrinho">
                                                                </p>
								<p>
                                                                    Quantidade: 
                                                                    <br> 
                                                                    <input id="produto_' . $row['id_produto'] . '" type="number" value="1" name="qtd" style="width: 50px; height: 35px;">
                                                                </p>
								</div>
								</div>
								</div>';
							}
						}
						?>
				</div>
				<div id="doces" class="tab_content">
						
						<!-- C??digo servidor para criar as divs -->
						<?php  
						if(isset($_SESSION['email']))  
						{  
						// Conexao com banco de dados
							require_once('dbConnect.php');

							$sql = "SELECT * FROM produto WHERE tipo = 'doce'";
	
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
	
							foreach($stmt as $row) {
								echo '<div class="col-lg-4 col-md-4 col-sm-6">
								<div class="fh5co-card-item">
								<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" alighn=left alt="Image" class="img-responsive">
								</figure>
								</a>
								<div class="fh5co-text">
								<h2>' . $row["nome"] . '</h2>
								<p>' . $row["descricao"] . ' <br> R$ ' . $row["preco"] . '</p>
                                                                    
								<p>
                                                                    <input type="button" class="btn btn-primary" onClick=adicionar("' . $row['id_produto'] .'") value="Add ao carrinho">
                                                                </p>
								<p>
                                                                    Quantidade: 
                                                                    <br> 
                                                                    <input id="produto_' . $row['id_produto'] . '" type="number" value="1" name="qtd" style="width: 50px; height: 35px;">
                                                                </p>
								</div>
								</div>
								</div>';
							}
						}
						?>
				</div>
				<div id="combos" class="tab_content">
						
						<!-- C??digo servidor para criar as divs -->
						<?php  
						if(isset($_SESSION['email']))  
						{  
						// Conexao com banco de dados
							require_once('dbConnect.php');

							$sql = "SELECT * FROM produto WHERE tipo = 'combo'";
	
							$stmt = $pdo->prepare($sql);
							$stmt->execute();
	
							foreach($stmt as $row) {
								echo '<div class="col-lg-4 col-md-4 col-sm-6">
								<div class="fh5co-card-item">
								<figure>
								<div class="overlay"><i class="ti-plus"></i></div>
								<img src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" alighn=left alt="Image" class="img-responsive">
								</figure>
								</a>
								<div class="fh5co-text">
								<h2>' . $row["nome"] . '</h2>
								<p>' . $row["descricao"] . ' <br> R$ ' . $row["preco"] . '</p>
                                                                    
								<p>
                                                                    <input type="button" class="btn btn-primary" onClick=adicionar("' . $row['id_produto'] .'") value="Add ao carrinho">
                                                                </p>
								<p>
                                                                    Quantidade: 
                                                                    <br> 
                                                                    <input id="produto_' . $row['id_produto'] . '" type="number" value="1" name="qtd" style="width: 50px; height: 35px;">
                                                                </p>
								</div>
								</div>
								</div>';
							}
						}
						?>
				</div>
		</div>
	</div>
	<div id="Resultado">
	</div>
	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Sobre n??s</h3>
						<p>Somos uma empresa de desenvolvimento de aplicativos e sites para lojas e cia. Criamos o que voc?? desejar e mais. Composto por publicit??rios, engrenheiros, administradores... Nossa equipe ?? perfeita para atender suas necessidades e fazer seu com??rcio explodir!</p>
					</div>
				</div>


				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Fale conosco!</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> 21 992514662</a></li>
							<li><a href="#"><i class="icon-mail2"></i> projetomct2018@gmail.com</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2018 Free HTML5. Todos os direitos reservados ao MCT e seus integrantes iniciais. Tha??s Machado, Cidcley Fernades, Marcos Maur??cio e Jo??o Marcelo.</small> 
					
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
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
<!DOCTYPE HTML>
<!--
	Aesthetic by gettemplates.co
	Twitter: http://twitter.com/gettemplateco
	URL: http://gettemplates.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Carrinho - MCT</title>
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
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<script type="text/javascript" src="Ajax.js"></script>
	
	</head>
	<body>
		
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
						<li><a href="historico.php">Histórico</a></li>
						<li><a href="sair.php"> Sair </a></li>
					</ul>	
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
							<h1>CARRINHO</h1>	
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</header>
	
	
	
	<div class="gtco-section border-bottom">
		<div class="gtco-container">
				<div class="col-md-4" style="text-align:right">
						<div class="price-box popular">
							<h2 class="pricing-plan">Resumo do pedido</h2><hr>
							<h3><p>Total:</p></h3>
							<?php 
								session_start();
								//Conexao com banco de dados
								require_once('dbConnect.php');
								$cliente = $_SESSION['id_cli'];
								$sql="SELECT id_pedido FROM pedido WHERE cliente = '$cliente'";
			
								$result = $pdo->prepare($sql);
								$result->execute();

								// output data of each row
								foreach($result as $row) {
									$id_pedido = $row["id_pedido"];
								}
								
								$total = 0;
								$sql = "SELECT produto.nome, pedido_produto.quantidade, produto.preco FROM pedido_produto, produto WHERE produto.id_produto = pedido_produto.id_produto AND id_pedido=" . $id_pedido .";";	
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
								foreach($stmt as $row) {
									$preco = $row["preco"] * $row["quantidade"];
									$total = $total + $preco;
								}
								echo $total;
						?>  
							<ul class="pricing-info">
								<br><li><b>Subtotal:</b></li>
								<?php
									echo 'R$ ' . $total;
								?>
							</ul>
							<input type="button" class="btn btn-primary btn-sm" name="finalizar" id="finalizar" onclick="pedido(<?php echo $total ?>)" value="Finalizar pedido">
						</div>
				</div>
				
				<div class="pk">
					<table id="box">
						<tr><td width=300></td>
							<td width=300><b><p>NOME DO PRODUTO</p></b></td>
							<td width=300><b><p>QUANTIDADE DO PRODUTO</p></b></td>
							<td width=300><b><p>PREÇO DO PRODUTO</p></b></td>
						</tr><hr>
					
						<?php 
								//Conexao com banco de dados
								require_once('dbConnect.php');

								$sql = "SELECT produto.img, produto.nome, pedido_produto.quantidade, produto.preco FROM pedido_produto, produto WHERE produto.id_produto = pedido_produto.id_produto AND id_pedido=" . $id_pedido .";";
	
								$stmt = $pdo->prepare($sql);
								$stmt->execute();
	
								foreach($stmt as $row) {
									echo '
									<tr>
									<td width=300><img src="data:image/jpeg;base64,' . base64_encode($row["img"]) . '" alt="Image" class="img-responsive"></td>
									<td width=300>' . $row["nome"] . '</td>
									<td width=300>' . $row["quantidade"] . '</td>
									<td width=300>R$ '. $row["preco"] .'</td>
									</tr>';
							}
						?>  
					</table>
				</div>
		</div><hr><br><br>
		<a href="cardapio.php" class="btn btn-primary btn-sm" style="padding-right">Adicionar itens ao carrinho</a>
		<a class="btn btn-primary btn-sm" onclick="limpar(<?php echo $id_pedido ?>)">Zerar carrinho</a>
	</div>


	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row copyright">
				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Sobre nós</h3>
						<p>Somos uma empresa de desenvolvimento de aplicativos e sites para lojas e cia. Criamos o que você desejar e mais. Composto por publicitários, engrenheiros, administradores... Nossa equipe é perfeita para atender suas necessidades e fazer seu comércio explodir!</p>
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
						<small class="block">&copy; 2018 Free HTML5. Todos os direitos reservados ao MCT e seus integrantes iniciais. Thaís Machado, Cidcley Fernades, Marcos Maurício e João Marcelo.</small> 
					
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


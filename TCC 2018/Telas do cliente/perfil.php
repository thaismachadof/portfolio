<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Perfil - MCT</title>
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
        <script src="ajax.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

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
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-center">
					
          <br> <br> <br> <br> <br> <br> <br> <br> <br>
						<div class="col-md-15 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<!-- Div principal do formulário -->
							<div id="corpo" class="form-wrap" id="back" style="background-color: white">
								<div class="tab">
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<h3>Perfil</h3>
									<?php 
                                                                                session_start(); 
                                                                                $id_cli=$_SESSION['id_cli'];
										//conexao
										require_once('conexao.php');
										//realizando culsulta sql
										$sql="SELECT nome,sobrenome,email,saldo, fotocli FROM cliente WHERE id_cli='$id_cli'";
										//passando o que será selecionado
										$resultadosql=mysqli_query($con,$sql);
										
										// imprimindo valores do cli

											$registro=mysqli_fetch_assoc($resultadosql);
										
									?>
                                                                                    <div style="float:center;">
                                                                                        <?php echo "".'<img src="data:image/jpeg;base64,' . base64_encode($registro['fotocli']) . '"width="100" height="100">' .""; ?>
                                                                                    </div>
									<div style= "float:left;">
											<h4>Nome: <?php echo $registro['nome'] . ' ' . $registro['sobrenome']; ?> </h4> 
											<h4>Email: <?php echo $registro['email']; ?></h4>
									</div>
											
										<div style= "float:right;">
											<h4>Saldo:<?php if($registro['saldo'] == NULL) echo '<a> Saiba como adicionar seu saldo </a>'; else echo $registro['saldo']; ?></h4>
										</div>
										</div>
									</div>	
                                                <div class="row form-group">
													<div class="col-md-12">
														<input type="button" class="btn btn-primary btn-block" value="Alterar dados" onclick="alterarDados();">
													</div>
												</div>
												
												
												</div>
											
											</form>	
										</div>

										
									</div>
								</div>
							</div>
						</div>
					
					</div>
							
					
				</div>
			

	   
	</header>
	
	

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

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


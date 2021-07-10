<html>
	<head></head>
	<body>
		<div class="form-wrap" id="back" style="background-color: white">
			<div class="tab">
				<form method="POST" action="updateCliente.php">
					<div class="tab-content">
						<div class="tab-content-inner active" data-content="signup">
							<h3>Perfil</h3>
							<?php 
                                session_start();
                                $id_cli=$_SESSION['id_cli'];
								//conexao
								require_once('conexao.php');
								//realizando consulta sql
								$sql="SELECT nome,sobrenome,email,saldo, fotocli FROM cliente WHERE id_cli='$id_cli'";
								//passando o que será selecionado
								$resultadosql=mysqli_query($con,$sql);	
								// imprimindo valores do cli
								$registro=mysqli_fetch_assoc($resultadosql);		
							?>
                            <div style="float:center;">
                                <?php echo "".'<img src="data:image/jpeg;base64,' . base64_encode($registro['fotocli']) . '"width="100" height="100">' .""; ?>
								<center><input enctype="multipart/form-data" name="imagem" id="imagem" type ="file" value="Insira uma imagem"></center>
                            </div>
							<div style= "float:left;">
								<h4><b><p>Nome: </p></b><input type="text" name="nome" class="form-control" value="<?php echo $registro['nome']; ?>" </h4> 
								<h4><b><p>Sobrenome: </p></b><input type="text" name="sobrenome" class="form-control" value="<?php echo $registro['sobrenome']; ?>" </h4> 
								
							</div>
											
							<div style= "float:right;">
								<h4><b><p>Email: </p></b><input type="text" name="email" class="form-control" value="<?php echo $registro['email']; ?>"></h4>
							</div>
						</div>
					</div>	
                    <div class="row form-group">
						<div class="col-md-12">
							
							<input type="submit" class="btn btn-primary btn-block" value="Enviar dados">
						</div>
					</div>	
				</form>						
			</div>	
		</div>
	</body>
</html>
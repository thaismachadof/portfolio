<?php
	session_start();
	// Pegando o id_produto via método GET
		$cliente=$_SESSION['id_cli'];
		$preco = $_GET['preco'];
	
			$con=mysqli_connect("localhost","root","","projetomct");
	
			// Verificando a conexão
	
			if (mysqli_connect_errno())
			{
				echo "Falha na conexão com MySQL: " . mysqli_connect_error();
			}
			
			$sql="SELECT id_pedido FROM pedido WHERE cliente = '$cliente'";
			
			$result = mysqli_query($con, $sql);

				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
					$id_pedido = $row["id_pedido"];
				}
			date_default_timezone_set('America/Sao_Paulo');	
			$data=date('Y-m-d H:i:s');

			$sql="UPDATE pedido SET preco_total='$preco', data_hora='$data', finalizado='true' WHERE id_pedido='$id_pedido'";

			if (!mysqli_query($con,$sql))
			{
				die('Error: ' . mysqli_error($con));
			}

			mysqli_close($con);
?>
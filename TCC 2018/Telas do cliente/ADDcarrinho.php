<?php
	session_start();
	// Pegando o id_produto via método GET
		$cliente=$_SESSION['id_cli'];
		$id_prod = $_GET['id_produto'];
        $quantidade = $_GET['quantidade'];
	
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

			$sql="INSERT INTO pedido_produto (id_produto, id_pedido, quantidade)
			VALUES ('$id_prod', '$id_pedido', '$quantidade')";

			if (!mysqli_query($con,$sql))
			{
				die('Error: ' . mysqli_error($con));
			}
			echo "1 registro adicionado";

			mysqli_close($con);
?>
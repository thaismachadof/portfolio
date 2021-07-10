<?php
	$pedido=$_GET['pedido'];
	session_start();
	$cliente=_SESSION['id_cli'];
	require_once('conexao.php');
	
	$sql="DELETE FROM pedido_produto WHERE id_pedido = '$pedido';";		
	$result = mysqli_query($con, $sql);
?>
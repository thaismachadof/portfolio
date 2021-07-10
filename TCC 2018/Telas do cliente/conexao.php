<?php
$con=mysqli_connect("localhost","root","","projetomct");
	
	if (mysqli_connect_errno())
	{
		echo "Falha na conexão com MySQL: " . mysqli_connect_error();
	}
?>
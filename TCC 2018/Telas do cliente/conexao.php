<?php
$con=mysqli_connect("localhost","root","","projetomct");
	
	if (mysqli_connect_errno())
	{
		echo "Falha na conex�o com MySQL: " . mysqli_connect_error();
	}
?>
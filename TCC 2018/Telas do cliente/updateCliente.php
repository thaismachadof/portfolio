<?php
    //Itens que vao para o BD
    session_start();
    $nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    // $imagem = $_FILES['imagem'];
	
    if($nome != NULL) { 
	//$nomeFinal = time().'.jpg';
        //if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
            //$tamanhoImg = filesize($nomeFinal); 
 
            //$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 
            //tentar conexao
            $strcon = mysqli_connect('localhost','root','','projetomct') or die('Erro ao conectar ao banco de dados');
            //comando SQL
            $sql = "UPDATE cliente SET nome='$nome', email='$email', sobrenome='$sobrenome'"; 
            //verificar comando
            mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
            mysqli_close($strcon); 
			
			header("location:perfil.php"); 
        //}
    }
?>
<?php
// Inicia a sess�o
session_start();

// Destr�i a sess�o
$_SESSION = array();

session_destroy();

// Redireciona para o login.php
header('location: index.php');
?>
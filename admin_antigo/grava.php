<?php header("Content-Type: text/html; charset=iso-8859-1");?>
<?php
include("includes/configuracoes.php");
include("includes/conecta.php");

$nome = $_GET['nome'];
$email = $_GET['email'];
$duvida = $_GET['duvida'];




//daqui pra baixo faz enviar o email para o leao da web
?>
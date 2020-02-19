<?php
ob_start();
include("../includes/configuracoes.php");// arquivo de configurações
include("../includes/conecta.php");
include("includes/seguranca.php");
include("includes/verifica_session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="favicon.ico">
<title>Área Administrátiva - <?php echo $licenciado_para; ?></title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="javascript/funcoes.js"></script> 

</head>
<body>






<div id="conteudo">

	<div id="menu"><?php include("includes/menu.php"); ?></div>

	<div id="p1"></div>
    
    	<div id="meio">
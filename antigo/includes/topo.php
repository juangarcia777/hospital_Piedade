<?php
ob_start();
include("includes/conecta.php");
include("includes/seguranca.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Associação Beneficente Hospital Nossa Senhora da Piedade <?php echo date("Y"); ?></title>


<meta name="description" content="Associação Beneficiente Hospital Nossa Senhora da Piedade" />
<meta name="keywords" content="hospital" />
<meta name="robots" content="index,follow" />
<meta name="author" content="Diogo Mastrangelo" />
<meta name="google-site-verification" content="QeZQ1cMDkDYd2fwiO425ML0lurhHEAnXb37gNO0GNEA" />


<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="css/style.css" type="text/css">
<script src="javascript/jquery.min.js" type="text/javascript"></script>
<script src="javascript/jquery.cycle.all.js" type="text/javascript"></script>
<script src="javascript/funcoes.js" type="text/javascript"></script>


<link href="css_pirobox/style_2/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/pirobox_extended.js"></script>



</head>

<body>


<div id="geral">


	<div id="topo">
    
    	<a href="index.php" title="Página Inicial"><div id="logo"></div></a>
        
        <div style="width:227px; height:120px; float:left; margin-left:492px; margin-top:72px">
        	<table cellpadding="0" cellspacing="0">
            <tr><td align="right">
            <span style="color:#7ABBEE; font-size:16px">Fone: </span>
            <span style="color:#7ABBEE; font-size:18px">(14) 3269-1033</span></td></tr>
            <tr><td height="15"></td></tr>
            	<tr><td>
                	<div style="width:227px; height:29px; background-image:url(interface/busca.png); background-repeat:no-repeat">
                    <form method="post" action="busca.php">
                    	<table cellpadding="0" cellspacing="0" style="margin-left:9px">                            
                        	<tr><td height="3"></td></tr>
                            <tr><td><input type="text" name="busca" value="digite sua busca..." style="width:190px; height:23px; background-color:transparent;border:0; color:#999" /></td></tr>
                        </table>
                    </form>    
                    </div>
                </td></tr>
            </table>
        </div>
    
    	<div id="menu">
        	<table cellpadding="0" cellspacing="0">
            	<tr>
                	<td align="center"><a href="index.php" title="Página Inicial"><img src="interface/a1.png" /></a></td>
                    <td width="60"></td>
                    <td align="center"><a href="hospital.php" title="Hospital"><img src="interface/a2.png" /></a></td>
                    <td width="60"></td>
                    <td align="center"><a href="exames.php" title="Exames e Diagnósticos"><img src="interface/a4.png" /></a></td>
                    <td width="60"></td>
                    <td align="center"><a href="parceiros.php" title="Parceiros"><img src="interface/a7.png" /></a></td>
                    <td width="60"></td>
                    <td align="center"><a href="bebes.php" title="Berçário"><img src="interface/a6.png" /></a></td>
                    <td width="60"></td>
                    <td align="center"><a href="sustentabilidade.php" title="Sustentabilidade"><img src="interface/a2.png" /></a></td>
                    <td width="60"></td>
                    <td align="center"><a href="contato.php" title="Contato"><img src="interface/a5.png" /></a></td>
                </tr>
                
                <tr><td height="4"></td></tr>
                
                <tr>
                	<td align="center"><a href="index.php" title="Página Inicial" class="menu">HOME</a></td>
                    <td width="60"></td>
                    <td align="center"><a href="hospital.php" title="Hospital" class="menu">O HOSPITAL</a></td>
                    <td width="60"></td>
                    <td align="center"><a href="especialidades.php" title="Exames e Diagnósticos" class="menu">EXAMES E DIAGNÓSTICOS</a></td>
                    <td width="60"></td>
                    <td align="center"><a href="parceiros.php" title="Parceiros" class="menu">PARCEIROS</a></td>
                    <td width="60"></td>
                    <td align="center"><a href="bebes.php" title="Berçario" class="menu">BERÇÁRIO</a></td>
                    <td width="60"></td>
                    <td align="center"><a href="sustentabilidade.php" title="Sustentabilidade" class="menu">SUSTENTABILIDADE</a></td>
                    <td width="60"></td>
                    <td align="center"><a href="contato.php" title="Contato" class="menu">CONTATO</a></td>
                    
                </tr>    
                
                
                
            </table>
        </div>
        
    </div>


<div id="arruma_meio">


<div id="conteudo">

	<div id="barra"></div>
	<?php include("includes/banners.php"); ?>





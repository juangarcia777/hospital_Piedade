<?php
ob_start();
include("../includes/conecta.php"); // conexão com o banco
include("includes/seguranca.php"); // seguranca para o sites
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Área Administrátiva - Web Plus</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="javascript/funcoes.js"></script>
<script src="javascript/jquery.js" type="text/javascript"></script> 
</head>
<body>




<?php
$b=0;
if(isset($_GET['action']) && $_GET['action'] == 2){
	@session_start();
	session_destroy();	
	$b=1;
	$message = 'Logout efetuado com sucesso.';
	echo '<script>alert("'.$message.'");</script>';
}


@session_start();
if(isset($_SESSION['administrador_fulltop_rota'])){
header("Location: administracao.php"); //Direciona para a pagina de adm										
}


if(isset($_GET['action']) && $_GET['action'] == 1){
		
		
		$pega = mysql_query("SELECT * FROM admin WHERE usuario='$usuario' and senha='$senha' LIMIT 1");
		
		if(mysql_num_rows($pega)){
				
				$ln = mysql_fetch_array($pega);
								
				@session_start();		
				$_SESSION['administrador_fulltop']=$ln['id']; //Starta a sessão						
				header("Location: administracao.php"); //Direciona para a pagina de adm									
				
		
		} else {
		
				$b=1;
				$message = 'Erro: Usuário ou senha inválidos.';
				echo '<script>alert("'.$message.'");</script>';
				
		}
		

} 
?>





	<div id="logar">
   	            
         
        
        <form method="post" action="index.php?action=1">
            <table cellpadding="0" cellspacing="0" style="margin-left:80px" >
            	<tr><td height="118"></td></tr>
                <tr><td align="right"><span style="color:#333; font-size:13px; font-style:italic"><b>Usuário:</b></span></td><td width="4"></td><td><div id="imp"><input name="usuario" type="text" style="width:250px; height:23px; margin-top:2px; border:0; margin-left:4px; color:#999; border:1px solid #CCC" /></div></td></tr>
                <tr><td height="15"></td></tr>                
                <tr><td align="right"><span style="color:#333; font-size:13px; font-style:italic"><b>Senha:</b></span></td><td width="4"></td><td><div id="imp"><input type="password" id="senha" name="senha" style="width:250px; height:23px; margin-top:2px; border:0; margin-left:4px; color:#999; border:1px solid #CCC"  /></div></td></tr>
                <tr><td height="34"></td></tr>
                </table>
         
                
                <table cellpadding="0" cellspacing="0"style="margin-left:60px"  >
                <tr><td align="left"><input type="image" src="interface/ent.jpg" style="margin-left:-4px"/></td></tr>
                
            </table>
        </form>    
            
                           
    </div>
    
    
	

</body>
</html>
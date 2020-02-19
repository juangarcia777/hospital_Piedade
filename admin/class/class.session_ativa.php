<?php
ob_start();		
	   @session_start();	
	   if(!isset($_SESSION['user_sisconnection_adm_hpiedade'])){
		   header("Location: index.php");								   
	   } else {
		   
		   $id_usuario_logado = $_SESSION['user_sisconnection_adm_hpiedade'];		  
		  		
		 
		   
		   $nome_usuario = 'Administrador';
		 
		   
		  
	   }
?>
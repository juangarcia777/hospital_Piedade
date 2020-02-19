<?php
ob_start();
@session_start();
if(isset($_SESSION['administrador_fulltop'])){
	
$id_adm_logado = $_SESSION['administrador_fulltop'];	

} else {

	header("Location: index.php"); //Direciona para a pagina de adm									
	
}

?>
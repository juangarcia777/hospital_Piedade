<?php
ob_start();
@session_start();
if(isset($_SESSION['user_log_hueb'])){
	

} else {

	header("Location: index.php"); //Direciona para a pagina de adm									
	
}
?>
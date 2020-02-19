<?php

$host = "localhost"; //host de acesso
$user = "hp_banco"; // nome do usuario do mysql
$pass = "a1b2c3d4"; // senha do usuario mysql
$bd = "hp_banco"; // nome do banco de dados






	$con = @mysql_connect($host,$user,$pass);
	
	if(!$con){
		echo "erro ao conectar";
	}
	
	$sel = @mysql_select_db($bd);
	
	if(!$sel){
		echo "erro ao selecionar base de dados";
	}


?>
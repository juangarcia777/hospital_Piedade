<?php

include("admin/includes/configuracoes.php");
include("admin/includes/conecta.php");

$select = mysql_query("SELECT * FROM foto");

while($row = mysql_fetch_array($select)){

	$a = 121;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	
	$a = 120;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 115;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 109;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 110;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 56;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 57;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 59;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 60;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 55;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 41;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 49;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
	$a = 28;
	if($row['Id'] == $a){
		$query = mysql_query("DELETE FROM foto WHERE Id='$a' LIMIT 1");
	}
	
}

?>
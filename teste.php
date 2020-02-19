<?php
//require ("class/class.db.php");
//require ("class/class.seguranca.php");


//$db = new DB();
$dt = '2017-01-01';
$sql = $db->select("SELECT * FROM bercario_antiga");
while($x = $db->expand($sql)){

	$pai = $x['nome_pai'];
	$mae = $x['nome_mae'];
	$crianca = $x['nome_crianca'];
	$nasc = $x['data_nasc'];
	$sexo = $x['sexo'];
	$id_antigo = $x['id'];
	
	$insere = $db->select("INSERT INTO bercario (nome_crianca, nome_pai, nome_mae, data_nasc, sexo) VALUES ('$crianca', '$pai', '$mae', '$nasc', '$sexo')");
	$nau = $db->select("SELECT id FROM bercario ORDER BY id DESC LIMIT 1");
	$k = $db->expand($nau);
	$id_novo = $k['id'];
	
	
	$pep = $db->select("SELECT foto FROM foto_bercario_antiga WHERE id_bercario='$id_antigo' LIMIT 1");
	if($db->rows($pep)){
		
		$ob = $db->expand($pep);
		$foto = $ob['foto'];
		
		$insere = $db->select("INSERT INTO foto_bercario (id_bercario, foto) VALUES ('$id_novo', '$foto')");
			
	}
	
	
}
?>
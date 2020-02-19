<?php
ob_start();
include("includes/configuracoes.php");
include("includes/conecta.php");

$pega2 = mysql_query("SELECT * FROM assinantesnewsletter ORDER BY Id DESC");

$fp = fopen("../arquivos/assinantes.txt", "a");

while($row2 = mysql_fetch_array($pega2)){
	
// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, $row2['Email'].chr(13).chr(10));

}

// Fecha o arquivo
fclose($fp);

$arquivo = '../arquivos/assinantes.txt';

  
// Definimos o novo nome do arquivo

$novoNome = 'assinantes.txt';

// Configuramos os headers que serão enviados para o browser

header('Content-Description: File Transfer');

header('Content-Disposition: attachment; filename="'.$novoNome.'"');

header('Content-Type: application/octet-stream');

header('Content-Transfer-Encoding: binary');

header('Content-Length: ' . filesize($arquivo));

header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

header('Pragma: public');

header('Expires: 0');

 

// Envia o arquivo para o cliente

readfile($arquivo);

	

?>
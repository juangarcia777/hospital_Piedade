<?php
$stringtolock = 'INNER JOIN|UNION ALL|SELECT *|HTTP:\\\\|\\|\\\\|<|>|EXEC|#';
	
	//Recebe as variaveis do POST - NÃO PERMITINDO AS STRING ACIMA
	foreach($_POST as $nome_campo => $valor){	

		$valor = mysql_real_escape_string($valor);
		
		$comando = "\$" . $nome_campo . '="' . $valor . '";';
		eval($comando);
	}
	
	
	//Recebe as variaveis do GET - PERMITINDO APENAS NUMEROS
	foreach($_GET as $nome_campo => $valor){
		
		if(!is_numeric($valor)) {
		/* Acesso inválido.  */
		header($endereco_site_net) or die();
		}	
		
		$valor = strip_tags($valor);
		$valor = mysql_real_escape_string($valor);
		$comando = "\$" . $nome_campo . "='" . $valor . "';";
		eval($comando);

	}
	
	
	function acha_mes($mes){
			switch ($mes) {
				case "01":    $mes = 'Jan';     break;
				case "02":    $mes = 'Fev';   break;
				case "03":    $mes = 'Mar';       break;
				case "04":    $mes = 'Abr';       break;
				case "05":    $mes = 'Mai';        break;
				case "06":    $mes = 'Jun';       break;
				case "07":    $mes = 'Jul';       break;
				case "08":    $mes = 'Ago';      break;
				case "09":    $mes = 'Set';    break;
				case "10":    $mes = 'Out';     break;
				case "11":    $mes = 'Nov';    break;
				case "12":    $mes = 'Dez';    break; 
			}
			
	}
	
	



	
	
	
	

	
	

function data_mysql_para_user($y)
{if ($y != ''){
$data_inverter = explode("-",$y);
$x = $data_inverter[2].'/'. $data_inverter[1].'/'. $data_inverter[0];
return $x;
}else{
return '';
}}


function data_user_para_mysql($y){
    $data_inverter = explode("/",$y);
    $x = $data_inverter[2].'-'. $data_inverter[1].'-'. $data_inverter[0];
    return $x;
}
	
?>
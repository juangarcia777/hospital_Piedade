<?php
$stringtolock = 'INNER JOIN|UNION ALL|SELECT *|HTTP:\\\\|\\|\\\\|<|>|EXEC|#';
	
	//Recebe as variaveis do POST - NÃO PERMITINDO AS STRING ACIMA
	foreach($_POST as $nome_campo => $valor){
		
	
	
			$comando = "\$" . $nome_campo . '="' . $valor . '";';
			eval($comando);
	

	}
	
	
	//Recebe as variaveis do GET - PERMITINDO APENAS NUMEROS
	foreach($_GET as $nome_campo => $valor){
		
		if(!is_numeric($valor)) {
		/* Acesso inválido.  */
			header('http://www.atitudecomunicacao.com.br') or die();
		}	
		
		
		$comando = "\$" . $nome_campo . "='" . $valor . "';";
		eval($comando);

	}
	
	
	function acha_mes($mes){
			switch ($mes) {
				case "01":    $mes = 'JAN';     break;
				case "02":    $mes = 'FEV';   break;
				case "03":    $mes = 'MAR';       break;
				case "04":    $mes = 'ABR';       break;
				case "05":    $mes = 'MAI';        break;
				case "06":    $mes = 'JUN';       break;
				case "07":    $mes = 'JUL';       break;
				case "08":    $mes = 'AGO';      break;
				case "09":    $mes = 'SET';    break;
				case "10":    $mes = 'OUT';     break;
				case "11":    $mes = 'NOV';    break;
				case "12":    $mes = 'DEZ';    break; 
			}
			
			echo $mes;
			
	}
	
	



	
	
	
	

	
	
function data_mysql_para_user($y)
{if ($y != ''){
$data_inverter = explode("-",$y);
$x = $data_inverter[2].'/'. $data_inverter[1].'/'. $data_inverter[0];
return $x;
}else{
return '';
}}
	
?>
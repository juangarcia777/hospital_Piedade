<?php
$db = new DB();
foreach($_POST as $nome_campo => $valor){
	$valor  = strip_tags($valor);
	$valor =$db->escape(addslashes($valor));		
	
	$comando = "$" . $nome_campo . '="' . $valor . '";';
	eval($comando);
}

foreach($_GET as $nome_campo => $valor){
	$valor =$db->escape(addslashes($valor));
		$valor = retorna_id_busca($valor);
				
		$comando = "\$" . $nome_campo . "='" . $valor . "';";
		eval($comando);
}

function retorna_id_busca($a){
	
	$x = explode('-', $a);
	$n_palavras=count($x);
	
	if(stripos($a,".html")){
		
		$v = explode('.html',$x[$n_palavras-1]);
	
		if(is_numeric($v[0])){
			return $v[0];	
		} else {
			return 0;	
		}
	
	} else {
		
		return $a;
		
	}
	
	
	
}


function limitarTexto($texto, $limite, $quebrar = true){
  //corta as tags do texto para evitar corte errado
  $contador = strlen(strip_tags($texto));
  if($contador <= $limite):
    //se o número do texto form menor ou igual o limite então retorna ele mesmo
    $newtext = $texto;
  else:
    if($quebrar == true): //se for maior e $quebrar for true
      //corta o texto no limite indicado e retira o ultimo espaço branco
      $newtext = trim(mb_substr($texto, 0, $limite))."...";
    else:
      //localiza ultimo espaço antes de $limite
      $ultimo_espaço = strrpos(mb_substr($texto, 0, $limite)," ");
      //corta o $texto até a posição lozalizada
      $newtext = trim(mb_substr($texto, 0, $ultimo_espaço))."...";
    endif;
  endif;
  return $newtext;
} 


function valores($valor){
	return number_format($valor,2,",",".")	;	
}


function normaliza($string,$id){

	
	$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr';
	$b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
	$string = strtr($string, $a, $b); //substitui letras acentuadas por "normais"
	$string = str_replace(" ","-",$string); // retira espaco
	$string = str_replace(",","",$string); // retira virgula
	$string = str_replace(".","",$string); // retira ponto
	$string = str_replace("%","",$string); // retira ponto
	$string = strtolower($string); // passa tudo para minusculo
	$string = str_replace("'","",$string); // retira ponto
	$string = str_replace('"',"",$string); // retira ponto
	$string = str_replace("$","",$string); // retira ponto
	$string = str_replace("?","",$string); // retira ponto
	$string = str_replace("=","",$string); // retira ponto
	$string = str_replace("/","",$string); // retira ponto
	$string = str_replace("\\","",$string); // retira ponto
	
		if($id!=''){
			$string = $string.'-'.$id.'.html';		
		} else {
			$string = $string.'.html';		
		}
	
	
	return $string; //finaliza, gerando uma saída para a funcao
	}
	
	
	
	function data_mysql_para_user($y){
	if ($y != ''){
		$data_inverter = explode("-",$y);
		$x = $data_inverter[2].'/'. $data_inverter[1].'/'. $data_inverter[0];
		return $x;
	}else{
		return '';
}
}


function data_user_para_mysql($y){
	if ($y != ''){
		$data_inverter = explode("/",$y);
		$x = $data_inverter[2].'-'. $data_inverter[1].'-'. $data_inverter[0];
		return $x;
	}else{
		return '';
}
}


function exibe_mes($mes){
	
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
			
			return $mes;
	
}
	
?>
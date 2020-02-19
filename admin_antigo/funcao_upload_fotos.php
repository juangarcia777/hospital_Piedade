<?php
$resposta = 0;
include("reduz_imagens.php");

if(isset($larg) && isset($alt)){

} else {
	$alt = 0;
	$larg = 0;
}

// Informações do arquivo enviado
		$nomeArquivo = $_FILES["imagem"]["name"];
		$tamanhoArquivo = $_FILES["imagem"]["size"];
		$nomeTemporario = $_FILES["imagem"]["tmp_name"];
		$nomeTipo = $_FILES["imagem"]["type"];
	
		$nm_new = md5(time()).'.jpg';
		
		//$nm_new = $nomeArquivo;
			
	if(!empty($nomeArquivo)){
		
		$imnfo = getimagesize($nomeTemporario);
		$img_w = $imnfo[0];	  // largura
		$img_h = $imnfo[1];	  // altura
		
		
		if($nomeTipo == 'image/jpeg' || $nomeTipo == 'image/pjpeg'){	
			
			$arq_new = $caminho.$nm_new;
			
			
					move_uploaded_file($nomeTemporario, ($arq_new));				
					$resposta = 1;
			
			
					} else {
			
			echo '<script>alert("Erro: Selecione uma imagem do tipo JPG");</script>';
			$resposta = 0;
				
		}
		
	} else {
		
		echo '<script>alert("Erro: Selecione um arquivo válido.");</script>';
		$resposta = 0;
		
	}

?>
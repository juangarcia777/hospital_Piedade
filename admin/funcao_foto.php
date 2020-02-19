<?php
ini_set('max_execution_time', 0);
$resposta = 0;
$imagem_final='';
//include("reduz_imagens.php");

include('m2brimagem.class.php');

// Informações do arquivo enviado
		
		$nomeArquivo = strtolower(uniqid().'_'.trim($_FILES["imagem"]["name"]));

		$tamanhoArquivo = $_FILES["imagem"]["size"];
		$nomeTemporario = $_FILES["imagem"]["tmp_name"];
		$nomeTipo = $_FILES["imagem"]["type"];
		
		$nm_new = $nomeArquivo;
			

if(!empty($nomeArquivo)){
		
	$caminho = "../imagens_aguarda/";
		
	if($nomeTipo == 'image/jpeg' || $nomeTipo == 'image/pjpeg' || $nomeTipo == 'image/png'){	
			
		$arq_new = $caminho.$nm_new;
		move_uploaded_file($nomeTemporario, ($arq_new));				
						
					
			$oImg = new m2brimagem();
			
			// define diretórios
			$diretorio = '../imagens_aguarda/';
			$dir_thumbs = '../imagens/';
			// varre diretório com as imagens originais
			$arquivos = scandir($diretorio);

			// lista arquivos do diretório
			// e pega somente os de extensão jpg ou jpeg
			foreach($arquivos as $arquivo) {
				
					// "carrega" arquivo
					$oImg->carrega($diretorio.$arquivo);
					$valida = $oImg->valida();
					if ($valida == 'OK') {
						// redimensiona
						
						$imagem = $diretorio.$arquivo;
						
						$imnfo = getimagesize($imagem);
						$img_w = $imnfo[0];	  // largura
						$img_h = $imnfo[1];	  // altura
						
						
						//FOTO DEITADA
						if($img_w>$img_h){
							
							$new_largura = 1024;
							$new_altura= (($img_h/$img_w)*$new_largura);
							
							
							if($img_w>1024 || $img_w==1024){					
								$oImg->redimensiona($new_largura,$new_altura);								
							}
							
						//FOTO EM PÉ	
						} else if($img_h>$img_w){
							
							$new_altura=768;
							$new_largura = (($img_w/$img_h)*$new_altura);
							
							if($img_h>768 || $img_h==768){					
								$oImg->redimensiona($new_largura,$new_altura);								
							} 
							
						//FOTO QUADRADA	
						} else if($img_h==$img_w){
							
							$new_altura=768;
							$new_largura = 768;
							
							if($img_w>768 || $img_w==768){					
								$oImg->redimensiona($new_largura,$new_altura);	
							}
							
							
						}
						
						
												

						// salva no diretório das miniaturas
						$oImg->grava($dir_thumbs.$arquivo,80);
						
						
						if(file_exists($dir_thumbs.$arquivo)){
							unlink($diretorio.$arquivo);	
						}
						
						
					}
				
			}
					
					
			
					$resposta = 1;
					$imagem_final=$arquivo;


			
			
					} else {
			
		
			$resposta = 0;
				
		}
		
	} else {
		
		
		$resposta = 0;
		
	}

?>
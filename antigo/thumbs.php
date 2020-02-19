<?php
include 'script_wideimage/WideImage.php';

$imagem = $_GET['img'];
$altura = $_GET['altura'];
$largura = $_GET['largura'];

// Carrega a imagem de um arquivo
$img = WideImage::load($imagem);


$imnfo = getimagesize($imagem);
	$img_w = $imnfo[0];	  // largura
	$img_h = $imnfo[1];	  // altura



if($img_w>$img_h || $img_w==$img_h){

	$img = $img->resize($largura, $altura);	
	
} else if($img_h>$img_w){
	
	$img = $img->resize($altura, $largura);	
	
	
}



if(isset($_GET['round'])){

$img = $img->roundCorners(12, $img->allocateColor(255, 255, 255), 2);

} else if(isset($_GET['roundx'])){

$img = $img->roundCorners(12, $img->allocateColor(241, 246, 250), 2);

}
//$img = $img->crop('0', '0', $largura, $altura);


// Define o tipo de cabeçalho para exibir a imagem corretamente
header("Content-type: image/jpeg");
$img->output('jpg', 100);
$img->destroy();
?>

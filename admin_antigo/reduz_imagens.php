<?php

// FUNÇÃO PARA REDIMENSIONAR IMAGEM
function reduz_imagem($img, $max_x, $max_y, $nome_foto) {

$get = getimagesize($img);


//pega o tamanho da imagem ($original_x, $original_y)
list($width, $height) = getimagesize($img);

$original_x = $width;
$original_y = $height;

// se a largura for maior que altura
if($original_x / $original_y > 1.33) {
   $porcentagem = (100 * $max_x) / $original_x;      
}
else {
   $porcentagem = (100 * $max_y) / $original_y;  
}

$tamanho_x = $original_x * ($porcentagem / 100);
$tamanho_y = $original_y * ($porcentagem / 100);

$image_p = imagecreatetruecolor($tamanho_x, $tamanho_y);



if($get["mime"] == "image/jpeg" || $get["mime"] == "'image/pjpeg'"){
	$image   = imagecreatefromjpeg($img);
} //end if

else if($get["mime"] == "image/gif"){
	$image   = imagecreatefromgif($img);
} //end if

else if($get["mime"] == "image/png"){
	$image   = imagecreatefrompng($img);
} //end if

else{
	echo "<script>alert('Insira uma foto nos formatos válidos')</script>";
	echo '<script>location.href="javascript:history.go(-1)"</script>';
	exit;
}

imagecopyresampled($image_p, $image, 0, 0, 0, 0, $tamanho_x, $tamanho_y, $width, $height);


return imagejpeg($image_p, $nome_foto, 80);

}

?>
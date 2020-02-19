<?php

$name_page = basename($_SERVER['PHP_SELF']);

$pag =  $_SERVER["REQUEST_URI"];

if($name_page=='contato.php'){	

	echo '<meta name="description" content="Associação Beneficiente Hospital Nossa Senhora da Piedade"/>';
	echo '<meta name="keywords" content="contato, trabalhe conosco, hospital, piedade, lençóis paulista, hospital lençóis paulista, hospital piedade" />';

}



else if($name_page=='projeto.php'){	

	echo '<meta name="description" content="Associação Beneficiente Hospital Nossa Senhora da Piedade"/>';
	echo '<meta name="keywords" content="projeto, projetos, empresa amiga, doacoes, trabalhe conosco, hospital, piedade, lençóis paulista, hospital lençóis paulista, hospital piedade" />';

}

else {

echo '<meta name="description" content="Associação Beneficiente Hospital Nossa Senhora da Piedade"/>';
        echo '<meta name="keywords" content="contato, trabalhe conosco, hospital, piedade, lençóis paulista, hospital lençóis paulista, hospital piedade" />';
}

?>

		

		<link rel="canonical" href="https://hpiedade.com.br/<?php echo $pag; ?>"/>


		<meta property="og:locale" content="pt_BR">
        <meta property="og:site_name" content="Associação Beneficiente Hospital Nossa Senhora da Piedade">
        <meta property="og:title" content="Associação Beneficiente Hospital Nossa Senhora da Piedade">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://hpiedade.com.br/">
        <meta property="og:image" content="https://hpiedade.com.br/interface/logo_face.jpg">
        <meta property="og:site_name" value="Hospital Piedade">
        <meta property="og:description" content="Associação Beneficiente Hospital Nossa Senhora da Piedade">
        <meta property="og:image:width" content="400"> 
        <meta property="og:image:height" content="400">
        <meta property="og:image:type" content="image/png">
        <meta name="robots" content="index,follow" />
        <meta name="author" content="SisConnection" />
        <meta property="og:type" content="website"> 

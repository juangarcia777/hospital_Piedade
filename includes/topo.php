<?php
require ("class/class.db.php");
require ("class/class.seguranca.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta charset="iso-8859-1">

<title>Hospital Piedade</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $root_doc; ?>favicon.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="google-site-verification" content="_oHmL0MmYVKTweHF1Vh4KrAokJrK0U4mq-wKtm_P7NE" />

<?php require("includes/seo.php"); ?>

<meta name="author" content="SisConnection" />
<meta name="google-site-verification" content="QeZQ1cMDkDYd2fwiO425ML0lurhHEAnXb37gNO0GNEA" />

<link rel="shortcut icon" href="<?php echo $root_doc; ?>/favicon.ico">
<link rel="stylesheet" href="<?php echo $root_doc; ?>css/style_final.css">
<link rel="stylesheet" href="<?php echo $root_doc; ?>css/sidebar.css">
<link rel="stylesheet" href="<?php echo $root_doc; ?>css/banner.css">
<link rel="stylesheet" href="<?php echo $root_doc; ?>css/mobile.css">
<link rel="stylesheet" href="<?php echo $root_doc; ?>fancybox/source/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $root_doc; ?>fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $root_doc; ?>fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700" rel="stylesheet">


<script src="<?php echo $root_doc; ?>jquery/jquery.js"></script>
<script src="<?php echo $root_doc; ?>jquery/cycle.js"></script>

<script src="<?php echo $root_doc; ?>jquery/banner_tile.js"></script>
<script src="<?php echo $root_doc; ?>javascript/funcoes.js"></script>

<script src="<?php echo $root_doc; ?>jquery/slidebar.js"></script>


</head>

<body>


<style type="text/css">
 
#mask{width:100%; height:100%; background-color:#000; position:absolute; display:none; z-index:999;}
#form{width:600px; max-width: 90%; height:430px; position:fixed; left:50%; top:50%; margin-top:-200px; margin-left:-300px; background-color:#FFF; display:none; border-radius:8px; z-index:999999999999;}    

@media only screen
and (max-width : 1100px){
#form{width:90%; height:430px; position:fixed; left:5%; top:80px; margin-top:inherit; margin-left:inherit; background-color:#FFF; display:none; border-radius:8px; z-index:999999999999;}    

}

</style>

<div id="mask"></div>
<div id="form">
   
   <iframe id="mikol" style="width: 90%; margin-left: 5%; margin-top: 20px; height:360px" src="https://www.youtube.com/embed/hnIxJPfajN0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> 
   <br><br>
   <center>
    <a href="javascript:void(0)" onclick="javascript:fecha_modal();" style="font-size: 14px">FECHAR</a>
   </center>
</div>


    <?php include("includes/menu_mobile.php"); ?>

<div canvas="container">





	<header>
 		
        <div class="content">
        	
            <div class="logo"><a href="<?php echo $root_doc; ?>"><img src="<?php echo $root_doc; ?>interface/logo.png"></a></div>
            
            <div class="coisas_topo">
            	<div class="circ"><i class="fa fa-envelope"></i></div>
                <div class="tx">+55 (14) 3269-1033<br>contato@hpiedade.com.br</div>
            </div>

            
                <div class="btn_menu_mobile">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </div>     
            
            
            <?php include("includes/menu.php"); ?>

            
                        
        </div>
        
	</header>




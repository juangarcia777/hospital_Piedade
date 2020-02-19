<?php include("includes/topo.php"); ?>

<?php
$db = new DB();
if(isset($id_busca)){
$sel = $db->select("SELECT * FROM servicos WHERE id='$id_busca' LIMIT 1");
$ln = $db->expand($sel);
} else {
$sel = $db->select("SELECT * FROM servicos WHERE id='1' LIMIT 1");
$ln = $db->expand($sel);	
}
?>

<div class="content_meio">
    	
    <div class="tp_interna">
    	ESTRUTURA
    </div>	   
    
    

	
    <div class="titulos2">ESTRUTURA</div>
    <div class="ajusta_line2"><div class="line2"></div></div>

    
    <div class="sa2"><img src="<?php $root_doc; ?>images/estrutura1.JPG" class="foto_peq"></div>
    
    <div class="sa2"><img src="<?php $root_doc; ?>images/estrutura2.JPG" class="foto_peq"></div>
    
    <div class="sa2"><img src="<?php $root_doc; ?>images/estrutura3.jpg" class="foto_peq"></div>
    
    <div class="sa2"><img src="<?php $root_doc; ?>images/estrutura4.JPG" class="foto_peq"></div>
    
    <div class="sa2"><img src="<?php $root_doc; ?>images/estrutura5.JPG" class="foto_peq"></div>
    
    <div class="sa2"><img src="<?php $root_doc; ?>images/estrutura7.JPG" class="foto_peq"></div>
    
    <div class="sa2"><img src="<?php $root_doc; ?>images/estrutura8.jpeg" class="foto_peq"></div>
    
    <div class="sa2"><img src="<?php $root_doc; ?>images/estrutura9.jpeg" class="foto_peq"></div>

    <div class="sa2"><img src="<?php $root_doc; ?>images/estrutura10.jpg" class="foto_peq"></div>

    <div class="sa2"><img src="<?php $root_doc; ?>images/estrutura11.jpg" class="foto_peq"></div>
    
    
    <br /><br /><br />	




    
    
    </div>

<?php include("includes/rodape.php"); ?>
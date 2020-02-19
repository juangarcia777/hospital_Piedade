<?php include("includes/topo.php"); ?>

<?php
$db = new DB();
$sel = $db->select("SELECT * FROM subservicos WHERE id='$id_busca' LIMIT 1");
$ln = $db->expand($sel);
?>

<div class="content_meio">
    	
    <div class="tp_interna">
    	SERVIÇOS E PROCEDIMENTOS REALIZADOS PELO HNSP
    </div>	   
    
    <div class="titulos2"><?php echo $ln['titulo']; ?></div>
    <div class="ajusta_line2"><div class="line2"></div></div>

	<span class="historia">
    	<?php echo nl2br($ln['texto']); ?>
    </span>

	<?php
		if(!empty($ln['img1'])){echo '<div class="sa2"><img src="'.$root_doc.'images/'.$ln['img1'].'" class="foto_peq"></div>';}
	?>
    
    <?php
		if(!empty($ln['img2'])){echo '<div class="sa2"><img src="'.$root_doc.'images/'.$ln['img2'].'" class="foto_peq"></div>';}
	?>
    
    <?php
		if(!empty($ln['img3'])){echo '<div class="sa2"><img src="'.$root_doc.'images/'.$ln['img3'].'" class="foto_peq"></div>';}
	?>
    
    <?php
		if(!empty($ln['img4'])){echo '<div class="sa2"><img src="'.$root_doc.'images/'.$ln['img4'].'" class="foto_peq"></div>';}
	?>

</div>
        
    
    
    

<?php include("includes/rodape.php"); ?>
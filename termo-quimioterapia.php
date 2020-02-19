<?php include("includes/topo.php"); ?>

<div class="content_meio">
    	
    <div class="tp_interna">
    	TERMO DE FOMENTO 15 (QUIMIOTERAPIA)
    </div>	 
    
    <?php
			$sql = $db->select("SELECT * FROM a_documentos_fomento_quimio_15 GROUP BY tipo ORDER BY id");
			while($ln=$db->expand($sql)){
				$tipo = $ln['tipo'];
		?>
        
        	<div class="titulos22km"><?php echo $ln['tipo']; ?></div>
    		<div class="ajusta_line22km"><div class="line22km"></div></div>
                
			<?php
                $sql2 = $db->select("SELECT * FROM a_documentos_fomento_quimio_15 WHERE tipo='$tipo' ORDER BY ordem DESC");
                while($ln2=$db->expand($sql2)){  
            ?>
           
                  
                  <div class="arqx22">

                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            <br />
                            <span><?php echo $ln2['titulo']; ?></span><br />
                            <?php if(!empty($ln2['ano'])){ ?>
                            	Ano: <?php echo $ln2['ano']; ?><br />
                            <?php } ?>
                            <a target="_blank" href="<?php echo $root_doc; ?>arquivos/<?php echo $ln2['arquivo']; ?>">Visualizar arquivo</a>
                           
                  </div>
                  
                
        
		   <?php
                }
           ?> 
           
          
           
       <?php
			}
	   ?>   
    
</div>
    

<?php include("includes/rodape.php"); ?>
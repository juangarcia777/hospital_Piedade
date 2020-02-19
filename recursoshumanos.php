<?php include("includes/topo.php"); ?>

<div class="content_meio">
    	
    <div class="tp_interna">
    	RECURSOS HUMANOS
    </div>	 
    
    <?php
			$sql = $db->select("SELECT * FROM a_documentos_fomento_quimio_7 GROUP BY tipo ORDER BY id");
			while($ln=$db->expand($sql)){
				$tipo = $ln['tipo'];
		?>
        
        	<div class="titulos22km">RECURSOS HUMANOS</div>
    		<div class="ajusta_line22km"><div class="line22km"></div></div>
                        
                  <div class="arqx22">

                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            <br />
                            <span>Cargos e Salarios - 2019</span><br />
                               <br> Ano: 2019<br><br>
                            <a target="_blank" href="<?php echo $root_doc; ?>arquivos/recursoshumanos/cargossalarios2019.pdf?>">Visualizar arquivo</a>
                           
                  </div>
                  
                
        
		   
           
       <?php
			}
	   ?>    
    
</div>
    

<?php include("includes/rodape.php"); ?>
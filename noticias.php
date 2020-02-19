<?php include("includes/topo.php"); ?>

<?php
					$db = new DB();
					
					if(isset($id_busca)){
						$pesquisa = $db->select("SELECT * FROM noticia WHERE Id='$id_busca' LIMIT 1");	
						$row = $db->expand($pesquisa);
						$titulo = $row['Titulo'];
					} else {
						$pesquisa = $db->select("SELECT * FROM noticia ORDER BY Id DESC LIMIT 30");	
						$titulo = 'Últimas Notícias';
							
						
					}
					
					
						
			?>  


<div class="content_meio">
    	
    <div class="tp_interna">
    	NOTÍCIAS HNSP
    </div>	   
    
    <div class="titulos2"><?php echo $titulo; ?></div>
    <div class="ajusta_line2"><div class="line2"></div></div>

	<?php
		if(isset($id_busca)){
			
			echo '<span class="historia">';
			if(!empty($row['Url'])){
				echo $foto = '<img src="'.$root_doc.'images/'.$row['Url'].'" class="img_nn" align="left">';			
				} else {
				$foto = '';
			}
			echo nl2br($row['Corpo']).'</span>';
			
			
			echo '
			<div class="titulos2">VEJA TAMBÉM</div>
    		<div class="ajusta_line2"><div class="line2"></div></div>
			';
			
			$pesquisa = $db->select("SELECT * FROM noticia ORDER BY Id DESC LIMIT 9");	
			$i=1;
			while($row = $db->expand($pesquisa)){
				
				if($i==4){$i=1;};
								
								if(!empty($row['Url'])){
									$foto = $row['Url'];
									
									$ft = 'images/'.$foto;
									if(!file_exists($ft)){
										$foto = 'vazio.jpg';
									}
								} else {
									$foto = 'vazio.jpg';
								}
								
								
								
								if($i==1){
									echo '<div class="noti1">';	
								} else {
									echo '<div class="noti2">';
								}
								
									echo '<a href="'.$root_doc.'noticias/'.normaliza($row['Titulo'],$row['Id']).'"><div class="foto_noti" style="background-image:url('.$root_doc.'images/'.$foto.');"></div></a>';
									echo '<div class="titulo_noti">'.$row['Titulo'].'</div>';
									echo '<div class="texto_noti">'.substr($row['Corpo'],0,200).'...</div>';
									echo '<a href="'.$root_doc.'noticias/'.normaliza($row['Titulo'],$row['Id']).'"><div class="noti_mais">LEIA MAIS</div></a>';
									
								echo '</div>';
								$i++; 
			}
			
		
			
			
		} else {
			$i=1;
			while($row = $db->expand($pesquisa)){
				
				if($i==4){$i=1;};
								
								if(!empty($row['Url'])){
									$foto = $row['Url'];
									
									$ft = 'images/'.$foto;
									if(!file_exists($ft)){
										$foto = 'vazio.jpg';
									}
								} else {
									$foto = 'vazio.jpg';
								}
								
								
								
								if($i==1){
									echo '<div class="noti1">';	
								} else {
									echo '<div class="noti2">';
								}
								
									echo '<a href="'.$root_doc.'noticias/'.normaliza($row['Titulo'],$row['Id']).'"><div class="foto_noti" style="background-image:url('.$root_doc.'images/'.$foto.');"></div></a>';
									echo '<div class="titulo_noti">'.$row['Titulo'].'</div>';
									echo '<div class="texto_noti">'.substr($row['Corpo'],0,200).'...</div>';
									echo '<a href="'.$root_doc.'noticias/'.normaliza($row['Titulo'],$row['Id']).'"><div class="noti_mais">LEIA MAIS</div></a>';
									
								echo '</div>';
								$i++; 
			}
			
		}
	?>

	
   


</div>
        
    
    
    

<?php include("includes/rodape.php"); ?>
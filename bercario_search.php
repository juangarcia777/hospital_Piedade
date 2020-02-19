<?php include("includes/topo.php"); ?>
<link rel="stylesheet" type="text/css" href="css/aux_bercario_search.css" />

<div class="content_meio">
    	
    <div class="tp_interna">
    	CONHEÇA NOSSOS RECÉM NASCIDOS
    </div>	   
    
    <div class="titulos2">BERÇÁRIO</div>

    <div class="ajusta_line2"><div class="line2"></div></div>


	<div class="conteudo">
	<?php

		if (!empty($_GET['id'])) {
			$id= $_GET['id'];
		}
	
		$db = new DB();

		$pullComents= $db->select("SELECT * FROM comentarios WHERE id_crianca = '$id'");

		
		$pesquisa = $db->select("SELECT * FROM bercario WHERE id= '$id' ");	

		$row= $db->expand($pesquisa);

				
				 echo '</div><div class="sa3">';
								
								$pe = $db->select("SELECT * FROM foto_bercario WHERE id_bercario='$id' LIMIT 1");	
								
								
								if($db->rows($pe)){
									
									
									$sho = $db->expand($pe);
									$foto = $sho['foto'];
									
									$ft = 'imagens/'.$foto;
									
									if(!file_exists($ft)){
										$foto = 'vazio.jpg';
									}
									
								} else {
									$foto = 'vazio.jpg';
								}
								
								
								if($row['sexo']=='M'){
									$sty = '#3B61B9;';
									$css = 'botaoMenino';

								} else {
									$sty = '#FF84FF;';
									$css = 'botaoMenina';	

								}
								
								
								if($i==1){
									echo '<div class="berc1">';	
								} else {
									echo '<div class="berc2">';
								}
								
								
								
								echo '<div class="foto_berc" style="background-image:url('.$root_doc.'imagens/'.$foto.'); background-size:contain; border:2px solid '.$sty.';width: 50%"></div>';
									
									
									?>
									<?php

									if(!empty($row['nome_pai'])){
									
									
									?> 
									<div class="pai_noti" style="background-color: #f4f4f4">
										<label>BEBÊ</label>
											<strong style="color:<?php echo $sty; ?>"><?php echo $row['nome_crianca']; ?></strong>
											<label><p>MÃE</p></label>
											<strong><?php echo $row['nome_mae'];?></strong>
											<label><p>PAI</p></label>
											<strong><?php echo $row['nome_pai'];?></strong>
											<label><p>NASCIMENTO</p></label>
											 <strong><?php echo data_mysql_para_user($row['data_nasc']); ?></strong>
									
									<?php	if(!empty($row['hora'])){
											' as '.$row['hora'] ;
									}	
									
									?>
									
									<a href="">DEIXAR MENSAGEM</a>

    								</div>

									<?php
									} else { ?>
										
										<div class="pai_noti" style="background-color: #f4f4f4"> 
											<label>BEBÊ</label>
											<strong style="color:<?php echo $sty; ?>"><?php echo $row['nome_crianca']; ?></strong>
											<label>MÃE</label>
											<strong><?php echo $row['nome_mae'];?></strong>
											<label>NASCIMENTO</label>
											 <strong><?php echo data_mysql_para_user($row['data_nasc']); ?></strong>
										
										<?php if(!empty($row['hora'])){
											echo ' as '.$row['hora'];
										} 
										
										?>
 ?>
									<a href="">DEIXAR MENSAGEM</a>

									</div>';	

								<?php } ?>
									
						
</div>
</div>
</div>
</div>



        
 <br/><br/>   
    
    


 

  <!-- K;6%domp1NwC -->
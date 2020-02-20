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
								
								
								if($row['sexo']=='m'){
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
									
									<a id="msg" >DEIXAR MENSAGEM</a>  <a id="imprimir" style="background-color: yellowgreen" onClick="window.print()">IMPRIMIR</a>


    								</div>

									<?php
									} else { ?>
										
										<div class="pai_noti" id="semPai" style="background-color: #f4f4f4"> 
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
 
									<a id="msg" >DEIXAR MENSAGEM</a>  <a id="imprimir" style="background-color: yellowgreen" onClick="window.print()">IMPRIMIR</a>

									</div>';	

								<?php } ?>
									
						
</div>
</div>
</div>

		<?php 

		if(!empty($_POST['nome'])) {
			$data= date('d/m/y');
			$nome= $_POST['nome'];
			$msg= $_POST['mensagem'];

			$insert = $db->select("INSERT INTO recados (id_bercario,mensagem,ativo,nome,data) VALUES ('$id','$msg','1','$nome','$data')");
		}

		 ?>

		<div class="mensagem">
		<form method="POST" style="background-color:<?php echo $sty; ?>">
			<label>Nome</label><br>
			<input type="text" name="nome" required/><br><br>
			<label>Mensagem</label><br>
			<textarea type="text" name="mensagem"></textarea><br><br>
			<input type="submit" value="Enviar"/>			
		</form>
	</div><br><br>

	<br>

	<?php
		$sel = $db->select("SELECT * FROM recados WHERE id_bercario= '$id' ORDER BY id DESC LIMIT 20");
		if($db->rows($sel)){
			while($yy = $db->expand($sel)){
								
				?>
	<div class="recados">
		<div class="col">
			<strong><?php echo $yy['nome'] ?></strong>
			<p><?php echo $yy['mensagem'] ?></p><br>

			<strong><?php echo $yy['data'] ?></strong>

		</div>
	</div>

	<?php }} ?>

</div>


        
 <br/><br/>   
    
<?php include("includes/rodape.php"); ?>
    

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
 
 <script type="text/javascript">
 	$('#msg').on('click', function(){

		var msg  = $('.mensagem').is(':visible');

 		if (msg){
 			$('.mensagem').css("display","none");
 		
 		} else { 
 			$('.mensagem').css("display","block");
 		}
 	});
 </script>
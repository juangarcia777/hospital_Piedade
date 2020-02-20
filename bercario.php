<?php include("includes/topo.php"); ?>

<style>
ul.bok{display:inline-block; list-style:none}
ul.bok li{width:20px; height:34px; border:1px solid #efefef; line-height:34px; color:#333}
ul.bok li.active{background-color:#3B61B9; color:#FFF}
ul.bok li.active a{color:#FFF}
</style>

<div class="content_meio">
    	
    <div class="tp_interna">
    	CONHEÇA NOSSOS RECÉM NASCIDOS
    </div>	   
    
    <div class="titulos2">BERÇÁRIO</div>

    <div class="ajusta_line2"><div class="line2"></div></div><br><br>

	
		<div class="input" id="pesquisa">
			<div class="input-group">
				<form method="POST" action="busca_rn.php">
					<button type="submit" id="basic-addon3" style="font-size:15px">BUSCAR</button>
					<input type="text" class="form-control" placeholder="Pesquise nome da Mãe ou Bebê..." name="texto" id="basic-url" aria-describedby="basic-addon3">
				</form>
			

			</div>
		</div>
	



	<div class="sa3">
	<?php
	
		$db = new DB();

		
		$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
		$registros = 21;		
		$contagem = $db->select("SELECT id FROM bercario");
		$total = $db->rows($contagem);
		$numPaginas = ceil($total/$registros);
		$inicio = ($registros*$pagina)-$registros;
		$x=0;
		
		$pesquisa = $db->select("SELECT * FROM bercario ORDER BY data_nasc DESC LIMIT $inicio,$registros");	
		$i=1;
			while($row = $db->expand($pesquisa)){
				
				
				if($i==4){$i=1; echo '</div><div class="sa3">';}
								
								$iv = $row['id'];
								$pe = $db->select("SELECT * FROM foto_bercario WHERE id_bercario='$iv' ORDER BY RAND() LIMIT 1");	
								
								
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
									echo '<div class="berc1" >';	
								} else {
									echo '<div class="berc2" >';
								}
								
								
								
									echo '<div class="foto_berc" style="background-image:url('.$root_doc.'imagens/'.$foto.'); background-size:contain; border:2px solid '.$sty.'"></div>';
									
									if(!empty($row['nome_pai'])){
									
									
									echo '<div class="pai_noti">Olá meu nome é <strong style="color:'.$sty.'">'.$row['nome_crianca'].'</strong>. Meus pais são <strong>'.$row['nome_mae'].'</strong> e <strong>'.$row['nome_pai'].'</strong>, nasci no dia '.data_mysql_para_user($row['data_nasc']); 
									
										if(!empty($row['hora'])){
											echo ' as '.$row['hora'];
										} 
										
										
										echo ', pesando '.$row['peso'].'.</div>';


										echo "<div><a href='bercario_search.php?id=".$row['id']."' id=".$css.">Deixe sua Mensagem</a></div>";
									
									
									
									
									} else {
										
										echo '<div class="pai_noti">Olá meu nome é <strong style="color:'.$sty.'">'.$row['nome_crianca'].'</strong>. Minha mãe é <strong>'.$row['nome_mae'].'</strong>, nasci no dia '.data_mysql_para_user($row['data_nasc']);
										
										if(!empty($row['hora'])){
											echo ' as '.$row['hora'];
										} 
										
										
										echo ', pesando '.$row['peso'].'.</div>';

										echo "<div><a href='bercario_search.php?id=".$row['id']."' id=".$css.">Deixe sua Mensagem</a></div>";

									}
									
								echo '</div>';
								$i++; 
			}
								
						
	?>  
    </div>


</div>
        
        
        
<center>
<?php
	  
			echo '<ul class="bok">';
			for($i = 1; $i < $numPaginas + 1; $i++) {
				
				if($pagina==$i){
					echo '<a href="bercario.php?pagina='.$i.'"><li class="active">'.$i.'</li></a>';
				} else {
					echo '<a href="bercario.php?pagina='.$i.'"><li class="item">'.$i.'</li></a>';	
				}
				
        		
    		}	
			echo '
				</ul>';
		
?> 
</center>
 <br /><br />   
    
    

<?php include("includes/rodape.php"); ?>

 <script>
 	window.onload = function(){setInterval("trocaCor()", 2000);}
   
    function trocaCor()
    {
      var pisca = document.getElementById("basic-addon3");
      if(pisca.style.backgroundColor == "cornflowerblue")
      {
       pisca.style.backgroundColor = "#ea74b2";
      }    
      else
      {
       pisca.style.backgroundColor = "cornflowerblue";
      }
    }


  </script>

  <!-- K;6%domp1NwC -->
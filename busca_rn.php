<?php include("includes/topo.php"); ?>

<style>
ul.bok{display:inline-block; list-style:none}
ul.bok li{width:20px; height:34px; border:1px solid #efefef; line-height:34px; color:#333}
ul.bok li.active{background-color:#3B61B9; color:#FFF}
ul.bok li.active a{color:#FFF}
</style>

<div class="content_meio">
    	
    <div class="tp_interna">
    	CONHE�A NOSSOS REC�M NASCIDOS
    </div>	   
    
    <div class="titulos2">BER��RIO</div>


	
		<div class="input">
			<div class="input-group">
				
			<a href="bercario.php" style="color:#FFF;font-size:15px;background-color:#FF0000; padding: 10px">Voltar</a>

			</div>
		</div>
	


    <div class="ajusta_line2"><div class="line2"></div></div>

	<div class="sa3">
	<?php
	
		$db = new DB();

		if(!empty($_POST['texto'])) {

			$busca= $_POST['texto'];
		}


		
		$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
		$registros = 21;		
		$contagem = $db->select("SELECT id FROM bercario WHERE nome_crianca LIKE '%$busca%' OR nome_mae LIKE '%$busca%'");
		$total = $db->rows($contagem);
		$numPaginas = ceil($total/$registros);
		$inicio = ($registros*$pagina)-$registros;
		$x=0;
		
		$pesquisa = $db->select("SELECT * FROM bercario WHERE nome_crianca LIKE '%$busca%' OR nome_mae LIKE '%$busca%' ORDER BY data_nasc DESC LIMIT $inicio,$registros");	
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
								
								
								if($row['sexo']=='M'){
									$sty = '#3B61B9;';	
								} else {
									$sty = '#FF84FF;';	
								}
								
								
								if($i==1){
									echo '<div class="berc1" >';	
								} else {
									echo '<div class="berc2" >';
								}
								
								
								
									echo '<div class="foto_berc" style="background-image:url('.$root_doc.'imagens/'.$foto.'); background-size:contain; border:2px solid '.$sty.'"></div>';
									
									if(!empty($row['nome_pai'])){
									
									
									echo '<div class="pai_noti">Ol� meu nome � <strong style="color:'.$sty.'">'.$row['nome_crianca'].'</strong>. Meus pais s�o <strong>'.$row['nome_mae'].'</strong> e <strong>'.$row['nome_pai'].'</strong>, nasci no dia '.data_mysql_para_user($row['data_nasc']); 
									
										if(!empty($row['hora'])){
											echo ' as '.$row['hora'];
										} 
										
										
										echo ', pesando '.$row['peso'].'.</div>';
									
									
									
									
									} else {
										
										echo '<div class="pai_noti">Ol� meu nome � <strong style="color:'.$sty.'">'.$row['nome_crianca'].'</strong>. Minha m�e � <strong>'.$row['nome_mae'].'</strong>, nasci no dia '.data_mysql_para_user($row['data_nasc']);
										
										if(!empty($row['hora'])){
											echo ' as '.$row['hora'];
										} 
										
										
										echo ', pesando '.$row['peso'].'.</div>';
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

<!--

    $(function(){

    $('#basic-url').on('keyup', function(){
      var texto= $(this).val();

      $.ajax({
        url:'busca.php',
        type:'POST',
        dataType: 'json',
        data: {texto:texto},
        success:function(json) {
          var html= '';
          console.log(json);
          for(var i in json) {
            html+= '<li><a href="bebe.php?id='+json[i].id+'">'+json[i].nome+'</a></li>';
          }
          $('#resultado').html(html);
        }
      });


    });

});
-->
  </script>

  <!-- K;6%domp1NwC -->
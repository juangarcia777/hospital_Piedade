<?php include("includes/topo.php"); ?>


<div class="content_meio">
    	
    <div class="tp_interna">
    	CONFIRA NOSSOS PARCEIROS
    </div>	   
    
    <div class="titulos2">PROJETO EMPRESA AMIGA</div>
    <div class="ajusta_line2"><div class="line2"></div></div>
    
    <span class="historia">
    O Projeto Empresa amiga do Hospital Piedade promove uma parceria entre o Hospital e as empresas da nossa cidade. Este projeto tem como objetivo viabilizar melhorias no Hospital, tanto em sua estrutura como nos atendimentos gratuitos prestados a toda a popula��o de Len��is Paulista e regi�o.
<br /><br />
<b>Quem ganha com o Projeto?</b>       <br /><br />
- Ganha o Hospital, que com a ajuda das doa��es feitas pelas empresas pode investir em melhorias para a popula��o;<br />
- Ganham os pacientes que s�o beneficiados por todas as melhorias feitas com as doa��es; <br />
- Ganha a comunidade que pode contar com um Hospital bem estruturado;<br />
- Ganham as Empresas Amigas, que atrav�s desta parceria t�m sua marca divulgada atrav�s de nossas a��es de marketing social, tornando-a socialmente respons�vel.<br />
</span>
    
    
    
    
    
    <div style="margin-top:50px" class="titulos2">CONHE�A NOSSO PARCEIROS</div>
    <div class="ajusta_line2"><div class="line2"></div></div>

<?php
	
		$db = new DB();
		$pesquisa = $db->select("SELECT * FROM parceiros ORDER BY ordem ASC, id DESC");	
		$i=1;
			while($row = $db->expand($pesquisa)){
				
				if($i==5){$i=1;};
								
								if(!empty($row['foto'])){
									$foto = $row['foto'];
									
									$ft = 'images/'.$foto;
									if(!file_exists($ft)){
										$foto = 'vazio.jpg';
									}
								} else {
									$foto = 'vazio.jpg';
								}
								
								
								if($i==1){
									echo '<div class="parc1" >';	
								} else {
									echo '<div class="parc2" >';
								}
								
								
								
									echo '<div class="foto_parc" style="background-image:url('.$root_doc.'images/'.$foto.'); "></div>';
									//echo '<div class="titulo_noti">'.$row['nome'].'</div>';

									
								echo '</div>';
								$i++; 
			}
								
						
	?> 
    

	


</div>
        
    
    
    

<?php include("includes/rodape.php"); ?>
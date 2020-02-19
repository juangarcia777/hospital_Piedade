<div off-canvas="slidebar-1 left reveal">


	<div class="men_lateral">		 
    
   
        <a href="<?php echo $root_doc; ?>">
        	<div class="menu_lateral"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;Página Inicial</div>
        </a>


       		
        	<div class="menu_lateral" style="color: #FFF" onclick="javascript:menxx(1);">
        		<i class="fa fa-hospital-o fa-fw" aria-hidden="true"></i>&nbsp;O Hospital

        		<div class="mik"><i class="fa fa-angle-down" aria-hidden="true"></i></div> 

        		<div class="sub-mobile" id="sub-mobile1">
		        	<a href="<?php echo $root_doc; ?>diretoria"><div class="subx">Diretoria</div></a>
		            <a href="<?php echo $root_doc; ?>estrutura-hospital"><div class="subx">Estrutura</div></a>
		        	<a href="<?php echo $root_doc; ?>hospital"><div class="subx">História</div></a>
		            <a href="<?php echo $root_doc; ?>missao-visao-valores"><div class="subx">Missão, Visão e Valores</div></a>	

        		</div>	
        	</div>


        	<div class="menu_lateral" style="color: #FFF" onclick="javascript:menxx(6);">
        		<i class="fa fa-file-text fa-fw" aria-hidden="true"></i>&nbsp;Transparência

        		<div class="mik"><i class="fa fa-angle-down" aria-hidden="true"></i></div> 

        		<div class="sub-mobile" id="sub-mobile6">
        			        			
        			<a href="<?php echo $root_doc; ?>documentos-probatorios"><div class="subx">Documentos Probatórios</div></a>	
	                <a href="<?php echo $root_doc; ?>fomento-2018"><div class="subx">TERMO DE FOMENTO 2018</div></a>	
	                <a href="<?php echo $root_doc; ?>fomento-2019"><div class="subx">TERMO DE FOMENTO 2019</div></a>
                    <a href="<?php echo $root_doc; ?>recursos-humanos"><div class="subx">RECURSOS HUMANOS</div></a>	

        		</div>	
        	</div>



        	<div class="menu_lateral" style="color: #FFF" onclick="javascript:menxx(2);">
        		<i class="fa fa-rss fa-fw" aria-hidden="true"></i>&nbsp;Serviços

        		<div class="mik"><i class="fa fa-angle-down" aria-hidden="true"></i></div> 

        		<div class="sub-mobile" id="sub-mobile2">
        			        			
        			<?php
						$db = new DB();
						$sql = $db->select("SELECT * FROM servicos ORDER BY titulo");
						while($row = $db->expand($sql)){
							
							$id_serv = $row['id'];
							
							echo '<a href="'.$root_doc.'servicos/'.normaliza($row['titulo'],$row['id']).'"><div class="subx">'.$row['titulo'].'</div></a>';

							
							
						}
						        			
					?>

        		</div>	
        	</div>
        
                        
        
        	<div class="menu_lateral" style="color: #FFF" onclick="javascript:menxx(3);">
        		<i class="fa fa-female fa-fw" aria-hidden="true"></i>&nbsp;Maternidade

        		<div class="mik"><i class="fa fa-angle-down" aria-hidden="true"></i></div> 

        		<div class="sub-mobile" id="sub-mobile3">
        			        			
        			<a href="<?php echo $root_doc; ?>bercario"><div class="subx">Berçario Virtual</div></a>
		        	<a href="<?php echo $root_doc; ?>estrutura"><div class="subx">Estrutura</div></a>
		            <a href="<?php echo $root_doc; ?>horarios"><div class="subx">Horário de Visitas</div></a>

        		</div>	
        	</div>




        	<div class="menu_lateral" style="color: #FFF" onclick="javascript:menxx(4);">
        		<i class="fa fa-check-square-o fa-fw" aria-hidden="true"></i>&nbsp;Corpo Clinico

        		<div class="mik"><i class="fa fa-angle-down" aria-hidden="true"></i></div> 

        		<div class="sub-mobile" id="sub-mobile4">
        			
        			<a href="<?php echo $root_doc; ?>especialidades"><div class="subx">Especialidades</div></a>
		        	

        		</div>	
        	</div>
        	

        	

        	<div class="menu_lateral" style="color: #FFF" onclick="javascript:menxx(5);">
        		<i class="fa fa-folder-open-o fa-fw" aria-hidden="true"></i>&nbsp;Projetos

        		<div class="mik"><i class="fa fa-angle-down" aria-hidden="true"></i></div> 

        		<div class="sub-mobile" id="sub-mobile5">
        			
        			<a href="<?php echo $root_doc; ?>projeto"><div class="subx">Projeto Empresa Amiga</div></a>
		        	

        		</div>	
        	</div>


        
        <a href="<?php echo $root_doc; ?>doacoes">
        	<div class="menu_lateral"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i>&nbsp;Doações</div>
        </a>

        <a href="<?php echo $root_doc; ?>ouvidoria">
        	<div class="menu_lateral"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Ouvidoria</div>
        </a>

        <a href="<?php echo $root_doc; ?>contato">
        	<div class="menu_lateral"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i>&nbsp;Contato</div>
        </a>
        
     
	</div>


</div>


<script type="text/javascript">

function menxx(id){
	$("#sub-mobile"+id).toggle();
}	

</script>
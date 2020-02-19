<?php include("includes/topo.php"); ?>

<div class="alert alert-success" id="sucesso_user" style="display:none">
  <strong>Sucesso!</strong> Informações salvas/alteradas com sucesso.
</div>   


<?php

$x=0;
$db = new DB();    
		

//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==1){
	
		$nomeArquivo = trim($_FILES["imagem"]["name"]);
		$tamanhoArquivo = $_FILES["imagem"]["size"];
		$nomeTemporario = $_FILES["imagem"]["tmp_name"];
		$nomeTipo = $_FILES["imagem"]["type"];



	

		$sel = $db->select("INSERT INTO bercario (nome_crianca, nome_pai, nome_mae, data_nasc, sexo, hora, peso) VALUES ('$nome_crianca', '$nome_pai', '$nome_mae', '$data_nasc', '$sexo', '$hora', '$peso')");
		
		$kob = $db->select("SELECT id FROM bercario ORDER BY id DESC LIMIT 1");
		$kj = $db->expand($kob);
		$ij = $kj['id'];
		
		if(!empty($nomeArquivo)){
			//$arq_new = '../imagens/'.trim($nomeArquivo);
			//move_uploaded_file($nomeTemporario, ($arq_new));

			require ("funcao_foto.php");
			if($resposta==1){
			
				$kob = $db->select("INSERT INTO foto_bercario (id_bercario, foto) VALUES ('$ij', '$imagem_final')");
				echo '<script>$("#sucesso_user").show();</script>';
			
			} else {

				echo '<div class="alert alert-danger">
				  <strong>Erro!</strong> Selecione uma imagem JPG/JPGE ou PNG.
				</div>';
			} 
			
		}
		
		
		
		
			

//FAZ A PESQUISA PARA ALTERAÇAO NO BANCO DE DADOS	
} else if(isset($_GET['action']) && $_GET['action']==2){
	
	$x=1;
	
	$sel = $db->select("SELECT * FROM bercario WHERE id='$id' LIMIT 1");
	$ln = $db->expand($sel);
	
	
	
//FAZ A exclusao NO BANCO DE DADOS		
} else if(isset($_GET['action']) && $_GET['action']==3){
	
	$sel = $db->select("DELETE FROM bercario WHERE id='$id' LIMIT 1");
	echo '<script>$("#sucesso_user").show();</script>';
	
	
//FAZ A ALTERAÇAO NO BANCO DE DADOS		
} else if(isset($_GET['action']) && $_GET['action']==4){
	
		
		$nomeArquivo = trim($_FILES["imagem"]["name"]);
		$tamanhoArquivo = $_FILES["imagem"]["size"];
		$nomeTemporario = $_FILES["imagem"]["tmp_name"];
		$nomeTipo = $_FILES["imagem"]["type"];
		
		$sel = $db->select("UPDATE bercario SET nome_crianca='$nome_crianca', nome_pai='$nome_pai', nome_mae='$nome_mae', data_nasc='$data_nasc', sexo='$sexo', hora='$hora', peso='$peso' WHERE id='$id' LIMIT 1");	
	
		if(!empty($nomeArquivo)){
			$arq_new = '../imagens/'.trim($nomeArquivo);
			move_uploaded_file($nomeTemporario, ($arq_new));
			
			$kob = $db->select("DELETE FROM foto_bercario WHERE id_bercario='$id'");
			$kob = $db->select("INSERT INTO foto_bercario (id_bercario, foto) VALUES ('$id', '$nomeArquivo')");
			
		} 
		
			
		echo '<script>$("#sucesso_user").show();</script>';
			
	
}
?>

<div class="panel panel-primary">

	<div class="panel-heading">
		<h4 class="panel-title"><h4>Cadastro de Berçario</h4></h4>
	</div>
				


<?php
//SE FOR UPDATE
if($x==1){
	echo '<form method="post" action="?action=4" enctype="multipart/form-data">';	
	echo '<input type="hidden" name="id" value="'.$id.'">';
	
// INSERÇAO NORMAL	
} else {
	echo '<form method="post" action="?action=1" enctype="multipart/form-data">';
}
?>
<div class="row">

	<div class="col-md-12">&nbsp;</div>
	
    <div class="col-md-12">
    
    	
        <div class="col-md-12">
           <div class="form-group">
                <label for="exampleInputEmail1">Nome da crian&ccedil;a</label>
                <input type="text" class="form-control" name="nome_crianca" required value="<?php if($x==1){ echo $ln['nome_crianca'];} ?>"/>
           </div>
        </div>  
        
         <div class="col-md-12">
           <div class="form-group">
                <label for="exampleInputEmail1">Nome do pai</label>
                <input type="text" class="form-control" name="nome_pai"  value="<?php if($x==1){ echo $ln['nome_pai'];} ?>"/>
           </div>
        </div> 
        
         <div class="col-md-12">
           <div class="form-group">
                <label for="exampleInputEmail1">Nome da M&atilde;e</label>
                <input type="text" class="form-control" name="nome_mae"  value="<?php if($x==1){ echo $ln['nome_mae'];} ?>"/>
           </div>
        </div>   
        
        
        <div class="col-md-3">
           <div class="form-group">
                <label for="exampleInputEmail1">Data Nasc.</label>
                <input type="date" class="form-control" name="data_nasc" required value="<?php if($x==1){ echo $ln['data_nasc'];} ?>"/>
           </div>
        </div>  
        
        
        <div class="col-md-3">
           <div class="form-group">
                <label for="exampleInputEmail1">Hora do Nasc.</label>
                <input type="text" class="form-control" name="hora"  value="<?php if($x==1){ echo $ln['hora'];} ?>"/>
           </div>
        </div> 
        
        <div class="col-md-3">
           <div class="form-group">
                <label for="exampleInputEmail1">Peso</label>
                <input type="text" class="form-control" name="peso"  value="<?php if($x==1){ echo $ln['peso'];} ?>"/>
           </div>
        </div> 
        
        
        <div class="col-md-3">
           <div class="form-group">
                <label for="exampleInputEmail1">Sexo <small>F = Feminino, ou M= Masculino</small></label>
                <input type="text" class="form-control" required="required" name="sexo" maxlength="1" max="1"  value="<?php if($x==1){ echo $ln['sexo'];} ?>"/>
           </div>
        </div> 
        

        <div class="col-md-12">
           <div class="form-group">
                <label for="exampleInputEmail1">Foto (1024x768)</label>
                <input type="file" class="form-control" name="imagem"  />
           </div>
        </div> 
        
        <hr>
        
        <div class="col-md-12">
        <button type="submit" class="btn btn-primary">SALVAR</button>
        </div>   
        
        <div class="col-md-12">&nbsp;</div>
           
   </div>

</div>                            
      
</div>    



<div class="panel panel-primary">

	<div class="panel-heading">
		<h4 class="panel-title"><h4>Berçários Cadastrados</h4></h4>
	</div>
				

<ul class="list-group">
					
	<?php
		$hoje=date("Y-m-d");
		$db = new DB();   
		
		
		$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
		$registros = 50;		
		$contagem = $db->select("SELECT id FROM bercario");
		$total = $db->rows($contagem);
		$numPaginas = ceil($total/$registros);
		$inicio = ($registros*$pagina)-$registros;
		$x=0;
		 
		$sel = $db->select("SELECT * FROM bercario ORDER BY id DESC LIMIT $inicio,$registros");
		if($db->rows($sel)){
			$x=1;	
			while($yy = $db->expand($sel)){
								
				echo'
					
					<li class="list-group-item">
						<a  data-toggle="collapse" style="text-transform:uppercase">'.$yy['nome_crianca'].'</a>				
						<a href="?id='.$yy['id'].'&action=3" style="float:right;"><i class="fa fa-trash"></i></a>
						<a href="?id='.$yy['id'].'&action=2" style="float:right; margin-right:8px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
						
					</li>
				';
				$x++;	
			}
		}
	
	?>
	

</ul>                           
      
</div> 



<center>
<?php
	  	if($x>0){
			echo '<nav aria-label="Page navigation">
					  <ul class="pagination pagination" style="border:0;">';
			for($i = 1; $i < $numPaginas + 1; $i++) {
				
				if($pagina==$i){
					echo '<li class="page-item active"><a class="page-link" href="maternidade.php?pagina='.$i.'">'.$i.'</a></li>';
				} else {
					echo '<li class="page-item"><a class="page-link" href="maternidade.php?pagina='.$i.'">'.$i.'</a></li>';	
				}
				
        		
    		}	
			echo '</ul>
				</nav>';
		}
?> 
</center>


                     


<?php include("includes/rodape.php"); ?>
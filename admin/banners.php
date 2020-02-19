<?php include("includes/topo.php"); ?>

<div class="alert alert-success" id="sucesso_user" style="display:none">
  <strong>Sucesso!</strong> Informações salvas/alteradas com sucesso.
</div>   


<?php

$x=0;
$db = new DB();    
		

//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==1){
	
		$nomeArquivo = $_FILES["imagem"]["name"];
		$tamanhoArquivo = $_FILES["imagem"]["size"];
		$nomeTemporario = $_FILES["imagem"]["tmp_name"];
		$nomeTipo = $_FILES["imagem"]["type"];
	
		$arq_new = '../images/'.trim($nomeArquivo);
		move_uploaded_file($nomeTemporario, ($arq_new));
		
		$sel = $db->select("INSERT INTO banners (banner) VALUES ('$nomeArquivo')");
		echo '<script>$("#sucesso_user").show();</script>';
			

	
//FAZ A exclusao NO BANCO DE DADOS		
} else if(isset($_GET['action']) && $_GET['action']==3){
	
	$sel = $db->select("DELETE FROM banners WHERE id='$id' LIMIT 1");
	echo '<script>$("#sucesso_user").show();</script>';
	
}
?>

<div class="panel panel-primary">

	<div class="panel-heading">
		<h4 class="panel-title"><h4>Cadastro de Banners</h4></h4>
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
                <label for="exampleInputEmail1">Imagem <small>(Tamanho: 1100x400)</small></label>
                <input type="file" class="form-control" name="imagem" required="required" />
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
		<h4 class="panel-title"><h4>Banners Cadastrados</h4></h4>
	</div>
				

<ul class="list-group">
					
	<?php
		$hoje=date("Y-m-d");
		$db = new DB();    
		$sel = $db->select("SELECT id, banner FROM banners ORDER BY id DESC");
		if($db->rows($sel)){
			$x=1;	
			while($yy = $db->expand($sel)){
								
				echo'
					
					<li class="list-group-item">
						
						<img src="../images/'.$yy['banner'].'" class="img-thumbnail" width="204" height="136">
						<a href="?id='.$yy['id'].'&action=3" style="float:right;"><i class="fa fa-trash"></i></a>	
																	
					</li>
				';
				$x++;	
			}
		} else {
			
			echo'
					
					<li class="list-group-item">
						<a  data-toggle="collapse" style="text-transform:uppercase">NENHUM REGISTRO ENCONTRADO</a>				
						
						
					</li>
				';
			
		}
	
	?>
	

</ul>                           
      
</div> 


<script type="text/javascript">
	   $("#data").mask("99/99/9999");
</script>
               
                     


<?php include("includes/rodape.php"); ?>
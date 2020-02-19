<?php include ("includes/topo.php"); ?>

<?php
$b=0;
$x=0;

//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==1){
	
	if(!empty($titulo) && !empty($texto)){
		
		
		$nomeArquivo = $_FILES["imagem"]["name"];
		
		if(!empty($nomeArquivo)){
			
			// Caminho para onde o arquivo será enviado
			$caminho = "../imagens/";
			include("funcao_upload_fotos.php");
			
			
			if($resposta==1){
				$grava = mysql_query("INSERT INTO noticia (Titulo, Corpo, Data, Url) VALUES ('$titulo', '$texto', '$data_hoje', '$nm_new')");	
				echo '<script>alert("Item inserido com sucesso.");</script>';	
			}
			
			
			
		} else {
			
			$grava = mysql_query("INSERT INTO noticia (Titulo, Corpo, Data) VALUES ('$titulo', '$texto', '$data_hoje')");	
			echo '<script>alert("Item inserido com sucesso.");</script>';	
			
		}
		
		
						
		
			
	} else {
		
		$b=1;
		echo '<script>alert("Erro: Preencha os campos e tente novamente.");</script>';
		
	}

//FAZ A PESQUISA PARA ALTERAÇAO NO BANCO DE DADOS	
} else if(isset($_GET['action']) && $_GET['action']==2){
	
	$x=1;
	
	$select = mysql_query("SELECT * FROM noticia WHERE Id='$id' LIMIT 1");
	$ln = mysql_fetch_array($select);
	
	$titulo = $ln['Titulo'];
	$texto = $ln['Corpo'];

	
	
//FAZ A exclusao NO BANCO DE DADOS		
} else if(isset($_GET['action']) && $_GET['action']==3){
	
	$exclui = mysql_query("DELETE FROM noticia WHERE Id='$id' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	
	
//FAZ A ALTERAÇAO NO BANCO DE DADOS		
} else if(isset($_GET['action']) && $_GET['action']==4){
	
	if(!empty($titulo) && !empty($texto)){
		
		$nomeArquivo = $_FILES["imagem"]["name"];
		
		if(!empty($nomeArquivo)){
			
			// Caminho para onde o arquivo será enviado
			$caminho = "../imagens/";
			include("funcao_upload_fotos.php");
			
			$grava = mysql_query("UPDATE noticia SET Titulo='$titulo', Corpo='$texto', Url='$nm_new' WHERE Id='$id' LIMIT 1");	
			
			
		} else {
			$grava = mysql_query("UPDATE noticia SET Titulo='$titulo', Corpo='$texto' WHERE Id='$id' LIMIT 1");		
		}
		
			
		
			
		echo '<script>alert("Item alterado com sucesso.");</script>';
			
	} else {
		
		$x=1;
		$b=1;
		echo '<script>alert("Erro: Preencha os campos e tente novamente.");</script>';
		
	}
	
}
?>

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
<table cellpadding="0" cellspacing="0" width="100%">
<tr><td><span class="titu">:: Área de Inserçao de Noticias</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Título:</span><span class="obs"> (* Titulo da Noticia)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="titulo" value="<?php if($b==1){echo ($titulo);} else if($x==1){ echo ($titulo);} ?>" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Imagem:</span><span class="obs"><b> (* Somente imagens JPG. Nao envie imagens muito grandes. Caso ela seja grande será automaticamente redimensionada)</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="file" style="width:850px; background-color:#FFC" class="gra" name="imagem" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Texto:</span><span class="obs"> (* Texto da Notícia)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><textarea name="texto" class="grau"><?php if($b==1){echo ($texto);} else if($x==1){ echo ($texto);} ?></textarea></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td height="19"></td><tr>
<tr><td colspan="9" align="center">
<?php
//SE FOR UPDATE
if($x==1){
	echo '<input type="submit" value="ALTERAR" class="gra">';	
	
// INSERÇAO NORMAL	
} else {
	echo '<input type="submit" value="CADASTRAR" class="gra">';
}
?>
</td></tr>
</table>
</form>














<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="60"></Td></tr>
<tr><td align="right"><span class="titu">Alteraçao/Exclusao de Notícias</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="12"></Td></tr>
<?php
	$pega = mysql_query("SELECT * FROM noticia ORDER BY Id DESC");
	if(mysql_num_rows($pega)){
			
		$i=1;	
		while($row = mysql_fetch_array($pega)){
			
			$v = $i.'sty';
			
			echo '<tr id="'.$v.'"  onmouseover="javscript:muda_cor(\''.$v.'\');" onmouseout="javscript:volta_cor(\''.$v.'\');">
			
			<td width="10%" align="left" height="24" valign="middle"><span class="tex">'.$row['Data'].'</span></td>
			<td width="84%" align="left" height="24" valign="middle"><span class="tex">'.strip_tags($row['Titulo']).'</span></td>';
			
		
			echo '<td  width="3%" align="center"><a href="?id='.$row['Id'].'&action=2"><img src="interface/edit.gif" title="Alterar"></a></td>';
			echo '<td o width="3%" align="center"><a href="?id='.$row['Id'].'&action=3"><img src="interface/delete.gif" title="Excluir"></a></td></tr>';
				

			echo '<tr><Td colspan="6" style="border-bottom:1px solid #e1e1e1"></Td></tr>';
			
			$i++;
				
		}
			
	} else {
		echo '<tr><td align="center"><span class="tex">Nenhum item encontrado.</span></td></tr>';		
	}
?>
</table>



<?php include ("includes/rodape.php"); ?>
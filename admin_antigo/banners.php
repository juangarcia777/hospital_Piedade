<?php include ("includes/topo.php"); ?>

<?php
//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==22){
	
	
	
	// Caminho para onde o arquivo será enviado
	$caminho = "../imagens/";
	include("funcao_upload_fotos.php");
	
	
	if($resposta==1){
		$grava = mysql_query("INSERT INTO banners (banner) VALUES ('$nm_new')");	
		echo '<script>alert("Imagem adicionada com sucesso.");</script>';
	}
	
	
	
	
} else if(isset($_GET['action']) && $_GET['action']==3){
	
	$exclui = mysql_query("DELETE FROM banners WHERE id='$id' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	
} 


?>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><td align="left"><span class="titu">:: Cadastro de banners no site</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>


<form method="post" action="?action=22" enctype="multipart/form-data">	
<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Banners:</span><span class="obs"><b> (* Somente imagens JPG. O tamanho da imagem devera ser de <?php echo $largura_banner; ?> x <?php echo $altura_banner; ?>. Caso ela seja grande sera automaticamente redimensionada)</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="file" style="width:850px; background-color:#FFC" class="gra" name="imagem" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td colspan="9" align="center">
<input type="submit" value="CADASTRAR" class="gra">
</td></tr>
<tr><Td height="16"></Td></tr>
</table>
</form>





<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="30"></Td></tr>
<tr><td align="right"><span class="titu">Banners Cadastrados ::</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<center>
<?php

$pega2 = mysql_query("SELECT * FROM banners ORDER BY id DESC");
		 	
			if(mysql_num_rows($pega2)){
				
				echo '<table cellpadding="0" cellspacing="0" width="100%">';
				$i=0;
				while($row2 = mysql_fetch_array($pega2)){
					
					
						echo '<tr><td align="left" valign="top" width="97%">
						
						<img src="../thumbs.php?img=imagens/'.$row2['banner'].'&altura=180&largura=500" style="border:1px solid black">
						
						</td>
						
						<td width="3%"><a href="?id='.$row2['id'].'&action=3"><img src="interface/delete.gif" title="Excluir"></a></td></tr>';
						
						
						echo '<tr><Td height="8"></Td></tr>';
						echo '<tr><Td style="border-bottom:1px solid #e1e1e1" colspan="2"></Td></tr>';
						echo '<tr><Td height="8"></Td></tr>';
					
					$i++;
					
				}
				
				echo '</table>';
				
				
			} else {
				
				echo '<table cellpadding="0" cellspacing="0"><tr><Td height="12"></Td></tr><tr><td><span style="font-size:13px">Nenhum item encontrado.</span></td></tr></table>';
				
					
			}
?>
</center>

<?php include ("includes/rodape.php"); ?>
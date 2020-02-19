<?php include ("includes/topo.php"); ?>

<?php
//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==22){
		
	// Caminho para onde o arquivo será enviado
	$caminho = "../imagens/";
	include("funcao_upload_fotos.php");
	
	
	if($resposta==1){
		$grava = mysql_query("INSERT INTO foto (Url) VALUES ('$nm_new')");	
		echo '<script>alert("Imagem adicionada com sucesso.");</script>';
	}
		
	

} else if(isset($_GET['action']) && $_GET['action']==3){
	
	$exclui = mysql_query("DELETE FROM foto WHERE Id='$id_foto' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	
} 

?>

<table cellpadding="0" cellspacing="0" width="100%">
<tr>

<td align="left" width="50%"><span class="titu">:: Cadastro Fotos no Site</b></span></td>

<td align="right" width="50%"></td>

</tr>
<tr><Td height="4"></Td></tr>
<tr><Td colspan="2" style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="5"></Td></tr>
</table>


<form method="post" action="fotos.php?action=22" enctype="multipart/form-data">	
<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="5"></Td></tr>
<tr><td><span class="tex2">Imagem:</span><span class="obs"><b> (* Somente imagens JPG. Nao envie imagens muito grandes. Caso ela seja grande será automaticamente redimensionada)</b></span></td></tr>
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
<tr><td align="right"><span class="titu">Fotos Cadastradas ::</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<center>
<?php

$pega2 = mysql_query("SELECT * FROM foto ORDER BY Id DESC");
		 	
			if(mysql_num_rows($pega2)){
				
				echo '<table cellpadding="0" cellspacing="0"><tr><Td height="18"></Td></tr><tr>';
				$i=0;
				while($row2 = mysql_fetch_array($pega2)){
					
					if($i==7){$i=0; echo '</tr><tr><td height="16"></td></tr><tr>';}
					
					
						echo '<td align="center" valign="top">
						
						<img src="../thumbs.php?img=imagens/'.$row2['Url'].'&altura=70&largura=100" style="border:1px solid black"><br>
						
						<a href="fotos.php?action=3&id_foto='.$row2['Id'].'" >[exlcuir foto]</a>
						
						
						</td><td width="9"></td>';
						
					
					$i++;
					
				}
				
						echo '</tr></table>';

			} else {
				
				echo '<table cellpadding="0" cellspacing="0"><tr><Td height="12"></Td></tr><tr><td><span style="font-size:13px">Nenhum item encontrado.</span></td></tr></table>';
				
			}
?>
</center>
<?php include ("includes/rodape.php"); ?>
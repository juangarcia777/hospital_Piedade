<?php include ("includes/topo.php"); ?>

<?php
$b=0;
$x=0;


//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==22){
		
	if(!empty($nome)){	
		
		
	// Caminho para onde o arquivo será enviado
	$caminho = "../imagens/";
	include("funcao_upload_fotos.php");
	
	
	if($resposta==1){
		$grava = mysql_query("INSERT INTO parceiros (nome, foto) VALUES ('$nome', '$nm_new')");	
		echo '<script>alert("Parceiro adicionado com sucesso.");</script>';
	}
		
	
	} else {
		
		
		echo '<script>alert("Erro: Preencha os campos e tente novamente.");</script>';
		
	}
	
	
	
} else if(isset($_GET['action']) && $_GET['action']==3){
	
	$exclui = mysql_query("DELETE FROM parceiros WHERE id='$id' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	

}
?>




<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left"><span class="titu">:: Parceiros</span></td>
</tr>
<tr><Td height="4"></Td></tr>
<tr><Td colspan="2" style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<form method="post" action="?action=22" enctype="multipart/form-data">	
<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Parceiro:</span><span class="obs"> (* Nome da Empresa Parceira)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="nome" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Imagem:</span><span class="obs"><b> (* Somente imagens JPG, de tamanho: <b>180x180</b>.</b></span></td></tr>
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
<tr><td align="right"><span class="titu">Parceiros Cadastrados ::</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="12"></Td></tr>
<?php
	$pega = mysql_query("SELECT * FROM parceiros ORDER BY id DESC");
	if(mysql_num_rows($pega)){
			
		$i=1;	
		while($row = mysql_fetch_array($pega)){
			
			$v = $i.'sty';
			
			echo '<tr id="'.$v.'"  onmouseover="javscript:muda_cor(\''.$v.'\');" onmouseout="javscript:volta_cor(\''.$v.'\');">
			

			<td width="97%" align="left" height="24" valign="middle"><span class="tex">'.strip_tags($row['nome']).'</span></td>';
			
			
			
			echo '<td o width="3%" align="center"><a href="?id='.$row['id'].'&action=3"><img src="interface/delete.gif" title="Excluir"></a></td></tr>';
				

			echo '<tr><Td colspan="6" style="border-bottom:1px solid #e1e1e1"></Td></tr>';
			
			$i++;
				
		}
			
	} else {
		echo '<tr><td align="center"><span class="tex">Nenhum item encontrado.</span></td></tr>';		
	}
?>
</table>



<?php include ("includes/rodape.php"); ?>
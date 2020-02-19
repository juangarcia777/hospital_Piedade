<?php include ("includes/topo.php"); ?>

<?php
$b=0;
$x=0;

//FAZ A INSERÇĂO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==1){
	
	if(!empty($categoria)){
						
		$grava = mysql_query("INSERT INTO categoria (Nome) VALUES ('$categoria')");	
			
		echo '<script>alert("Item inserido com sucesso.");</script>';
			
	} else {
		
		$b=1;
		echo '<script>alert("Erro: Preencha os campos e tente novamente.");</script>';
		
	}

//FAZ A PESQUISA PARA ALTERAÇĂO NO BANCO DE DADOS	
} else if(isset($_GET['action']) && $_GET['action']==2){
	
	$x=1;
	
	$select = mysql_query("SELECT * FROM categoria WHERE Id='$id' LIMIT 1");
	$ln = mysql_fetch_array($select);
	
	$categoria = $ln['Nome'];
	
	
//FAZ A exclusăo NO BANCO DE DADOS		
} else if(isset($_GET['action']) && $_GET['action']==3){
	
	$exclui = mysql_query("DELETE FROM categoria WHERE Id='$id' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	
	
//FAZ A ALTERAÇĂO NO BANCO DE DADOS		
} else if(isset($_GET['action']) && $_GET['action']==4){
	
	if(!empty($categoria)){
			
		$grava = mysql_query("UPDATE categoria SET Nome='$categoria' WHERE Id='$id' LIMIT 1");	
			
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
	echo '<form method="post" action="?action=4">';	
	echo '<input type="hidden" name="id" value="'.$id.'">';
	
// INSERÇĂO NORMAL	
} else {
	echo '<form method="post" action="?action=1">';
}
?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr><td><span class="titu">:: Cadastro de Aulas da Academia</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Aula:</span><span class="obs"> (* Nome da Aula)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="categoria" value="<?php if($b==1){echo $categoria;} else if($x==1){ echo $categoria;} ?>" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td colspan="9" align="center">
<?php
//SE FOR UPDATE
if($x==1){
	echo '<input type="submit" value="ALTERAR" class="gra">';	
	
// INSERÇĂO NORMAL	
} else {
	echo '<input type="submit" value="CADASTRAR" class="gra">';
}
?>
</td></tr>
</table>














<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="30"></Td></tr>
<tr><td align="right"><span class="titu">Alteraçăo/Exclusăo de Aulas Cadastradas</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="12"></Td></tr>
<?php
	$pega = mysql_query("SELECT * FROM categoria ORDER BY Id DESC");
	if(mysql_num_rows($pega)){
			
		$i=1;	
		while($row = mysql_fetch_array($pega)){
			
			$v = $i.'sty';
			
			echo '<tr id="'.$v.'"  onmouseover="javscript:muda_cor(\''.$v.'\');" onmouseout="javscript:volta_cor(\''.$v.'\');">
			

			<td width="91%" align="left" height="24" valign="middle"><span class="tex">'.(strip_tags($row['Nome'])).'</span></td>';
			
			
			echo '<td  width="3%" align="center"><a href="envia_fotos_aulas.php?id='.$row['Id'].'"><img src="interface/img.gif" title="Enviar fotos das aulas"></a></td>';
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
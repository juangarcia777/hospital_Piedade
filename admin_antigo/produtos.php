<?php include ("includes/topo.php"); ?>

<?php
$b=0;
$x=0;

//FAZ A INSERÇĂO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==1){
	
	if(!empty($produto)){
		
			
			
	
	
			$grava = mysql_query("INSERT INTO produto (Descricao, IdCategoria) VALUES ('$produto', '$categoria')");		
			echo '<script>alert("Item cadastrado com sucesso.");</script>';
	
						
		
			
	
	} else {
		
		$b=1;
		echo '<script>alert("Erro: Preencha os campos e tente novamente.");</script>';
		
	}

//FAZ A PESQUISA PARA ALTERAÇĂO NO BANCO DE DADOS	
} else if(isset($_GET['action']) && $_GET['action']==2){
	
	$x=1;
	
	$select = mysql_query("SELECT * FROM produto WHERE Id='$id' LIMIT 1");
	$ln = mysql_fetch_array($select);
	
	$produto = $ln['Descricao'];
	$categoria = $ln['IdCategoria'];

		
		
		$corm2 = mysql_query("SELECT * FROM categoria WHERE Id='$categoria'");
		$gui2 = mysql_fetch_array($corm2);
		$categoria_id = $gui2['Id'];
		$categoria = $gui2['Nome'];
	
	
	
//FAZ A exclusăo NO BANCO DE DADOS		
} else if(isset($_GET['action']) && $_GET['action']==3){
	
	$exclui = mysql_query("DELETE FROM produto WHERE Id='$id' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	
	
//FAZ A ALTERAÇĂO NO BANCO DE DADOS		
} else if(isset($_GET['action']) && $_GET['action']==4){
	
	if(!empty($produto)){
	
	
			$grava = mysql_query("UPDATE produto SET Descricao='$produto'  WHERE Id='$id' LIMIT 1");	
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
	
// INSERÇĂO NORMAL	
} else {
	echo '<form method="post" action="?action=1"  enctype="multipart/form-data">';
}
?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr><td><span class="titu">:: Cadastro de Produtos</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="8"></Td></tr>
<tr>
<td><span class="tex2">Horário(s):</span><span class="obs"> (Ex: Seg a Sex: 07:00 ás 9:00 e Sab: 09:00 ás 12:00)</span></td>
<td width="10"></td>
<td align="left"><span class="tex2">Aula:</span><span class="obs"> (* Escolha a aula a que destina-se esse horário)</span></td>
</tr>
<tr><Td height="3"></Td></tr>
<tr>
<td><input type="text" class="medio" name="produto" value="<?php if($b==1){echo ($produto);}  else if($x==1){ echo ($produto);} ?>" /></td>
<td width="90"></td>
<td width="430">
<select name="categoria" class="medio">
	<?php
	$pega = mysql_query("SELECT * FROM categoria");
	
		if($x==1){
			
			echo '<option selected="selected" value="'.$categoria_id.'">'.($categoria).'</option>';	
			
			
			$i==1;		
			while($ln2 = mysql_fetch_array($pega)){
				
				if($i==1){
					echo '<option value="'.$ln2['Id'].'" >'.($ln2['Nome']).'</option>';									
				} else {
					echo '<option value="'.$ln2['Id'].'">'.($ln2['Nome']).'</option>';									
				}
			$i++;	
			}	
		
		} else {
		
		
			$i==1;		
			while($ln2 = mysql_fetch_array($pega)){
				
				if($i==1){
					echo '<option selected="selected" value="'.$ln2['Id'].'">'.$ln2['Nome'].'</option>';									
				} else {
					echo '<option value="'.$ln2['Id'].'">'.($ln2['Nome']).'</option>';									
				}
			$i++;	
			}	
			
		}
	?>
</select>
</td>
</tr>


<tr><td height="19"></td><tr>
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
</form>













<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="30"></Td></tr>
<tr><td align="right"><span class="titu">Horários Cadastrados ::</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="12"></Td></tr>
<?php
	$pega = mysql_query("SELECT Descricao, IdCategoria, Id FROM produto ORDER BY Id DESC");
	if(mysql_num_rows($pega)){
			
		$i=1;	
		while($row = mysql_fetch_array($pega)){
			
			$v = $i.'sty';
			
			$ct = $row['IdCategoria'];
			
			$corm2 = mysql_query("SELECT * FROM categoria WHERE Id='$ct'");
			$gui2 = mysql_fetch_array($corm2);
			$categoria_id = $gui2['Id'];
			$categoriab = $gui2['Nome'];
			
			
			
			echo '<tr id="'.$v.'"  onmouseover="javscript:muda_cor(\''.$v.'\');" onmouseout="javscript:volta_cor(\''.$v.'\');">
			

			<td width="94%" align="left" height="44" valign="middle">
			<span class="tex"><b>'.$categoriab.'</b><br>'.(strip_tags($row['Descricao'])).'</span></td>';
			
			
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
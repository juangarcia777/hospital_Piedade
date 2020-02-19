<?php include ("includes/topo.php"); ?>

<?php
$b=0;
$x=0;

//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==1){
	
	if(!empty($email) && !empty($responsavel)){
						
		$grava = mysql_query("INSERT INTO email (Email, Responsavel, Descricao) VALUES ('$email', '$responsavel', '$descricao')");	
			
		echo '<script>alert("Item inserido com sucesso.");</script>';
			
	} else {
		
		$b=1;
		echo '<script>alert("Erro: Preencha os campos e tente novamente.");</script>';
		
	}

//FAZ A exclusao NO BANCO DE DADOS		
} else if(isset($_GET['action']) && $_GET['action']==3){
	
	$exclui = mysql_query("DELETE FROM email WHERE Id='$id' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	
	
}
?>

<form method="post" action="?action=1">

<table cellpadding="0" cellspacing="0" width="100%">
<tr><td><span class="titu">:: Cadastro de Emails de Contato</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Responsável:</span><span class="obs"> (* Nome do responsável pelo email)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="responsavel" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Email:</span><span class="obs"> (* Email de Contato)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="email" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Descriçao da área:</span><span class="obs"> (* Descriçao da área do responsável...Ex: SUPORTE)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="descricao" /></td></tr>

<tr><Td height="8"></Td></tr>
<tr><td colspan="9" align="center">
<input type="submit" value="CADASTRAR" class="gra">
</td></tr>
</table>
</form>













<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="30"></Td></tr>
<tr><td align="right"><span class="titu">Alteraçao/Exclusao de Emails ::</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="12"></Td></tr>
<?php
	$pega = mysql_query("SELECT * FROM email ORDER BY Id DESC");
	if(mysql_num_rows($pega)){
			
		$i=1;	
		while($row = mysql_fetch_array($pega)){
			
			$v = $i.'sty';
			
			echo '<tr id="'.$v.'"  onmouseover="javscript:muda_cor(\''.$v.'\');" onmouseout="javscript:volta_cor(\''.$v.'\');">
			

			<td width="20%" align="left" height="24" valign="middle"><span class="tex">'.($row['Responsavel']).'</span></td>
			<td align="left" height="24" valign="middle"><span class="tex">'.($row['Email']).'</span></td>';
			
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
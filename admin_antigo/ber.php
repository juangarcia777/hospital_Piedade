<?php include ("includes/topo.php"); ?>

<?php
$b=0;
$x=0;

//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==1){
	
	if(!empty($nome_crianca) && !empty($data_nasc)){
		
		$dt = data_user_para_mysql($data_nasc);
		
				$grava = mysql_query("INSERT INTO bercario (nome_crianca, nome_pai, nome_mae, observacoes, data_nasc, sexo) VALUES ('$nome_crianca', '$nome_pai', '$nome_mae', '$observacoes', '$dt', '$sexo')");	
				echo '<script>alert("Item inserido com sucesso.");</script>';			
			
	} else {
		
		$b=1;
		echo '<script>alert("Erro: Preencha os campos e tente novamente.");</script>';
		
	}

}else if(isset($_GET['action']) && $_GET['action']==3){
	
	$exclui = mysql_query("DELETE FROM bercario WHERE id='$id' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	
}
?>


<form method="post" action="ber.php?action=1">
<table cellpadding="0" cellspacing="0" width="100%">
<tr><td><span class="titu">:: Cadastro de Nascimentos</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Data do Nascimento:</span><span class="obs"> (* Data do Evento no formato: <b>Ex: 12/01/2013</b>)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="data_nasc" style="width:140px" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Nome do Bêbe:</span><span class="obs"><b> (* Nome da criança que nasceu)</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="nome_crianca" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Nome da Mãe:</span><span class="obs"><b> (* Nome da Mãe)</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="nome_mae" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Nome do Pai:</span><span class="obs"><b> (* Opcional)</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="nome_pai" /></td></tr>
<tr><Td height="8"></Td></tr>

<tr><td><span class="tex2">Observações:</span><span class="obs"><b> (* Ex: Nasceu com 2kg, e 23cm....etc)</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><textarea  type="text" class="grande" name="observacoes" style="height:90px; width:500px" /></textarea></td></tr>
<tr><Td height="12"></Td></tr>

<tr><td><span class="tex2">Sexo:</span><span class="obs"><b> (F = FEMININO ------  M = MASCULINO)</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="sexo" style="width:50px" /></td></tr>

<tr><td height="19"></td><tr>
<tr><td colspan="9" align="center">
<input type="submit" value="CADASTRAR" class="gra">
</td></tr>
</table>
</form>














<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="60"></Td></tr>
<tr><td align="right"><span class="titu">Registros Cadastrados</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="12"></Td></tr>
<?php
	$pega = mysql_query("SELECT * FROM bercario ORDER BY id DESC");
	if(mysql_num_rows($pega)){
			
		$i=1;	
		while($row = mysql_fetch_array($pega)){
			
			$v = $i.'sty';
			
			echo '<tr id="'.$v.'"  onmouseover="javscript:muda_cor(\''.$v.'\');" onmouseout="javscript:volta_cor(\''.$v.'\');">
			
			<td width="94%" align="left" height="24" valign="middle"><span class="tex">'.strip_tags($row['nome_crianca']).'</span></td>';
			
		
			echo '<td  width="3%" align="center"><a href="fotos_bercario.php?id='.$row['id'].'"><img src="interface/img.gif" title="Enviar Fotos"></a></td>';
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
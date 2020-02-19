<?php include ("includes/topo.php"); ?>

<?php
$b=0;
$x=0;


//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==23){

	
	if(!empty($url)){
		
		$alt_video = explode('v=',$url);
		$alt_video = substr($alt_video[1], 0,11);
		$data_hoje = date("Y-m-d");
		
		
	
		$grava = mysql_query("INSERT INTO video (Url, Descricao) VALUES ('$alt_video', '$descricao')");	
		echo '<script>alert("Item inserido com sucesso.");</script>';
	
	}
	
	
} else if(isset($_GET['action']) && $_GET['action']==4){
	
	$exclui = mysql_query("DELETE FROM video WHERE Id='$id_video' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	
} 
?>




<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left"><span class="titu">:: Cadastro de vídeos</span></td>
</tr>
<tr><Td height="4"></Td></tr>
<tr><Td colspan="2" style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>




<form method="post" action="?action=23" enctype="multipart/form-data">	
<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Url do Vídeo:</span><span class="obs"><b> (* Ex: http://www.youtube.com/watch?v=87877887)</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5">
<table cellpadding="0" cellspacing="0">
<tr>
<td><input type="text" class="grande" name="url" style="width:760px" /></td>
<td>&nbsp;&nbsp;&nbsp;<a href="http://www.youtube.com.br" title="Acessar Youtube" target="_blank"><img src="interface/yout.jpg" /></a></td>
</tr>
</table>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Descrição:</span><span class="obs"><b> (* Breve descrição sobre o vídeo)</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5">
<table cellpadding="0" cellspacing="0">
<tr>
<td><input type="text" class="grande" name="descricao" style="width:760px" /></td>
</tr>
</table>
<tr><Td height="8"></Td></tr>
<tr><td colspan="9" align="center">
<input type="submit" value="CADASTRAR" class="gra">
</td></tr>
<tr><Td height="16"></Td></tr>
</table>
</form>





<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="30"></Td></tr>
<tr><td align="right"><span class="titu">Vídeos cadastrados ::</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="12"></Td></tr>
<?php
	$pega = mysql_query("SELECT * FROM video ORDER BY Id DESC");
	if(mysql_num_rows($pega)){
			
		$i=1;	
		while($row = mysql_fetch_array($pega)){
			
			$v = $i.'sty';
			
			echo '<tr id="'.$v.'"  onmouseover="javscript:muda_cor(\''.$v.'\');" onmouseout="javscript:volta_cor(\''.$v.'\');">
			
			<td width="94%" align="left" height="24" valign="middle"><span class="tex">Vídeo '.$i.' </span></td>';
		
			echo '<td o width="3%" align="center"><a href="?action=4&id_video='.$row['Id'].'"><img src="interface/delete.gif" title="Excluir"></a></td></tr>';
				

			echo '<tr><Td colspan="6" style="border-bottom:1px solid #e1e1e1"></Td></tr>';
			
			$i++;
				
		}
			
	} else {
		echo '<tr><td align="center"><span class="tex">Nenhum item encontrado.</span></td></tr>';		
	}
?>
</table>



<?php include ("includes/rodape.php"); ?>
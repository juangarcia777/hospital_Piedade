<?php include ("includes/topo.php"); ?>

<?php
if(isset($_GET['action']) && $_GET['action']==3){
	
	$exclui = mysql_query("DELETE FROM recados WHERE id='$id' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	
} else if(isset($_GET['action']) && $_GET['action']==4){
	
	$exclui = mysql_query("UPDATE recados SET ativo='1'  WHERE id='$id' LIMIT 1");
	echo '<script>alert("Item liberado com sucesso.");</script>';
	
} 
 


?>

<style>
a.obsa{text-decoration:none; color:#900}
a.obsa:hover{text-decoration:underline}
</style>



<table cellpadding="0" cellspacing="0" width="100%">
<tr><td align="left"><span class="titu">:: Recados aguardando liberação</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="15"></Td></tr>
</table>

<center>
<?php

$pega2 = mysql_query("SELECT * FROM recados WHERE ativo='0' ORDER BY id DESC");
		 	
			if(mysql_num_rows($pega2)){
				
				echo '<table cellpadding="0" cellspacing="0" width="100%">';
				$i=1;
				while($row2 = mysql_fetch_array($pega2)){
					
					$v = $i.'sty';
					
					
						echo '<tr id="'.$v.'"  onmouseover="javscript:muda_cor(\''.$v.'\');" onmouseout="javscript:volta_cor(\''.$v.'\');">
						
						<td width="10%" align="left" height="24" valign="middle"><span class="tex">'.$row2['data'].'</span></td>
						
						<td width="90%" align="left" height="24" valign="middle">
						
							<span class="tex">'.$row2['mensagem'].'</span>
							
							&nbsp;&nbsp;<a href="?id='.$row2['id'].'&action=3"><b>[apagar]</b></a>
							
							&nbsp;&nbsp;ou&nbsp;&nbsp;<a href="?id='.$row2['id'].'&action=4"><b>[liberar]</b></a>
							
							</td></tr>';
						
						
						echo '<tr><Td height="3"></Td></tr>';
						echo '<tr><Td style="border-bottom:1px solid #e1e1e1" colspan="3"></Td></tr>';
						echo '<tr><Td height="3"></Td></tr>';
					
					$i++;
					
					
				}
				
				echo '</table>';
				
				
			} else {
				
				echo '<table cellpadding="0" cellspacing="0"><tr><Td height="12"></Td></tr><tr><td><span style="font-size:13px">Nenhum item encontrado.</span></td></tr></table>';
				
					
			}
?>
</center>

<?php include ("includes/rodape.php"); ?>
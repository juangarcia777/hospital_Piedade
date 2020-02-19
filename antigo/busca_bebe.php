<?php include("includes/topo.php"); ?>

<div id="meio_conteudo" style="width:972px">


<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="36"></td></tr>
<tr>
	<td width="50%" align="left"><span style="color:#A0C0DD; font-size:23px"><b>Resultados da Busca</b></span></td>
</tr>
<tr><td height="6"></td></tr>
<tr><td colspan="2" style="border-bottom:1px dotted #A0C0DD"></td></tr>
<tr><td height="4"></td></tr>
<tr><td ><span style="color:#A0C0DD; font-style:italic; font-size:12px">Clique sobre para ver mais detalhes e fotos.</span></td></tr>
</table>
    


<table cellpadding="0" cellspacing="0">
<tr><td height="26"></td></tr>
<?php
$query = mysql_query("SELECT * FROM bercario WHERE nome_crianca LIKE '%$busca%' or nome_pai LIKE '%$busca%' or nome_mae LIKE '%$busca%'  ORDER BY data_nasc DESC");
while($row = mysql_fetch_array($query)){
	
	$id_bebe = $row['id'];	
	
	if($row['sexo']=='f' || $row['sexo']=='F'){
		$cor = '#D8A9CA';	
	} else {
		$cor = '#A0C0DD';	
	}
	
	
	$sele = mysql_query("SELECT * FROM foto_bercario WHERE id_bercario='$id_bebe' ORDER BY RAND() LIMIT 1");
	
	if(mysql_num_rows($sele)){
		$ln = mysql_fetch_array($sele);
		$img = '<a href="detalhes_bebe.php?id='.$row['id'].'" title="Ver mais"><img src="thumbs.php?img=imagens/'.$ln['foto'].'&altura=111&largura=147" style="border: 5px solid '.$cor.'" ></a>';	
	} else {
		$img = '<a href="detalhes_bebe.php?id='.$row['id'].'" title="Ver mais"><img src="thumbs.php?img=imagens/vazio.jpg&altura=111&largura=147" style="border: 5px solid '.$cor.'" ></a>';	
	}
	
	echo '<tr>
		<td>'.$img.'</td>
		<td width="11"></td>
		<td valign="top">
			<table cellpadding="0" cellspacing="0">
				<tr><td height="8"></td></tr>
				<tr><td><span class="bb" style="color:'.$cor.'">'.data_mysql_para_user($row['data_nasc']).'</span></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td><a style="color:'.$cor.'" href="detalhes_bebe.php?id='.$row['id'].'" class="bb">'.$row['nome_crianca'].'</a></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td><span class="bb" style="color:'.$cor.'"><b>Pai:</b> '.$row['nome_pai'].'</span></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td><span class="bb" style="color:'.$cor.'"><b>Mae:</b> '.$row['nome_mae'].'</span></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td><a  href="detalhes_bebe.php?id='.$row['id'].'" class="bb" style="font-size:12px; color:'.$cor.'"><b>ver mais...</b></a></td></tr>
			</table>
		</td>
	</tr>';
	
	echo '<tr><td height="36"></td></tr>';
	
	
		
}
?>
</table>




<script>
		$('html, body').animate({
			scrollTop: $('#meio_conteudo').offset().top
		}, 2000);
	</script>

<?php include("includes/rodape.php"); ?>
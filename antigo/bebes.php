<?php include("includes/topo.php"); ?>

<div id="meio_conteudo" style="width:972px">


<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="36"></td></tr>
<tr>
	<td width="50%" align="left"><span style="color:#A0C0DD; font-size:23px"><b>Berçario</b></span></td>
    <td width="50%" align="right">
    <form method="post" action="busca_bebe.php">
    	<table cellpadding="0" cellspacing="0">
        	<tr>
            	<td><span style="color:#A0C0DD; font-size:13px">Buscar Bebê:</span></td>
                <td width="4"></td>
                <td><input type="text" name="busca" style="width:200px; height:21px; border:1px solid #A0C0DD" /></td>
            </tr>
        </table>
	</form>        
    </td>
</tr>
<tr><td height="6"></td></tr>
<tr><td colspan="2" style="border-bottom:1px dotted #A0C0DD"></td></tr>
<tr><td height="4"></td></tr>
<tr><td ><span style="color:#A0C0DD; font-style:italic; font-size:12px">Clique sobre para ver mais detalhes e fotos.</span></td></tr>
</table>
    


<?php
$pega = mysql_query("SELECT * FROM bercario");
$conta = mysql_num_rows($pega);

//PAGINAÇÂO	

if(isset($_GET['pag']) && !empty($_GET['pag'])){
	$pag= $_GET['pag'];
} else {
	$pag=1;
}
$inicio = 0; $limite = 6;

if ($pag!=''){
	$inicio = ($pag - 1) * $limite;
}
//PAGINAÇÂO	

if($inicio==0){
	$ini = 1;	
} else {
	$ini = $inicio;		
}

?>

<table cellpadding="0" cellspacing="0">
<tr><td height="26"></td></tr>
<?php
$query = mysql_query("SELECT * FROM bercario ORDER BY data_nasc DESC LIMIT $inicio, $limite");
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


<?php
echo '<center>';
	echo '<table cellpadding="0" cellspacing="0" width="100%" >';
	echo '<tr><td height="20"></td></tr>';
	echo '<tr><td align="center">';
	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$paginacao='';		
			
    		$busca_total = mysql_query("SELECT COUNT(*) as total FROM bercario ORDER BY data_nasc DESC");
			$total = mysql_fetch_array($busca_total);
			$total = $total['total'];

			$prox = $pag + 1;
			$ant = $pag - 1;
			$ultima_pag = ceil($total / $limite);
			$penultima = $ultima_pag - 1;  
			$adjacentes = 2;
			
			
			
			if ($pag>1){ $paginacao = '<a href="bebes.php?pag='.$ant.'" title="Página Anterior" class="nex">&laquo;&nbsp;Anterior</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';}
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			if ($pag < $ultima_pag){
  						$paginacao .= '<a href="bebes.php?pag='.$prox.'" title="Próxima Página" class="nex">Próxima&nbsp;&raquo;</a>';
			}
  
				echo $paginacao;

				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	echo '</td></tr>';
	echo '</table>';
	echo '</center>';
?>



<script>
		$('html, body').animate({
			scrollTop: $('#meio_conteudo').offset().top
		}, 2000);
	</script>

<?php include("includes/rodape.php"); ?>
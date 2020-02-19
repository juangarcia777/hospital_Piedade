<?php include("includes/topo.php"); ?>

<div id="meio_conteudo" style="width:972px">


<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="36"></td></tr>
<tr><td><span style="color:#A0C0DD; font-size:23px"><b>Galeria de Imagens e Álbuns</b></span></td></tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted #A0C0DD"></td></tr>
</table>
   


<?php
$pega = mysql_query("SELECT * FROM albuns");
$conta = mysql_num_rows($pega);

//PAGINAÇÂO	

if(isset($_GET['pag']) && !empty($_GET['pag'])){
	$pag= $_GET['pag'];
} else {
	$pag=1;
}
$inicio = 0; $limite = 8;

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
$query = mysql_query("SELECT * FROM albuns ORDER BY id DESC LIMIT $inicio, $limite");
while($row = mysql_fetch_array($query)){
	
	$id_bebe = $row['id'];		
	
	$sele = mysql_query("SELECT * FROM fotos_albuns WHERE id_album='$id_bebe' ORDER BY RAND() LIMIT 1");
	
	if(mysql_num_rows($sele)){
		$ln = mysql_fetch_array($sele);
		$img = '<a href="galeria_detalhes.php?id='.$row['id'].'" title="Ver mais"><img src="thumbs.php?img=imagens/'.$ln['foto'].'&altura=111&largura=147" style="border: 5px solid #A0C0DD" ></a>';	
	} else {
		$img = '<a href="galeria_detalhes.php?id='.$row['id'].'" title="Ver mais"><img src="thumbs.php?img=imagens/vazio.jpg&altura=111&largura=147" style="border: 5px solid #A0C0DD" ></a>';	
	}
	
	echo '<tr>
		<td>'.$img.'</td>
		<td width="11"></td>
		<td valign="top">
			<table cellpadding="0" cellspacing="0">
				<tr><td height="8"></td></tr>
				<tr><td><span class="bb">'.$row['data'].'</span></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td><a  href="galeria_detalhes.php?id='.$row['id'].'" class="bb">'.$row['titulo'].'</a></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td><a  href="galeria_detalhes.php?id='.$row['id'].'" class="bb" style="font-size:12px;"><b>ver mais...</b></a></td></tr>
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
			
    		$busca_total = mysql_query("SELECT COUNT(*) as total FROM albuns ORDER BY id DESC");
			$total = mysql_fetch_array($busca_total);
			$total = $total['total'];

			$prox = $pag + 1;
			$ant = $pag - 1;
			$ultima_pag = ceil($total / $limite);
			$penultima = $ultima_pag - 1;  
			$adjacentes = 2;
			
			
			
			if ($pag>1){ $paginacao = '<a href="galeria.php?pag='.$ant.'" title="Página Anterior" class="nex">&laquo;&nbsp;Anterior</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';}
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			if ($pag < $ultima_pag){
  						$paginacao .= '<a href="galeria.php?pag='.$prox.'" title="Próxima Página" class="nex">Próxima&nbsp;&raquo;</a>';
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
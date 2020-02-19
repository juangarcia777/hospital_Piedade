<?php include("includes/topo.php"); ?>



<div id="meio_conteudo" style="width:972px">




<?php
$select  = mysql_query("SELECT Id, Nome FROM produto WHERE Nome LIKE '%$busca%' or Descricao LIKE '%$busca%'");
$quix = mysql_num_rows($select);

$select3  = mysql_query("SELECT Id, Titulo FROM noticia WHERE Titulo LIKE '%$busca%' or Corpo LIKE'%$busca%'");
$quix3 = mysql_num_rows($select3);

$qw = $quix+$quix3;
?>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="16"></td></tr>
<tr>
	<td width="50%" align="left"><span style="color:#A0C0DD; font-size:23px"><b>&raquo;&nbsp;Buscando por: </b><?php echo $busca; ?></span></td>
	<td width="50%" align="right"><span style="color:#999; font-size:13px">Resultados encontrados: <b><?php echo $qw; ?></b></span></td>    
</tr>
<tr><td height="6"></td></tr>
<tr><td colspan="3" style="border-bottom:1px dotted #A0C0DD"></td></tr>
<tr><td height="0"></td></tr>
</table>



<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="20"></td></tr>
<tr><td align="left"><span style="color:#A0C0DD; font-size:14px">&raquo;&nbsp;Resultados para Matérias:</span></td></tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted #A0C0DD"></td></tr>
<tr><td height="6"></td></tr>

<?php
while($ln = mysql_fetch_array($select)){
	echo '	
		<tr><td><a href="materias.php?id='.$ln['Id'].'" title="Veja Mais" class="df">&nbsp;&raquo;&nbsp;'.$ln['Nome'].'</a></td></tr>        
        <tr><td height="6"></td></tr>
        <tr><td style="border-bottom:1px dotted #e1e1e1"></td></tr>
        <tr><td height="6"></td></tr>
	';
	
}
?>
</table>



<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="34"></td></tr>
<tr><td align="left"><span style="color:#A0C0DD; font-size:14px">&raquo;&nbsp;Resultados para Notícias:</span></td></tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted #A0C0DD"></td></tr>
<tr><td height="6"></td></tr>
<?php
while($ln = mysql_fetch_array($select3)){
	echo '	
		<tr><td><a href="noticias.php?id='.$ln['Id'].'" title="Veja Mais" class="df">&nbsp;&raquo;&nbsp;'.$ln['Titulo'].'</a></td></tr>        
        <tr><td height="6"></td></tr>
        <tr><td style="border-bottom:1px dotted #e1e1e1"></td></tr>
        <tr><td height="6"></td></tr>
	';
	
}
?>
</table>

</div>




<script>
		$('html, body').animate({
			scrollTop: $('#meio_conteudo').offset().top
		}, 2000);
	</script>

<?php include("includes/rodape.php"); ?>

<?php include("includes/topo.php"); ?>


<script>
$(document).ready(function() {
	$().piroBox_ext({
	piro_speed : 700,
		bg_alpha : 0.5,
		piro_scroll : true // pirobox always positioned at the center of the page
	});
});
</script>




<div id="meio_conteudo" style="width:972px">


<?php
$query = mysql_query("SELECT * FROM albuns WHERE id='$id' LIMIT 1");
$row = mysql_fetch_array($query);
		


echo '
<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="36"></td></tr>
<tr><td width="90%" align="left"><span style="font-size:22px; color:#A0C0DD"><b>'.$row['titulo'].'</b></span></td>
<td align="right" width="10%"><span style="font-size:15px; color:#A0C0DD">'.$row['data'].'</span></td>
</tr>
<tr><td height="6"></td></tr>
<tr><td colspan="2" style="border-bottom:1px dotted #A0C0DD"></td></tr>
</table>
    
<table cellpadding="0" cellspacing="0">
<tr><td height="26"></td></tr>	
<tr>	
';

		
	$sele = mysql_query("SELECT * FROM fotos_albuns WHERE id_album='$id' ORDER BY id DESC");
	
if(mysql_num_rows($sele)){
	$i=0;
while($ln = mysql_fetch_array($sele)){

$img = '<a href="imagens/'.$ln['foto'].'" rel="gallery"  class="pirobox_gall"><img src="thumbs.php?img=imagens/'.$ln['foto'].'&altura=97&largura=134" style="border: 4px solid #A0C0DD" ></a>';	

if($i==6){echo '</tr><tr><td height="11"></td></tr><tr>'; $i=0;}

echo '<td>'.$img.'</td>';
echo '<td width="11"></td>';

$i++;	
}
}	
?>
</tr>
</table>




<script>
		$('html, body').animate({
			scrollTop: $('#meio_conteudo').offset().top
		}, 2000);
	</script>



<?php include("includes/rodape.php"); ?>
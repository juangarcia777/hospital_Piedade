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



    
<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="26"></td></tr>
<tr><td><span style="color:#A0C0DD; font-size:23px"><b>Parceiros</b></span></td></tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted #A0C0DD"></td></tr>
</table>

    
<table cellpadding="0" cellspacing="0" style="margin-left:20px">
<tr><td height="26"></td></tr>	
<tr>	

<?php		

$sele = mysql_query("SELECT * FROM parceiros ORDER BY id DESC");
	
if(mysql_num_rows($sele)){
	$i=0;
while($ln = mysql_fetch_array($sele)){

$img = '<a href="imagens/'.$ln['foto'].'" rel="gallery"  class="pirobox_gall"><img src="thumbs.php?img=imagens/'.$ln['foto'].'&altura=180&largura=180" style="border: 4px solid #A0C0DD" ></a>';	

if($i==4){echo '</tr><tr><td height="33"></td></tr><tr>'; $i=0;}

echo '<td>
	<table cellpadding="0" cellspacing="0">
		<tr><td>'.$img.'</td></tr>
		<tr><td height="9"></td></tr>
		<tr><td><span style="font-size:13px; color:#A0C0DD">&bull;&nbsp;'.$ln['nome'].'</span></td></tr>
	</table>
</td>';
echo '<td width="20"></td>';

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
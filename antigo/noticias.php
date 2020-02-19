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
if(isset($_GET['id'])){
$peg = mysql_query("SELECT * FROM noticia WHERE Id='$id' LIMIT 1");	
$row = mysql_fetch_array($peg);	
?>	


<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="36"></td></tr>
<tr>
	<td align="left"><span style="color:#A0C0DD; font-size:21px"><b><?php echo $row['Titulo']; ?></b></span></td>
    <td align="right"><span style="color:#A0C0DD; font-size:21px"><b><?php echo $row['Data']; ?></b></span></td>
 </tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted #A0C0DD"></td></tr>
</table>
    

<table cellpadding="0" cellspacing="0" width="100%" id="vem">

<?php
if(isset($_GET['id'])){
$peg = mysql_query("SELECT * FROM noticia WHERE Id='$id' LIMIT 1");	
} else {
$peg = mysql_query("SELECT * FROM noticia ORDER BY Id DESC LIMIT 1");	
}

if(mysql_num_rows($peg)){
	
	$row = mysql_fetch_array($peg);
	
	$id = $row['Id'];
	
					if(!empty($row['Url'])){
						$img = '<a href="imagens/'.$row['Url'].'" rel="gallery"  class="pirobox_gall"><img src="thumbs.php?img=imagens/'.$row['Url'].'&largura=200&altura=220" style="border:1px solid #e1e1e1; margin-right:8px" align="left"></a>';
												
						
					} else {
						
						$img = '';
						
					}

	

	
}
?>
</table>    
    
    <table cellpadding="0" cellspacing="0">
    	<tr>        	
            <td valign="top">
        	<table cellpadding="0" cellspacing="0">                
                <tr><td height="17"></td></tr>
        		<tr><td>
                <?php
                	echo $img;
				?>
                <span style="color:#666666; font:14px/19px Tahoma, Geneva, sans-serif; "><?php echo nl2br($row['Corpo']); ?></span></td></tr>
                
            </table>
            </td>
        </tr>
        
    </table>




<table cellpadding="0" cellspacing="0" width="100%">
    	<tr><td height="45"></td></tr>
		<tr><td><span style="color:#A0C0DD; font-size:19px"><b>:: Veja Mais Notícias</b></span></td></tr>
		        <tr><td height="4"></td></tr>
        <tr><td style="border-bottom:1px dotted #11212E"></td></tr>
        <tr><td height="10"></td></tr>        

		
		<?php	    	
			$pega = mysql_query("SELECT * FROM noticia WHERE Id!='$id' ORDER BY Id DESC");
			while($ln = mysql_fetch_array($pega)){
		?>	
        
        <tr><td><a href="noticias.php?id=<?php echo $ln['Id']; ?>#vem" title="Veja Mais" class="df" style="color:#11212E">&nbsp;&raquo;&nbsp;<?php echo ($ln['Titulo']); ?></a></td></tr>        
        <tr><td height="6"></td></tr>
        <tr><td style="border-bottom:1px dotted #e1e1e1"></td></tr>
        <tr><td height="6"></td></tr>
        <?php
			}
		?>
        
    </table>



<?php
}else {
?>

<table cellpadding="0" cellspacing="0" width="100%">
    	<tr><td height="45"></td></tr>
		<tr><td><span style="color:#A0C0DD; font-size:19px"><b>:: Notícias Hospital Piedade</b></span></td></tr>
		        <tr><td height="4"></td></tr>
        <tr><td style="border-bottom:1px dotted #11212E"></td></tr>
        <tr><td height="10"></td></tr>        

		
		<?php	    	
			$pega = mysql_query("SELECT * FROM noticia WHERE Id!='$id' ORDER BY Id DESC");
			while($ln = mysql_fetch_array($pega)){
		?>	
        
        <tr><td><a href="noticias.php?id=<?php echo $ln['Id']; ?>#vem" title="Veja Mais" class="df" style="color:#11212E">&nbsp;&raquo;&nbsp;<?php echo ($ln['Titulo']); ?></a></td></tr>        
        <tr><td height="6"></td></tr>
        <tr><td style="border-bottom:1px dotted #e1e1e1"></td></tr>
        <tr><td height="6"></td></tr>
        <?php
			}
		?>
        
    </table>


<?php
}
?>




<script>
		$('html, body').animate({
			scrollTop: $('#meio_conteudo').offset().top
		}, 2000);
	</script>



<?php include("includes/rodape.php"); ?>
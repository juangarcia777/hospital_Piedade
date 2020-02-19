<?php include("includes/topo.php"); ?>

<div id="meio_conteudo" style="width:972px">

<?php
if(isset($_GET['id'])){
$peg = mysql_query("SELECT * FROM produto WHERE Id='$id' LIMIT 1");	
} else {
$peg = mysql_query("SELECT * FROM produto ORDER BY Id DESC LIMIT 1");	
}

	$row = mysql_fetch_array($peg);
?>


<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="36"></td></tr>
<tr><td><span style="color:#A0C0DD; font-size:23px"><b><?php echo $row['Nome']; ?></b></span></td></tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted #A0C0DD"></td></tr>
</table>
    
<table cellpadding="0" cellspacing="0" width="100%" >

<?php
if(isset($_GET['id'])){
$peg = mysql_query("SELECT * FROM produto WHERE Id='$id' LIMIT 1");	
} else {
$peg = mysql_query("SELECT * FROM produto ORDER BY Id DESC LIMIT 1");	
}

if(mysql_num_rows($peg)){
	
	$row = mysql_fetch_array($peg);
	
	$id = $row['Id'];
	
					if(!empty($row['Preco'])){
						$img = '<a href="imagens/'.$row['Preco'].'" rel="gallery"  class="pirobox_gall"><img src="thumbs.php?img=imagens/'.$row['Preco'].'&largura=400&altura=300" style="border:1px solid #e1e1e1; margin-right:8px" align="left"></a>';
												
						
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
                <span style="color:#666666; font:12px/17px Tahoma, Geneva, sans-serif; "><?php echo nl2br($row['Descricao']); ?></span></td></tr>
                
            </table>
            </td>
        </tr>
        
    </table>








<script>
		$('html, body').animate({
			scrollTop: $('#meio_conteudo').offset().top
		}, 2000);
	</script>



<?php include("includes/rodape.php"); ?>
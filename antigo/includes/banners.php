<script type="text/javascript">
$('#banners').cycle({ 
    fx:     'fade', 
    speed:  'slow', 
    timeout: 4000, 
    next:   '#next_foto_noticia_aha', 
    prev:   '#prev_foto_noticia_aha' 
});
</script>


<div id="banners">
 <?php
					$consulta = mysql_query("SELECT * FROM banners ORDER BY id DESC LIMIT 3");
					if(mysql_num_rows($consulta)){
						while($ln = mysql_fetch_array($consulta)){
							
							echo '<img src="thumbs.php?img=imagens/'.$ln['banner'].'&altura=300&largura=995&roundx=1">';
							
						}
					}
?>
</div>
<?php include("includes/topo.php"); ?>


<div id="fb-root"></div>

<script type="text/javascript">
window.fbAsyncInit = function () {
	FB.init({
		appId  : '496444283785979',
		status : true, // check login status
		cookie : true, // enable cookies to allow the server to access the session
		xfbml  : true,  // parse XFBML
		oauth  : true // enable OAuth 2.0
	});
};

(function() {
	var e = document.createElement('script');
	e.src = document.location.protocol + '//connect.facebook.net/pt_BR/all.js';
	e.async = true;
	document.getElementById('fb-root').appendChild(e);
}());
</script>


<script type="text/javascript">
function lala(n,c,d){
	//e.preventDefault();
	FB.ui({
		method: 'feed',
		name: n,
		link: 'http://www.hpiedade.com.br/detalhes_bebe.php?id='+d,
		picture: 'http://www.hpiedade.com.br/imagens/'+c,
		caption: 'Hospital Nossa Senhora da Piedade',
		description: 'http://www.hpiedade.com.br/'
	});
};
</script>

<script>
$(document).ready(function() {
	$().piroBox_ext({
	piro_speed : 700,
		bg_alpha : 0.5,
		piro_scroll : true // pirobox always positioned at the center of the page
	});
});
</script>

<?php
$hoje = date("d/m/Y");
if(isset($_GET['action']) && $_GET['action']==1){

	if(!empty($nome) && !empty($mensagem)){
		
		$grava = mysql_query("INSERT INTO recados (id_bercario, mensagem, ativo, nome, data) VALUES ('$id', '$mensagem', '0', '$nome', '$hoje')");
		echo '<script>alert("Recado enviado com sucesso. Aguarde liberaçao pelo moderador.");</script>';	
			
	} else {
		echo '<script>alert("Erro: Preencha os campos nome e mensagem e tente novamente.");</script>';	
	}

}
?>


<div id="meio_conteudo" style="width:972px">


<?php
$query = mysql_query("SELECT * FROM bercario WHERE id='$id' LIMIT 1");
$row = mysql_fetch_array($query);
		
		
		if($row['sexo']=='f' || $row['sexo']=='F'){
			$cor = '#D8A9CA';	
		} else {
			$cor = '#A0C0DD';	
		}



echo '
<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="36"></td></tr>
<tr><td><span style="color:'.$cor.'; font-size:23px"><b>Detalhes do Bebe</b></span></td></tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted '.$cor.'"></td></tr>
</table>
    
<table cellpadding="0" cellspacing="0">
<tr><td height="26"></td></tr>		
';

		
	$sele = mysql_query("SELECT * FROM foto_bercario WHERE id_bercario='$id' ORDER BY RAND() LIMIT 1");
	
	if(mysql_num_rows($sele)){
		$ln = mysql_fetch_array($sele);
		$id_foto1 = $ln['id'];
		$img = '<a href="imagens/'.$ln['foto'].'" rel="gallery"  class="pirobox_gall"><img src="thumbs.php?img=imagens/'.$ln['foto'].'&altura=232&largura=308" style="border: 8px solid '.$cor.'" ></a>';	
	} else {
		$id_foto1 = 0;
		$img = '<a href="imagens/'.$ln['foto'].'" rel="gallery"  class="pirobox_gall"><img src="thumbs.php?img=imagens/vazio.jpg&altura=232&largura=308" style="border: 8px solid '.$cor.'" ></a>';	
	}
	
	echo '<tr>
		<td valign="top">
			<table cellpadding="0" cellspacing="0">
				<tr><td>'.$img.'</td></tr>
				<tr><td height="6"></td></tr>
				<tr><td align="center">';
		?>
 
  
  <?php 
  echo '
  </td></tr>
			</table>
		</td>
		<td width="11"></td>
		<td valign="top">
			<table cellpadding="0" cellspacing="0">
				<tr><td height="13"></td></tr>
				<tr><td align="left"><span class="bb" style="color:'.$cor.'">'.data_mysql_para_user($row['data_nasc']).'</span></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td align="left"><a style="color:'.$cor.'" href="#" class="bb">'.$row['nome_crianca'].'</a></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td align="left"><span class="bb" style="color:'.$cor.'"><b>Pai:</b> '.$row['nome_pai'].'</span></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td align="left"><span class="bb" style="color:'.$cor.'"><b>Mae:</b> '.$row['nome_mae'].'</span></td></tr>
				<tr><td height="12"></td></tr>
				<tr><td align="left"><span class="bb2" style="color:'.$cor.'">'.nl2br($row['observacoes']).'</span></td></tr>
				<tr><td height="16"></td></tr>
				<tr><td>
				<table cellpadding="0" cellspacing="0">
				<tr>
	';
	
		$sele2 = mysql_query("SELECT * FROM foto_bercario WHERE id_bercario='$id' and id!='$id_foto1' ORDER BY RAND() LIMIT 5");
		while($op = mysql_fetch_array($sele2)){
			$img2 = '<a href="imagens/'.$op['foto'].'" rel="gallery"  class="pirobox_gall"><img src="thumbs.php?img=imagens/'.$op['foto'].'&altura=68&largura=102" style="border: 3px solid '.$cor.'" ></a>';
			echo '<td>'.$img2.'</td>';
			echo '<td width="5"></td>';
		}
	echo '			
	</tr>	
	</table>
				</td></tr>
			</table>
		</td>
	</tr>';
	echo '<tr><td height="12"></td></tr>';
?>
 <tr><td></td><td></td><td><a href="javascript:lala('<?php echo $row['nome_crianca']; ?>', '<?php echo $ln['foto']; ?>', '<?php echo $id; ?>');"><img title="Compartilhar no Facebook" src="interface/comp.png" /></a></td></tr>

</table>



<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="50"></td></tr>
<tr><td><span style="color:<?php echo $cor; ?>; font-size:18px"><b>:: Últimos Recados</b></span></td></tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted <?php echo $cor; ?>;"></td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="16"></td></tr>
<?php
$query2 = mysql_query("SELECT * FROM recados WHERE id_bercario='$id' and ativo='1' LIMIT 20");
if(mysql_num_rows($query2)){
while($row2 = mysql_fetch_array($query2)){
		
	echo '<tr><td align="left"><span class="bb3" style="color:'.$cor.'">Em '.$row2['data'].', '.$row2['nome'].' escreveu:</span></td></tr>';	
	echo '<tr><td height="4"></td></tr>';	
	echo '<tr><td align="left"><span class="bb4">'.nl2br($row2['mensagem']).'</span></td></tr>';
	echo '<tr><td height="22"></td></tr>';
}	
} else {
	
	echo '<tr><td align="left"><span class="bb4">Nenhum recado encontrado para este nascimento.</span></td></tr>';	
	
}
?>
</table>


<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="30"></td></tr>
<tr><td><span style="color:<?php echo $cor; ?>; font-size:18px"><b>:: Deixe sua mensagem</b></span></td></tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted <?php echo $cor; ?>;"></td></tr>
<tr><td height="15"></td></tr>
</table>

<form method="post" action="detalhes_bebe.php?action=1&id=<?php echo $id; ?>">
<table cellpadding="0" cellspacing="0" >
<tr><td><span class="bb4">Nome:</span></td></tr>
<tr><td height="1"></td></tr>
<tr><td><input type="text" name="nome" style="width:300px; height:22px;" /></td></tr>
<tr><td height="8"></td></tr>
<tr><td><span class="bb4">Mensagem:</span></td></tr>
<tr><td height="1"></td></tr>
<tr><td><textarea name="mensagem" style="width:300px; height:70px;" /></textarea></td>
<td width="5"></td>
<td valign="bottom"><input type="image" src="interface/qq.jpg" /></td>
</tr>
</table>
</form>



<script>
		$('html, body').animate({
			scrollTop: $('#meio_conteudo').offset().top
		}, 2000);
	</script>



<?php include("includes/rodape.php"); ?>
<?php include("includes/topo.php"); ?>


<?php
if(isset($_GET['action']) && $_GET['action']==1){
	
	if(!empty($nome) && !empty($mensagem)){
		
		
		
		$msg_email = '
			<table cellpadding="0" cellspacing="0">
				<tr><td><span style="font-size:18px">Mensagem recebida através do Site</span></td></tr>
				<tr><td height="20"></td></tr>
			</table>	
			<table cellpadding="0" cellspacing="0">
				<tr><td><span style="font-size:14px"><b>Nome:</b></span></td><td><span style="font-size:14px">'.$nome.'</span></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td><span style="font-size:14px"><b>Descriçao:</b></span></td><td><span style="font-size:14px">'.$mensagem.'</span></td></tr>
				<tr><td height="25"></td></tr>
				<tr><td colspan="2"><span style="font-size:13px; color:#666">Mensagem enviada automanticamente pelo site. Por favor nao responda.</span></td></tr>
			</table>
		';
		
		
				$subject = "Nova Mensagem - Enviado pelo Site Assoc. Ben. Nossa Senhora da Piedade";
				
				$to = 'administracao@hpiedade.com.br';
				
				/////////////////////////////////////////////////////
				//Envia o email do pedido para a Isabella Ceschini
				require_once 'smtp.php';
				
				$mail2 = new SMTP;
				$mail2->From('contato@hpiedade.com.br');
				$mail2->AddTo($to);
				$mail2->Html($msg_email);
				$sent2 = $mail2->Send($subject);
				
			echo '<script>alert("Mensagem enviado com sucesso. Obrigado");</script>';		
		
		
	} else {
		
		echo '<script>alert("Erro: Preencha os campos e tente novamente.");</script>';	
		
	}

}

?>



<div id="meio_conteudo">


<div id="p1">
	
    
    
    
<table cellpadding="0" cellspacing="0" width="100%">

<tr><td><span style="color:#A0C0DD; font-size:23px"><b>Notícias</b></span></td></tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted #A0C0DD"></td></tr>
</table>
<table cellpadding="0" cellspacing="0" width="100%">
        			<tr><td height="16"></td></tr>
                    <?php
						$query = mysql_query("SELECT Id, Titulo, Corpo, Url, Data FROM noticia ORDER BY Id DESC LIMIT 6");
						while($row = mysql_fetch_array($query)){
							
							if(!empty($row['Url'])){
								$img = '<a href="noticias.php?id='.$row['Id'].'" title="Ver mais"><img src="thumbs.php?img=imagens/'.$row['Url'].'&altura=86&largura=120" ></a>';	
							} else {
								$img = '<a href="noticias.php?id='.$row['Id'].'" title="Ver mais"><img src="thumbs.php?img=imagens/vazio.jpg&altura=86&largura=92" ></a>';	
							}
							
							$texto = strip_tags($row['Corpo']);
							$texto =  substr($texto, 0,250).'...';
							
							
							$ti = substr($row['Titulo'],0,50).'...';
							
							echo '<tr>';
							echo '<td>'.$img.'</td>';
							echo '<td width="14"></td>';
							echo '<td valign="top">
								<table cellpadding="0" cellspacing="0" width="530">
									<tr><td height="11"></td></tr>
									<tr><td>
										<span style="color:#666666; font-size:13px"><b>'.$ti.'</b></span>
										<span style="color:#666666; font-size:13px; float:right"><b>'.$row['Data'].'</b></span>	
									</td>
									</tr>
									<tr><td height="4"></td></tr>
									<tr><td style="border-bottom:1px solid #A0C0DD"></td></tr>
									<tr><td height="4"></td></tr>
									<tr><td><a href="noticias.php?id='.$row['Id'].'" class="var2" title="Ver mais">'.$texto.'</a></td></tr>
									
								</table>
							</td>';
							echo '</tr>';
							
							echo '<tr><td height="12"></td></tr>';
							
						}	
					?>
                                        
</table>    


<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="14"></td></tr>
<tr>
	<td align="right"><a href="noticias.php" style="color:#A0C0DD; font-size:14px"><b>ver todas as notícias</b></a></td>
</tr>
</table>
    
</div>


<div id="p2">

<table cellpadding="0" cellspacing="0" width="163" style="margin-left:74px">
<tr><td height="12"></td></tr>
<tr><td><span style="color:#A0C0DD; font:18px/27px Arial, Helvetica, sans-serif;"><b>Álbuns de Fotos</b></span></td></tr>
<tr><td height="2"></td></tr>
<tr><td style="border-bottom:1px dotted #A0C0DD"></td></tr>
<tr><td height="7"></td></tr>
</table>	

<div style="width:174px; height:345px; float:left; margin-left:53px">
<table cellpadding="0" cellspacing="0">
<tr><td height="10"></td></tr>
<?php 
$query = mysql_query("SELECT * FROM albuns ORDER BY id DESC LIMIT 3");	
$i=1;
while($row = mysql_fetch_array($query)){
	$id = $row['id'];
	$peg = mysql_query("SELECT foto FROM fotos_albuns WHERE id_album='$id' and foto!='' ORDER BY RAND() LIMIT 1");
	if(mysql_num_rows($peg)){
		$ln = mysql_fetch_array($peg);
		echo '<tr>
		<td><span style="color:#A0C0DD; font-size:27px">'.$i.'&deg;</span></td>
		<td width="12"></td>
		<td><a href="galeria_detalhes.php?id='.$row['id'].'" title="Ver mais"><img src="thumbs.php?img=imagens/'.$ln['foto'].'&altura=72&largura=142&round=1" ></a></td></tr>';		
		
		
		echo '<tr><td height="15"></td></tr>';
		$i++;
	}	
}
?>
<tr><td height="6"></td></tr>
<tr><td align="right" colspan="3"><a href="galeria.php" style="color:#A0C0DD; font-size:12px; text-decoration:underline"><b>ver todos os álbuns...</b></a></td></tr>
</table>
</div>


<div style="width:226px; height:310px; float:left; margin-left:15px;  margin-top:20px">
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FHospitalNossaSenhoraPiedade&amp;width=226&amp;height=310&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=389279767869830" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:226px; height:310px;" allowTransparency="true"></iframe>

</div>



</div>








<?php include("includes/rodape.php"); ?>
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
				<tr><td><span style="font-size:14px"><b>Assunto:</b></span></td><td><span style="font-size:14px">'.$assunto.'</span></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td><span style="font-size:14px"><b>Telefone:</b></span></td><td><span style="font-size:14px">'.$telefone.'</span></td></tr>
				<tr><td height="9"></td></tr>
				<tr><td><span style="font-size:14px"><b>Email:</b></span></td><td><span style="font-size:14px">'.$email.'</span></td></tr>
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



<div id="meio_conteudo" style="width:972px">


<table cellpadding="0" cellspacing="0" width="100%">
<tr><td height="36"></td></tr>
<tr><td><span style="color:#A0C0DD; font-size:23px"><b>Contato</b></span></td></tr>
<tr><td height="6"></td></tr>
<tr><td style="border-bottom:1px dotted #A0C0DD"></td></tr>
</table>


<form method="post" action="?action=22">
<table cellpadding="0" cellspacing="0" align="left">
<tr><td height="20"></td></tr>
<tr><td>

<table cellpadding="0" cellspacing="0">
<tr><td><span class="uiyre">*Nome</span></td></tr>
<tr><td height="1"></td></tr>
<tr><td><input type="text" name="nome" style="width:600px; height:29px" /></td></tr>
<tr><td height="15"></td></tr>
<tr><td><span class="uiyre">Assunto</span></td></tr>
<tr><td height="1"></td></tr>
<tr><td><input type="text" name="assunto" style="width:600px; height:29px" /></td></tr>
<tr><td height="15"></td></tr>
</table>

<table cellpadding="0" cellspacing="0">
<tr>
	<td><span class="uiyre">Telefone</span></td>
	<td width="10"></td>
    <td><span class="uiyre">Email</span></td>    
</tr>
<tr><td height="1"></td></tr>
<tr>
	<td><input type="text" name="telefone" style="width:293px; height:29px" /></td>
    <td width="10"></td>
    <td><input type="text" name="email" style="width:293px; height:29px" /></td>
</tr>
</table>

<table cellpadding="0" cellspacing="0">
<tr><td height="15"></td></tr>
<tr><td><span class="uiyre">*Mensagem</span></td></tr>
<tr><td height="1"></td></tr>
<tr><td><textarea name="mensagem" style="width:600px; height:150px" /></textarea></td></tr>
</table>

<table cellpadding="0" cellspacing="0">
<tr><td height="15"></td></tr>
<tr><td><input type="image" src="interface/aa.jpg" /></td></tr>
</table>



</td></tr>
</table>

</form>

    

<script>
		$('html, body').animate({
			scrollTop: $('#meio_conteudo').offset().top
		}, 2000);
	</script>


<?php include("includes/rodape.php"); ?>
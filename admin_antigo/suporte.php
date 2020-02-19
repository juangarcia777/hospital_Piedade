<?php include ("includes/topo.php"); ?>

<?php
$b=0;
$x=0;


//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==1){
		
		
	if(!empty($nome) && !empty($historia)){
							
			
		echo '<script>alert("Mensagem enviada com sucesso. Obrigado");</script>';
			
	} else {
		
		$b=1;
		echo '<script>alert("Erro: Preencha os campos e tente novamente.");</script>';
		
	}

}
?>





<form method="post" action="?action=1">
<table cellpadding="0" cellspacing="0" width="100%">
<tr><td align="left"><span class="titu">Suporte - Le&atilde;o da Web</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="12"></Td></tr>
<tr><td><span class="tex2">Seu Nome/Nome da Empresa:</span> <span class="obs"><b>Seu nome e da empresa.</b></span></td></tr>
<tr><td height="4"></td><tr>
<tr><td align="center">
				<input type="text" name="nome" class="grande">			
			</td></tr>
<tr><Td height="12"></Td></tr>
<tr><td><span class="tex2">Mensagem:</span> <span class="obs"><b>Mande-nos sua dúvida, sugestão ou opnião sobre o sistema.</b></span></td></tr>
<tr><td height="4"></td><tr>
<tr><td align="center">
				<textarea name="historia" class="grau">
				
				</textarea>
			</td></tr>
			
			<tr><td height="8"></td><tr>
<tr><td colspan="9" align="center">

	<input type="submit" value="ENVIAR" class="gra">
	

</td></tr>
</table>
</form>









<?php include ("includes/rodape.php"); ?>
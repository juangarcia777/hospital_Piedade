<?php include ("includes/topo.php"); ?>

<?php
$b=0;
$x=0;


//FAZ A INSERÇAO NO BANCO DE DADOS
if(isset($_GET['action']) && $_GET['action']==22){
		
	// Caminho para onde o arquivo será enviado
	$caminho = "../imagens/";
	include("funcao_upload_fotos.php");
	
	
	if($resposta==1){
		$grava = mysql_query("INSERT INTO imagens (Url) VALUES ('$nm_new')");	
		echo '<script>alert("Imagem adicionada com sucesso.");</script>';
	}
		
	
	
	
	
	
} else if(isset($_GET['action']) && $_GET['action']==3){
	
	$exclui = mysql_query("DELETE FROM imagens WHERE Id='$id' LIMIT 1");
	echo '<script>alert("Item excluído com sucesso.");</script>';
	



} else if(isset($_GET['action']) && $_GET['action']==4){
	
	if(!empty($nome)){
			
		$grava = mysql_query("UPDATE entidade SET Nome='$nome', Institucional='$institucional', Historia='$historia' LIMIT 1");	
			
		echo '<script>alert("Item alterado com sucesso.");</script>';
			
	} else {
		
		$x=1;
		$b=1;
		echo '<script>alert("Erro: Preencha o texto.");</script>';
		
	}
	
}

	$select = mysql_query("SELECT * FROM entidade LIMIT 1");
	$ln = mysql_fetch_array($select);
	$nome = $ln['Nome'];
	$institucional = $ln['Institucional'];
	$historia = $ln['Historia'];
?>





<form method="post" action="?action=4">
<table cellpadding="0" cellspacing="0" width="100%">
<tr><td align="left"><span class="titu">Textos - Sobre - História - Missao da Empresa</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="12"></Td></tr>
<tr><td><span class="tex2">NOME DA EMPRESA:</span> <span class="obs"><b>Muito cuidado ao Alterar.</b></span></td></tr>
<tr><td height="4"></td><tr>
<tr><td align="center">
				<input type="text" name="nome" class="grande" value="<?php echo ($nome); ?>">			
			</td></tr>
			
			<tr><td height="8"></td><tr>
<tr><Td height="12"></Td></tr>
<tr><td><span class="tex2">TEXTO INSTITUCIONAL:</span> <span class="obs"><b>Aqui voce deve descrever a Missao, Visao e Valores da sua empresa.</b></span></td></tr>
<tr><td height="4"></td><tr>
<tr><td align="center">
				<textarea name="institucional" class="grau">
				<?php echo ($institucional); ?>
				</textarea>
			</td></tr>
			
			<tr><td height="8"></td><tr>


<tr><Td height="12"></Td></tr>
<tr><td><span class="tex2">TEXTO HISTÓRIA:</span> <span class="obs"><b>Aqui voce deve descrever a história da sua empresa.</b></span></td></tr>
<tr><td height="4"></td><tr>
<tr><td align="center">
				<textarea name="historia" class="grau">
				<?php echo ($historia); ?>
				</textarea>
			</td></tr>
			
			<tr><td height="8"></td><tr>
<tr><td colspan="9" align="center">

	<input type="submit" value="ALTERAR" class="gra">
	

</td></tr>
</table>
</form>







<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="60"></Td></tr>
<tr>
<td align="right"><span class="titu">Fotos da Empresa (Fachada, Internas) ::</span></td>
</tr>
<tr><Td height="4"></Td></tr>
<tr><Td colspan="2" style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<form method="post" action="?action=22" enctype="multipart/form-data">	
<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Imagem:</span><span class="obs"><b> (* Somente imagens JPG. Nao envie imagens muito grandes. Caso ela seja grande será automaticamente redimensionada)</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="file" style="width:850px; background-color:#FFC" class="gra" name="imagem" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td colspan="9" align="center">
<input type="submit" value="CADASTRAR" class="gra">
</td></tr>
<tr><Td height="16"></Td></tr>
</table>
</form>





<table cellpadding="0" cellspacing="0" width="100%">
<tr><Td height="30"></Td></tr>
<tr><td align="right"><span class="titu">Fotos Cadastradas ::</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<center>
<?php

$pega2 = mysql_query("SELECT * FROM imagens ORDER BY Id DESC");
		 	
			if(mysql_num_rows($pega2)){
				
				echo '<table cellpadding="0" cellspacing="0"><tr><Td height="18"></Td></tr><tr>';
				$i=0;
				while($row2 = mysql_fetch_array($pega2)){
					
					if($i==5){$i=0; echo '</tr><tr><td height="16"></td></tr><tr>';}
					
					
						echo '<td align="center" valign="top">
						
						<img src="../thumbs.php?img=imagens/'.$row2['Url'].'&altura=70&largura=100" style="border:1px solid black"><br>
						
						<a href="?action=3&id='.$row2['Id'].'" >[exlcuir foto]</a>
						
						
						</td><td width="9"></td>';
						
					
					$i++;
					
				}
				
						echo '</tr></table>';

			} else {
				
				echo '<table cellpadding="0" cellspacing="0"><tr><Td height="12"></Td></tr><tr><td><span style="font-size:13px">Nenhum item encontrado.</span></td></tr></table>';
				
			}
?>
</center>



<?php include ("includes/rodape.php"); ?>
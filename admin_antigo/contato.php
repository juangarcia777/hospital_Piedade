<?php include ("includes/topo.php"); ?>

<?php
$b=0;
$x=0;

	
//FAZ A ALTERAÇAO NO BANCO DE DADOS		
if(isset($_GET['action']) && $_GET['action']==4){
	
	if(!empty($endereco)){
			
		$grava = mysql_query("UPDATE endereco SET Endereco='$endereco', Bairro='$bairro', Cidade='$cidade', Estado='$estado', CEP='$cep', Telefone='$telefone'  LIMIT 1");	
			
		echo '<script>alert("Item alterado com sucesso.");</script>';
			
	} else {
		
		$x=1;
		$b=1;
		echo '<script>alert("Erro: Preencha os campos e tente novamente.");</script>';
		
	}
	
}


$select = mysql_query("SELECT * FROM endereco LIMIT 1");
	$ln = mysql_fetch_array($select);
	
	$endereco = $ln['Endereco'];
	$bairro = $ln['Bairro'];
	$cidade = $ln['Cidade'];
	$estado = $ln['Estado'];
	$cep = $ln['CEP'];
	$telefone = $ln['Telefone'];
	
	
?>


<form method="post" action="?action=4">	

<table cellpadding="0" cellspacing="0" width="100%">
<tr><td><span class="titu">:: Alteração de dados da Empresa</span></td></tr>
<tr><Td height="4"></Td></tr>
<tr><Td style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="4"></Td></tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%" >
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Endereço:</span><span class="obs"> (* Endereço da empresa)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="endereco" value="<?php echo ($endereco); ?>" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Bairro:</span><span class="obs"> (* Bairro da empresa)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="bairro" value="<?php echo ($bairro); ?>" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Cidade:</span><span class="obs"> (* Cidade da empresa)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="cidade" value="<?php echo ($cidade); ?>" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Estado:</span><span class="obs"> (* Estado da empresa)</span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="estado" value="<?php echo ($estado); ?>" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">CEP:</span><span class="obs"> (* CEP da empresa) - <b>Digite somente números sem espaço. O sistema adicionará o restante.</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande"  name="cep" maxlength="9"  value="
<?php 
$cep = str_replace('.', '',$cep);
$cep = str_replace('-', '',$cep);

$a1 = substr($cep, 0,2).'.';
$a2 = substr($cep, 2,3).'-';
$a3 = substr($cep, 5,3);
echo $a1.$a2.$a3; 
?>" /></td></tr>
<tr><Td height="8"></Td></tr>
<tr><td><span class="tex2">Telefone:</span><span class="obs"> (* Telefone da empresa <b>com DDD</b>) - <b>Digite somente n&uacute;meros sem espa&ccedil;o. O sistema adicionar&aacute; o restante.</b></span></td></tr>
<tr><Td height="3"></Td></tr>
<tr><td colspan="5"><input type="text" class="grande" name="telefone" value="
<?php
$telefone = str_replace('(', '',$telefone);
$telefone = str_replace(')', '',$telefone);
$telefone = str_replace('-', '',$telefone);
$telefone = str_replace(' ', '',$telefone);

$a11 = '('.substr($telefone, 0,2).') ';
$a22 = substr($telefone, 2,4).'-';
$a33 = substr($telefone, 6,4);
echo $a11.$a22.$a33;
?>" /></td></tr>
<tr><td height="19"></td><tr>
<tr><td colspan="9" align="center">
<input type="submit" value="ALTERAR" class="gra">
	
</td></tr>
</table>
</form>


<?php include ("includes/rodape.php"); ?>
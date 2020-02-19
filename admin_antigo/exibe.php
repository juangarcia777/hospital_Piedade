<?php include ("includes/topo.php"); ?>

<?php
$sele = mysql_query("SELECT * FROM cliente WHERE Id='$id' LIMIT 1");
$linha = mysql_fetch_array($sele);
?>




<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left"><span class="titu">:: Ficha Paciente</span></td>
</tr>
<tr><Td height="4"></Td></tr>
<tr><Td colspan="2" style="border-bottom:1px dotted #09C"></Td></tr>
<tr><Td height="24"></Td></tr>
</table>

<center>
<table cellpadding="0" cellspacing="0">
<tr>
	<td><span style="color:#666; font-size:14px;"><b>Paciente:</b></span></td>
    <td><span style="color:#666; font-size:14px;"><?php echo $linha['Nome']; ?></span></td>
</tr>
<tr><Td height="14"></Td></tr>
<tr>
	<td><span style="color:#666; font-size:14px;"><b>Endereço:</b></span></td>
    <td><span style="color:#666; font-size:14px;"><?php echo $linha['Endereco']; ?></span></td>
</tr>
<tr><Td height="14"></Td></tr>
<tr>
	<td><span style="color:#666; font-size:14px;"><b>Email:</b></span></td>
    <td><span style="color:#666; font-size:14px;"><?php echo $linha['Email']; ?></span></td>
</tr>

<tr><Td height="14"></Td></tr>
<tr>
	<td><span style="color:#666; font-size:14px;"><b>Telefone:</b></span></td>
    <td><span style="color:#666; font-size:14px;"><?php echo $linha['Telefone']; ?></span></td>
</tr>


<tr><Td height="14"></Td></tr>
<tr>
	<td><span style="color:#666; font-size:14px;"><b>Usuário:</b></span></td>
    <td><span style="color:#666; font-size:14px;"><?php echo $linha['Usuario']; ?></span></td>
</tr>


<tr><Td height="14"></Td></tr>
<tr>
	<td><span style="color:#666; font-size:14px;"><b>Senha:</b></span></td>
    <td><span style="color:#666; font-size:14px;"><?php echo $linha['Senha']; ?></span></td>
</tr>

</table>
</center>








<?php include ("includes/rodape.php"); ?>
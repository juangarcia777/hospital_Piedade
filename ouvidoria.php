<?php include("includes/topo.php"); ?>

<?php
if(isset($_GET['action'])){
	echo '<script>alert("Mensagem enviada com sucesso.")</script>';	
}
?>

<div class="content_meio">
    	
    <div class="tp_interna">
    	OUVIDORIA HNSP
    </div>	   
    
    <div class="titulos2">OUVIDORIA</div>
    <div class="ajusta_line2"><div class="line2"></div></div>

	<form method="post" action="ouvidoria.php?action=1#content" id="form1" name="form1">

                <input type="text" required="required" name="nome" class="form_contato2" placeholder="Qual seu nome?" />
                <input type="text"  name="email" class="form_contato" placeholder="Informe seu e-mail" />
                <input type="text" required="required" name="assunto" class="form_contato" placeholder="Qual o assunto?" />
                <textarea name="mensagem" required="required" class="form_contato" placeholder="MENSAGEM."></textarea>
                
                <input type="submit" class="noti_mais" value="ENVIAR" style="cursor:pointer; border:0; margin-top:10px">
                        
			</form> 	
	


</div>
        
    
    
    

<?php include("includes/rodape.php"); ?>